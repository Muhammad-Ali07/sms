<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class InitializationController extends Controller
{
    
    public function create(){
        $data = [];
        
        $getNumber = DB::table('initialization')->orderBy('id', 'desc')->offset(0)->limit(1)->get();
        $builties = DB::table('now_builty')
                ->whereNotNull('computerno')      // Exclude rows where computerno is null
              ->where('computerno', '!=', '')   // Exclude rows where computerno is empty
              ->get();
        $data['builties'] = $builties;
        // dd($getBillNumber);
        
        $pickPoint = DB::table('pickup_points')->get();
        $yard = DB::table('yard')->get();
        $shippingLine = DB::table('shipping_line')->get();
        
        $data['pickPoint'] = $pickPoint;
        $data['yard'] = $yard;
        $data['shippingLine'] = $shippingLine;
        
        if (isset($getNumber[0]->initialization_no)) {
            $bn = $getNumber[0]->initialization_no;
        } else {
            $bn = 0;
        }

        //if(isset($bn) && sizeof($bn)){  //not working on localhost

        $number = $bn;
        $number++;
        $number = str_pad($number, 3, "0", STR_PAD_LEFT);
        
        $data['initialization_no'] = $number;
        
        $customers = DB::table('customer')->get();
        $data['customers'] = $customers;
        $depositors = DB::table('depositor')->get();
        // dd($depositors);
        $data['depositors'] = $depositors;
        return view('initialization.add', compact('data'));
    }
    
    public function getBlNo(Request $request)
    {
        $jobNo = $request->input('job_no');
    
        // Retrieve the row associated with the given job number
        $row = DB::table('now_builty')->where('computerno', $jobNo)->first();
        // dd($row);
        if(!empty($row->customer_id)){
            $customer = DB::table('customer')->where('id',$row->customer_id)->first();
        }else{
            $customer = '';
        }
        // dd($customer);
        // Return the BL No if the row exists
        if ($row) {
            return response()->json(['bl_no' => $row->bl_number,'data' => $row,'customer'=> $customer]);
        }
    
        return response()->json(['bl_no' => ''], 404); // Return empty if not found
    }
    
    public function save(Request $request){
        
        $initialization_no = $request->initialization_no;
        $csm_no = $initialization_no;

        // dd($request->all());
        $job_no = $request->job_no;
        $bl_no = isset($request->bl_no) ? $request->bl_no : '';
        $container_no = isset($request->no_of_containers) ? $request->no_of_containers : '';
        $container_no_no = isset($request->container_no) ? $request->container_no : '';

        $date = $request->date;
        $expiry_date = $request->expiry_date;
        $eir_received = $request->eir_status;
        $payment_by = $request->payment_by;
        $payment_amount = $request->deposit_amount;
        $supplier_charges = $request->supplier_charges;
        if($payment_by == 'client'){
            $payment_by_dtl = $request->customer_id;
        }else{
            $payment_by_dtl = $request->depositor_id;
        }
        $payment_date = $request->payment_date;
        if ($request->hasFile('eir_document')) {
            $file = $request->file('eir_document');
            // Generate a unique name for the file
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Manually move the file to the public/uploads directory
            $file->move(public_path('uploads'), $fileName);
            $file_path = 'uploads/' . $fileName;
        }else{
            $file_path = '';
        }
        
        $get_id1 = DB::table('initialization')->insertGetId([
            'csm_no' => $csm_no,
            'initialization_no' => $csm_no,
            'job_no' => $job_no,
            'no_of_containers' => $container_no,
            'container_no' => $container_no_no,
            'do_date' => $date,

            'bl_no' => $bl_no,
            'expiry_date' => $expiry_date,
            'payment_by' => $payment_by,
            'payment_by_dtl' => $payment_by_dtl,
            'payment_date' => $payment_date,
            'deposit_amount' => $payment_amount,
            'supplier_charges' => $supplier_charges,
            'eir' => $eir_received,
            'eir_upload' => $file_path,

        ]);

        return redirect()->back()->with('success', 'Depositor added successfully');
        
    }
    
    public function index(){

        $initializations = DB::table('initialization')->get();
        $data['initializatoins'] = $initializations;
        return view('initialization.view',compact('data'));
    }
    
    public function edit($id){
        $data = [];
        $initialization = DB::table('initialization')->where('id', '=' , $id )->first();
        $builties = DB::table('now_builty')->get();
        $data['builties'] = $builties;
        $customers = DB::table('customer')->get();
        $data['customers'] = $customers;
        $depositors = DB::table('depositor')->get();
        // dd($depositors);
        $data['depositors'] = $depositors;

        $data['initialization'] = $initialization;
        return view('initialization.edit',compact('data'));
    }
    
    public function updateStatus(Request $request)
    {
    $inquiry = DB::table('now_job_inquiry')
        ->where('id', $request->id)
        ->first();

    if ($inquiry) {
        // Toggle the status
        $newStatus = $request->status === 'mature' ? 'mature' : 'immature';

        // Update the status in the database
        DB::table('now_job_inquiry')
            ->where('id', $request->id)
            ->update(['status' => $newStatus]);

        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false], 404);
    }
}

	public function update(Request $req)
    {
    // Retrieve request data
    // dd($req->all());
    $form_id = $req->form_id;
    $id = $form_id;
    $code = $req->csm_code;
    $date = $req->date;
    $job_no = $req->job_no;
    $bl_no = $req->bl_no;
    $container_no = $req->container_no;
    $no_of_containers = $req->no_of_containers;
    $expiry_date = $req->expiry_date;
    $eir_received = $req->eir_received;
    $deposit_by = $req->deposit_by;
    if(!empty($req->customer_id)){
        $deposit_by_dtl = $req->customer_id;
    }else{
        $deposit_by_dtl = $req->depositor_id;
    }
    $payment_date = $req->payment_date;
    $deposit_amount = $req->deposit_amount;
    $supplier_charges = $req->supplier_charges;

    if ($req->hasFile('eir_document')) {
        $file = $req->file('eir_document');
        // Generate a unique name for the file
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        // Manually move the file to the public/uploads directory
        $file->move(public_path('uploads'), $fileName);
        $file_path = 'uploads/' . $fileName;
    }else{
        $file_path = '';
    }

        $get_id1 = DB::table('initialization')->where('id','=',$form_id)->update([
            'csm_no' => $code,
            'initialization_no' => $code,
            'job_no' => $job_no,
            'container_no' => $container_no,
            'no_of_containers' => $no_of_containers,
            'do_date' => $date,

            'bl_no' => $bl_no,
            'expiry_date' => $expiry_date,
            'payment_by' => $deposit_by,
            'payment_by_dtl' => $deposit_by_dtl,
            'payment_date' => $payment_date,
            'deposit_amount' => $deposit_amount,
            'supplier_charges' => $supplier_charges,
            'eir' => $eir_received,
            'eir_upload' => $file_path,

        ]);
    
        return redirect()->back()->with('success', 'Depositor updated successfully');
        
}

    public function destroy($id){
        $job_inquiry = DB::table('now_job_inquiry')->where('id', '=' , $id )->first();
        dd($job_inquiry);
    }
}

?>