<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model{
    protected $fillable = ['supplier_id', 'managed_by', 'status'];

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function manager(){
        return $this->belongsTo('App\Models\User', 'managed_by');
    }

    public function purchase_lines(){
        return $this->hasMany('App\Models\PurchaseLine');
    }
}
