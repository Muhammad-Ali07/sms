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
use App\Petty_cash;
use View;
use Auth;

class Pettycash extends BaseController
{



    public function index(){

        return View('mehmoodgoodemployee/pettycash');
    }

    public function addpettycash(){
    	$pettycashs = Petty_cash::all();
        return View('mehmoodgoodemployee/addpettycash',compact('pettycashs'));
    }
 
    public function addpettycashledger(){

        return View('mehmoodgoodemployee/addpettycashledger');
    }

    public function addpettycashamount(Request $request){
		
		$result = Petty_cash::create(['amount'=>$request->amount,'description'=>$request->description]);
		if($result){
			return redirect('addpettycash')->with('success_msg','pettycash added succefully');
		}else{
			return redirect('addpettycash')->with('fail_msg','pettycash added succefully');
		}

    }
    public function editpettycashamount(Request $request){

        request()->validate([
            'amount'=>$request->amount,
            'description'=>$request->description,
        
        ]);


        $result = Petty_cash::create(['amount'=>$request->amount,'description'=>$request->description]);
		if($result){
			return redirect('addpettycash')->with('success_msg','pettycash added succefully');
		}else{
			return redirect('addpettycash')->with('fail_msg','pettycash added succefully');
		}
        return redirect('addpettycash');

    }

    public function editpettycash($id){
     
        if($id != ''){
			$data['office'] = DB::table('office')->get();
			$data['editpettycash'] = DB::table('pettycash')->where('id',$id)->get();
			$data['editpetty_meta'] = DB::table('pettycash_meta')->where('fk_pettycash_id',$id)->get();
			$data['bank_record'] = DB::table('ws_banks')->get();
			$data['pettycash'] = DB::table('pettycash')->paginate(30);
			$data['petty_meta'] = DB::table('pettycash_meta')->get();
      
			return view('DailyExpense.nill-labour-payment',$data);

		}else{
			return redirect('pettyCash');
		}
		
    }
    
