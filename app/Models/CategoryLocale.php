<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryLocale extends Model{
	protected $primaryKey = 'category_id';
	protected $fillable = ['category_id', 'locale', 'name', 'description'];
	public $timestamps = false;

	public function category(){
		return $this->belongsTo('App\Models\Category');
	}
}
