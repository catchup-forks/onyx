<?php namespace App\Models;

use App\Contracts\Localizable;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model{
    use Localizable;

    protected $fillable = ['value'];
    public $timestamps = false;
}
