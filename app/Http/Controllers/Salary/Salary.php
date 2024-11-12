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

class Salary extends BaseController
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){
     
		$data['employee'] = DB::table('employees')->get();
		$data['salary1'] = DB::table('salary')->get();
	
    return view('salary/salary',$data);
	}
	public function getEmployeeData(Request $req){
		$month = date('m',strtotime($req->input('date')));
    $year = date('Y',strtotime($req->input('date')));
		$data['employee'] = DB::table('employees')->get();
    $data['ledger'] = DB::table('employee_ledger')->get();
		$data['eledger'] = DB::select("select fk_emp_id from salary where sal_reference = 'Salary' and year(sal_date) = $year and month(sal_date) = $month ");

		$data['salary'] = DB::table('salary')->get();
		return view('salary/getSalaryRecord',$data);
	}
	public function getEmployeeSalary(Request $req){
		$employee_id = $req->input('employee');
		if($employee_id != ""){
			$getEmp = DB::table('employees')->where('employeeID',$employee_id)->get();
			return $salary = $getEmp[0]->emp_salary;
		}else{
			return "";
		}
	}
  public function getEmployeeBalance(Request $req){
    $employee_id = $req->input('employee');
		if($employee_id != ""){
			$data['getEmp'] = DB::table('employee_ledger')->where('fk_emp_id',$employee_id)->get();
      if($data['getEmp'] != false && sizeof($data['getEmp']) > 0){
        if($data['getEmp'][0]->fk_emp_id){
          $balance = 0;
          foreach($data['getEmp'] as $row){
      			$debit = $row->el_debit;
            $credit = $row->el_credit;

            $balance = $balance + $debit - $credit;
          }
          return $balance;
        }else{
          return 0.00;
        }
  		}else{
  			return 0.00;
  		}
    }
  }
	public function addSalary(Request $req){
	    
	   
		$date = $req->input('date');
		$employee_id = $req->input('employee');
		$desc = $req->input('desc');
		$salary = $req->input('salary');
		$type = $req->input('type');
    $amount = $req->input('advance');
    $deduct = $req->input('deduct');
    if($deduct == ''){
      $deduct = 0;
    }
   
		$getEmpName = DB::table('employees')->where('employeeID',$employee_id)->get();
	
		$emp_name = $getEmpName[0]->fullName;

    if($type == "Salary"){
  		$data=array(
  			'sal_date'=>date('Y-m-d',strtotime($date)),
  			'fk_emp_id'=>$employee_id,
  			'sal_emp_name'=>$emp_name,
  			'sal_desc'=>$desc.'/ Deducted Amount is : '.$deduct,
  			'sal_reference'=>$type,
  			'sal_amount'=>$salary-$deduct
  		);
      DB::table('salary')->insert($data);
    }
    if($type == "Return"){
  		$data=array(
  			'sal_date'=>date('Y-m-d',strtotime($date)),
  			'fk_emp_id'=>$employee_id,
  			'sal_emp_name'=>$emp_name,
  			'sal_desc'=>$desc,
  			'sal_reference'=>$type,
  			'sal_amount'=>$amount
  		);
      DB::table('salary')->insert($data);
    }
    if($type == "Advance"){
  		$data=array(
  			'sal_date'=>date('Y-m-d',strtotime($date)),
  			'fk_emp_id'=>$employee_id,
  			'sal_emp_name'=>$emp_name,
  			'sal_desc'=>$desc,
  			'sal_reference'=>$type,
  			'sal_amount'=>$amount
  		);
      DB::table('salary')->insert($data);
    }


		if($type == "Return"){
			$sl = array(
				'sl_date'=>date('Y-m-d',strtotime($date)),
				'sl_desc'=>$emp_name.' | '.$desc,
				'sl_reference'=>$type,
				'sl_debit'=>$amount,
        'fk_emp_id'=>$employee_id
			);
			$ml = array(
				'ledger_date'=>date('Y-m-d',strtotime($date)),
				'ledger_desc'=>$emp_name.' | '.$desc,
				'ledger_reference'=>$type,
				'ledger_debit'=>$amount,
			);
      DB::table('ledger')->insert($ml);
      $el = array(
        'el_date'=>date('Y-m-d',strtotime($date)),
				'el_desc'=>$emp_name.' | '.$desc,
				'el_reference'=>$type,
				'el_debit'=>$amount,
        'fk_emp_id'=>$employee_id
      );
		}
    if($type == "Advance"){
			$sl = array(
				'sl_date'=>date('Y-m-d',strtotime($date)),
				'sl_desc'=>$emp_name.' | '.$desc,
				'sl_reference'=>$type,
				'sl_credit'=>$amount,
        'fk_emp_id'=>$employee_id
			);
			$ml = array(
				'ledger_date'=>date('Y-m-d',strtotime($date)),
				'ledger_desc'=>$emp_name.' | '.$desc,
				'ledger_reference'=>$type,
				'ledger_credit'=>$amount
			);
      DB::table('ledger')->insert($ml);
      $el = array(
        'el_date'=>date('Y-m-d',strtotime($date)),
				'el_desc'=>$emp_name.' | '.$desc,
				'el_reference'=>$type,
				'el_credit'=>$amount,
        'fk_emp_id'=>$employee_id
      );
		}
    if($type == "Salary"){
      $result = $salary - $deduct;
			$sl = array(
				'sl_date'=>date('Y-m-d',strtotime($date)),
				'sl_desc'=>$emp_name.' | '.$desc.'/ Deducted Amount is : '.$deduct,
				'sl_reference'=>$type,
				'sl_credit'=>$result,
        'fk_emp_id'=>$employee_id
			);

      $el = array(
        'el_date'=>date('Y-m-d',strtotime($date)),
				'el_desc'=>$emp_name.' | '.$desc,
				'el_reference'=>$type,
				'el_debit'=>$deduct,
        'fk_emp_id'=>$employee_id
      );
		}
		DB::table('salary_ledger')->insert($sl);

    DB::table('employee_ledger')->insert($el);
		return redirect('/salary')->with('message',"Record has been saved and ledgers has been updated successfully");
	}
  public function salaryReport(Request $req){
    $from = $req->input('from');
    $to = $req->input('to');

    $from = date('Y-m-d',strtotime($from));
    $to = date('Y-m-d',strtotime($to));
    
    $data['salary'] = DB::table('salary')
    //->whereBetween('sal_date',[$from,$to])
    ->get();
    // dd($data['salary']);
    $result = 0;
    foreach($data['salary'] as $row){
      if($row->sal_reference == 'Salary'){
        $result += $row->sal_amount;
      }
		}
		$getMl = DB::table('ledger')->where('ledger_date',$from)->where('ledger_reference','Salary')->get();
		$ml = array(
			'ledger_date'=>$from,
			'ledger_desc'=>'Monthly Salary Expense',
			'ledger_reference'=>'Salary',
			'ledger_credit'=>$result
		);
		if(sizeof($getMl)> 0){
			$updateMl = DB::table('ledger')->where('ledger_reference','Salary')->where('ledger_date',$from)->update($ml);
		}else{
			DB::table('ledger')->insert($ml);
		}

    $mpdf = new PDF('utf-8', 'A4-L');
    $pdf = PDF::loadView('salary/salary_report',$data);
    return $pdf->stream('salary_report.pdf');
  }
}
