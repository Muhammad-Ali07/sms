<?php

namespace App\Http\Controllers\Receiving;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use mpdf\mpdf;
use PDF;
use DB;
use Session;

class ReceivingController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function __construct()
        {
            $this->middleware('auth');
        }
        public function mainpage(){
            $data['form_action'] = url('/receiving_insert');
            $data['customer_records'] = DB::table('customer')->get();
            $data['receiving_records'] = DB::table('ws_receiving as a')->get();
	          $data['bank_records'] = DB::table('ws_banks')->get();
            $data['officeRecord'] = DB::table('office')->get();
            return view('receiving/receiving',$data);
        }
        public function GetPreviousBalance(Request $req){
            $customer_id = $req->input('customer_id');
            $query = DB::table('ws_customers')->where('PKCustomerID',$customer_id)->get();
            $ans = $query[0]->UpdatedBalance;
            return $ans ;
        }

       public function GetBillDataByCus(Request $req)
        {
          $id = $req->input('id');

            $data = DB::table("bill")->where('bill_customer', $id)->get(); 

          return $data; 
        }
        
        public function insertform(Request $req){
            
            if( $req->input('bill_id') == null){
              return redirect('/manage-paid-receiving')->with('error', 'Bill not selected.');
            }else{
                
            	if($req->input('entry_type')=="Payable"){
                    $deposit_bank_id = $req->input('deposit_bank_id');
                    $get_bank_name = DB::table('ws_banks')->where('PKBankID',$deposit_bank_id)->get();
                    $receiving_date = date('Y-m-d', strtotime($req->input('receiving_date')));
                    $customer_id = $req->input('customer_id');
                    $cheque_number = $req->input('cheque_number');
                    $deposit_slip_number = $req->input('deposit_slip_number');
                    $receiving_type = $req->input('receiving_type');
                    $bill_number = $req->input('bill_number');
                    $challan_number = $req->input('challan_number');
                    $receiving_amount = $req->input('receiving_amount');
                    $percent = $req->input('percent');
                    $after_percent = $req->input('after_percent');
                    $bank_id = $req->input('bank_id');
                    $office = $req->input('office');
                    $description = $req->input('description');
                    $r_amount  = $req->input('r_amount');
                    $bill_id  = $req->input('bill_id');
                    $billrecord = DB::table("bill")->where(['bill_id' => $bill_id])->first();
                    if(isset($deposit_bank_id)){
                      if($get_bank_name[0]->TotalAmount > $req->input('receiving_amount')){
                	        $get_bank_name = DB::table('banks')->where('id',$deposit_bank_id)->get();
                          $deposit_bank_id = $get_bank_name[0]->BankName ;
                		      $bank_TotalAmount = $get_bank_name[0]->TotalAmount ;
                		      $bank_updated_amount = $bank_TotalAmount - $receiving_amount ;
                		      // Then Update Bank Amount
                		      DB::table('ws_banks')->where('PKBankID', $req->input('deposit_bank_id'))->update(['TotalAmount' => $bank_updated_amount]);
                      }
                    }
                    $receivable ="Payable";
                	$data = array(
                			'FKCustomerID' => $customer_id,
                			'ReceivingType' => $receiving_type,
                			'BillNumber' => $bill_number,
        					'Payment_bank_description' => $bank_id,
        					'ChequeNumber' => $cheque_number . ' - ' . $challan_number,
                			'Deposit_slip_number' => $deposit_slip_number,
                			'FKBankID_Desposit' =>$deposit_bank_id,
                			'ReceivingDate' => $receiving_date,
                			'Amount' => $receiving_amount,
        					'Percentage' => $percent,
        					'AfterPercentage' => $after_percent,
        					'entry_type'=> $receivable,
        					'FKBankID'=> $req->input('deposit_bank_id'),
        					'FKOfficeID'=> $req->input('office'),
        					'description'=> $description
                		);
                		$receiving_last_id = DB::table('ws_receiving')->insertGetId($data);
        
                   $ws_receiving_idR =  DB::table('ws_receiving')->orderBy('PKReceivingID', 'DESC')->first();
        
        
        
                     if (isset($bill_id)) {
        
                          foreach($bill_id as $key=>$value)
                          {
                              $data2 = array(
                                  'customerid' => $customer_id,
                                  'bill_id' => $value,
                                  'PKReceivingID' => $ws_receiving_idR->PKReceivingID,
                                  'r_amount' => $r_amount[$key],
                                  
                              );
        
                               DB::table('paidreceipt_metas')->insertGetId($data2);
        
        
                                $amunt22 = $billrecord->r_total - $receiving_amount;
                                   $data3 = array(
                                      'r_total' => $amunt22,
                                  );
        
                                  DB::table('bill')->where('bill_id',$bill_id)->update($data3);
        
        
                          }
        
                        }
        
        
                    if($receiving_type == 'Petty Cash'){
                      $data['officeName'] = DB::table('office')->where('office_id',$office)->get();
        
                      $general_data = array(
                        'ledger_date' => $receiving_date,
                        'ledger_desc' => $data['officeName'][0]->office_name,
                        'ledger_reference' => $receiving_type,
                        'ledger_credit' => $receiving_amount,
                        'FKRecievingID'=> $receiving_last_id,
                        'FKOfficeID' => $office
                      );
                      DB::table('ledger')->insert($general_data);
                      $pettyLedger = array(
                        'date' => $receiving_date,
                        'description' => $data['officeName'][0]->office_name,
                        'ref' => $receiving_type,
                        'debit' => $receiving_amount,
                        'fk_recieved_id' => $receiving_last_id
                      );
                      DB::table('pettycash_ledger')->insert($pettyLedger);
        
                      $pettyCash = array(
                        'date'=>$receiving_date,
                        'fk_office_id'=>$data['officeName'][0]->office_id,
                        'type'=>'Reciept',
                      );
                      $pettyCash_id = DB::table('pettycash')->insertGetId($pettyCash);
                      $pettyCashMeta = array(
                        'desc'=>'Cash Recieved in '.$data['officeName'][0]->office_name,
                        'ref'=>'Daily Cash Receiving',
                        'amount'=>$receiving_amount,
                        'fk_pettycash_id'=>$pettyCash_id
                      );
                      DB::table('pettycash_meta')->insert($pettyCashMeta);
        
                      $totalOfficeBalance = $data['officeName'][0]->office_balance + $receiving_amount;
                      $offAmount = array('office_balance'=>$totalOfficeBalance);
                      $updateOfficeAmount = DB::table('office')->where('office_id',$office)->update($offAmount);
        
                      return redirect('/receiving')->with('message',"Record added and Office Petty Cash has been Updated");
                    }else{
                    // Now Get and Save Record in Ledger //
                		$receiving_record_for_ledger = DB::table('ws_receiving')->where('PKReceivingID',$receiving_last_id)->get();
                		$FKCustomerID_for_ledger = $receiving_record_for_ledger[0]->FKCustomerID ;
                  	$ReceivingDate_for_ledger = $receiving_record_for_ledger[0]->ReceivingDate ;
                	  $Amount_for_ledger = $receiving_record_for_ledger[0]->Amount ;
                		// Now Get Customer Name
                		$get_customer_record = DB::table('customer')->where('id',$customer_id)->get();
                		if($get_customer_record != false){
                			$customer_name_forLedger = $get_customer_record[0]->name ;
                  	}
                      if($receiving_type == 'Cheque'){
                        $data = array(
                  				'bank_ledger_date' => $receiving_date,
                  				'FKBankID' => $req->input('deposit_bank_id'),
                  				'bank_ledger_name' => $deposit_bank_id,
                  				'bank_ledger_type' => "Receivable",
                  				'Deposit_slip_number' => $deposit_slip_number,
                  				'bank_ledger_credit' => $receiving_amount,
                  				'CustomerName' => $customer_name_forLedger,
                  				'ChequeNumber' => $cheque_number,
                          'FKRecievingID' => $receiving_last_id
                  			);
                  			DB::table('bank_ledger')->insert($data);
                        $general_data = array(
                          'ledger_date' => $receiving_date,
                          'ledger_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                          'ledger_reference' => $deposit_slip_number,
                          'ledger_credit' => $receiving_amount,
                          'FKCustomerID' => $customer_id,
                          'FKRecievingID' => $receiving_last_id
                        );
                        DB::table('ledger')->insert($general_data);
                        $customer_data = array(
                          'cl_date' => $receiving_date,
                          'cl_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                          'cl_reference' => $deposit_slip_number,
                          'cl_credit' => $receiving_amount,
                          'FKCustomerID' => $customer_id,
                          'FKRecievingID' => $receiving_last_id
                        );
                        DB::table('customer_ledger')->insert($customer_data);
                      }else{
                        $general_data = array(
                  	      'ledger_date' => $receiving_date,
                  		    'ledger_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                  			  'ledger_reference' => $deposit_slip_number,
                  			  'ledger_credit' => $receiving_amount,
                  			  'FKCustomerID' => $customer_id,
                          'FKRecievingID' => $receiving_last_id
                  		  );
                        DB::table('ledger')->insert($general_data);
                        $customer_data = array(
                  				'cl_date' => $receiving_date,
                  				'cl_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                  				'cl_reference' => $deposit_slip_number,
                  				'cl_credit' => $receiving_amount,
                  				'FKCustomerID' => $customer_id,
                          'FKRecievingID' => $receiving_last_id
                  			);
                        DB::table('customer_ledger')->insert($customer_data);
                      }
                    }
                  }else{
        			// Receivable
                    $receiving_date = date('Y-m-d', strtotime($req->input('receiving_date')));
                    $customer_id = $req->input('customer_id');
                    $customer = DB::table('customer')->where('id',$customer_id)->first();
                  	$cheque_number = $req->input('cheque_number');
                  	$deposit_slip_number = $req->input('deposit_slip_number');
                  	$deposit_bank_id = $req->input('deposit_bank_id');
                  	$receiving_type = $req->input('receiving_type');
                  	$bill_number = $req->input('bill_number');
                  	
                  	$challan_number = $req->input('challan_number');
                  	$receiving_amount = $req->input('receiving_amount');
        			      $percent = $req->input('percent');
                    $after_percent = $req->input('after_percent');
                  	$bank_id = $req->input('bank_id');
                    $description = $req->input('description');
                     $r_amount  = $req->input('r_amount');
                     $received_amount  = $req->input('received');
                    $bill_id  = $req->input('bill_id');
                    $bill_ids = json_encode($bill_id);
                    $billrecord = DB::table("bill")->where(['bill_id' => $bill_id])->first();
                    if(isset($deposit_bank_id)){
                  	  $get_bank_name = DB::table('ws_banks')->where('PKBankID',$deposit_bank_id)->get();
                  	  $deposit_bank_id = $get_bank_name[0]->BankName ;
                  		$bank_TotalAmount = $get_bank_name[0]->TotalAmount ;
                  		$bank_updated_amount = $bank_TotalAmount + $receiving_amount ;
                  		// Then Update Bank Amount
                  		DB::table('ws_banks')->where('PKBankID', $req->input('deposit_bank_id'))->update(['TotalAmount' => $bank_updated_amount]);
                  	}
                    //   dd($deposit_bank_id);
                  	$receivable ="Receivable";
                  	if($description == 'null'){
                  	    $description = 'Payment is received by Customer ' . $customer->name . ' on date:' . $receiving_date . '.';
                  	}
                  	$data = array(
                  		'FKCustomerID' => $customer_id,
                  		'ReceivingType' => $receiving_type,
                  		'BillNumber' => $bill_ids,
                    	'Payment_bank_description' => $bank_id,
                  	 	'ChequeNumber' => $cheque_number . ' - ' . $challan_number,
                  		'Deposit_slip_number' => $deposit_slip_number,
                  		'FKBankID_Desposit' =>$deposit_bank_id,
                  		'ReceivingDate' => $receiving_date,
                  		'Amount' => $receiving_amount,
        				'Percentage' => $percent,
        				'AfterPercentage' => $after_percent,
                    	'entry_type'=> $receivable,
                        'FKBankID'=> $req->input('deposit_bank_id'),
                        'description'=> $description
                  	);
                  	$receiving_last_id = DB::table('ws_receiving')->insertGetId($data);
        
                    $ws_receiving_idR =  DB::table('ws_receiving')->orderBy('PKReceivingID', 'DESC')->first();
        
        
                    //bill updation along with paid receiptmetas starts
                     if (isset($bill_id)) {
        
                          foreach($bill_id as $key => $value)
                          {
                              $data2 = array(
                                'bill_id' => $value,
                                'customerid' =>$customer_id,
                                'PKReceivingID' => $ws_receiving_idR->PKReceivingID,
                                'received' => $received_amount[$key],
                                'r_amount' => $r_amount[$key],
                              );
                               DB::table('paidreceipt_metas')->insertGetId($data2);
        
        
                                $amunt22 = $billrecord->r_total - $receiving_amount;
                                   $data3 = array(
                                      'r_total' => $amunt22,
                                  );
                                
                                  DB::table('bill')->where('bill_id',$value)->update($data3);
                          }
        
                        }
                    //bill updation along with paid receiptmetas ends
        
        
                  	// Now Get and Save Record in Ledger //
                  	$receiving_record_for_ledger = DB::table('ws_receiving')->where('PKReceivingID',$receiving_last_id)->get();
                //   	dd($receiving_record_for_ledger);
                  	$FKCustomerID_for_ledger = $receiving_record_for_ledger[0]->FKCustomerID ;
                    $ReceivingDate_for_ledger = $receiving_record_for_ledger[0]->ReceivingDate ;
                  	$Amount_for_ledger = $receiving_record_for_ledger[0]->Amount ;
                  	// Now Get Customer Name
                  	$get_customer_record = DB::table('customer')->where('id',$customer_id)->get();
                  	if($get_customer_record != false){
                  		$customer_name_forLedger = $get_customer_record[0]->name ;
                    }
                    if($receiving_type == 'Cheque'){
                          $data = array(
                    				'bank_ledger_date' => $receiving_date,
                    				'FKBankID' => $req->input('deposit_bank_id'),
                    				'bank_ledger_name' => $deposit_bank_id,
                    				'bank_ledger_type' => "Receivable",
                    				'Deposit_slip_number' => $deposit_slip_number,
                    				'bank_ledger_debit' => $receiving_amount,
                    				'CustomerName' => $customer_name_forLedger,
                    				'ChequeNumber' => $cheque_number,
                            'FKRecievingID' => $receiving_last_id
                    			);
                    			DB::table('bank_ledger')->insert($data);
                          $general_data = array(
                            'ledger_date' => $receiving_date,
                            'ledger_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                            'ledger_reference' => $deposit_slip_number,
                            'ledger_debit' => $receiving_amount,
                            'FKCustomerID' => $customer_id,
                            'FKRecievingID' => $receiving_last_id
                      );
                      DB::table('ledger')->insert($general_data);
                      $customer_data = array(
                        'cl_date' => $receiving_date,
                        'cl_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                        'cl_reference' => $deposit_slip_number,
                        'cl_debit' => $receiving_amount,
                        'FKCustomerID' => $customer_id,
                        'FKRecievingID' => $receiving_last_id
                      );
                      DB::table('customer_ledger')->insert($customer_data);
                    }else{
                        
                        
                        foreach($bill_id as $b){
                              $bill = DB::table('bill')->where('bill_id','=',$b)->first();

                              $general_data = array(
                        	      'ledger_date' => $receiving_date,
                        		    'ledger_desc' => 'Payment is received by Customer ' . $customer->name . ' on date:' . $receiving_date . '.',
                        			  'ledger_reference' => $bill->bill_Number,
                        			  'ledger_debit' => $receiving_amount,
                        			  'FKCustomerID' => $customer_id,
                                'FKRecievingID' => $receiving_last_id
                        		  );
                              DB::table('ledger')->insert($general_data);

                              $customer_data = array(
                        				'cl_date' => $receiving_date,
                        				'cl_desc' => 'Payment is received by Customer ' . $customer->name . ' on date:' . $receiving_date . '.' ,
                        				'cl_reference' => $bill->bill_Number,
                        				'cl_debit' => $receiving_amount,
                        				'FKCustomerID' => $customer_id,
                                'FKRecievingID' => $receiving_last_id
                        			);
                              DB::table('customer_ledger')->insert($customer_data);
                        }
                    }
                  } // Close else condition
                  return redirect('/manage-paid-receiving')->with('success_message', 'Record Add Successfully.');
            }
        }
        
        
        
        
        public function editRecievable($id){
          $data['record'] = DB::table('ws_receiving')->where('PKReceivingID',$id)->get();

          $data['seletedbills'] = DB::table("bill")->where('bill_customer', $data['record'][0]->FKCustomerID)->get(); 
            // dd($data);


          if($data['record'] != false){
            $data['form_action'] = url('/receiving_update');
            $data['customer_records'] = DB::table('customer')->get();
            $data['receiving_records'] = DB::table('ws_receiving as a')->get();
            $data['bank_records'] = DB::table('ws_banks')->get();
            $data['officeRecord'] = DB::table('office')->get();
            $entry = $data['record'][0]->entry_type;
			$data['type'] = "Edit";
            if($entry != "Payable"){
                //   $bank_id = $data['record'][0]->FKBankID;
              //   if(isset($bank_id)){
              //     $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bank_id)->get();
              //     $bank_amount = $ws_banks_record[0]->TotalAmount ;
              //     $total = $bank_amount - $data['record'][0]->Amount;
              //     $amount = array('TotalAmount' => $total);
              //     $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bank_id)->update($amount);
              //   }
              // }else{
              //   $bank_id = $data['record'][0]->FKBankID;
              //   if(isset($bank_id)){
              //     $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bank_id)->get();
              //     $bank_amount = $ws_banks_record[0]->TotalAmount ;
              //     $total = $bank_amount + $data['record'][0]->Amount;
              //     $amount = array('TotalAmount' => $total);
              //     $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bank_id)->update($amount);
              //   }
              // }
        		return view('paidRecieved/receiving', $data);
            }
            
            return view('receiving/edit',$data);
          }
          
        }
        public function receiving_update(Request $req){
          $id = $req->input('id');

          $preamount = $req->input('preamount');
          $bnkid = $req->input('bnkid');
          $office = $req->input('office'); // PeetyCash Office
          $preofficeId = $req->input('preofficeid'); // FK Office ID
		       $percent = $req->input('percent');
          $after_percent = $req->input('after_percent');
           $r_amount  = $req->input('r_amount');
             $bill_id  = $req->input('bill_id');
              $billrecord = DB::table("bill")->where(['bill_id' => $bill_id])->first();

          if($req->input('entry_type')=="Payable"){
            $receivable = $req->input('entry_type');
            $deposit_bank_id = $req->input('deposit_bank_id');
            $get_bank_name = DB::table('ws_banks')->where('PKBankID',$deposit_bank_id)->get();
            $receiving_date = date('Y-m-d', strtotime($req->input('receiving_date')));
            $customer_id = $req->input('customer_id');
            $cheque_number = $req->input('cheque_number');
            $deposit_slip_number = $req->input('deposit_slip_number');
            $receiving_type = $req->input('receiving_type');
            $bill_number = $req->input('bill_number');
            $challan_number = $req->input('challan_number');
            $receiving_amount = $req->input('receiving_amount');
            $bank_id = $req->input('bank_id');
            $description = $req->input('description');

            if($receiving_type == 'Petty Cash'){

              $data['preofficeName'] = DB::table('office')->where('office_id',$preofficeId)->get();
              if(sizeof($data['preofficeName'])>0){
                $preOfficeBalance = $preamount - $data['preofficeName'][0]->office_balance;
                $preOffAmount = array('office_balance'=>$preOfficeBalance);
                $preOfficeUpdate = DB::table('office')->where('office_id',$preofficeId)->update($preOffAmount);
              }


              $data['officeName'] = DB::table('office')->where('office_id',$office)->get();
              $office = '';
              if(sizeof($data['officeName'])>0){
                $office = $data['officeName'][0]->office_name;
                $totalOfficeBalance = $data['officeName'][0]->office_balance + $receiving_amount;
                $offAmount = array('office_balance'=>$totalOfficeBalance);
                $updateOfficeAmount = DB::table('office')->where('office_id',$office)->update($offAmount);
              }


              $general_data = array(
                'ledger_date' => $receiving_date,
                'ledger_desc' => $office,
                'ledger_reference' => $receiving_type,
                'ledger_credit' => $receiving_amount,
                'FKOfficeID' => $office,
                'FKRecievingID'=> $id
              );
              DB::table('ledger')->where('FKRecievingID', $id)->update($general_data);
              $pettyLedger = array(
                'date' => $receiving_date,
                'description' => $office,
                'ref' => $receiving_type,
                'debit' => $receiving_amount,
              );
              DB::table('pettycash_ledger')->where('fk_recieved_id',$id)->update($pettyLedger);
              $data = array(
          			'FKCustomerID' => $customer_id,
          			'ReceivingType' => $receiving_type,
          			'BillNumber' => $bill_number,
            		'Payment_bank_description' => $bank_id,
					'ChequeNumber' => $cheque_number . ' - ' . $challan_number,
          			'Deposit_slip_number' => $deposit_slip_number,
          			'FKBankID_Desposit' =>$deposit_bank_id,
          			'ReceivingDate' => $receiving_date,
          			'Amount' => $receiving_amount,
					'Percentage' => $percent,
					'AfterPercentage' => $after_percent,
            		'entry_type'=> $receivable,
					'FKBankID'=> $req->input('deposit_bank_id'),
					'FKOfficeID'=> $req->input('office'),
					'description'=> $description
          		);
          		$updateReceiving = DB::table('ws_receiving')->where('PKReceivingID',$id)->update($data);


              $ws_receiving_idR =  DB::table('ws_receiving')->orderBy('PKReceivingID', 'DESC')->first();




             if (isset($bill_id)) {

                  foreach($bill_id as $key=>$value)
                  {
                      $data2 = array(
                          'bill_id' => $value,
                          'PKReceivingID' => $ws_receiving_idR->PKReceivingID,
                          'r_amount' => $r_amount[$key],
                      );

                       DB::table('paidreceipt_metas')->insertGetId($data2);


                        $amunt22 = $billrecord->r_total - $receiving_amount;
                           $data3 = array(
                              'r_total' => $amunt22,
                          );

                          DB::table('bill')->where('bill_id',$bill_id)->update($data3);


                  }

                }


              return redirect('/receiving')->with('success_message',"Selected record and Office Petty Cash has been Updated");
              
            }else{
			  $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bnkid)->get();
        if(sizeof($ws_banks_record)>0){
          $bank_amount = $ws_banks_record[0]->TotalAmount ;
          $total = $bank_amount + $preamount;
          $amount = array('TotalAmount' => $total);
          $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bnkid)->update($amount);
        }


              if(isset($deposit_bank_id)){
                if($get_bank_name[0]->TotalAmount > $req->input('receiving_amount')){
                    $get_bank_name = DB::table('ws_banks')->where('PKBankID',$deposit_bank_id)->get();
                    if(sizeof($get_bank_name)>0){
                      $deposit_bank_id = $get_bank_name[0]->BankName ;
                      $bank_TotalAmount = $get_bank_name[0]->TotalAmount ;
                      $bank_updated_amount = $bank_TotalAmount - $receiving_amount ;
                      // Then Update Bank Amount
                      DB::table('ws_banks')->where('PKBankID', $req->input('deposit_bank_id'))->update(['TotalAmount' => $bank_updated_amount]);
                    }

                }
              }
              $receivable ="Payable";
              $data = array(
                'FKCustomerID' => $customer_id,
                'ReceivingType' => $receiving_type,
                'BillNumber' => $bill_number,
                'Payment_bank_description' => $bank_id,
                'ChequeNumber' => $cheque_number . ' - ' . $challan_number,
                'Deposit_slip_number' => $deposit_slip_number,
                'FKBankID_Desposit' =>$deposit_bank_id,
                'ReceivingDate' => $receiving_date,
                'Amount' => $receiving_amount,
				'Percentage' => $percent,
				'AfterPercentage' => $after_percent,
                'entry_type'=> $receivable,
                'FKBankID'=> $req->input('deposit_bank_id'),
                'description'=> $description
              );
              DB::table('ws_receiving')->where('PKReceivingID',$id)->update($data);

              $ws_receiving_idR =  DB::table('ws_receiving')->orderBy('PKReceivingID', 'DESC')->first();




             if (isset($bill_id)) {

                  foreach($bill_id as $key=>$value)
                  {
                      $data2 = array(
                          'bill_id' => $value,
                          'PKReceivingID' => $ws_receiving_idR->PKReceivingID,
                          'r_amount' => $r_amount[$key],
                      );

                       DB::table('paidreceipt_metas')->insertGetId($data2);


                        $amunt22 = $billrecord->r_total - $receiving_amount;
                           $data3 = array(
                              'r_total' => $amunt22,
                          );

                          DB::table('bill')->where('bill_id',$bill_id)->update($data3);


                  }

                }



              // Now Get and Save Record in Ledger //
              $receiving_record_for_ledger = DB::table('ws_receiving')->where('PKReceivingID',$id)->get();
              if(sizeof($receiving_record_for_ledger)>0){
                $FKCustomerID_for_ledger = $receiving_record_for_ledger[0]->FKCustomerID ;
                $ReceivingDate_for_ledger = $receiving_record_for_ledger[0]->ReceivingDate ;
                $Amount_for_ledger = $receiving_record_for_ledger[0]->Amount ;
              }

              // Now Get Customer Name
              $get_customer_record = DB::table('customer')->where('id',$customer_id)->get();

              if($get_customer_record != false){
                $customer_name_forLedger = $get_customer_record[0]->name ;
              }

              if($receiving_type == 'Cheque'){
                $data = array(
                  'bank_ledger_date' => $receiving_date,
                  'FKBankID' => $req->input('deposit_bank_id'),
                  'bank_ledger_name' => $deposit_bank_id,
                  'bank_ledger_type' => "Receivable",
                  'Deposit_slip_number' => $deposit_slip_number,
                  'bank_ledger_credit' => $receiving_amount,
                  'CustomerName' => $customer_name_forLedger,
                  'ChequeNumber' => $cheque_number,
                );
                DB::table('bank_ledger')->where('FKRecievingID',$id)->update($data);
                $general_data = array(
                  'ledger_date' => $receiving_date,
                  'ledger_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                  'ledger_reference' => $deposit_slip_number,
                  'ledger_credit' => $receiving_amount,
                  'FKCustomerID' => $customer_id,
                );
                DB::table('ledger')->where('FKRecievingID',$id)->update($general_data);
                $customer_data = array(
                  'cl_date' => $receiving_date,
                  'cl_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                  'cl_reference' => $deposit_slip_number,
                  'cl_credit' => $receiving_amount,
                  'FKCustomerID' => $customer_id,
                );
                DB::table('customer_ledger')->where('FKRecievingID',$id)->update($customer_data);
              }else{
                $general_data = array(
                  'ledger_date' => $receiving_date,
                  'ledger_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                  'ledger_reference' => $deposit_slip_number,
                  'ledger_credit' => $receiving_amount,
                  'FKCustomerID' => $customer_id,
                );
                DB::table('ledger')->where('FKRecievingID',$id)->update($general_data);
                $customer_data = array(
                  'cl_date' => $receiving_date,
                  'cl_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                  'cl_reference' => $deposit_slip_number,
                  'cl_credit' => $receiving_amount,
                  'FKCustomerID' => $customer_id,
                );
                DB::table('customer_ledger')->where('FKRecievingID',$id)->update($customer_data);
              }
            }
          }else{
            $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bnkid)->get();
            $bank_amount = $ws_banks_record[0]->TotalAmount ;
            $total = $bank_amount - $preamount;
            $amount = array('TotalAmount' => $total);
            $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bnkid)->update($amount);

            $receiving_date = date('Y-m-d', strtotime($req->input('receiving_date')));
            $customer_id = $req->input('customer_id');
            $cheque_number = $req->input('cheque_number');
            $deposit_slip_number = $req->input('deposit_slip_number');
            $deposit_bank_id = $req->input('deposit_bank_id');
            $receiving_type = $req->input('receiving_type');
            $bill_number = $req->input('bill_number');
            $challan_number = $req->input('challan_number');
            $receiving_amount = $req->input('receiving_amount');

            $r_amount  = $req->input('r_amount');
            $bill_id  = $req->input('bill_id');
            $billrecord = DB::table("bill")->where(['bill_id' => $bill_id])->first();


            $bank_id = $req->input('bank_id');
            if(isset($deposit_bank_id)){
              $get_bank_name = DB::table('ws_banks')->where('PKBankID',$deposit_bank_id)->get();
              $deposit_bank_id = $get_bank_name[0]->BankName ;
              $bank_TotalAmount = $get_bank_name[0]->TotalAmount ;
              $bank_updated_amount = $bank_TotalAmount + $receiving_amount ;

              // Then Update Bank Amount
              DB::table('ws_banks')->where('PKBankID', $req->input('deposit_bank_id'))->update(['TotalAmount' => $bank_updated_amount]);
            }
            $receivable ="Receivable";
            $data = array(
              'FKCustomerID' => $customer_id,
              'ReceivingType' => $receiving_type,
              'BillNumber' => $bill_number,
              'Payment_bank_description' => $bank_id,
              'ChequeNumber' => $cheque_number . ' - ' . $challan_number,
              'Deposit_slip_number' => $deposit_slip_number,
              'FKBankID_Desposit' =>$deposit_bank_id,
              'ReceivingDate' => $receiving_date,
              'Amount' => $receiving_amount,
			  'Percentage' => $percent,
			  'AfterPercentage' => $after_percent,
              'entry_type'=> $receivable,
              'FKBankID'=> $req->input('deposit_bank_id'),
              'description'=> $description
            );
            DB::table('ws_receiving')->where('PKReceivingID',$id)->update($data);

            $ws_receiving_idR =  DB::table('ws_receiving')->orderBy('PKReceivingID', 'DESC')->first();




             if (isset($bill_id)) {

                  foreach($bill_id as $key=>$value)
                  {
                      $data2 = array(
                          'bill_id' => $value,
                          'PKReceivingID' => $ws_receiving_idR->PKReceivingID,
                          'r_amount' => $r_amount[$key],
                      );

                       DB::table('paidreceipt_metas')->insertGetId($data2);


                        $amunt22 = $billrecord->r_total - $receiving_amount;
                           $data3 = array(
                              'r_total' => $amunt22,
                          );

                          DB::table('bill')->where('bill_id',$bill_id)->update($data3);


                  }

                }

            // Now Get and Save Record in Ledger //
            $receiving_record_for_ledger = DB::table('ws_receiving')->where('PKReceivingID',$id)->get();
            $FKCustomerID_for_ledger = $receiving_record_for_ledger[0]->FKCustomerID ;
            $ReceivingDate_for_ledger = $receiving_record_for_ledger[0]->ReceivingDate ;
            $Amount_for_ledger = $receiving_record_for_ledger[0]->Amount ;
            // Now Get Customer Name
            $get_customer_record = DB::table('customer')->where('id',$customer_id)->get();
            if($get_customer_record != false){
              $customer_name_forLedger = $get_customer_record[0]->name ;
            }
            if($receiving_type == 'Cheque'){
              $data = array(
                'bank_ledger_date' => $receiving_date,
                'FKBankID' => $req->input('deposit_bank_id'),
                'bank_ledger_name' => $deposit_bank_id,
                'bank_ledger_type' => "Receivable",
                'Deposit_slip_number' => $deposit_slip_number,
                'bank_ledger_debit' => $receiving_amount,
                'CustomerName' => $customer_name_forLedger,
                'ChequeNumber' => $cheque_number,
              );
              DB::table('bank_ledger')->where('FKRecievingID',$id)->update($data);
              $general_data = array(
                'ledger_date' => $receiving_date,
                'ledger_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                'ledger_reference' => $deposit_slip_number,
                'ledger_debit' => $receiving_amount,
                'FKCustomerID' => $customer_id,
              );
              DB::table('ledger')->where('FKRecievingID',$id)->update($general_data);
              $customer_data = array(
                'cl_date' => $receiving_date,
                'cl_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                'cl_reference' => $deposit_slip_number,
                'cl_debit' => $receiving_amount,
                'FKCustomerID' => $customer_id,
              );
              DB::table('customer_ledger')->where('FKRecievingID',$id)->update($customer_data);
            }else{
              $general_data = array(
                'ledger_date' => $receiving_date,
                'ledger_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                'ledger_reference' => $deposit_slip_number,
                'ledger_debit' => $receiving_amount,
                'FKCustomerID' => $customer_id,
              );
              DB::table('ledger')->where('FKRecievingID',$id)->update($general_data);;
              $customer_data = array(
                'cl_date' => $receiving_date,
                'cl_desc' => $customer_name_forLedger.' | '.$deposit_bank_id.' | '.$cheque_number,
                'cl_reference' => $deposit_slip_number,
                'cl_debit' => $receiving_amount,
                'FKCustomerID' => $customer_id,
              );
              DB::table('customer_ledger')->where('FKRecievingID',$id)->update($customer_data);
            }
          } // Close else condition
          return redirect('/receiving')->with('success_message', 'Record Update Successfully.');
        }













        public function removeReceivableRecord($id,$type){
          $id;
          $type;


          $getcustomer_ledger = DB::table('customer_ledger')->where('FKRecievingID',$id)->get();
          if(sizeof($getcustomer_ledger)>0){
              $customer_ledger = DB::table('customer_ledger')->where('FKRecievingID',$id)->delete();
          }


          $getledger = DB::table('ledger')->where('FKRecievingID',$id)->get();
          if(sizeof($getledger)>0){
              $ledger = DB::table('ledger')->where('FKRecievingID',$id)->delete();
          }


          $getbank_ledger = DB::table('bank_ledger')->where('FKRecievingID',$id)->get();
          if(sizeof($getbank_ledger)>0){
            $bank_ledger = DB::table('bank_ledger')->where('FKRecievingID',$id)->delete();
          }


          $getpettyCashLedger = DB::table('pettycash_ledger')->where('fk_recieved_id',$id)->get();
          if(sizeof($getpettyCashLedger)>0){
            $pettyCashLedger = DB::table('pettycash_ledger')->where('fk_recieved_id',$id)->delete();
          }



          if($type == "Payable"){
            $data['getamount'] = DB::table('ws_receiving')->where('PKReceivingID',$id)->get();
            if(sizeof($data['getamount'])>0){
              $recType = $data['getamount'][0]->ReceivingType;
              if($recType == 'Petty Cash'){
                $office_id = $data['getamount'][0]->FKOfficeID;
                $data['officeName'] = DB::table('office')->where('office_id',$office_id)->get();
                $preOfficeBalance = $data['getamount'][0]->Amount - $data['officeName'][0]->office_balance ;
                $preOffAmount = array('office_balance'=>$preOfficeBalance);
                $preOfficeUpdate = DB::table('office')->where('office_id',$office_id)->update($preOffAmount);

              }else{
                $amount = $data['getamount'][0]->Amount;
                $data['getBank'] = DB::table('ws_banks')->where('PKBankID',$data['getamount'][0]->FKBankID)->get();
                if(sizeof($data['getBank'])>0){
                  $bankAmount = $data['getBank'][0]->TotalAmount;
                  $ta = $amount + $bankAmount;
                  $ta = array(
                    'TotalAmount'=>$ta
                  );
                  $updateBankInfo = DB::table('ws_banks')->where('PKBankID',$data['getamount'][0]->FKBankID)->update($ta);
                }
              }
            }

          }else{
            $data['getamount'] = DB::table('ws_receiving')->where('PKReceivingID',$id)->get();
            if(sizeof($data['getamount'])>0){
              $amount = $data['getamount'][0]->Amount;
              $data['getBank'] = DB::table('ws_banks')->where('PKBankID',$data['getamount'][0]->FKBankID)->get();
              if(sizeof($data['getBank'])>0){
              $bankAmount = $data['getBank'][0]->TotalAmount;
              $ta = $bankAmount - $amount;
              $ta = array(
                'TotalAmount'=>$ta
              );
              $updateBankInfo = DB::table('ws_banks')->where('PKBankID',$data['getamount'][0]->FKBankID)->update($ta);
            }
            }

          }
          $rp = DB::table('ws_receiving')->where('PKReceivingID',$id)->delete();
          return redirect('/receiving')->with("error_message","Record Deleted Successfully");
        }
      }
