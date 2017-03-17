<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarrantyLocale extends Model{
    protected $primaryKey = 'warranty_id';
    protected $fillable = ['warranty_id', 'locale', 'description'];
    public $timestamps = false;

    public function warranty(){
        return $this->belongsTo('App\Models\Warranty');
    }
}
