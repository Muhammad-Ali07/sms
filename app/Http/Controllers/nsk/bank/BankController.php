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

class BankController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function __construct()
        {
            $this->middleware('auth');
        }
        public function mainpage()
        {
        $data['form_action'] = url('/bank_insert');
        $data['bank_records'] = DB::table('ws_banks')->get();
        return view('nsk/bank/banks',$data);
        }
        public function insertform(Request $req){
            $check_bank_name = DB::table('ws_banks')->where('BankName',$req->input('bank_name'))->get();
            if($check_bank_name != false && sizeof($check_bank_name) > 0){
                return redirect('/banks')->with('message', 'Bank Name already exist in our record .');
            }else{
                $bank_name = $req->input('bank_name');
                $branch_name = $req->input('branch_name');
                $bank_address = $req->input('bank_address');
                $amount = $req->input('amount');
                $data = array(
                    'BankName' => $bank_name,
                    'BranchName' => $branch_name,
                    'Address' => $bank_address,
                    'TotalAmount' => $amount
                );
                $bank_last_id = DB::table('ws_banks')->insertGetId($data);
                $bank_info = array(
                  'FKBankID'=>$bank_last_id,
                  'bank_ledger_date'=>date('Y-m-d'),
                  'bank_ledger_name'=>'Openning Bank Amount of - '.$bank_name,
                  'bank_ledger_type'=>'Openning Amount',
                  'bank_ledger_debit'=>$amount,
                );
                $bank_ledger = DB::table('bank_ledger')->insert($bank_info);
                return redirect('/banks')->with('success_message', 'Record Add Successfully.');
            }
        }
        public function remove($id){
            DB::table('ws_banks')->where('PKBankID', $id)->delete();
            return redirect('/banks')->with('remove_message', 'Record Deleted Successfully.');
        }
  public function bankservicecharges_report(Request $req){
	   $bank_name = $req->input('deposit_bank_id');

	   if($bank_name == "all"){
			$data['bank_records'] = DB::table('ws_banks')->get();
      $data['current_date'] = date('Y-m-d');
      $mpdf = new \mPDF('utf-8', 'A4-L');
			$pdf = PDF::loadView('nsk/bank/bankservicecharges_report',$data);
			return $pdf->stream('document.pdf');
	   }
	}
  public function bank_report(Request $req){
    $all_bank = $req->input('deposit_bank_id');
    if($all_bank == 'all'){
     $data['bank_records'] = DB::table('ws_banks')->get();
     $mpdf = new PDF('utf-8', 'A4-L');
     $pdf = PDF::loadView('nsk/bank/bank_report',$data);
     return $pdf->stream('document.pdf');
    }
  }
}
