<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consumption extends Model{
    protected $fillable = ['production_id', 'item_quantity_id', 'quantity'];
    public $timestamps = false;

	public function production(){
		return $this->belongsTo('App\Models\Production');
    }

	public function item_quantity(){
		$this->belongsTo('App\Models\ItemQuantity');
    }
}
