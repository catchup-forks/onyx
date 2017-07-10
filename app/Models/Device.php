<?php namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Device extends Authenticatable{
    use Notifiable, HasApiTokens;

    protected $fillable = ['user_id', 'notification_token', 'api_token', 'last_ip'];

	public function user(){
		return $this->belongsTo('App\Models\User');
    }
}
