<?php namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'username', 'password', 'role_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

	public function role(){
		return $this->belongsTo('App\Models\Role');
    }

    // Distributor's dispatched orders.
	public function dispatched_orders(){
		return $this->belongsToMany('App\Models\Order', 'deliveries', 'distributor_id', 'order_id');
    }

    // Products that should be produced by the user.
    public function production_products(){
        return $this->belongsToMany('App\Models\Product', 'production', 'user_id', 'product_id');
    }

	public function client(){
		return $this->hasOne('App\Models\Client');
    }

    public function payroll(){
        return $this->hasOne('App\Models\Payroll');
    }

	public function bank_accounts(){
		return $this->morphMany('App\Models\Account', 'contact');
	}

	public function addresses(){
		return $this->morphMany('App\Models\Address', 'contact');
	}

	public function phones(){
		return $this->hasMany('App\Models\Phone');
	}

	public function emails(){
		return $this->hasMany('App\Models\Email');
	}

	public function devices(){
		return $this->hasMany('App\Models\Device');
	}

	public function deliveries(){
		return $this->hasMany('App\Models\Delivery', 'distributor_id');
	}

	public function leaves(){
		return $this->hasMany('App\Models\Leave');
	}

	public function orders(){
		return $this->hasMany('App\Models\Order', 'managed_by');
	}

    public function payroll_payments(){
        return $this->hasManyThrough('App\Models\PayrollPayment', 'App\Models\Payroll');
	}

    public function productions(){
        return $this->hasMany('App\Models\Production');
	}

    public function reviews(){
        return $this->hasMany('App\Models\Review');
	}

    public function managed_purchases(){
        return $this->hasMany('App\Models\Purchase', 'managed_by');
	}
}
