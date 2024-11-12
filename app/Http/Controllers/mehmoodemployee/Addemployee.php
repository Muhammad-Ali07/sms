<?php

namespace App\Http\Controllers\mehmoodemployee;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Client;
use Hash;
use mpdf\mpdf;
use Illuminate\Support\Facades\Facade;
use PDF;
use DB;
use Session;
use App\User;
use App\dbmodel;
use App\AddEmployees;
use View;
use Auth;
use App\EmployeeCnicImage;

class Addemployee extends BaseController
{


    public function setupindex(){
      
        $employees = AddEmployees::get();
        

        return View('mehmoodgoodemployee/addemployee')->with(compact("employees",$employees));;
    }

     public function addemployee(){
      
        $employees = AddEmployees::get();

        

        return View('mehmoodgoodemployee/employee')->with(compact("employees",$employees));;
    }

      public function employeereport(){
   
       $employees = AddEmployees::select('employee_name')->distinct('employee_name')->get(); 
       return View('mehmoodgoodemployee/addemployee_report')->with(compact("employees",$employees));
    }


      public function EmployeeReportpdf(Request $req)
       {

          $employees = $req->input('employee');
          $data['run_date'] = date('d-m-Y',strtotime(date('d-m-Y')));
          $data['run_time'] = time();
        $from = date('Y-m-d',strtotime($req->input('fromdate')));
        $todate = date('Y-m-d',strtotime($req->input('todate')));
        $data['start_date'] = $from;
        $data['end_date'] = $todate;    
         
         $getemployees = AddEmployees::where(['id'=>$employees])->first();


          PDF::SetTitle('Employee Report');
          PDF::SetFont('freeserif', '', 12, '', true);

            
            PDF::AddPage();
            PDF::writeHTML(view('mehmoodgoodemployee/employeereport/employeereport',$data)->render());
          // }
          
          return PDF::Output('Employee Report.pdf');
      }


      public function insert(Request $req){

        request()->validate([
        'employee_type' =>  'required',
        'name'     =>  'required|string',
        // 'fname'   =>  'required|string',
        'date'  =>  'required|date',
        'cnic'        =>  'required',
        'mobile'        =>  'required',
        // 'phone'        =>  'required',
        'salary'        =>  'required|integer',
        'joiningdate'        =>  'required',
        'current_salary'        =>  'required|integer',
        'scanefile'        =>  'required',
        'address'        =>  'required|string',
        ]);

        $status = $req->input('my-checkbox');
        if($status == "on"){
            $status = "Active";
        }else{
            $status = "Inactive";
        }


        $employees = new AddEmployees;
        $employees->employee_type = $req->input('employee_type');
        $employees->employee_name =  $req->input('name');
        $employees->father_name =  $req->input('fname');
        $employees->phone_number =  $req->input('phone');
        $employees->mobile_number =  $req->input('mobile');
        $employees->cnic   = $req->input('cnic');
        $employees->joining_date =  date('Y-m-d',strtotime($req->input('joiningdate')));
        $employees->joining_salary =  $req->input('salary');
        $employees->date =  date('Y-m-d',strtotime($req->input('date')));
        $employees->current_salary =  $req->input('current_salary');
        // $employees->picture =  $req->file('scanefile')->store('fitness','local');
        $employees->address =  $req->input('address');
        $employees->Status =  $status;
        $employees->save();


        if ($req->hasFile('scanefile')) {
          for ($i=0; $i < count($req->scanefile); $i++) { 
            $image = $req->scanefile[$i];
            // dd($image);
                $filename = time().'_'.$image->getClientOriginalName();
                // dd($filename);
                // $location = public_path('cnic_images/' . $filename);
                // Image::make($image)->resize(500,500)->save($location);
                $image->move("public/cnic_images", $filename);
                EmployeeCnicImage::create([
                  'employee_id' => $employees->id,
                  'image' => $filename,
                ]);
          }
        }

        return redirect('mehmoodgoodemployee/addemployee')->with('message',"Employee Added Successfully");
      }


       public function deleteemployee(Request $request){
      // dd($request->id);
        $res =  AddEmployees::where('id', $request->id)->delete();


            return response()->json($res);
    }


     public function edit($id)
    {

        $employees = AddEmployees::where(['id'=>$id])->get();
             
       
        $data['action'] = "addemployee";

        return View('mehmoodgoodemployee/editaddemployee',$data)->with(compact("employees",$employees));

    }


    public function view($id)
    {
      // $a = AddEmployees::with('cnic_images')->get();
      // dd($a);
        $employees = AddEmployees::where(['id'=>$id])->with('cnic_images')->get();
             
       // dd($employees[0]->cnic_images);
        $data['action'] = "addemployee";

        return View('mehmoodgoodemployee/viewaddemployee',$data)->with(compact("employees",$employees));

    }
public function update(Request $req)
    {
   // request()->validate([
   //          'employee_type' =>  'required',
   //          'name'     =>  'required|string',
   //          'fname'   =>  'required|string',
   //          'date'  =>  'required|date',
   //          'cnic'        =>  'required',
   //          'mobile'        =>  'required',
   //          'phone'        =>  'required',
   //          'salary'        =>  'required|integer',
   //          'joiningdate'        =>  'required',
   //          'current_salary'        =>  'required|integer',
   //          'scanefile'        =>  'required',
   //          'address'        =>  'required|string',

   //      ]);

       $status = $req->input('my-checkbox');
        if($status == "on"){
            $status = "Active";
        }else{
            $status = "Inactive";
        }

       $id =  $req->input('pkid');     
       $employees =  AddEmployees::whereId($id)->first();
        
       $employees->employee_type = $req->input('employee_type');
       $employees->employee_name =  $req->input('name');
       $employees->father_name =  $req->input('fname');
       $employees->phone_number =  $req->input('phone');
       $employees->mobile_number =  $req->input('mobile');
       $employees->cnic	 = $req->input('cnic');
       $employees->joining_date =  date('Y-m-d',strtotime($req->input('joiningdate')));
       $employees->joining_salary =  $req->input('salary');
       $employees->date =  date('Y-m-d',strtotime($req->input('date')));
       $employees->current_salary =  $req->input('current_salary');
       $employees->address =  $req->input('address');
       if (!empty($req->file('scanefile'))) {
       $employees->picture =  $req->file('scanefile')->store('fitness','local');
       }
       $employees->Status =  $status;

       $employees->update();

        
        return redirect('/mehmoodgoodemployee/addemployee')->with('message',"Employee Updated Successfully");

}
public function checknicnum(Request $req){
        $cnic = $req->input('cnic');
        $checknicnum = DB::table('employees')->where(['cnic'=>$cnic])->first();
        if($checknicnum!="")
        {
            return "1";
        }
        else{
            return "0";
        }
    }

public function checkmobile(Request $req){
        $mobile = $req->input('mobile');
        $checkmobnum = DB::table('employees')->where(['mobile_number'=>$mobile])->first();
        if($checkmobnum!="")
        {
            return "1";
        }
        else{
            return "0";
        }
    }

    public function checkphone(Request $req){
        $phone = $req->input('phone');
        $checkphonenum = DB::table('employees')->where(['phone_number'=>$phone])->first();
        if($checkphonenum!="")
        {
            return "1";
        }
        else{
            return "0";
        }
    }

}
