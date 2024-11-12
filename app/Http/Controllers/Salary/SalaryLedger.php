<?php

namespace App\Http\Controllers\Salary;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Client;
use mpdf\mpdf;
use Illuminate\Support\Facades\Facade;
use PDF;
use DB;
use Session;

class SalaryLedger extends BaseController
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){
		$data['salary_ledger'] = DB::table('salary_ledger')->get();
    return view('salary/salary_ledger',$data);
  }
  public function generate_salary_ledger(Request $req){
    $from = $req->input('from');
    $to = $req->input('to');

    $from = date('Y-m-d',strtotime($from));
    $to = date('Y-m-d',strtotime($to));

    $data['ledger'] = DB::table('salary_ledger')->whereBetween('sl_date',[$from,$to])->get();

    $mpdf = new PDF('utf-8', 'A4-L');
    $pdf = PDF::loadView('ledger/salary_ledger_report',$data);
    return $pdf->stream('ledger_report.pdf'); 
  }

}
