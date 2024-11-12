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

use App\Customer;

use App\Bank_branch;

use App\dbmodel;

use View;

use Auth;



class Dailycash extends BaseController
{
    public function index(){
        return View('mehmoodgoodemployee/dailycash');
    }

    public function cashrecipt(){
        $customers  	= Customer::with('phoneno')->get();
        $banks      	= Bank_branch::with('bank')->get();
  		$cash_reciepts 	= DB::select('SELECT * FROM cash_reciept,customer WHERE cash_reciept.customer_id = customer.id'); 

        return View('mehmoodgoodemployee/cashrecipt',compact('customers','banks','cash_reciepts'));

    }

    public function cashjournal(){

        return View('mehmoodgoodemployee/cashjournal');

    }

    public function cashreciptreports(){
        return View('mehmoodreports/cashreciptreports');
    }

    public function add_cash_reciept(Request $req){
    
      //  dd("insert into users (bank_id, customer_id, transtype, gl_account, ref_account, doc_date,description, amount,doc_serial') values ('".$req->bank_id."','".$req->customer_id."','".$req->transtype."','".$req->gl."','".$req->ref."','".$req->document_date."','".$req->description."','".$req->amount."','".$req->docserial."')");

        $result = DB::insert("insert into cash_reciept (bank_id, customer_id, transtype, gl_account, ref_account, doc_date,description, amount, doc_serial) VALUES ('".$req->bank_id."','".$req->customer_id."','".$req->transtype."','".$req->gl."','".$req->ref."','".$req->document_date."','".$req->description."','".$req->amount."','".$req->docserial."')");

        if($result){
        	return redirect('mehmoodgoodemployee/cashrecipt')->with('success_mssg','Cash reciept added successfully');
        }else{
        	return redirect('mehmoodgoodemployee/cashrecipt')->with('fail_mssg','Something went worng please try again');
        }
    }





}

