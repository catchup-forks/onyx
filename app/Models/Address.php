<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model{
    protected $fillable = ['contact_id', 'contact_type', 'address_1', 'address_2', 'city_id'];
    public $timestamps = false;

	public function contact(){
		return $this->morphTo();
	}

	public function city(){
		return $this->belongsTo('App\Models\Location', 'city_id');
	}

	public function orders(){
		return $this->hasMany('App\Models\Order');
	}
}
