<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class Paymenttype extends Model
{
     protected $table = 'payment_types';
       protected $connection = 'default';
    
       public function __construct() {
        parent::__construct();
        $this->connection = Session::get("dashboardright");
       }
     public $timestamps = true;
    //
}
