<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Client;
use mpdf\mpdf;
use Illuminate\Support\Facades\Facade;
use PDF;
use DB;
use Session;
use App\User;

class userroleController extends Controller
{
	public function index()
	{

		$data['users'] = DB::table('users')->get();
 		//$data['users'] = DB::table('users')->where('id', '!=', 1)->where(function ($query) {$query->where('role_id', '!=', 2)->orWhereNull('role_id');})->get();
	
		$data['user_meta'] = DB::table('user_meta')->get();

		return view('userRights/userRole', $data);
	}

	public function addNewUser(Request $req) 
	{

// 		dd($req->all());
		$username = $req->input('username');
		$email = $req->input('email');
		$password = $req->input('password');

		$setup = $req->input('setup');
		$builty = $req->input('builty');
		$challan = $req->input('challan');
		$commsion_book = $req->input('commission_book');
		$bill = $req->input('bills');
		$daily_labour_payment = $req->input('daily_labour_payment');


		$daily_expenses = $req->input('daily_expenses');
		$cash_statement_head_office = $req->input('cash_statement_head_office');
		$tracking = $req->input('tracking');
		$own_vehicle_trip = $req->input('own_vehicle_trip');
		$ledger = $req->input('ledger');
		$salary = $req->input('salary');

		$hr = $req->input('hr');
		$accounts = $req->input('accounts');
		$received_paid = $req->input('received_paid');

		$add = $req->input('add');
		$edit = $req->input('edit');
		$delete = $req->input('delete');

		if ($setup == "on") {
			$setup = 1;
		}

		if ($builty == "on") {
			$builty = 1;
		}
		if ($challan == "on") {
			$challan = 1;
		}

		if ($commsion_book == "on") {
			$commsion_book = 1;
		}

		if ($bill == "on") {
			$bill = 1;
		}

		if ($daily_labour_payment == "on") {
			$daily_labour_payment = 1;
		}



		if ($daily_expenses == "on") {
			$daily_expenses = 1;
		}

		if ($cash_statement_head_office == "on") {
			$cash_statement_head_office = 1;
		}

		if ($tracking == "on") {
			$tracking = 1;
		}

		if ($own_vehicle_trip == "on") {
			$own_vehicle_trip = 1;
		}


		if ($ledger == "on") {
			$ledger = 1;
		}

		if ($salary == "on") {
			$salary = 1;
		}



		if ($hr == "on") {
			$hr = 1;
		}


		if ($accounts == "on") {
			$accounts = 1;
		}


		if ($received_paid == "on") {
			$received_paid = 1;
		}

		if ($add == "on") {
			$add = 1;
		}
		if ($edit == "on") {
			$edit = 1;
		}
		if ($delete == "on") {
			$delete = 1;
		}

		$other_auth = 0;


		$data = array(
			'name' => $username,
			'email' => $email,
			'password' => bcrypt($password),
		);

		$userid = DB::table('users')->insertGetId($data);

		$meta_data = array(
			'fk_user_id' => $userid,
			'setup' => $setup,
			'builty' => $builty,
			'challan' => $challan,
			'commsion_book' => $commsion_book,
			'bills' => $bill,
			'daily_labour_payment' => $daily_labour_payment,
			'daily_expenses' => $daily_expenses,
			'cash_statement_head_office' => $cash_statement_head_office,
			'tracking' => $tracking,
			'own_vehicle_trip' => $own_vehicle_trip,

			'hr' => $hr,
			'ledger' => $ledger,
			'salary' => $salary,
			'accounts' => $accounts,
			'received_paid' => $received_paid,
			'insertion' => $add,
			'edition' => $edit,
			'deletion' => $delete,

		);

		$meta = DB::table('user_meta')->insert($meta_data);

		return redirect()->back()->with('message', 'A new user has been added');
	}

	public function editUserControls($id)
	{
        // $user = auth()->user()->id;
        // $user_meta = DB::table('user_meta')->where('fk_user_id',$user)->first();
        // dd($user_meta->setup);
		if ($id != '') {
			$data['edit_user'] = DB::table('users')->where('id', $id)->get();
			$data['edit_user_meta'] = DB::table('user_meta')->where('fk_user_id', $id)->get();
			$data['users'] = DB::table('users')->get();
			$data['user_meta'] = DB::table('user_meta')->get();

			return view('userRights/userRole', $data);
		} else {
			return redirect('userRole');
		}
	}

