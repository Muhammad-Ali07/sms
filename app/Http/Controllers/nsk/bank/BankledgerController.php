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

class BankledgerController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function __construct()
        {
            $this->middleware('auth');
        }
        public function mainpage(){
            $data['bank_ledger_records'] = DB::table('bank_ledger')->get();
            $data['banks_records'] = DB::table('ws_banks')->get();
            return view('nsk/bank/bank_ledger',$data);
        }
        public function ledger_report(Request $req){
            $bank_id = $req->input('bank_id'); // Bank ID
          
            if(isset($bank_id)){
                $from_date =date('Y/m/d', strtotime($req->input('from_date')));
                $to_date = date('Y/m/d', strtotime($req->input('to_date')));
                $total_amount_debit = 0 ;
                $total_amount_credit = 0 ;
                $data['heading'] = "Ledger Bank Report";
                $data['bank_data'] = $bank_id ;
                $ws_banks_record = DB::table('ws_banks')->where('PKBankID',$bank_id)->get();
              
                $data['BankName'] = $ws_banks_record[0]->BankName;
                $data['bank_ledger_records'] = DB::table('bank_ledger')->where('FKBankID',$bank_id)->whereBetween('bank_ledger_date',[$from_date,$to_date])->get();
               
                if($data['bank_ledger_records'] && sizeof($data['bank_ledger_records']) > 0){
                    foreach($data['bank_ledger_records'] as $rec){
                        $total_amount_debit+= $rec->bank_ledger_debit ;
                    }
                    $data['total_amount_debit'] = $total_amount_debit ;
                }
                if($data['bank_ledger_records'] && sizeof($data['bank_ledger_records']) > 0){
                    foreach($data['bank_ledger_records'] as $rec){
                        $total_amount_credit+= $rec->bank_ledger_credit ;
                    }
                    $data['total_amount_credit'] = $total_amount_credit ;
                }
            // $mpdf = new \mPDF('utf-8', 'A4-L');
            $pdf = PDF::loadView('nsk/bank/bank_ledger_report',$data);
            return $pdf->stream('document.pdf');
            }else{
                $from_date =date('Y/m/d', strtotime($req->input('from_date')));
                $to_date = date('Y/m/d', strtotime($req->input('to_date')));
                $total_amount_debit = 0 ;
                $total_amount_credit = 0 ;
                $data['heading'] = "Ledger Bank Report";
                $data['bank_ledger_records'] = DB::table('bank_ledger')->whereBetween('bank_ledger_date',[$from_date,$to_date])->get();
                if($data['bank_ledger_records'] && sizeof($data['bank_ledger_records']) > 0){
                    foreach($data['bank_ledger_records'] as $rec){
                        $total_amount_debit+= $rec->bank_ledger_debit ;
                    }
                    $data['total_amount_debit'] = $total_amount_debit ;
                }
                if($data['bank_ledger_records'] && sizeof($data['bank_ledger_records']) > 0){
                    foreach($data['bank_ledger_records'] as $rec){
                        $total_amount_credit+= $rec->bank_ledger_credit ;
                    }
                    $data['total_amount_credit'] = $total_amount_credit ;
                }
            // $mpdf = new PDF('utf-8', 'A4-L');
            $pdf = PDF::loadView('nsk/bank/bank_ledger_report',$data);
            return $pdf->stream('document.pdf');
            }

        }
		// public function generatebankbuyerreport(Request $req){
        //     $from_date =date('Y/m/d', strtotime($req->input('from')));
        //     $to_date =date('Y/m/d', strtotime($req->input('to')));
        //     $buyer =$req->input('buyer_id');
        //     $buyerdata=DB::table('ws_buyers')->where('PKBuyerID',$buyer)->get();
        //     $buyername= $buyerdata[0]->BuyerName;
        //     $data['ledger_buyer_records'] = DB::table('ws_ledger_bank')->where('BuyerName',$buyername)->whereBetween('ledgerDate', [$from_date, $to_date])->get();
        //     $mpdf = new \mPDF('utf-8', 'A4-L');
        //     $pdf = PDF::loadView('millatbank_buyer_report',$data);
        //     return $pdf->stream('document.pdf');
		// }
		// public function generatebankvendorreport(Request $req){
        //     $from_date =date('Y/m/d', strtotime($req->input('from')));
        //     $to_date =date('Y/m/d', strtotime($req->input('to')));
        //     $vendor =$req->input('vendor_id');
        //     $vendordata=DB::table('ws_vendors')->where('PKVendorID',$vendor)->get();
        //     $vendorname= $vendordata[0]->VendorName;
        //     $data['ledger_vendor_records'] = DB::table('ws_ledger_bank')->where('VendorName',$vendorname)->whereBetween('ledgerDate', [$from_date, $to_date])->get();
        //     $mpdf = new \mPDF('utf-8', 'A4-L');
        //     $pdf = PDF::loadView('millatbank_vendor_report',$data);
        //     return $pdf->stream('document.pdf');
		// }

}