    public function updatePettyCash(Request $req){
     
		$id = $req->input('id');
		$date = $req->input('date');
		$office = $req->input('office');
		$preofficeid = $req->input('preofficeid');
		$payType = $req->input('payType');
		/*ARRAYS*/
		$desc = $req->input('desc');
		$ref = $req->input('ref');
		$amounts = $req->input('amount');
		$ttlamount = 0;
		$amount = 0;
		$totalPettyCashAmount = 0;
       
		if($req->input('payType') == "Payment"){
			$data['pettyMeta'] = DB::table('pettycash_meta')->where('fk_pettycash_id',$id)->get();

			foreach($data['pettyMeta'] as $row){
				$amount += $row->amount;
			}
			$data['getPettyRecord'] = DB::table('pettycash')->where('id',$id)->get();
			$office_id = $data['getPettyRecord'][0]->fk_office_id;

			$data['updateOffice'] = DB::table('office')->where('office_id',$preofficeid)->get();

			$total = $data['updateOffice'][0]->office_balance - $amount;
			$updateOfficeBalance = array('office_balance'=>$total);
			$data['updateBalance'] = DB::table('office')->where('office_id',$preofficeid)->update($updateOfficeBalance);

			$pettyMetaRemoval = DB::table('pettycash_meta')->where('fk_pettycash_id',$id)->delete();


			$data['office'] = DB::table('office')->where('office_id',$office)->get();
			$totalBalance = $data['office'][0]->office_balance;
			foreach($amounts as $amnt){
				$ttlamount += $amnt;
			}

			$result = $totalBalance + $ttlamount;
			$officeBalance = array(
				'office_balance'=>$result
			);
			$setOfficeBalance = DB::table('office')->where('office_id',$office)->update($officeBalance);

			foreach($req->desc as $key => $value){
				$dataExp = array(
					'desc'=>$desc[$key],
					'ref'=>$ref[$key],
					'amount'=>$amounts[$key],
					'fk_pettycash_id'=>$id
				);
				DB::table('pettycash_meta')->insert($dataExp);
				$totalPettyCashAmount += $amounts[$key];
			}
			$description = implode(",",$desc);
			$reference = implode(",",$ref);

			$dataLdg = array(
				'date'=>$date,
				'description'=>$description,
				'ref'=>$reference,
				'debit'=>$totalPettyCashAmount,
				'fk_office_id'=>$office
			);
			$ledgerUpdate = DB::table('pettycash_ledger')->where('fk_petty_id',$id)->update($dataLdg);

			$updatedPettyRecord = array(
				'date'=>date('Y-m-d',strtotime($date)),
				'fk_office_id'=>$office,
				'type'=>$payType,
			);
			$updatePettyRecord = DB::table('pettycash')->where('id',$id)->update($updatedPettyRecord);

			return redirect('/nill-labour-payment')->with('success',"Selected Record has been Updated");
		}else{
		  
			$data['pettyMeta'] = DB::table('pettycash_meta')->where('fk_pettycash_id',$id)->get();
          
			foreach($data['pettyMeta'] as $row){
				$amount += $row->amount;
			}
		
			$data['getPettyRecord'] = DB::table('pettycash')->where('id',$id)->get();
		
			$office_id = $data['getPettyRecord'][0]->fk_office_id;
            
			$data['updateOffice'] = DB::table('office')->where('office_id',$preofficeid)->get();
          
			$total = $data['updateOffice'][0]->office_balance + $amount;
			$updateOfficeBalance = array('office_balance'=>$total);
			$data['updateBalance'] = DB::table('office')->where('office_id',$preofficeid)->update($updateOfficeBalance);

			$pettyMetaRemoval = DB::table('pettycash_meta')->where('fk_pettycash_id',$id)->delete();


			$data['office'] = DB::table('office')->where('office_id',$office)->get();
			$totalBalance = $data['office'][0]->office_balance;
			foreach($amounts as $amnt){
				$ttlamount += $amnt;
			}

			$result = $totalBalance - $ttlamount;
			$officeBalance = array(
				'office_balance'=>$result
			);
			$setOfficeBalance = DB::table('office')->where('office_id',$office)->update($officeBalance);

			foreach($req->desc as $key => $value){
				$dataExp = array(
					'desc'=>$desc[$key],
					'ref'=>$ref[$key],
					'amount'=>$amounts[$key],
					'fk_pettycash_id'=>$id
				);
				DB::table('pettycash_meta')->insert($dataExp);
				$totalPettyCashAmount += $amounts[$key];
			}
			$description = implode(",",$desc);
			$reference = implode(",",$ref);

			$dataLdg = array(
				'date'=>$date,
				'description'=>$description,
				'ref'=>$reference,
				'credit'=>$totalPettyCashAmount,
				'fk_office_id'=>$office
			);
			$ledgerUpdate = DB::table('pettycash_ledger')->where('fk_petty_id',$id)->update($dataLdg);

			$updatedPettyRecord = array(
				'date'=>date('Y-m-d',strtotime($date)),
				'fk_office_id'=>$office,
				'type'=>$payType,
			);
			$updatePettyRecord = DB::table('pettycash')->where('id',$id)->update($updatedPettyRecord);

			return redirect('/nill-labour-payment')->with('success',"Selected Record has been Updated");
		}
	}
	
