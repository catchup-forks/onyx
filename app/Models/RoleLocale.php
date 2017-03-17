<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleLocale extends Model{
    protected $primaryKey = 'role_id';
    protected $fillable = ['role_id', 'locale', 'name'];
	public $timestamps = false;

	public function role(){
		return $this->belongsTo('App\Models\Role');
    }
}
