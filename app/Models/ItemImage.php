<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model{
    protected $fillable = ['item_id', 'image'];
    public $timestamps = false;

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }

    public function getImageAttribute($image){
        $protocol = (!empty(request()->server('HTTPS')))? 'https' : 'http';
        return "$protocol://".request()->server('HTTP_HOST')."/storage/app/images/items/extra/{$this->item_id}/$image";
    }
}