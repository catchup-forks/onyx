<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model{
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'first_name', 'last_name', 'birthdate', 'gender'];
    protected $dates = ['birthdate'];
    public $timestamps = false;

	public function user(){
		return $this->belongsTo('App\Models\User');
    }

	public function bank_accounts(){
		return $this->morphMany('App\Models\Account', 'contact');
    }

	public function addresses(){
		return $this->morphMany('App\Models\Address', 'contact');
    }

	public function phones(){
		return $this->hasMany('App\Models\Phone', 'user_id');
	}

	public function emails(){
		return $this->hasMany('App\Models\Email', 'user_id');
    }

	public function orders(){
		return $this->hasMany('App\Models\Order');
    }
}
