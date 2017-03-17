<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemOption extends Model{
	protected $primaryKey = 'item_id';
    protected $fillable = ['item_id', 'option_id', 'sort'];
    public $timestamps = false;

	public function item(){
		return $this->belongsTo('App\Models\Item');
    }

	public function option(){
		return $this->belongsTo('App\Models\Option');
    }
}
