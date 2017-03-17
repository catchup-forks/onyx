<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderWarranty extends Model{
	protected $primaryKey = 'order_line_id';
    protected $fillable = ['order_line_id', 'warranty_id', 'expires_at'];
    protected $dates = ['expires_at'];
    public $timestamps = false;

	public function order_line(){
		return $this->belongsTo('App\Models\OrderLine');
    }

	public function warranty(){
		return $this->belongsTo('App\Models\Warranty');
    }
}
