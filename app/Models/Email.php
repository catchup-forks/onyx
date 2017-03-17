<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model{
    protected $fillable = ['user_id', 'address'];
    public $timestamps = false;

	public function user(){
		return $this->belongsTo('App\Models\User');
    }
}
