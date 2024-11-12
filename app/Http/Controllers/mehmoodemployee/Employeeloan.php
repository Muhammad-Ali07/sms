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
use App\Bank_account;
use App\Loan;
use App\Bank_ledger;
use View;
use Auth;

class Employeeloan extends BaseController
{



    public function employeloan(){

      $EmployeeLoan = Loan::with('salaryemployee')->get();

        return View('mehmoodgoodemployee/employeloan')->with(compact("EmployeeLoan",$EmployeeLoan));
    }

    public function addemployeloan(){

       $employeestype = AddEmployees::select('employee_type','id')->groupBy('employee_type')->get(); 
    	$employees = AddEmployees::select('employee_name')->distinct('employee_name')->get(); 

        $Bank_accounts = Bank_account::all();
        $EmployeeLoan = Loan::get();
        return View('mehmoodgoodemployee/addemployeloan')->with(compact("Bank_accounts",$Bank_accounts,"employeestype",$employeestype,"employees",$employees,"EmployeeLoan",$EmployeeLoan));
    }


public function insert(Request $req){
       

       $EmployeeLoan = new Loan;
       $EmployeeLoan->employee_id =  $req->input('employee');
       $EmployeeLoan->LoanType = $req->input('loantype');
       $EmployeeLoan->Date =  date('Y-m-d',strtotime($req->input('date')));
       $EmployeeLoan->payment_method =  $req->input('payment_method');
       $EmployeeLoan->amount =  $req->input('amount');       
       $EmployeeLoan->Bankid =  $req->input('bank_id');
       $loantype = $req->input('loantype');


if($loantype =="Loan"){

      $w_bank_account = Bank_account::where('id',$req->bank_id)->first();

      if(!empty($w_bank_account->amount) && $w_bank_account->amount > $req->amount){

if ($req->bank_id!=null) {
 
     $updated_w_amount = ($w_bank_account->amount)-($req->amount);
      Bank_account::where('id',$req->bank_id)->update([
                    'amount'   =>  $updated_w_amount,
                ]);

Bank_ledger::create([
                    'bank_account_id'   =>  $req->bank_id,
                    'description'       =>  'Employee Loan',
                    'debit'             =>  null,
                    'credit'            =>  $req->amount,
                    'balance'           =>  $updated_w_amount
                ]);
}
}

 
}



if($loantype =="Loan Return"){

      $w_bank_account = Bank_account::where('id',$req->bank_id)->first();
     

if ($req->bank_id!=null) {
 
     $updated_w_amount = ($w_bank_account->amount)+($req->amount);
      Bank_account::where('id',$req->bank_id)->update([
                    'amount'   =>  $updated_w_amount,
                ]);

Bank_ledger::create([
                    'bank_account_id'   =>  $req->bank_id,
                    'description'       =>  'Employee Loan Return',
                    'debit'             =>  $req->amount,
                    'credit'            =>  null,
                    'balance'           =>  $updated_w_amount
                ]);
}
}





       $EmployeeLoan->save();
        return redirect('mehmoodgoodemployee/employeloan')->with('message',"Employee Salary Added Successfully");
  
 
 }

public function deleteloan(Request $request){
            $employeeloan = Loan::where('id',$request->id)->first();
            $bank = Bank_account::where('id',$employeeloan->Bankid)->first();
            $updatedAmount = $bank->amount + $employeeloan->amount;
            $bank = Bank_account::where('id',$employeeloan->Bankid)->update([
              'amount'  => $updatedAmount
            ]);
            $res =  Loan::with('salaryemployee')->where('id', $request->id)->delete();
            
            return response()->json($res);
    }

