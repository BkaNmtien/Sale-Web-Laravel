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
        $emailLogin = Session::get('email_order');
        //Phan trang
        $order = Order::where('email', $emailLogin)
                        ->orderBy('id','desc')
                        ->paginate(5);
        return view('user.profile', compact('order'));
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

    //Dang ki
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

    //Dang nhap băng tai khoan
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
                Session::put('email_order', $request->email);
                return redirect()->route('checkout.index');
            }else{
                Session::put('email_order', $request->email);
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

    //Dang nhap voi google
    public function handleGoogleCallback()
    {
        
        $googleUser = Socialite::driver('google')->user();
        Session::put('email_order', $googleUser->email);
       

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
    
        // Chuyển hướng về trang chủ hoặc checkout
        $getUrl = session()->pull('checkUrl');
        if($getUrl == 'checkout.index'){
            return redirect('/check-out');
        }else{
            
            return redirect('/');
        }
    }
}
