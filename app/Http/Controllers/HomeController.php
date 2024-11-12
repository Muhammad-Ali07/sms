<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Tutorial;
use App\User;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()
    {

        $selfcompanies = DB::table('selfcompany')->get();

        return view('self_company',compact('selfcompanies'));



    }



    public function dashboard($id){

        // $permissions = Permission::pluck('id')->toArray();

        // $user = User::where('email','admin@admin.com')->first();

        // if ($user) {
        //     // Check if the user has a specific permission
        //     if ($user->hasPermissionTo('company-create')) {
        //         // User has the permission
        //         dd('User has the permission to Create COmpany.');
        //     } else {
        //         // User does not have the permission
        //         dd('User does not have the permission to edit articles.');
        //     }
        // } else {
        //     dd('User not found');
        // }


        // if ($user) {
        //     // Attach permissions by IDs
        //     foreach ($permissions as $permissionId) {
        //         $user->permissions()->attach($permissionId);
        //     }
        // } else {
        //     dd('User not found');
        // }

        // // Check updated permissions
        // dd($user->getAllPermissions());
        // dd($user->permissions);
        // dd('in controller');

        \Log::info("start");
        \Session::forget('company');

        $selfcompanies = DB::table('selfcompany')->where('id',$id)->first();

        \Session::push('company', $selfcompanies);

        if(auth()->user()->role_id=='1'){
            $builties = DB::table('now_builty as b')
            ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id') // Join with the customer table
            ->leftJoin('now_bilty_puchase_expense as pe', 'b.id', '=', 'pe.bilty_id') // Join with purchase expenses
            ->leftJoin('now_bilty_selling_expense as se', 'b.id', '=', 'se.builty_id') // Join with selling expenses
            ->where('b.self_company', $id)
            // ->whereBetween('b.date', [$fromDate, $toDate]) // Make sure 'b.date' is the actual date column name
            ->select(
                'b.id as bid',
                DB::raw("
                    CASE
                        WHEN b.customer_id IS NULL THEN b.customer
                        ELSE c.name
                    END as customer_name"),
                DB::raw("SUM(pe.amount) as total_purchase_expense"), // Sum of purchase expenses
                DB::raw("SUM(se.amount) as total_selling_expense") // Sum of selling expenses
            )
            ->groupBy('b.id', 'b.customer_id', 'b.customer', 'c.name') // Group by necessary fields
            ->orderBy('b.id', 'Desc')
            ->limit(10)
            ->get();

            $bill = DB::table('bill as b')
            ->leftJoin('customer as c', 'b.bill_customer', '=', 'c.id') // Join with the customer table
            ->where('b.selfcompany', $id)
            ->select(
                'b.*', // Select all columns from the bill table
                'c.name as customer_name' // Select the customer name from the customer table
            )
            ->orderBy('b.bill_id', 'Desc')
            ->limit(10)
            ->get();
            $BuiltiesTotal  = DB::table('now_builty')->join('now_builtyitems','now_builty.id','now_builtyitems.builtyid')->sum('now_builtyitems.total');
            $no_of_builties = DB::table('now_builty')->count();
            $job_inquiries = DB::table('now_job_inquiry as ji')
            ->leftJoin('employees as e', 'ji.manager_id', '=', 'e.id') // Join with the employees table
            ->leftJoin('customer as c', 'ji.customer_id', '=', 'c.id') // Join with the customer table
            ->select(
                'ji.*', // Select all columns from job inquiries
                'e.fullName as manager_name', // Get the manager's name
                'c.name as customer_name', // Get the customer name
                'ji.selling_rate', // Include selling rate
                'ji.status' // Include status
            )
            ->limit(10)
            ->get();
            // $vw_petty_cash = DB::table('pettycash_meta_view')->orderBy('fk_pettycash_id','desc')->limit(10)->get();
            // dd($vw_petty_cash);

            $cdos = DB::table('initialization')
                ->join('initialization_dtl', 'initialization.id', '=', 'initialization_dtl.initialization_id')
                ->select(
                    'initialization.id as initialization_id',
                    'initialization.initialization_no',
                    'initialization.csm_no',
                    'initialization.do_date',
                    'initialization.job_no as initialization_job_no',
                    'initialization.bl_no',
                    'initialization.container_no as initialization_container_no',
                    'initialization.no_of_containers',
                    'initialization.expiry_date',
                    'initialization.eir as initialization_eir',
                    'initialization.eir_upload as initialization_eir_upload',
                    'initialization.shipping_line_id',
                    'initialization.payment_by',
                    'initialization.payment_by_dtl',
                    'initialization.deposit_amount',
                    'initialization.supplier_charges',
                    'initialization.payment_date',
                    'initialization.created_at',
                    'initialization.updated_at',
                    'initialization.pick_point_ids',
                    'initialization.placement_date as initialization_placement_date',
                    'initialization.consignee_id',
                    'initialization.receiving_date as initialization_receiving_date',
                    'initialization.eir_date as initialization_eir_date',

                    'initialization_dtl.id as initialization_dtl_id',
                    'initialization_dtl.initialization_id as dtl_initialization_id',
                    'initialization_dtl.job_no as initialization_dtl_job_no',
                    'initialization_dtl.container_no as initialization_dtl_container_no',
                    'initialization_dtl.pick_point',
                    'initialization_dtl.yard',
                    'initialization_dtl.placement_date as initialization_dtl_placement_date',
                    'initialization_dtl.eir_date as initialization_dtl_eir_date',
                    'initialization_dtl.eir_status',
                    'initialization_dtl.eir_upload as initialization_dtl_eir_upload',
                    'initialization_dtl.receiving_date as initialization_dtl_receiving_date'
                )
                ->get();

        }else{
            $customer_id=auth()->user()->user_id;

            $BuiltiesTotal = DB::table('now_builty')
            ->join('now_builtyitems', 'now_builty.id', '=', 'now_builtyitems.builtyid')
            ->where('now_builty.customer', $customer_id)
            ->sum('now_builtyitems.total');

            $builties = DB::table('now_builty')
            ->join('customer', 'now_builty.customer', '=', 'customer.id')
            ->where('self_company', $id)
            ->where('customer.id', $customer_id)
            ->select('now_builty.id as bid', 'now_builty.*', 'customer.*')
            ->orderBy('now_builty.id', 'desc')
            ->limit(10)
            ->get();
            $customer_id=auth()->user()->user_id;
            $bill = DB::table('bill')
            ->where('selfcompany', $id)
            ->where('bill_customer', $customer_id)
            ->orderBy('bill_id', 'desc')
            ->limit(10)
            ->get();
            $no_of_builties = DB::table('now_builty')->where('customer', $customer_id)->count();
            $job_inquiries = DB::table('now_job_inquiry as ji')
            ->leftJoin('employees as e', 'ji.manager_id', '=', 'e.id') // Join with the employees table
            ->select('ji.*', 'e.fullName as manager_name') // Select all columns from job inquiries and manager's name from employees
            ->limit(10)
            ->get();


        }

        $sender         = DB::table('customer')->where('selfcompany',$id)->get();
        $customer       = DB::table('customer')->count();
        $Employees      = DB::table('employees')->count();
        //$billTotal      = DB::table('bill')->where('selfcompany',session('company')[0]->id)->sum('total');
        $billTotal      = DB::table('bill')->sum('total');
        $total_expenses = DB::table('now_bilty_puchase_expense as bpe')
        ->select(DB::raw('SUM(REPLACE(bpe.amount, ",", "")) as total')) // Replace commas and sum the amounts
        ->value('total'); // Retrieve the total value
                // dd($total_expenses);

        $monthWiseBills = DB::table('bill')->where('selfcompany',session('company')[0]->id)->get();
       // $BuiltiesTotal  = DB::table('now_builty')->join('now_builtyitems','now_builty.id','now_builtyitems.builtyid')->where('now_builty.self_company',session('company')[0]->id)->sum('now_builtyitems.total');
        //    \Log::info("start 2");


        //     \Log::info("start 3");


       // $select = DB::table('now_builty')->where('self_company',session('company')[0]->id)->get();

        $select = DB::table('now_builty')->take(1)->get();

        $MonthWiseBill = [];

        \Log::info("start 4");

        foreach($monthWiseBills as $bil){
            \Log::info($bil->bill_date);
            $MonthWiseBill[date('F',strtotime($bil->bill_date))] = $bil->total;
        }

        $customers = DB::table('customer')->limit(10)->get();
        $manager_wise_rfq = DB::table('now_job_inquiry as ji')
        ->leftJoin('employees as e', 'ji.manager_id', '=', 'e.id') // Join with employees table to get manager's name
        ->whereNotNull('ji.manager_id') // Exclude rows where manager_id is NULL
        ->select(
            'e.id as manager_id', // Include manager's ID
            'e.fullName as manager_name', // Get the manager's name
            DB::raw("SUM(CASE WHEN ji.status = 'mature' THEN 1 ELSE 0 END) as mature_count"), // Count of mature status
            DB::raw("SUM(CASE WHEN ji.status = 'immature' THEN 1 ELSE 0 END) as immature_count") // Count of immature status
        )
        ->groupBy('e.id', 'e.fullName') // Group by both manager ID and name
        ->orderBy('mature_count', 'desc') // Order by mature count in descending order
        ->limit(5)
        ->get();
            // $rfq_manager_wise = DB::table('now_job_inquiry as ji')
        // ->leftJoin('employees as e', 'ji.manager_id', '=', 'e.id') // Join with employees table to get manager's name
        // ->select(
        //     'e.id as manager_id', // Include manager's ID
        //     'e.fullName as manager_name', // Get the manager's name
        //     DB::raw("SUM(CASE WHEN ji.status = 'mature' THEN 1 ELSE 0 END) as mature_count"), // Count of mature status
        //     DB::raw("SUM(CASE WHEN ji.status = 'immature' THEN 1 ELSE 0 END) as immature_count") // Count of immature status
        // )
        // ->groupBy('e.id', 'e.fullName') // Group by both manager ID and name
        // ->get();
            // dd($rfq_manager_wise);
        // dd($customers);
        \Log::info("end");


                    $cdos = DB::table('initialization')
                ->join('initialization_dtl', 'initialization.id', '=', 'initialization_dtl.initialization_id')
                ->select(
                    'initialization.id as initialization_id',
                    'initialization.initialization_no',
                    'initialization.csm_no',
                    'initialization.do_date',
                    'initialization.job_no as initialization_job_no',
                    'initialization.bl_no',
                    'initialization.container_no as initialization_container_no',
                    'initialization.no_of_containers',
                    'initialization.expiry_date',
                    'initialization.eir as initialization_eir',
                    'initialization.eir_upload as initialization_eir_upload',
                    'initialization.shipping_line_id',
                    'initialization.payment_by',
                    'initialization.payment_by_dtl',
                    'initialization.deposit_amount',
                    'initialization.supplier_charges',
                    'initialization.payment_date',
                    'initialization.created_at',
                    'initialization.updated_at',
                    'initialization.pick_point_ids',
                    'initialization.placement_date as initialization_placement_date',
                    'initialization.consignee_id',
                    'initialization.receiving_date as initialization_receiving_date',
                    'initialization.eir_date as initialization_eir_date',

                    'initialization_dtl.id as initialization_dtl_id',
                    'initialization_dtl.initialization_id as dtl_initialization_id',
                    'initialization_dtl.job_no as initialization_dtl_job_no',
                    'initialization_dtl.container_no as initialization_dtl_container_no',
                    'initialization_dtl.pick_point',
                    'initialization_dtl.yard',
                    'initialization_dtl.placement_date as initialization_dtl_placement_date',
                    'initialization_dtl.eir_date as initialization_dtl_eir_date',
                    'initialization_dtl.eir_status',
                    'initialization_dtl.eir_upload as initialization_dtl_eir_upload',
                    'initialization_dtl.receiving_date as initialization_dtl_receiving_date'
                )
                ->get();

        return view('home',compact('builties','cdos','vw_petty_cash','manager_wise_rfq','customers','view_all','job_inquiries','total_expenses','bill','sender','customer','Employees','BuiltiesTotal','select','no_of_builties','billTotal','MonthWiseBill'));

    }


    // DashboardController.php
    public function fetchWidgetData()
    {
        $data = [];

        $customer   = DB::table('customer')->count();
        $brokers   = DB::table('broker')->count();

        $id = 1;
        if(auth()->user()->role_id=='1')
        {
            $selling_expenses = DB::table('now_bilty_selling_expense')
                        ->sum('amount');
            $purchasing_expenses = DB::table('now_bilty_puchase_expense')
            ->sum('amount');
            $sum_of_salaries = DB::table('employees as e')
            ->sum('e.emp_salary');
            $data['selling_expenses'] = $selling_expenses;
            $data['purchasing_expenses'] = $purchasing_expenses;
            $data['sum_of_salaries'] = $sum_of_salaries;

            $BuiltiesTotal = DB::table('now_builty')
            ->sum('fare_rate');

            $no_of_builties = DB::table('now_builty')->count();
            // $builties = DB::table('now_builty')
            // ->join('customer', 'now_builty.customer', '=', 'customer.id')
            // ->where('self_company', $id)
            // // ->where('customer.id', $customer_id)
            // ->select('now_builty.id as bid', 'now_builty.*', 'customer.*')
            // ->orderBy('now_builty.id', 'desc')
            // ->limit(10)
            // ->get();
            $builties = DB::table('now_builty as b')
            ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id') // Join with the customer table
            ->leftJoin('now_bilty_puchase_expense as pe', 'b.id', '=', 'pe.bilty_id') // Join with purchase expenses
            ->leftJoin('now_bilty_selling_expense as se', 'b.id', '=', 'se.builty_id') // Join with selling expenses
            ->where('b.self_company', $id)
            // ->whereBetween('b.date', [$fromDate, $toDate]) // Make sure 'b.date' is the actual date column name
            ->select(
                'b.id as bid',
                DB::raw("
                    CASE
                        WHEN b.customer_id IS NULL THEN b.customer
                        ELSE c.name
                    END as customer_name"),
                DB::raw("SUM(pe.amount) as total_purchase_expense"), // Sum of purchase expenses
                DB::raw("SUM(se.amount) as total_selling_expense") // Sum of selling expenses
            )
            ->groupBy('b.id', 'b.customer_id', 'b.customer', 'c.name') // Group by necessary fields
            ->orderBy('b.id', 'Desc')
            ->limit(10)
            ->get();

            $bill = DB::table('bill as b')
            ->leftJoin('customer as c', 'b.bill_customer', '=', 'c.id') // Join with the customer table
            ->where('b.selfcompany', $id)
            ->select(
                'b.*', // Select all columns from the bill table
                'c.name as customer_name' // Select the customer name from the customer table
            )
            ->orderBy('b.bill_id', 'Desc')
            ->limit(10)
            ->get();

            $bill = DB::table('bill as b')
            ->leftJoin('customer as c', 'b.bill_customer', '=', 'c.id') // Join with the customer table
            ->where('b.selfcompany', $id)
            ->select(
                'b.*', // Select all columns from the bill table
                'c.name as customer_name' // Select the customer name from the customer table
            )
            ->orderBy('b.bill_id', 'Desc')
            ->limit(10)
            ->get();
            $BuiltiesTotal  = DB::table('now_builty')->join('now_builtyitems','now_builty.id','now_builtyitems.builtyid')->sum('now_builtyitems.total');
            $no_of_builties = DB::table('now_builty')->count();
            $job_inquiries = DB::table('now_job_inquiry as ji')
            ->leftJoin('employees as e', 'ji.manager_id', '=', 'e.id') // Join with the employees table
            ->leftJoin('customer as c', 'ji.customer_id', '=', 'c.id') // Join with the customer table
            ->select(
                'ji.*', // Select all columns from job inquiries
                'e.fullName as manager_name', // Get the manager's name
                'c.name as customer_name', // Get the customer name
                'ji.selling_rate', // Include selling rate
                'ji.status' // Include status
            )
            ->limit(10)
            ->get();
            // $vw_petty_cash = DB::table('pettycash_meta_view')->orderBy('fk_pettycash_id','desc')->limit(10)->get();

        }
        else
        {
            $no_of_builties = DB::table('now_builty')->count();
            $BuiltiesTotal = DB::table('now_builty')->sum('fare_rate');
            $builties = DB::table('now_builty as b')
            ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id') // Join with the customer table
            ->leftJoin('now_station as to_station', 'b.to', '=', 'to_station.id') // Join with the stations table for 'to' station
            ->leftJoin('now_station as from_station', 'b.from', '=', 'from_station.id') // Join with the stations table for 'from' station
            ->where('b.self_company', $id)
            ->select(
                'b.id as bid',
                'b.*',
                DB::raw("
                    CASE
                        WHEN b.customer_id IS NULL THEN b.customer
                        ELSE c.name
                    END as customer_name"),
                'to_station.name as to_station_name', // Select 'to' station name
                'from_station.name as from_station_name' // Select 'from' station name
            )
            ->orderBy('b.id', 'Desc')
            ->limit(10)
            ->get();
                $job_inquiries = DB::table('now_job_inquiry as ji')
                ->leftJoin('employees as e', 'ji.manager_id', '=', 'e.id') // Join with the employees table
                ->select('ji.*', 'e.fullName as manager_name') // Select all columns from job inquiries and manager's name from employees
                ->limit(10)
                ->get();
                $customers = DB::table('customer')->limit(10)->get();
                $bill= DB::table('bill')->where('selfcompany',$id)->orderBy('bill_id','Desc')->limit(10)->get();
        }

            $total_expenses = DB::table('now_bilty_puchase_expense as bpe')
            ->select(DB::raw('SUM(REPLACE(bpe.amount, ",", "")) as total')) // Replace commas and sum the amounts
            ->value('total'); // Retrieve the total value
            // dd($total_expenses);
            $shipping_line = DB::table('shipping_line')->count();
            $bills_made = DB::table('bill')->count();
            $all_rfq = DB::table('now_job_inquiry')->count();
            $all_employees = DB::table('employees')->count();
            $all_users = DB::table('users')->count();
            $all_stations = DB::table('now_station')->count();
            $manager_wise_rfq = DB::table('now_job_inquiry as ji')
            ->leftJoin('employees as e', 'ji.manager_id', '=', 'e.id') // Join with employees table to get manager's name
            ->whereNotNull('ji.manager_id') // Exclude rows where manager_id is NULL
            ->select(
                'e.id as manager_id', // Include manager's ID
                'e.fullName as manager_name', // Get the manager's name
                DB::raw("SUM(CASE WHEN ji.status = 'mature' THEN 1 ELSE 0 END) as mature_count"), // Count of mature status
                DB::raw("SUM(CASE WHEN ji.status = 'immature' THEN 1 ELSE 0 END) as immature_count") // Count of immature status
            )
            ->groupBy('e.id', 'e.fullName') // Group by both manager ID and name
            ->orderBy('mature_count', 'desc') // Order by mature count in descending order
            ->limit(5)
            ->get();
            $data['BuiltiesTotal'] = $BuiltiesTotal;
            $data['no_of_builties'] = $no_of_builties;
            $data['total_expenses_payable_to_broker'] = $total_expenses;
            $data['bilties'] = $builties;
            $data['customers'] = $customer;
            $data['brokers'] = $brokers;
            $data['shipping_line'] = $shipping_line;
            $data['bills_made'] = $bills_made;
            $data['bill'] = $bill;
            $data['all_rfq'] = $all_rfq;
            $data['all_employees'] = $all_employees;
            $data['all_users'] = $all_users;
            $data['all_stations'] = $all_stations;
            $data['job_inquiries'] = $job_inquiries;
            $data['all_customers'] = $customer;
            $data['manager_wise_rfq'] = $manager_wise_rfq;
            // $data['vw_petty_cash'] = $vw_petty_cash;

            // Return the data as JSON
            return response()->json([
                'data' => $data,
            ]);
    }

    public function filterRfq(Request $request)
    {
        // $data = [];
        $id = 1;
        $fromDate = $request->input('rfq_from_date');
        $toDate = $request->input('rfq_to_date');
        $job_inquiries = DB::table('now_job_inquiry as ji')
        ->leftJoin('employees as e', 'ji.manager_id', '=', 'e.id') // Join with the employees table
        ->leftJoin('customer as c', 'ji.customer_id', '=', 'c.id') // Join with the customer table
        ->select(
            'ji.*', // Select all columns from job inquiries
            'e.fullName as manager_name', // Get the manager's name
            'c.name as customer_name', // Get the customer name
            'ji.selling_rate', // Include selling rate
            'ji.status' // Include status
        )
        ->whereBetween('ji.date', [$fromDate, $toDate]) // Adjust 'created_at' to your actual date column
        ->limit(10)
        ->get();
        // dd($bill);
        return response()->json(['data' => $job_inquiries]);
    }


    public function filterBill(Request $request)
    {
        // $data = [];
        $id = 1;
        $fromDate = $request->input('bill_from_date');
        $toDate = $request->input('bill_to_date');
        $bill = DB::table('bill as b')
        ->leftJoin('customer as c', 'b.bill_customer', '=', 'c.id') // Join with the customer table
        ->where('b.selfcompany', $id)
        ->whereBetween('b.bill_date', [$fromDate, $toDate]) // Filter by bill_date range
        ->select(
            'b.*', // Select all columns from the bill table
            'c.name as customer_name' // Select the customer name from the customer table
        )
        ->orderBy('b.bill_id', 'Desc')
        ->limit(10)
        ->get();
        // dd($bill);
        return response()->json(['data' => $bill]);
    }

    public function filterBilties(Request $request)
    {
        // $data = [];
        $id = 1;
        $fromDate = $request->input('bilties_from_date');
        $toDate = $request->input('bilties_to_date');
        $builties = DB::table('now_builty as b')
        ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id') // Join with the customer table
        ->leftJoin('now_bilty_puchase_expense as pe', 'b.id', '=', 'pe.bilty_id') // Join with purchase expenses
        ->leftJoin('now_bilty_selling_expense as se', 'b.id', '=', 'se.builty_id') // Join with selling expenses
        ->where('b.self_company', $id)
        ->whereBetween('b.date', [$fromDate, $toDate]) // Make sure 'b.date' is the actual date column name
        ->select(
            'b.id as bid',
            DB::raw("
                CASE
                    WHEN b.customer_id IS NULL THEN b.customer
                    ELSE c.name
                END as customer_name"),
            DB::raw("SUM(pe.amount) as total_purchase_expense"), // Sum of purchase expenses
            DB::raw("SUM(se.amount) as total_selling_expense") // Sum of selling expenses
        )
        ->groupBy('b.id', 'b.customer_id', 'b.customer', 'c.name') // Group by necessary fields
        ->orderBy('b.id', 'Desc')
        ->limit(10)
        ->get();

        // $builties = DB::table('now_builty as b')
        // ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id') // Join with the customer table
        // ->where('b.self_company', $id)
        // ->whereBetween('b.date', [$fromDate, $toDate]) // Make sure 'b.date' is the actual date column name
        // ->select(
        //     'b.id as bid',
        //     'b.*',
        //     DB::raw("
        //         CASE
        //             WHEN b.customer_id IS NULL THEN b.customer
        //             ELSE c.name
        //         END as customer_name")
        // )
        // ->orderBy('b.id', 'Desc')
        // ->limit(10)
        // ->get();
        // dd($builties);

        return response()->json(['data' => $builties]);
    }

    public function filterPettyCash(Request $request)
    {
        // $data = [];
        $id = 1;
        $fromDate = $request->input('pc_from_date');
        $toDate = $request->input('pc_to_date');
        $vw_petty_cash = DB::table('pettycash_meta_view')
        ->whereBetween('Entry Date', [$fromDate, $toDate]) // Apply date range filter
        ->orderBy('fk_pettycash_id', 'desc')
        ->limit(10)
        ->get();

        return response()->json(['data' => $vw_petty_cash]);
    }


    // public function customLogin(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     \Log::info('Attempting login with:', ['email' => $email, 'password' => $password]);

    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //         return response()->json(['message' => 'Login successful!'], 200);
    //     } else {
    //         \Log::warning('Login attempt failed', ['email' => $email]); // Log failed attempts for debugging
    //         return response()->json(['message' => 'Invalid credentials.'], 401);
    //     }
    // }

    public function videoForm()
    {
        // dd('in controller');
        $data = [];
        $tutorials = Tutorial::all();
        return view('tutorials.create',compact('tutorials'));
    }

    public function videoSave(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $validator = Validator::make($request->all(), [
            'video_title' => 'required|string|max:255',
            'module_name' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4,avi,mov|max:10240', // max 10MB
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Store the video
        $path = $request->file('video')->store('videos');
        // dd($path);

        $tutorial = new Tutorial();
        $tutorial->video_title = $request->video_title;
        $tutorial->module_name = $request->module_name;
        $tutorial->video_path = $path;
        $tutorial->save();
        // You can save $title, $module, and $path to the database here

        return back()->with('success', 'Tutorial uploaded successfully!');
    }

}

