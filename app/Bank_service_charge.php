<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_service_charge extends Model
{
    protected $guarded = [];

    public function bank_account()
  	{
  		return $this->belongsTo('App\bank_account','bank_account_id');
  	}
}
