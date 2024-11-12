<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_branch extends Model
{
   protected $guarded = [];

   public function bank()
  	{
  		return $this->belongsTo('App\Bank','bank_id');
  	}
  	public function receipt()
  	{
  		return $this->hasMany('App\Receipt','bank_id','id');
  	}
    


}
