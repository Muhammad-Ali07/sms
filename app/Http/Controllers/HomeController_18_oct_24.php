<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
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

                    ->join('customer','now_builty.customer','customer.id')

                    ->where('self_company',$id)

                    ->select('now_builty.id as bid','now_builty.*','customer.*')

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
            $bill           = DB::table('bill')->where('selfcompany',$id)->orderBy('bill_id','Desc')->limit(10)->get();
        }

        // dd($bill);


        $sender         = DB::table('customer')->where('selfcompany',$id)->get();

       // $customer       = DB::table('customer')->where('selfcompany',session('company')[0]->id)->count();

        $customer       = DB::table('customer')->count();

        $Employees      = DB::table('employees')->count();

        //$billTotal      = DB::table('bill')->where('selfcompany',session('company')[0]->id)->sum('total');

        $billTotal      = DB::table('bill')->sum('total');

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


       // $select         = DB::table('now_builty')->where('self_company',session('company')[0]->id)->get();

        $select = DB::table('now_builty')->take(1)->get();

        $MonthWiseBill = [];

        \Log::info("start 4");

        foreach($monthWiseBills as $bil){

            \Log::info($bil->bill_date);

            $MonthWiseBill[date('F',strtotime($bil->bill_date))] = $bil->total;

        }

        \Log::info("end");
        return view('home',compact('builties','view_all','bill','sender','customer','Employees','BuiltiesTotal','select','no_of_builties','billTotal','MonthWiseBill'));

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

