<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomWarranty extends Model{
    protected $fillable = ['order_line_id', 'expires_at', 'description'];
    protected $dates = ['expires_at'];
    public $timestamps = false;

	public function order_line(){
		return $this->belongsTo('App\Models\OrderLine');
    }
}
