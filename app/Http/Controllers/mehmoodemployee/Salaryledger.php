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
use App\AddEmployees;

class Salaryledger extends BaseController
{



    public function setupindex(){
        $employees = AddEmployees::select('id','employee_name')->distinct('employee_name')->get();
        
        $all_employee_salaries = DB::table('employees')
            ->join('salary', 'employees.id', '=', 'salary.employee_id')
            ->select('employees.*', 'salary.*')
            ->get();

        return View('mehmoodgoodemployee/sallaryledger',compact('employees','all_employee_salaries'));
    }

 

}
