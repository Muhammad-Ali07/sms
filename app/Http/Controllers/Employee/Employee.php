<?php

namespace App\Http\Controllers\nsk\employee;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use Session;

class Employee extends BaseController
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(){
    $data['emp_info'] = DB::table('employee')->get();
    return view('nsk/employee/employee',$data);
  }
  public function addEmp(Request $req){
    $name = $req->input('name');
    $address = $req->input('address');
    $date = $req->input('date');
    $phone = $req->input('phone');
    $mobile = $req->input('mobile');
    $cnic = $req->input('cnic');
    $salary = $req->input('salary');

    $data = array(
      'emp_name' => $name,
      'emp_address' => $address,
      'emp_date_join' => date('Y-m-d',strtotime($date)),
      'emp_phone' => $phone,
      'emp_mobile' => $mobile,
      'emp_cnic' => $cnic,
      'emp_salary' => $salary
    );

    $add_emp = DB::table('employee')->insert($data);

    return redirect('/employee')->with('message',"Employee Added Successfully");
  }
  public function emp_edit($id){
    $data['emp_info'] = DB::table('employee')->get();
    $data['emp'] = DB::table('employee')->where('emp_id',$id)->get();
    return view('nsk/employee/employee',$data);
  }
  public function emp_remove($id){
    $remove_emp = DB::table('employee')->where('emp_id',$id)->delete();

    return redirect('/employee')->with('error',"employee record has been removed");
  }
  public function updateEmp(Request $req){
    $id = $req->input('id');
    $name = $req->input('name');
    $address = $req->input('address');
    $date = $req->input('date');
    $phone = $req->input('phone');
    $mobile = $req->input('mobile');
    $cnic = $req->input('cnic');
    $salary = $req->input('salary');

    $data = array(
      'emp_name' => $name,
      'emp_address' => $address,
      'emp_date_join' => date('Y-m-d',strtotime($date)),
      'emp_phone' => $phone,
      'emp_mobile' => $mobile,
      'emp_cnic' => $cnic,
      'emp_salary' => $salary
    );

    $update_emp = DB::table('employee')->where('emp_id',$id)->update($data);

    return redirect('/employee')->with('message',"Employee record updated successfully");
  }
}
