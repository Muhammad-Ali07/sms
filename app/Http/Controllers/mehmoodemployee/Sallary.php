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
use App\AddEmployees;
use App\dbmodel;
use App\LoanAddvance;
use App\Bank_account;
use App\Bank_ledger;
use App\Salary;
use App\Petty_cash;
use View;
use Auth;

class Sallary extends BaseController
{



    public function setupindex(){
        $employeestype = AddEmployees::all(); 
        $sallary = Salary::with('salaryemployee')->get();

        return View('mehmoodgoodemployee/sallary')->with(compact("sallary","employeestype"));
    }

    public function addsalary(){

    	   $employeestype = AddEmployees::select('employee_type','id')->groupBy('employee_type')->get(); 
    	   $employees = AddEmployees::select('employee_name')->distinct('employee_name')->get(); 
         $Salary = Salary::get();

        $Bank_accounts = Bank_account::all();

        return View('mehmoodgoodemployee/addsalary')->with(compact("Bank_accounts",$Bank_accounts,"employeestype",$employeestype,"employees",$employees,"Salary",$Salary));
    }
public function getEmployeePaidSalary(Request $req){
    $employee = $req->input('employee');
    $month_salary_date = date('m',strtotime($req->input('date')));
    $year_salary_date = date('Y',strtotime($req->input('date')));
    $emp = DB::table('salary')->where(['employee_id'=>$employee,])->whereMonth('Date', '=', $month_salary_date)->whereYear('Date', '=', $year_salary_date)->get();
    if(sizeof($emp)>0){
      return $emp[0]->Debit;
    }else{
      return 0;
    }
  }

    public function insert(Request $req){

//        $req->validate([
//        'name' => 'required',
//        // 'fname' => 'required',
//        // 'date' => 'required',
//        // 'mobile' => 'required',
//        // 'cnic' => 'required',


// ]);

       $Salary = new Salary;
       $id =  $req->input('Pid');     

       $Salary->employeecategory = $req->input('employeecategory');
       $Salary->Date =  date('Y-m-d',strtotime($req->input('date')));
       $Salary->employee_id =  $req->input('employee');
       $Salary->OtherDeduction =  $req->input('other_deduction');
       $Salary->Salary =  $req->input('Salary');
       $Salary->payment_method =  $req->input('payment_method');
       $Salary->amount =  $req->input('amount');
       $Salary->advsalary =  $req->input('AdvanceSalary');       
       $Salary->Bankid =  $req->input('bank_id');
       $employee = $req->input('employee');
       $month_salary_date = date('m',strtotime($req->input('date')));
       $year_salary_date = date('Y',strtotime($req->input('date')));


   $CheckEmployeeSalary = DB::table('salary')->where(['employee_id'=>$employee])->whereMonth('Date', '=', $month_salary_date)->whereYear('Date', '=', $year_salary_date)->get();


      if(sizeof($CheckEmployeeSalary)>0){
        return redirect()->back()->with('error',"Salary already issue of this employee");
      }

      // $currentsalary = AddEmployees::where('id',$req->Pid)->first();
      // dd($advancesalary);
//       $totalloan = 0;
//       if ($advancesalary!=null) {

//       foreach ($advancesalary as $key => $value) {
// $totalloan += $value->amount;

// }
// }

 // if($advancesalary > $req->amount)
 // {
 
 // return redirect()->back()->withInput($req->input())->with('error',"First Pay Your Advance Salary");
 // }

      // $advancesalary = LoanAddvance::where('employee_id',$req->Pid)->get();
// dd($req->all());
      if($req->payment_method == 'Bank'){


        $w_bank_account = Bank_account::where('id',$req->bank_id)->first();
        if($w_bank_account->amount>=$req->amount){

          if ($req->bank_id!=null) {

            $updated_w_amount = ($w_bank_account->amount)-($req->amount);
            Bank_account::where('id',$req->bank_id)->update([
                          'amount'   =>  $updated_w_amount,
                      ]);

            Bank_ledger::create([
              'bank_account_id'   =>  $req->bank_id,
              'description'       =>  'Employee Salary',
              'debit'             =>  null,
              'credit'            =>  $req->amount,
              'balance'           =>  $updated_w_amount
            ]);
          }
        }
        else
        {

          $updated_w_amount = $req->amount;
          return redirect()->back()->withInput($req->input())->with('error',"Bank Amount less than Salary Amount");
        }
      }
      else{
        $petty_cash_amount = Petty_cash::first()->amount;
        if ($petty_cash_amount >= $req->amount) {
            $updated_expense_amount = ($petty_cash_amount)-($req->amount);
            Petty_cash::where('id',1)->update([
                'amount'   =>  $updated_expense_amount,
            ]);
            // dd("petty cash create", $updated_expense_amount);
        }
        else{
            return redirect()->back()->withInput($req->input())->with('error','Your Salary amount is not enough than your petty cash balance');
        }
      }
      $advancesalary = LoanAddvance::where('employee_id',$req->employee)->delete();
 


       $Salary->save();
        return redirect('mehmoodgoodemployee/sallary')->with('message',"Employee Salary Added Successfully");
  
 
 } 
    





