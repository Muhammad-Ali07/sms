<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class JobInquiryController extends Controller
{

    public function create(){
        $data = [];
        $doc_data = [
            'model'             => 'JobInquiry',
            'code_field'        => 'code',
            // 'form_type_field'  => 'property_type',
            // 'form_type_value'  => 'property',
            'code_prefix'       => strtoupper('rfq'),
        ];
        $data['code'] = $this->documentCode($doc_data);
        // dd($data['code']);

        $form_id = $this->generateUniqueCode('now_builty', 'builty_id');
        $data['form_id'] = $form_id;
        // dd($form_id);

        $brokers = DB::table('broker')->get();
        $data['brokers'] = $brokers;

        $packages = DB::table('now_packages')
        ->where('is_delete',1)
        ->get();
        $data['packages'] = $packages;

        $selfcompany = DB::table('selfcompany')->where('is_delete', 1)->get();
        $data['selfcompany'] = $selfcompany;
       $companyId = !empty($company) && isset($company[0]->id) ? $company[0]->id : null;

        $billedCustomers = DB::table('now_rateslist')
            ->join('customer', 'now_rateslist.customerid', 'customer.id')
            ->where('now_rateslist.customer_profile', 'Billed')
            ->where('customer.selfcompany', $companyId)
            ->select('customer.name', 'customer.id')
            ->distinct()
            ->get();
        $data['billedCustomers'] = $billedCustomers;
        // Handle company session data
        $company = session('company');
        $companyId = !empty($company) && isset($company[0]->id) ? $company[0]->id : null;

        // // Fetch table data
        $customers = DB::table('customer')
            ->where('selfcompany', $companyId)
            // ->where('builtytype', 'To Pay')
            // ->where('assigned', 0)
            ->get();
            // dd($customers);
        $data['customers'] = $customers;
        $stations = DB::table('now_station')->get();
        $data['stations'] = $stations;

        $managers = DB::table('employees')->where('designation', '=', 2)->get();
        // dd($managers);
        $data['managers'] = $managers;
        return view('job_inquiry.add', compact('data'));
        // return view('job_inquiry.add', compact('data'));

    }

    public function save(Request $request){
        $doc_data = [
            'model'             => 'JobInquiry',
            'code_field'        => 'code',
            // 'form_type_field'  => 'property_type',
            // 'form_type_value'  => 'property',
            'code_prefix'       => strtoupper('rfq'),
        ];
        $doc_code = $this->documentCode($doc_data);

        $code = $doc_code;
        $form_id = $request->form_id;
        $self_company = $request->selfcompany;
        $customerType = $request->customerTtype;
        $customer = $request->customer;
        $date = $request->date;
        $Language = $request->language;
        $builty_type = isset($request->Builtytype) ? $request->Builtytype : '';

        $sendername = $request->sendername;
        $receivername = $request->receivername;
        $senderphone = $request->senderphone;
        $receiverphone = $request->receiverphone;

        $weight = $request->weight;
        $supplier_charges = $request->supplier_charges;
        $from = $request->from;
        $to = $request->to;
        $fare_rate = $request->fare_rate;

        $bl_no = $request->b_l_number;
        $cl_no = $request->l_c_number;
        $container_no = $request->container_number;
        $seal_no = $request->seal_number;

        $local_vehicle_no = $request->local_vehicle_no;
        $local_mobile_no = $request->local_mobile_no;
        $type_of_goods = $request->type_of_goods;
        $package_id = $request->package_id;
        $manager_id = $request->manager_id;

        $note = $request->note;
        $deliveryaddress = $request->deliveryaddress;
        $fare_rate = $request->fare_rate;
        $broker_id = $request->broker_id;
        $comission_status = $request->comission_status;

        // $builtyNo = $request->builty_no;
        // $computerno = $request->job_id;


        // $deliverymode = $request->deliverymode;

        $Builtytype = isset($request->Builtytype) ? $request->Builtytype : 'Advance';


        // Retrieve the array of buyer names from the form
        $buyerNames = $request->input('buyer_name'); // This returns an array of buyer names
        $sellerNames = $request->input('seller_name'); // This returns an array of buyer names

        if ($customerType == 'Billed') {
            $customerBilled = $request->customerbilled;
            $customer = '';
        }else{
            $customerBilled = '0';
        }
        // Loop through the broker_id and buying_rate arrays


        // dd($date);
        $total = 0;
        $qty_total = 0;
        $get_id1 = DB::table('now_job_inquiry')->insertGetId([
            'code' => $code,
            'job_inquiry_id' => $form_id,
            'customer' => $customer,
            'customer_id' => $customerBilled,

            'cutomer_type' => $customerType,
            'self_company' => $self_company,
            // 'computerno' => $computerno,
            // 'package_id' => count($package_id),
            'date' => $date,
            'from' => $from,
            'to' => $to,
            // 'refno' => $refno,
            // 'deliverymode' => $deliverymode,
            'supplier_charges' => $supplier_charges,
            'deliveryaddress' => $deliveryaddress,
            'note' => $note,
            'Language' => $Language,
            'Builtytype' => $Builtytype,
            'receivername' => $receivername,
            'receiverphone' => $receiverphone,
            'sendername' => $sendername,
            'senderphone' => $senderphone,
            // 'builty_id' =>  $builtyNo,
            'local_vehicle_no' => $local_vehicle_no,
            'local_mobile_no' => $local_mobile_no,
            'builty_type' => $builty_type,
            'lc_number' => $cl_no,
            'seal_number' => $seal_no,
            'weight' => $weight,
            'bl_number' => $bl_no,
            'container_number' => $container_no,
            'comission_status' => $comission_status,
            'fare_rate' =>  $fare_rate,
            'type_of_good' =>  $type_of_goods,
            'selling_rate' =>  $request->selling_rate,
            'selling_description' =>  $request->selling_description,

            'package_id' =>  $package_id,
            'manager_id' =>  $manager_id,

            'user_id' => auth()->user()->id
        ]);
        $ji = DB::table('now_job_inquiry')->where('id', '=', $get_id1)->first();
        // dd($ji);

        $broker_ids = $request->input('broker_id');
        $broker_rates = $request->input('broker_rate');
        for ($i = 0; $i < count($broker_ids); $i++) {
            if (!empty($broker_ids[$i]) && !empty($broker_rates[$i])) {
                // Save each expense record
                DB::table('now_job_inquiry_detail')->insert([
                    'broker_id' => $broker_ids[$i],
                    'broker_rate' => $broker_rates[$i],
                    'job_inquiry_id' => $get_id1,
                    'job_inquiry_code' => $ji->code,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Job Inquiry added successfully');

    }

    public function index(){

        $ji = DB::table('now_job_inquiry as ji')
                ->select('ji.*', 'from_station.name as from_station', 'to_station.name as to_station')
                ->join('now_station as from_station', 'ji.from', '=', 'from_station.id')
                ->join('now_station as to_station', 'ji.to', '=', 'to_station.id')
                ->orderBy('ji.id', 'desc')
                ->get();


        return view('job_inquiry.view',compact('ji'));
    }

    public function edit($id){
        $data = [];
        $ji = DB::table('now_job_inquiry')->where('id', '=' , $id )->first();
		$all_customers = DB::table('customer')->where('selfcompany', session('company')[0]->id)->get();
		$stationsTo = DB::table('now_station')->get();
		$stationsFrom = DB::table('now_station')->where('name', 'Karachi')->get();
        $brokers = DB::table('broker')->get();
        $company = session('company');
        $companyId = !empty($company) && isset($company[0]->id) ? $company[0]->id : null;
        // $billedCustomers = DB::table('now_rateslist')
        //     ->join('customer', 'now_rateslist.customerid', 'customer.id')
        //     ->where('customer.selfcompany', $companyId)
        //     ->select('customer.name', 'customer.id')
        //     ->distinct()
        //     ->get();
        $customers = DB::table('customer')
            ->where('selfcompany', $companyId)
            // ->where('builtytype', 'To Pay')
            // ->where('assigned', 0)
            ->get();

		$packages = DB::table('now_packages')->select('now_packages.id as package_id', 'now_packages.packagename')->get();
        $managers = DB::table('employees')->where('designation', '=', 2)->get();
        // dd($managers);
        $data['ji'] = $ji;
        $data['all_customers'] = $all_customers;
        $data['stationsTo'] = $stationsTo;
        $data['stationsFrom'] = $stationsFrom;
        $data['brokers'] = $brokers;
        $data['billedCustomers'] = $customers;
        $data['companyId'] = $companyId;
        $data['packages'] = $packages;
        $data['managers'] = $managers;
        $data['customers'] = $customers;

        return view('job_inquiry.edit',compact('data'));
    }

    public function view($id){
        $data = [];
        $ji = DB::table('now_job_inquiry')->where('id', '=' , $id )->first();
		$all_customers = DB::table('customer')->where('selfcompany', session('company')[0]->id)->get();
		$stationsTo = DB::table('now_station')->get();
		$stationsFrom = DB::table('now_station')->where('name', 'Karachi')->get();
        $brokers = DB::table('broker')->get();
        $company = session('company');
        $companyId = !empty($company) && isset($company[0]->id) ? $company[0]->id : null;
        // $billedCustomers = DB::table('now_rateslist')
        //     ->join('customer', 'now_rateslist.customerid', 'customer.id')
        //     ->where('customer.selfcompany', $companyId)
        //     ->select('customer.name', 'customer.id')
        //     ->distinct()
        //     ->get();
        $customers = DB::table('customer')
            ->where('selfcompany', $companyId)
            // ->where('builtytype', 'To Pay')
            // ->where('assigned', 0)
            ->get();

		$packages = DB::table('now_packages')->select('now_packages.id as package_id', 'now_packages.packagename')->get();
        $managers = DB::table('employees')->where('designation', '=', 2)->get();
        // dd($managers);
        $data['ji'] = $ji;
        $data['all_customers'] = $all_customers;
        $data['stationsTo'] = $stationsTo;
        $data['stationsFrom'] = $stationsFrom;
        $data['brokers'] = $brokers;
        $data['billedCustomers'] = $customers;
        $data['companyId'] = $companyId;
        $data['packages'] = $packages;
        $data['managers'] = $managers;
        $data['customers'] = $customers;

        return view('job_inquiry.view_only',compact('data'));
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

        $id = $req->id;
        $form_id = $req->form_id;
        $code = $req->code;
        $customer_type = $req->customerTtype;
        // $BID = $req->builty_no;
        $customerName = $req->customer;

        $Builtytype = $req->Builtytype;

        $date = $req->date;
        $Language = $req->language;
        $sendername = $req->sendername;
        $senderphone = $req->senderphone;
        $receivername = $req->receivername;
        $receiverphone = $req->receiverphone;

        $weight = $req->weight;
        $supplier_charges = $req->supplier_charges;
        $from = $req->from;
        $to = $req->to;
        $lc_number = $req->lc_number;
        $bl_number = $req->bl_number;
        $seal_number = $req->seal_number;
        $container_number = $req->container_number;

        $local_vehicle_no = $req->local_vehicle_no;
        $local_mobile_no = $req->local_mobile_no;
        $type_of_goods = $req->type_of_goods;
        $package_id = $req->package_id;
        $note = $req->note;
        $deliveryaddress = $req->deliveryaddress;
        $fare_rate = $req->fare_rate;
        $manager_id = $req->manager_id;

        $comission_status = $req->comission_status;


        // $buyerNames = $req->input('buyer_name'); // This returns an array of buyer names
        // $sellerNames = $req->input('seller_name'); // This returns an array of buyer names

        $customerBilled = '';
        if ($customer_type == 'Billed') {
                $customerBilled = $req->customerbilled;
                // $customer = DB::table('customer')->where('id','=',$customerBilled)->first();
                $customerName = '';
            }else{
                $customerBilled = 0;
            }
            // dd($customerBilled);
            $form_id = $id;
            $get_id1 = DB::table('now_job_inquiry')->where('id',$form_id)->update([
                'customer' => isset($customerName) ? $customerName : '',
                'customer_id' => isset($customerBilled) ? $customerBilled : '0',

                'cutomer_type' => $customer_type,
                // 'computerno' => $job_id,
                'date' => $date,
                'from' => $from,
                'to' => $to,

                'supplier_charges' => $supplier_charges,
                'deliveryaddress' => $deliveryaddress,
                'note' => $note,
                'Language' => $Language,
                'Builtytype' => isset($Builtytype) ? $Builtytype : 'Advance',
                'receivername' => $receivername,
                'receiverphone' => $receiverphone,
                'sendername' => $sendername,
                'senderphone' => $senderphone,

                'local_vehicle_no' => $local_vehicle_no,
                'local_mobile_no' => $local_mobile_no,
                'weight' => $weight,
                'lc_number' => $lc_number,
                'bl_number' => $bl_number,
                'seal_number' => $seal_number,
                'container_number' => $container_number,
                'type_of_good' => $type_of_goods,
                'package_id' => $package_id,
                'manager_id' => $manager_id,
                'selling_rate' =>  $req->selling_rate,
                'selling_description' =>  $req->selling_description,
                'comission_status' => $req->comission_status,
                'fare_rate' =>  $req->fare_rate,

                'user_id' => auth()->user()->id
            ]);
            DB::table('now_job_inquiry_detail')->where('job_inquiry_code','=',$code)->delete();
        $broker_ids = $req->input('broker_id');
        $broker_rates = $req->input('broker_rate');
        if(!empty($broker_rates)){
            for ($i = 0; $i < count($broker_ids); $i++) {
                if (!empty($broker_ids[$i]) && !empty($broker_rates[$i])) {
                    // Save each expense record
                    DB::table('now_job_inquiry_detail')->insert([
                        'broker_id' => $broker_ids[$i],
                        'broker_rate' => $broker_rates[$i],
                        'job_inquiry_id' => $id,
                        'job_inquiry_code' => $code,
                    ]);
                }
            }
        }

         // Flash success message to session
        session()->flash('success', 'Job Inquiry updated successfully!');
        return redirect('all-job-inquiry');

}

    public function destroy($id){
        $job_inquiry = DB::table('now_job_inquiry')->where('id', '=' , $id )->delete();
        session()->flash('success', 'Job Inquiry deleted successfully!');
        return redirect('all-job-inquiry');
    }
}

?>
