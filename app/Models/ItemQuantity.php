<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemQuantity extends Model{
    protected $fillable = ['item_id', 'option_ids', 'option_value_ids', 'quantity'];
    public $timestamps = false;

	public function item(){
		return $this->belongsTo('App\Models\Item');
    }

    public function consumptions(){
        $this->hasMany('App\Models\Consumption');
    }

    public function purchase_lines(){
        return $this->hasMany('App\Models\PurchaseLine');
    }

	/**
	 * Automatically setting unique hash of option and option values
	 * when creating or updating an instance of ItemQuantity model.
	 */
	protected static function boot(){
		parent::boot();
		$key = str_replace('base64:', '', env('APP_KEY'));
		$setHash = function($itemQuantity) use(&$key){
			$itemQuantity->setAttribute('hash', hash_hmac('sha256', $itemQuantity->item()->first()->id.$itemQuantity->option_ids.$itemQuantity->option_value_ids, $key));
		};

		static::creating($setHash);
		static::updating($setHash);
	}
}
