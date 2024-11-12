<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
use DB;
use Auth;

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

        \Log::info("start");
        \Session::forget('company');

        $selfcompanies = DB::table('selfcompany')->where('id',$id)->first();

        \Session::push('company', $selfcompanies);

        if(auth()->user()->role_id=='2')
        {
            $customer_id=auth()->user()->user_id;
            $builties = DB::table('now_builty')
            ->join('customer', 'now_builty.customer', '=', 'customer.id')
            ->where('self_company', $id)
            ->where('customer.id', $customer_id)
            ->select('now_builty.id as bid', 'now_builty.*', 'customer.*')
            ->orderBy('now_builty.id', 'desc')
            ->limit(10)
            ->get();
        }
        else
        {
            $builties = DB::table('now_builty')

                    ->where('self_company',$id)

                    ->select('now_builty.id as bid','now_builty.*')

                    ->orderBy('now_builty.id','Desc')

                    ->limit(10)

                    ->get();
                    \Log::info("start 1");
        }




        $view_all       = DB::table('challan')->orderBy('id','Desc')->limit(10)->get();

        if(auth()->user()->role_id=='2')
        {
            $customer_id=auth()->user()->user_id;
            $bill = DB::table('bill')
            ->where('selfcompany', $id)
            ->where('bill_customer', $customer_id)
            ->orderBy('bill_id', 'desc')
            ->limit(10)
            ->get();
        }
        else
        {
        $bill= DB::table('bill')->where('selfcompany',$id)->orderBy('bill_id','Desc')->limit(10)->get();
        }

        // dd($bill);


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
       \Log::info("start 2");

       if(auth()->user()->role_id=='2')
        {
            $customer_id=auth()->user()->user_id;
            $BuiltiesTotal = DB::table('now_builty')
            ->join('now_builtyitems', 'now_builty.id', '=', 'now_builtyitems.builtyid')
            ->where('now_builty.customer', $customer_id)
            ->sum('now_builtyitems.total');
        }
        else
        {
            $BuiltiesTotal  = DB::table('now_builty')->join('now_builtyitems','now_builty.id','now_builtyitems.builtyid')->sum('now_builtyitems.total');
        }

        //$no_of_builties = DB::table('now_builty')->where('now_builty.self_company',session('company')[0]->id)->count();
        if(auth()->user()->role_id=='2')
        {
            $customer_id=auth()->user()->user_id;
            $no_of_builties = DB::table('now_builty')->where('customer', $customer_id)->count();
        }
        else
        {
            $no_of_builties = DB::table('now_builty')->count();
        }

        \Log::info("start 3");


       // $select = DB::table('now_builty')->where('self_company',session('company')[0]->id)->get();

        $select = DB::table('now_builty')->take(1)->get();

        $MonthWiseBill = [];

        \Log::info("start 4");

        foreach($monthWiseBills as $bil){

            \Log::info($bil->bill_date);

            $MonthWiseBill[date('F',strtotime($bil->bill_date))] = $bil->total;

        }
        $job_inquiries = DB::table('now_job_inquiry as ji')
        ->leftJoin('employees as e', 'ji.manager_id', '=', 'e.id') // Join with the employees table
        ->select('ji.*', 'e.fullName as manager_name') // Select all columns from job inquiries and manager's name from employees
        ->limit(10)
        ->get();
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
        return view('home',compact('builties','manager_wise_rfq','customers','view_all','job_inquiries','total_expenses','bill','sender','customer','Employees','BuiltiesTotal','select','no_of_builties','billTotal','MonthWiseBill'));

    }


    // DashboardController.php
    public function fetchWidgetData()
    {
        $data = [];

        $customer   = DB::table('customer')->count();
        $brokers   = DB::table('broker')->count();

        $id = 1;
        if(auth()->user()->role_id=='2')
        {
            $customer_id=auth()->user()->user_id;
            $BuiltiesTotal = DB::table('now_builty')
            ->where('customer', $customer_id)
            ->sum('fare_rate');

            $no_of_builties = DB::table('now_builty')->where('customer', $customer_id)->count();
            $builties = DB::table('now_builty')
            ->join('customer', 'now_builty.customer', '=', 'customer.id')
            ->where('self_company', $id)
            ->where('customer.id', $customer_id)
            ->select('now_builty.id as bid', 'now_builty.*', 'customer.*')
            ->orderBy('now_builty.id', 'desc')
            ->limit(10)
            ->get();

            $bill = DB::table('bill')
            ->where('selfcompany', $id)
            ->where('bill_customer', $customer_id)
            ->orderBy('bill_id', 'desc')
            ->limit(10)
            ->get();

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
                // $builties = DB::table('now_builty as b')
                // ->leftJoin('customer as c', 'b.customer_id', '=', 'c.id') // Join with the customer table
                // ->where('b.self_company', $id)
                // ->select('b.id as bid', 'b.*', DB::raw("
                //     CASE
                //         WHEN b.customer_id IS NULL THEN b.customer
                //         ELSE c.name
                //     END as customer_name
                // ")) // Conditional selection for customer_name
                // ->orderBy('b.id', 'Desc')
                // ->limit(10)
                // ->get();
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

            // Return the data as JSON
            return response()->json([
                'data' => $data,
        ]);
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

}

