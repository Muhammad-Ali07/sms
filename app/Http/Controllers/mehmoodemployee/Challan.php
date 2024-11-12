<?php

namespace App\Http\Controllers\mehmoodemployee;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Client;
use App\Deletetempbilty;
use Hash;
use mpdf\mpdf;
use Illuminate\Support\Facades\Facade;
use PDF;
use App\Tempbilty;
use DB;
use Session;
use App\User;
use App\Biltys;
use App\Biltymeta;
use App\Challans;
use App\Biltyadjust;
use App\Challanmetas;
use App\Bilty;
use App\VehicleSetup;
use App\VehiclePhone;
use App\Stationdetail;
use App\Challanmeta;
use App\CommissionBookMetas;
use App\dbmodel;
use View;
use Auth;

class Challan extends BaseController
{



    public function challanindex(){
        
        return view('mehmoodgoodemployee/challanindex');
    }

 
  public function challan()
    {
//		echo 'sample';die;       
       $vehicle = VehicleSetup::get();
       $station = Stationdetail::groupBy('station_name')->get();
       $mobilenumber = VehiclePhone::get();
       $challan = Challans::with('getchallanmeta')->get();
       Tempbilty::truncate();
       $generatedid = Challans::orderBy('id','desc')->first();
	   
       $biltytable = Biltys::doesntHave('getchallan')->where('walkin',0)->doesntHave('getbiltyadjust')->with('getsender')->with('getreceiver')->with('getbiltymeta')->with('getbiltyadjust')->get();
            
           
       /*  $biltyadjust = Biltys::whereHas('getchallan', function ($query) {
                $query->where('bilty_part','!=',"no");
                })->with('getsender')->with('getreceiver')->with('getbiltymeta')->has('getbiltyadjust')->with('getbiltyadjust')->get(); */
       $biltyadjust = Biltys::doesntHave('getchallan')->get();
       $walkinbiltytable = Biltys::where('walkin',1)->doesntHave('getchallan')->with('getbiltywalkinmeta')->get();
       
        
        //if record is not null
        if($generatedid!="")
        {
            $id= $generatedid->id+1;
        }
        //for first record
        else
        {
           $id = 1;  
        }     
       return view('mehmoodgoodemployee/challan/challan',compact('id','vehicle','station','challan','biltytable','walkinbiltytable','biltyadjust','mobilenumber')); 
      }


       public function challanreport()
       {
       $vehicle = VehicleSetup::get();
       $station = Stationdetail::get();
       $challan = Challans::with('getchallanmeta')->get();
       $generatedid = Challans::orderBy('id','desc')->first();
       $biltytable = Biltys::doesntHave('getchallan')->with('getsender')->with('getreceiver')->with('getbiltymeta')->get();


      
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
       return view('mehmoodgoodemployee/challan/challanreportform')->with(compact('id',$id,'vehicle',$vehicle,'station',$station,'challan',$challan,'biltytable',$biltytable));
      }

      //for generating report
        public function challanpdf(Request $req)
       {
          $from = $req->input('fromdate');
          $todate = $req->input('todate');
          $bilty = $req->input('bilty');
          $vehicle = $req->input('vehicle');

            
    // $bilty = Bilty::whereBetween('reservation_from', [$from, $to])->get();
         if($bilty=="all")
         {
        $bilty = Biltys::with('getsender')->with('getreceiver')->with('getbiltymeta');  
          if($vehicle!="")
        {
           $challans = Challans::where(['driver_id'=>$vehicle])->first();
           //if vehicle is selected in dropdown
           
           $bilty = Biltys::whereHas('getchallan', function ($query) use ($challans) {
            
                   
           $query->where('challan_id','=',  $challans->id);
             })
           ->with('getsender')->with('getreceiver')->with('getbiltymeta');
          
        }
      
         }
         if($bilty=="withoutchallan")
         {

        $bilty = Biltys::doesntHave('getchallan')->with('getsender')->with('getreceiver')->with('getbiltymeta');

         }
         //if with challan selected
          if($bilty=="withchallan")
         {
        $bilty = Biltys::has('getchallan')->with('getsender')->with('getreceiver')->with('getbiltymeta');
        if($vehicle!="")
        {
           $challans = Challans::where(['driver_id'=>$vehicle])->first();
           //if vehicle is selected in dropdown
           
           $bilty = Biltys::whereHas('getchallan', function ($query) use ($challans) {
            
                   
           $query->where('challan_id','=',  $challans->id);
             })
           ->with('getsender')->with('getreceiver')->with('getbiltymeta');
          
        }
      
        }
           
        if($from!=""&&$todate!="")
        {
        $from = date('Y-m-d',strtotime($req->input('fromdate')));
       $todate = date('Y-m-d',strtotime($req->input('todate')));
 
      //  $bilty->whereBetween('created_at', array($from, $todate));
    
        }  
        //$data['biltydata'] =  $bilty->get();
         //$data['count'] =  $bilty->count();

          //PDF::SetTitle('Challan');
          //PDF::SetFont('freeserif', '', 12, '', true);

          // for ($i=0; $i < $data['customer']->print_pages; $i++) { 
           // PDF::AddPage();
            //PDF::writeHTML(view('mehmoodgoodemployee/challan/challanreport',$data)->render());
          // }
          
          //return PDF::Output('Challan.pdf');
      }


