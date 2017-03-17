<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model{
    use SoftDeletes, Localizable;

    protected $fillable = ['category_id', 'price', 'quantity', 'quantity_unit_id', 'has_options'];
    protected $dates = ['deleted_at'];

	public function category(){
		return $this->belongsTo('App\Models\Category');
    }

	public function quantity_unit(){
		return $this->belongsTo('App\Models\QuantityUnit');
    }

	public function attributes(){
		return $this->belongsToMany('App\Models\Attribute', 'item_attributes', 'item_id', 'attribute_id');
    }

	public function options(){
		return $this->belongsToMany('App\Models\Option', 'item_options', 'item_id', 'option_id');
    }

	public function item_attributes(){
		return $this->hasMany('App\Models\ItemAttribute');
    }

	public function item_options(){
		return $this->belongsTo('App\Models\ItemOption');
    }

	public function item_quantities(){
		return $this->hasMany('App\Models\ItemQuantity');
    }

    public function purchase_lines(){
        return $this->hasMany('App\Models\PurchaseLine');
    }
}
