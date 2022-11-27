<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table = "order_detail";
    public function product(){
			return $this->belongsTo('App\Product','id_product','id');
		}
		public function orders(){
			return $this->belongsTo('App\Orders','id_order','id');
		}
}