 public function update(Request $req){
       

//        $req->validate([
//        'name' => 'required',
//        // 'fname' => 'required',
//        // 'date' => 'required',
//        // 'mobile' => 'required',
//        // 'cnic' => 'required',
// ]);

            $id =  $req->input('pkid');     
          $Salary =  Salary::whereId($id)->first();
       $employee = $req->input('employee');
       $month_salary_date = date('m',strtotime($req->input('date')));
       $year_salary_date = date('Y',strtotime($req->input('date')));

       $Salary->employeecategory = $req->input('employeecategory');
       $Salary->Date =  date('Y-m-d',strtotime($req->input('date')));
       $Salary->employee_id =  $req->input('employee');
       $Salary->OtherDeduction =  $req->input('other_deduction');
       $Salary->Salary =  $req->input('Salary');
       $Salary->payment_method =  $req->input('payment_method');
       $Salary->amount =  $req->input('amount');
       $Salary->advsalary =  $req->input('AdvanceSalary');
       $Salary->Bankid =  $req->input('bank_id');
       
             
             $Oldamount = Salary::where('id',$id)->first();
             $bankamount = Bank_account::where('branch_id',$req->bank_id)->first();
             $oldbank = Bank_account::where('branch_id', $Oldamount->Bankid)->first();
             $Oldamount = Salary::where('id',$id)->first();
             if ($oldbank->id!=$bankamount->branch_id) {
              $plusamount =  $Oldamount->amount;
              $minusamount = $req->input('amount');

               

        $updatedAmount =  $oldbank->amount + $plusamount;
        $bank = Bank_account::where('branch_id',$Oldamount->Bankid)->update(['amount'  => $updatedAmount]);


             }
             else {
              $plusamount =  $Oldamount->amount;
           
               

        $updatedAmount =  $oldbank->amount + $plusamount;
        $bank = Bank_account::where('branch_id',$Oldamount->Bankid)->update(['amount'  => $updatedAmount]);
             }




$CheckEmployee = DB::table('salary')->where(['id'=>$id])->first();
if ($CheckEmployee->employee_id!=$employee) {
 


$CheckEmployeeSalary = DB::table('salary')->where(['employee_id'=>$employee])->whereMonth('Date', '=', $month_salary_date)->whereYear('Date', '=', $year_salary_date)->get();


      if(sizeof($CheckEmployeeSalary)>0){
        return redirect()->back()->with('error',"Salary already issue of this employee");
      }


}

      $w_bank_account = Bank_account::where('id',$req->bank_id)->first();
      if($w_bank_account->amount>$req->amount){

// if(!empty($Salary->employee_id)){
//    return redirect()->back()->withInput($req->input())->with('error',"Already Provided");
// }
      


if ($req->bank_id!=null) {
 
     $updated_w_amount = ($w_bank_account->amount)-($req->amount);
      Bank_account::where('id',$req->bank_id)->update([
                    'amount'   =>  $updated_w_amount,
                ]);

Bank_ledger::create([
                    'bank_account_id'   =>  $req->bank_id,
                    'description'       =>  'Employee Salary',
                    'debit'             =>  null,
                    'credit'            =>  $req->amount,
                    'balance'           =>  $updated_w_amount
                ]);
}
}
else
{

        $updated_w_amount = $req->amount;
 return redirect()->back()->withInput($req->input())->with('error',"Bank Amount less than Salary Amount");
}
$Salary->update();
        return redirect('mehmoodgoodemployee/sallary')->with('message',"Employee Salary Updated Added Successfully");
    }

public function deletesalary(Request $request){
        $employeeloan = Salary::where('id',$request->id)->first();
        $bank = Bank_account::where('id',$employeeloan->Bankid)->first();
        $updatedAmount = $bank->amount + $employeeloan->amount;
        $bank = Bank_account::where('id',$employeeloan->Bankid)->update(['amount'  => $updatedAmount]);         $res =  Salary::with('salaryemployee')->where('id', $request->id)->delete();
            return response()->json($res);
    }