      public function deletechallan(Request $req)
        {

        $id = $req->input('id');
       $challanmeta = Challanmetas::where(['challan_id'=>$id])->get();
        
        $cb = CommissionBookMetas::where(['challan_metaid'=>$id])->delete();

          
        $challan = Challans::where(['id'=>$id])->delete();
       
         return back()->with('message',"Challan Deleted Successfully");
        }
         public function deletetempchallan(Request $req)
        {
         $id = $req->input('id');
        $challanmeta = Tempbilty::where(['bilty_id'=>$id])->delete();
        return back()->with('message',"Bilty Remove Successfully");
        }

    public function getbiltytable(Request $req)

    {
         
      $from = $req->input('fromdate');
      $todate = $req->input('todate');
      $bilty = $req->input('bilty');

    // $bilty = Bilty::whereBetween('reservation_from', [$from, $to])->get();
      if($bilty=="all")
       {
       $bilty = Biltys::with('getsender')->with('getreceiver')->with('getbiltymeta');  
       
       }
       if($bilty=="withchallan")
       {

       $bilty = Biltys::has('getchallan')->with('getsender')->with('getreceiver')->with('getbiltymeta'); 

      // dd($bilty);
       }
       if($bilty=="withoutchallan")
       {

       $bilty = Biltys::doesntHave('getchallan')->with('getsender')->with('getreceiver')->with('getbiltymeta');

       }
        if($from!=""&&$todate!="")
      {
        $from = date('Y-m-d',strtotime($req->input('fromdate')));
       $todate = date('Y-m-d',strtotime($req->input('todate')));
        $bilty->whereBetween('created_at', [$from, $todate]);
        
      }
      $biltydata =  $bilty->get();
      
       return  $biltydata;
      }
         public function getdriverphone(Request $req)

      {

      $id = $req->input('id');
      
       $vehicle = VehiclePhone::where('vehicle_id',$id)->get(); 
       return $vehicle;
      }

       public function getdriverbrokername(Request $req)

      {

      $id = $req->input('id');
      
       $vehicle = VehicleSetup::where('id',$id)->first(); 
       return $vehicle->broker_name;
      }
     public function getchallanbalance(Request $req)

      {
        $balance=0;
        $id = $req->input('id');
         $part= $req->input('part');
        $totalquantity = $req->input('total_quantity');
       $challanmetas = Challanmetas::where('bilty_id',$id)->first();
      // dd($challanmetas);
       if($challanmetas==""){
        $tempold = Tempbilty::where('bilty_id',$id)->first();
        if($tempold!="")
        {
         // $tempold->delete();
        }
        else{
     /*   $temp = new Tempbilty;
        $temp->bilty_id = $id;
        $temp->total_quantity =  $totalquantity;
        $temp->part_bilty =  $part;
        $temp->save(); */
        }
        
       $bilty = Biltys::where('id',$id)->first(); 
       //foreach ($bilty as $key => $value) {
          if($bilty->bilty_type=="ToPay")
          {
          $balance+=   $bilty->total_charges;
          }
         # code...
       //}
       return  $balance;
        }
      }
       public function getchallantempbalance(Request $req)
      {
        $id = $req->input('id');
         $bilty = Biltys::where('id',$id)->first(); 
         $balance+=   $bilty->total_charges;
          return  $balance;
      }

      public function deleteentries(Request $req)

