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
use App\BrokerBalance;
use App\Biltys;
use App\Biltymeta;
use App\Challans;
use App\Challanmetas;
use App\Bilty;
use App\VehicleSetup;
use App\VehiclePhone;
use App\Stationdetail;
use App\Challanmeta;
use App\CommissionBookMetas;
use App\CommissionBook;
use App\CommissionBookTemp;
use App\dbmodel;
use View;
use Auth;

class CB extends BaseController
{



    public function cbindex(){
        
        return view('mehmoodgoodemployee/cbindex');
    }

 
    public function cb()
    {
       $vehicle = VehicleSetup::get();
       $commissionbook = CommissionBook::with('getcommissionbookmetas')->get();
       $generatedid = CommissionBook::orderBy('id','desc')->first();
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
       return view('mehmoodgoodemployee/challan/cb')->with(compact('id',$id,'vehicle',$vehicle,'commissionbook',$commissionbook));
      }


       public function challanreport()
    {
       $vehicle = VehicleSetup::get();
       $station = Stationdetail::get();
       $challan = Challans::with('getchallanmeta')->get();
       $generatedid = Challans::orderBy('id','desc')->first();
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
       return view('mehmoodgoodemployee/challan/challanreport')->with(compact('id',$id,'vehicle',$vehicle,'station',$station,'challan',$challan));
      }

      public function deletechallan(Request $req)
        {

        $id = $req->input('id');
        $challan = Challans::where(['id'=>$id])->delete();
        $challanmeta = Challanmetas::where(['challan_id'=>$id])->delete();
         

         return back()->with('message',"Challan Deleted Successfully");
        }


     public function getchallancbbalance(Request $req)

      {
        // dd($req['id']);
        $balance=0;
        // $id = $req->input('id');
        if($req['id'] == null){
          $balance = 0;
        }
        else{
          $bilty = Challans::whereIn('id',$req['id'])->get(); 
          foreach ($bilty as $key => $value) {
            $balance+=$value->total_amount;
           # code...
          }
        }
       return  $balance;
      }
       public function getchallancbweight(Request $req){
        $balance=0;
      
        // dd($req['id']);
        // $id = $req->input('id');
        if($req['id'] == null){
          $balance = 0;
        }
        else{

          $challan = Challans::whereIn('id',$req['id'])->with('getchallanmeta')->get(); 
          
          foreach ($challan as $key => $value) {

            foreach ($value->getchallanmeta as $keys => $values) {
               $biltymeta = Biltymeta::where('bilty_id',$values->bilty_id)->first();
               // dd($biltymeta);
                if($biltymeta!="")
                {
                if($biltymeta->weight!=1)
                {  
                $balance+= $biltymeta->weight;
                }
                }
            }
             
             # code...
           }
        }

       return $balance;
      }
    
    public function getcbchallantable(Request $req)

    {

      
      $truck_num = $req->input('truck_num');

    // $bilty = Bilty::whereBetween('reservation_from', [$from, $to])->get();
      if($truck_num=="all")
       {
       $challan = Challans::doesnthave('getbookmetas')->get();
       }
       else{
           $challan = Challans::doesnthave('getbookmetas')->where('driver_id',$truck_num)->get();
       }

       
     
     
      
       return   $challan;
      }
      //for update cb blade
       public function updategetcbchallantable(Request $req)

      {

      
      $truck_num = $req->input('truck_num');
      $id = $req->input('id');
       
    // $bilty = Bilty::whereBetween('reservation_from', [$from, $to])->get();
      if($truck_num=="all")
       {
        $data[0] = Challans::with(array('getbookmetas'=>function($query)use($id){
             $query->where('commissionbook_id','!=',$id);
             }))->get();
       }
       else{
          /* $challan = Challans::where('driver_id',$truck_num)
            ->whereHas('getbookmetas', function($query)use($id)  {
           $query->where('commissionbook_id','!=',$id);
             })->get(); */
           $data[0] =  Challans::where('driver_id',$truck_num)->with(array('getbookmetas'=>function($query)use($id){
             $query->where('commissionbook_id','!=',$id);
             }))->doesnthave('getbookmetas')->get();

            $data[1] =  Challans::where('driver_id',$truck_num)->whereHas('getbookmetas', function ($query) use ($id) 
            {
            
                   
               $query->where('commissionbook_id','=',$id);
             })->with('getbookmetas')->get();
           
           
       }

     
     
     
      
       return $data;
      }
       public function cbpdf($id)
        {
        
         $data['cb'] = CommissionBook::with('getcommissionbookmetas')->with('getvehicledata')->where('id',$id)->get();
         
         $data['vehicle'] = VehicleSetup::get();
         $data['station'] = Stationdetail::get();
         $data['challan'] = Challans::with('getchallanmeta')->with('getvehicle')->with('getstation')->where('id',$id)->get();
         $data['challanmeta'] = Challanmetas::with('getbiltydata')->with('getbiltymetadata')->where('challan_id',$id)->get();      
         
          PDF::SetTitle('Challan');
          PDF::SetFont('freeserif', '', 12, '', true);

          // for ($i=0; $i < $data['customer']->print_pages; $i++) { 
            PDF::AddPage();
            PDF::writeHTML(view('mehmoodgoodemployee/challan/cbreport',$data)->render());
          // }
          
          return PDF::Output('Challan.pdf');
        // return view('mehmoodgoodemployee.bilty.biltypdf',$data);
        }

