<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use mPDF;
use DataTables;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class biltyController extends Controller
{

	// 1/17/2022
	public function Add_manual_book()
	{


		$builties = DB::table('now_builty')->where('cutomer_type', 'Walkin')->where('Builtytype', 'Paid')->orderby('id', 'DESC')->get();

		$view = DB::table('manual_book')->get();
		return view('bilty.manualbook', compact('view', 'builties'));
	}
	public function save_mannual_book(Request $req)
	{

		$insert = DB::table('manual_book')->insert([
			'TRNO' => $req->id,
			'Tax' => $req->Tax,
			'status' => $req->status,
		]);
		return redirect('Add-manual-book');
	}


	public function save_edit_customer_builty_request(Request $req)
	{
		// Retrieve request data
		$BID = $req->builtyid;
		$customerName = $req->customer;
		$Language = $req->Language;
		$Builtytype = $req->Builtytype;
		$date = $req->date;
		$sendername = $req->sendername;
		$senderphone = $req->senderphone;
		$receivername = $req->receivername;
		$receiverphone = $req->receiverphone;
		$from = $req->from;
		$to = $req->to;
		$refno = $req->refno;
		$deliverymode = $req->deliverymode;
		$supplier_charges = $req->supplier_charges;
		$deliveryaddress = $req->deliveryaddress;
		$note = $req->note;
		$customercoder = $req->customerCode;
		$customer_type = $req->customerTtype;
		$freight = $req->freight;
		$labour = $req->labour;
		$localfreight = $req->localfreight;
		$other = $req->other;
		$totaltopay = $req->totaltopay;
		$packages = $req->package_id;

		// Initialize the charges array
		$charges11 = [];

		// Determine customer number based on type
		$customernumber = ($customer_type === 'Walkin') ? $customerName : $customercoder;

		// Update the customer_builty_request table
		$update = DB::table('customer_builty_request')->where('id', $BID)->update([
			'customer' => $customernumber,
			'Language' => $Language,
			'Builtytype' => $Builtytype,
			'date' => $date,
			'sendername' => $sendername,
			'senderphone' => $senderphone,
			'receivername' => $receivername,
			'receiverphone' => $receiverphone,
			'from' => $from,
			'to' => $to,
			'refno' => $refno,
			'deliverymode' => $deliverymode,
			'supplier_charges' => $supplier_charges,
			'deliveryaddress' => $deliveryaddress,
			'note' => $note,
			'freight' => $freight,
			'labour' => $labour,
			'local_freight' => $localfreight,
			'other' => $other,
			'total' => $totaltopay
		]);

		if ($customer_type === 'Walkin') {
			$charges11[] = $totaltopay;
		} elseif ($customer_type === 'Billed') {
			$customer = $customercoder;

			foreach ($packages as $pk) {
				if (!empty($pk)) {
					$charges = DB::table('customer_ratelist')
						->join('now_rateslist', 'customer_ratelist.ratelist_id', 'now_rateslist.id')
						->where('customer_ratelist.StationIdFrom', $from)
						->where('customer_ratelist.StationIdTo', $to)
						->where('customer_ratelist.customer_profile', 'Billed')
						->where('customer_ratelist.package_id', $pk)
						->where('customer_ratelist.customer_id', $customer)
						->first();

					if ($charges) {
						$charges11[] = $charges->rate;
					} else {
						dd('Rate not defined for package ID: ' . $pk);
					}
				}
			}
		} else {
			dd('Please specify customer type as Walkin or Billed');
		}

		if (empty($charges11)) {
			dd('Rates are not defined');
		}

		// Update customer_builty_request_items table
		$total = []; // Initialize total array to prevent errors
		for ($i = 0; $i < count($packages); $i++) {
			$desc = $req->desc;
			$quantity = $req->quantity;
			$weight = $req->weight;
			$amount = $charges11[$i] ?? 0; // Use null coalescing operator to avoid undefined index warnings
			$item_id = $req->itmeid;

			if ($req->charges[$i] === 'per_quantity') {
				if (!empty($req->Amount[$i])) {
					$total[] = $req->Amount[$i] * $quantity[$i];
				} else {
					$total[] = $amount * $quantity[$i];
				}
			} else {
				if (!empty($req->Amount[$i])) {
					$total[] = $req->Amount[$i] * $weight[$i];
				} else {
					$total[] = $amount * $weight[$i];
				}
			}

			DB::table('customer_builty_request_items')->where('itemid', $item_id[$i])->update([
				'package_id' => $packages[$i],
				'brand' => $desc[$i],
				'rate' => $amount,
				'weight' => $weight[$i],
				'quantity' => $quantity[$i],
				'total' => $total[$i],
			]);
		}

		// Update biltyaddress table if multiaddress is present
		if (!empty($req->multiaddress)) {
			for ($j = 0; $j < count($req->multiaddress); $j++) {
				DB::table('biltyaddress')->where('id', $req->addressID[$j])->update([
					'Address' => $req->multiaddress[$j],
				]);
			}
		}

		// Redirect based on customer type
		if ($customer_type === 'Walkin') {
			return redirect('view-walkin-builty');
		} else {
			return redirect('view-bilty');
		}
	}

	public function edit_mannual_book($id)
	{
		$stations = DB::table('now_station')->where('is_delete', 1)->get();
		$editdata = DB::table('manual_book')->where('id', $id)->first();
		return view('bilty.manualbook', compact('stations', 'editdata'));

	}

	public function generate_mannual_book($id)
	{

		$builties = DB::table('manual_book')->join('now_builty', 'manual_book.TRNO', 'now_builty.id')->where('manual_book.id', $id)->first();

		$pdf = PDF::loadView('bilty/generateManualBook', compact('builties'));
		// $pdf->setPaper('A4', 'Portrait');
		return $pdf->stream('report.pdf');
	}

	public function save_edit_mannual_book(Request $req)
	{

		//dd($req->all());
		$insert = DB::table('manual_book')
			->where('id', $req->id)
			->update([
				'TRNO' => $req->TRNO,
				'SenderName' => $req->SenderName,
				'ReceiverName' => $req->ReceiverName,
				'Description' => $req->Description,
				'station' => $req->station,
				'Quantity' => $req->Quantity,
				'weight' => $req->weight,
				'invoiceNO' => $req->invoiceNO,
				'Amount' => $req->Amount,
				'status' => $req->status,
				'Recivedthanks' => $req->Recivedthanks,
				'cashamount' => $req->cashamount,
				'Date' => $req->Date,
			]);

		return redirect('Add-mannual-book');
	}

	public function delete_edit_mannual_book($id)
	{

		DB::table('manual_book')->where('id', $id)->delete();
		return redirect('Add-mannual-book');
	}



	// END





	public function edit_bilty_tracking($id)
	{

		$company = DB::table('selfcompany')->get();
		$station = DB::table('now_station')->get();
		$builty = DB::table('now_builty')->get();

		$editbilty = DB::table('builty_tracking')
			->orderBy('id', 'DESC')->limit(1)->where('builtyNO', $id)->first();

		return view('bilty.edit-tracking', compact('company', 'station', 'builty', 'editbilty'));

	}

	public function edit_tracking_builty_search(Request $req)
	{
		$serialid = $req->serialid;
		$companyName = $req->companyName;
		$builtyid = $req->builtyid;
		$stations = $req->stations;
		$date = date('Y-m-d');
		date_default_timezone_set("Asia/Karachi");
		$time = date("h:i:sa");



		$insert = DB::table('builty_tracking')
			->where('id', $serialid)->update([
					'companyName' => $companyName,
					'builtyNO' => $builtyid,
					'Station' => $stations,
					'Adate' => $date,
					'Timing' => $time

				]);
		return redirect('tracking-builty');
	}


	public function save_edit_walkin_builty(Request $req)
{
    // Retrieve request data
    $id = $req->builty_form_id;
    $BID = $req->builty_no;
    $customerName = $req->customer;
    $Language = $req->language;
    $Builtytype = $req->Builtytype;
    $date = $req->date;
    $sendername = $req->sendername;
    $senderphone = $req->senderphone;
    $receivername = $req->receivername;
    $receiverphone = $req->receiverphone;
    $from = $req->from;
    $to = $req->to;
    $weight = $req->weight;
    // $refno = $req->refno;
    $deliverymode = $req->deliverymode;
    $supplier_charges = $req->supplier_charges;
    $deliveryaddress = $req->deliveryaddress;
    $note = $req->note;
    $job_id = $req->job_id;
    $customer_type = $req->customerTtype;
    $fare_rate = $req->fare_rate;
    $broker_id = $req->broker_id;
    $comission_status = $req->comission_status;
    $type_of_goods = $req->type_of_goods;
    $package_id = $req->package_id;
    $ji_id = $req->job_inquiry_id;
    $ji = DB::table('now_job_inquiry')->where('id','=' ,$ji_id)->first();
    $ji_code = $ji->code;

    $buyerNames = $req->input('buyer_name'); // This returns an array of buyer names
    $sellerNames = $req->input('seller_name'); // This returns an array of buyer names

    $customerBilled = '';
    if ($customer_type == 'Billed') {
            $customerBilled = $req->customerbilled;
            $customerName = 'not added';
        }else{
            $customerBilled = 0;
        }
        // dd($customerBilled);
        $form_id = $id;

        $get_id1 = DB::table('now_builty')->where('id',$form_id)->update([
            'customer' => isset($customerName) ? $customerName : 'not added',
            'customer_id' => isset($customerBilled) ? $customerBilled : '0',

            'cutomer_type' => $customer_type,
            'computerno' => $job_id,
            'date' => $date,
            'from' => $from,
            'to' => $to,

            'deliverymode' => $deliverymode,
            'supplier_charges' => $supplier_charges,
            'deliveryaddress' => $deliveryaddress,
            'note' => $note,
            'Language' => $Language,
            'Builtytype' => isset($Builtytype) ? $Builtytype : 'Advance',
            'receivername' => $receivername,
            'receiverphone' => $receiverphone,
            'sendername' => $sendername,
            'senderphone' => $senderphone,

            'local_vehicle_no' => $req->local_vehicle_no,
            'local_mobile_no' => $req->local_mobile_no,
            'weight' => $weight,
            'builty_id' =>  $req->builty_no,
            // 'builty_type' => $builty_type,
            'lc_number' => $req->lc_number,
            'bl_number' => $req->bl_number,
            'seal_number' => $req->seal_number,
            'type_of_good' => $type_of_goods,
            'package_id' => $package_id,
            'job_inquiry_id' => $ji_id,
            'job_inquiry_code' => $ji_code,
            'credit_days' =>  $req->credit_days,
            'payment_date' =>  $req->payment_date,
            'manager_id' =>  $req->manager_id,
            'manager_name' =>  $req->manager_name,
            'container_number' => $req->container_number,
            'comission_status' => $req->comission_status,
            'fare_rate' =>  $req->fare_rate,
            'selling_fare_rate' =>  $req->selling_fare_rate,

            'user_id' => auth()->user()->id
        ]);

        DB::table('now_bilty_puchase_expense')->where('bilty_id','=',$form_id)->delete();
        DB::table('now_bilty_selling_expense')->where('builty_id','=',$form_id)->delete();
        $buyer_seller_names = $req->input('buyer_seller_name'); // This returns an array of buyer names

        for ($x=0; $x<count($buyer_seller_names); $x++) {
            // dd($request->buyer_name[$x]);
            DB::table('now_bilty_puchase_expense')->insert([
             'name' => $req->buyer_seller_name[$x],
             'description' => $req->buyer_seller_description[$x],
             'amount' => $req->buying_rate[$x],
             'bilty_id' => $form_id,
            ]);

            DB::table('now_bilty_selling_expense')->insert([
             'name' => $req->buyer_seller_name[$x],
             'description' => $req->buyer_seller_description[$x],
             'amount' => $req->selling_rate[$x],
             'builty_id' => $form_id,
            ]);

        }

        if ($req->hasFile('doc_file')) {
            $fileIds = $req->input('file_id');

            // Loop through each uploaded file
            foreach ($req->file('doc_file') as $index => $file) {
                // Check if a file is actually uploaded
                if ($file) {
                    $timestamp = time();
                    $date = date('Ymd');
                    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $uniqueFileName = "{$originalName}_{$date}_{$timestamp}.{$extension}";

                    // Store the file in the public/uploads directory
                    $path = $file->move('uploads', $uniqueFileName, 'public');

                    // Check if the file ID exists for updating
                    if (isset($fileIds[$index])) {
                        $fileId = $fileIds[$index];

                        // Update the existing record in the database
                        DB::table('now_bilty_uploads')->where('id', $fileId)->update([
                            'path' => $path,
                            'name' => $req->doc_name[$index],
                            'bilty_id' => $form_id,
                            'updated_at' => now(),
                        ]);
                    } else {
                        // If no file ID is found, create a new record
                        DB::table('now_bilty_uploads')->insert([
                            'path' => $path,
                            'name' => $req->doc_name[$index],
                            'bilty_id' => $form_id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                } else {
                    // If no file is uploaded, you can decide how to handle it
                    // For example, you could skip this iteration or log an error
                    continue; // Skip to the next file
                }
            }

            return back()->with('success', 'Files processed successfully.');
        } else {
            return back()->withErrors('No files were uploaded.');
        }

         // Flash success message to session
        session()->flash('success', 'Bilty updated successfully!');
        return redirect('add-bilty');

}



	public function delete_walkin_builty($id)
	{
        // 		$result = DB::table('now_builtyitems')->where('now_builtyitems.builtyid', $id)->delete();

		$result1 = DB::table('now_builty')->where('now_builty.id', $id)->delete();
		 // Flash success message to session
        session()->flash('success', 'Bilty deleted successfully!');
			return redirect()->back();
	}

	public function delete_customer_builty_request($id)
	{
		$result = DB::table('customer_builty_request_items')->where('customer_builty_request_items.builtyid', $id)->delete();

		$result1 = DB::table('customer_builty_request')->where('customer_builty_request.id', $id)->delete();
		if ($result && $result1) {
			return redirect()->back();
		} else {
			return redirect()->back();
		}
	}

	public function change_customer_builty_request_status($id,$status)
	{
		if($status==2)
		{
			$result = DB::table('customer_builty_request')->where('id', $id)->update(['activation_status' => $status]);
			return redirect()->back();
		}
		else if($status==1)
		{
			$builtyData = DB::table('customer_builty_request')->where('id', $id)->first();

			if ($builtyData) {
				// Builty data found, proceed to insert into now_builty table
				$insertData = [
					'cutomer_type' => $builtyData->cutomer_type, // Replace column1, column2, etc. with your actual column names
					'builty_id' => $builtyData->builty_id,
					'self_company' => $builtyData->self_company, // Replace column1, column2, etc. with your actual column names
					'customer' => $builtyData->customer,
					'date' => $builtyData->date, // Replace column1, column2, etc. with your actual column names
					'from' => $builtyData->from,
					'to' => $builtyData->to, // Replace column1, column2, etc. with your actual column names
					'Builtytype' => $builtyData->Builtytype,
					'receivername' => $builtyData->receivername, // Replace column1, column2, etc. with your actual column names
					'sendername' => $builtyData->sendername,
					'bilty_total' => $builtyData->bilty_total, // Replace column1, column2, etc. with your actual column names
					'builty_status' => $builtyData->builty_status,
					'builty_type' => $builtyData->builty_type
					// Add more columns as needed, excluding activation_status
				];

				// Insert data into now_builty table
				$nowBuiltyId = DB::table('now_builty')->insertGetId($insertData);

				// Fetch items from customer_builty_request_items
				$builtyItems = DB::table('customer_builty_request_items')->where('builtyid', $id)->get();

				// Prepare data for insertion into now_builtyitems
				$insertItems = [];
				foreach ($builtyItems as $item) {
					$insertItems[] = [
						'builtyid' => $nowBuiltyId,
						'package_id' => $item->package_id, // Replace column1, column2, etc. with your actual column names
						'quantity' => $item->quantity,
						'brand' => $item->brand,
						'items' => $item->items, // Replace column1, column2, etc. with your actual column names
						'rate' => $item->rate,
						'weight' => $item->weight,
						'supplier' => $item->supplier, // Replace column1, column2, etc. with your actual column names
						'total' => $item->total
						// Add more columns as needed
					];
				}

				// Insert items into now_builtyitems table
				DB::table('now_builtyitems')->insert($insertItems);

				$result = DB::table('customer_builty_request_items')->where('customer_builty_request_items.builtyid', $id)->delete();

				$result1 = DB::table('customer_builty_request')->where('customer_builty_request.id', $id)->delete();

				return redirect()->back();

				// Data inserted successfully
			}
		}

	}

	public function edit_walkin_builty($id)
	{
		$stationsTo = null;
		$stationsFrom = null;
		$packages = null;
		$job_inquiries = DB::table('now_job_inquiry')
            ->leftJoin('now_builty', 'now_job_inquiry.code', '=', 'now_builty.job_inquiry_code')
            ->where('now_job_inquiry.status', '=', 'mature')
            ->whereNull('now_builty.job_inquiry_code')  // Ensure job inquiries are not present in the bilty table
            ->select('now_job_inquiry.*')  // Select only job inquiries
            ->get();
		$all_customers = DB::table('customer')->where('selfcompany', session('company')[0]->id)->get();
		$nowbiltyitems = DB::table('now_builtyitems')->where('builtyid', $id)->get();
		$multiaddress = DB::table('biltyaddress')->select('Address', 'id')->where('builtyNO', $id)->get();
		$select = DB::table('now_builty')->join('selfcompany', 'now_builty.self_company', 'selfcompany.id')->where('now_builty.id', $id)->first();

		if ($select->cutomer_type == 'Walkin') {

			$stationsTo = DB::table('now_station')->get();
			$stationsFrom = DB::table('now_station')->where('name', 'Karachi')->get();
			$packages = DB::table('now_packages')->select('now_packages.id as package_id', 'now_packages.packagename')->get();

		} else {

			$stations = DB::table('now_rateslist')
				->join('customer_ratelist', 'now_rateslist.customerid', 'customer_ratelist.customer_id')
				->join('customer', 'now_rateslist.customerid', 'customer.id')
				->where('customer_ratelist.customer_profile', 'Billed')
				->where('customer_ratelist.customer_id', $select->customer)
				->get();

			foreach ($stations as $station) {

				$customer_name = $station->name;
				$customer_id = $station->customerid;

				$packages = DB::table('now_rateslist')
					->join('customer_ratelist', 'now_rateslist.customerid', 'customer_ratelist.customer_id')
					->join('customer', 'now_rateslist.customerid', 'customer.id')
					->join('now_packages', 'customer_ratelist.package_id', 'now_packages.id')
					->where('customer_ratelist.customer_id', $customer_id)
					->select('customer_ratelist.package_id', 'now_packages.packagename')
					->distinct()
					->get();



				$stationsTo[$station->StationIdTo] = DB::table('now_station')->where('id', $station->StationIdTo)->first();

				$stationsFrom[$station->StationIdFrom] = DB::table('now_station')->where('id', $station->StationIdFrom)->first();
			}

		}

        $brokers = DB::table('broker')->get();
		    $companyId = 1;
            // $billedCustomers = DB::table('now_rateslist')
            // ->join('customer', 'now_rateslist.customerid', 'customer.id')
            // ->where('now_rateslist.customer_profile', 'Billed')
            // ->where('customer.selfcompany', $companyId)
            // ->select('customer.name', 'customer.id')
            // ->distinct()
            // ->get();

			$packages = DB::table('now_packages')->select('now_packages.id as package_id', 'now_packages.packagename')->get();

            // Fetch expense purchases
            $expensePurchases = DB::table('now_bilty_puchase_expense')
                ->where('bilty_id', $id)
                ->select('name', 'description', 'amount')
                ->get()
                ->toArray();

            // Fetch expense selling
            $expenseSelling = DB::table('now_bilty_selling_expense')
                ->where('builty_id', $id)
                ->select('name', 'description', 'amount')
                ->get()
                ->toArray();

            // Initialize an empty array to store combined results
            $combinedExpenses = [];

            // Merge purchase amounts into the combined array
            foreach ($expensePurchases as $purchase) {
                $combinedExpenses[$purchase->name] = [
                    'name' => $purchase->name,
                    'description' => $purchase->description,
                    'purchase_amount' => $purchase->amount,
                    'selling_amount' => null // Initialize selling_amount as null
                ];
            }

            // Merge selling amounts into the combined array
            foreach ($expenseSelling as $selling) {
                if (isset($combinedExpenses[$selling->name])) {
                    // If the name exists in purchases, just update the selling amount
                    $combinedExpenses[$selling->name]['selling_amount'] = $selling->amount;
                } else {
                    // Otherwise, create a new entry with the selling amount and no purchase amount
                    $combinedExpenses[$selling->name] = [
                        'name' => $selling->name,
                        'description' => $selling->description,
                        'purchase_amount' => null, // Initialize purchase_amount as null
                        'selling_amount' => $selling->amount
                    ];
                }
            }

            // Convert associative array back to an indexed array
            $combinedExpenses = array_values($combinedExpenses);

			$stations = DB::table('now_station')->get();

            $billedCustomers = DB::table('customer')->get();


        //dd($nowbiltyitems);
		return view('bilty.edit-bilty-show-panel', compact('stations','stationsTo','combinedExpenses','job_inquiries','billedCustomers','id','brokers', 'stationsFrom', 'id', 'select', 'packages', 'nowbiltyitems', 'multiaddress', 'all_customers'));


	}

	public function edit_customer_builty_request($id)
	{
		$stationsTo = null;
		$stationsFrom = null;
		$packages = null;
		$all_customers = DB::table('customer')->where('selfcompany', session('company')[0]->id)->get();
		$nowbiltyitems = DB::table('customer_builty_request_items')->where('builtyid', $id)->get();
		$multiaddress = DB::table('biltyaddress')->select('Address', 'id')->where('builtyNO', $id)->get();
		$select = DB::table('customer_builty_request')->join('selfcompany', 'customer_builty_request.self_company', 'selfcompany.id')->where('customer_builty_request.id', $id)->first();
		// 		dd($select);
		if ($select->cutomer_type == 'Normal' || $select->cutomer_type == 'Walkin') {

			$stationsTo = DB::table('now_station')->get();
			$stationsFrom = DB::table('now_station')->where('name', 'Karachi')->get();
			$packages = DB::table('now_packages')->select('now_packages.id as package_id', 'now_packages.packagename')->get();

		} else {

			$stations = DB::table('now_rateslist')
				->join('customer_ratelist', 'now_rateslist.customerid', 'customer_ratelist.customer_id')
				->join('customer', 'now_rateslist.customerid', 'customer.id')
				->where('customer_ratelist.customer_profile', 'Billed')
				->where('customer_ratelist.customer_id', $select->customer)
				->get();

			foreach ($stations as $station) {

				$customer_name = $station->name;
				$customer_id = $station->customerid;

				$packages = DB::table('now_rateslist')
					->join('customer_ratelist', 'now_rateslist.customerid', 'customer_ratelist.customer_id')
					->join('customer', 'now_rateslist.customerid', 'customer.id')
					->join('now_packages', 'customer_ratelist.package_id', 'now_packages.id')
					->where('customer_ratelist.customer_id', $customer_id)
					->select('customer_ratelist.package_id', 'now_packages.packagename')
					->distinct()
					->get();



				$stationsTo[$station->StationIdTo] = DB::table('now_station')->where('id', $station->StationIdTo)->first();

				$stationsFrom[$station->StationIdFrom] = DB::table('now_station')->where('id', $station->StationIdFrom)->first();
			}

		}


		return view('bilty.edit-customer-bilty-request-show-panel', compact('stationsTo', 'stationsFrom', 'id', 'select', 'packages', 'nowbiltyitems', 'multiaddress', 'all_customers'));


	}



	public function tracking_builty_panel($id)
	{


		$finder = DB::table('builty_tracking')
			->where('builtyNO', $id)
			->select('companyName', 'builtyNO', 'Station', 'Adate', 'Timing')
			->get();


		$biltyitems = DB::table('now_builtyitems')
			->select('quantity', 'brand', 'rate', 'weight', 'total', 'packagename')
			->join('now_packages', 'now_builtyitems.package_id', 'now_packages.id')
			->where('builtyid', $id)
			->get();


		return view('bilty.bilty-tracking-show', compact('finder', 'biltyitems'));

	}



	public function builty_tracking_seacrh(Request $req)
	{
		//dd($req->all());

		$companyName = $req->companyName;
		$builtyid = $req->builtyid;
		$stations = $req->stations;
		$date = date('Y-m-d');
		date_default_timezone_set("Asia/Karachi");
		$time = date("h:i:sa");



		for ($i = 0; $i < count($builtyid); $i++) {

			$insert = DB::table('builty_tracking')->insert([
				'companyName' => $companyName,
				'builtyNO' => $builtyid[$i],
				'Station' => $stations,
				'Adate' => $date,
				'Timing' => $time

			]);


		}


		return redirect('tracking-builty');

	}

	public function builty_tracking()
	{
		$company = DB::table('selfcompany')->get();
		$station = DB::table('now_station')->get();
		$builty = DB::table('now_builty')->get();
		$tracking = DB::table('builty_tracking')
			->select('companyName', 'builtyNO', 'Station', 'Adate', 'Timing')
			->orderBy('builty_tracking.id', 'ASC')

			->get();

		$array = [];
		foreach ($tracking as $row) {
			$array[$row->builtyNO] = $row;
		}

		//dd($array);
        //return $bi

		return view('bilty.trackbuilty', compact('company', 'builty', 'station', 'array'));
	}


	public function add_bilty(Request $req)
    {


        // Call the function with the table name and field name
        $builty_no = $this->generateBuiltyCounter('now_builty', 'builty_id');
        // dd($builty_no);
        // $job_inquiries = DB::table('now_job_inquiry')->where('status','=','mature')->get();
        $job_inquiries = DB::table('now_job_inquiry')
            ->leftJoin('now_builty', 'now_job_inquiry.code', '=', 'now_builty.job_inquiry_code')
            ->where('now_job_inquiry.status', '=', 'mature')
            ->whereNull('now_builty.job_inquiry_code')  // Ensure job inquiries are not present in the bilty table
            ->select('now_job_inquiry.*')  // Select only job inquiries
            ->get();

        // dd($job_inquiries);
        $brokers = DB::table('broker')->get();
        $packages = DB::table('now_packages')
        ->where('is_delete',1)
        ->get();
        // dd($builty_no);
        // Get data
        $packages = DB::table('now_packages')->where('is_delete', 1)->get();
        $descriptons = DB::table('description')->get();
        $lcl_packeges = DB::table('now_packages')->where('is_delete', 0)->where('lcl', 1)->get();
        $selfcompany = DB::table('selfcompany')->where('is_delete', 1)->get();

        // Handle company session data
        $company = session('company');
        $companyId = !empty($company) && isset($company[0]->id) ? $company[0]->id : null;

        // Fetch latest builty record
        $builty = DB::table('now_builty')->orderby('id', 'DESC')->first();



        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');

        // Get the last record for the current day and month
        $lastRecord = DB::table('now_builty')
                        ->where('builty_id', 'like', $day.$month.'%')
                        ->orderBy('builty_id', 'desc')
                        ->first();
        // dd($lastRecord);

        $newupdate = $builty ? ++$builty->id : 1; // Default to 1 if $builty is null

        // Fetch builties
        $builties = DB::table('now_builty')
        ->select(
            'now_builty.id as bid',
            'now_builty.*',
            DB::raw('IFNULL(now_station.name, "Ali") as station'),  // Default value "Ali" for station name
            DB::raw('IFNULL(now_builtyitems.quantity, 1) as quantity'), // Default value for quantity
            DB::raw('IFNULL(now_builtyitems.brand, "Default Brand") as brand')  // Default value for brand
        )
        ->leftJoin('now_station', 'now_builty.to', '=', DB::raw('IFNULL(now_station.id, 10)'))  // Default value 10 for station ID
        ->leftJoin('now_builtyitems', 'now_builty.id', '=', DB::raw('IFNULL(now_builtyitems.builtyid, 10)'))  // Default value 10 for builty ID
        ->orderBy('now_builty.id', 'desc')
        ->paginate(30);

        // Fetch table data
        $tbl = DB::table('customer')
            ->where('selfcompany', $companyId)
            ->where('builtytype', 'To Pay')
            ->where('assigned', 0)
            ->get();

        // $billedCustomers = DB::table('now_rateslist')
        //     ->join('customer', 'now_rateslist.customerid', 'customer.id')
        //     ->where('now_rateslist.customer_profile', 'Billed')
        //     ->where('customer.selfcompany', $companyId)
        //     ->select('customer.name', 'customer.id')
        //     ->distinct()
        //     ->get();
        $billedCustomers = DB::table('customer')->get();
        $stations = DB::table('now_station')->get();

        // Handle search functionality
        $search = $req->input('search');
        $type = $req->input('type');

        if ($search != '') {
            $builties = DB::table('now_builty')
                ->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station', 'now_builtyitems.quantity as quantity', 'now_builtyitems.brand as brand')
                ->join('now_station', 'now_builty.to', 'now_station.id')
                ->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
                ->where('cutomer_type', $type)
                ->where('self_company', $companyId)
                ->orWhere('now_builty.builty_id', 'like', '%' . $search . '%')
                ->orWhere('now_builty.id', 'like', '%' . $search . '%')
                ->orWhere('now_builty.sendername', 'like', '%' . $search . '%')
                ->orWhere('now_builty.receivername', 'like', '%' . $search . '%')
                ->orWhere('now_station.name', 'like', '%' . $search . '%')
                ->orWhere('now_builty.date', 'like', '%' . $search . '%')
                ->orWhere('now_builtyitems.quantity', 'like', '%' . $search . '%')
                ->orWhere('now_builtyitems.brand', 'like', '%' . $search . '%')
                ->orderBy('now_builty.id', 'desc')
                ->paginate(30);
        }

        // Return the view
        if ($req->ajax()) {
            return view('bilty/tableView', compact('builties'))->render();
        }
        // dd('in function');
            return view('bilty.add', compact('packages','builty_no','descriptons','job_inquiries','brokers', 'builties', 'tbl', 'lcl_packeges', 'packages', 'newupdate', 'selfcompany', 'billedCustomers', 'stations'));

        // return view('bilty.old_add', compact('descriptons', 'builties', 'tbl', 'lcl_packeges', 'packages', 'newupdate', 'selfcompany', 'billedCustomers', 'stations'));
    }

    public function getJobInquiry(Request $request)
    {
        // dd($request->all());
        $jobInquiry = DB::table('now_job_inquiry')
                        ->where('id', $request->id)
                        ->where('code', $request->code)
                        ->first();
        $manager = DB::table('employees')->where('id',$jobInquiry->manager_id)->first();
        // dd($manager);
        $newComputerNo = '';
        if($jobInquiry->cutomer_type == 'Billed'){
            $customer = DB::table('customer')->where('id','=',$jobInquiry->customer_id)->first();
            $job_no = $this->generateComputerNo('now_builty', 'computerno', $customer->prefix);
        }else{
            $job_no = $this->generateWalkinCustomerCode('now_builty', 'computerno');
        }
        // dd($job_no);
        if ($jobInquiry) {
            return response()->json([
                'success' => true,
                'data' => $jobInquiry,
                'job_no' => $job_no,
                'manager' => $manager
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Job Inquiry not found'
            ], 404);
        }
    }


	public function add_customer_builty_request(Request $req)
	{

		$packages = DB::table('now_packages')->where('is_delete', 1)->get();
		$descriptons = DB::table('description')->get();

		$lcl_packeges = DB::table('now_packages')->where('is_delete', 0)->where('lcl', 1)->get();
		$selfcompany = DB::table('selfcompany')->where('is_delete', 1)->get();


		if(auth()->user()->role_id==2)
		{
			$customer_id = auth()->user()->user_id;
			$builty = DB::table('customer_builty_request')
			->where('customer', $customer_id)
			->orderBy('id', 'desc')
			->first();
		}
		else
		{
			$builty = DB::table('customer_builty_request')
			->orderBy('id', 'desc')
			->first();
		}



		if(auth()->user()->role_id==2)
		{
			$customer_id = auth()->user()->user_id;
			$builties = DB::table('customer_builty_request')
			->join('now_station', 'customer_builty_request.to', '=', 'now_station.id')
			->join('customer', 'customer_builty_request.customer', '=', 'customer.id')
			->where('self_company', session('company')[0]->id)
			->where('customer_builty_request.customer', '=', $customer_id)
			->select('customer_builty_request.id as bid', 'customer_builty_request.*', 'now_station.name as station', 'customer.name')
			->orderBy('bid', 'desc')
			->paginate(30);
		}
		else
		{
			$builties = DB::table('customer_builty_request')
			->join('now_station', 'customer_builty_request.to', '=', 'now_station.id')
			->join('customer', 'customer_builty_request.customer', '=', 'customer.id')
			->where('self_company', session('company')[0]->id)
			->select('customer_builty_request.id as bid', 'customer_builty_request.*', 'now_station.name as station', 'customer.name')
			->orderBy('bid', 'desc')
			->paginate(30);
		}


        if(auth()->user()->role_id==2)
		{
			$customer_id = auth()->user()->user_id;
            $customer_builty_type_query = DB::table('customer')->where('id', $customer_id)->first();
		    $customer_builty_type=$customer_builty_type_query->builtytype;

			if($customer_builty_type=='To Pay')
			{
				$tbl = DB::table('customer')->where('selfcompany', session('company')[0]->id)->where('builtytype', 'To Pay')->where('assigned', 0)->where('id', $customer_id)->first();
			}
			else if($customer_builty_type=='Billed')
			{
				$tbl = DB::table('now_rateslist')->join('customer', 'now_rateslist.customerid', '=', 'customer.id')->where('now_rateslist.customer_profile', 'Billed')->where('customer.selfcompany', session('company')[0]->id)->where('customer.id', $customer_id)->select('customer.name', 'customer.id')->distinct()->first();
			}
		}
		else
		{
            $customer_builty_type='';
			$tbl='';
		}



		//$newupdate = ++$builty->id;
		$stations = DB::table('now_station')->get();

		$search = $req->input('search');
		$type = $req->input('type');

		if ($search != '') {

		 if(auth()->user()->role_id==2)
		 {
			$builties = DB::table('customer_builty_request')
				->select('customer_builty_request.id as bid', 'customer_builty_request.*', 'now_station.name as station', 'customer_builty_request_items.quantity as quantity', 'customer_builty_request_items.brand as brand')
				->join('now_station', 'customer_builty_request.to', 'now_station.id')
				->join('customer_builty_request_items', 'customer_builty_request.id', 'customer_builty_request_items.builtyid')
				->where('customer_builty_request.customer', '=', $customer_id)
				->where('cutomer_type', $type)
				->where('self_company', session('company')[0]->id)
				->orWhere('customer_builty_request.builty_id', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request.id', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request.sendername', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request.receivername', 'like', '%' . $search . '%')
				->orWhere('now_station.name', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request.date', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request_items.quantity', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request_items.brand', 'like', '%' . $search . '%')
				->orderBy('customer_builty_request.id', 'desc')
				->paginate(30);
			// ->orderBy('now_builty.id','desc')
		 }
		 else
		 {
			$builties = DB::table('customer_builty_request')
				->select('customer_builty_request.id as bid', 'customer_builty_request.*', 'now_station.name as station', 'customer_builty_request_items.quantity as quantity', 'customer_builty_request_items.brand as brand')
				->join('now_station', 'customer_builty_request.to', 'now_station.id')
				->join('customer_builty_request_items', 'customer_builty_request.id', 'customer_builty_request_items.builtyid')
				->where('cutomer_type', $type)
				->where('self_company', session('company')[0]->id)
				->orWhere('customer_builty_request.builty_id', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request.id', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request.sendername', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request.receivername', 'like', '%' . $search . '%')
				->orWhere('now_station.name', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request.date', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request_items.quantity', 'like', '%' . $search . '%')
				->orWhere('customer_builty_request_items.brand', 'like', '%' . $search . '%')
				->orderBy('customer_builty_request.id', 'desc')
				->paginate(30);
			// ->orderBy('now_builty.id','desc')
		 }
		}

		if ($req->ajax()) {
			return view('bilty/customer_builty_request_table_view', compact('builties'))->render();
		}
		return view('bilty.add_customer_builty_request', compact('descriptons', 'builties', 'tbl','customer_builty_type', 'lcl_packeges', 'packages', 'newupdate', 'selfcompany', 'stations'));

	}

	public function paid_builty(Request $request)
	{

		$data['getBiltyNumber '] = DB::table('paid_bilty')->orderBy('bilty_id', 'desc')->limit(1)->get();

		$data['bilty_data'] = DB::table('paid_bilty')->join('now_customer', 'now_customer.id', '=', 'paid_bilty.fk_customer_id')->orderBy('bilty_id', 'desc')->paginate(30);
		if ($request->ajax()) {
			return view('nsk/paid', $data)->render();
		}
		$data['station_type'] = DB::table('station_type')->get();
		$data['station_data'] = DB::table('now_station')->get();
		$data['sender_data'] = DB::table('now_customer')->get();

		return view('bilty.paid_bilty', $data);
	}

	/*public function generate_bilty(Request $req){

			 if($req->input('insertdata')){
			   $date = $req->input('date');
			   $bilty_number = $req->input('bilty_number');
			   $station_id = $req->input('stations_name');
			   $station_type = $req->input('stations_type');
			   $sender = $req->input('sender');
			   $reciever = $req->input('reciever');
			   $phone = $req->input('phone');
			   $grNum = $req->input('grNum');
			   $category = $req->input('category');
			   $desc = $req->input('desc');
			   $rate = $req->input('rate');
			   $large = $req->input('large');
			   $small = $req->input('small');
			   $qty = $req->input('qty');
			   $invoice = $req->input('invoice');
			   $amount = $req->input('amount');
			   $ctnQty = $req->input('ctnQty');
			   $labour = $req->input('labour');
			   $weight = $req->input('weight');
			   $grOn = $req->input('grOn');
			   $type = $req->input('biltynotype');

			   if($grOn == "on"){
				 $grOn = 1;
			   }else{
				 $grOn = 0;
			   }

			   $getSenderInfo = DB::table('now_customer')->where('id',$sender)->get();
			   $sender_name = $getSenderInfo[0]->name;

			   $getStation = DB::table('now_station')->where('id',$station_id)->get();
			   $station_type_id = $getStation[0]->fk_station_type;
			   $station_name = $getStation[0]->name;

			   $getStationType = DB::table('station_type')->where('station_type_id',$station_type_id)->get();
			   $stationTypeName = $getStationType[0]->station_type;

			   $bitly_date = date('Y-m-d',strtotime($date));


			   if($category == 'Literature'){
				 $data = array('bilty_sender'=>$sender_name,
				 'fk_customer_id'=>$sender,
				 'bilty_reciever'=>$reciever,
				 'bilty_phone'=>$phone,
				 'bilty_station'=>$station_name,
				 'station_type_id'=>$station_type,
				 'bilty_station_grno'=>$grNum,
				 'bilty_station_type'=>$stationTypeName,
				 'bilty_date'=>$bitly_date,
				 'bilty_number'=>$bilty_number,
				 'bilty_category'=>$category,
				 'bilty_invoice'=>$invoice,
				 'bilty_description'=>$desc,
				 'weight'=>$weight,
				 'rate'=>$rate,
				 'fk_customer_id'=>$sender,
				 'bilty_total'=>$rate,
				 'bilty_station_id'=>$station_id,
				 'gronly' => $grOn,
				 'type'  => $type,
				 'number_type'  => $type
				 );
			   }
			   elseif ($category == 'Carton') {

				 $rate = $req->input('ratectnQty');
				 $amount = $req->input('rate');
				 $ctnQty = $req->input('ctnQty');

				 $data = array(
				   'bilty_sender'=>$sender_name,
				   'fk_customer_id'=>$sender,
				   'bilty_reciever'=>$reciever,
				   'bilty_phone'=>$phone,
				   'bilty_station'=>$station_name,
				   'station_type_id'=>$station_type,
				   'bilty_station_grno'=>$grNum,
				   'bilty_station_type'=>$stationTypeName,
				   'bilty_date'=>$bitly_date,
				   'bilty_number'=>$bilty_number,
				   'bilty_category'=>$category,
				   'bilty_invoice'=>$invoice,
				   'bilty_description'=>$desc,
				   'ctn_qty'=>$ctnQty,
				   'weight'=>$weight,
				   'rate'=>$rate,
				   'fk_customer_id'=>$sender,
				   'bilty_total'=>$amount,
				   'bilty_station_id'=>$station_id,
				   'gronly'=>$grOn,
				   'type'  => $type,
					 'number_type'  => $type
				 );
			   }
			   elseif ($category == 'Weight'){

				 $ctnQty = $req->input('ctnkg');
				 $weight = $req->input('weightkg');
				 $rate = $req->input('ratekg');
				 $amount = $req->input('wtotal');

				 $data = array(
				   'bilty_sender'=>$sender_name,
				   'fk_customer_id'=>$sender,
				   'bilty_reciever'=>$reciever,
				   'bilty_phone'=>$phone,
				   'bilty_station'=>$station_name,
				   'station_type_id'=>$station_type,
				   'bilty_station_grno'=>$grNum,
				   'bilty_station_type'=>$stationTypeName,
				   'bilty_date'=>$bitly_date,
				   'bilty_number'=>$bilty_number,
				   'bilty_category'=>$category,
				   'bilty_invoice'=>$invoice,
				   'bilty_description'=>$desc,
				   'ctn_qty'=>$ctnQty,
				   'weight'=>$weight,
				   'rate'=>$rate,
				   'fk_customer_id'=>$sender,
				   'bilty_total'=>$amount,
				   'bilty_station_id'=>$station_id,
				   'gronly' => $grOn,
				   'type'  => $type,
					 'number_type'  => $type
				 );
			   }
			   elseif ($category == 'Other'){
				   $weight = $req->input('weight');
				   $rate = $req->input('rate');
				   $amount = $req->input('otherTotal');

				   $data = array(
					 'bilty_sender'=>$sender_name,
					 'fk_customer_id'=>$sender,
					 'bilty_reciever'=>$reciever,
					 'bilty_phone'=>$phone,
					 'bilty_station'=>$station_name,
					 'station_type_id'=>$station_type,
					 'bilty_station_grno'=>$grNum,
					 'bilty_station_type'=>$stationTypeName,
					 'bilty_date'=>$bitly_date,
					 'bilty_number'=>$bilty_number,
					 'bilty_category'=>$category,
					 'bilty_invoice'=>$invoice,
					 'bilty_description'=>$desc,
					 'ctn_qty'=>$weight,
					 'weight'=>$weight,
					 'rate'=>$rate,
					 'fk_customer_id'=>$sender,
					 'bilty_total'=>$amount,
					 'bilty_station_id'=>$station_id,
					 'gronly' => $grOn,
					 'type'  => $type,
					   'number_type'  => $type
				   );
			   }
			   else{
				 $data = array(
				   'bilty_sender'=>$sender_name,
				   'fk_customer_id'=>$sender,
				   'bilty_reciever'=>$reciever,
				   'bilty_phone'=>$phone,
				   'bilty_station'=>$station_name,
				   'station_type_id'=>$station_type,
				   'bilty_station_grno'=>$grNum,
				   'bilty_station_type'=>$stationTypeName,
				   'bilty_date'=>$bitly_date,
				   'bilty_number'=>$bilty_number,
				   'bilty_category'=>$category,
				   'bilty_invoice'=>$invoice,
				   'bilty_large'=>$large,
				   'bilty_small'=>$small,
				   'bilty_description'=>$desc,
				   'weight'=>$weight,
				   'fk_customer_id'=>$sender,
				   'bilty_total'=>$amount,
				   'bilty_station_id'=>$station_id,
				   'gronly' => $grOn,
				   'type'  => $type,
					'number_type'  => $type
				 );
			   }

			   $chkBiltyNum = DB::table('paid_bilty')->where('bilty_number',$bilty_number)->get();
			   if(sizeof($chkBiltyNum) > 0){
				 return redirect()->back()->with('error', 'Record with bitly number :'.$bilty_number.' already exist');
			   }else{
				 DB::table('paid_bilty')->insert($data);
				 return redirect()->back()->with('message', 'Record Added Successfully.');
			   }
			 }
			 else if($req->input('updatedata')){
			   $id = $req->input('bilty_id');
			   $date = $req->input('date');
			   $bilty_number = $req->input('bilty_number');
			   $station_id = $req->input('stations_name');
			   $station_type = $req->input('stations_type');
			   $sender = $req->input('sender');
			   $reciever = $req->input('reciever');
			   $phone = $req->input('phone');
			   $grNum = $req->input('grNum');
			   $category = $req->input('category');
			   $desc = $req->input('desc');
			   $rate = $req->input('rate');
			   $large = $req->input('large');
			   $small = $req->input('small');
			   $qty = $req->input('qty');
			   $invoice = $req->input('invoice');
			   $amount = $req->input('amount');
			   $ctnQty = $req->input('ctnQty');
			   $weight = $req->input('weight');

			   $grOn = $req->input('grOn');
			   $type = $req->input('biltynotype');

			   if($grOn == "on"){
				 $grOn = 1;
			   }else{
				 $grOn = 0;
			   }

			   $getSenderInfo = DB::table('customer')->where('id',$sender)->get();
			   $sender_name = $getSenderInfo[0]->name;

			   $getStation = DB::table('stations')->where('station_id',$station_id)->get();
			   $station_type_id = $getStation[0]->fk_station_type;
			   $station_name = $getStation[0]->station_city_name;

			   $getStationType = DB::table('station_type')->where('station_type_id',$station_type_id)->get();
			   $stationTypeName = $getStationType[0]->station_type;

			   $bitly_date = date('Y-m-d',strtotime($date));


			   if($category == 'Literature'  || $category == 'Other'){
				 $data = array('bilty_sender'=>$sender_name,'fk_customer_id'=>$sender,'bilty_reciever'=>$reciever,'bilty_phone'=>$phone,'bilty_station'=>$station_name,'station_type_id'=>$station_type,'bilty_station_grno'=>$grNum,'bilty_station_type'=>$stationTypeName,'bilty_date'=>$bitly_date,'bilty_number'=>$bilty_number,'bilty_category'=>$category,'bilty_invoice'=>$invoice,'bilty_description'=>$desc,'weight'=>$weight,'rate'=>$rate,'fk_customer_id'=>$sender,'bilty_total'=>$rate,'bilty_station_id'=>$station_id);
			   }
			   elseif ($category == 'Carton') {

				 $rate = $req->input('ratectnQty');
				 $amount = $req->input('rate');
				 $ctnQty = $req->input('ctnQty');

				 $data = array(
				   'bilty_sender'=>$sender_name,
				   'fk_customer_id'=>$sender,
				   'bilty_reciever'=>$reciever,
				   'bilty_phone'=>$phone,
				   'bilty_station'=>$station_name,
				   'station_type_id'=>$station_type,
				   'bilty_station_grno'=>$grNum,
				   'bilty_station_type'=>$stationTypeName,
				   'bilty_date'=>$bitly_date,
				   'bilty_number'=>$bilty_number,
				   'bilty_category'=>$category,
				   'bilty_invoice'=>$invoice,
				   'bilty_description'=>$desc,
				   'ctn_qty'=>$ctnQty,
				   'weight'=>$weight,
				   'rate'=>$rate,
				   'fk_customer_id'=>$sender,
				   'bilty_total'=>$amount,
				   'bilty_station_id'=>$station_id,
				   'gronly' => $grOn,
					'number_type'  => $type
				 );
			   }
			   elseif ($category == 'Weight'){

				 $ctnQty = $req->input('ctnkg');
				 $weight = $req->input('weightkg');
				 $rate = $req->input('ratekg');
				 $amount = $req->input('wtotal');

				 $data = array(
				   'bilty_sender'=>$sender_name,
				   'fk_customer_id'=>$sender,
				   'bilty_reciever'=>$reciever,
				   'bilty_phone'=>$phone,
				   'bilty_station'=>$station_name,
				   'station_type_id'=>$station_type,
				   'bilty_station_grno'=>$grNum,
				   'bilty_station_type'=>$stationTypeName,
				   'bilty_date'=>$bitly_date,
				   'bilty_number'=>$bilty_number,
				   'bilty_category'=>$category,
				   'bilty_invoice'=>$invoice,
				   'bilty_description'=>$desc,
				   'ctn_qty'=>$ctnQty,
				   'weight'=>$weight,
				   'rate'=>$rate,
				   'fk_customer_id'=>$sender,
				   'bilty_total'=>$amount,
				   'bilty_station_id'=>$station_id,
				   'gronly' => $grOn,
					'number_type'  => $type
				 );
			   }
			   else{
				 $data = array('bilty_sender'=>$sender_name,
				 'fk_customer_id'=>$sender,
				 'bilty_reciever'=>$reciever,
				 'bilty_phone'=>$phone,
				 'bilty_station'=>$station_name,
				 'station_type_id'=>$station_type,
				 'bilty_station_grno'=>$grNum,
				 'bilty_station_type'=>$stationTypeName,
				 'bilty_date'=>$bitly_date,
				 'bilty_number'=>$bilty_number,
				 'bilty_category'=>$category,
				 'bilty_invoice'=>$invoice,
				 'bilty_large'=>$large,
				 'bilty_small'=>$small,
				 'bilty_description'=>$desc,
				 'weight'=>$weight,
				 'fk_customer_id'=>$sender,
				 'bilty_total'=>$amount,
				 'bilty_station_id'=>$station_id,
				 'gronly' => $grOn,
				  'number_type'  => $type
				 );
			   }

				 DB::table('paid_bilty')->where('bilty_id',$id)->update($data);
				 return redirect('bilty_paid')->with('message', 'Record Updated Successfully.');
			 }
		   }*/

	public function getbiltyno()
	{
		$number = 0;
		$getBiltyNumber = DB::table('paid_bilty')->where('number_type', NULL)->orderBy('bilty_id', 'desc')->limit(1)->get();


		if (isset($getBiltyNumber[0]->bilty_number)) {
			$bn = $getBiltyNumber[0]->bilty_number;
		} else {
			$bn = 0;
		}
		//if(isset($bn) && sizeof($bn)){
		if ($bn) {
			$number = $bn;
			$number++;
			$number = str_pad($number, 6, "0", STR_PAD_LEFT);
		}

		$check = DB::table('paid_bilty')->where('bilty_number', $number)->first();
		if ($check == '') {
			return $number;
		} else {
			$number = Bilty_paid::checkBiltyNoExist($number);
			return str_pad($number, 6, "0", STR_PAD_LEFT);
		}
	}


	public function checkBiltyNoExist($new)
	{
		$getBiltyNumber = DB::table('paid_bilty')->where('bilty_number', $new)->first();
		if ($getBiltyNumber == '') {
			return $new;
		} else {
			$number2 = $new + 1;
			return $this->checkBiltyNoExist($number2);
		}
		// return $number2;
	}

	public function station_by_type(Request $req)
	{
		$stationType = $req->input('stations_type');
		$stationData = DB::table('now_station')->where('fk_station_type', $stationType)->get();
		return $stationData;
	}

	public function loadpdf($id)
	{


		$data['biltyRecord'] = DB::table('paid_bilty')->where('bilty_id', $id)->get();
		$pdf = PDF::loadView('bilty/mypdfile', $data);
		$pdf->setPaper('A4', 'Landscape');
		return $pdf->stream('report.pdf');
	}


	public function topaid_report(Request $req)
	{
		//$mpdf = new \mPDF('utf-8', 'A4-L');
		$from_date = date('Y/m/d', strtotime($req->input('from_date')));
		$to_date = date('Y/m/d', strtotime($req->input('to_date')));
		$data['date_from'] = $from_date;
		$data['date_to'] = $to_date;
		$data['topaid_bilty_records'] = DB::table('ws_topaid_bilty')->whereBetween('DatePaidBilty', [$from_date, $to_date])->get();
		$pdf = PDF::loadView('bilty/bilty_report_date_wise', $data);
		$pdf->setPaper('A4', 'Landscape');
		return $pdf->stream('topaid_report.pdf');
	}

	public function edit($id)
	{
		dd($id);
	}

	public function to_pay(Request $request)
	{
		$data['station_type'] = DB::table('station_type')->get();
		$data['topaid_bilty_records'] = DB::table('ws_topaid_bilty')->orderBy('PKBiltyID', 'desc')->paginate(30);
		if (Request()->ajax()) {
			return view('nsk/topay', $data)->render();
		}
		$data['type'] = "View";
		$data['form_action'] = url('/topaid_insert');

		return view('bilty/bilty_topay', $data);
	}

	public function insertform(Request $req)
	{
		$serial_number = 0001;

		$auto_bilty_number = DB::table('ws_topaid_bilty')->orderBy('PKBiltyID', 'DESC')->first();
		if ($auto_bilty_number != false) {

			$new_serial_number = $auto_bilty_number->BiltyNumber + 1;
			$new_serial_number = sprintf('%04d', $new_serial_number);
		} else {
			$new_serial_number = sprintf('%04d', $serial_number);
		}
		$sender = $req->input('sender');
		$receiver = $req->input('receiver');
		$datepicker = date('Y/m/d', strtotime($req->input('datepicker')));
		$rent = $req->input('rent');
		$labour = $req->input('labour');
		$other_rent = $req->input('other_rent');
		$other = $req->input('other');
		$total = $req->input('total');
		$station_type = $req->input('stations_type');
		$station_id = $req->input('station_name');
		$station_name = DB::table('now_station')->where('id', $station_id)->where('fk_station_type', $station_type)->get();

		$karachi_to = $station_name[0]->name;
		$data = array(
			'Sender' => $sender,
			'Receiver' => $receiver,
			'BiltyNumber' => $new_serial_number,
			'KarachiTo' => $karachi_to,
			'station_type_id' => $station_type,
			'StationId' => $station_id,
			'DatePaidBilty' => $datepicker,
			'Rent' => $rent,
			'Labour' => $labour,
			'OtherRent' => $other_rent,
			'Other' => $other,
			'Total' => $total
		);

		$topaidbilty_last_id = DB::table('ws_topaid_bilty')->insertGetId($data);

		$qty = $req->input('qty');
		if (isset($qty)) {
			foreach ($req->qty as $key => $value) {
				$data = array(
					'FKBiltyID' => $topaidbilty_last_id,
					'Quantity' => $req->qty[$key],
					'Description' => $req->description[$key],
					'Weight' => $req->weight[$key],
				);
				DB::table('ws_topaid_bilty_metas')->insert($data);
			}
		}
		// return redirect('bilty_topay')->with('success_message', 'Record Add Successfully.');
		return redirect()->back()->with('success_message', 'Record Add Successfully.');
		//} Close else condition
	}

	public function view($id)
	{
		//dd($id);
		//$mpdf = new \mPDF('utf-8', 'A4-L');
		$biltyRecord = DB::table('now_builty')
			->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
			->join('now_packages', 'now_builtyitems.package_id', 'now_packages.id')
			->join('customer', 'now_builty.customer', 'customer.id')
			->where('now_builty.id', $id)

			->get();

		//$pdf = PDF::loadView('bilty/biltytopaypdffile',compact('builties'));
		//$pdf->setPaper('A4', 'Landscape');

		$pdf = PDF::loadView('bilty/mypdfile', compact('biltyRecord'));
		$pdf->setPaper('A4', 'Landscape');

		return $pdf->stream('report.pdf');
	}


	public function view_bilty(Request $req)
	{
		$search = $req->input('search');
		$type = $req->input('type');
		if (Auth::user()->role_id == 1) {

			$builties = DB::table('now_builty')
				// ->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
				// ->join('customer', 'now_builty.customer', 'customer.id')
				->join('now_station', 'now_builty.to', 'now_station.id')
				->where('self_company', session('company')[0]->id)
				->where('now_builty.cutomer_type', 'Billed')
				// ->where('now_builty.customer', Auth::user()->user_id)
				->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station')
				->orderBy('bid', 'desc')->paginate(30);
				// dd($builties);
			$customers = DB::table('customer')->get();
            // 			$customers = DB::table('customer')->where('id', Auth::user()->user_id)->get();

		} else if (Auth::user()->role_id == 2) {
			$customer_id = auth()->user()->user_id;
			$builties = DB::table('now_builty')
				->join('now_builtyitems', 'now_builty.id', '=', 'now_builtyitems.builtyid')
				->join('customer', 'now_builty.customer', '=', 'customer.id')
				->join('now_station', 'now_builty.to', '=', 'now_station.id')
				->where('self_company', session('company')[0]->id)
				->where('now_builty.cutomer_type', 'Billed')
				->where('customer.id', $customer_id)
				->select(
					'now_builty.id as bid',
					'now_builty.*',
					'now_station.name as station',
					'now_builtyitems.quantity as quantity',
					'now_builtyitems.brand as brand'
				)
				->orderBy('bid', 'desc')
				->paginate(30);

			$customers = $customers = DB::table('customer')->where('id', $customer_id)->get();

		} else {
			$builties = DB::table('now_builty')
				->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
				->join('customer', 'now_builty.customer', 'customer.id')
				->join('now_station', 'now_builty.to', 'now_station.id')
				->where('self_company', session('company')[0]->id)
				->where('now_builty.cutomer_type', 'Billed')
				->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station', 'now_builtyitems.quantity as quantity', 'now_builtyitems.brand as brand')
				->orderBy('bid', 'desc')->paginate(30);
			$customers = DB::table('customer')->get();

		}

		if ($search != '') {
			$builties = DB::table('now_builty')
				->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station', 'now_builtyitems.quantity as quantity', 'now_builtyitems.brand as brand')
				->join('now_station', 'now_builty.to', 'now_station.id')
				->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
				->where('cutomer_type', $type)
				->where('self_company', session('company')[0]->id)
				->orWhere('now_builty.builty_id', 'like', '%' . $search . '%')
				->orWhere('now_builty.id', 'like', '%' . $search . '%')
				->orWhere('now_builty.sendername', 'like', '%' . $search . '%')
				->orWhere('now_builty.receivername', 'like', '%' . $search . '%')
				->orWhere('now_station.name', 'like', '%' . $search . '%')
				->orWhere('now_builty.date', 'like', '%' . $search . '%')
				->orWhere('now_builtyitems.quantity', 'like', '%' . $search . '%')
				->orWhere('now_builtyitems.brand', 'like', '%' . $search . '%')
				->orderBy('now_builty.id', 'desc')
				->paginate(30);
		}


		if ($req->ajax()) {
			return view('bilty/tableView', compact('builties'))->render();
		}

		return view('bilty.view', compact('builties', 'customers'));
	}




	public function view_normal_builty(Request $req)
	{
		$search = $req->input('search');
		$type = $req->input('type');
		if (Auth::user()->role_id == 1) {

			$builties = DB::table('now_builty')
				->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
				->join('customer', 'now_builty.customer', 'customer.id')
				->join('now_station', 'now_builty.to', 'now_station.id')
				->where('self_company', session('company')[0]->id)
				->where('now_builty.cutomer_type', 'Normal')
				->where('now_builty.customer', Auth::user()->user_id)
				->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station', 'now_builtyitems.quantity as quantity', 'now_builtyitems.brand as brand')
				->orderBy('bid', 'desc')->paginate(30);
			$customers = DB::table('customer')->where('id', Auth::user()->user_id)->get();

		} else {
			$builties = DB::table('now_builty')
				->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
				->join('customer', 'now_builty.customer', 'customer.id')
				->join('now_station', 'now_builty.to', 'now_station.id')
				->where('self_company', session('company')[0]->id)
				->where('now_builty.cutomer_type', 'Normal')
				->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station', 'now_builtyitems.quantity as quantity', 'now_builtyitems.brand as brand')
				->orderBy('bid', 'desc')->paginate(30);
			$customers = DB::table('customer')->get();

		}

		if ($search != '') {
			$builties = DB::table('now_builty')
				->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station', 'now_builtyitems.quantity as quantity', 'now_builtyitems.brand as brand')
				->join('now_station', 'now_builty.to', 'now_station.id')
				->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
				->where('now_builty.cutomer_type', 'Normal')
				->where('self_company', session('company')[0]->id)
				->orWhere('now_builty.builty_id', 'like', '%' . $search . '%')
				->orWhere('now_builty.id', 'like', '%' . $search . '%')
				->orWhere('now_builty.sendername', 'like', '%' . $search . '%')
				->orWhere('now_builty.receivername', 'like', '%' . $search . '%')
				->orWhere('now_station.name', 'like', '%' . $search . '%')
				->orWhere('now_builty.date', 'like', '%' . $search . '%')
				->orWhere('now_builtyitems.quantity', 'like', '%' . $search . '%')
				->orWhere('now_builtyitems.brand', 'like', '%' . $search . '%')
				->orderBy('now_builty.id', 'desc')
				->paginate(30);
		}

		if ($req->ajax()) {
			return view('bilty/tableView', compact('builties'))->render();
		}


		return view('bilty.view', compact('builties', 'customers'));
	}



	public function view_walkin_builty(Request $req)
	{

		$search = $req->input('search');
		$type = $req->input('type');

		$builties = DB::table('now_builty')
			->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
			->join('now_station', 'now_builty.to', 'now_station.id')
			->where('cutomer_type', 'Walkin')
			->where('self_company', session('company')[0]->id)
			->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station', 'now_builtyitems.quantity as quantity', 'now_builtyitems.brand as brand')
			->orderBy('bid', 'desc')->paginate(30);
		if ($search != '') {
			$builties = DB::table('now_builty')
				->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station', 'now_builtyitems.quantity as quantity', 'now_builtyitems.brand as brand')
				->join('now_station', 'now_builty.to', 'now_station.id')
				->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
				->where('now_builty.cutomer_type', 'Walkin')
				->where('self_company', session('company')[0]->id)
				->orWhere('now_builty.builty_id', 'like', '%' . $search . '%')
				->orWhere('now_builty.id', 'like', '%' . $search . '%')
				->orWhere('now_builty.sendername', 'like', '%' . $search . '%')
				->orWhere('now_builty.receivername', 'like', '%' . $search . '%')
				->orWhere('now_station.name', 'like', '%' . $search . '%')
				->orWhere('now_builty.date', 'like', '%' . $search . '%')
				->orWhere('now_builtyitems.quantity', 'like', '%' . $search . '%')
				->orWhere('now_builtyitems.brand', 'like', '%' . $search . '%')
				->orderBy('now_builty.id', 'desc')
				->paginate(30);
		}

		if ($req->ajax()) {

			return view('bilty/tableView', compact('builties'))->render();
		}

		return view('bilty.view-walkin-builties', compact('builties'));
	}

	public function get_station_rate(Request $req)
	{
		// return 'farhan';

		$station_from = $req->input('station_from');
		$station_to = $req->input('station_to');
		$sender_id = $req->input('sender_id');
		$package_id = $req->input('package_id');

		$rates = DB::table('now_rateslist')
			->join('customer_ratelist', 'now_rateslist.id', 'customer_ratelist.ratelist_id')
			->join('customer', 'now_rateslist.customerid', 'customer.id')
			->where(['now_rateslist.customerid' => $sender_id, 'customer_ratelist.StationIdTo' => $station_to, 'customer_ratelist.StationIdFrom' => $station_from, 'customer_ratelist.package_id' => $package_id])
			->first();
		return response()->json($rates);
		//dd($rates);
		/* if($rates=="")
			  {
				  $ratesnew = DB::table('pkg_price_history')->where(['fk_station_id'=>$station_id,'fk_sender_id'=>$sender_id])->
				  whereDate('Date', '<=', $date)->get();

				 // return $ratesnew;
				  return $ratesnew;
			  }
			  if($rates!="")
			  {
				  $rates = DB::table('pkg_price')->where(['fk_station_id'=>$station_id,'fk_sender_id'=>$sender_id])->
				  whereDate('Date', '<=', $date)->get();

				  return $rates;
			  } */


	}

	public function add_bilty_process_old(Request $requst)
    {
    // dd($requst->all());
    $builtyNo = $requst->builty_id;
    $builty_type = $requst->builty_type;
    $customer = $requst->customer;
    $customerType = $requst->customerTtype;
    $self_company = $requst->selfcompany;
    $computerno = $requst->job_id;
    $date = $requst->date;
    $from = $requst->from;
    $to = $requst->to;
    $refno = $requst->refno;
    $deliverymode = $requst->deliverymode;
    $supplier_charges = $requst->supplier_charges;
    $deliveryaddress = $requst->deliveryaddress;
    $note = $requst->note;
    $Language = $requst->Language;
    $Builtytype = $requst->Builtytype;
    $receivername = $requst->receivername;
    $receiverphone = $requst->receiverphone;
    $sendername = $requst->sendername;
    $senderphone = $requst->senderphone;
    $package_id = $requst->package_id ?? [];
    $quantity = $requst->quantity ?? [];
    $desc = $requst->desc ?? [];
    $weight = $requst->weight ?? [];
    $address = $requst->address ?? [];
    $freight = $requst->freight;
    $labour = $requst->labour;
    $localfreight = $requst->localfreight;
    $other = $requst->other;
    $totaltopay = $requst->totaltopay;
    $charges11 = [];
    $Builtytype = 'advance';

    // dd($customerType);
    if ($customerType == 'Walkin') {
        $charges = $totaltopay;
    } else if ($customerType == 'Billed') {
        $customer = $requst->customerbilled;
        foreach ($package_id as $pk) {
            if (!empty($pk)) {
                $charges = DB::table('customer_ratelist')
                    ->join('now_rateslist', 'customer_ratelist.ratelist_id', 'now_rateslist.id')
                    ->where('customer_ratelist.StationIdFrom', $from)
                    ->where('customer_ratelist.StationIdTo', $to)
                    ->where('customer_ratelist.customer_profile', 'Billed')
                    ->where('customer_ratelist.package_id', $pk)
                    ->where('customer_ratelist.customer_id', $customer)
                    ->first();

                $charges11[] = $charges->rate ?? 10; // Default rate if not found
            }
        }
    } else if ($customerType == 'Normal') {
        $customer = $requst->normalcustomer;
        foreach ($package_id as $pk) {
            if (!empty($pk)) {
                $charges = DB::table('customer_ratelist')
                    ->join('now_rateslist', 'customer_ratelist.ratelist_id', 'now_rateslist.id')
                    ->where('customer_ratelist.StationIdTo', $to)
                    ->where('customer_ratelist.customer_profile', 'Normal')
                    ->where('customer_ratelist.package_id', $pk)
                    ->where('customer_ratelist.customer_id', $customer)
                    ->first();

                $charges11[] = $charges->rate ?? 10; // Default rate if not found
            }
        }
    } else {
        dd('Please first insert rate for stations');
        return redirect()->back();
    }

    $total = 0;
    $qty_total = 0;
    // dump($customer);
    // dd($requst->all());
    $get_id1 = DB::table('now_builty')->insertGetId([
        'customer' => $customer,
        'cutomer_type' => $customerType,
        'self_company' => $self_company,
        'computerno' => $computerno,
        'package_id' => count($package_id),
        'date' => $date,
        'from' => $from,
        'to' => $to,
        'refno' => $refno,
        'deliverymode' => $deliverymode,
        'supplier_charges' => $supplier_charges,
        'deliveryaddress' => $deliveryaddress,
        'note' => $note,
        'Language' => $Language,
        'Builtytype' => $Builtytype,
        'receivername' => $receivername,
        'receiverphone' => $receiverphone,
        'sendername' => $sendername,
        'senderphone' => $senderphone,
        'builty_id' => $computerno . $builtyNo,
        'local_vehicle_no' => $requst->local_vehicle_no,
        'local_mobile_no' => $requst->local_mobile_no,
        'builty_type' => $builty_type,
        'freight' => $freight,
        'labour' => $labour,
        'local_freight' => $localfreight,
        'other' => $other,
        'total' => $totaltopay,
        'user_id' => auth()->user()->id
    ]);

    if (!empty($quantity)) {
        if ($builty_type == 'lcl') {
            for ($j = 0; $j < count($quantity); $j++) {
                if (!empty($quantity[$j]) && !empty($desc[$j]) && !empty($package_id[$j])) {
                    if ($customerType == 'Walkin') {
                        $charges_rate = $totaltopay;
                    } else {
                        $charges_rate = ($requst->charges[$j] == 'per_quantity')
                            ? ($requst->Amount[$j] ?? $charges11[$j]) * $quantity[$j]
                            : ($requst->Amount[$j] ?? $charges11[$j]) * $weight[$j];
                    }

                    $total += $charges_rate;
                    $quantity1 = $quantity[$j];
                    $qty_total += $quantity1;
                    $desc2 = $desc[$j];
                    $weight4 = $weight[$j];
                    $package5 = $package_id[$j];

                    DB::table('now_builtyitems')->insert([
                        'package_id' => $package5,
                        'quantity' => $quantity1,
                        'brand' => $desc2,
                        'items' => $requst->items[$j] ?? null,
                        'supplier' => $requst->supplier_type == 'per_carton'
                            ? $quantity1 * $requst->carton[$j]
                            : $requst->lumpsum[$j],
                        'total' => $charges_rate,
                        'rate' => $requst->Amount[$j] ?? $charges11[$j] ?? $charges_rate,
                        'weight' => $weight4,
                        'builtyid' => $get_id1
                    ]);
                }
            }
        } else {
            $charges_rate = ($customerType == 'Walkin') ? $totaltopay : $requst->amount[0];

            $total += $charges_rate;
            $quantity1 = $requst->quantity[1];
            $qty_total += $quantity1;
            $desc2 = $requst->desc[1];
            $weight4 = $requst->weight[1];
            $package5 = $requst->package_id[1];

            DB::table('now_builtyitems')->insert([
                'package_id' => $package5,
                'quantity' => $quantity1,
                'brand' => $desc2,
                'total' => $charges_rate,
                'rate' => $requst->amount[0],
                'weight' => $weight4,
                'builtyid' => $get_id1
            ]);
        }

        $logofindger = DB::table('selfcompany')->where('id', 1)->first();
        $newlogo = "logo.png"; //$logofindger->logo;;

        DB::table('now_builty')->where('id', $get_id1)->update(['bilty_total' => $total]);

        if ($customerType == 'Walkin') {
            $ids = explode(' ', $get_id1);
            $builties = DB::table('now_builty')->whereIn('id', $ids)->get();
            return view('bilty.generate_printable_bilty', compact('builties', 'ids'));
        } else {
            return redirect()->back()->with('success', $self_company);
        }
    }
}

    public function add_bilty_process(Request $request){
        // $bl = $request->b_l_number;
        // $numeric_code = $this->generateJobCode('now_builty');
        $customerType = $request->customerTtype;
        // dd($request->all());
        if($request->customerTtype == 'Billed'){
            $customer = DB::table('customer')->where('id','=',$request->customerbilled)->first();
            // dd($customer);
            $job_no = $this->generateComputerNo('now_builty', 'computerno', $customer->prefix);
        }else{
            $job_no = $this->generateWalkinCustomerCode('now_builty', 'computerno');
        }
        // dd($job_no);


        $builty_no = $this->generateBuiltyCounter('now_builty', 'builty_id');
        // dd($builty_no);

        $self_company = $request->selfcompany;
        $customer = $request->customer;
        $builtyNo = $builty_no;
        $computerno = $job_no;
        $builty_type = isset($request->Builtytype) ? $request->Builtytype : '';
        $fare_rate = $request->fare_rate;
        // $fare_rate = $request->weight;

        $date = date('Y-m-d', strtotime($request->date));
        $Language = $request->language;
        $sendername = $request->sendername;
        $receivername = $request->receivername;
        $senderphone = $request->senderphone;
        $receiverphone = $request->receiverphone;
        $deliveryaddress = $request->deliveryaddress;
        $bl_no = $request->b_l_number;
        $cl_no = $request->l_c_number;
        $container_no = $request->container_number;
        $seal_no = $request->seal_number;

        $weight = $request->weight;
        $from = $request->from;
        $to = $request->to;
        $deliverymode = $request->deliverymode;

        $supplier_charges = $request->supplier_charges;
        $note = $request->note;
        $Builtytype = isset($request->Builtytype) ? $request->Builtytype : 'Advance';

        $broker_id = $request->broker_id;
        $comission_status = $request->comission_status;
        $type_of_goods = $request->type_of_goods;
        $package_id = $request->package_id;
        $job_inquiry_id = $request->job_inquiry_id;
        $job_inquiry = DB::table('now_job_inquiry')->where('id',$job_inquiry_id)->first();
        $job_inquiry_code = $job_inquiry->code;
        // Retrieve the array of buyer names from the form
        // $buyerNames = $request->input('buyer_name'); // This returns an array of buyer names
        // $sellerNames = $request->input('seller_name'); // This returns an array of buyer names

        $buyer_seller_names = $request->input('buyer_seller_name'); // This returns an array of buyer names

        if ($request->customerbilled != '') {
            $customerBilled = $request->customerbilled;
            $customer = '';
        }else{
            $customerBilled = '0';
        }
        // dd($customerBilled);
        $total = 0;
        $qty_total = 0;

        $doc_data = [
            'model'             => 'JobInquiry',
            'code_field'        => 'code',
            'code_prefix'       => strtoupper('rfq'),
        ];


        // $job_inquiry_code = $this->documentCode($doc_data);
        // dd( $job_inquiry_code);
        // $job_inquiry = DB::table('now_job_inquiry')->where('code', '=', $job_inquiry_code)->first();
        // dd($job_inquiry);
        // $job_inquiry_id = $job_inquiry->job_inquiry_id;

        $get_id1 = DB::table('now_builty')->insertGetId([
            'customer' => isset($customer) ? $customer : '',
            'customer_id' => $customerBilled,

            'cutomer_type' => $customerType,
            'self_company' => $self_company,
            'computerno' => $computerno,
            // 'package_id' => count($package_id),
            'date' => $date,
            'from' => $from,
            'to' => $to,
            // 'refno' => $refno,
            'deliverymode' => $deliverymode,
            'supplier_charges' => $supplier_charges,
            'deliveryaddress' => $deliveryaddress,
            'note' => $note,
            'Language' => $Language,
            'Builtytype' => $Builtytype,
            'receivername' => $receivername,
            'receiverphone' => $receiverphone,
            'sendername' => $sendername,
            'senderphone' => $senderphone,
            'builty_id' =>  $builtyNo,
            'local_vehicle_no' => $request->local_vehicle_no,
            'local_mobile_no' => $request->local_mobile_no,
            'builty_type' => $builty_type,
            'lc_number' => $cl_no,
            'seal_number' => $seal_no,
            'weight' => $weight,
            'bl_number' => $bl_no,
            'container_number' => $container_no,
            'comission_status' => $comission_status,
            'fare_rate' =>  $fare_rate,
            'selling_fare_rate' =>  $request->selling_fare_rate,
            'credit_days' =>  $request->credit_days,
            'payment_date' =>  $request->payment_date,
            'manager_id' =>  $request->manager_id,
            'manager_name' =>  $request->manager_name,
            'broker_id' => $request->broker_id,
            'type_of_good' =>  $type_of_goods,

            'package_id' =>  $package_id,
            'job_inquiry_id' =>  $job_inquiry_id,
            'job_inquiry_code' =>  $job_inquiry_code,

            'user_id' => auth()->user()->id
        ]);

        for ($x=0; $x<count($buyer_seller_names); $x++) {
            // dd($request->buyer_name[$x]);
            DB::table('now_bilty_puchase_expense')->insert([
             'name' => $request->buyer_seller_name[$x],
             'description' => $request->buyer_seller_description[$x],
             'amount' => $request->buying_rate[$x],
             'bilty_id' => $get_id1,
            ]);

            DB::table('now_bilty_selling_expense')->insert([
             'name' => $request->buyer_seller_name[$x],
             'description' => $request->buyer_seller_description[$x],
             'amount' => $request->selling_rate[$x],
             'builty_id' => $get_id1,
            ]);

        }

         // Handle file uploads
        // dd($form_id);
        // Check if doc_file is an array and not empty
        if ($request->hasFile('doc_file') && is_array($request->file('doc_file'))) {
            foreach ($request->file('doc_file') as $index => $file) {
                // Generate a unique name for the file
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Manually move the file to the public/uploads directory
                $file->move(public_path('uploads'), $fileName);

                // Save to database (assuming you have a Model named Document)
                DB::table('now_bilty_uploads')->insert([
                    'name' => $request->doc_name[$index],
                    'path' => 'uploads/' . $fileName, // Save the relative path in the DB
                    'bilty_id' => $get_id1,
                ]);
            }
        }
        $broker = DB::table('broker')->where('broker_id',$request->broker_id)->first();
        $bilty = DB::table('now_builty')->where('id',$get_id1)->first();
        // dd($fare_rate);
        $fare_rate_cleaned = (float) str_replace(',', '', $fare_rate);
        $description = 'Bilty made against this broker ' . $broker->broker_name . ' bilty no:' . $bilty->builty_id;
        // ledger entries
        $data = array(
            'FKCustomerID' => $broker_id,
            'BillNumber' => $get_id1,
            'ReceivingDate' => $date,
            'Amount' => $fare_rate_cleaned,
            'entry_type'=> 'Payable',
            'description'=> $description
        );
        $receiving_last_id = DB::table('ws_receiving')->insertGetId($data);

            $general_data = array(
                'ledger_date' => $date,
                'ledger_desc' => $description.' | ',
                'ledger_reference' => $bilty->builty_id,
                'ledger_debit' => $fare_rate,
                'FKCustomerID' => $broker_id,
                'FKRecievingID' => $receiving_last_id,
                'bill' => $get_id1
            );
          DB::table('ledger')->insert($general_data);

          $broker_data = array(
                'bk_date' => $date,
                'bk_desc' => $description.' | ',
                'bk_reference' => $bilty->builty_id,
                'reference_id' => $get_id1,
                'bk_debit' => $fare_rate,
                'FKBrokerID' => $broker_id,
                'FKRecievingID' => $receiving_last_id
            );
          DB::table('broker_ledger')->insert($broker_data);


         // Flash success message to session
        session()->flash('success', 'Bilty created successfully!');
        return redirect()->back()->with('success', 'Builty added successfully');

    }

	public function add_customer_bilty_request_process(Request $requst)
	{

		$builtyNo = $requst->builty_id;
		$builty_type = $requst->builty_type;
		$customer = $requst->customer;
		$customerType = $requst->customerTtype;
		$self_company = $requst->selfcompany;
		$computerno = $requst->computerno;
		$date = $requst->date;
		$from = $requst->from;
		$to = $requst->to;
		$refno = $requst->refno;
		$deliverymode = $requst->deliverymode;
		$supplier_charges = $requst->supplier_charges;
		$deliveryaddress = $requst->deliveryaddress;
		$note = $requst->note;
		$Language = $requst->Language;
		$Builtytype = $requst->Builtytype;
		$receivername = $requst->receivername;
		$receiverphone = $requst->receiverphone;
		$sendername = $requst->sendername;
		$senderphone = $requst->senderphone;
		$package_id = count($requst->package_id);
		$quantity = count($requst->quantity);
		$desc = count($requst->desc);
		$weight = count($requst->weight);
		$address = $requst->address;
		$freight = $requst->freight;
		$labour = $requst->labour;
		$localfreight = $requst->localfreight;
		$other = $requst->other;
		$totaltopay = $requst->totaltopay;
		$charges11 = [];
		$activation_status=0;

		if ($customerType == 'Billed') {
			$customer_billed = $requst->customerbilled;
		}

		if (empty($charges)) {
			dd('rates are not defined');
		}

		$total = 0;
		$qty_total = 0;


		$get_id1 = DB::table('customer_builty_request')->insertGetId([
			'customer' => $customer,
			'cutomer_type' => $customerType,
			'self_company' => $self_company,
			'computerno' => $computerno,
			'package_id' => $package_id,
			'date' => $date,
			'from' => $from,
			'to' => $to,
			'refno' => $refno,
			'deliverymode' => $deliverymode,
			'supplier_charges' => $supplier_charges,
			'deliveryaddress' => $deliveryaddress,
			'note' => $note,
			'Language' => $Language,
			'Builtytype' => $Builtytype,
			'receivername' => $receivername,
			'receiverphone' => $receiverphone,
			'sendername' => $sendername,
			'senderphone' => $senderphone,
			'builty_id' => $computerno . $builtyNo,
			'local_vehicle_no' => $requst->local_vehicle_no,
			'local_mobile_no' => $requst->local_mobile_no,
			'builty_type' => $builty_type,
			'activation_status' => $activation_status,
			'freight' => $freight,
			'labour' => $labour,
			'local_freight' => $localfreight,
			'other' => $other,
			'total' => $totaltopay,
			'user_id' => auth()->user()->id
		]);

		/*if(!empty($requst->address)){
						for($i = 0; $i < count($requst->address); $i++ ){
							//dd($requst->address);
						$insert = DB::table('biltyaddress')->insert([
						'Address' => $requst->address[$i],
						'builtyNO' => $get_id

						 ]);
						}
					}*/

		if (!empty($quantity)) {

			if ($builty_type == 'lcl') {

				for ($j = 0; $j < $quantity; $j++) {
					if (!empty($requst->quantity[$j]) and !empty($requst->desc[$j]) and !empty($requst->package_id[$j])) {

						if ($customerType == 'Walkin') {
							$charges_rate = $totaltopay;
						} else {
							if ($requst->charges[$j] == 'per_quantity') {
								if (!empty($requst->Amount[$j])) {
									$charges_rate = $requst->Amount[$j] * $requst->quantity[$j];
								} else {
									$charges_rate = $charges11[$j] * $requst->quantity[$j];
								}

							} else {
								if (!empty($requst->Amount[$j])) {
									$charges_rate = $requst->Amount[$j] * $requst->weight[$j];
								} else {
									$charges_rate = $charges11[$j] * $requst->weight[$j];
								}
							}
						}

						$total += $charges_rate;
						$quantity1 = $requst->quantity[$j];
						$qty_total += $quantity1;
						$desc2 = $requst->desc[$j];
						$weight4 = $requst->weight[$j];
						$package5 = $requst->package_id[$j];

						if (!empty($requst->supplier_type)) {
							DB::table('customer_builty_request_items')
								->insert([
									'package_id' => $package5,
									'quantity' => $quantity1,
									'brand' => $desc2,
									'items' => !(empty($requst->items) ? $requst->items[$j] : null),
									'supplier' => !empty($requst->supplier_type == 'per_carton') ? $quantity1 * $requst->carton[$j] : $requst->lumpsum[$j],
									'total' => $charges_rate,
									'rate' => !empty($requst->Amount[$j]) ? $requst->Amount[$j] : (!empty($charges11[$j]) ? $charges11[$j] : $charges_rate),
									'weight' => $weight4,
									'builtyid' => $get_id1
								]);
						} else {
							DB::table('customer_builty_request_items')
								->insert([
									'package_id' => $package5,
									'quantity' => $quantity1,
									'brand' => $desc2,
									'items' => !(empty($requst->items) ? $requst->items[$j] : null),
									//'supplier' 		=> !empty($requst->supplier_type == 'per_carton') ? $quantity1 *   $requst->carton[$j] : $requst->lumpsum[$j] ,
									'total' => $charges_rate,
									'rate' => !empty($requst->Amount[$j]) ? $requst->Amount[$j] : (!empty($charges11[$j]) ? $charges11[$j] : $charges_rate),
									'weight' => $weight4,
									'builtyid' => $get_id1
								]);
						}

					}
				}
			} else {
				if ($customerType == 'Walkin') {
					$charges_rate = $totaltopay;
				} else {
					$charges_rate = $requst->amount[0];
				}

				$total += $charges_rate;
				$quantity1 = $requst->quantity[1];
				$qty_total += $quantity1;
				$desc2 = $requst->desc[1];
				$weight4 = $requst->weight[1];
				$package5 = $requst->package_id[1];

				DB::table('customer_builty_request_items')->insert([

					'package_id' => $package5,
					'quantity' => $quantity1,
					'brand' => $desc2,
					'total' => $charges_rate,
					'rate' => $requst->amount[0],
					'weight' => $weight4,
					'builtyid' => $get_id1
				]);

			}

			$logofindger = DB::table('selfcompany')->where('id', 1)->first();
			$newlogo = "logo.png"; //$logofindger->logo;;

			$get_id = DB::table('customer_builty_request')->where('id', $get_id1)->update(['bilty_total' => $total]);
			// dd($get_id1);
			if ($customerType == 'Walkin') {
				$ids = explode(' ', $get_id1);
				//dd($array);
				// $ids = json_decode($array);
				//  dd($ids);
				$builties = DB::table('customer_builty_request')->whereIn('id', $ids)->get();
				return view('bilty.generate_printable_bilty', compact('builties', 'ids'));
				//return redirect()->back()->with('success', $self_company);
			} else {
				return redirect()->back()->with('success', $self_company);
			}
		}

		//return view('bilty.addgoods',compact('get_id'));
	}



	public function get_customer_station(Request $req)
	{

		$stationsTo = null;
		$stationsFrom = null;

		if ($req->type == 'walkin') {
			$stations = DB::table('now_station')->get();
			$packages = DB::table('now_packages')->get();

			return [
				'packages' => $packages,
				'station_to' => $stations,
				'station_form' => $stations
			];


		} elseif ($req->type == 'normal') {


			$stations = DB::table('now_rateslist')
				->join('customer_ratelist', 'now_rateslist.customerid', 'customer_ratelist.customer_id')
				->join('customer', 'now_rateslist.customerid', 'customer.id')
				->where('customer_ratelist.customer_profile', 'Normal')
				->where('customer_ratelist.customer_id', $req->customer_id)
				->get();


			foreach ($stations as $station) {
				$customer_name = $station->name;
				$customer_id = $station->customerid;

				$packages = DB::table('now_rateslist')
					->join('customer_ratelist', 'now_rateslist.customerid', 'customer_ratelist.customer_id')
					->join('now_packages', 'customer_ratelist.package_id', 'now_packages.id')
					->where('customer_ratelist.customer_profile', 'Normal')
					->where('customer_ratelist.customer_id', $customer_id)
					->select('customer_ratelist.package_id', 'now_packages.packagename', 'customer_ratelist.rate')
					->distinct()
					->get();


				$stationsTo[$station->StationIdTo] = DB::table('now_station')->where('id', $station->StationIdTo)->first();

				$stationsFrom[$station->StationIdFrom] = DB::table('now_station')->where('id', $station->StationIdFrom)->first();

			}
			return [
				'customer_name' => $customer_name,
				'packages' => $packages,
				'station_to' => $stationsTo,
				'station_form' => $stationsFrom
			];


		} else {

			$stations = DB::table('now_rateslist')
				->join('customer_ratelist', 'now_rateslist.customerid', 'customer_ratelist.customer_id')
				->join('customer', 'now_rateslist.customerid', 'customer.id')
				->where('customer_ratelist.customer_profile', 'Billed')
				->where('customer_ratelist.customer_id', $req->customer_id)
				->get();

			foreach ($stations as $station) {


				$customer_name = $station->name;
				$customer_id = $station->customerid;

				$packages = DB::table('now_rateslist')
					->join('customer_ratelist', 'now_rateslist.customerid', 'customer_ratelist.customer_id')
					->join('customer', 'now_rateslist.customerid', 'customer.id')
					->join('now_packages', 'customer_ratelist.package_id', 'now_packages.id')
					->where('customer_ratelist.customer_id', $customer_id)
					->select('customer_ratelist.package_id', 'now_packages.packagename')
					->distinct()
					->get();



				$stationsTo[$station->StationIdTo] = DB::table('now_station')->where('id', $station->StationIdTo)->first();

				$stationsFrom[$station->StationIdFrom] = DB::table('now_station')->where('id', $station->StationIdFrom)->first();

			}

			return [
				'customer_name' => $customer_name,
				'packages' => $packages,
				'station_to' => $stationsTo,
				'station_form' => $stationsFrom
			];


		}

	}



	public function add_bilties_process(Request $requst)
	{

		//dd($requst->all);

		$customer = $requst->customer;
		$customerType = $requst->cs_type;
		$self_company = $requst->selfcompanys;
		$computerno = $requst->computernos;
		$date = $requst->date;
		$from = $requst->from;
		$to = $requst->to;
		$refno = $requst->refno;
		$deliverymode = $requst->deliverymodes;
		$deliveryaddress = $requst->deliveryaddress;
		$note = $requst->note;
		$Language = $requst->cs_lang;
		$Builtytype = $requst->bt_type;
		$receivername = $requst->receivernamed;
		$receiverphone = $requst->receiverphoned;
		$sendername = $requst->sendernames;
		$senderphone = $requst->senderphones;
		$package_id = count($requst->package_id);
		$quantity = count($requst->quantity);
		$desc = count($requst->desc);
		$weight = count($requst->weight);


		if ($customerType == 'Walkin') {
			foreach ($requst->package_id as $pk) {
				if (!empty($pk)) {

					$charges = DB::table('customer_ratelist')
						->join('now_rateslist', 'customer_ratelist.ratelist_id', 'now_rateslist.id')
						->where('customer_ratelist.StationIdFrom', $from)
						->where('customer_ratelist.StationIdTo', $to)
						->where('customer_ratelist.customer_profile', 'normal')
						->where('customer_ratelist.package_id', $pk)
						->first();
				}
			}

		} else if ($customerType == 'Billed') {
			$customer = $requst->customerbilled;
			foreach ($requst->package_id as $pk) {
				if (!empty($pk)) {

					$charges = DB::table('customer_ratelist')
						->join('now_rateslist', 'customer_ratelist.ratelist_id', 'now_rateslist.id')
						->where('customer_ratelist.StationIdFrom', $from)
						->where('customer_ratelist.StationIdTo', $to)
						->where('customer_ratelist.customer_profile', 'Billed')
						->where('customer_ratelist.package_id', $pk)
						->where('customer_ratelist.builty_type', $requst->builty_type)
						->first();
				}
			}
		} else if ($customerType == 'Normal') {
			$customer = $requst->normalcustomer;
			foreach ($requst->package_id as $pk) {
				if (!empty($pk)) {

					$charges = DB::table('customer_ratelist')
						->join('now_rateslist', 'customer_ratelist.ratelist_id', 'now_rateslist.id')
						->where('customer_ratelist.StationIdFrom', $from)
						->where('customer_ratelist.StationIdTo', $to)
						->where('customer_ratelist.customer_profile', 'Normal')
						->where('customer_ratelist.package_id', $pk)
						//->where('customer_ratelist.builty_type',$requst->builty_type)
						->first();
				}
			}
		} else {
			dd('Please first insert rate for stations');
			return redirect()->back();
		}

		if (empty($charges)) {
			dd('rates are not defined');
		}

		//dd($charges);
		$total = 0;
		$qty_total = 0;

		//dd($data);
		//dd(array_unique($charges));
		//$other_amount 		= $charges->other_amount;
		//$station_rate 		= $charges->rate;
		//$detentional_amount = $charges->detentional_amount;

		//$other_amount = explode(',',$other_amount);
		//$total_charges = array_sum($other_amount) + $detentional_amount + $station_rate;


		$get_id = DB::table('now_builty')->insertGetId([
			'customer' => $customer,
			'cutomer_type' => $customerType,
			'self_company' => $self_company,
			'computerno' => $computerno,
			'package_id' => $package_id,
			'date' => $date,
			'from' => $from,
			'to' => $to,
			'refno' => $refno,
			'deliverymode' => $deliverymode,
			'deliveryaddress' => $deliveryaddress,
			'note' => $note,
			'Language' => $Language,
			'Builtytype' => $Builtytype,
			'receivername' => $receivername,
			'receiverphone' => $receiverphone,
			'sendername' => $sendername,
			'senderphone' => $senderphone,

		]);

		if ($quantity > 0) {
			for ($j = 0; $j < $quantity; $j++) {
				if (!empty($requst->quantity[$j]) and !empty($requst->desc[$j]) and !empty($requst->package_id[$j]) and !empty($requst->weight[$j])) {

					//dd($charges[$j]->rate);
					/* $quantity1 = $requst->quantity[$j];
											   $desc2 = $requst->desc[$j];
											   $rate3 = $station_rate;
											   $weight4 = $requst->weight[$j];
											   $package5 = $requst->package_id[$j]; */


					$charges_rate = $charges->rate * $requst->quantity[$j];
					$total += $charges_rate;
					$quantity1 = $requst->quantity[$j];
					$qty_total += $quantity1;
					$desc2 = $requst->desc[$j];
					$weight4 = $requst->weight[$j];
					$package5 = $requst->package_id[$j];

					DB::table('now_builtyitems')
						->insert([
							'package_id' => $package5,
							'quantity' => $quantity1,
							'brand' => $desc2,
							'total' => $charges_rate,
							'rate' => $charges->rate,
							'weight' => $weight4,
							'builtyid' => $get_id
						]);
				}
			}
		}

		$get_id = DB::table('now_builty')->where('id', $get_id)->update(['bilty_total' => $total]);


		return redirect('view-bilty');
		//return view('bilty.addgoods',compact('get_id'));
	}

	public function view_paid_builty()
	{

		$builties = DB::table('now_builty')->join('customer', 'now_builty.customer', 'customer.id')
			->where('now_builty.Builtytype', 'Paid')
			->get();

		return view('bilty.view', compact('builties'));
	}
	public function view_advance_builty()
	{
		$builties = DB::table('now_builty')
			->join('customer', 'now_builty.customer', 'customer.id')
			->where('now_builty.Builtytype', 'Advance')
			->get();

		return view('bilty.view', compact('builties'));

	}
	public function view_to_pay_builty()
	{
		$builties = DB::table('now_builty')->join('customer', 'now_builty.customer', 'customer.id')
			->where('now_builty.Builtytype', 'To Pay')
			->get();
		return view('bilty.view', compact('builties'));
	}

	public function generate_bilty($id)
	{
		$builtyid = DB::table('now_builty')->where('id', $id)->first()->id;
		$company = DB::table('selfcompany')->get();

        // dd($builtyid);

		return view('bilty.generate_bilty', compact('builtyid', 'id'));
		/*$pdf = PDF::loadView('bilty.generate_bilty',compact('builtyid','id'))->setPaper('a4', 'landscape')->save('agp.pdf');
				   return $pdf->stream('builty.pdf');*/
	}

	public function generate_customer_bilty_request($id)
	{
		$builtyid = DB::table('customer_builty_request')->where('id', $id)->first()->id;


		return view('bilty.generate_customer_bilty_request', compact('builtyid', 'id'));
		/*$pdf = PDF::loadView('bilty.generate_bilty',compact('builtyid','id'))->setPaper('a4', 'landscape')->save('agp.pdf');
				   return $pdf->stream('builty.pdf');*/
	}

	public function good_add_save(Request $request)
	{
		$unit = $request->unit;
		$pack = $request->pack;
		$description = $request->description;
		$builtyID = $request->builtyid;
		$quantity = count($request->quantity);
		$brand = count($request->brand);
		$rate = count($request->rate);
		$weight = count($request->weight);


		$bilty = DB::table('now_goodscalculation')
			->insertGetId([
				'unit' => $unit,
				'packing' => $pack,
				'description' => $description,
				'quantity' => $quantity,
				'brand' => $brand,
				'rate' => $rate,
				'weight' => $weight,
				'builtyid' => $builtyID,
			]);

		if ($quantity > 0) {
			for ($j = 0; $j < $quantity; $j++) {

				$builtyID = $request->builtyid;
				$quantity1 = $request->quantity[$j];
				$brand2 = $request->brand[$j];
				$rate3 = $request->rate[$j];
				$weight4 = $request->weight[$j];

				DB::table('now_builtyitems')
					->insert([
						'quantity' => $quantity1,
						'brand' => $brand2,
						'rate' => $rate3,
						'weight' => $weight4,
						'builtyid' => $builtyID
					]);
			}
		}

		$sumtotalamount = DB::table('now_builtyitems')

			->where('builtyid', $builtyID)
			->sum('rate');


		return view('bilty.addamount', compact('builtyID', 'sumtotalamount'));
	}

	public function amount_add_save(Request $request)
	{
		$rent = $request->rent;
		$labour = $request->labour;
		$it = $request->it;
		$lc = $request->lc;
		$lcc = $request->lcc;
		$hd = $request->hd;
		$otc = $request->otc;
		$ta = $request->ta;
		$advance = $request->advance;
		$balance = $request->balance;
		$ta = $request->ta;
		$builtyid = $request->builtyid;


		DB::table('now_amountcalc')->insertGetId([
			'rent' => $rent,
			'labour' => $labour,
			'it' => $it,
			'lc' => $lc,
			'lcc' => $lcc,
			'hd' => $hd,
			'otc' => $otc,
			'ta' => $ta,
			'builtyid' => $builtyid,
			'balance' => $balance

		]);
		return view('bilty.buitlydetails', compact('builtyid'));
	}

	public function get_all_builties()
	{

		$data = DB::table('now_builty')
			->join('customer', 'now_builty.customer', 'customer.id')
			->join('now_station', 'now_builty.to', 'now_station.id')
			->where('now_builty.cutomer_type', 'Billed')
			->select('now_builty.id as bid', 'now_builty.receivername', 'now_builty.date', 'customer.name', 'now_station.name as station')
			->get();

		return Datatables::of($data)
			->addIndexColumn()
			->addColumn('action', function ($row) {

				$btn = "<a  title='generate' class='btn btn-secondary' href='generate-bilty/" . $row->bid . "'> <i class='fa fa-eye'></i> </a>
                                    <a title='edit' class='btn btn-secondary' href='edit-walkin-builty/" . $row->bid . "'><i class='fa fa-edit'></i></a>
                                    <a onclick='return confirm('Are you sure you want to delete this builty?');' title='Delete' class='btn btn-secondary' href='delete-walkin-builty/" . $row->bid . "'><i class='fa fa-times'></i> </a>";

				return $btn;
			})->addColumn('checkbox', function ($row) {

				$checbox = '<input class="tester" name="checkbox" type="checkbox" value="' . $row->bid . '" />';

				return $checbox;
			})

			->rawColumns(['action', 'checkbox'])
			->make(true);



		return view('bilty.view');
	}


	public function get_all_walkin_builties()
	{
		$data = DB::table('now_builty')
			->where('cutomer_type', 'Walkin')
			->join('now_station', 'now_builty.to', 'now_station.id')
			->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station')
			->get();


		return Datatables::of($data)
			->addIndexColumn()
			->addColumn('action', function ($row) {

				$btn = '<a  title="generate" class="btn btn-secondary" href="generate-bilty/' . $row->bid . '"> <i class="fa fa-eye"></i> </a>
                                    <a title="edit" class="btn btn-secondary" href="edit-walkin-builty/' . $row->bid . '"><i class="fa fa-edit"></i> </a>
                                    <a onclick="return confirm("Are you sure you want to delete this builty?");" title="Delete" class="btn btn-secondary" href="delete-walkin-builty/' . $row->bid . '"><i class="fa fa-times"></i> </a>
                                    ';

				return $btn;
			})
			->addColumn('checkbox', function ($row) {

				$checbox = '<input class="tester" name="checkbox" type="checkbox" value="' . $row->bid . '" />';

				return $checbox;
			})

			->rawColumns(['action', 'checkbox'])
			->make(true);

		return view('bilty.view-walkin-builties');
	}

	public function paid_report(Request $req)
	{

		// $mpdf = new \mPDF('utf-8', 'A4-L');
		$from_date = date('Y-m-d', strtotime($req->input('from_date')));
		$to_date = date('Y-m-d', strtotime($req->input('to_date')));
		$customer = $req->input('customer');
		if ($customer == "All") {

			$data['paid_bilty_records'] = DB::table('now_builty')
				->join('customer', 'now_builty.customer', '=', 'customer.id')
				->join('now_station as to_station', 'now_builty.to', '=', 'to_station.id')
				->join('now_station as from_station', 'now_builty.from', '=', 'from_station.id')
				->whereBetween('date', [$from_date, $to_date])
				->select(
					'now_builty.id as bid',
					'now_builty.*',
					'to_station.name as to_station_name',
					'from_station.name as from_station_name',
					'customer.*'
				)
				->get();
			$data['date_from'] = $from_date;
			$data['date_to'] = $to_date;
			$data['all'] = 1;
		} else {
			$data['paid_bilty_records'] = DB::table('now_builty')
				->join('customer', 'now_builty.customer_id', '=', 'customer.id')
				->join('now_station as to_station', 'now_builty.to', '=', 'to_station.id')
				->join('now_station as from_station', 'now_builty.from', '=', 'from_station.id')
				->whereBetween('date', [$from_date, $to_date])
				->where('now_builty.customer_id', '=', $req->input('customer'))
				->select(
					'now_builty.id as bid',
					'now_builty.*',
					'to_station.name as to_station_name',
					'from_station.name as from_station_name',
					'customer.*'
				)
				->get();
                // $total = DB::table('now_bilty_selling_expense')->where('builty_id','=',$data['paid_bilty_records'][0]->bid)->sum('amount');

            // dd($total);
			$data['date_from'] = $from_date;
			$data['date_to'] = $to_date;
			$data['all'] = 0;
		}

		$pdf = PDF::loadView('bilty/paid_bilty_date_wise', $data);
		return $pdf->stream('paid_report.pdf');
	}
	public function manage_paid_receiving()
	{
		// dd('here');
		$data['form_action'] = url('/receiving_insert');
		$data['customer_records'] = DB::table('customer')->get();
        $data['broker_records'] = DB::table('broker')->get();

		$data['receiving_records'] = DB::table('ws_receiving as a')->get();
		$data['bank_records'] = DB::table('ws_banks')->get();
		// $data['officeRecord'] = DB::table('office')->get();
		return view('paidRecieved/receiving', $data);
	}

	public function GetBillDataByCus(Request $req)
	{
		$id = $req->input('id');

		$data = DB::table("bill")->where('bill_customer', $id)->get();
        		// dd($data);
            foreach ($data as $val) {
                $bill_metas[] = DB::table('paidreceipt_metas')->where('bill_id', $val->bill_id)->first();
            }
            return ['data' => $data, 'bill_metas' => $bill_metas];

	}

    public function GetBiltyDataByBroker(Request $req)
	{
		$id = $req->input('id');
        // dd($id);
        $data = DB::table('now_builty')
            ->leftJoin('broker_ledger', function($join) use ($id) {
                $join->on('now_builty.id', '=', 'broker_ledger.reference_id')
                    ->where('broker_ledger.FKBrokerId', '=', $id);
            })
            ->where('now_builty.broker_id', $id)
            ->select('now_builty.*', 'broker_ledger.*') // Select all columns from both tables
            ->get();
            // dd($data);
        return ['data' => $data];
	}

	public function print_multiple_invoice($array)
	{
		$ids = json_decode($array);
		$builties = DB::table('now_builty')->whereIn('id', $ids)->get();
		return view('bilty.generate_printable_bilty', compact('builties', 'ids'));

	}
	public function generated_qr($id)
	{

		$builtyid = DB::table('now_builty')->where('id', $id)->first()->id;
		return view('bilty.generated_qr_bilty', compact('builtyid', 'id'));

	}

	public function search(Request $req)
	{
		// dd(123);

		$search = $req->input('search');
		$type = $req->input('type');

		if ($search != '') {
			$builties = DB::table('now_builty')
				->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station', 'now_builtyitems.quantity as quantity', 'now_builtyitems.brand as brand')
				->join('now_station', 'now_builty.to', 'now_station.id')
				->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
				->where('cutomer_type', $type)
				->where('self_company', session('company')[0]->id)
				->orWhere('now_builty.builty_id', 'like', '%' . $search . '%')
				->orWhere('now_builty.id', 'like', '%' . $search . '%')
				->orWhere('now_builty.sendername', 'like', '%' . $search . '%')
				->orWhere('now_builty.receivername', 'like', '%' . $search . '%')
				->orWhere('now_station.name', 'like', '%' . $search . '%')
				->orWhere('now_builty.date', 'like', '%' . $search . '%')
				->orWhere('now_builtyitems.quantity', 'like', '%' . $search . '%')
				->orWhere('now_builtyitems.brand', 'like', '%' . $search . '%')
				->orderBy('now_builty.id', 'desc')
				->paginate(30);
			// ->orderBy('now_builty.id','desc')

		} else {
			$builties = DB::table('now_builty')
				->select('now_builty.id as bid', 'now_builty.*', 'now_station.name as station')
				->join('now_station', 'now_builty.to', 'now_station.id')
				->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
				->where('cutomer_type', $type)
				->orderBy('now_builty.id', 'desc')
				->paginate(30);
			//   ->orderBy('now_builty.id','desc')
		}
		if ($req->ajax()) {
			return view('bilty/tableView', compact('builties'))->render();
		}

		return view('bilty/view-walkin-builties', compact('builties'));



	}

	public function generate_urdu_bilty($id)
	{
		$builty = DB::table('now_builty')
			->join('now_station', 'now_builty.to', 'now_station.id')
			->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
			->where('now_builty.id', $id)->first();

		return view('bilty/generate-urdu-bilty', compact('builty', 'id'));
	}

	public function check_builty_no(Request $req)
	{
        // dd($req->builty_no);
		$builty = DB::table('now_builty')->where('builty_id', $req->builty_no)->first();

		if (!empty($builty)) {
			return 'exist';
		} else {
			false;
		}
	}
}

