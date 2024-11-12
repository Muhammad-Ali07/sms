<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use mpdf\mpdf;
use PDF;
use Spatie\Permission\Models\Permission;

class ReportController extends Controller
{
    public function vehicle_trip_report(){

        $vehicles = DB::table('now_vehicles')->where('is_delete',1)->get();
        $pdf = PDF::loadView('reports.vehicle_trip',compact('vehicles'))->save('Vehicle_trip.pdf');
	    return $pdf->stream('vehicle_trip.pdf');
    }

    public function vehicle_trip_report_form(){
        dd('form');
    }

    public function challan_report()
    {

    	$this->data['month'] ='';
    	$this->data['challan'] ='';
		return view('challan.report',$this->data);
	}


	public function filter_challan_report(Request $request)
	{
            // 		$month = $request->input('month');
            // 		$this->data['challan'] = DB::table('challan')->select('challan.*','now_station.name as station_name','station_type.station_type')->join('now_station','now_station.id' ,'challan.to_station')->join('station_type','station_type.station_type','challan.station_type')->whereMonth('challan.date',
            // 		$month)->get();

            // // 		echo "<pre>";print_r($this->data['challan']);die;

            // 		$this->data['month'] = $month;

            // 		return view('challan.report',$this->data);
        $month = $request->input('month');
		$this->data['challan'] = DB::table('challan')->select('challan.*','now_station.name as station_name','station_type.station_type')->join('now_station','now_station.id' ,'challan.to_station')->join('station_type','station_type.station_type','challan.station_type')->whereMonth('challan.date',
		$month)->get();
		$this->data['month'] = $month;


		$pdf = PDF::loadView('challan.generatepdfchallanrepor',$this->data);
        $pdf->setPaper('A4', 'Landscape');
     	return $pdf->stream('report.pdf');



		return view('challan.report',$this->data);
	}

    public function manager_wise_report_page(){
        $data = [];
        $data['employees'] = DB::table('employees')->where('designation','2')->get();
        // dd($data['employees']);
        return view('reports.manager_wise_report.form',compact('data'));
    }
    public function manager_wise_report(Request $request){

        // dump($request->all());
        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        $manager_id = $request->manager_id;
        $manager = DB::table('employees')->where('id',$manager_id)->first();
        $data['manager'] = $manager;
        $job_inquiries = DB::table('now_job_inquiry')
        ->where('manager_id', $manager_id)
        ->whereBetween('date', [$fromDate, $toDate])
        ->get();
        $data['ji'] = $job_inquiries;

        return view('reports.manager_wise_report.report',compact('data'));
    }

    public function customer_wise_report_page(){
        $data = [];
        $data['customers'] = DB::table('customer')->get();
        // dd($data['customers']);
        return view('reports.customer_wise_report.form',compact('data'));
    }
    public function customer_wise_report(Request $request){

        // dd($request->all());
        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        $customer_id = $request->customer_id;
        $customer = DB::table('customer')->where('id',$customer_id)->first();
        $data['customer'] = $customer;
        $job_inquiries = DB::table('now_job_inquiry')
        ->where('customer_id', $customer_id)
        ->whereBetween('date', [$fromDate, $toDate])
        ->get();
        $data['ji'] = $job_inquiries;
        // dd($data);
        return view('reports.customer_wise_report.report',compact('data'));
    }

    public function station_wise_report_page(){
        $data = [];
        $data['stations'] = DB::table('now_station')->get();
        // dd($data);
        return view('reports.station_wise_report.form',compact('data'));
    }
    public function station_wise_report(Request $request){

        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        $from_station_id = $request->station_id;
        $to_station_id = $request->station_to_id;
        $from_station = DB::table('now_station')->where('id',$from_station_id)->first();
        if($to_station_id != 'Select Station'){
            $to_station = DB::table('now_station')->where('id', $to_station_id)->first();
            $station = $from_station->name . ' to ' . $to_station->name;
            $job_inquiries = DB::table('now_job_inquiry')
            ->where('from', $from_station_id)
            ->where('to', $to_station_id)
            ->whereBetween('date', [$fromDate, $toDate])
            ->get();
        }else{
            $station = $from_station->name;
            $job_inquiries = DB::table('now_job_inquiry')
            ->where('from', $from_station_id)
            ->whereBetween('date', [$fromDate, $toDate])
            ->get();
        }
        $data['ji'] = $job_inquiries;
        // dd($station);
        $data['station'] = $station;

        // dd($data);
        return view('reports.station_wise_report.report',compact('data'));
    }


