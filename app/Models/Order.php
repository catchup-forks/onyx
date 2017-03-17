<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $fillable = ['client_id', 'address_id', 'managed_by', 'order_status_id'];

	public function client(){
		return $this->belongsTo('App\Models\Client');
    }

	public function address(){
		return $this->belongsTo('App\Models\Address');
    }

	public function handler(){
		return $this->belongsTo('App\Models\User', 'managed_by');
    }

	public function order_status(){
		return $this->belongsTo('App\Models\OrderStatus');
    }

	public function distributors(){
		return $this->belongsToMany('App\Models\User', 'deliveries', 'order_id', 'distributor_id');
    }

	public function order_lines(){
		return $this->hasMany('App\Models\OrderLine');
    }

	public function order_warranties(){
		return $this->hasManyThrough('App\Models\OrderWarranty', 'App\Models\OrderLine');
    }

	public function deliveries(){
		return $this->hasMany('App\Models\Delivery');
    }
}
