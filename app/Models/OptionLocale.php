<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionLocale extends Model{
    protected $primaryKey = 'option_id';
    protected $fillable = ['option_id', 'locale'];
    public $timestamps = false;

	public function option(){
		return $this->belongsTo('App\Models\Option');
    }
}
