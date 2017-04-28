<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model{
    protected $fillable = ['product_id', 'image'];
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function getImageAttribute($image){
        $protocol = (!empty(request()->server('HTTPS')))? 'https' : 'http';
        return "$protocol://".request()->server('HTTP_HOST')."/storage/app/images/products/extra/{$this->product_id}/$image";
    }
}