<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionValueLocale extends Model{
	protected $primaryKey = 'option_value_id';
    protected $fillable = ['option_value_id', 'locale', 'value'];
    public $timestamps = false;

	public function option_value(){
		return $this->belongsTo('App\Models\OptionValue');
    }
}
