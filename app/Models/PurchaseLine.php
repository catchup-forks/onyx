<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseLine extends Model{
    protected $fillable = ['purchase_id', 'item_id', 'item_quantity_id', 'quantity'];
    public $timestamps = false;

    public function purchase(){
        return $this->belongsTo('App\Models\Purchase');
    }

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }

    public function item_quantity(){
        return $this->belongsTo('App\Models\ItemQuantity');
    }
}
