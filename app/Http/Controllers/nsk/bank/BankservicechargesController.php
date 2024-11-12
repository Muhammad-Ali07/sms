<?php
namespace App\Http\Controllers\nsk\bank;

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

class BankservicechargesController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function mainpage(){
    $data['form_action'] = url('/bankservicecharges_insert');
    $data['bank_service_charges_records'] = DB::table('ws_service_charges as a')->join('ws_banks as b','b.PKBankID','=','a.FKBankID')->get();
    $data['bank_records'] = DB::table('ws_banks')->get();
    return view('nsk/bank/bankservicecharges',$data);
  }
  public function GetPreviousBalanceBank(Request $req){
    $bank_id = $req->input('bank_id');
    $query = DB::table('ws_banks')->where('PKBankID',$bank_id)->get();
    $ans = $query[0]->TotalAmount;
    return $ans ;
  }
  public function insertform(Request $req){
    $bank_id = $req->input('bank_id'); // Bank ID
    $bankservicecharges_date = date('Y-m-d', strtotime($req->input('bankservicecharges_date')));
    $bankservicecharges_amount = $req->input('bankservicecharges_amount');
    $description = $req->input('description');
    // Now Get Bank Name For Save In ledger and bank_ledger
    $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bank_id)->get();
    $ws_bank_name = $ws_banks_record[0]->BankName ;
    $ws_bank_amount = $ws_banks_record[0]->TotalAmount ;
    if($ws_bank_amount >= $bankservicecharges_amount){
      $bank_updated_amount = $ws_bank_amount - $bankservicecharges_amount ;
      //Get Bank Record For Update Balance
      DB::table('ws_banks')
      ->where('PKBankID', $bank_id)
      ->update(['TotalAmount' => $bank_updated_amount]);
      $data = array(
        'FKBankID' => $bank_id,
        'Date' => $bankservicecharges_date,
        'Description' => $description,
        'Amount' =>$bankservicecharges_amount,
      );
      $service_charges_last_id = DB::table('ws_service_charges')->insertGetId($data);
      $receiving_type = 'Bank Service Charges';
      $data = array(
        'bank_ledger_date' => $bankservicecharges_date,
        'bank_ledger_name' => $ws_bank_name,
        'FKBankID' => $bank_id,
        'bank_ledger_type' => $receiving_type,
        'CustomerName' => $description,
        'bank_ledger_credit' => $bankservicecharges_amount,
        'FKServiceChargesID'=> $service_charges_last_id
      );
      DB::table('bank_ledger')->insert($data);
      $general_data = array(
        'ledger_date' => $bankservicecharges_date,
        'ledger_desc' => $ws_bank_name.' | '.$description,
        'ledger_credit' => $bankservicecharges_amount,
        'FKServiceChargesID'=> $service_charges_last_id
      );
      DB::table('ledger')->insert($general_data);
      return redirect('/bank_service')->with('success_message', 'Record Add Successfully.');
    }else{
      return redirect('/bank_service')->with('error_message', 'Your Amount is Greater Than Bank Amount.');
    }
  }
  public function bankservicecharges_report(Request $req){
    $from_date =date('Y-m-d', strtotime($req->input('from_date')));
    $to_date = date('Y-m-d', strtotime($req->input('to_date')));
    $data['service_charges_records'] = DB::table('ws_service_charges as a')->join('ws_banks as b','b.PKBankID','=','a.FKBankID')->whereBetween('a.Date',[$from_date,$to_date])->get();
    $mpdf = new PDF('utf-8', 'A4-L');
    $pdf = PDF::loadView('nsk/bank/bankservicecharges_report',$data);
    return $pdf->stream('document.pdf');
  }
  public function deleteBankServiceCharges($id,$amount){
    $data['getBankID'] = DB::table('ws_service_charges')->where('PKServiceChargesID',$id)->get();
    $bid = $data['getBankID'][0]->FKBankID;
    $data['getBankData'] = DB::table('ws_banks')->where('PKBankID',$bid)->get();
    $ttl = array('TotalAmount' => $data['getBankData'][0]->TotalAmount + $amount);
    $ubd = DB::table('ws_banks')->where('PKBankID',$bid)->update($ttl);

    $ledgerService  = DB::table('ledger')->where('FKServiceChargesID',$id)->delete();
    $bankLedger     = DB::table('bank_ledger')->where('FKServiceChargesID',$id)->delete();
    $serviceCharges = DB::table('ws_service_charges')->where('PKServiceChargesID',$id)->delete();


    return redirect('/bank_service')->with('error_message', 'Your Service Charges are now removed.');
  }
  public function editBankServiceCharges($id,$amount){
    if($id){
      $data['bank_service_charges_records'] = DB::table('ws_service_charges as a')->join('ws_banks as b','b.PKBankID','=','a.FKBankID')->get();
      $data['bank_records'] = DB::table('ws_banks')->get();
      $data['service_records'] = DB::table('ws_service_charges')->where('PKServiceChargesID',$id)->get();
      return view('nsk/bank/bankservicecharges',$data);
    }else{
      return redirect('/bank_service');
    }
  }
  public function updateBankServiceRecord(Request $req){
    $id = $req->input('id'); // ID
    $bnkid = $req->input('bnkid');
    $preamount = $req->input('preamount');

    $data['bnk_records'] = DB::table('ws_banks')->where('PKBankID',$bnkid)->get();
    $bnkAmount = $data['bnk_records'][0]->TotalAmount;
    $uba = array('TotalAmount'=> $bnkAmount + $preamount);
    $update_bank_records = DB::table('ws_banks')->where('PKBankID',$bnkid)->update($uba);

    $bank_id = $req->input('bank_id'); // Bank ID
    $bankservicecharges_date = date('Y-m-d', strtotime($req->input('bankservicecharges_date')));
    $bankservicecharges_amount = $req->input('bankservicecharges_amount');
    $description = $req->input('description');
    $receiving_type = 'Bank Service Charges';
    $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bank_id)->get();
    $ws_bank_name = $ws_banks_record[0]->BankName ;
    $data = array(
      'FKBankID' => $bank_id,
      'Date' => $bankservicecharges_date,
      'Description' => $description,
      'Amount' => $bankservicecharges_amount
    );
    $service_charges_last_id = DB::table('ws_service_charges')->where('PKServiceChargesID',$id)->update($data);
    $data = array(
      'bank_ledger_date'   => $bankservicecharges_date,
      'bank_ledger_name'   => $ws_bank_name,
      'FKBankID'           => $bank_id,
      'bank_ledger_type'   => $receiving_type,
      'CustomerName'       => $description,
      'bank_ledger_credit' => $bankservicecharges_amount,
    );
    DB::table('bank_ledger')->where('FKServiceChargesID',$id)->update($data);
    $general_data = array(
      'ledger_date' => $bankservicecharges_date,
      'ledger_desc' => $ws_bank_name.' | '.$description,
      'ledger_credit' => $bankservicecharges_amount,
    );
    DB::table('ledger')->where('FKServiceChargesID',$id)->update($general_data);
    $data['bankRecord'] = DB::table('ws_banks')->where('PKBankID',$bank_id)->get();
    $ttl = $data['bankRecord'][0]->TotalAmount - $bankservicecharges_amount;
    $ubr = array('TotalAmount' => $ttl);
    $updateBankRecord = DB::table('ws_banks')->where('PKBankID',$bank_id)->update($ubr);
    return redirect('/bank_service')->with('success_message', 'Record Add Successfully.');
  }
}
