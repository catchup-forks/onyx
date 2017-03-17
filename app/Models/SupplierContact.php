<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model{
    protected $fillable = ['supplier_id', 'name', 'phone', 'email'];
    public $timestamps = false;

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }
}
