<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model{
    protected $fillable = ['product_id', 'category_id'];
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}