      {
        
        $challanid = $req->input('challanid');
        $biltyid = $req->input('biltyid');
        $deletebiltytable = new Deletetempbilty;
        $deletebiltytable->challan_id =  $challanid;
         $deletebiltytable->bilty_id =   $biltyid;
         $deletebiltytable->save();
        
       return  $deletebiltytable;
      }




       public function insertchallanquantity(Request $req)

      {
        $balance=0;
        $id = $req->input('id');
        $quantityenter = $req->input('quantityenter');
        $totalquantity = $req->input('totalquantity');
        $part= $req->input('part');
        
        $tempold = Tempbilty::where('bilty_id',$id)->first();
         //if enter quantity greater than it will clear entry
         if($quantityenter>$totalquantity || $quantityenter==0)
         {
           $tempold = Tempbilty::where('bilty_id',$id)->delete();
         }
         else{
           $tempold->quantity = $quantityenter;
           $tempold->total_quantity=  $totalquantity;
           $tempold->part_bilty = $part;

           $tempold->save();
         }
        
      }

      public function insert(Request $req)
     {
      
        $date = date('Y-m-d',strtotime($req->input('date')));
        $Validation = $req->validate([
              'challan_number' => 'required',
               'date' => 'required',
               'driver_id' => 'required',
               'loader_name' => 'required',
               'dispatch_time' => 'required',
               'station_id' => 'required',
               'truck_num' => 'required',
               'mobile_num' => 'required',
               'malik_bro' => 'required',
               'delivery' => 'required',
               'other_charges' => 'required',
               'next_rent' => 'required',
                'total_amount' => 'required',
              
           ]);
          
           
          $generatedid = Challans::orderBy('id','desc')->first();
           if($generatedid!="")
           {
            $id= $generatedid->id+1;
           }
       
           else
           {
           $id = 1;
          }    
        
          $challan = new Challans;
          $challan->id =  $id;
         $challan->driver_id = $req->input('driver_id');
         $challan->date = $date;
         $challan->loader_name = $req->input('loader_name');
         $challan->dispatch_time = $req->input('dispatch_time');
         $challan->station_id = $req->input('station_id');
         $challan->mobile_number = $req->input('mobile_num');
         $challan->broker_name = $req->input('malik_bro');
         $challan->cont_number = $req->input('container_num');
         $challan->cont_seal = $req->input('container_seal');
         $challan->delivery_commission = $req->input('delivery');
         $challan->other_charges = $req->input('other_charges');
         $challan->next_rent = $req->input('next_rent');
         $challan->total_amount = $req->input('total_amount');
       //  dd($_POST);
         $challan->save();
         
         $bilty = $req->input('bilty_id');
         $part = $req->input('part_bilty');
        
              
             $tempbilty = Tempbilty::get();

             foreach($tempbilty as $key => $value)
             {
               $challanmeta = new Challanmetas;
               $challanmeta->bilty_id =  $value->bilty_id;
               $challanmeta->challan_id = $challan->id;
               $challanmeta->save();
              }

          Tempbilty::truncate(); 
          if(!empty($req->savenprint)){
            // $this->pdf($bilty->id);
            return back()->with(['message'=>"Challan Added Successfull","print"=>$challan->id]);
          }
          else{
            return back()->with('message',"Challan Added Successfully");
          }
       
    }

