<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model{
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_id', 'option_id', 'sent'];
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function option(){
        return $this->belongsTo('App\Models\Option');
    }
}
