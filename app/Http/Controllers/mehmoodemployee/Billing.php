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
use App\Bill;
use App\Billmeta;
use App\dbmodel;
use App\VehicleSetup;
use App\Stationdetail;
use App\CommissionBook;
use App\Customer;
use App\Biltys;
use View;
use Auth;

class Billing extends BaseController
{



    public function index(){
    	

       $bill = Bill::with('customer')->get();
      

       $generatedid = Bill::orderBy('id','desc')->first();
      $customer = Customer::where('customer_type',"Paid")->get();
        //if record is not null
        if($generatedid!="")
        {
            $id= $generatedid->id+1;
        }
        //for first record
        else
        {
           $id = 0;
        }     
       return view('mehmoodgoodemployee/billing/billing')->with(compact('id',$id,'bill',$bill,'customer',$customer));
    }

  //for ajax url on billing blade file

      public function createbilling(Request $req)

      {
        
     
        
        $Validation = $req->validate([
               'customer_id' => 'required',
              
           ]);
          $biltys = $req->input('bilty_id'); 
          if(!isset($biltys[0]))
          {
             return back()->with('error',"No bilty selected please select one");
          }


          if(isset($biltys[0]))
           {
          //FOR SAVING IN CHALLAN
          $bill = new Bill;
          $bill->customer_id = $req->input('customer_id');
          $bill->save();
           
         
           $customer = Customer::where('id',$bill->customer_id)->first();

         
         if($customer->customer_name=="SEARLE PAKISTAN LTD") 
           {  
            //if home delivery selected from dropdown
          if($req->input('bill_type')=="homedelivery")
            {
          foreach ($biltys as $key => $value) {
            # code...
          
          $billmeta = new Billmeta;
          $billmeta->bill_id = $bill->id;
          $billmeta->bilty_id = $value;
          $billmeta->type = $req->input('bill_type');
          $billmeta->home_delivery = $req->input('homedelivery')[$key];
          $billmeta->save();
       
          }
          }
            //if extra weight selected from dropdown
           if($req->input('bill_type')=="extraweight")
            {
          foreach ($biltys as $key => $value) {
            # code...
          
          $billmeta = new Billmeta;
          $billmeta->bill_id = $bill->id;
          $billmeta->bilty_id = $value;
          $billmeta->weight = $req->input('weight')[$key];
          $billmeta->extra_weight = $req->input('extra_weight')[$key];
          $billmeta->detention = $req->input('detention')[$key];
          $billmeta->type = $req->input('bill_type');
          $billmeta->save();
       
          }
          }

          }
          else{
          foreach ($biltys as $key => $value) {
            # code...
          
          $billmeta = new Billmeta;
          $billmeta->bill_id = $bill->id;
          $billmeta->bilty_id = $value;
          $billmeta->save();
       
          }

          }
          
          
        return back()->with('message',"Bill added successfully");
      }
    }

    public function view($id){
       
       $bill = Bill::where('id',$id)->with('customer')->get();
       $billmeta =  Billmeta::where('bill_id',$bill[0]->id)->with('getbilty')
       ->get();
        
       $generatedid = Bill::orderBy('id','desc')->first();
       $customer = Customer::get();
        //if record is not null
        if($generatedid!="")
        {
            $id= $generatedid->id+1;
        }
        //for first record
        else
        {
           $id = 0;
        }     

       return view('mehmoodgoodemployee/billing/billingview')->with(compact('id',$id,'bill',$bill,'customer',$customer,'billmeta',$billmeta));
    }

   public function edit($id){
      
       
       $bill = Bill::where('id',$id)->with('customer')->get();
       $billmeta =  Billmeta::where('bill_id',$bill[0]->id)->with('getbilty')
       ->get();

       
       $generatedid = Bill::orderBy('id','desc')->first();
       $customer = Customer::get();
        //if record is not null
        if($generatedid!="")
        {
            $id= $generatedid->id+1;
        }
        //for first record
        else
        {
           $id = 0;
        }     
       return view('mehmoodgoodemployee/billing/billingedit')->with(compact('id',$id,'bill',$bill,'customer',$customer,'billmeta',$billmeta));
    }


    public function checkcustomername(Request $req){
      $customer = $req->input('customer');
       $customer = Customer::where('id', $customer)->first();

       if($customer->customer_name=="SEARLE PAKISTAN LTD")
       {
         
        return "true";
       }
       else{
        return "false";
       }
      }


