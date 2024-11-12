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

class Brokerpaid extends BaseController
{



    public function index(){

        return View('mehmoodgoodemployee/brokerpaid');
    }

 
    public function brokerpaidreceipt(){

        return View('mehmoodgoodemployee/brokerpaidreceipt');
    }

}
