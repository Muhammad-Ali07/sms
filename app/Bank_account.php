<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_account extends Model
{
    protected $guarded = [];

  	public function branch()
  	{
  		return $this->belongsTo('App\Bank_branch','branch_id');
  	}
}
