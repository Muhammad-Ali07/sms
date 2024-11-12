<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class VehicleSetup extends Model
{
    //
     protected $table = 'vehicle';
     protected $connection = 'default';
    
       public function __construct() {
        parent::__construct();
        $this->connection = Session::get("dashboardright");
       }
     protected $primaryKey = 'id';
     public $timestamps = false;

     public function vehicle_phoneno()
     {
     
     	return $this->hasMany('App\VehiclePhone', 'vehicle_id', 'id');
     		
     }
   public function getchallan()
     {
     
     	return $this->hasMany('App\Challans', 'driver_id', 'id');
     		
     }

}
