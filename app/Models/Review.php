<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model{
    protected $fillable = ['user_id', 'product_id', 'rating', 'message', 'approved'];
    public $timestamps = false;
    protected $dates = ['created_at'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
