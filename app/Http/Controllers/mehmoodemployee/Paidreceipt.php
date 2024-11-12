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

use Illuminate\Support\Facades\Facade;
use PDF;
use DB;
use Session;
use App\User;
use App\PaidReceiptBroker;
use App\Customer;
use App\Billmeta;
use App\BrokerBalance;
use App\Bank;
use App\Bank_account;
use App\Biltys;
use App\VehicleSetup;
use App\dbmodel;
use App\Paymenttype;
use App\Ledger;
use App\Petty_cash;
use App\Bank_branch;
use App\Bank_ledger;
use mpdf\mpdf;
use App\Accountwallet;

use App\Receipt;
use View;
use Auth;

class Paidreceipt extends BaseController
{



    public function index(){

        return View('mehmoodgoodemployee/paidreceipt');
    }

 
   public function paidreceiptcustomer(){
        $customer = Customer::with('phoneno')->get();
        $banks =     Bank_branch::with('bank')->get();
        $bank_accounts = Bank_account::get();
        $paymenttype =  Paymenttype::get();
        $records = Receipt::with('getcustomer')->with('getpayment')->with('getbank')->get(); 


        return view('mehmoodgoodemployee/paidreceiptcustomer')->with(compact('customer',$customer,'banks',$banks,'paymenttype',$paymenttype,'records',$records,'bank_accounts',$bank_accounts));
    }

     public function paidreceiptbroker(){
        $broker = VehicleSetup::get();
        $banks =     Bank_branch::with('bank')->get();
        $bank = Bank_account::all();
        $bank_accounts = Bank_account::get();
        $paymenttype =  Paymenttype::get();
        $records = PaidReceiptBroker::with('getbroker')->get(); 
       return view('mehmoodgoodemployee/paidreceiptbroker')->with(compact('broker',$broker,'banks',$banks,'paymenttype',$paymenttype,'records',$records,'bank_accounts',$bank_accounts,'bank',$bank));
    }



   public function customerledger(){
        $customer = Customer::with('phoneno')->get();
        $bank =     Bank::get();
        $paymenttype =  Paymenttype::get();
        $records = Receipt::with('getcustomer')->with('getpayment')->with('getbank')->get(); 
      

        return view('mehmoodgoodemployee/customerledger/customerledger')->with(compact('customer',$customer,'bank',$bank,'paymenttype',$paymenttype,'records',$records));
    }

    public function brokerledger(){
        $broker = VehicleSetup::get();
        $bank =     Bank::get();
        $paymenttype =  Paymenttype::get();
        $records = Receipt::with('getcustomer')->with('getpayment')->with('getbank')->get(); 
      

        return view('mehmoodgoodemployee/brokerledger/brokerledger')->with(compact('broker',$broker,'bank',$bank,'paymenttype',$paymenttype,'records',$records));
    }

    public function generatecustomerledger(Request $req){
       
        
        $customerid = $req->input('customer_id');
        $datefrom = $req->input('datefrom');  
        $dateto = $req->input('dateto');  
       
         $query3 = Billmeta::with('getledger')->with('getbilty')->whereHas('getbilty', function ($query) use ($customerid) {
         
         
                   
           $query->where('sender_id','=',$customerid);
             });

          $query4 = Ledger::where('bill_id','=', NULL)->with('getreceipt')->whereHas('getreceipt', function ($query) use ($customerid) {
         
         
                 
           $query->where('customer_id','=',$customerid);
             });



          $customer = Customer::where('id',$customerid)->first();
       //  dd($query3->get());
        //model =  Biltys::with('getbillmeta')->has('getbillmeta');
          $model = Receipt::with('getbank');

        //  $model = Receipt::with('getbank');
        if($datefrom!="" && $dateto!="" )
         {
          
        
          $from = date("Y-m-d", strtotime($datefrom));
          $to = date("Y-m-d", strtotime( $dateto));
         $query3->whereBetween('created_at',[$from, $to]); 
         $query4->whereBetween('created_at',[$from, $to]);   
                   
       //  $query->whereBetween('created_at', [$from, $to]);
       //    });
        
          }
        $data['debit'] =  $query3->get();
         $data['withoutbill'] =  $query4->get();
        $data['from'] =  $datefrom;
         $data['to'] =    $dateto;
         $data['customer'] = $customer;

          return redirect()->back();
          //return redirect('/mehmoodgoodemployee/generatecustomerledger'); 
        //PDF::SetTitle('Customer Ledger Report');
        //PDF::SetFont('freeserif', '', 12, '', true);
        //PDF::AddPage();
        //PDF::writeHTML(view('mehmoodgoodemployee/customerledger/ledger_pdf_report',$data)->withModel($model)->render(),true, 0, true, 0);
        //return PDF::Output('Customer Ledger Report.pdf'); 
    }

