<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayrollPayment extends Model{
    protected $fillable = ['payroll_id', 'incentive', 'deduction', 'status', 'due_date'];
    protected $dates = ['due_date'];
    public $timestamps = false;

    public function payroll(){
        return $this->belongsTo('App\Models\Payroll');
    }
}
