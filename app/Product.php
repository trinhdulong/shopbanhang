<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
        protected $table = "products";
        public function product_type(){
			return $this->belongsTo('App\type_products','typeid','id');
		}
		public function order_detail(){
			return $this->hasMany('App\Order_Detail','id_product','id');
		}

}
