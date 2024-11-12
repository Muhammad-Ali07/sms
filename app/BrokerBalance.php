<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class BrokerBalance extends Model
{
	 protected $table = 'broker_balance';
    //
      protected $connection = 'default';
    
       public function __construct() {
        parent::__construct();
        $this->connection = Session::get("dashboardright");
       }
	  

    
}