        public function view($id)
         {
       $vehicle = VehicleSetup::get();
       $station = Stationdetail::get();
       $challan = Challans::with('getchallanmeta')->where('id',$id)->get();
       $challanmeta = Challanmetas::with('getbiltydata')->with('getbiltymetadata')->where('challan_id',$id)->get();


       
       return view('mehmoodgoodemployee/challan/challanview')->with(compact('id','vehicle','station','challan','challanmeta'));
  
        }
         public function edit($id)
         {
        $find_challan = Challans::findOrFail($id);
        
        $vehicle = VehicleSetup::get();
        $vehiclephone = VehiclePhone::where('vehicle_id', $find_challan->driver_id)->get();
        // dd($vehicle);
       $station = Stationdetail::groupBy('station_name')->get();
       $challan = Challans::with('getchallanmeta')->where('id',$id)->first();
      $challanmeta = Challanmetas::with('getbiltydata')->with('getbiltymetadata')->where('challan_id',$id)->get();

       $chargesandrent = $challan->other_charges+$challan->next_rent;
       $comission = $challan->delivery_commission;
       $total = $challan->total_amount-$chargesandrent;
       $calculate = ($challan->total_amount*$comission)/100;
      
     
       $totalamount =  round($total+$calculate);
     
        Tempbilty::truncate();
        Deletetempbilty::truncate();
       
       $biltytable = Biltys::where('walkin',0)->doesntHave('getbiltyadjust')->with('getsender')->with('getreceiver')->with('getbiltymeta')->with('getbiltyadjust')->get();
            
       $existingBiltys = Biltys::whereHas('getchallan', function ($query) use ($id) {
                $query->where('challan_id',$id);
                })->with('getsender')->with('getreceiver')->with('getbiltymeta')->has('getbiltyadjust')->with('getbiltyadjust')->with('getsinglechallan')->get();
          $model = Challanmetas::where('challan_id',$id);    
       
         
         $biltyadjust = Biltys::whereHas('getchallan', function ($query) use ($id) {
                $query->where('bilty_part','!=',"no")->where('challan_id','!=',$id);
                })->with('getsender')->with('getreceiver')->with('getbiltymeta')->has('getbiltyadjust')->with('getbiltyadjust')->get();
      
        
       
       //$walkinbiltytable = Biltys::where('walkin',1)->doesntHave('getchallan')->with('getbiltywalkinmeta', 'totalamount')->get();
       $walkinbiltytable = Biltys::where('walkin',1)->doesntHave('getchallan')->with('getbiltywalkinmeta')->get();
       

       
       
       return view('mehmoodgoodemployee/challan/challanedit')->with(compact('id','vehicle','vehiclephone','station','challan','biltytable','walkinbiltytable','biltyadjust', 'existingBiltys', 'totalamount','id'))->withModel($model);
        }

         public function update(Request $req)

