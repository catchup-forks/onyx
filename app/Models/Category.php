<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model{
    use Localizable, SoftDeletes;

    protected $fillable = ['image', 'parent_id', 'type', 'position'];
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
		return $this->belongsToMany('App\Models\Product', 'product_categories', 'category_id', 'product_id');
	}

	public function items(){
		return $this->belongsToMany('App\Models\Item', 'item_categories', 'category_id', 'item_id');
	}

    public function getImageAttribute($image){
        $protocol = (!empty(request()->server('HTTPS')))? 'https' : 'http';
        return "$protocol://".request()->server('HTTP_HOST')."/storage/app/images/categories/{$this->category_id}/$image";
    }
}
