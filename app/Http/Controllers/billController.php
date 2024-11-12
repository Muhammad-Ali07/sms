<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use mpdf\mpdf;
use PDF;
use Auth;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class billController extends Controller
{
    public function add_bills()
    {

        $number = null;
        $data['sender'] = DB::table('customer')->where('selfcompany', session('company')[0]->id)
            //->where('is_delete',1)
            // ->where('builtytype', 'Paid')
            // ->where('assigned', 0)
            ->get();

        // dd($data);

        $getBillNumber = DB::table('bill')->orderBy('bill_id', 'desc')->offset(0)->limit(1)->get();

        // dd($getBillNumber);

        if (isset($getBillNumber[0]->bill_Number)) {
            $bn = $getBillNumber[0]->bill_Number;
        } else {
            $bn = 0;
        }

        //if(isset($bn) && sizeof($bn)){  //not working on localhost

        $number = $bn;
        $number++;
        $number = str_pad($number, 3, "0", STR_PAD_LEFT);

        $data['billNum'] = $number;
        $doc_data = [
            'model'             => 'Bill',
            'code_field'        => 'bill_code',
            // 'form_type_field'  => 'property_type',
            // 'form_type_value'  => 'property',
            'code_prefix'       => strtoupper('bl'),
        ];
        $data['code'] = $this->documentCode($doc_data);

        return view('bills.add', $data);
    }

    public function paid_builty()
    {
        dd('here');
    }

    public function getBuiltiesForBill(Request $request)
    {
        // dd($request->all());
        // Extract all incoming data
        $id = $request->input('id');
        $customer = $request->input('customer');
        // Convert the incoming 'from' and 'to' dates to the desired format (dd-mm-yyyy)
        if(empty($request->input('from')) || empty( $request->input('to')) ){
             return response()->json([
                    'error' => true,  // Set error to true to indicate a problem
                    'message' => 'Date is missing',  // Provide a clear error message
                ], 400);
        }
        $dateFrom = Carbon::createFromFormat('Y-m-d', $request->input('from'))->format('d-m-Y');
        $dateTo = Carbon::createFromFormat('Y-m-d', $request->input('to'))->format('d-m-Y');


        // Fetch all non-null and valid builty_ids from bill_form stored in JSON format
        $usedBiltyIds = DB::table('bill')
            ->whereNotNull('bilty_form_id')  // Ensure bilty_form_id is not null
            ->select('bilty_form_id')
            ->get()
            ->pluck('bilty_form_id')
            ->flatMap(function ($value) {
                // Decode each JSON string to an array of integers
                return json_decode($value, true);  // Convert JSON to array
            })
            ->filter(function ($value) {
                return !is_null($value) && is_numeric($value);  // Ensure valid numeric values
            })
            ->toArray();  // Convert the result to an array of used builty_ids
        // dd($usedBiltyIds);
        $builties = DB::table('now_builty as b')
            ->leftJoin('now_bilty_selling_expense as se', 'b.id', '=', 'se.builty_id')  // Left join to selling expense
            // ->whereBetween('b.date', [$dateFrom, $dateTo])  // Filter by date range
            ->where('b.customer_id', $customer)  // Filter by customer_id
            ->when(!empty($usedBiltyIds), function ($query) use ($usedBiltyIds) {
                return $query->whereNotIn('b.id', $usedBiltyIds);  // Exclude used builty_ids
            })
            ->select(
                'b.id',
                'b.builty_id',
                'b.date',
                'b.customer_id',
                'b.computerno',  // Add computerno to the select statement
                DB::raw('SUM(REPLACE(se.amount, ",", "")) as total_selling_expense')  // Remove commas and calculate total selling expense
            )
            ->groupBy('b.id', 'b.builty_id', 'b.date', 'b.customer_id', 'b.computerno')  // Group by required fields, including computerno
            ->get();


        // Return response (JSON format for AJAX)
        return response()->json([
            'success' => true,
            'data' => $builties
        ]);
    }

    public function getBuiltyDetails($id)
    {
        // dd($id);
        // Fetch builty details from the database
        // $builty = DB::table('now_builty')
        //     ->where('now_builty.id', $id)->first();
        $builty = DB::table('now_builty as b')
            ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id')  // Assuming the customer table is 'customers'
            ->where('b.id', $id)
            ->select(
                'b.*',   // Select all columns from the now_builty table
                'b.id as bid',
                'c.name as customer_name'   // Assuming there's a 'name' column in the customer table
            )
            ->first();
        // dd($builty);
        // Check if the builty exists
        if (!$builty) {
            return response()->json(['error' => true, 'message' => 'Builty not found'], 404);
        }

        // Return the builty details as JSON
        return response()->json($builty);
    }

    public function generate_bill(Request $req)
    {
        // dd($req->all());


        $totalOfLabour = null;
        $labourCharge = $req->input('labourCharge');
        $fuelCharge = $req->input('fuelCharge');
        $weigh = $req->input('weight');
        $number = $req->input('bill_num');
        $code = $req->input('bill_code');
        $customer = $req->input('customer_id');

        $tax = $req->input('tax');
        $totalSellingExpense = 0;

        // Fetch all non-null and valid builty_ids from bill_form stored in JSON format
        $usedBiltyIds = DB::table('bill')
            ->whereNotNull('bilty_form_id')
            ->select('bilty_form_id')
            ->get()
            ->pluck('bilty_form_id')
            ->flatMap(function ($value) {
                return json_decode($value, true);
            })
            ->filter(function ($value) {
                return !is_null($value) && is_numeric($value);  // Ensure valid numeric values
            })
            ->toArray();  // Convert the result to an array of used builty_ids
            // dd($usedBiltyIds);

        $builties = DB::table('now_builty as b')
            ->leftJoin('now_bilty_selling_expense as se', 'b.id', '=', 'se.builty_id')  // Left join to selling expense
            // ->whereBetween('b.date', [$dateFrom, $dateTo])  // Filter by date range
            ->where('b.customer_id', $customer)  // Filter by customer_id
            ->when(!empty($usedBiltyIds), function ($query) use ($usedBiltyIds) {
                return $query->whereNotIn('b.id', $usedBiltyIds);  // Exclude used builty_ids
            })
            ->select(
                'b.id',
                'b.builty_id',
                'b.date',
                'b.customer_id',
                DB::raw('SUM(REPLACE(se.amount, ",", "")) as total_selling_expense')  // Remove commas and calculate total selling expense
            )
            ->groupBy('b.id', 'b.builty_id', 'b.date', 'b.customer_id')  // Group by required fields
            ->get();
            $biltyIds = [];
            $biltyFormNo = [];

        if(!empty($builties)){
            foreach ($builties as $row) {
                $totalSellingExpense += $row->total_selling_expense;  // Accumulate the sum
                $biltyIds[] = $row->id;  // Add the builty_id to the array
                $biltyFormNo[] = $row->builty_id;

            }

        }else{

            foreach ($builties as $row) {
                $totalSellingExpense += $row->total_selling_expense;  // Accumulate the sum
            }
        }

        // $taxper = $taxpercentage;
        // Get the count of taxname
        $taxnameCount = count($req->tax);
        $expenseDivision = $totalSellingExpense / $taxnameCount;

        // Initialize the new array
        // $tax = [];
        $taxIds = [];

        // Loop through each tax percentage, calculate the tax, and store it

       for ($i = 0; $i < count($tax); $i++) {
            // Extract numeric value from percentage string (if it's a string with percentage symbol)
            $percentage = (float)str_replace('%', '', $tax[$i]['percentage']);

            // Calculate the tax value based on the percentage
            $taxValue = ($expenseDivision * $percentage) / 100;

            // Store the calculated tax value in an array with the corresponding tax name and percentage
            $taxValues[$tax[$i]['name']] = [
                'value' => $taxValue,
                'percentage' => $percentage
            ];

            // Prepare the array to insert into the database
            $bill_taxes = array(
                "tax_name" => $tax[$i]['name'],            // Tax name
                "tax_percentage" => $tax[$i]['percentage'], // Original percentage from the array
                "bill_id" => $number                       // Bill ID (provided elsewhere in your code)
            );

            // Insert the tax data into the database and store the inserted ID
            $taxIds[] = DB::table('bill_taxes')->insertGetId($bill_taxes);
        }

        // dump($taxIds);

        $praTax = '';
        $srbTax = '';

        if ($labourCharge != '') {
            $lc = $req->input('labourCharge');
        } else {
            $lc = '';
        }
        if ($fuelCharge != '') {
            $fc = $req->input('fuelCharge');
        } else {
            $fc = 0;
        }


        if(!empty($biltyIds)){
            $biltyIdsEncoded = json_encode($biltyIds);
            $biltyFormNoEncoded = json_encode($biltyFormNo);

            $bill_taxes = json_encode($taxIds);
            $total_tax = 0;
            // Initialize the sum variable
            $totalTaxValue = 0;

            // Loop through the taxValues array and sum up the 'value'
            foreach ($taxValues as $tax) {
                $total_tax += $tax['value'];
            }


            $total_gross_amount = $total_tax + $totalSellingExpense + $lc+$fc+$weigh;

            $billRecords = array(
                "selfcompany" => session('company')[0]->id,
                "bill_Number" => $number,
                'bill_code' => $code,
                "bill_customer" => $customer,
                "bill_date" => Carbon::now()->format('Y-m-d'),
                "tax_ids" => $bill_taxes,
                'bilty_form_id' => $biltyIdsEncoded,
                'bilty_no' => $biltyFormNoEncoded,
                "generatedby" => $req->generatedby,

                "total" => $total_gross_amount,
                "r_total" => $total_gross_amount,
                "labour" => $lc,
                "fuelCharge" => $fc,
                "weight" => $req->input('weight'),

                // "tax" => $req->input('tax'),
            );

            $createBillRecord = DB::table('bill')->insertGetId($billRecords);

            $customer = DB::table('customer')->where('id', $customer)->first();

            $ledgerRecord = array(
                "ledger_reference" => $number,
                "ledger_reference_code" => $code,
                "ledger_desc" => $customer->name,
                "ledger_date" => Carbon::now()->toDateString(),
                "ledger_credit" => $total_gross_amount,
                "bill" => 1,
                "FKCustomerID" => $customer->id,
                "bill_id" => $createBillRecord
            );

            $ledger = DB::table('ledger')->insert($ledgerRecord);

            $customerLedgerRecord = array(
                "cl_reference" => $number,
                "cl_reference_code" => $code,
                "cl_desc" => $customer->name,
                "cl_date" => Carbon::now()->toDateString(),
                "cl_credit" => $total_gross_amount,
                "bill" => 1,
                "FKCustomerID" => $customer->id,
                "bill_id" => $createBillRecord
            );
            $ledger = DB::table('customer_ledger')->insert($customerLedgerRecord);

            session()->flash('success', 'Bill Generated successfully!');
            return redirect('view-bills');
        }else{
            session()->flash('error', 'No Bilty found!!');
            return redirect('view-bills');
        }

    }



    public function generate_bill_09_oct_24(Request $req)
    {
        dd($req->all());
        $totalOfLabour = null;

        $labourCharge = $req->input('labourCharge');
        $fuelCharge = $req->input('fuelCharge');
        $dateTo = $req->input('to');
        $dateFrom = $req->input('from');
        $customer = $req->input('customer');

        $tax = $req->input('tax');
        $taxname = $req->input('taxname');
        $taxpercentage = $req->input('taxpercentage');

        $weigh = $req->input('weight');

        $from_date = date('Y-m-d', strtotime($dateFrom));
        $to_date = date('Y-m-d', strtotime($dateTo));
        $desType = $req->input('desType');
        $type = $req->input('type');

        $labour = $req->input('labour');
        $fuel = $req->input('fuel');

        $number = $req->input('bill_number');
        $data['lbr'] = $req->input('labour');
        $data['fuel'] = $req->input('fuel');
        $data['ctn_weight'] = $req->input('weight');
        $data['tax'] = $req->input('tax');



        // Initialize total amount variable
        $totalSellingExpense = 0;

        // Fetch all non-null and valid builty_ids from bill_form stored in JSON format
        $usedBiltyIds = DB::table('bill')
            ->whereNotNull('bilty_form_id')  // Ensure bilty_form_id is not null
            ->select('bilty_form_id')
            ->get()
            ->pluck('bilty_form_id')
            ->flatMap(function ($value) {
                // Decode each JSON string to an array of integers
                return json_decode($value, true);  // Convert JSON to array
            })
            ->filter(function ($value) {
                return !is_null($value) && is_numeric($value);  // Ensure valid numeric values
            })
            ->toArray();  // Convert the result to an array of used builty_ids

        // Debugging: check the usedBiltyIds array
        // dd($usedBiltyIds);
        $builties = DB::table('now_builty as b')
            ->leftJoin('now_bilty_selling_expense as se', 'b.id', '=', 'se.builty_id')  // Left join to selling expense
            ->whereBetween('b.date', [$dateFrom, $dateTo])  // Filter by date range
            ->where('b.customer_id', $customer)  // Filter by customer_id
            ->when(!empty($usedBiltyIds), function ($query) use ($usedBiltyIds) {
                return $query->whereNotIn('b.id', $usedBiltyIds);  // Exclude used builty_ids
            })
            ->select(
                'b.id',
                'b.builty_id',
                'b.date',
                'b.customer_id',
                DB::raw('SUM(REPLACE(se.amount, ",", "")) as total_selling_expense')  // Remove commas and calculate total selling expense
            )
            ->groupBy('b.id', 'b.builty_id', 'b.date', 'b.customer_id')  // Group by required fields
            ->get();





        $biltyIds = [];
        $biltyFormNo = [];

        // dd($builties);
        if(!empty($builties)){
            foreach ($builties as $row) {
                $totalSellingExpense += $row->total_selling_expense;  // Accumulate the sum
                $biltyIds[] = $row->id;  // Add the builty_id to the array
                $biltyFormNo[] = $row->builty_id;

            }

        }else{

            foreach ($builties as $row) {
                $totalSellingExpense += $row->total_selling_expense;  // Accumulate the sum
            }
        }

        // dd($totalSellingExpense);
        // dd($biltyIds);
        // Now you can use $totalSellingExpense in your software
        // dd("Total Selling Expense: " . $totalSellingExpense);


        $taxper = $taxpercentage;
        // Get the count of taxname
        $taxnameCount = count($req->taxname);
        // dd();
        $expenseDivision = $totalSellingExpense / $taxnameCount;
        // dd($expenseDivision);

        // Initialize the new array
        $tax = [];
        $taxIds = [];

        // Get the count of taxname
        // $taxnameCount = count($req->taxname);


        // Loop through each tax percentage, calculate the tax, and store it
        for ($i = 0; $i < count($req['taxpercentage']); $i++) {
            // Extract numeric value from percentage string
            $percentage = (float)str_replace('%', '', $req['taxpercentage'][$i]);

            // Calculate the tax value based on the percentage
            $taxValue = ($expenseDivision * $percentage) / 100;

            // Store the calculated tax value in an array with the corresponding tax name
            $taxValues[$req['taxname'][$i]] = $taxValue;

            $bill_taxes = array(
                "tax_name" => $req['taxname'][$i],
                "tax_percentage" => $req['taxpercentage'][$i],
                "bill_id" => $number
            );

            $taxIds[] = DB::table('bill_taxes')->insertGetId($bill_taxes);
        }

        $praTax = '';
        $srbTax = '';
        // dd($taxIds);
        // Now you can access the calculated tax values for further use in your project
        // if(!empty($taxValues['PRA'])){
        //     $praTax = $taxValues['PRA'];  // Tax value for PRA
        // }
        // if($taxValues['SRB']){
        //     $srbTax = $taxValues['SRB'];  // Tax value for SRB
        // }

        if ($labourCharge != '') {
            $lc = $req->input('labourCharge');
        } else {
            $lc = '';
        }
        if ($fuelCharge != '') {
            $fc = $req->input('fuelCharge');
        } else {
            $fc = 0;
        }


        if(!empty($biltyIds)){
            $biltyIdsEncoded = json_encode($biltyIds);
            $biltyFormNoEncoded = json_encode($biltyFormNo);

            $bill_taxes = json_encode($taxIds);
            $total_tax = 0;
            // dd($biltyIdsEncoded);
            foreach ($taxValues as $index => $tax) {
             if (strpos($tax, '%') !== false) {
                    // Remove the % sign and convert the remaining string to a float
                    $tax = str_replace('%', '', $tax);
                }

                // Convert to float in case it's a string and then sum the tax values
                $total_tax += floatval($tax);
            }

            $total_gross_amount = $total_tax + $totalSellingExpense;
            // dd($total_gross_amount);
            $billRecords = array(
                "selfcompany" => session('company')[0]->id,
                "bill_Number" => $number,
                "bill_customer" => $customer,
                "bill_date" => $from_date,

                "end_date" => $to_date,
                "tax_ids" => $bill_taxes,

                "total" => $total_gross_amount,
                "r_total" => $total_gross_amount,
                "labour" => $lc,
                "fuelCharge" => $fc,
                // "weight" => $req->input('weight'),
                "desType" => $desType,
                "tax" => $req->input('tax'),
                'bilty_form_id' => $biltyIdsEncoded,
                'bilty_no' => $biltyFormNoEncoded,
                "generatedby" => $req->generatedby
            );

            $createBillRecord = DB::table('bill')->insertGetId($billRecords);

            $customer = DB::table('customer')->where('id', $customer)->first();

            $ledgerRecord = array(
                "ledger_reference" => $number,
                "ledger_desc" => $customer->name,
                "ledger_date" => $from_date,
                "ledger_credit" => $totalSellingExpense,
                "bill" => 1,
                "bill_id" => $createBillRecord
            );

            $ledger = DB::table('ledger')->insert($ledgerRecord);

            $customerLedgerRecord = array(
                "cl_reference" => $number,
                "cl_desc" => $customer->name,
                "cl_date" => $from_date,
                "cl_credit" => $totalSellingExpense,
                "bill" => 1,
                "FKCustomerID" => $customer->id,
                "bill_id" => $createBillRecord
            );
            $ledger = DB::table('customer_ledger')->insert($customerLedgerRecord);

            session()->flash('success', 'Bill Generated successfully!');
            return redirect('view-bills');
        }else{
            session()->flash('error', 'No Bilty found!!');
            return redirect('view-bills');
        }





        //   dd($createBillRecord);
        // dump($srbTax);
        // dump($praTax);

                //correct query
    //   $data['data_bill'] = DB::table('now_builty as b')
    //     ->join('now_station as s', 'b.to', '=', 's.id')  // Join now_builty with now_station
    //     ->leftJoin('now_bilty_selling_expense as se', 'b.builty_id', '=', 'se.builty_id')  // Left join to selling expense
    //     ->whereBetween('b.date', [$dateFrom, $dateTo])  // Filter by date range
    //     ->select(
    //         'b.id',
    //         'b.builty_id',
    //         'b.date',
    //         'b.customer_id',
    //         's.station_type_name',
    //         DB::raw('COALESCE(SUM(se.amount), 0) as total_selling_expense')  // Calculate total selling expense with COALESCE to handle nulls
    //     )
    //     ->groupBy('b.id', 'b.builty_id', 'b.date', 'b.customer_id', 's.station_type_name')  // Group by required fields
    //     ->get();


        // dd($data['data_bill']);




        // $data['praTax'] = $praTax;
        // $data['srbTax'] = $srbTax;
        // $data['selling_expense'] = $totalSellingExpense;
        // $data['total_gross_amount'] = $total_gross_amount;


        // if ($labourCharge != '') {
        //     $lc = $req->input('labourCharge');
        // } else {
        //     $lc = '';
        // }
        // if ($fuelCharge != '') {
        //     $fc = $req->input('fuelCharge');
        // } else {
        //     $fc = 0;
        // }



        // $bill_taxes = json_encode($taxIds);
        // // dd($bill_taxes);

        // $billRecords = array(
        //     "selfcompany" => session('company')[0]->id,
        //     "bill_Number" => $number,
        //     "bill_customer" => $customer,
        //     "bill_date" => $from_date,

        //     "end_date" => $to_date,
        //     "tax_ids" => $bill_taxes,

        //     "total" => $total_gross_amount,
        //     "r_total" => $total_gross_amount,
        //     "labour" => $lc,
        //     "fuelCharge" => $fc,
        //     // "weight" => $req->input('weight'),
        //     "desType" => $desType,
        //     "tax" => $req->input('tax'),
        //     "generatedby" => $req->generatedby
        // );
        // // dd($billRecords);

        // // $createBillRecord = DB::table('bill')->insertGetId($billRecords);


    }


    public function generate_bill_old(Request $req)
    {

        $builties = Db::table('now_builty')->where('customer',$req->customer)->get();
        // dd($builties);


        $totalOfLabour = null;
        $dateTo = $req->input('to');
        $dateFrom = $req->input('from');
        $customer = $req->input('customer');

        $labourCharge = $req->input('labourCharge');
        $fuelCharge = $req->input('fuelCharge');
        $tax = $req->input('tax');
        $taxname = $req->input('taxname');
        $taxpercentage = $req->input('taxpercentage');


        $from_date = date('Y-m-d', strtotime($dateFrom));
        $to_date = date('Y-m-d', strtotime($dateTo));
        $desType = $req->input('desType');
        $type = $req->input('type');

        $weigh = $req->input('weight');
        $labour = $req->input('labour');
        $fuel = $req->input('fuel');

        $number = $req->input('bill_number');

        if (isset($number) && $number > 0) {
            $record_avalaible = DB::table('bill')
                ->where('desType', $req->desType)
                //   ->where('bill_type',$type)
                ->where('bill_Number', $number)
                ->where('bill_customer', $customer)
                ->get();

            if (isset($record_avalaible) && sizeof($record_avalaible) > 0) {

                return redirect('add-bills')->with('error', "Bill Number Already Assign This Customer, Please Change Bill Number.");
            }
        }

        $data['lbr'] = $req->input('labour');
        $data['fuel'] = $req->input('fuel');
        $data['ctn_weight'] = $req->input('weight');
        $data['tax'] = $req->input('tax');

        $data['data_bill'] = DB::table('now_builty')
            ->join('now_station', 'now_builty.to', 'now_station.id')
            ->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
            ->WhereBetween('now_builty.date', [$from_date, $to_date])
            ->where('now_station.station_type_name', '=', $desType)
            ->where('now_builty.customer', $customer)->get();


        $taxper = $taxpercentage;



        $net_amount = 0;
        $taxamountss = 0;

        foreach ($data['data_bill'] as $dbill) {
            $taxamountss += (int) $dbill->total;
        }



        if ($labourCharge != '') {
            $lc = $req->input('labourCharge');
        } else {
            $lc = '';
        }
        if ($fuelCharge != '') {
            $fc = $req->input('fuelCharge');
        } else {
            $fc = 0;
        }



        $billRecords = array(
            "selfcompany" => session('company')[0]->id,
            "bill_Number" => $number,
            "bill_customer" => $customer,
            "bill_date" => $from_date,
            "end_date" => $to_date,
            "total" => $taxamountss,
            "r_total" => $taxamountss,
            "tax_name" => $taxname,
            "tax_percentage" => $taxper,
            "labour" => $lc,
            "fuelCharge" => $fc,
            "weight" => $req->input('weight'),
            "tax" => $req->input('tax'),
            "desType" => $desType,
            "generatedby" => $req->generatedby
        );


        $createBillRecord = DB::table('bill')->insertGetId($billRecords);

        $customer = DB::table('customer')->where('id', $customer)->get();

        $ledgerRecord = array(
            "ledger_reference" => $number,
            "ledger_desc" => $customer[0]->name,
            "ledger_date" => $from_date,
            "ledger_credit" => $net_amount,
            "bill" => 1,
            "bill_id" => $createBillRecord
        );

        $ledger = DB::table('ledger')->insert($ledgerRecord);

        $customerLedgerRecord = array(
            "cl_reference" => $number,
            "cl_desc" => $customer[0]->name,
            "cl_date" => $from_date,
            "cl_credit" => $net_amount,
            "bill" => 1,
            "FKCustomerID" => $customer[0]->id,
            "bill_id" => $createBillRecord
        );

        $ledger = DB::table('customer_ledger')->insert($customerLedgerRecord);

        return redirect('view-bills');

    }

    public function generateBillById($id)
    {
        // dd($id);
        $datas = [];
        $data = DB::table('bill')
            // ->join('now_rateslist', 'bill.bill_customer', '=', 'now_rateslist.customerid')
            ->where('bill.bill_id', $id)
            ->first();
        // dd($data);
        $datas['data'] = $data ;

        // Check if the bill exists and if it has taxes associated
        if ($data && !empty($data->tax_ids)) {
            // Assuming bill_tax is stored as a JSON array of tax IDs, decode it
            $tax_ids = json_decode($data->tax_ids);

            // If bill_tax is stored as comma-separated values, use this instead:
            // $tax_ids = explode(',', $data->tax_ids);
            // dd($tax_ids);
            // Step 2: Fetch tax details using the tax IDs
            $taxes = DB::table('bill_taxes')
                ->whereIn('id', $tax_ids)
                ->get();

            // Now you have the taxes associated with the bill in the $taxes variable
        }

        $datas['taxes'] = $taxes;

        // Decode the 'builty_form_id' from JSON to an array
        $biltyIds = json_decode($data->bilty_form_id, true);

        // Now fetch only the builties that match the decoded bilty_form_ids
        $bilty = DB::table('now_builty')
            // ->whereBetween('date', [$data->bill_date, $data->end_date])  // Filter by date range
            ->where('customer_id', $data->bill_customer)  // Filter by customer_id
            ->whereIn('id', $biltyIds)  // Filter by builty IDs
            ->select('now_builty.*')
            ->orderBy('date', 'asc')
            ->get();
        // dd($bilty);
        // $bilty = DB::table('now_builty')
        //     // ->join('now_station', 'now_builty.to', 'now_station.id')
        //     ->whereBetween('now_builty.date', [$data->bill_date, $data->end_date])
        //     ->where('now_builty.customer_id', $data->bill_customer)
        //     ->select('now_builty.*')
        //     ->orderBy('now_builty.date', 'asc')
        //     ->get();
        // dd($bilty);
        $datas['bilty'] = $bilty;

        $customer = DB::table('customer')
            ->where('id', $data->bill_customer)
            ->select('contact_point', 'billformat', 'name as customerName', 'id as customeNo')
            ->first();

        $datas['customer'] = $customer;

        // dd($customer);
		$company = DB::table('selfcompany')->get();
        $datas['company'] = $company;

        $billtype = $customer->billformat;
        return view('bills.formats.format_one', compact('datas'));
        // $pdf = PDF::loadView('bills' . '/' . $billtype, compact('data', 'bilty', 'customer'))->setPaper('a4', 'landscape')->save('agp.pdf');
        // return $pdf->stream($billtype . '.pdf');
    }

    public function deleteGeneratedBillFile(Request $request)
    {
        $fileUrl = $request->input('file_url');

        // Extract the file name from the URL
        $fileName = basename($fileUrl);

        // Specify the directory where the file is located
        $filePath = public_path('files/' . $fileName);


        // Check if the file exists before attempting to delete it
        if (File::exists($filePath)) {
            // Attempt to delete the file
            if (File::delete($filePath)) {
                return response()->json(['message' => 'File deleted successfully']);
            } else {
                return response()->json(['error' => $filePath]);
            }
        } else {
            return response()->json(['error' => 'File not found']);
        }
    }


    //ENd

    public function getBills()
    {
        global $row_count;
        $row_count = 1;


        $customer_id = auth()->user()->user_id;
        $bills = DB::table('bill')
            ->select(
                'bill.bill_id',
                'bill.bill_Number',
                'bill.bill_date',
                'bill.total',
                'bill.r_total',

                'bill.desType',
                'bill.tax_percentage',
                'bill.bill_date',
                'bill.end_date',
                'bill.bill_customer',
                'customer.name'
            )
            ->join('customer', 'bill.bill_customer', 'customer.id')
            // ->join('ledger', 'bill.bill_id', 'ledger.bill_id')
            ->get();
        // dd($bills);

        if (Auth::user()->role_id == 1) {
            $bills->where('bill.bill_customer', Auth::user()->user_id)->where('bill.type', 0);
        } else if (Auth::user()->role_id == 2) {
            $bills->where('bill.bill_customer', Auth::user()->user_id)->where('bill.type', 0);
        } else {
            $bills->where('bill.selfcompany', session('company')[0]->id)->where('bill.type', 0);
        }

        return DataTables::of($bills)
            ->filter(function ($query) {
                $value = \request()->get('search')['value'];

                if (!is_null($value) && !empty($value)) {
                    $query->where(function ($query) use ($value) {
                        $query->where('bill.bill_Number', 'LIKE', '%' . $value . '%');
                        $query->orWhere('bill.bill_date', 'LIKE', '%' . $value . '%');
                        $query->orWhere('bill.desType', 'LIKE', '%' . $value . '%');
                        $query->orWhere('customer.name', 'LIKE', '%' . $value . '%');
                    });
                }
            })
            ->editColumn('bill_Number', function ($bill) {
                $cust = explode(' ', $bill->name);
                $result = '';
                $bill_no = date('ym', strtotime($bill->bill_date));
                $bill_no .= '/';
                foreach ($cust as $name) {
                    $result .= substr($name, 0, 1);
                }
                $wrd = substr($result, 0, 2);
                $wrd = str_replace('(', "", $wrd);
                $wrd = str_replace('&', "", $wrd);
                $bill_no .= $wrd;

                return $bill_no;
            })
            ->editColumn('status', function ($bill) {
                $status = '';
                $btnClass = '';

                if ($bill->r_total == 0) {
                    $status = 'Paid';
                    $btnClass = 'btn-success';
                } elseif ($bill->r_total < $bill->total && $bill->r_total != 0) {
                    $status = 'Partial';
                    $btnClass = 'btn-warning';
                } else {
                    $status = 'Unpaid';
                    $btnClass = 'btn-danger';
                }

                // Create the status button
                $button = '<button class="btn ' . $btnClass . '">' . $status . '</button>';
                return $button;
            })
            ->editColumn('total', function ($bill) {
                $taxamountss = DB::table('now_builty')
                    ->selectRaw('SUM(now_builtyitems.rate * now_builtyitems.quantity) as total')
                    ->join('now_station', 'now_builty.to', 'now_station.id')
                    ->join('now_builtyitems', 'now_builty.id', 'now_builtyitems.builtyid')
                    ->WhereBetween('now_builty.date', [$bill->bill_date, $bill->end_date])
                    ->where('now_station.station_type_name', '=', $bill->desType)
                    ->where('now_builty.customer', $bill->bill_customer)
                    ->get();

                $totalperce = $taxamountss[0]->total * ($bill->tax_percentage / 100);
                $rp = ($taxamountss[0]->total) + $totalperce;
                return $rp;
            })
            ->addColumn('sno', function ($bill) {
                global $row_count;
                return $row_count++;
            })
            ->addColumn('action', function ($bill) {
                $actions = '<a  href="javascript:void(0)" onclick="view_update(' . $bill->bill_id . ')">';
                $actions .= '<i class="fa fa-eye"></i></a>';
                $user = auth()->user()->id;
                $user_meta = DB::table('user_meta')->where('fk_user_id','=',$user)->first();
                    if($user_meta->bills == 1){
                        if($user_meta->deletion == 1){
                            $actions .= ' | <a onclick="if(confirm(\'Are you sure you want to delete this item?\')) { location.href=\'removeBillRecord/' . $bill->bill_id . '\'; }" href="#"> <i class="fa fa-times"></i></a>';
                        }
                    }

                return $actions;
            })->rawColumns(['action','status'])->make();
    }

    public function view_bills()
    {

        if (Auth::user()->role_id == 1) {
            $data['sender'] = DB::table('customer')->where('id', Auth::user()->user_id)->get();
            $data['bill'] = DB::table('bill')->where('bill_customer', Auth::user()->user_id)->where('type', 0)->get();
        } else {

            $data['sender'] = DB::table('customer')->where('selfcompany', session('company')[0]->id)->get();
            $data['bill'] = DB::table('bill')->where('selfcompany', session('company')[0]->id)->where('type', 0)->get();
        }



        return view('bills.view', $data);
    }

    public function removeBillRecord($id)
    {

        $check_record = DB::table('bill')->where('bill_id', $id)->get();
        $bill_number = $check_record[0]->bill_Number;
        $bill_date = $check_record[0]->bill_date;

        $bill_date = date('F', strtotime($bill_date));

        $remove_ledger_record = DB::table('ledger')->where('ledger_reference', $bill_number)->where('bill', 1)->delete();
        $remove_customer_ledger_record = DB::table('customer_ledger')->where('cl_reference', $bill_number)->where('bill', 1)->delete();
        $remove_bill_record = DB::table('bill')->where('bill_id', $id)->delete();

        return redirect('view-bills')->with('error', "Bill of month " . $bill_date . " has been removed");
    }


    public function monthly_billing()
    {
        return view('bills/monthly_report');

    }


    public function monthly_billing_report(Request $request)
    {
        $month = $request->month;
        $bills = DB::table('bill')
            ->join('customer', 'bill.bill_customer', 'customer.id')
            ->where('bill_date', 'like', $month . '%')
            //->where('bill.type',0)
            ->get();
        $pdf = PDF::loadView('bills/monthlybilling', compact('bills', 'month'))->setPaper('a4', 'landscape')->save('Monthly Billing.pdf');
        return $pdf->stream('Monthly Billing.pdf');

    }

    public function add_monthly_bill()
    {

        $months = DB::table('bill')
            ->join('customer', 'bill.bill_customer', 'customer.id')
            ->where('bill.type', 1)
            ->where('bill.is_delete', 1)
            ->get();
        $sender = DB::table('customer')->get();

        return view('bills/add-monthly-bill', compact('sender', 'months'));
    }
    public function add_monthly_billing_process(Request $req)
    {

        //dd($req->all());
        $billno = $req->input('bill_no');
        $customer = $req->input('customer');
        $desType = $req->input('desType');
        $month = $req->input('month');
        $amount = $req->input('amount');

        $result = DB::table('bill')->insert([

            'bill_Number' => $billno,
            'bill_customer' => $customer,
            'desType' => $desType,
            'bill_date' => $month,
            'total' => $amount,
            'type' => 1,
        ]);
        return redirect('add-monthly-bill');

    }
    public function delete_monthly_bill($id)
    {

        $result = DB::table('bill')
            ->where('bill_id', $id)
            ->update([
                'is_delete' => 0
            ]);
        return redirect('add-monthly-bill');

    }

    public function out_standing_bill()
    {

        $customers = DB::table('customer')->get();
        return view('bills/outstanding_bill', compact('customers'));
    }


    public function outstanding_bill_report(Request $req)
    {

        $bills = [];
        $customer = $req->customer_id;

        if ($customer == 'all') {
            $Allbills = DB::table('bill')->join('customer', 'bill.bill_customer', 'customer.id')->get();
            foreach ($Allbills as $Allbill) {
                $bills[$Allbill->bill_customer . '_' . $Allbill->name][] = $Allbill->total;
            }

        } else {
            $bills = DB::table('bill')->join('customer', 'bill.bill_customer', 'customer.id')->where('bill.bill_customer', $customer)
                ->where('bill.r_total', '!=', 0)
                ->get();

        }
        $pdf = PDF::loadView('bills/generate_outstanding_billl', compact('bills', 'customer'))->setPaper('a4', 'landscape')->save('Outstanding Billing.pdf');

        return $pdf->stream('Outstanding.pdf');
    }
}
