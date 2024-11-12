<?php

namespace App\Http\Controllers\nsk\ledger;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use mpdf\mpdf;
use PDF;
use DB;
use Session;

class Ledger extends BaseController
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(){
    $data['ledger'] = DB::table('ledger')->get();
    return view('ledger/ledger',$data);
  }
  public function generate_main_ledger(Request $req){
    $from = $req->input('from');
    $to = $req->input('to');

    $from = date('Y-m-d',strtotime($from));
    $to = date('Y-m-d',strtotime($to));

    $data['ledger'] = DB::table('ledger')->whereBetween('ledger_date',[$from,$to])->get();

    $mpdf = new PDF('utf-8', 'A4-L');
    $pdf = PDF::loadView('ledger/main_ledger_report',$data);
    return $pdf->stream('ledger_report.pdf');
  }
}
