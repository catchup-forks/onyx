<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;

class Location extends Model{
    use Localizable;

	protected $fillable = ['parent_id', 'type', 'latitude', 'longitude'];
	public $timestamps = false;

	public function parent(){
		return $this->belongsTo('App\Models\Location', 'parent_id');
	}

	public function sub_locations(){
		return $this->hasMany('App\Models\Location', 'parent_id');
	}

	public function addresses(){
		return $this->hasMany('App\Models\Address', 'city_id');
	}
}
