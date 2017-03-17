<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemAttribute extends Model{
	protected $primaryKey = 'item_id';
	protected $fillable = ['item_id', 'attribute_id', 'locale', 'sort', 'value'];
	public $timestamps = false;

	public function item(){
		return $this->belongsTo('App\Models\Item');
	}

	public function attribute(){
		return $this->belongsTo('App\Models\Attribute');
	}
}
