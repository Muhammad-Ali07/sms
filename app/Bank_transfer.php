<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_transfer extends Model
{
    protected $guarded = [];

    public function w_bank_account()
  	{
  		return $this->belongsTo('App\bank_account','withdraw_bank_id');
  	}

  	public function d_bank_account()
  	{
  		return $this->belongsTo('App\bank_account','deposit_bank_id');
  	}
}
