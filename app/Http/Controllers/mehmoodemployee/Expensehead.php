<?php

namespace App\Http\Controllers\setup;

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
use App\Expense;
use View;
use Auth;

class Expensehead extends BaseController
{



    public function expnsehead(){

        $expense_head = Expense::get();
        $last = Expense::orderby('id','desc')->get();

        return View('mehmoodgoodsetup/expnsehead')->with(compact("expense_head",$expense_head,"last",$last));
    }

   public function addexpnsehead(){

        $expense_head = Expense::get();
        $last = Expense::orderby('id','desc')->first();
        if($last!="")
        {
            $id= $last->id+1;
        }
        //for first record
        else
        {
           $id = 1;
        }

        return view('mehmoodgoodsetup/addexpnsehead')->with(compact('expense_head',$expense_head,'id',$id));


    }


public function insertexpense(Request $req){
       
              

         $expense_head = new Expense;
         $expense_head->number = $req->input('id_number');
         $expense_head->date =  date('Y-m-d',strtotime($req->input('date')));
         $expense_head->head_name =  $req->input('head_name');
         $expense_head->head_short =  $req->input('head_short');
         $expense_head->save();
        return redirect('setup/expnsehead')->with('message',"Expense Head Added Successfully");
    }


 


    public function deleteexpense(Request $request){
      // dd($request->id);
            $res =  Expense::where('id', $request->id)->delete();
            return response()->json($res);
    }

      public function edit($id)
    {
        $last = Expense::orderby('id','desc')->get();

        $expense_head = Expense::where(['id'=>$id])->get();
             
       
        $data['action'] = "expnsehead";

        return View('mehmoodgoodsetup/editexpnsehead',$data)->with(compact("expense_head",$expense_head,"last",$last));

    }


    public function view($id)
    {
      
         $last = Expense::orderby('id','desc')->get();

        $expense_head = Expense::where(['id'=>$id])->get();
             
       
        $data['action'] = "expnsehead";

        return View('mehmoodgoodsetup/viewexpnsehead',$data)->with(compact("expense_head",$expense_head,"last",$last));

    }


public function update(Request $req)
    {


          $id =  $req->input('pkid');     
          $expense_head =  Expense::whereId($id)->first();
        
         $expense_head->number = $req->input('id_number');
         $expense_head->date =  date('Y-m-d',strtotime($req->input('date')));
         $expense_head->head_name =  $req->input('head_name');
         $expense_head->head_short =  $req->input('head_short');
         $expense_head->update();


        
        return redirect('/setup/expnsehead')->with('message',"Expense Head Updated Successfully");

    }

}