     public function generatebrokerledger(Request $req){
       
        
        $brokerid = $req->input('broker_id');
        $datefrom = $req->input('datefrom');  
        $dateto = $req->input('dateto');
        $model = Bank_account::with('branch.bank');  
         
        $query = PaidReceiptBroker::where('broker_id',$brokerid);

        //  $model = Receipt::with('getbank');
        if($datefrom!="" && $dateto!="" )
         {
            $from = date("Y-m-d", strtotime($datefrom));
            $to = date("Y-m-d", strtotime( $dateto));
            $query->whereBetween('date',[$from, $to]); 
            $query->whereBetween('date',[$from, $to]);   
          }
       
         $brokerdata = $query->with('getbroker')->get();

        

         $from = $datefrom;
         $to =  $dateto;
        
          
        //PDF::SetTitle('Customer Ledger Report');
        //PDF::SetFont('freeserif', '', 12, '', true);
        //PDF::AddPage();
        //PDF::writeHTML(view('mehmoodgoodemployee/brokerledger/ledger_pdf_report',$data)->withModel($model)->render(),true, 0, true, 0);
        //return PDF::Output('Customer Ledger Report.pdf');
return view('mehmoodgoodemployee/brokerledger/ledger_pdf_report',compact('brokerdata','from','to')); 
    }
  
    public function getpaidtable(Request $req)
     {
      $customerid = $req->input('customer_name');

      $billmeta = Billmeta::whereHas('getbill', function ($query)use ($customerid) {
       $query->where('customer_id',$customerid);
         })->with('getbilty')->doesnthave('getledger')->get();
    
     
   
      return $billmeta;
       
     }


     public function getbillbalance(Request $req)
     {
      $billid = $req->input('id');
      
      $billmeta = Billmeta::whereHas('getbilty')->where('id',$billid)->get();
     
      $totalamount = 0;
      foreach ($billmeta[0]->getbilty as $key => $value) {
        $totalamount  += $value->total_charges;
        # code...
      }

     
   
      return $totalamount;
       
     }

     public function getbrokerbalance(Request $req)
     {
      $brokerid = $req->input('broker');
      
      $billmeta = BrokerBalance::where('vehicle_id',$brokerid)->first();
      return $billmeta;
       
     }
      public function getbankbalance(Request $req)
     {
      $branchid = $req->input('type');
      
      $account = Bank_account::where('branch_id', $branchid)->first();
      return  $account->amount;
       
     }
      public function getpettycashamount()
     {
      
      
      $pettycashamount = Petty_cash::first();
      return $pettycashamount->amount;
       
     }
    public function gettopaybalance(Request $req)
     {
      $customer = $req->input('customer');

      $bilty = Biltys::where('sender_id',$customer)->get();
       $accountwallet = Accountwallet::where('customer_id',$customer)->first();
      $customerbalance = Accountwallet::where('customer_id',$customer)->sum('balance');

      if($customerbalance==0)
      {
        $customerbalance = Receipt::where('customer_id',$customer)->sum('enter_amount'); 
         $amount = 0;
      foreach ($bilty as $key => $value) {
        $amount  += $value->total_charges;
        # code...
      }
      $totalamount =  -$amount+$customerbalance;
      }

       else{

           $biltyamount = Biltys::where(['sender_id'=>$customer,'bilty_type'=>"ToPay"])->where('created_at', '>=',$accountwallet->updated_at)->sum('total_charges');

           if($biltyamount==0)
           {
           $totalamount =  $customerbalance;
           }
           else{
             $totalamount = -$biltyamount+$customerbalance;
           }
        }
     
     
     
     
   
      return $totalamount;
       
     }