      public function insert(Request $req)

      {

        $date = date('Y-m-d',strtotime($req->input('date')));
        $Validation = $req->validate([
               'cb_number' => 'required',
               'date' => 'required',
               'truck_num' => 'required',
               'totalreceiving' => 'required',
               
               
             
               'total_weight' => 'required',
              
           ]);
           

          //FOR SAVING IN CHALLAN
         $commission = new CommissionBook;

         $commission->cb_number = $req->input('cb_number');
         $commission->date = $date;
         $commission->vehicle_id = $req->input('truck_num');
         $commission->fixrent = $req->input('fixrent');
         $commission->totalreceiving = $req->input('totalreceiving');
         $commission->cash_receiving = $req->input('cash_receiving');
         $commission->commission = 0;
         $commission->remaining_commission = $req->input('remaining_commission');
         $commission->total_weight = $req->input('total_weight');
        //dd($commission);
         $commission->save();

         //for maintaining broker balance
         $brokerexist = BrokerBalance::where('vehicle_id',$req->input('truck_num'))->first();
         if($brokerexist!=""){
               if($req->input('cash_receiving')!="")
               {
                $brokerexist->increment('receivable',$req->input('cash_receiving'));
               }
               else
               {
                $brokerexist->increment('payable',$req->input('remaining_commission'));
               }
               
         }
         else{
               $brokerbalance = New BrokerBalance;
               $brokerbalance->vehicle_id =  $req->input('truck_num');
               if($req->input('cash_receiving')!="")
               {
                $brokerbalance->payable =  0;
                $brokerbalance->receivable =  $req->input('cash_receiving');
               }
               else{
                $brokerbalance->payable =   $req->input('remaining_commission');
                $brokerbalance->receivable =  0;
               }
                $brokerbalance->save();
              }
         // dd($commission);
         $challan_id = $req->input('challan_id');
         
         $description = $req->input('description');

         //FOR SAVING IN META
          
        if(isset($challan_id[0])){

             foreach($challan_id as $key => $value)
             {
            // dd($commission->id);
              $commissionbookmetas = new CommissionBookMetas;
              $commissionbookmetas->challan_metaid =  $value;
              $commissionbookmetas->description = $description[$key];
              $commissionbookmetas->commissionbook_id = $commission->id;
             // dd($commissionbookmetas);
              $commissionbookmetas->save();

              }
            }

        // if(!isset($challan_id[0])){
        //     $commission = CommissionBook::where(['id'=>$commissionbookmetas->id])->delete();
        //      return back()->with('error',"No Challans selected");
        // }


          
        return back()->with('message',"CommissionBook Added Successfull");
    }

        public function viewcb($id)
         {
    
       $commission = CommissionBook::where('id',$id)->get();
       $commissionmetas = CommissionBookMetas::with('getchallanmetas')->where('commissionbook_id',$id)->get();

        $vehicle = VehicleSetup::get();
       $commissionbook = CommissionBook::with('getcommissionbookmetas')->get();
       $generatedid = CommissionBook::orderBy('id','desc')->first();
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


       
        return view('mehmoodgoodemployee/challan/cbview')->with(compact('id',$id,'vehicle',$vehicle,'commissionbook',$commissionbook,'commission',$commission,'commissionmetas', $commissionmetas));
  
        }

