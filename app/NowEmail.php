<?php

namespace App;
use Session;

use Illuminate\Database\Eloquent\Model;

class NowEmail extends Model
{
    //
    protected $table = 'now_email';
    //  protected $connection = 'default';

    //  public function __construct() {
    //   parent::__construct();
    //    $this->connection = Session::get("dashboardright");
    //   }

    // protected $primaryKey = 'id';
    // public $timestamps = "true";


    //  public function useraddress()
    //  {

    //  	return $this->hasMany('App\CustomerAddress', 'customer_id', 'id');

    //  }
    //   public function useremail()
    //  {

    //  		return $this->hasMany('App\CustomerEmail', 'customer_id', 'id');
    //  	//return hasMany('App/CustomerAddress','customer_id');
    //  }
    //   public function userbilty()
    //   {
    //     return $this->hasMany('App\Biltys', 'sender_id', 'id');
    //   }
    //   public function phoneno()
    //  {

    //  	return $this->hasMany('App\CustomerPhoneno', 'customer_id', 'id');

    //  }
    //   public function userpackage()
    //  {

    //     return $this->hasMany('App\Package', 'customer_id', 'id');

    //  }

    //  public function user_single_package()
    //  {

    //     return $this->hasOne('App\Package', 'customer_id', 'id');

    //  }

    //   public function userstation()
    //  {

    //     return $this->hasMany('App\Stations', 'customer_id', 'id');

    //  }

    //  public function user_single_station()
    //  {

    //     return $this->hasOne('App\Stations', 'customer_id', 'id');

    //  }

    //  public function user_ratelist()
    //  {

    //     return $this->hasOne('App\Ratelist', 'customer_id', 'id');

    //  }



    //  public function nowEmails()
    //  {
    //      return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    //  }
}
