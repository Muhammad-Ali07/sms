<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
	 protected $table = 'receipt';
       protected $connection = 'default';
    
       public function __construct() {
        parent::__construct();
        $this->connection = Session::get("dashboardright");
       }
     public $timestamps = true;
    //

      public function getcustomer()
     {
    
     return $this->hasMany('App\Customer', 'id', 'customer_id');
     	
     }
      public function getpayment()
     {
    
     return $this->hasMany('App\Paymenttype', 'id', 'payment_id');
     	
     }
      public function getbank()
     {
    
     return $this->hasMany('App\Bank', 'id', 'bank_id');
     	
     }

      public function getledger()
     {
    
     return $this->hasMany('App\Ledger', 'receipt_id', 'id');
      
     }

}
