<?php

namespace App\Http\Controllers\mehmoodreports;

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

class Accountsreports extends BaseController
{

    public function index(){

        return View('mehmoodreports/accountsreports');
    }
   public function bankservicescharge(){

        return View('mehmoodreports/bankservicescharereports');
    }

      public function banktransfer(){

        return View('mehmoodreports/banktransferreport');
    }

     public function depositwithdrawl(){

        return View('mehmoodreports/depositwithdrwalreport');
    }

     public function bankledger(){

        return View('mehmoodreports/bankledgerreports');
    }

     public function pettycashledger(){

        return View('mehmoodreports/pettycashledgerreport');
    }
   public function banktopettycashtransfer(){

        return View('mehmoodreports/banktopettycashtransferreports');
    }
}
