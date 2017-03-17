<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model{
	protected $fillable = ['user_id', 'number'];
	public $timestamps = false;

	public function user(){
		return $this->belongsTo('App\Models\User');
	}
}
