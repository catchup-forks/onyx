<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model{
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_id', 'attribute_id', 'locale', 'sort', 'value'];
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function attribute(){
        return $this->belongsTo('App\Models\Attribute');
    }
}
