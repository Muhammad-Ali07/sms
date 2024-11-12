<?php
namespace App\Http\Controllers\nsk\userRole;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Client;
use mpdf\mpdf;
use Illuminate\Support\Facades\Facade;
use PDF;
use DB;
use Session;
use App\User;

class userRole extends BaseController
{
	public function index(){
		$data['users'] = DB::table('users')->where('nsk',1)->get();
		$data['user_meta'] = DB::table('user_meta')->get();
		return view('nsk/userRole/userRole',$data);
	}
	public function addNewUser(Request $req){
		$username = $req->input('username');
		$email = $req->input('email');
		$password = $req->input('password');

		$customer = $req->input('customer');
		$station = $req->input('station');
		$driver_vehicle = $req->input('driver_vehicle');
		$employee = $req->input('employee');
		$bilty = $req->input('bilty');
		$challan = $req->input('challan');
		$dailyPL = $req->input('dailyPL');
		$bill = $req->input('bill');
		$bank = $req->input('bank');
		$trip = $req->input('trip');
		$major_exp = $req->input('major_exp');
		$pettyCash = $req->input('pettyCash');
		$received_paid = $req->input('received_paid');
		$ledger = $req->input('ledger');
		$salary = $req->input('salary');
		$add = $req->input('add');
		$edit = $req->input('edit');
		$delete = $req->input('delete');
		$other_auth = $req->input('other_auth');

		if($customer == "on"){
			$customer = 1;
		}
		if($station == "on"){
			$station = 1;
		}
		if($driver_vehicle == "on"){
			$driver_vehicle = 1;
		}
		if($employee == "on"){
			$employee = 1;
		}
		if($bilty == "on"){
			$bilty = 1;
		}
		if($challan == "on"){
			$challan = 1;
		}
		if($dailyPL == "on"){
			$dailyPL = 1;
		}
		if($bill == "on"){
			$bill = 1;
		}
		if($trip == "on"){
			$trip = 1;
		}
		if($major_exp == "on"){
			$major_exp = 1;
		}
		if($pettyCash == "on"){
			$pettyCash = 1;
		}
		if($bank == "on"){
			$bank = 1;
		}
		if($received_paid == "on"){
			$received_paid = 1;
		}
		if($ledger == "on"){
			$ledger = 1;
		}
		if($salary == "on"){
			$salary = 1;
		}
		if($add == "on"){
			$add = 1;
		}
		if($edit == "on"){
			$edit = 1;
		}
		if($delete == "on"){
			$delete = 1;
		}

		if($other_auth == "on"){
			$other_auth = 1;
		}else{
			$other_auth = 0;
		}

		$data = array(
			'name'=>$username,
			'email'=>$email,
			'password'=>bcrypt($password),
			'nsk'=> 1,
			'wazir'=> $other_auth
		);

		$userid = DB::table('users')->insertGetId($data);

		$meta_data = array(
			'fk_user_id'=>$userid,
			'customer'=>$customer,
			'stations'=>$station,
			'driver_vehicle'=>$driver_vehicle,
			'employee'=>$employee,
			'bilty'=>$bilty,
			'challan'=>$challan,
			'daily_profit_loss'=>$dailyPL,
			'bills'=>$bill,
			'trip'=>$trip,
			'major'=>$major_exp,
			'pettycash'=>$pettyCash,
			'bank'=>$bank,
			'recieved_paid'=>$received_paid,
			'ledger'=>$ledger,
			'salary'=>$salary,
			'insertion'=>$add,
			'edition'=>$edit,
			'deletion'=>$delete,
		);
		$meta = DB::table('user_meta')->insert($meta_data);

		return redirect('userRole')->with('message','A new user has been added');
	}
	public function editUserControls($id){
		if($id != ''){
			$data['edit_user'] = DB::table('users')->where('id',$id)->get();
			$data['edit_user_meta'] = DB::table('user_meta')->where('fk_user_id',$id)->get();
			$data['users'] = DB::table('users')->where('nsk',1)->get();
			
			$data['user_meta'] = DB::table('user_meta')->get();
			return view('nsk/userRole/userRole',$data);
		}else{
			return redirect('userRole');
		}
	}
	public function updateUser(Request $req){
		$id = $req->input('id');
		$username = $req->input('username');
		$email = $req->input('email');
		$password = $req->input('password');

		$customer = $req->input('customer');
		$station = $req->input('station');
		$driver_vehicle = $req->input('driver_vehicle');
		$employee = $req->input('employee');
		$bilty = $req->input('bilty');
		$challan = $req->input('challan');
		$dailyPL = $req->input('dailyPL');
		$bill = $req->input('bill');
		$bank = $req->input('bank');
		$trip = $req->input('trip');
		$major_exp = $req->input('major_exp');
		$pettyCash = $req->input('pettyCash');
		$received_paid = $req->input('received_paid');
		$ledger = $req->input('ledger');
		$salary = $req->input('salary');
		$add = $req->input('add');
		$edit = $req->input('edit');
		$delete = $req->input('delete');
		$other_auth = $req->input('other_auth');

		if($customer == "on"){
			$customer = 1;
		}
		if($station == "on"){
			$station = 1;
		}
		if($driver_vehicle == "on"){
			$driver_vehicle = 1;
		}
		if($employee == "on"){
			$employee = 1;
		}
		if($bilty == "on"){
			$bilty = 1;
		}
		if($challan == "on"){
			$challan = 1;
		}
		if($dailyPL == "on"){
			$dailyPL = 1;
		}
		if($bill == "on"){
			$bill = 1;
		}
		if($trip == "on"){
			$trip = 1;
		}
		if($major_exp == "on"){
			$major_exp = 1;
		}
		if($pettyCash == "on"){
			$pettyCash = 1;
		}
		if($bank == "on"){
			$bank = 1;
		}
		if($received_paid == "on"){
			$received_paid = 1;
		}
		if($ledger == "on"){
			$ledger = 1;
		}
		if($salary == "on"){
			$salary = 1;
		}
		if($add == "on"){
			$add = 1;
		}
		if($edit == "on"){
			$edit = 1;
		}
		if($delete == "on"){
			$delete = 1;
		}

		if($other_auth == "on"){
			$other_auth = 1;
		}else{
			$other_auth = 0;
		}


		if($password == ''){
			$data = array(
				'name'=>$username,
				'email'=>$email,
				'wazir'=> $other_auth
			);
		}else{
			$data = array(
				'name'=>$username,
				'email'=>$email,
				'password'=>bcrypt($password),
				'nsk'=> 1,
				'wazir'=> $other_auth
			);
		}
		$userid = DB::table('users')->where('id',$id)->update($data);

		$meta_data = array(
			'fk_user_id'=>$id,
			'customer'=>$customer,
			'stations'=>$station,
			'driver_vehicle'=>$driver_vehicle,
			'employee'=>$employee,
			'bilty'=>$bilty,
			'challan'=>$challan,
			'daily_profit_loss'=>$dailyPL,
			'bills'=>$bill,
			'trip'=>$trip,
			'major'=>$major_exp,
			'pettycash'=>$pettyCash,
			'bank'=>$bank,
			'recieved_paid'=>$received_paid,
			'ledger'=>$ledger,
			'salary'=>$salary,
			'insertion'=>$add,
			'edition'=>$edit,
			'deletion'=>$delete,
		);
		$check_meta = DB::table('user_meta')->where('fk_user_id',$id)->get();

		if(sizeof($check_meta) > 0){
			$meta = DB::table('user_meta')->where('fk_user_id',$id)->update($meta_data);
		}else{
			$meta = DB::table('user_meta')->where('fk_user_id',$id)->insert($meta_data);
		}
		return redirect('userRole')->with('message','A new user has been added');
	}
	public function removeUser($id){
		DB::table('users')->where('id',$id)->delete();
		DB::table('user_meta')->where('fk_user_id',$id)->delete();

		return redirect('userRole')->with('error','A user has been deleted');
	}
}
