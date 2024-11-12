<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class Biltys extends Model
{
    //
    protected $table = 'bilty';
      protected $connection = 'default';
    
       public function __construct() {
        parent::__construct();
        $this->connection = Session::get("dashboardright");
       }
     public function getbiltymeta()
     {
    
     return $this->hasMany('App\Biltymeta', 'bilty_id', 'id');
     	
     }
      public function getpartbiltymeta()
     {
    
     return $this->hasMany('App\PartBiltymeta', 'bilty_id', 'id');
        
     }


     public function getbiltywalkinmeta()
     {
    
     return $this->hasMany('App\WalkinBiltymeta', 'bilty_id', 'id');
        
     }
      public function getsender()
     {
    
     return $this->hasMany('App\Customer', 'id','sender_id');
     	
     }
      public function getreceiver()
     {
    
     return $this->hasMany('App\Customer', 'id','receiver_id');
     	
     }
      public function getstation()
     {
    
     return $this->hasMany('App\Stationdetail', 'station_id','station_id');
        
     }

     public function station()
     {
    
     return $this->belongsTo('App\Stationdetail', 'station_id');
        
     }
     public function getsinglechallan()
     {
    
     return $this->hasOne('App\Challanmetas', 'bilty_id','id');
        
     }
     public function getsenderphone()
     {
    
     return $this->hasMany('App\CustomerPhoneno', 'id','senderphone_id');
        
     }
     public function getreceiverphone()
     {
    
     return $this->hasMany('App\CustomerPhoneno', 'id','receiverphone_id');
        
     }
      public function getchallan()
     {
    
     return $this->hasMany('App\Challanmetas', 'bilty_id','id');
        
     }

     public function stationdetail()
     {
     
        return $this->belongsTo('App\Stationdetail','station_id','id');
            
     }
      public function getbiltyadjust()
     {
       return $this->hasMany('App\Biltyadjust', 'bilty_id', 'id');
      }
      public function getbillmeta()
     {
    
        return $this->hasMany('App\Billmeta', 'bilty_id', 'id');
            
     }


     public function checkbillmeta()
     {
    
        return $this->hasOne('App\Billmeta', 'bilty_id', 'id');
            
     }
}
