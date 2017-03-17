<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatusLocale extends Model{
	protected $primaryKey = 'order_status_id';
    protected $fillable = ['order_status_id', 'locale', 'name'];
    public $timestamps = false;

	public function order_status(){
		return $this->belongsTo('App\Models\OrderStatus');
    }
}
