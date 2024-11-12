<?php

namespace App;
use Session;

use Illuminate\Database\Eloquent\Model;

class CustomerPhoneno extends Model
{
    //
      protected $table = 'customer_phoneno';
       protected $primaryKey = 'id';
        protected $connection = 'default';
    
       public function __construct() {
        parent::__construct();
        $this->connection = Session::get("dashboardright");
       }
       public $timestamps = false;
}
