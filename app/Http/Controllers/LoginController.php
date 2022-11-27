<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Member;
use App\Customer;
use App\Product;
use App\type_products;
use App\Cart;
use App\Orders;
use App\Order_Detail;
use Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getDangnhap(){
    	return view('dangnhap');

    }
     public function getThanhcong(){
        
    	return view('thanhcong');

    }
    // public function postDangnhap(){
 			
 			// $login = [
 			//   'email' => $request->'email',
 			//  'matkhau' => $request->'phone'
 			// 	];
 			// if (Auth::attempt()) {
 			// 	return redirect()->route('trangchu');
    // }
    // else return redirect()->back();
    public function postDangnhap(Request $request){
    $email = $request['email'];
    $password = $request['password'];
    $mem = Member::where('email',$email )->first();
    if($mem != null && $mem->matkhau == $password)
         return $this->getIndex();
    else 
        return view('dangnhap',['error'=>'Đăng nhập không thành công']);
    }
}


