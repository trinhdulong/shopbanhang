<?php

namespace App\Http\Controllers;
use App\Member;
use App\Customer;
use App\Product;
use App\type_products;
use App\productimage;
use App\imageconfig;
use App\Cart;
use App\Orders;
use App\Order_Detail;
use Session;
use Hash;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PageController extends Controller
{
    public function getTrangchu(){

		$member = Member::where('id',1)->first();	
		$new_product = Product::where('id','<>',0)->paginate(8);
        $khuyenmai_sp = Product::where('promotion_price',"<>",0)->get();   
        $loai_sp = Product::where('loai',"<>",null)->get();   
        $banners = imageconfig::where('typeimage',1)->get();   
        // dd($loai_sp); exit();
        return view('trangchu',compact('new_product','khuyenmai_sp','banners','loai_sp'));
	}

   
	public function getChitietsp($type){
        $sanpham=Product::where('id',$type)->first();
        return view('chitietsanpham',['sanpham'=>$sanpham]);
    }
    public function getChitietsp1($name1){

        $sanpham=   Product::where('name1',$name1)
                        ->join('type_products','type_products.id','=','Products.typeid')
                        ->select('typeproductname','name','typeid','unit_price','promotion_price','image','Products.id','loai')
                        ->get()->first();
        $productimage=  Product::where('id',$sanpham->id)
                        ->join('productimage','productimage.productid','=','Products.id')
                        ->select('productimage.name','productimage.name_thumb')
                        ->get();
         $recommand = Product::where([
                ['id', '<>', $sanpham->id],
                ['typeid', '=', $sanpham->typeid]
            ])->get();
      //dd($recommand); exit();
      //dd($sanpham->id); exit();
        return view('chitietsanpham',['sanpham'=>$sanpham,'productimage'=>$productimage,'recommand'=>$recommand]);
    }

    public function get_categorie($categorie){
        $categorie=type_products::where('path',$categorie)->first();
        if(!$categorie)
        {
            $message = "Kh??ng t??m th???y n???i dung y??u c???u.";
            return view('categorie',compact('message'));
        }
        if($categorie->parentid == 0)
        {
            $ProductsArr =  type_products::where('parentid',$categorie->id)
                    ->join('products','products.typeid','=','type_products.id')
                    ->select('typeproductname','name','name1','typeid','unit_price','promotion_price','image','Products.id','loai')
                    ->get();
            $Products = $this->paginate($ProductsArr);
        }
        else 
            $Products=Product::where('typeid',$categorie->id)->paginate(40);
        //dd($Products); exit();
        return view('categorie',['categorie'=>$categorie,'Products'=>$Products]);
    }

    function search(Request $req)
    {
        
        $ArrProducts = DB::select('call FilterData(?)',array($req->caviarSearch));
        $Products = $this->paginate($ArrProducts);

        if(count($Products)==0){
            $message = "Kh??ng t??m th???y n???i dung y??u c???u.";
            return view('search',compact('message','Products'));
        }
        else
        {
            return view('search',compact('Products'));
        }
    }




 public function paginate($items, $perPage = 40, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


// --------------------


 public function getKhuyenmai(){
        $khuyenmai_sp = Product::where('promotion_price',"<>",0)->get();   
        return view('khuyenmai',['khuyenmai_sp'=>$khuyenmai_sp]);

    }

    public function getLoaigiay($type){

        $gettheo_Loaisp = Product::where('typeid',$type)->get();
        $sp_khac = Product::orderBy('promotion_price', 'desc')->paginate(3);
        $loai=type_products::all();
        $loai_sp=type_products::where('id',$type)->first();
        return view('loaigiay',['gettheo_Loaisp'=>$gettheo_Loaisp,
                                'sp_khac'=>$sp_khac,
                                'loai'=>$loai,
                                'loai_sp'=>$loai_sp]);
    } 


 public function postTracuu(Request $req){
        $email = $req['email'];
        $code = $req['code'];
        if(!Session::has('dangnhap')){
        $orders_detail= Customer::Where('email',$email)
                        ->join('Orders','id_customer','=','Customer.id')
                        ->join('Order_Detail', function ($join) use ($code) {
                              $join->on ('Order_Detail.id_order','=','Orders.id')
                             ->where('Orders.madonhang', '=',$code);})
                        ->join('Products','Products.id','=','Order_Detail.id_product')
                        ->select('Customer.email','Order_Detail.id','customer_name','Products.name','Soluong','Order_Detail.unit_price','id_product','id_order','total','madonhang','date_order')
                        ->get();   
                         }
        else{
            // L???c ra chi ti???t ????n h??ng theo ??ia ch??? Email + code
            $orders_detail= Member::Where('email',Session::get('dangnhap')->email)
                        ->join('Orders','id_member','=','Member.id')
                        ->join('Order_Detail', function ($join) use ($code) {
                              $join->on ('Order_Detail.id_order','=','Orders.id')
                             ->where('Orders.madonhang', '=',$code);})
                        ->join('Products','Products.id','=','Order_Detail.id_product')
                        ->select('Order_Detail.id','member_name','Products.name','Soluong','Order_Detail.unit_price','id_product','id_order','total','madonhang','date_order')
                        ->get();
            // L??u danh s??ch ????n h??ng
           
        }
         
        $orders_detail = $orders_detail->values();
        //dd($orders->get(0));
        //dd($orders->isEmpty());
        if($orders_detail->get(0) != null){ // N???u t???n t???i ????n h??ng
            Session::put('tracuu',$orders_detail);      
            //$tracuu = Session::get('tracuu');
            return redirect()->back();
        }
        else
            return redirect()->back()->with('tracuufail','Email ho???c m?? ????n h??ng c???a b???n kh??ng h???p l???');
    }
    // ->join('Orders','id_customer','=','Customer.id')


    public function getAddtocart(Request $req,$id){
        $product=Product::find($id);
        $oldcart=Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->add($product,$id);
        $req->Session()->put('cart',$cart);
        return redirect()->back();

     }
     public function getDeletecart($id){
        $oldcart=Session::has('cart')?Session::get('cart'):null;
         $cart= new Cart($oldcart);
         $cart->removeItem($id);
         if(count($cart->items)>0){
             Session::put('cart',$cart);
         }
         else{
            Session::forget('cart');
        }
         return redirect()->back();

    }
    public function getDathang(){
        if(!Session::has('cart'))
            return redirect('trangchu');
        else
             return view('dathang');
    }
    public function getDangky(){
        return view('dangky');
    }
     public function getDangnhap(){
        return view('dangnhap');
    }
    public function getDangxuat(){
        Session::forget('dangnhap');
        return redirect('dangnhap');
    } 
     public function getTimkiem(Request $req){
        $products = Product::where('name','like','%'.$req->key.'%')
                            ->orWhere('unit_price','like','%'.$req->key.'%')->get();
        return view('timkiem',compact('products'));
    }  
 

    public function postDangnhap(Request $request){
        $email = $request['email'];
        $password = $request['password'];
        $mem = Member::where('email',$email )->first();
        if($mem != null && $mem->matkhau == $password){
            Session::put('dangnhap',$mem);
            $login = Session::get('dangnhap');
            // return view('trangchu'); //error
             return redirect('trangchu');
            //return $this->getTrangchu();
        }
        else 
            return redirect()->back()->with('error','????ng nh???p kh??ng th??nh c??ng');
    //            return view('dangnhap',['error'=>'????ng nh????p kh??ng tha??nh c??ng']);
    }
    public function postDangky(Request $req){
        // $this->validate($req,
        // [
        // 'email' => 'required|email|unique:member,email',
        // 'pass'  => 'required|min:6|max:20',
        // 'hoten' => 'required',
        // 'pass2' => 'required|same:pass1'
        // ],
        // [
        // 'email.required' => 'Vui l??ng nh???p Email',
        // 'email.email' => 'Kh??ng ????ng ?????nh d???ng email',
        // 'email.unique' => 'Email ???? c?? ng?????i s??? d???ng',
        // 'pass1.required' => 'Vui l??ng nh???p m???t kh???u',
        // 'pass1.same' => 'M???t kh???u kh??ng gi???ng nhau',
        // 'pass1.min'=> ' M???t kh???u ??t nh???t 6 k?? t???'
        // ]);
        $member = new Member();
        $member->member_name = $req->hoten;
        $member->email = $req->email;
        $member->cmnd = $req->cmnd;
        $member->address = $req->diachi;
        $member->phone_number = $req->sdt;
        $member->matkhau = $req->pass1;
        $member->save();
        return view('thanhcong',['thongbao'=>'B???n ???? c?? t??i kho???n vui l??ng ????ng nh???p ????? mua h??ng.']);
    }    
    //Customer ?????t h??ng
public function postDathang(Request $req){
            $cart=Session::get('cart');
            //dd($cart); exit();
            $customer = new Customer;
            $customer->customer_name = $req->name;
            $customer->gender= $req->gender;
            $customer->email=$req->email;
            $customer->address=$req->address;
            $customer->phone_number=$req->phone;
            $customer->save();

            $order = new Orders;
            $i=rand(1000,10000);
            $order->madonhang= $i;
            $order->id_customer = $customer->id;
            $order->date_order = date('Y-m-d');
            $order->total = $cart->totalPrice;
            $order->payment=$req->payment;
            $order->save();

            foreach ($cart->items as $key => $value) {
            $order_detail= new Order_Detail;
            $order_detail->id_order=$order->id;
            $order_detail->id_product = $key;
            $order_detail->Soluong = $value['qty'];
            $order_detail->unit_price=$value['price']/$value['qty'];
            $order_detail->save();
            }
            Session::forget('cart');
            return view('thanhcong',['message'=>'B???n ???? ?????t h??ng th??nh c??ng ????n h??ng : ','code'=>$i]);
     } 
     // Member ?????t h??ng
     public function postDathang1(Request $req){
            $cart=Session::get('cart');
            $i=rand(1000,10000);
            $order = new Orders;
            $order->madonhang= $i;
            $order->id_member = Session::get('dangnhap')->id;
            $order->date_order = date('Y-m-d');
            $order->total = $cart->totalPrice;
            $order->payment=$req->payment;
            $order->save();

            foreach ($cart->items as $key => $value) {
            $order_detail= new Order_Detail;
            $order_detail->id_order=$order->id;
            $order_detail->id_product =  $value['item']['id'];
            $order_detail->Soluong = $value['qty'];
            $order_detail->unit_price=$value['price']/$value['qty'];
            $order_detail->save();
            }
            Session::forget('cart');
            return view('thanhcong',['message'=>'Don hang da xu ly','code'=>$i]);
     } 
   
    // X??a ????n h??ng
    public function getDeleteOrder(Request $req,$id){
        $del = Orders::where('id',$id)->delete();
        //$req->Session()->put('orders',$del);
        return redirect()->back();
    }
    public function getTracuu(){
        if(Session::has('dangnhap')){
         Session::forget('orders'); // Load l???i session
         $orders = Orders::where('id_member',Session::get('dangnhap')->id)->get();
         Session::put('orders',$orders);
     }
         return view('tracuu');

    }
    
    public function login(Request $request)
    {
    $email = $request['email'];
    $password = $request['password'];
    if(Auth::attempt(['email'=>$email,'matkhau'=>$password]))
        return view('thanhcong',['error'=>'Dang nhap thanh cong']);
    else
        return view('thanhcong',['error'=>'Dang nhap khong thanh cong']);

    }


     public function postprofile(Request $req){
        $postprofile = Member::Where('id',Session('dangnhap')->id)->update(['member_name'=>$req->hoten,
                                                                        'phone_number'=>$req->sdt,
                                                                        'cmnd'=>$req->cmnd,
                                                                        'address'=>$req->diachi]);
         $bidder = Member::where('id',Session('dangnhap')->id)->first();
         Session::put('dangnhap',$bidder); 
         return redirect()->back();

    }
}
