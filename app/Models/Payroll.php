<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model{
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'on_bank', 'amount', 'duration'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function payroll_payments(){
        return $this->hasMany('App\Models\PayrollPayment');
    }
}
