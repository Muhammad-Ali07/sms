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
use App\Bank_ledger;
use App\Salary;
use App\LoanAddvance;
use View;
use Auth;

class Loanadvance extends BaseController
{



    public function setupindex(){

        $LoanAddvance = LoanAddvance::with('Loanaddvance')->get();

        return View('mehmoodgoodemployee/loanadvance')->with(compact("LoanAddvance",$LoanAddvance));;
    }

    public function addloanadvance(){

     $employeestype = AddEmployees::select('employee_type','id')->groupBy('employee_type')->get(); 

     $employees = AddEmployees::select('employee_name')->distinct('employee_name')->get(); 
     $Bank_accounts = Bank_account::all();
     $LoanAddvance = LoanAddvance::get();

        return View('mehmoodgoodemployee/addloanadvance')->with(compact("Bank_accounts",$Bank_accounts,"employeestype",$employeestype,"employees",$employees,"LoanAddvance",$LoanAddvance));
    }



     public function insert(Request $req){

//        $req->validate([
//        'employeecategory' => 'required',
//        'employee' => 'required',
//        'date' => 'required',
//        'payment_method' => 'required',
//        'Description' => 'required',
//        'amount' => 'required',
//        'bank_id' => 'required',
       

// ]);
            $id =  $req->input('Pid');     
       $LoanAddvance = new LoanAddvance;
       $LoanAddvance->employee_id =  $req->input('employee');
       $LoanAddvance->Date =  date('Y-m-d',strtotime($req->input('date')));
       $LoanAddvance->Type =  $req->input('payment_method');
       $LoanAddvance->description =  $req->input('Description');
       $LoanAddvance->amount =  $req->input('amount');
       $LoanAddvance->Bankid =  $req->input('bank_id');


      $currentsalary = AddEmployees::where('id', $req->input('employee'))->first();
      $advancesalary = LoanAddvance::where('employee_id', $req->input('employee'))->get();
      $totalloan = 0;
      if ($advancesalary!=null) {

      foreach ($advancesalary as $key => $value) {
$totalloan += $value->amount;

}
}

 if($totalloan > $currentsalary->current_salary)
 {
 
 return redirect()->back()->withInput($req->input())->with('error',"Current Salary Is Less Than Your Loan Amount");
 }
      $w_bank_account = Bank_account::where('id',$req->bank_id)->first();

      if(isset($w_bank_account['amount']) && $w_bank_account['amount'] > $req->amount){

     
if ($req->bank_id!=null) {
 
     $updated_w_amount = ($w_bank_account->amount)-($req->amount);
     Bank_account::where('id',$req->bank_id)->update([
                    'amount'   =>  $updated_w_amount,
                ]); 

Bank_ledger::create([
                    'bank_account_id'   =>  $req->bank_id,
                    'description'       =>  'Loan Advance',
                    'debit'             =>  null,
                    'credit'            =>  $req->amount,
                    'balance'           =>  $updated_w_amount
                ]);
}
}


 


       $LoanAddvance->save();
        return redirect('mehmoodgoodemployee/loanadvance')->with('message',"Loanadvance Added Successfully");
  
 
 }



  public function edit($id)
    {

         $employeestype = AddEmployees::select('id','employee_type')->groupBy('employee_type')->get(); 
         $employees = AddEmployees::select('id','employee_name')->distinct('employee_name')->get(); 
         // $Salary = Salary::get();

        $Bank_accounts = Bank_account::all();


        $LoanAddvance = LoanAddvance::where(['id'=>$id])->with('Loanaddvance')->get();
       
        $data['action'] = "addsalary";

        return View('mehmoodgoodemployee/editaddloanadvance',$data)->with(compact("Bank_accounts",$Bank_accounts,"LoanAddvance",$LoanAddvance,"employeestype",$employeestype,"employees",$employees));

    }


 public function view($id)
    {

         $employeestype = AddEmployees::select('employee_type','id')->groupBy('employee_type')->get(); 
         $employees = AddEmployees::select('employee_name')->distinct('employee_name')->get(); 
         // $Salary = Salary::get();

        $Bank_accounts = Bank_account::all();


        $LoanAddvance = LoanAddvance::where(['id'=>$id])->with('Loanaddvance')->get();
       
        $data['action'] = "addsalary";

        return View('mehmoodgoodemployee/viewaddloanadvance',$data)->with(compact("Bank_accounts",$Bank_accounts,"LoanAddvance",$LoanAddvance,"employeestype",$employeestype,"employees",$employees));

    }

     public function update(Request $req){
       

//        $req->validate([
//        'employeecategory' => 'required',
//        'employee' => 'required',
//        'date' => 'required',
//        'payment_method' => 'required',
//        'Description' => 'required',
//        'amount' => 'required',
//        'bank_id' => 'required',
       

// ]);
            $id =  $req->input('Pid');     
            $Id =  $req->input('pkid');     
          $LoanAddvance =  LoanAddvance::whereId($Id)->first();
       $LoanAddvance->employee_id =  $req->input('employee');
       $LoanAddvance->Date =  date('Y-m-d',strtotime($req->input('date')));
       $LoanAddvance->Type =  $req->input('payment_method');
       $LoanAddvance->description =  $req->input('Description');
       $LoanAddvance->amount =  $req->input('amount');
       $LoanAddvance->Bankid =  $req->input('bank_id');



             $Oldamount = LoanAddvance::where('id',$Id)->first();
             $bankamount = Bank_account::where('branch_id',$req->bank_id)->first();
             //dd($Oldamount);
             $oldbank = Bank_account::where('branch_id', $Oldamount->Bankid)->first();
             $Oldamount = LoanAddvance::where('id',$Id)->first();
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


      $currentsalary = AddEmployees::where('id',$req->Pid)->first();
      $advancesalary = LoanAddvance::where('employee_id',$req->Pid)->get();
      $totalloan = 0;
      if ($advancesalary!=null) {

      foreach ($advancesalary as $key => $value) {
$totalloan += $value->amount;

}
}

 if($totalloan>$req->current_salary)
 {
 
 return redirect()->back()->withInput($req->input())->with('error',"Current Salary Is Less Than Your Loan Amount");
 }
      $w_bank_account = Bank_account::where('id',$req->bank_id)->first();

      if($w_bank_account->amount > $req->amount){

     


if ($req->bank_id!=null) {
 
     $updated_w_amount = ($w_bank_account->amount)-($req->amount);
      Bank_account::where('id',$req->bank_id)->update([
                    'amount'   =>  $updated_w_amount,
                ]);

Bank_ledger::create([
                    'bank_account_id'   =>  $req->bank_id,
                    'description'       =>  'Loan Advance',
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



       $LoanAddvance->update();
        return redirect('mehmoodgoodemployee/loanadvance')->with('message',"Loanadvance Updated Successfully");
  
 
 }
 
public function deleteloanadvance(Request $request){

        $employeeloan = LoanAddvance::where('id',$request->id)->first();
        $bank = Bank_account::where('id',$employeeloan->Bankid)->first();
        $updatedAmount = $bank->amount + $employeeloan->amount;
        $bank = Bank_account::where('id',$employeeloan->Bankid)->update(['amount'  => $updatedAmount]);
        $res =  LoanAddvance::with('Loanaddvance')->where('id', $request->id)->delete();
            
        return response()->json($res);
    }    


public function previousadvancesalary($id)
    {

    $balance = DB::table('addloanadvance')->where('employee_id',$id)->get();
    
    $amount = 0;
      
      foreach ($balance as $key => $value) {
        $amount += $value->amount;
        
      }  
      return $amount;

 
    }


}
