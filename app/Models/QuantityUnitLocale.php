<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuantityUnitLocale extends Model{
	protected $primaryKey = 'quantity_unit_id';
	protected $fillable = ['quantity_unit_id', 'locale', 'name', 'symbol', 'suffix'];
	public $timestamps = false;

	public function quantity_unit(){
		return $this->belongsTo('App\Models\QuantityUnit');
	}
}