	public function removePettyCash($id){
		$amount = 0;
		$data['showRecord'] = DB::table('pettycash')->where('id',$id)->get();
	
		if($data['showRecord'][0]->type == 'Daily Cash Return'){


			$bank_id = $data['showRecord'][0]->fk_bank_id;
			$data['bankBalance'] = DB::table('ws_banks')->where('PKBankID',$bank_id)->get();

			$bankCurrentAmount = $data['bankBalance'][0]->TotalAmount;
			$resulting_balance = $bankCurrentAmount - $data['showRecord'][0]->return_amount;

			$bankData = array('TotalAmount'=>$resulting_balance);
			$updateBank = DB::table('ws_banks')->where('PKBankID',$bank_id)->update($bankData);

			$office_id = $data['showRecord'][0]->fk_office_id;
			$data['office_balance']=DB::table('office')->where('office_id',$office_id)->get();
			$officeCurrentBalance = $data['office_balance'][0]->office_balance;

			$resulting_balance_office = $officeCurrentBalance + $data['showRecord'][0]->return_amount;

			$updateReq = array('office_balance'=> $resulting_balance_office);
			$updateOfficeBalance = DB::table('office')->where('office_id',$office_id)->update($updateReq);

			DB::table('pettycash')->where('id',$id)->delete();
			DB::table('pettycash_meta')->where('fk_pettycash_id',$id)->delete();
			DB::table('pettycash_ledger')->where('fk_petty_id',$id)->delete();
			DB::table('bank_ledger')->where('pettyCashId',$id)->delete();
			DB::table('ledger')->where('FKPettyID',$id)->delete();

			return redirect('/nill-labour-payment')->with('error',"Record Deleted successfully");
		}
		if($data['showRecord'][0]->type == 'Payment'){
			$office_id = $data['showRecord'][0]->fk_office_id;
			$data['metaRecord'] = DB::table('pettycash_meta')->where('fk_pettycash_id',$id)->get();
			$data['officeRecord'] = DB::table('office')->where('office_id',$office_id)->get();
			$office_balance = $data['officeRecord'][0]->office_balance;
			foreach($data['metaRecord'] as $row){
				$amount += $row->amount;
			}
			$resulting_balance = $office_balance + $amount;

			$updateReq = array('office_balance'=> $resulting_balance);
			$updateOfficeBalance = DB::table('office')->where('office_id',$office_id)->update($updateReq);

			DB::table('pettycash')->where('id',$id)->delete();
			DB::table('pettycash_meta')->where('fk_pettycash_id',$id)->delete();
			DB::table('pettycash_ledger')->where('fk_petty_id',$id)->delete();

			return redirect('/nill-labour-payment')->with('error',"Record Deleted successfully");
		}else{
		    
			$office_id = $data['showRecord'][0]->fk_office_id;
		
			$data['metaRecord'] = DB::table('pettycash_meta')->where('fk_pettycash_id',$id)->get();
		
			$data['officeRecord'] = DB::table('office')->where('office_id',$office_id)->get();
			
			$office_balance = $data['officeRecord'][0]->office_balance;
			foreach($data['metaRecord'] as $row){
				$amount += $row->amount;
			}
			$resulting_balance = $office_balance - $amount;

			$updateReq = array('office_balance'=> $resulting_balance);
			$updateOfficeBalance = DB::table('office')->where('office_id',$office_id)->update($updateReq);

			DB::table('pettycash')->where('id',$id)->delete();
			DB::table('pettycash_meta')->where('fk_pettycash_id',$id)->delete();
			DB::table('pettycash_ledger')->where('fk_petty_id',$id)->delete();

			return redirect('/nill-labour-payment')->with('error',"Record Deleted successfully");
		}
	}
	
	public function search(){
	     $q = Input::get ( 'q' );
	   
	    if($q != ""){
	     
	    $data['office'] = DB::table('office')->get();
		$data['pettycash'] = DB::table('pettycash')
                        ->join('office','pettycash.fk_office_id','office.office_id')
                        ->where ('office.office_name', 'LIKE', '%' . $q . '%' )
                        // ->orWhere ( 'email', 'LIKE', '%' . $q . '%' )
                        ->select('pettycash.*')
                        ->paginate(30)->setPath ('');
        
        $data['pagination'] = $data['pettycash']->appends ( array (
                'q' => Input::get ( 'q' ) 
              ) );
              
		$data['petty_meta'] = DB::table('pettycash_meta')->get();
		$data['bank_record'] = DB::table('ws_banks')->get();
   
             if (count ( $data ) > 0)
             return view('DailyExpense.nill-labour-payment',$data)->withQuery ( $q );
           
             
             }
             return view('DailyExpense.nill-labour-payment')->withMessage ( 'No Details found. Try to search again !' );
	}
	
	
}
