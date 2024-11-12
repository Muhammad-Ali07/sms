<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
	 protected $table = 'ledger';
       protected $connection = 'default';
    
       public function __construct() {
        parent::__construct();
        $this->connection = Session::get("dashboardright");
       }
     public $timestamps = true;
       public function getreceipt()
     {
    
     return $this->hasMany('App\Receipt', 'id', 'receipt_id');
     	
     }
      public function getbill()
     {
    
     return $this->hasMany('App\Bill', 'id', 'bill_id');
     	
     }
    //
}
