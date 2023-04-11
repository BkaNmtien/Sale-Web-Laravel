<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;


class AdminController extends Controller
{
    public function index(){
        $order = Order::where('status', 0)->orderBy('id','desc')->paginate(6);

        $product = OrderDetail::select('products.name', 'products.image', 'order_details.product_id', OrderDetail::raw('COUNT(order_details.product_id) as total_product'))
                    ->join('products', 'products.id', '=', 'order_details.product_id')
                    ->groupBy('products.name', 'products.image', 'order_details.product_id')
                    ->orderByDesc('total_product')
                    ->paginate(6);
                  
        return view('admin.home', compact('order', 'product'));
    }

    public function login(){
        return view('admin.login');
    }

    public function postLogin(LoginAdminRequest $request){
        // Kiểm tra đăng nhập
        if(Auth::attempt(['email' =>$request->email, 'password' =>$request->password])){
            return redirect()->route('admin.index');
        }else{
            return redirect()->back()->with('message','Tài khoản hoặc mật khẩu không đúng!')->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
