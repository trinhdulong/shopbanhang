<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    public function order_detail(){
			return $this->hasMany('App\Order_Detail','id_order','id');
		}
			public function member(){
			return $this->belongsTo('App\Member','id_order','id');
		} 
}
