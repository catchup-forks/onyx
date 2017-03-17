<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model{
    protected $fillable = ['name'];
    public $timestamps = false;

	public function bank_accounts(){
		return $this->morphMany('App\Models\Account', 'contact');
	}

	public function addresses(){
		return $this->morphMany('App\Models\Address', 'contact');
	}

    public function supplier_contacts(){
        return $this->hasMany('App\Models\SupplierContact');
	}

    public function purchases(){
        return $this->hasMany('App\Models\Purchase');
	}
}
