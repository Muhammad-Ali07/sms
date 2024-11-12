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

class  Sallary extends BaseController
{

    public function generatereport(Request $request){

           $employee_salary = DB::table('employees')
            ->join('salary', 'employees.id', '=', 'salary.employee_id')
            ->whereBetween('salary.Date', array(date("Y-m-d", strtotime($request->from)),date("Y-m-d", strtotime($request->to)) ))
            ->select('employees.*', 'salary.*')
            ->get();
        return View('mehmoodreports/generate_salary_report',compact('employee_salary'));
    }
   
    public function generatadvanceereport(Request $request){

          $employee_advance_salary = DB::table('employees')
            ->join('addloanadvance', 'employees.id', '=', 'addloanadvance.employee_id')
            ->where('employees.id','=',$request->employee_id)
            ->whereBetween('addloanadvance.Date', array(date("Y-m-d", strtotime($request->from)),date("Y-m-d", strtotime($request->to)) ))
            ->select('employees.*', 'addloanadvance.*')
            ->get();
        return View('mehmoodreports/generate_advance_salary_report',compact('employee_advance_salary'));
    }

       public function generateloanreport(Request $request){

$employee_loan = DB::table('employees')
            ->join('employeeloan', 'employees.id', '=', 'employeeloan.employee_id')
            ->where('employees.id','=',$request->employee_id)
            ->select('employees.*', 'employeeloan.*')
            ->get();
        return View('mehmoodreports/generate_loan_report',compact('employee_loan'));
    }

    public function generatesallaryredgerreport(Request $request){

$employee_salary = DB::table('employees')
            ->join('salary', 'employees.id', '=', 'salary.employee_id')
            ->whereBetween('salary.Date', array(date("Y-m-d", strtotime($request->from)),date("Y-m-d", strtotime($request->to)) ))
            ->where('employees.id','=',$request->employee)
            ->select('employees.*', 'salary.*')
            ->get();

        return View('mehmoodreports/generate_salary_ledger',compact('employee_salary'));
    }

}