        public function editcb($id)
         {
    
       $commission = CommissionBook::where('id',$id)->get();
       $commissionmetas = CommissionBookMetas::with('getchallanmetas')->where('commissionbook_id',$id)->get();

        $vehicle = VehicleSetup::get();

       $commissionbook = CommissionBook::with('getcommissionbookmetas')->get();
       $generatedid = CommissionBook::orderBy('id','desc')->first();
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


       
        return view('mehmoodgoodemployee/challan/cbupdate')->with(compact('id',$id,'vehicle',$vehicle,'commissionbook',$commissionbook,'commission',$commission,'commissionmetas', $commissionmetas));
  
        }


         public function edit($id)
         {
      
        $vehicle = VehicleSetup::get();
       $station = Stationdetail::get();
       $challan = Challans::with('getchallanmeta')->where('id',$id)->get();
       $challanmeta = Challanmetas::with('getbiltydata')->with('getbiltymetadata')->where('challan_id',$id)->get();


       
       return view('mehmoodgoodemployee/challan/challanedit')->with(compact('id',$id,'vehicle',$vehicle,'station',$station,'challan',$challan,'challanmeta',$challanmeta));
        }

         public function update(Request $req)

         {
       
        $pkid = $req->input('cb_number'); 
        $date = date('Y-m-d',strtotime($req->input('date')));
        $Validation = $req->validate([
               'cb_number' => 'required',
               'date' => 'required',
               'truck_num' => 'required',
               'totalreceiving' => 'required',
               'cash_receiving' => 'required',
               'commission' => 'required',
               'remaining_commission' => 'required',
               'total_weight' => 'required',
              
           ]);
           

          //FOR SAVING IN CHALLAN
         $commission =  CommissionBook::where(['id'=>$pkid])->first();

         $commission->cb_number = $req->input('cb_number');
         $commission->date = $date;
         $commission->vehicle_id = $req->input('truck_num');
         $commission->fixrent = $req->input('fixrent');
         $commission->totalreceiving = $req->input('totalreceiving');
         $commission->cash_receiving = $req->input('cash_receiving');
         $commission->commission = $req->input('commission');
         $commission->remaining_commission = $req->input('remaining_commission');
         $commission->total_weight = $req->input('total_weight');
        //dd($commission);
         $commission->update();
         // dd($commission);
         $challan_id = $req->input('challan_id');
         
         $description = $req->input('description');
          
         //FOR SAVING IN META
         $challanmeta = CommissionBookMetas::where(['commissionbook_id'=>$pkid])->delete(); 
        if(isset($challan_id[0])){

            
             foreach($challan_id as $key => $value)
             {
            // dd($commission->id);
              $commissionbookmetas = new CommissionBookMetas;
              $commissionbookmetas->challan_metaid =  $value;
              $commissionbookmetas->description = $description[$key];
              $commissionbookmetas->commissionbook_id = $pkid;
             // dd($commissionbookmetas);
              $commissionbookmetas->save();

              }
            }

        // if(!isset($challan_id[0])){
        //     $commission = CommissionBook::where(['id'=>$commissionbookmetas->id])->delete();
        //      return back()->with('error',"No Challans selected");
        // }


          
        return back()->with('message',"CommissionBook Updated Successfull");
         }


         public function delete($id)
         {
      
         $challan = Challans::where(['id'=>$id])->delete();
         $challanmeta = Challanmeta::where(['challan_id'=>$id])->delete();

         return back()->with('message',"Challan Deleted Successfully");
        }

         public function deletecb(Request $req)
        {

        $id = $req->input('id');
       
        $challanmeta = CommissionBook::where(['id'=>$id])->delete();
        return $id;
          
        }

        public function pdf($id)
        {
        
          $data['vehicle'] = VehicleSetup::get();
         $data['station'] = Stationdetail::get();
         $data['challan'] = Challans::with('getchallanmeta')->with('getvehicle')->with('getstation')->where('id',$id)->get();
         $data['challanmeta'] = Challanmetas::with('getbiltydata')->with('getbiltymetadata')->where('challan_id',$id)->get();      
         
          PDF::SetTitle('Challan');
          PDF::SetFont('freeserif', '', 12, '', true);

          // for ($i=0; $i < $data['customer']->print_pages; $i++) { 
            PDF::AddPage();
            PDF::writeHTML(view('mehmoodgoodemployee/challan/challanreport',$data)->render());
          // }
          
          return PDF::Output('Challan.pdf');
        // return view('mehmoodgoodemployee.bilty.biltypdf',$data);
        }

}
