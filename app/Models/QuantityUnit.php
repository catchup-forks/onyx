<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;

class QuantityUnit extends Model{
    use Localizable;

    protected $fillable = ['parent_id', 'value'];
    public $timestamps = false;

	public function parent(){
		return $this->belongsTo('App\Models\QuantityUnit', 'parent_id');
    }

	public function sub_units(){
		return $this->hasMany('App\Models\QuantityUnit', 'parent_id');
    }

	public function items(){
		return $this->hasMany('App\Models\Item');
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
