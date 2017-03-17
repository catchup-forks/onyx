<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductQuantity extends Model{
    protected $fillable = ['product_id', 'option_ids', 'option_value_ids', 'quantity'];
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function order_lines(){
        return $this->hasMany('App\Models\OrderLine');
    }

    /**
     * Automatically setting unique hash of option and option values
     * when creating or updating an instance of ProductQuantity model.
     */
    protected static function boot(){
        parent::boot();
        $key = str_replace('base64:', '', env('APP_KEY'));
        $setHash = function($productQuantity) use(&$key){
            $productQuantity->setAttribute('hash', hash_hmac('sha256', $productQuantity->product()->first()->id.$productQuantity->option_ids.$productQuantity->option_value_ids, $key));
        };

        static::creating($setHash);
        static::updating($setHash);
    }
}