         {
        $pkid = $req->input('challan_number'); 
        $date = date('Y-m-d',strtotime($req->input('date')));
         $tempbilty = Tempbilty::get();
        
         //new code
         $date = date('Y-m-d',strtotime($req->input('date')));
        $Validation = $req->validate([
              'challan_number' => 'required',
               'date' => 'required',
               'driver_id' => 'required',
               'loader_name' => 'required',
               'dispatch_time' => 'required',
               'station_id' => 'required',
               'truck_num' => 'required',
               'mobile_num' => 'required',
               'malik_bro' => 'required',
               'container_num' => 'required',
               'container_seal' => 'required',
               'delivery' => 'required',
               'other_charges' => 'required',
               'next_rent' => 'required',
                'total_amount' => 'required',
              
           ]);
        //  dd($_POST);
           
          $generatedid = Challans::orderBy('id','desc')->first();
           if($generatedid!="")
           {
            $id= $generatedid->id+1;
           }
       
           else
           {
           $id = 1;
          }    
         
          $challan =  Challans::where(['id'=>$pkid])->first();
         
         $challan->driver_id = $req->input('driver_id');
         $challan->date = $date;
         $challan->loader_name = $req->input('loader_name');
         $challan->dispatch_time = $req->input('dispatch_time');
         $challan->station_id = $req->input('station_id');
         $challan->mobile_number = $req->input('mobile_num');
         $challan->broker_name = $req->input('malik_bro');
         $challan->cont_number = $req->input('container_num');
         $challan->cont_seal = $req->input('container_seal');
         $challan->delivery_commission = $req->input('delivery');
         $challan->other_charges = $req->input('other_charges');
         $challan->next_rent = $req->input('next_rent');
         $challan->total_amount = $req->input('total_amount');
        // dd($challan);
         $challan->save();
         $bilty = $req->input('bilty_id');
         $part = $req->input('part_bilty');
        

          
           //Get entries from delete table this consist all those entries which are uncheck

            $deleteentriestable = Deletetempbilty::get();
            //run loop on all those entries for adjustments
            foreach ($deleteentriestable as $key => $value) {
            $challanmetadata = Challanmetas::where(['challan_id'=>$value->challan_id,'bilty_id'=>$value->bilty_id])->first();
           
            $biltyadjust = Biltyadjust::where('bilty_id',$value->bilty_id)->first();
           //  $challanmetadelete = $challanmetadata->delete();
            if($biltyadjust->total_quantity==0)
            {
              $challanmetadatamultiple = Challanmetas::where(['bilty_id'=>$value->bilty_id])->latest()->get();
              $total = 0;
              foreach ($challanmetadatamultiple as $key => $value) {

                 
                 $total = $value->bilty_quantity;
              }
                $biltyadjust->total_quantity =  $total;
              //  $challanmetadata->delete();
            }
            else{
            $biltyadjust->total_quantity = $biltyadjust->total_quantity+$challanmetadata->bilty_quantity;
           // $challanmetadata->delete();
               }
               $challanmetadataall = Challanmetas::where(['challan_id'=>$value->challan_id,'bilty_id'=>$value->bilty_id])->delete();
             $biltyadjust->save(); 
           
            }
              // $challanmetadataall = Challanmetas::where(['challan_id'=>$value->challan_id,'bilty_id'=>$value->bilty_id])->delete();
               $tempbilty = Tempbilty::get();
             foreach($tempbilty as $key => $value)
             {
              
              $challanmeta = new Challanmetas;
              $challanmeta->bilty_id =  $value->bilty_id;
              if($value->part_bilty=="no")
              {
              $challanmeta->bilty_quantity =   $value->total_quantity;
              }
              else
              {
              $challanmeta->bilty_quantity =   $value->quantity;
               }            
              $challanmeta->bilty_part =  $value->part_bilty;
      
            //  $challanmeta->totalbilty_quantity =  $quantityoriginal;
              $challanmeta->challan_id = $challan->id;
              
               $challanmeta->save();
            //    dd($challanmeta);
              }
     


         $quantityenter = Tempbilty::get();
          // dd($quantityenter);
         foreach ($quantityenter as $key => $value) {
           # code...

         $adjusted = Biltyadjust::where('bilty_id',$value->bilty_id)->first();
         if( $adjusted!="")
         {
         
           $adjusted->bilty_id =   $adjusted->bilty_id;
              
        if($value->quantity==0)
         {
          $adjusted->enter_quantity = $value->quantity;
          $adjusted->total_quantity =  $value->quantity;
         }
         else{  
         $adjusted->enter_quantity = $value->quantity;
         $adjusted->total_quantity =  $value->total_quantity-$value->quantity;
         } 
         $adjusted->update();
         }     
         else{
         $adjusted = new Biltyadjust;
         $adjusted->bilty_id =  $value->bilty_id;
         if($value->quantity==0)
         {
          $adjusted->enter_quantity = $value->quantity;
          $adjusted->total_quantity =  $value->quantity;
         }
         else{  
         $adjusted->enter_quantity = $value->quantity;
         $adjusted->total_quantity =  $value->total_quantity-$value->quantity;
         } 
       
         $adjusted->save();
       }
        
          }
            Deletetempbilty::truncate();
            Tempbilty::truncate();
            return back()->with('message',"Challan Added Successfully");



         }


         public function delete($id)
         {
      
         $challan = Challans::where(['id'=>$id])->delete();
         $challanmeta = Challanmeta::where(['challan_id'=>$id])->delete();

         return back()->with('message',"Challan Deleted Successfully");
        }

        public function pdf($id)
        {
        
          $data['vehicle'] = VehicleSetup::get();
         $data['station'] = Stationdetail::get();
         $data['challan'] = Challans::with('getchallanmeta')->with('getvehicle','mobilenum')->with('getstation')->where('id',$id)->get();

         $data['challanmeta'] = Challanmetas::with('getbiltydata')->with('getbiltymetadata')->where('challan_id',$id)->get();      
         
          PDF::SetTitle('Challan');
          PDF::SetFont('freeserif', '', 12, '', true);

          // for ($i=0; $i < $data['customer']->print_pages; $i++) { 
            PDF::AddPage();
            PDF::writeHTML(view('mehmoodgoodemployee/challan/challanpdf',$data)->render());
          // }
          
          //return PDF::Output('Challan.pdf');
        return view('mehmoodgoodemployee.bilty.biltypdf',$data);
        }


   //for ajax url
   public function gettruckinfo(Request $req)
   {
      $data = VehicleSetup::where('id',$req->id)->with('vehicle_phoneno')->first();
      return $data;
 
   }  

   public function savetemptable(Request $req)
    {
      $biltycheck = Bilty::where('id',$req->id)->first();

      if($biltycheck!="")
      {
        $tempbilty =  new Tempbilty;
        $tempbilty->bilty_id =  $biltycheck->id;
        $tempbilty->save();
      }
        return "saved";

    }    

}
