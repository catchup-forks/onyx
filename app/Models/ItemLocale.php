<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemLocale extends Model{
	protected $primaryKey = 'item_id';
    protected $fillable = ['item_id', 'locale', 'name', 'description'];
    public $timestamps = false;

	public function item(){
		return $this->belongsTo('App\Models\Item');
    }
}