	public function updateUser(Request $req)
	{

		// dd($req->all());
		$id = $req->input('id');
		$username = $req->input('username');
		$email = $req->input('email');
		$password = $req->input('password');

		$setup = $req->input('setup');
		$builty = $req->input('builty');
		$challan = $req->input('challan');
		$commsion_book = $req->input('commission_book');
		$bill = $req->input('bills');
		$container_deposit = $req->input('container_deposit');

		$daily_labour_payment = $req->input('daily_labour_payment');


		$daily_expenses = $req->input('daily_expenses');
		$cash_statement_head_office = $req->input('cash_statement_head_office');
		$tracking = $req->input('tracking');

		$own_vehicle_trip = $req->input('own_vehicle_trip');
		$hr = $req->input('hr');
		$accounts = $req->input('accounts');
		$received_paid = $req->input('received_paid');
		$ledger = $req->input('ledger');
		$salary = $req->input('salary');
		$add = $req->input('add');
		$edit = $req->input('edit');
		$delete = $req->input('delete');

		if ($setup == "on") {
			$setup = 1;
		}

		if ($builty == "on") {
			$builty = 1;
		}
		if ($challan == "on") {
			$challan = 1;
		}

		if ($commsion_book == "on") {
			$commsion_book = 1;
		}

		if ($bill == "on") {
			$bill = 1;
		}
		if ($container_deposit == "on") {
			$container_deposit = 1;
		}

		if ($daily_labour_payment == "on") {
			$daily_labour_payment = 1;
		}



		if ($daily_expenses == "on") {
			$daily_expenses = 1;
		}

		if ($cash_statement_head_office == "on") {
			$cash_statement_head_office = 1;
		}

		if ($tracking == "on") {
			$tracking = 1;
		}

		if ($own_vehicle_trip == "on") {
			$own_vehicle_trip = 1;
		}

		if ($ledger == "on") {
			$ledger = 1;
		}

		if ($salary == "on") {
			$salary = 1;
		}


		if ($hr == "on") {
			$hr = 1;
		}

		if ($accounts == "on") {
			$accounts = 1;
		}


		if ($received_paid == "on") {
			$received_paid = 1;
		}

		if ($add == "on") {
			$add = 1;
		}
		if ($edit == "on") {
			$edit = 1;
		}
		if ($delete == "on") {
			$delete = 1;
		}

		$other_auth = 0;

		if ($password == '') {
			$data = array(
				'name' => $username,
				'email' => $email,

			);
		} else {
			$data = array(
				'name' => $username,
				'email' => $email,
				'password' => bcrypt($password),

			);
		}

		$userid = DB::table('users')->where('id', $id)->update($data);

		$meta_data = array(
			'fk_user_id' => $id,
			'setup' => $setup,
			'builty' => $builty,
			'challan' => $challan,
			'commsion_book' => $commsion_book,
			'bills' => $bill,
			'container_deposit' => $container_deposit,
			'daily_labour_payment' => $daily_labour_payment,
			'daily_expenses' => $daily_expenses,
			'cash_statement_head_office' => $cash_statement_head_office,
			'tracking' => $tracking,
			'own_vehicle_trip' => $own_vehicle_trip,
			'ledger' => $ledger,
			'salary' => $salary,
			'hr' => $hr,
			'accounts' => $accounts,
			'received_paid' => $received_paid,
			'insertion' => $add,
			'edition' => $edit,
			'deletion' => $delete,

		);


		$check_meta = DB::table('user_meta')->where('fk_user_id', $id)->get();

		if (sizeof($check_meta) > 0) {
			$meta = DB::table('user_meta')->where('fk_user_id', $id)->update($meta_data);
		} else {
			$meta = DB::table('user_meta')->where('fk_user_id', $id)->insert($meta_data);
		}
		return redirect('userRole')->with('message', 'A new user has been added');
	}

	public function removeUser($id)
	{
		DB::table('users')->where('id', $id)->delete();
		DB::table('user_meta')->where('fk_user_id', $id)->delete();

		return redirect('userRole')->with('error', 'A user has been deleted');
	}

	

}
