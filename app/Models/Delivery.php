<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model{
    protected $fillable = ['distributor_id', 'order_id', 'delivered_at'];
    public $timestamps = false;
    protected $dates = ['delivered_at', 'created_at'];

	public function distributor(){
		return $this->belongsTo('App\Models\User', 'distributor_id');
    }

	public function order(){
		return $this->belongsTo('App\Models\Order');
    }
}
