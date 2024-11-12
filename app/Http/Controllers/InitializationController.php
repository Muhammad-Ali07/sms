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
        $data['customers'] = DB::table('customer')->get();
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
        $date = $request->date;
        $consignee_id = $request->consignee_id;
        $bl_no = isset($request->bl_no) ? $request->bl_no : '';
        $shipping_line = $request->shipping_line;
        $expiry_date = $request->expiry_date;
        $payment_by = $request->deposit_by;
        if($payment_by == 'client'){
            $payment_by_dtl = $request->customer_id;
        }else{
            $payment_by_dtl = $request->depositor_id;
        }
        $payment_date = $request->payment_date;
        $payment_amount = $request->deposit_amount;
        $supplier_charges = $request->supplier_charges;
        $get_id1 = DB::table('initialization')->insertGetId([
            'csm_no' => $csm_no,
            'initialization_no' => $csm_no,
            'do_date' => $date,
            'bl_no' => $bl_no,
            'shipping_line_id' => $request->shipping_line,
            'expiry_date' => $expiry_date,
            'payment_by' => $payment_by,
            'payment_by_dtl' => $payment_by_dtl,
            'payment_date' => $payment_date,
            'deposit_amount' => $payment_amount,
            'supplier_charges' => $supplier_charges,
            // 'job_no' => json_encode($job_no),
            // 'customer_id' => $customer_id,
            // 'customer_name' => $customer_name,

            // 'container_no' => json_encode($container_no_no),
            // 'placement_date' => json_encode($request->placement_date),
            // 'pick_point_ids' => json_encode($request->pick_point),
            // 'eir_date' => json_encode($request->eir_date),
            // 'eir' => json_encode($eir_received),
            // 'receiving_date' => json_encode($request->receiving_date),
            // 'eir_upload' => $file_paths_json,
            // 'no_of_containers' => $container_no,
        ]);

        if (isset($request['job_no']) && count($request['job_no']) > 0) {

            $jobNos = $request['job_no'];
            $containerNos = $request['container_no'];
            $pickPoint = $request['pick_point'];
            $yard = $request['yard'];
            $placement_date = $request['placement_date'];
            $eir_date = $request['eir_date'];
            $eir_status = $request['eir_status'];
            $receiving_date = $request['receiving_date'];
            $eir_document = $request['eir_document'];

            // Add more arrays if needed

            // Check if arrays have the same count
            $count = count($jobNos); // Assuming all arrays have the same length


            for ($i = 0; $i < $count; $i++) {
                // Access values using the same index
                $jobNo = $jobNos[$i];
                $containerNo = $containerNos[$i];
                $pickPoint = $pickPoint[$i];
                $yard = $yard[$i];
                $placement_date = $placement_date[$i];
                $eir_date = $eir_date[$i];
                $eir_status = $eir_status[$i];
                $receiving_date = $receiving_date[$i];

                if ($request->hasFile("eir_document.$i")) {
                    $file = $request->file("eir_document.$i");

                    // Generate a unique name for the file
                    $fileName = time() . '_' . $file->getClientOriginalName();

                    // Manually move the file to the public/uploads directory
                    $file->move(public_path('uploads'), $fileName);
                    $file_path = 'uploads/' . $fileName;
                }else{
                    $file_path = '';
                }

                // Save to the database or process as needed
                DB::table('initialization_dtl')->insert([
                    'initialization_id' => $get_id1,
                    'job_no' => $jobNo,
                    'container_no' => $containerNo,
                    'pick_point' => $pickPoint,
                    'yard' => $yard,
                    'placement_date' => $placement_date,
                    'eir_date' => $eir_date,
                    'eir_status' => $eir_status,
                    'eir_upload' => $file_path,
                    'receiving_date' => $receiving_date,
                ]);
            }
        } else {
            // Array is empty or not set
            echo "The 'job_no' array is empty.";
        }
        // dd($get_id1);

        // $job_no = $request->job_no;
        // $container_no = isset($request->no_of_containers) ? $request->no_of_containers : '';
        // $container_no_no = isset($request->container_no) ? $request->container_no : '';
        // $eir_received = $request->eir_status;


        // if ($request->hasFile('eir_document')) {
        //     $file_paths = []; // Array to hold the paths of uploaded files

        //     foreach ($request->file('eir_document') as $file) {
        //         // Generate a unique name for the file
        //         $fileName = time() . '_' . $file->getClientOriginalName();

        //         // Manually move the file to the public/uploads directory
        //         $file->move(public_path('uploads'), $fileName);

        //         // Store the file path in the array
        //         $file_paths[] = 'uploads/' . $fileName;
        //     }
        //     // Encode the file paths array to JSON format
        //     $file_paths_json = json_encode($file_paths);

        //     // Optionally, you can save $file_paths to your database or use it as needed
        // } else {
        //     $file_paths_json = []; // No files uploaded
        // }

        return redirect()->back()->with('success', 'Container Depositor added successfully');

    }

    public function index(){

        $initializations = DB::table('initialization')->get();
        $data['initializatoins'] = $initializations;
        return view('initialization.view',compact('data'));
    }

    public function edit($id){
        $data = [];
        $initialization = DB::table('initialization')->where('id', '=' , $id )->first();
        // dd($initialization);
        $builties = DB::table('now_builty')->get();
        $data['builties'] = $builties;
        $customers = DB::table('customer')->get();
        $data['customers'] = $customers;
        $depositors = DB::table('depositor')->get();
        // dd($depositors);
        $data['depositors'] = $depositors;

        $data['initialization'] = $initialization;

        $pickPoint = DB::table('pickup_points')->get();

        $yard = DB::table('pickup_points')->get();
        // dd($yard);
        $shippingLine = DB::table('shipping_line')->get();

        $data['pickPoint'] = $pickPoint;
        $data['yard'] = $yard;
        $data['shippingLine'] = $shippingLine;


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

    public function update(Request $request){

        $form_id = $request->form_id;
        $id = $form_id;

        $initialization_no = $request->initialization_no;
        $csm_no = $initialization_no;

        // dd($request->all());
        $date = $request->date;
        $consignee_id = $request->consignee_id;
        $bl_no = isset($request->bl_no) ? $request->bl_no : '';
        $shipping_line = $request->shipping_line;
        $expiry_date = $request->expiry_date;
        $payment_by = $request->deposit_by;
        if($payment_by == 'client'){
            $payment_by_dtl = $request->customer_id;
        }else{
            $payment_by_dtl = $request->depositor_id;
        }
        $payment_date = $request->payment_date;
        $payment_amount = $request->deposit_amount;
        $supplier_charges = $request->supplier_charges;
        $get_id1 = DB::table('initialization')->where('id','=',$form_id)->update([
            'csm_no' => $csm_no,
            'initialization_no' => $csm_no,
            'do_date' => $date,
            'consignee_id' => $consignee_id,
            'bl_no' => $bl_no,
            'shipping_line_id' => $request->shipping_line,
            'expiry_date' => $expiry_date,
            'payment_by' => $payment_by,
            'payment_by_dtl' => $payment_by_dtl,
            'payment_date' => $payment_date,
            'deposit_amount' => $payment_amount,
            'supplier_charges' => $supplier_charges,

        ]);

        if (isset($request['job_no']) && count($request['job_no']) > 0) {

            $initialzation_dtl_id = $request['initialization_dtl_id'];
            $jobNos = $request['job_no'];

            $containerNos = $request['container_no'];
            $pickPoints = $request['pick_point'];
            $yards = $request['yard'];
            $placement_dates = $request['placement_date'];
            $eir_dates = $request['eir_date'];
            $eir_statuses = $request['eir_status'];
            $receiving_dates = $request['receiving_date'];
            $eir_document = $request['eir_document'];
            $eir_upload = $request['eir_upload'];

            $count = count($jobNos); // Assuming all arrays have the same length
            // dd($count);
            DB::table('initialization_dtl')->where('initialization_id',$form_id)->delete();
            // dd($request->all());
            // dd($jobNos, $containerNos, $pickPoints, $yards, $placement_dates, $eir_dates, $eir_statuses, $receiving_dates,$eir_document);
            // for ($i = 0; $i < $count; $i++) {
            //     // Access values using the same index
            //     $jobNo = $jobNos[$i];
            //     $containerNo = $containerNos[$i];
            //     $pickPoint = $pickPoints[$i];
            //     $yard = $yards[$i];
            //     $placement_date = $placement_dates[$i];
            //     $eir_date = $eir_dates[$i];
            //     $eir_status = $eir_statuses[$i];
            //     $receiving_date = $receiving_dates[$i];

            //     DB::table('initialization_dtl')->insertGetId([
            //         'initialization_id' => $form_id,
            //         'job_no' => isset($jobNo) ?  $jobNo : '',
            //         'container_no' => isset($containerNo) ? $containerNo : '',
            //         'pick_point' => isset($pickPoint) ? $pickPoint : '',
            //         'yard' => isset($yard) ? $yard : '',
            //         'placement_date' => isset($placement_date) ? $placement_date : '',
            //         'eir_date' => isset( $eir_date) ? $eir_date : '',
            //         'eir_status' => isset($eir_status) ? $eir_status : '',
            //         // 'eir_upload' => $eir_status,
            //         'receiving_date' => isset($receiving_date) ? $receiving_date : '',
            //     ]);
            // }
            for ($i = 0; $i < $count; $i++) {
                // Access values using the same index
                $jobNo = $jobNos[$i];
                $containerNo = $containerNos[$i];
                $pickPoint = $pickPoints[$i];
                $yard = $yards[$i];
                $placement_date = $placement_dates[$i];
                $eir_date = $eir_dates[$i];
                $eir_status = $eir_statuses[$i];
                $receiving_date = $receiving_dates[$i];

                // Initialize the file path variable
                $file_path = '';

                // Check if the file exists in the request
                if ($request->hasFile("eir_document.$i")) {
                    $file = $request->file("eir_document.$i");

                    // Generate a unique name for the file
                    $fileName = time() . '_' . $file->getClientOriginalName();

                    // Manually move the file to the public/uploads directory
                    $file->move(public_path('uploads'), $fileName);
                    $file_path = 'uploads/' . $fileName;
                }else{
                    $file_path = $eir_upload[$i];
                }

                // Save the data to the database
                DB::table('initialization_dtl')->insertGetId([
                    'initialization_id' => $form_id,
                    'job_no' => isset($jobNo) ? $jobNo : '',
                    'container_no' => isset($containerNo) ? $containerNo : '',
                    'pick_point' => isset($pickPoint) ? $pickPoint : '',
                    'yard' => isset($yard) ? $yard : '',
                    'placement_date' => isset($placement_date) ? $placement_date : '',
                    'eir_date' => isset($eir_date) ? $eir_date : '',
                    'eir_status' => isset($eir_status) ? $eir_status : '',
                    'eir_upload' => $file_path, // Save the file path
                    'receiving_date' => isset($receiving_date) ? $receiving_date : '',
                ]);
            }

        } else {
            // Array is empty or not set
            echo "The 'job_no' array is empty.";
        }
        return redirect()->back()->with('success', 'Container Depositor updated successfully');
    }
	public function old_update(Request $req)
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
