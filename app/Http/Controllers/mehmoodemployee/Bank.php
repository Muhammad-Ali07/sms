<?php

namespace App\Http\Controllers\mehmoodemployee;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Client;
use Hash;
use mpdf\mpdf;
use Illuminate\Support\Facades\Facade;
use PDF;
use DB;
use Session;
use App\User;
use App\dbmodel;
use View;
use Auth;

class Bank extends BaseController
{



    public function index(){

        return View('mehmoodgoodemployee/bank');
    }

       public function addbank(){

        return View('mehmoodgoodemployee/add_bank');
    }

 
    public function bankservices(){

        return View('mehmoodgoodemployee/bankservices');
    }

 public function banktransfer(){

        return View('mehmoodgoodemployee/banktransfer');
    }

 public function depositwithdrawl(){

        return View('mehmoodgoodemployee/depositwithdrawl');
    }


 public function bankledger(){

        return View('mehmoodgoodemployee/bankledger');
    }



 


 public function pettytransfer(){

        return View('mehmoodgoodemployee/pettytransfer');
    }







}
