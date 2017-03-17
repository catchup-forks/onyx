<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeLocale extends Model{
	protected $primaryKey = 'attribute_id';
	protected $fillable = ['attribute_id', 'locale', 'name'];
	public $timestamps = false;

	public function attribute(){
		return $this->belongsTo('App\Models\Attribute');
	}
}
