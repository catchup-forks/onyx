<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;

class Role extends Model{
	use Localizable;

    protected $fillable = ['slug'];
    public $timestamps = false;

	public function users(){
		return $this->hasMany('App\Models\User');
    }
}
