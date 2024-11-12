<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class Billmeta extends Model
{
	 protected $table = 'bill_metas';
       protected $connection = 'default';
    
       public function __construct() {
        parent::__construct();
        $this->connection = Session::get("dashboardright");
       }
	    public $timestamps = true;
    //
      public function getbilty()
     {
    
        return $this->hasMany('App\Biltys','id', 'bilty_id');
      //return hasMany('App/CustomerAddress','customer_id');
     }
     public function getledger()
     {
    
        return $this->hasMany('App\Ledger','bill_id', 'bill_id');
      //return hasMany('App/CustomerAddress','customer_id');
     }

     public function getbiltymeta()
     {
    
        return $this->hasMany('App\Biltymeta','bilty_id', 'bilty_id');
      //return hasMany('App/CustomerAddress','customer_id');
     }
      public function getbill()
     {
    
        return $this->hasMany('App\Bill','id', 'bill_id');
      //return hasMany('App/CustomerAddress','customer_id');
     }
    
      
}
