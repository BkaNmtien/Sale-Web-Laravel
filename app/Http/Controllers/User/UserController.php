<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function myAccount(){

        //Lay thong tin lich su mua hang
        $order = Order::orderBy('id','desc')->get()->toArray();
        // foreach($order as $value){
        //     dd($value['created_at']);
        // }
        $history_buy = OrderDetail::orderBy('order_id','desc')
            ->get()
            ->groupBy('order_id')
            ->toArray();
        // foreach($history_buy as $key=>$value){
        //    foreach($value as $value1){
        //     echo "<pre>";
        //         var_dump($value1);
        //         echo "</pre>";
        //    }
        // }
        return view('user.profile', compact('order','history_buy'));
    }
    public function index(){
        //lay tham so tu the a de dieu huong ve trang checkout
        if(request()->page){
            $paramCheckout = request()->page;
            $checkUrl = session();
            $checkUrl->put('checkUrl',$paramCheckout);
            
            return view('user.account', compact('paramCheckout'));
        }
        return view('user.account');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ],
        [
            'name.required'=>'Bạn vui lòng nhập tên.',
            'email.required'=>'Bạn vui lòng nhập email.',
            'email.unique'=>'Email '.$request->email.' đã tồn tại.',
            'password.required' => 'Bạn vui lòng nhập mật khẩu.'
        ]);  
        
        $googleUser = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'phone'=>$request->phone
        ]);

        if($googleUser){
            return redirect()->back();
        }
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ],
        [
            'email.required'=>'Bạn vui lòng nhập email.',
            'password.required' => 'Bạn vui lòng nhập mật khẩu.'
        ]); 
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if($request->paramCheckout){
                return redirect()->route('checkout.index');
            }else{
                return redirect()->route('home.index');
            }
        }else{
            return redirect()->back()->with('s','Sai tên tài khoản hoặc mật khẩu.');
        }
           
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('user.index');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')
        ->redirect();
    }

    public function handleGoogleCallback()
    {
        
        $googleUser = Socialite::driver('google')->user(); 
       

        $existingUser = User::where('email', $googleUser->email)->first();
       

        if ($existingUser) {
            // Cập nhật thông tin tài khoản
            $existingUser->google_id = $googleUser->id;
            $existingUser->name = $googleUser->name;
            $existingUser->avatar = $googleUser->avatar;
            $existingUser->save();
        } else {
            // Tạo mới tài khoản nếu chưa tồn tại
            $newUser = new User();
            $newUser->name = $googleUser->name;
            $newUser->email = $googleUser->email;
            $newUser->google_id = $googleUser->id;
            $newUser->avatar = $googleUser->avatar;
            $newUser->save();
            $existingUser = $newUser;
        }
        // Đăng nhập người dùng
        Auth::login($existingUser);
    
        // Chuyển hướng về trang chủ
        $getUrl = session()->pull('checkUrl');
        if($getUrl == 'checkout.index'){
            return redirect('/check-out');
        }else{
            return redirect('/');
        }
    }
}
