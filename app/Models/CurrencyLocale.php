<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyLocale extends Model{
	protected $primaryKey = 'currency_id';
	protected $fillable = ['currency_id', 'locale', 'name', 'symbol', 'suffix'];
	public $timestamps = false;

	public function currency(){
		return $this->belongsTo('App\Models\Currency');
	}
}
