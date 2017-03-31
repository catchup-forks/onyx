<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model{
    protected $fillable = ['item_id', 'category_id'];
    public $timestamps = false;

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}