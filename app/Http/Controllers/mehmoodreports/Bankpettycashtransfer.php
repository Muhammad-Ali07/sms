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

class Bankpettycashtransfer extends BaseController
{
    public function generatereport(){
    		//$pdf = PDF::loadView('mehmoodreports/generate_bank_to_pettycash_transfer_report');
    //return $pdf->stream('generate_bank_to_pettycash_transfer_report');
return redirect()->back();

    }
   
}