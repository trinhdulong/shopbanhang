<?php

namespace App\Http\Controllers;
use App\Member;
use App\Customer;
use App\Product;
use App\type_products;
use App\Cart;
use App\Orders;
use App\Order_Detail;
use Session;
use Hash;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getOrder(){

		$order1 = Orders::join('member','member.id','=','orders.id_member')
						->select('orders.id','member.member_name','member.email','date_order','payment','total')
						->orderBy('orders.id','desc')
						->get();
		$order2 = Orders::join('customer','customer.id','=','orders.id_customer')
						->select('orders.id','customer.customer_name','customer.email','date_order','payment','total')
						->orderBy('orders.id','desc')
						->get();	
		
    	return view('admin/admin-order',['order1'=>$order1,'order2'=>$order2]);
    }
     public function getAccount(){

		$acc = Member::where('state','<>',1)->get();
		
    	return view('admin/admin-account',['acc'=>$acc]);
    }
}
