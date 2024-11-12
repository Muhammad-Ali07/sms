<?php

namespace App\Http\Controllers\Employee;

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

class Empledger extends BaseController
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){
		$data['employee_ledger'] = DB::table('employee_ledger')->get();
		$data['employee'] = DB::table('employees')->get();
    return view('employee/mainEmpLedger',$data);
  }
	public function getEmployeeLedgerRecord(Request $req){
		$employee_id = $req->input('employee_id');
		$data['employee_ledger'] = DB::table('employee_ledger')->where('fk_emp_id',$employee_id)->get();
		$data['employee_id'] = $employee_id;
		return view('employee/emp_ledger',$data);
	}
	public function getEmployeeWiseLedgerReport(Request $req){
		$id = $req->input('id');
		$all = $req->input('all');

		if($all == 'on'){

			$data['employee_ledger_record'] = DB::table('employee_ledger')->where('fk_emp_id',$id)->get();
			$mpdf = new PDF('utf-8', 'A4-L');
			$pdf = PDF::loadView('ledger/emp_ledger_report',$data);
			return $pdf->stream('ledger_report.pdf');

		}else{
			$from = $req->input('from');
			$to   = $req->input('to');

			$from = date('Y-m-d',strtotime($from));
			$to = date('Y-m-d',strtotime($to));

			$data['employee_ledger_record'] = DB::table('employee_ledger')->whereBetween('el_date',[$from,$to])->where('fk_emp_id',$id)->get();

			$mpdf = new PDF('utf-8', 'A4-L');
			$pdf = PDF::loadView('ledger/emp_ledger_report',$data);
			return $pdf->stream('ledger_report.pdf');
		}
	}
	public function getEmployeeLedgerReport(Request $req){
		$id = $req->input('id');

		$from = $req->input('from');
		$to   = $req->input('to');

		$from = date('Y-m-d',strtotime($from));
		$to = date('Y-m-d',strtotime($to));
		if($id == 'all'){
			$data['employee_ledger_record'] = DB::table('employee_ledger')->whereBetween('el_date',[$from,$to])->get();
		}else{
			$data['employee_ledger_record'] = DB::table('employee_ledger')->whereBetween('el_date',[$from,$to])->where('fk_emp_id',$id)->get();
		}

		$mpdf = new PDF('utf-8', 'A4-L');
		$pdf = PDF::loadView('ledger/emp_ledger_report',$data);
		return $pdf->stream('ledger_report.pdf');
	}
}