    public function broker_wise_report_page(){
        $data = [];
        // dd('in controller');
        $data['brokers'] = DB::table('broker')->get();
        // dd($data['customers']);
        return view('reports.broker_wise_report.form',compact('data'));
    }
    public function broker_wise_report(Request $request){

        // dd($request->all());
        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        $broker_id = $request->broker_id;
        $broker = DB::table('broker')->where('broker_id',$broker_id)->first();
        $data['broker'] = $broker;
        $job_inquiries = DB::table('now_job_inquiry')
        ->where('broker_id', $broker_id)
        ->whereBetween('date', [$fromDate, $toDate])
        ->get();
        $data['ji'] = $job_inquiries;
        // dd($data);
        return view('reports.broker_wise_report.report',compact('data'));
    }

    public function pnl_report_page(){
        $data = [];
        // dd('in controller');
        // $data['brokers'] = DB::table('broker')->get();
        // dd($data['customers']);
        return view('reports.pnl_report.form',compact('data'));
    }
    public function pnl_report(Request $request){

        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        // dd($request->all());
        // Check the period selection
        if ($request->has('period')) {
            $period = $request->period;
            // Default date values
            $fromDate = now()->format('Y-m-d');
            $toDate = now()->format('Y-m-d');

            // Set date range based on period
            if ($period === 'daily') {
                // Today's date
                $fromDate = $toDate = now()->format('Y-m-d');

            } elseif ($period === 'monthly') {
                // First and last days of the current month
                $selectedMonth = $request->get('month', now()->format('Y-m'));
                $fromDate = date('Y-m-01', strtotime($selectedMonth));
                $toDate = date('Y-m-t', strtotime($selectedMonth));

            } elseif ($period === 'yearly') {
                // Last 12 months
                $fromDate = now()->subYear()->format('Y-m-d');
                $toDate = now()->format('Y-m-d');

            } elseif ($period === 'manual') {
                // Custom date range
                $fromDate = $request->get('from', now()->format('Y-m-d'));
                $toDate = $request->get('to', now()->format('Y-m-d'));
            }

                // Fetch records from `now_builty` table
                $builtyResults = DB::select(
                    DB::raw("
                        SELECT *
                        FROM now_builty
                        WHERE STR_TO_DATE(`date`, '%Y-%m-%d') BETWEEN :fromDate AND :toDate
                    "),
                    ['fromDate' => $fromDate, 'toDate' => $toDate]
                );

                // Fetch records from `daily_expense` table
                $expenseResults = DB::select(
                    DB::raw("
                        SELECT id, Expense_Date AS date, Expense_Name, Expense_Amount
                        FROM daily_expense
                        WHERE Expense_Date BETWEEN :fromDate AND :toDate AND is_delete = 1
                    "),
                    ['fromDate' => $fromDate, 'toDate' => $toDate]
                );


                // Fetch records from `salary` table
                    $salaryResults = DB::select(
                        DB::raw("
                            SELECT id, sal_date AS date, sal_emp_name AS employee, sal_amount AS amount
                            FROM salary
                            WHERE sal_date BETWEEN :fromDate AND :toDate
                        "),
                        ['fromDate' => $fromDate, 'toDate' => $toDate]
                    );
                 // Merge all results into a single array
                    $mergedResults = array_merge($builtyResults, $expenseResults, $salaryResults);
                    // dd($mergedResults);
                    usort($mergedResults, function ($a, $b) {
                        // Access dates for comparison
                        $dateA = isset($a->date) ? $a->date : (isset($a->Expense_Date) ? $a->Expense_Date : $a->sal_date);
                        $dateB = isset($b->date) ? $b->date : (isset($b->Expense_Date) ? $b->Expense_Date : $b->sal_date);

                        // Compare in descending order
                        return strtotime($dateB) <=> strtotime($dateA);
                    });


                    // Optionally shuffle the results to randomize the order
                    // $mergedResults = shuffle($mergedResults);


            // old code 29 oct 2024
            // Fetch the records from the database based on the date range
            // $builties = DB::table('now_builty')
            //     ->join('customer', 'now_builty.customer_id', '=', 'customer.id')
            //     ->join('now_station as to_station', 'now_builty.to', '=', 'to_station.id')
            //     ->join('now_station as from_station', 'now_builty.from', '=', 'from_station.id')
            //     ->whereBetween('date', [$fromDate, $toDate])
            //     ->select(
            //         'now_builty.id as bid',
            //         'now_builty.*',
            //         'to_station.name as to_station_name',
            //         'from_station.name as from_station_name',
            //         'customer.name as customer_name'
            //     )
            //     ->get();

            // if ($period === 'daily') {
            //     // If period is 'daily', use today's date for both from and to date
            //     $fromDate = $toDate = now()->format('Y-m-d');
            //     $data['from_date'] = $fromDate;
            //     $data['to_date'] = $toDate;
            //             // Fetch the builties based on the date range
            //     $builties = DB::table('now_builty')
            //         ->join('customer', 'now_builty.customer_id', '=', 'customer.id')
            //         ->join('now_station as to_station', 'now_builty.to', '=', 'to_station.id')
            //         ->join('now_station as from_station', 'now_builty.from', '=', 'from_station.id')
            //         ->whereBetween('date', [$fromDate, $toDate])
            //         ->select(
            //             'now_builty.id as bid',
            //             'now_builty.*',
            //             'to_station.name as to_station_name',
            //             'from_station.name as from_station_name',
            //             'customer.name as customer_name' // Renamed field
            //         )
            //         ->get();

            // } elseif ($period === 'monthly') {
            //     // If period is 'monthly', show the month selection
            //     // Use the first and last day of the selected month
            //     if ($request->has('month')) {
            //         // $selectedMonth = $request->month;
            //         // If month is not provided, use the current month
            //         $selectedMonth = now()->format('Y-m');
            //         $fromDate = date('Y-m-01', strtotime($selectedMonth)); // First day of the month
            //         $toDate = date('Y-m-t', strtotime($selectedMonth)); // Last day of the month
            //         $data['from_date'] = $fromDate;
            //         $data['to_date'] = $toDate;
            //     }
            // } elseif ($period === 'yearly') {
            //     // If period is 'yearly', use the same date but from last year
            //     $fromDate = now()->subYear()->format('Y-m-d');
            //     $toDate = now()->format('Y-m-d');
            //     $data['from_date'] = $fromDate;
            //     $data['to_date'] = $toDate;
            // } elseif ($period === 'manual') {
            //     // If manual selection, use provided from and to dates
            //     if ($request->has('from')) {
            //         $fromDate = $request->from;
            //         $data['from_date'] = $fromDate;
            //     }
            //     if ($request->has('to')) {
            //         $toDate = $request->to;
            //         $data['to_date'] = $toDate;
            //     }
            // }
        }else{
            // Fetch the builties based on the date range
                   // Fetch the builties based on the date range
            $builties = DB::table('now_builty')
                ->join('customer', 'now_builty.customer_id', '=', 'customer.id')
                ->join('now_station as to_station', 'now_builty.to', '=', 'to_station.id')
                ->join('now_station as from_station', 'now_builty.from', '=', 'from_station.id')
                ->whereBetween('date', [$fromDate, $toDate])
                ->select(
                    'now_builty.id as bid',
                    'now_builty.*',
                    'to_station.name as to_station_name',
                    'from_station.name as from_station_name',
                    'customer.name as customer_name' // Renamed field
                )
                ->get();
        }


        $data['ji'] = $mergedResults;

        return view('reports.pnl_report.report',compact('data'));
    }

    public function customer_pnl_report_page(){
        $data = [];
        $customers = DB::table('customer')->get();
        $data['customers'] = $customers;
        return view('reports.customer_pnl_report.form',compact('data'));
    }
    public function customer_pnl_report(Request $request){

        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        // Fetch the builties based on the date range
			$builties = DB::table('now_builty')
				->join('customer', 'now_builty.customer_id', '=', 'customer.id')
				->join('now_station as to_station', 'now_builty.to', '=', 'to_station.id')
				->join('now_station as from_station', 'now_builty.from', '=', 'from_station.id')
				->whereBetween('date', [$fromDate, $toDate])
				->where('now_builty.customer_id', '=', $request->input('customer_id'))
				->select(
					'now_builty.id as bid',
					'now_builty.*',
					'to_station.name as to_station_name',
					'from_station.name as from_station_name',
					'customer.*'
				)
				->get();
				// dd($builties);
		$data['customer'] = DB::table('customer')->where('id','=',$request->input('customer_id'))->first();
        $data['builties'] = $builties;
        // dd($data);
        return view('reports.customer_pnl_report.report',compact('data'));
    }

    public function all_customer_pnl_report_page(){
        $data = [];
        $customers = DB::table('customer')->get();
        $data['customers'] = $customers;
        return view('reports.all_customer_pnl_report.form',compact('data'));
    }
    public function all_customer_pnl_report(Request $request){

        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        // Fetch the builties based on the date range
        $builties = DB::table('now_builty')
            ->join('customer', 'now_builty.customer_id', '=', 'customer.id')
            ->join('now_station as to_station', 'now_builty.to', '=', 'to_station.id')
            ->join('now_station as from_station', 'now_builty.from', '=', 'from_station.id')
            ->whereBetween('date', [$fromDate, $toDate])
            ->select(
                'now_builty.id as bid',
                'now_builty.*',
                'to_station.name as to_station_name',
                'from_station.name as from_station_name',
                'customer.name as customer_name' // Renamed field
            )
            ->get();

        // Group by customer name
        $groupedBuilties = $builties->groupBy('customer_name');

        // Optional: Convert to array
        $groupedBuiltiesArray = $groupedBuilties->toArray();
        $data['groupedBuiltiesArray'] = $groupedBuiltiesArray;
        // dd($data);
        return view('reports.all_customer_pnl_report.report',compact('data'));
    }

    public function cdo_report_page(){
        $data = [];
        $customers = DB::table('customer')->get();
        $initializations = DB::table('initialization')->get();
        $data['customers'] = $customers;
        $data['initializations'] = $initializations;
        return view('reports.cdo_report.form',compact('data'));
    }
    public function cdo_report(Request $request){
        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;
        if($request->cdo_id != null){
            $cdo = DB::table('initialization')->where('initialization.id', '=', $request->cdo_id)->get();
        }else{
            $cdo = DB::table('initialization')->get();
        }
        $data['cdo'] = $cdo;
        return view('reports.cdo_report.report',compact('data'));
    }

    public function UserManagementSystemPage(){
        $data = [];
        $users = User::all();
        $data['users'] = $users;
        $permissions = Permission::get();
        $result = [];

        foreach ($permissions as $permission) {
            $displayName = $permission['display_name'];
            if (!isset($result[$displayName])) {
                $result[$displayName] = [];
            }
            $result[$displayName][] = $permission;
        }
        // dd($result);
        $structuredPermissions = [
            'Setup' => [
                'Pickup Point' => $result['Pickup Point'] ?? [],
                'Shipping Line' => $result['Shipping Line'] ?? [],
                'Customer' => $result['Customer'] ?? [],
                'Broker' => $result['Broker'] ?? [],
                'Vehicle Category' => $result['Vechicle Category'] ?? [],
                'Stations' => $result['Stations'] ?? [],
                'Packages' => $result['Packages'] ?? [],
                'Self Company' => $result['Self Company'] ?? [],
                'Category' => $result['Category'] ?? [],

            ],

            'Job Inquiry' => [
                'Form' => $result['Form'] ?? [],
                'View Job Inquiry' => $result['View Job Inquiry'] ?? [],
            ],

            'Builty' => [
                'Add Builty' => $result['Add Builty'] ?? [],
                'View Builty' => $result['View Builty'] ?? [],
            ],
            'Billing' => [
                'Add Bill' => $result['Add Bill'] ?? [],
                'View Bill' => $result['View Bill'] ?? [],
            ],
            'Daily Expense' => [
                'Add Daily Expense' => $result['Add Daily Expense'] ?? [],
                'Expense Report' => $result['Expense Report'] ?? [],
                'Add Expense Category' => $result['Add Expense Category'] ?? [],
            ],
            'Cash Statement Head Office' => [
                'Head Office Cash Statment' => $result['Head Office Cash Statement'] ?? [],
                'Head Office Report' => $result['Head Office Report'] ?? [],
                'Campus Report' => $result['Campus Report'] ?? [],
            ],
            'Tracking' => [
                'Builty Tracking' => $result['Builty Tracking'] ?? [],
                'Status' => $result['Status'] ?? [],
            ],
            'Ledger' => [
                'General Ledger' => $result['General Ledger'] ?? [],
                'Customer Ledger' => $result['Customer Ledger'] ?? [],
                'Broker Ledger' => $result['Broker Ledger'] ?? [],
                'Salary Ledger' => $result['Salary Ledger'] ?? [],
                'Employee Ledger' => $result['Employee Ledger'] ?? [],
                'Bank Ledger' => $result['Bank Ledger'] ?? [],
            ],
            'Salary' => [
                'Salary' => $result['Salary'] ?? [],
            ],
            'HR' => [
                'Add Employee' => $result['Add Employee'] ?? [],
                'View Employee' => $result['View Employee'] ?? [],
                'Departments' => $result['Departments'] ?? [],
                'Mark Attendance' => $result['Mark Attendance'] ?? [],
                'View Attendance' => $result['View Attendance'] ?? [],
                'Leave Types' => $result['Leave Types'] ?? [],
                'Leave Applications' => $result['Leave Applications'] ?? [],
                'Add Award' => $result['Add Award'] ?? [],
                'View Award' => $result['View Award'] ?? [],
            ],
            'Received and Paid' => [
                'Manage Received & Paid' => $result['Manage Received & Paid'] ?? [],
            ],
            'User Management System' => [
                'Roles' => $result['Roles'] ?? [],
            ],
            'Reports' => [
                'Manager Wise Reports' => $result['Manager Wise Reports'] ?? [],
                'Customer Wise Reports' => $result['Customer Wise Reports'] ?? [],
                'Station Wise Reports' => $result['Station Wise Reports'] ?? [],
                'Broker Wise Reports' => $result['Broker Wise Reports'] ?? [],
                'PNL Reports' => $result['PNL Reports'] ?? [],
                'Customer Based PNL' => $result['Customer Based PNL'] ?? [],
                'All Customer Based PNL' => $result['All Customer Bas PNL'] ?? [],
                'CDO Report' => $result['CDO Report'] ?? [],
            ],

            // Add more headings and permissions as needed
        ];
        // dd($structuredPermissions);
        $data['permissions'] = $structuredPermissions;
        return view('setting.user_management_system.form',compact('data'));
    }

    public function getUserPermissions($userId) {
        $user = User::find($userId);

        if ($user) {
            // Assuming there's a method to get permissions for the user
            $permissions = $user->getAllPermissions()->pluck('name')->toArray();
            return response()->json($permissions);
        }

        return response()->json([]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $request->validate([
            'user' => 'required|exists:users,id',
            'per' => 'array',
            'per.*' => 'string|exists:permissions,name',
        ]);

        // Find the user
        $user = User::find($request->input('user'));

        // Detach all old permissions
        $user->syncPermissions([]);

        // If permissions are selected, attach new permissions
        if ($request->input('per')) {
            $user->syncPermissions($request->input('per'));
        }

        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }

}
