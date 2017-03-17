<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model{
    use Localizable;

    public $timestamps = false;

	public function products(){
		return $this->belongsToMany('App\Models\Product', 'product_attributes', 'attribute_id', 'product_id');
    }

	public function items(){
		return $this->belongsToMany('App\Models\Item', 'item_attributes', 'attribute_id', 'item_id');
    }

	public function product_attributes(){
		return $this->hasMany('App\Models\ProductAttribute');
    }

	public function item_attributes(){
		return $this->hasMany('App\Models\ItemAttribute');
    }
}
