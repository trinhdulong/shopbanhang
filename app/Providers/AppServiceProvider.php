<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\type_products;
use App\Cart;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('pages.header',function($view){
            $loai_sp = type_products::where('parentid',0)->orderBy('id','asc')->get();
            $view->with('loai_sp',$loai_sp);
        }); 
        view()->composer('pages.header',function($view){
            if(Session('cart')){
              $oldcart =Session::get('cart');
              $cart = new Cart($oldcart);
               $view->with(['cart'=>Session::get('cart'),
                        'product_cart'=>$cart->items]);

          }
      }); 
      view()->composer('dathang',function($view){
            if(Session('cart')){
              $cart =Session::get('cart');
               $view->with(['cart'=>$cart,
                        'product_carts'=>$cart->items]);

          }
      });
      view()->composer('tracuu',function($view){
            if(Session('tracuu')){
              $tracuu =Session::get('tracuu');
             
               $view->with(['tracuu'=> $tracuu
                        ]);
          }
      });
        
          }
  


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