   public function edit($id)
    {

         $employeestype = AddEmployees::select('id','employee_type')->groupBy('employee_type')->get(); 
         $employees = AddEmployees::select('id','employee_name')->distinct('employee_name')->get(); 
         // $Salary = Salary::get();

        $Bank_accounts = Bank_account::all();

        $Salary = Salary::where(['id'=>$id])->with('salaryemployee')->get();
       
        $data['action'] = "addsalary";

        return View('mehmoodgoodemployee/editaddsalary',$data)->with(compact("Bank_accounts",$Bank_accounts,"Salary",$Salary,"employeestype",$employeestype,"employees",$employees));

    }


   public function view($id)
    {

         $employeestype = AddEmployees::select('employee_type','id')->groupBy('employee_type')->get(); 
         $employees = AddEmployees::select('employee_name')->distinct('employee_name')->get(); 
         // $Salary = Salary::get();

        $Bank_accounts = Bank_account::all();


        $Salary = Salary::where(['id'=>$id])->with('salaryemployee')->get();
       
        $data['action'] = "addsalary";

        return View('mehmoodgoodemployee/viewaddsalary',$data)->with(compact("Bank_accounts",$Bank_accounts,"Salary",$Salary,"employeestype",$employeestype,"employees",$employees));

    }




      public function getemployee(Request $req){
      	 // dd($req->employeecategory);
    $employeecategory = $req->input('employeecategory');
    $emp = DB::table('employees')->where(['employee_type'=>$employeecategory])->orderBy('employee_name', 'asc')->get();
    return $emp;
  }
 
     public function EmployeeCurrentSalary($id)
    {
      $balance = DB::table('employees')->where('id',$id)->first();
      return response()->json($balance);
    }

    public function EmployeePaidSalaries($id)
    {
      $salaries = DB::table('salary')->where('employee_id',$id)->get();
      // dd($salaries);
      return response()->json($salaries);
    }

      public function AdvanceSalary($id,$date='')
    {
      
      //  $month_salary_date = date('m');
      // if (!empty($date)) {
      //   $month_salary_date = date('m',strtotime($date));
      // }

      $balance = DB::table('addloanadvance')->where('employee_id',$id)->get();
      // $balance = DB::table('addloanadvance')->where('employee_id',$id)->whereMonth('Date','=',$month_salary_date)->get();
      
      $amount = 0;
      
      foreach ($balance as $key => $value) {
        $amount += $value->amount;
        
      }  
      return response()->json($amount);

 
    }

    

       public function bankAmount($id)
    {
      $balance = Bank_account::where('id',\Crypt::decrypt($id))->first();
      return response()->json($balance);
    }

public function checkotherdeductiontosalary(Request $req){
        $other_deduction = $req->input('other_deduction');
        $advance_salary = $req->input('advance_salary');
        $checkAmount = $advance_salary+$other_deduction;
        // $checksalary = DB::table('salary')->where('employee_id',$req->employee_id)->where('Salary','>',$checkAmount)->first();
        $checksalary = AddEmployees::where('id',$req->employee_id)->where('current_salary','>',$checkAmount)->first();
        // dd($checksalary);
        if(isset($checksalary))
        {
            return "1";
        }
        else{
            return "0";
        }
    }

    }
    



