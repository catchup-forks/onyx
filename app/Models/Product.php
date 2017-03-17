<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model{
    use Localizable, SoftDeletes;

    protected $fillable = ['category_id', 'price', 'quantity', 'quantity_unit_id', 'has_options', 'is_service'];
    protected $dates = ['deleted_at'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function quantity_unit(){
        return $this->belongsTo('App\Models\QuantityUnit');
    }

    public function service(){
        return $this->hasOne('App\Models\Service');
    }

    public function producers(){
        return $this->belongsToMany('App\Models\User', 'productions', 'product_id', 'user_id');
    }

    public function attributes(){
        return $this->belongsToMany('App\Models\Attribute', 'product_attributes', 'product_id', 'attribute_id');
    }

    public function options(){
        return $this->belongsToMany('App\Models\Option', 'product_options', 'product_id', 'option_id');
    }

    public function product_attributes(){
        return $this->hasMany('App\Models\ProductAttribute');
    }

    public function product_options(){
        return $this->belongsTo('App\Models\ProductOption');
    }

    public function product_quantities(){
        return $this->hasMany('App\Models\ProductQuantity');
    }

    public function productions(){
        return $this->hasMany('App\Models\Production');
    }

    public function warranties(){
        return $this->hasMany('App\Models\Warranty');
    }

    public function order_lines(){
        return $this->hasMany('App\Models\OrderLine');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }
}
