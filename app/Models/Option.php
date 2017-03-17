<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;

class Option extends Model{
    use Localizable;

    protected $fillable = ['multivalue'];
    public $timestamps = false;

	public function products(){
		return $this->belongsToMany('App\Models\Product', 'product_options', 'option_id', 'product_id');
    }

	public function items(){
		return $this->belongsToMany('App\Models\Item', 'item_options', 'option_id', 'item_id');
    }

	public function option_values(){
		return $this->hasMany('App\Models\OptionValue');
    }

	public function product_options(){
		return $this->hasMany('App\Models\ProductOption');
    }

	public function item_options(){
		return $this->hasMany('App\Models\ItemOption');
    }
}
