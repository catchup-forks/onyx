<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model{
    use Localizable;

	protected $fillable = ['option_id'];
	public $timestamps = false;

	public function option(){
		return $this->belongsTo('App\Models\Option');
	}
}
