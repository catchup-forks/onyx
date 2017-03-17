<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model{
	use Localizable;

    public $timestamps = false;

	public function orders(){
		return $this->hasMany('App\Models\Order');
    }
}
