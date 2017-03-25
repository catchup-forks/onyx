<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model{
    use Localizable, SoftDeletes;

    protected $fillable = ['parent_id', 'type', 'position'];
	protected $dates = ['deleted_at'];

	public function parent(){
		return $this->belongsTo('App\Models\Category', 'parent_id')->select(['id', 'parent_id'])->with('locale');
	}

    public function ancestors(){
        return $this->parent()->with('ancestors');
	}

	public function subcategories(){
		return $this->hasMany('App\Models\Category', 'parent_id')->with('locales');
	}

	public function products(){
		return $this->hasMany('App\Models\Product');
	}

	public function items(){
		return $this->hasMany('App\Models\Item');
	}
}
