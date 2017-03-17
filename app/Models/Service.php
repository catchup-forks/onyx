<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model{
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_id', 'duration_value', 'duration_unit'];
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
