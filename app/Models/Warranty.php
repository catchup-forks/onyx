<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model{
	use Localizable;

    protected $fillable = ['product_id', 'duration_value', 'duration_unit'];
    public $timestamps = false;

	public function product(){
		return $this->belongsTo('App\Models\Product');
    }

	public function order_lines(){
		return $this->belongsToMany('App\Models\OrderLine', 'order_warranties', 'warranty_id', 'order_line_id');
    }

	public function order_warranties(){
		return $this->hasMany('App\Models\OrderWarranty');
    }
}
