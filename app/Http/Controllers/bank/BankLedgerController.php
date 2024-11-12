<?php

namespace App\Http\Controllers\bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank_ledger;
use App\Bank_branch;
use App\Bank_account;
use App\Customer;
use PDF;


class BankLedgerController extends Controller
{
    public function index()
    {
    	$ledger = Bank_ledger::all();
        $bankwihbranch = Bank_branch::with('bank')->get();
        
    	return view('mehmoodgoodemployee.bankledger.bankledger',compact('bankwihbranch',$bankwihbranch,'ledger',$ledger));
    }

     public function bankledger(Request $req)
      {
      	         $Validation = $req->validate([
                'banks' => 'required',
               ]);
        
	      	    $query = Bank_branch::has('receipt')->with('receipt')->with('bank');
                 $from = $req->input('from_date');
                 $to = $req->input('to_date');

	      	    /* $bank_branch = Bank_branch::has('receipt')->with('receipt')->with('bank')->where('id',$req->input('banks'))->get(); */
	      	      $bank_branch = Bank_ledger::where('bank_account_id',$req->input('banks'));
	      	     
	      	    


                  
	      	     if($req->input('from_date')!="" && $req->input('to_date'))
	      	    {

	      	    	// dd($query);
	          /*    $bank_branch = Bank_branch::whereHas('receipt', function ($q) use ($from,$to) {
                    $q->whereBetween('date', [$from, $to]);
                    })->where('id',$req->input('banks'))->get(); */
                     $bank_branch->whereBetween('created_at',[$from,$to]);

	             
	             
	      	    }
	      	   
	         
		    	
		    $bank_account = Bank_account::where('id',$req->input('banks'))->first();
		    $bankname = Bank_branch::where('id', $bank_account->branch_id)->with('bank')->first();
		  
		    $bank =  $bankname; 
		    $ledger = $bank_branch->get();
		    
		   
		    $from = $req->input('from_date');
		    $to = $req->input('to_date');
		     //  dd($data['ledger']);
//dd($data);
		  //  PDF::SetTitle('Bank Ledger Report');
	        //PDF::SetFont('freeserif', '', 12, '', true);
	        //PDF::AddPage();
	        //PDF::writeHTML(view('mehmoodgoodemployee/bankledger/bankledger_pdf_report',$data)->render(),true, 0, true, 0);
	        //return PDF::Output('Bank Ledger Report.pdf'); 
return view('mehmoodgoodemployee/bankledger/bankledger_pdf_report',compact('bank','ledger','from','to'));
      }
}
