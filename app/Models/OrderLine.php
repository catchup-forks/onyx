<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model{
    protected $fillable = ['order_id', 'product_id', 'product_quantity_id', 'quantity'];
    public $timestamps = false;

	public function order(){
		return $this->belongsTo('App\Models\Order');
    }

	public function product(){
		return $this->belongsTo('App\Models\Product');
    }

	public function product_quantity(){
		return $this->belongsTo('App\Models\ProductQuantity');
    }

	public function warranties(){
		return $this->belongsToMany('App\Models\Warranty', 'order_warranties', 'order_line_id', 'warranty_id');
    }

	public function order_warranties(){
		return $this->hasMany('App\Models\OrderWarranty');
	}

	public function custom_warranties(){
		return $this->hasMany('App\Models\CustomWarranty');
    }
}
