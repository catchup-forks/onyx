<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model{
    protected $table = 'leaves';
    protected $fillable = ['user_id', 'from', 'to', 'approved'];
	protected $dates = ['from', 'to'];

	public function user(){
		return $this->belongsTo('App\Models\User');
	}
}