     public function openpdf($id){
      
       $bill = Bill::where('id',$id)->first();

       $customer = Customer::where('id',$bill->customer_id)->with('useraddress')->first();

       $data['customer'] = Customer::where('id',$bill->customer_id)->with('useraddress')->first();

       $data['bill'] = Billmeta::where('bill_id',$id)->with('getbilty')->with('getbiltymeta')->with('getbill')->get();
       

        if($data['bill'][0]->getbilty[0]->station_id!="")
            {
           $stationname = Stationdetail::where('id',$data['bill'][0]->getbilty[0]->station_id)->first();
           if($stationname!="")
           {
              $destination =  $stationname->station_name;
           }
           else{
            $destination = "-";
           }
            }
          if($data['bill'][0]->getbilty[0]=="")
          {
             $destination = $bill[0]->getbilty[0]->station_name;
          }

          $data['destination'] = $destination;
     
       
       if($customer->customer_name=="BOSCH PHARMA (PVT) LTD")
         

         {
         PDF::SetTitle('Bosch Billing Report');
        PDF::SetFont('freeserif', '', 12, '', true);
        PDF::AddPage();
        PDF::writeHTML(view('mehmoodgoodemployee/reports/bosch_pdf_report',$data)->render(),true, 0, true, 0);
        return PDF::Output('Bosch Report.pdf'); 
         }
         if($customer->customer_name=="DOLLAR INDUSTRIES (PVT) LTD")
         {
         PDF::SetTitle('DOLLAR Billing Report');
        PDF::SetFont('freeserif', '', 12, '', true);
        PDF::AddPage();
        PDF::writeHTML(view('mehmoodgoodemployee/reports/dollar_pdf_report',$data)->render(),true, 0, true, 0);
        return PDF::Output('DOLLAR Report.pdf'); 
         }

        if($customer->customer_name=="LINZ PHARMA")
         {
          PDF::SetTitle('LINZ PHARMA Billing Report');
          PDF::SetFont('freeserif', '', 12, '', true);
          PDF::AddPage();
          PDF::writeHTML(view('mehmoodgoodemployee/reports/linz_pdf_report',$data)->render(),true, 0, true, 0);
          return PDF::Output('LINZ Report.pdf'); 
         }
         if($customer->customer_name=="NAWAN LABS (PVT) LTD")
          {
          PDF::SetTitle('NAWAN Billing Report');
          PDF::SetFont('freeserif', '', 12, '', true);
          PDF::AddPage();
          PDF::writeHTML(view('mehmoodgoodemployee/reports/nawan_pdf_report',$data)->render(),true, 0, true, 0);
          return PDF::Output('NAWAN Report.pdf'); 
          }
          if($customer->customer_name=="PFIZER PAKISTAN LIMITED")
          {
          PDF::SetTitle('PFIZER Billing Report');
          PDF::SetFont('freeserif', '', 12, '', true);
          PDF::AddPage();
          PDF::writeHTML(view('mehmoodgoodemployee/reports/pfizer_pdf_report',$data)->render(),true, 0, true, 0);
          return PDF::Output('PFIZER Report.pdf'); 
          }
          if($customer->customer_name=="STHAL PAKISTAN (PVT) LTD")
          {
          PDF::SetTitle('STHAL Billing Report');
          PDF::SetFont('freeserif', '', 12, '', true);
          PDF::AddPage();
        //  if($data['bill']=="")
          PDF::writeHTML(view('mehmoodgoodemployee/reports/sthalnew_pdf_report',$data)->render(),true, 0, true, 0);
          return PDF::Output('STHAL Report.pdf'); 
          }
           if($customer->customer_name==" SEARLE PAKISTAN LTD")
          {
          PDF::SetTitle('SEARLE PAKISTAN LTD');
          PDF::SetFont('freeserif', '', 12, '', true);
          PDF::AddPage();
          PDF::writeHTML(view('mehmoodgoodemployee/reports/sthalnew_pdf_report',$data)->render(),true, 0, true, 0);
          return PDF::Output('STHAL Report.pdf'); 
          }
          if($customer->customer_name=="SEARLE PAKISTAN LTD")
          {
          //dd($data['bill'][0]['extra_weight']);
        
          PDF::SetTitle('SEARLE Billing Report');
          PDF::SetFont('freeserif', '', 12, '', true);
          PDF::AddPage();
          if($data['bill'][0]['type']=="extraweight")
          {
          PDF::writeHTML(view('mehmoodgoodemployee/reports/searle_pdf_report',$data)->render(),true, 0, true, 0);
           }
          if($data['bill'][0]['type']=="homedelivery")
          {
          PDF::writeHTML(view('mehmoodgoodemployee/reports/searleWeight_pdf_report',$data)->render(),true, 0, true, 0);
          }

          return PDF::Output('SEARLE Report.pdf'); 
          }

          if($customer->customer_name=="W.WOODWARD PAKISTAN")
          {
          PDF::SetTitle('W.WOODWARD PAKISTAN Billing Report');
          PDF::SetFont('freeserif', '', 12, '', true);
          PDF::AddPage();
          PDF::writeHTML(view('mehmoodgoodemployee/reports/pak_pdf_report',$data)->render(),true, 0, true, 0);
          return PDF::Output('W.WOODWARD PAKISTAN Report.pdf'); 
          }

      
       }



    public function deletebill(Request $req)
        {

        $id = $req->input('id');
        $challanmeta = Billmeta::where(['bill_id'=>$id])->delete();
        $challan = Bill::where(['id'=>$id])->delete();
        
         

         return back()->with('message',"Bill Deleted Successfully");
        }


    





     public function getbillingbiltytable(Request $req)

      {
       
        $dateto = $req->input('fromdate');
        $datefrom = $req->input('todate');
        $customer = $req->input('customer');
       
        if($dateto!="" &&  $datefrom!="")
        {
         $bilty = Biltys::whereBetween('date', [$datefrom, $dateto])->get();   
        }
        if($customer!=null)
        {
          
         $bilty = Biltys::doesnthave('getbillmeta')->where(['sender_id'=>$customer,'bilty_type'=>"Paid"])->get(); 

         $customer = Customer::where('id',$customer)->first();
         if($customer->customer_name=="SEARLE PAKISTAN LTD")   
         {
           $data[1] = "true";  
         }
         else{
           $data[1] = "false";  
         }

         } 
       
        $data[0] = $bilty;
       
       return $data;
      }

}