      public function getwalletbalance(Request $req)
     {
      $customer = $req->input('customer');
     
      $wallet = Accountwallet::where('customer_id',$customer)->first();
      if($wallet!="") 
      {
       $balance =  $wallet->balance;
      }
      else{
        $balance = 0;
      }

     
   
      return  $balance;
       
     }
      public function insertbroker(Request $req)
    {
      
     
      //if customer type paid selected

              $req->validate([
              'date' => 'required',
              'customer_id' => 'required',
              'balancetype' => 'required',
               'paymenttype'    => 'required',
               'amount'    => 'required',
               "description"  => "required|distinct"
                ]); 
             $paidbroker = new PaidReceiptBroker;
             if($req->input('balancetype')=="Payable")
             {
                if($req->input('paymenttype')=="Petty Cash")
                {
                  $pettycash = Petty_cash::first();
                  $pettycash->decrement('amount',$req->input('amount'));
                  $brokerbalance = BrokerBalance::where('vehicle_id',$req->input('customer_id'))->first();
                  $brokerbalance->decrement('payable',$req->input('amount'));

                }
                if($req->input('paymenttype')=="Bank")
                {
                   $req->validate([
                   'bankid' => 'required',
                    ]); 
                  $bankamount = Bank_account::where('branch_id',$req->input('bankid'))->first();
                  $bankamount->decrement('amount',$req->input('amount'));
                  $brokerbalance = BrokerBalance::where('vehicle_id',$req->input('customer_id'))->first();
                  $brokerbalance->decrement('payable',$req->input('amount'));
                  $paidbroker->branch_id  = $req->input('bankid');
                  $paidbroker->cheque_no = $req->input('chequeno');

                }
             }
             if($req->input('balancetype')=="Receivable")
             {
                if($req->input('paymenttype')=="Petty Cash")
                {
                  $pettycash = Petty_cash::first();
                  $pettycash->increment('amount',$req->input('amount'));
                  $brokerbalance = BrokerBalance::where('vehicle_id',$req->input('customer_id'))->first();
                  $brokerbalance->decrement('receivable',$req->input('amount'));

                }
                if($req->input('paymenttype')=="Bank")
                {
                   $req->validate([
                   'bankid' => 'required',
                    ]); 
                  $bankamount = Bank_account::where('branch_id',$req->input('bankid'))->first();
                  $bankamount->increment('amount',$req->input('amount'));
                  $brokerbalance = BrokerBalance::where('vehicle_id',$req->input('customer_id'))->first();
                  $brokerbalance->decrement('receivable',$req->input('amount'));
                  $paidbroker->branch_id = $req->input('bankid');
                  $paidbroker->cheque_no = $req->input('chequeno');
                  

                }
             }
            
              $paidbroker->balance_type = $req->input('balancetype');
              $paidbroker->payment_type = $req->input('paymenttype');
              $paidbroker->date = date("Y-m-d", strtotime($req->input('date')));
              $paidbroker->broker_id = $req->input('customer_id');
              $paidbroker->amount = $req->input('amount');
              $paidbroker->description = $req->input('description');
              $paidbroker->save();
          return redirect()->back()->with('message','Receipt added successfully cash inserted in account');

      }   


