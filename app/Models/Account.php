<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model{
    protected $fillable = ['bank_id', 'contact_id', 'contact_type', 'number'];

	public function bank(){
		return $this->belongsTo('App\Models\Bank');
    }

	public function contact(){
		return $this->morphTo();
    }
}
