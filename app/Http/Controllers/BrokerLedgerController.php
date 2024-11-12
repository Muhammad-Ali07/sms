<?php
namespace App\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Client;

use Illuminate\Support\Facades\Facade;
use PDF;
use DB;
use Session;
class BrokerLedgerController extends Controller
{
    public function index(){
        // dd('in index');
      if(auth()->user()->role_id=='2')
      {
          $broker_id=auth()->user()->user_id;
          $data['broker_record'] = DB::table('broker')->where('broker_id', $broker_id)->get();
      }
      else
      {
        $data['broker_record'] = DB::table('broker')->get();
      }

        return view('broker/B_Ledger',$data);
    }
    public function getBrokerLedgerRecord(Request $req){
        // dd($req->all());
        $id = $req->input('broker_id');
        $data['broker_ledger_record'] = DB::table('broker_ledger')->where('FKBrokerID',$id)->get();
        $data['broker_record'] = DB::table('broker')->get();
        $data['broker_id'] = $id;
        return view('broker/broker_ledger_view',$data);
    }
    public function getBrokerLedgerReport(Request $req){
        dd($req->all());
    $id = $req->input('id');
    $from = $req->input('from');
    $to   = $req->input('to');

    $from = date('Y-m-d',strtotime($from));
    $to = date('Y-m-d',strtotime($to));
    if($id == 'all'){
        $data['customer_ledger_record'] = DB::table('customer_ledger')->whereBetween('cl_date',[$from,$to])->get();
    }else{
        $data['customer_ledger_record'] = DB::table('customer_ledger')->whereBetween('cl_date',[$from,$to])->where('FKCustomerID',$id)->get();
    }

    $mpdf = new PDF('utf-8', 'A4-L');
    $pdf = PDF::loadView('customer/customer_ledger_report',$data);
    return $pdf->stream('customer_ledger_report.pdf');
    }
    public function getBrokerWiseLedgerReport(Request $req){
    //dd($req->all());
    $id = $req->input('id');
    $all = $req->input('all');

    if($all == 'on'){
        $data['customer_ledger_record'] = DB::table('customer_ledger')->where('FKCustomerID',$id)->get();

        $mpdf = new PDF('utf-8', 'A4-L');
        $pdf = PDF::loadView('customer/customer_ledger_report',$data);
        return $pdf->stream('ledger_report.pdf');
    }else{
        $from = $req->input('from');
        $to   = $req->input('to');

        $from = date('Y-m-d',strtotime($from));
        $to = date('Y-m-d',strtotime($to));
        $data['customer_ledger_record'] = DB::table('customer_ledger')->whereBetween('cl_date',[$from,$to])->where('FKCustomerID',$id)->get();

        $mpdf = new \mPDF('utf-8', 'A4-L');
        $pdf = PDF::loadView('customer/customer_ledger_report',$data);
        return $pdf->stream('customer_wise_report.pdf');
    }
    }
    public function setCustomerId(Request $req){
    $id = $req->input('customer_id');
    return $id;
    }
  }