 public function edit($id)
    {

         $employeestype = AddEmployees::select('id','employee_type')->groupBy('employee_type')->get(); 
         $employees = AddEmployees::select('id','employee_name')->distinct('employee_name')->get(); 
         // $Salary = Salary::get();

        $Bank_accounts = Bank_account::all();


        $EmployeeLoan = Loan::where(['id'=>$id])->with('salaryemployee')->get();
       
        $data['action'] = "addemployeloan";

        return View('mehmoodgoodemployee/editaddemployeloan',$data)->with(compact("Bank_accounts",$Bank_accounts,"EmployeeLoan",$EmployeeLoan,"employeestype",$employeestype,"employees",$employees));

    }


public function view($id)
    {

         $employeestype = AddEmployees::select('employee_type','id')->groupBy('employee_type')->get(); 
         $employees = AddEmployees::select('employee_name')->distinct('employee_name')->get(); 
         // $Salary = Salary::get();

        $Bank_accounts = Bank_account::all();


        $EmployeeLoan = Loan::where(['id'=>$id])->with('salaryemployee')->get();
       
        $data['action'] = "addemployeloan";

        return View('mehmoodgoodemployee/viewaddemployeloan',$data)->with(compact("Bank_accounts",$Bank_accounts,"EmployeeLoan",$EmployeeLoan,"employeestype",$employeestype,"employees",$employees));

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
          $EmployeeLoan =  Loan::whereId($id)->first();


       $EmployeeLoan->employee_id =  $req->input('employee');
       $EmployeeLoan->LoanType = $req->input('loantype');
       $EmployeeLoan->Date =  date('Y-m-d',strtotime($req->input('date')));
       $EmployeeLoan->payment_method =  $req->input('payment_method');
       $EmployeeLoan->amount =  $req->input('amount');       
       $EmployeeLoan->Bankid =  $req->input('bank_id');
       $loantype = $req->input('loantype');

             $Oldamount = Loan::where('id',$id)->first();
             $bankamount = Bank_account::where('branch_id',$req->bank_id)->first();
             //dd($Oldamount);
             $oldbank = Bank_account::where('branch_id', $Oldamount->Bankid)->first();
             $Oldamount = Loan::where('id',$id)->first();
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



if($loantype =="Loan"){

      $w_bank_account = Bank_account::where('id',$req->bank_id)->first();
      if($w_bank_account->amount>$req->amount){

if ($req->bank_id!=null) {
 
     $updated_w_amount = ($w_bank_account->amount)-($req->amount);
      Bank_account::where('id',$req->bank_id)->update([
                    'amount'   =>  $updated_w_amount,
                ]);

Bank_ledger::create([
                    'bank_account_id'   =>  $req->bank_id,
                    'description'       =>  'Employee Loan',
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



if($loantype =="Loan Return"){

      $w_bank_account = Bank_account::where('id',$req->bank_id)->first();
     

if ($req->bank_id!=null) {
 
     $updated_w_amount = ($w_bank_account->amount)+($req->amount);
      Bank_account::where('id',$req->bank_id)->update([
                    'amount'   =>  $updated_w_amount,
                ]);

Bank_ledger::create([
                    'bank_account_id'   =>  $req->bank_id,
                    'description'       =>  'Employee Loan Return',
                    'debit'             =>  $req->amount,
                    'credit'            =>  null,
                    'balance'           =>  $updated_w_amount
                ]);
}
}




       $EmployeeLoan->update();
        return redirect('mehmoodgoodemployee/employeloan')->with('message',"Employee Loan / Loan Return Updated Added Successfully");
    }
 public function previousloan($id)
    {

    $balance = DB::table('employeeloan')->where('employee_id',$id)->where('LoanType','Loan')->get();
    
    $amount = 0;
      
      foreach ($balance as $key => $value) {
        $amount += $value->amount;
        
      }  
      return $amount;

 
    }


 public function previousloanreturn($id)
    {

    $balance = DB::table('employeeloan')->where('employee_id',$id)->where('LoanType','Loan Return')->get();
     $loanbalance = DB::table('employeeloan')->where('employee_id',$id)->where('LoanType','Loan')->get();
    
    $amountminus = 0;
    $loanamount = 0;


if($balance!="0"){
      foreach ($balance as $key => $value) {
        $amountminus += $value->amount;
        
      }
       foreach ($loanbalance as $key => $value) {
        $loanamount  += $value->amount;
        
      }
      $amount= $loanamount-$amountminus;

      return $amount;
    }
    else{
      $amount =0;
      return $amount;
    }
  }






}
