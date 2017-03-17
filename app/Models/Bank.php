<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model{
    protected $fillable = ['name', 'swift', 'iban'];

	public function accounts(){
		return $this->hasMany('App\Models\Account');
    }
}
