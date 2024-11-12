<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class RefundDetentionController extends Controller
{
    
    public function create(){
        // dd('in controller');
        $data = [];
        $initialization = DB::table('initialization')->get();
        $csm = $initialization;
        $data['csm'] = $csm;
        $data['banks'] = DB::table('now_bank')->get();
        // dd($data);
                $customers = DB::table('customer')->get();
        $data['customers'] = $customers;
        $depositors = DB::table('depositor')->get();
        // dd($depositors);
        $data['depositors'] = $depositors;

        return view('refund_detention.add', compact('data'));
    }
    
    public function fetchCsmData(Request $request)
    {
        $cdoNo = $request->get('cdo_no');
        // Fetch data from DB based on the csm_no
        $cdo = DB::table('initialization')->where('csm_no','=',$cdoNo)->first();
        
        if ($cdo) {
            $cdo_dtl = DB::table('initialization_dtl as id')
            ->join('pickup_points as pp1', 'id.pick_point', '=', 'pp1.id') // Join for pick_point
            ->join('pickup_points as pp2', 'id.yard', '=', 'pp2.id') // Join for yard
            ->select('id.*', 'pp1.name as pick_point_name', 'pp2.name as yard_name') // Selecting the fields
            ->where('id.initialization_id', '=', $cdo->id) // Filter by initialization_id
            ->get();
            // $cdo_dtl = DB::table('initialization_dtl')->where('initialization_id','=',$cdo->id)->get();
            return response()->json([
            // 'eir' => $data->eir,
            // 'eir_image' => asset('public/' . $data->eir_upload),  // Generates URL for images in public/uploads
            'data' => $cdo,
            'cdo_dtl' => $cdo_dtl
        ]);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function save(Request $request){
        
        // dd($request->all());
        $selfcompany = $request->selfcompany;
        $csm_no = $request->cdo_no;
        $bl_no =    $request->bl_no;
        // $city = $request->city;
        $payment_by = $request->payment_by;
        if($payment_by == 'client'){
            $payment_by_id = $request->customer_id;
        }else{
            $payment_by_id = $request->depositor_id;
        }
        $payment_to_depositor_date = $request->payment_to_depositor_date;
        $lolo = $request->lolo;
        $advance_tax = $request->advance_tax;
        $late_do = $request->late_do;
        $refund_amount = $request->refund_amount;
        $deduction_detention = $request->deduction_detention;

        $client_receiving_date = $request->client_receiving_date;
        $client_amount = $request->client_amount;
        $client_bank_id = $request->client_bank_id;
        $client_cheque_number = $request->client_cheque_number;

        $sms_logistic_receiving_date = $request->sms_logistic_receiving_date;
        $sms_logistic_amount = $request->sms_logistic_amount;
        $sms_logistic_bank_id = $request->sms_logistic_bank_id;
        $sms_logistic_cheque_number = $request->sms_logistic_cheque_number;

        $investor_paid_date = $request->investor_paid_date;
        $investor_amount = $request->investor_amount;
        $investor_bank_id = $request->investor_bank_id;
        $investor_cheque_number = $request->investor_cheque_number;

         $get_id1 = DB::table('refund_detentions')->insert([
            'selfcompany' => $selfcompany,
            'cdo_no' => $csm_no,
            'bl_no' => $bl_no,
            'payment_by' => $payment_by,
            'payment_by_id' => $payment_by_id,
            
            'lolo' => isset($lolo) ? $lolo : '',
            'advance_tax' => isset($advance_tax) ? $advance_tax : '',
            'late_do' => isset($late_do) ? $late_do : '',
            'refund_amount' => isset($refund_amount) ? $refund_amount : '',
            'deduction_detention' => isset($deduction_detention) ? $deduction_detention : '',

            'client_receiving_date' => isset($client_receiving_date) ? $client_receiving_date : '',
            'client_amount' => isset($client_amount) ? $client_amount : '',
            'client_bank_id' => isset($client_bank_id) ? $client_bank_id : 0,
            'client_cheque_no' => isset($client_cheque_number) ? $client_cheque_number : '',

            'sms_logistic_receiving_date' => isset($sms_logistic_receiving_date) ? $sms_logistic_receiving_date : '',
            'sms_logistic_amount' => isset($sms_logistic_amount) ? $sms_logistic_amount : '',
            'sms_logistic_bank_id' => isset($sms_logistic_bank_id) ? $sms_logistic_bank_id : 0,
            'sms_logistic_cheque_number' => isset($sms_logistic_cheque_number) ? $sms_logistic_cheque_number : '',

            'investor_paid_date' => isset($investor_paid_date) ? $investor_paid_date : '',
            'investor_amount' => isset($investor_amount) ? $investor_amount : '',
            'investor_bank_id' => isset($investor_bank_id) ? $investor_bank_id : 0,
            'investor_cheque_number' => isset($investor_cheque_number) ? $investor_cheque_number : '',
            
            
            ]);
        
        return redirect('add-refund-detention');
    }
    
    public function index(){
        
        $data = [];
        
        $refund_detentions = DB::table('refund_detentions')->get();
        $data['refund_detentions'] = $refund_detentions;
        
        return view('refund_detention.view',compact('data'));
    }
    
    public function edit($id){
        $data = [];
        // dd($data);
                $customers = DB::table('customer')->get();
        $data['customers'] = $customers;
        $depositors = DB::table('depositor')->get();
        // dd($depositors);
        $data['depositors'] = $depositors;
        $data['banks'] = DB::table('now_bank')->get();
        $refund_detention = DB::table('refund_detentions')->where('id', '=' , $id )->first();
        $ini = DB::table('initialization')->where('csm_no', '=', $refund_detention->cdo_no)->first();
        $ini_dtl = DB::table('initialization_dtl as id')
                    ->join('pickup_points as pp1', 'id.pick_point', '=', 'pp1.id') // Join for pick_point
                    ->join('pickup_points as pp2', 'id.yard', '=', 'pp2.id') // Join for yard
                    ->select('id.*', 'pp1.name as pick_point_name', 'pp2.name as yard_name') // Selecting the fields
                    ->where('id.initialization_id', '=', $ini->id) // Filter by initialization_id
                    ->get();        
        $cdo = $ini_dtl;
        $data['cdo'] = $cdo;
        
        $data['refund_detention'] = $refund_detention;
        
        return view('refund_detention.edit',compact('data'));
    }
 
	public function update(Request $request)
    {
        // Retrieve request data
        // dd($request->all());
        $selfcompany = $request->selfcompany;
        $csm_no = $request->cdo_no;
        $bl_no =    $request->bl_no;
        // $city = $request->city;
        $payment_by = $request->payment_by;
        if($payment_by == 'client'){
            $payment_by_id = $request->customer_id;
        }else{
            $payment_by_id = $request->depositor_id;
        }
        $payment_to_depositor_date = $request->payment_to_depositor_date;
        $lolo = $request->lolo;
        $advance_tax = $request->advance_tax;
        $late_do = $request->late_do;
        $refund_amount = $request->refund_amount;
        $deduction_detention = $request->deduction_detention;

        $client_receiving_date = $request->client_receiving_date;
        $client_amount = $request->client_amount;
        $client_bank_id = $request->client_bank_id;
        $client_cheque_number = $request->client_cheque_number;

        $sms_logistic_receiving_date = $request->sms_logistic_receiving_date;
        $sms_logistic_amount = $request->sms_logistic_amount;
        $sms_logistic_bank_id = $request->sms_logistic_bank_id;
        $sms_logistic_cheque_number = $request->sms_logistic_cheque_number;

        $investor_paid_date = $request->investor_paid_date;
        $investor_amount = $request->investor_amount;
        $investor_bank_id = $request->investor_bank_id;
        $investor_cheque_number = $request->investor_cheque_number;

         $get_id1 = DB::table('refund_detentions')->where('id',$request->id)->update([
            'selfcompany' => $selfcompany,
            'cdo_no' => $csm_no,
            'bl_no' => $bl_no,
            'payment_by' => $payment_by,
            'payment_by_id' => $payment_by_id,
            
            'lolo' => isset($lolo) ? $lolo : '',
            'advance_tax' => isset($advance_tax) ? $advance_tax : '',
            'late_do' => isset($late_do) ? $late_do : '',
            'refund_amount' => isset($refund_amount) ? $refund_amount : '',
            'deduction_detention' => isset($deduction_detention) ? $deduction_detention : '',

            'client_receiving_date' => isset($client_receiving_date) ? $client_receiving_date : '',
            'client_amount' => isset($client_amount) ? $client_amount : '',
            'client_bank_id' => isset($client_bank_id) ? $client_bank_id : 0,
            'client_cheque_no' => isset($client_cheque_number) ? $client_cheque_number : '',

            'sms_logistic_receiving_date' => isset($sms_logistic_receiving_date) ? $sms_logistic_receiving_date : '',
            'sms_logistic_amount' => isset($sms_logistic_amount) ? $sms_logistic_amount : '',
            'sms_logistic_bank_id' => isset($sms_logistic_bank_id) ? $sms_logistic_bank_id : 0,
            'sms_logistic_cheque_number' => isset($sms_logistic_cheque_number) ? $sms_logistic_cheque_number : '',

            'investor_paid_date' => isset($investor_paid_date) ? $investor_paid_date : '',
            'investor_amount' => isset($investor_amount) ? $investor_amount : '',
            'investor_bank_id' => isset($investor_bank_id) ? $investor_bank_id : 0,
            'investor_cheque_number' => isset($investor_cheque_number) ? $investor_cheque_number : '',
            
            
            ]);
        
        return redirect()->route('view-refund-detentions');
        
}

    public function destroy($id){
    
          DB::table('refund_detentions')->where('id', '=', $id)->delete();

        return redirect()->route('view-refund-detentions');

    }
}

?>