    public function insert(Request $req)
    {
      
      $billno = $req->input('bill_id');
      //if customer type paid selected
    if($req->input('customer_type')=="Paid")
    {

              $req->validate([
              'customer_type' => 'required',
              'customer_id' => 'required',
              'date' => 'required',
              'paymenttype' => 'required',
               'amount'    => 'required',
               'billamount'    => 'required',
               "bill_id.*"  => "required|distinct"
                ]);   
           
          $paymenttype =  Paymenttype::where('id',$req->input('paymenttype'))->first();
          //for saving entry in main receipt table
           if($paymenttype->name=="bank")
          {  
                $req->validate([
                'bankid' => 'required',
                'chequeno' => 'required',
                  ]);   


              $originalDate = $req->input('date');
              $newDate = date("Y-m-d", strtotime($originalDate));
              $receipt = new Receipt;
              $receipt->customer_id = $req->input('customer_id');
              $receipt->date =  $newDate;
              $receipt->total_amount = $req->input('billamount');
              $receipt->enter_amount = $req->input('amount');
              $receipt->payment_id = $req->input('paymenttype');
              $receipt->bank_id =     $req->input('bankid');
              $receipt->cheque_no =  $req->input('chequeno');
              $receipt->save();
              //for updating bank balance
               $bankaccount = Bank_account::where('id',$req->input('bankid'))->first();
               $updatebalance = $bankaccount->amount+$req->input('amount');
               $bankaccount->amount = $updatebalance;
               $updated_expense_amount = $req->amount+$bankaccount->amount;
               $bankaccount->update();
               $customername = Customer::where('id',$req->input('customer_id'))->first();
                 Bank_ledger::create([
                    'bank_account_id'   =>  $req->input('bankid'),
                    'description'       =>  'amount against customer'."".$customername->customer_name,
                    'debit'             =>  $req->amount,
                    'credit'            =>  null,
                    'balance'           =>  $updated_expense_amount
                  ]);

          }
          //if cash selected
        else{
               $originalDate = $req->input('date');
             $newDate = date("Y-m-d", strtotime($originalDate));
              $receipt = new Receipt;
              $receipt->customer_id = $req->input('customer_id');
              $receipt->date =  $newDate;
              $receipt->total_amount = $req->input('billamount');
              $receipt->enter_amount = $req->input('amount');
              $receipt->payment_id = $req->input('paymenttype');
              $receipt->save();
               //for updating petty cash
               $pettycash = Petty_cash::first();
               $adjustbalance =  $pettycash->amount+$req->input('amount');
               $pettycash->amount =  $adjustbalance;
               $pettycash->update();
        }
         //FOR SAVING BALANCE IN CUSTOMER WALLET
         if($req->input('balance')>0)
          {
            $checkwallet = Accountwallet::where('customer_id',$req->input('customer_id'))->first();
            //if record of that customer exist update that
            if($checkwallet!="")
            {
              $checkwallet->balance   =  $req->input('balance');
              $checkwallet->update();  
            }  
            //otherwise make new record
            else
            {
              $wallet = new Accountwallet;
              $wallet->customer_id = $req->input('customer_id');
              $wallet->balance   =  $req->input('balance');
              $wallet->save();
            }
         }
          //if only enter amount is greater or equal then it will make ledger otherwise
          //no ledger will be mainatained
           if($req->input('amount')>=$req->input('billamount'))
           {
            //for saving enteries in ledger on the basis of selected bill checkboxes
              if(isset($billno[0]))
              { 
             
                foreach ($billno as $key => $value)
                   {
                    # 
                      $billmeta = Billmeta::where('id',$value)->first();
                  
                      $ledger = new Ledger;
                      $ledger->receipt_id =  $receipt->id;
                      $ledger->details =  "Amount is entered against";
                      $ledger->bill_id =      $billmeta->bill_id;
                      $ledger->save();
                
                    }
               }
         }
 }

  //if payment of topay customer paid
  if($req->input('customer_type')=="ToPay")
     {
       $req->validate([
        'customer_type' => 'required',
        'customer_id' => 'required',
        'date' => 'required',
        'paymenttype' => 'required',
         'amount'    => 'required',
          ]);   
      
      $paymenttype =  Paymenttype::where('id',$req->input('paymenttype'))->first();
      //for saving entry in main receipt table
       if($paymenttype->name=="bank")
      {  
           $req->validate([
          'bankid' => 'required',
          'chequeno' => 'required',
            ]); 

        $originalDate = $req->input('date');
       $newDate = date("Y-m-d", strtotime($originalDate));
        $receipt = new Receipt;
        $receipt->customer_id = $req->input('customer_id');
        $receipt->date =  $newDate;
        $receipt->enter_amount = $req->input('amount');
        $receipt->payment_id = $req->input('paymenttype');
        $receipt->bank_id =     $req->input('bankid');
        $receipt->cheque_no =  $req->input('chequeno');
        $receipt->save();
        //for updating bank balance
         $bankaccount = Bank_account::where('branch_id',$req->input('bankid'))->first();
         $updatebalance = $bankaccount->amount+$req->input('amount');
         $bankaccount->amount = $updatebalance;
         $bankaccount->update();
          $updated_expense_amount = $req->amount+$bankaccount->amount;
          $customername = Customer::where('id',$req->input('customer_id'))->first();
          Bank_ledger::create([
                    'bank_account_id'   =>  $req->input('bankid'),
                    'description'       =>  'amount against customer'."".$customername->customer_name,
                    'debit'             =>  $req->amount,
                    'credit'            =>  null,
                    'balance'           =>  $updated_expense_amount
                  ]);

      }
      //if cash is selected
    else{
            $originalDate = $req->input('date');
            $newDate = date("Y-m-d", strtotime($originalDate));
            $receipt = new Receipt;
            $receipt->customer_id = $req->input('customer_id');
            $receipt->date =  $newDate;
            $receipt->total_amount = $req->input('billamount');
            $receipt->enter_amount = $req->input('amount');
            $receipt->payment_id = $req->input('paymenttype');
            $receipt->save();
            $pettycash = Petty_cash::first();
            $adjustbalance =  $pettycash->amount+$req->input('amount');
            $pettycash->amount =  $adjustbalance;
            $pettycash->update();
    }
     //FOR SAVING BALANCE IN CUSTOMER WALLET
     if($req->input('balance')>0)
        {
        $checkwallet = Accountwallet::where('customer_id',$req->input('customer_id'))->first();
        //if record of that customer exist update that
        if($checkwallet!="")
        {
          $checkwallet->balance   =  $req->input('balance');
          $checkwallet->update();  
        }  
        //otherwise make new record
        else
        {
          $wallet = new Accountwallet;
          $wallet->customer_id = $req->input('customer_id');
          $wallet->balance   =  $req->input('balance');
          $wallet->save();
        }
     }

      //for saving enteries in ledger on the basis of selected bill checkboxes
     
          # 
      $ledger = new Ledger;
      $ledger->receipt_id =  $receipt->id;
      $ledger->details =  "Amount against customer";
      $ledger->save();
    
 }



    return redirect()->back()->with('message','Receipt added successfully cash inserted in account');
}
public function viewpaidreceiptbroker($id)
{
  
        $records = PaidReceiptBroker::where('id',$id)->with('getbroker')->first(); 
        $broker = VehicleSetup::where('id',$records->broker_id)->get();
        $banks =     Bank_branch::with('bank')->get();
        $bank = Bank_account::all();
        $bank_accounts = Bank_account::get();
        $paymenttype =  Paymenttype::get();
        $billmeta = BrokerBalance::where('vehicle_id',$records->broker_id)->first();
        $payable = $billmeta->payable-$records->amount;
        $receivable = $billmeta->receivable-$records->amount;
        
       return view('mehmoodgoodemployee/editpaidreceiptbroker')->with(compact('broker',$broker,'banks',$banks,'paymenttype',$paymenttype,'records',$records,'bank_accounts',$bank_accounts,'bank',$bank,'payable',$payable,'receivable',$receivable));
}
public function viewpaidreceipt($id)
{
  
   $customer = Customer::with('phoneno')->get();
  $bank =     Bank::get();
  $paymenttype =  Paymenttype::get();
  $records = Receipt::where('id',$id)->with('getcustomer')->with('getpayment')->with('getbank')->get(); 
  return view('mehmoodgoodemployee/editpaidreceiptcustomer')->with(compact('customer',$customer,'bank',$bank,'paymenttype',$paymenttype,'records',$records));
}
public function deletepaidreceipt(Request $req)
{
  
   $res =  Receipt::where('id', $req->id)->delete();
            return response()->json($res);
}

public function deletebrokerpaidreceipt(Request $req)
{
  
   $brokerreceipt =  PaidReceiptBroker::where('id', $req->id)->first();
   if($brokerreceipt->payment_type=="Petty Cash")
   {
    if($brokerreceipt->balance_type=="Receivable")
    {
    $pettycash = Petty_cash::first();
    $pettycash->decrement('amount', $brokerreceipt->amount);
    $brokerbalance = BrokerBalance::where('vehicle_id', $brokerreceipt->broker_id)->first();
    $brokerbalance->increment('receivable', $brokerreceipt->amount);
    }
    if($brokerreceipt->balance_type=="Payable")
    {
    $pettycash = Petty_cash::first();
    $pettycash->increment('amount', $brokerreceipt->amount);
     $brokerbalance = BrokerBalance::where('vehicle_id', $brokerreceipt->broker_id)->first();
    $brokerbalance->increment('payable', $brokerreceipt->amount);
    }
   }
   if($brokerreceipt->payment_type=="Bank")
   {
    if($brokerreceipt->balance_type=="Receivable")
    {
    $bank = Bank_account::where('branch_id',$brokerreceipt->branch_id)->first();
    $bank->decrement('amount', $brokerreceipt->amount);
    $brokerbalance = BrokerBalance::where('vehicle_id', $brokerreceipt->broker_id)->first();
    $brokerbalance->increment('receivable', $brokerreceipt->amount);
    }
    if($brokerreceipt->balance_type=="Payable")
    {
    $bank = Bank_account::where('branch_id',$brokerreceipt->branch_id)->first();
    $bank->increment('amount', $brokerreceipt->amount);
     $brokerbalance = BrokerBalance::where('vehicle_id', $brokerreceipt->broker_id)->first();
    $brokerbalance->increment('payable', $brokerreceipt->amount);
    }
   }
      $res =  PaidReceiptBroker::where('id', $req->id)->delete();
       return response()->json($res);
}

}
