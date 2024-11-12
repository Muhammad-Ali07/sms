<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class PaidReceiptBroker extends Model
{
     protected $table = 'paid_receipt_broker';
       protected $connection = 'default';
    
       public function __construct() {
        parent::__construct();
        $this->connection = Session::get("dashboardright");
       }
     public function getbroker()
     {
       return $this->hasOne('App\VehicleSetup', 'id', 'broker_id');
     }  
     public $timestamps = true;
    //
}
