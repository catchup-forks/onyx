<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model{
    protected $fillable = ['user_id', 'notification_token', 'api_token', 'last_ip'];

	public function user(){
		return $this->belongsTo('App\Models\User');
    }
}
