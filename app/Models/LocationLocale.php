<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationLocale extends Model{
    protected $primaryKey = 'location_id';
    protected $fillable = ['location_id', 'locale', 'name'];
	public $timestamps = false;

	public function location(){
		return $this->belongsTo('App\Models\Location');
    }
}
