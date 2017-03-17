<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLocale extends Model{
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_id', 'locale', 'name', 'description'];
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
