<?php

namespace App\Http\Controllers\mehmoodemployee;
error_reporting(E_ALL);
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Client;
use App\PartBiltymeta;
use Hash;
use mpdf\mpdf;
use Illuminate\Support\Facades\Facade;
use PDF;
use DB;
use Session;
use App\User;

use App\WalkinBiltymeta;
use App\Biltys;
use App\PartBilty;
use App\Biltymeta;
use App\Ratelist;
use App\RatelistValue;
use App\Customer;
use App\CustomerPhoneno;
use App\Stations;
use App\PackageMetaDescription;
use App\Stationdetail;
use App\dbmodel;
use App\Package;
use App\Packmetas;
use View;
use Auth;

class Bilty extends BaseController
{

    public function getPackageDesc($name){
      //return $name;
     // $Packmetas = Packmetas::where(['package_name'=>$name])->get();
      //description
     // dd($name);
      $Packmetas = PackageMetaDescription::where(['package_id'=>$name])->get();
      return $Packmetas;
      //return $Packmetas;
    }
    public function getPackageDescription(Request $request){
      //return $name;
      $Packmetas = PackageMetaDescription::where(['package_id'=>$request->id])->get();
      //description
      return $Packmetas;
      //return $Packmetas;
    }
 
    public function setupindex(){

        return View('mehmoodgoodemployee/bilty');
    }

    public function topay()
     {

        $bilty = Biltys::with('getbiltymeta')->with('getsender')
                  ->with('getreceiver')->get();
       
        $receiver = Customer::with('phoneno')->get();
       
        $sender = Customer::with('phoneno')->with('userpackage')->with('userstation')->get();
         $receivermanual = Customer::whereNotNull('customer_name_urdu')->with('phoneno')->get();   
        $sendermanual = Customer::whereNotNull('customer_name_urdu')->with('phoneno')->with('userpackage')->with('userstation')->get();
        $station =  Stationdetail::get();
        $packagemetas =  Packmetas::get();
        $generatedid = Biltys::orderBy('id','desc')->first();
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
        $generatedbilty = Biltys::orderBy('bilty_no','desc')->first();
        
        //if record is not null
        if($generatedbilty!="")
        {
            // $biltyno = $generatedbilty->id+1;
            $biltyno = $generatedbilty->bilty_no+1;
        }
        //for first record
        else
        {
           $biltyno = 0;
        }
       
        
     // $bilty = Biltys::get();
        
        return view('mehmoodgoodemployee/bilty/topay')->with(compact('receiver',$receiver,'sender',$sender,'id',$id,'bilty',$bilty,'station',$station,'biltyno',$biltyno,'packagemetas',$packagemetas,'sendermanual',$sendermanual,'receivermanual',$receivermanual));
     }


     public function partbilty()
     {
         
        $bilty = Biltys::where(['bilty_type'=>"partbilty"])->with('getbiltymeta')->with('getsender')
                  ->with('getreceiver')->get();
       
        $receiver = Customer::with('phoneno')->get();
        $biltynumber = Biltys::where('bilty_type', '!=',"partbilty")->get();
        $phoneno = CustomerPhoneno::get();
        
        /*$sender = Customer::with('phoneno')->with('userpackage')->with('userstation')->where(['customer_type'=>"ToPay"])->get();*/  /*old limited sender*/
        $sender = Customer::with('phoneno')->get();

        $station =  Stationdetail::get();
        $packagemetas =  Packmetas::get();
        $generatedid = Biltys::orderBy('id','desc')->first();
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
        $generatedbilty = Biltys::orderBy('bilty_no','desc')->first();
        
        //if record is not null
        if($generatedbilty!="")
        {
            // $biltyno = $generatedbilty->id+1;
            $biltyno = $generatedbilty->bilty_no+1;
        }
        //for first record
        else
        {
           $biltyno = 0;
        }
       
        
     // $bilty = Biltys::get();
        
        return view('mehmoodgoodemployee/bilty/partbilty')->with(compact('receiver',$receiver,'sender',$sender,'id',$id,'bilty',$bilty,'station',$station,'biltyno',$biltyno,'packagemetas',$packagemetas,'biltynumber',$biltynumber,'phoneno',$phoneno));
     }
     public function getbiltytabledata(Request $request)
     {

        $data[0] = Biltys::with('getsender','getreceiver','getstation','getbiltymeta.getpackagedata')->where('id',$request->input('id'))->first();
         $data['quantity'] = [];
           foreach ($data[0]->getbiltymeta as $keys => $values) {
            $quantity = $values->quantity;
            $weight  = $values->weight;
            $partbilty = PartBiltymeta::where('bilty_meta_id',$values->id)->get();
              foreach ($partbilty as $key => $value) {
                $quantity -= $value->quantity;
                $weight -= $value->weight;
                if($weight==0)
                {
                   $weight = $value->weight; 
                }
             # code...
           }
             $data['quantity'][$keys] =  $quantity;
             $data['weight'][$keys] =  $weight;  
         }
       
        
        return $data;
     }

      

       public function viewtopay($id)
       {
        $bilty = Biltys::with('getbiltymeta')->with('getsender')
                  ->with('getreceiver')->with('stationdetail')->with('getreceiverphone')->with('getreceiverphone')->with('getsenderphone')->where('id',$id)->first();
        $biltymeta = Biltymeta::with('getpackagedata')->where('bilty_id',$id)->get(); 
       
        $receiver = Customer::with('phoneno')->where('customer_type',"ToPay")->get();
        $sender = Customer::with('phoneno')->with('userpackage')->with('userstation')->where('customer_type', "ToPay")->get();   
        $station =  Stationdetail::get();
        $generatedid = Biltys::orderBy('id','desc')->first();
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

         return view('mehmoodgoodemployee/bilty/viewtopay')->with(compact('receiver',$receiver,'sender',$sender,'bilty',$bilty,'station',$station,'biltymeta',$biltymeta));
        }
        
         public function edittopay($id){
      
        $bilty = Biltys::with('getbiltymeta')->with('getsender')
                  ->with('getreceiver')->with('stationdetail')->with('getreceiverphone')->with('getreceiverphone')->with('getsenderphone')->where('id',$id)->first();
       $biltymeta = Biltymeta::with('getpackagedata')->where('bilty_id',$id)->get(); 
       $walkinbiltymeta = WalkinBiltymeta::with('getpackagedata')->where('bilty_id',$id)->get(); 
      
       
        $sender = Customer::with('phoneno')->get();
        // dd($sender); 
        //if sender is not enter manually
        if($bilty->sender_id!=0){   
        $station =  Stations::all();
        $packages =  Package::with('packages_metas')->get();
        }
        //if sender is enter manually
        if($bilty->sender_id==0){ 
        $station =  Stations::all();
        $packages =  Package::with('packages_metas')->get();
        }
       
        $generatedid = Biltys::orderBy('id','desc')->first();
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

         return view('mehmoodgoodemployee/bilty/edittopay')->with(compact('sender',$sender,'bilty',$bilty,'station',$station,'biltymeta',$biltymeta,'packages',$packages, 'walkinbiltymeta'));
        }
        public function BiltyRateList($cid,$sid,$pid)
         {
      // $balance = SELECT rlv.* FROM `ratelist` rl inner join ratelist_values rlv on rlv.ratelist_id = rl.id where rl.customer_id = 53 AND rl.stationdetail_id = 14 AND rlv.package_id =10

      // ->where('ratelist.customer_id',$cid)->where('ratelist.stationdetail_id',$sid)->where('ratelist.id',$pid)
      $balance = DB::table('ratelist')->join('ratelist_values', 'ratelist_values.ratelist_id', '=', 'ratelist.id')->join('packages_metas', 'ratelist_values.package_id', '=', 'packages_metas.id')->where('ratelist.customer_id',$cid)->where('ratelist.stationdetail_id',$sid)->where('ratelist_values.package_id',$pid)->first();
     // dd($cid,$sid,$pid);
         // dd($balances);
       return response()->json($balance);
      }

        public function deletebilty(Request $req)
        {

        $id = $req->input('id');
        $bilty = Biltys::where(['id'=>$id])->delete();
         

         return back()->with('message',"Bilty Deleted Successfully");
        }
       public function pdf($id)
     {
      
       $data['bilty'] = Biltys::with('getbiltymeta')->with('getsender')
        ->with('getreceiver')->with('getsenderphone')->with('getreceiverphone')->with('getbiltymeta')->where('id',$id)->get();
       $data['customer'] = Customer::where('id', $data['bilty'][0]->sender_id)->first(); 
         if ($data['bilty'][0]->walkin == 1) {
        $data['biltymeta'] = WalkinBiltymeta::where('bilty_id',$id)->get(); 
          } else {
       $data['biltymeta'] = Biltymeta::where('bilty_id',$id)->get(); 
         }

       //PDF::SetTitle('Bilty');
       //PDF::SetFont('freeserif', '', 12, '', true);
     
       if($data['bilty'][0]->bilty_type=="Paid")
       {
      $printCount = !empty($data['customer']->print_pages)?$data['customer']->print_pages:1;

       for ($i=0; $i < $printCount; $i++) { 
        $data['page'] = $i;
       // PDF::AddPage();
     // PDF::writeHTML(view('mehmoodgoodemployee/bilty/biltypaidpdf',$data)->render(),true, 0, true, 0);
           }

        //return PDF::Output('Bilty Report.pdf');
      }
      if($data['bilty'][0]->bilty_type=="advance")
       {
      $printCount = !empty($data['customer']->print_pages)?$data['customer']->print_pages:1;

       for ($i=0; $i < $printCount; $i++) {
        $data['page'] = $i; 
        //PDF::AddPage();
      //PDF::writeHTML(view('mehmoodgoodemployee/bilty/advancepdf',$data)->render(),true, 0, true, 0);
           }

        //return PDF::Output('Bilty Report.pdf');
      }
      else{
         $printCount = !empty($data['customer']->print_pages)?$data['customer']->print_pages:1;

       for ($i=0; $i < $printCount; $i++) {
        $data['page'] = $i;
       // PDF::AddPage();
      //PDF::writeHTML(view('mehmoodgoodemployee/bilty/biltypdf',$data)->render(),true, 0, true, 0);
           }

       // return PDF::Output('Bilty Report.pdf');
      }
return view('mehmoodgoodemployee.bilty.biltypdf',$data);
}

        public function paidpdf($id)
        {
      
          $data['bilty'] = Biltys::with('getbiltymeta')->with('getsender')
                    ->with('getreceiver')->with('getsenderphone')->with('getreceiverphone')->with('getbiltymeta')->where('id',$id)->get();
           $data['customer'] = Customer::where('id', $data['bilty'][0]->sender_id)->first();   
         
          $data['biltymeta'] = Biltymeta::where('bilty_id',$id)->get();        
         
          PDF::SetTitle('Bilty');
          PDF::SetFont('freeserif', '', 12, '', true);
          
          $printCount = !empty($data['customer']->print_pages)?$data['customer']->print_pages:1;

          for ($i=0; $i < $printCount; $i++) { 
            $data['page'] = $i;
            PDF::AddPage();
            PDF::writeHTML(view('mehmoodgoodemployee/bilty/biltypaidpdf',$data)->render(),true, 0, true, 0);
          }
          
          return PDF::Output('Bilty Report.pdf');
        // return view('mehmoodgoodemployee.bilty.biltypdf',$data);
        }

         public function advancepdf($id)
        {
      
          $data['bilty'] = Biltys::with('getbiltymeta')->with('getsender')
                    ->with('getreceiver')->with('getsenderphone')->with('getreceiverphone')->with('getbiltymeta')->where('id',$id)->get();
           $data['customer'] = Customer::where('id', $data['bilty'][0]->sender_id)->first();   
         
          $data['biltymeta'] = Biltymeta::where('bilty_id',$id)->get();        
         
          PDF::SetTitle('Bilty');
          PDF::SetFont('freeserif', '', 12, '', true);
          
          $printCount = !empty($data['customer']->print_pages)?$data['customer']->print_pages:1;

          for ($i=0; $i < $printCount; $i++) { 
            $data['page'] = $i;
            PDF::AddPage();
            PDF::writeHTML(view('mehmoodgoodemployee/bilty/advancepdf',$data)->render(),true, 0, true, 0);
          }
          
          return PDF::Output('Bilty Report.pdf');
        // return view('mehmoodgoodemployee.bilty.biltypdf',$data);
        }


         public function deletetopay($id)
        {
      
        $bilty = Biltys::with('receiver')->with('sender')->with('receiverphoneno')->with('senderphoneno')->with('rate')->
        where(['id'=>$id])->delete();
       

         return back()->with('message',"Bilty Deleted Successfully");
        }

      public function topayinsert(Request $req){
// dd($req->all());
        if($req->language=="eng"){
		  $receiverName = $req->input('receiver_name');
		  $senderName = $req->input('sender_name');
         }else{
          $receiverName = $req->input('receiver_nameurdu');
          $senderName = $req->input('sender_nameurdu');          
         } 
         $caltype = $req->input('calType'); 

        $Validation = \Validator::make($req->all(),[
             'computer' => 'required',
             'bilty' => 'required',
             'date' => 'required', 
             'language' => 'required',
             'karachi_to' => 'required',
		     'reference1' => 'nullable',
		     'reference2' => 'nullable',
		     'rent' => 'nullable',
		     'Labour' => 'required',
		     'tt' => 'required',
		     'local_charges' => 'required',
		     'lifter' => 'required',
		     'home_delivery' => 'required',
		     'other_charges' => 'required',
		     'total_amount' => 'required',
		     'advance' => 'nullable',
		     'balance' => 'required'
           ]);
           
           if($Validation->fails())
			{
				  return back()->withErrors($Validation)->withInput($req->all());
			}


         if(!empty($req->manual_sender)){
            $Validation = \Validator::make($req->all(),[
              'manual_sender' => 'required',
          //    'sender_name' => 'nullable',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
            $senderName = 0;
         }
         else{
            $Validation = \Validator::make($req->all(),[
              'manual_sender' => 'nullable',
           //   'sender_name' => 'required',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
         }
           
         if(!empty($req->manual_receiver)){
            $Validation = \Validator::make($req->all(),[
              'manual_receiver' => 'required',
           //   'receiver_name' => 'nullable',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
            $receiverName = 0;
         }
         else{
            $Validation = \Validator::make($req->all(),[
              'manual_receiver' => 'nullable',
            //  'receiver_name' => 'required',
            ]);
                
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
         }

         $delivery_address = '';
         if($req->input('delivery_mode') == "home_delivery"){
          //$delivery_address = $req->input('home_delivery_address');
          $delivery_address = $req->input('good_transport_address');
         }
         else if($req->input('delivery_mode') == "good_transport"){
          $delivery_address = $req->input('good_transport_address');
         }
         else{
          $delivery_address = null;
         }


         //$bilty = new Biltys;
         if($req->input('sender_name')==0)
         {
          if($req->language=="urd"){
             $senderName = $req->input('sender_nameurdu');
           }
          else{
             $bilty['sender_name'] = $req->input('manual_sender');
           }
             $bilty['sender_no'] = $req->input('manual_senderno');
         }
         if($req->input('receiver_name')==0)
          {
           if($req->language=="urd"){
           $senderName = $req->input('sender_nameurdu');
           }else{
             $bilty['receiver_name'] = $req->input('manual_receiver');
           }
             $bilty['receiver_no'] = $req->input('manual_receiverno');
           }
        
         $bilty['bilty_no'] = $req->input('bilty');
         $bilty['bilty_type'] = $req->input('biltytype');
         $bilty['date'] = date('Y-m-d',strtotime($req->input('date')));
         //if sender name is ur
        
         $bilty['sender_id'] = $senderName;
         $CustomerPhoneno = CustomerPhoneno::where('customer_id', $senderName)->first();
           if(!$CustomerPhoneno) {
             $CustomerPhoneno = new CustomerPhoneno;
             $CustomerPhoneno->number = $req->input('sender_no');
             $CustomerPhoneno->customer_id = $senderName;
             $CustomerPhoneno->save();
             $bilty['senderphone_id'] = $CustomerPhoneno->id;
           } else if ($CustomerPhoneno->id == $req->input('sender_no')) {
$bilty['senderphone_id'] = $req->input('sender_no');
}else {
             $CustomerPhoneno = CustomerPhoneno::where('customer_id', $senderName)->first();
             $CustomerPhoneno->number = $req->input('sender_no');
             $CustomerPhoneno->customer_id = $senderName;
             $CustomerPhoneno->save();
             $bilty['senderphone_id'] = $CustomerPhoneno->id;
           }
         
        
         $bilty['receiver_id'] = $receiverName;
$CustomerPhoneno = CustomerPhoneno::where('customer_id', $receiverName)->first();
           if(!$CustomerPhoneno) {
             $CustomerPhoneno = new CustomerPhoneno;
             $CustomerPhoneno->number = $req->input('receiver_no');
             $CustomerPhoneno->customer_id = $receiverName;
             $CustomerPhoneno->save();
             $bilty['receiverphone_id'] = $CustomerPhoneno->id;
           } else if ($CustomerPhoneno->id == $req->input('receiver_no')) {
$bilty['receiverphone_id'] = $req->input('receiver_no');
}else {
             $CustomerPhoneno = CustomerPhoneno::where('customer_id', $receiverName)->first();
             $CustomerPhoneno->number = $req->input('receiver_no');
             $CustomerPhoneno->customer_id = $receiverName;
             $CustomerPhoneno->save();
             $bilty['receiverphone_id'] = $CustomerPhoneno->id;
           }
         
         $bilty['station_id'] = $req->input('karachi_to');
         $bilty['ref_1'] = $req->input('reference1');
         $bilty['ref_2'] = $req->input('reference2');
         $bilty['rent'] = $req->input('rent');
         $bilty['labour'] = $req->input('Labour');
         $bilty['tt'] = $req->input('tt');
         $bilty['local_charges'] = $req->input('local_charges');
         $bilty['crane_charges']  = $req->input('lifter');
         $bilty['home_delivery'] = $req->input('home_delivery');
         $bilty['other_charges'] = $req->input('other_charges');
         $bilty['by_type']  = $req->input('calType');
         $bilty['biltymake_from'] = "topay";

         $bilty['total_charges'] = $req->input('total_amount');
         $bilty['advance'] = $req->input('advance');
         $bilty['balance'] = $req->input('balance');


         $bilty['note'] = $req->input('note');
         $bilty['delivery_mode'] = $req->input('delivery_mode');
         $bilty['delivery_address'] = $delivery_address;
         $bilty['customer_type'] = $req->input('language');
        // $bilty->remarks = $req->input('package');
         $bilty = DB::table('bilty')->insertGetId($bilty); 

          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $goods = $req->input('goods');
          $brand = $req->input('brand');
          $rate = $req->input('rate');

          $weight = $req->input('weight');
          /*if( $req->input('weight')=='' || empty($req->input('weight')) ){
            $weight = 1;
          }else{
            $weight = $req->input('weight');
          }*/

          foreach ($quantity as $key => $value) {
             $biltymeta['quantity'] = $value;
             $biltymeta['packing_id'] = $packing[$key];
             if($good[$key]!="other")
             {
             $biltymeta['description'] = $good[$key];
             }else{
              $biltymeta['description'] = $goods[$key];
             }
             $biltymeta['brand'] = $brand[$key];  
             $biltymeta['rate'] = $rate[$key];  

             //$biltymeta->weight = $weight[$key];
             if( $weight[$key]=='' || empty($weight[$key]) ){
                $biltymeta['weight'] = 0;
             }else{
                $biltymeta['weight'] = $weight[$key];
             }
             $biltymeta['bilty_id'] = $bilty;
             DB::table('bilty_metas')->insert($biltymeta);
          }
		    
		$biltys = Biltys::with('getbiltymeta')->with('getsender')->with('getreceiver')->with('stationdetail')->with('getreceiverphone')->with('getreceiverphone')->with('getsenderphone')->where('id',$bilty)->first();
        $biltymetas = Biltymeta::with('getpackagedata')->where('bilty_id',$bilty)->get(); 
       
        $receiver = Customer::with('phoneno')->where('customer_type',"ToPay")->get();
        $sender = Customer::with('phoneno')->with('userpackage')->with('userstation')->where('customer_type', "ToPay")->get();   
        $station =  Stationdetail::get();
        $generatedid = Biltys::orderBy('id','desc')->first();
        //if record is not null
        if($generatedid!="")
        {
            $id= $generatedid->id+1;
        }
        else
        {
           $id = 0;  
        }  
		 //$pdf = PDF::loadView('bilty_pdf/pdf_bilty',compact('receiver','sender','biltys','station','biltymetas'));
		 //$pdf = PDF::loadView('reports/plot_pdf_report',compact('receiver','sender','biltys','station','biltymetas'));
        // return $pdf->download('bilty_pdf.pdf_bilty.pdf'); 
		 //return $pdf->download('bilty_pdf/pdf_bilty'); 
        // return view('bilty_pdf/pdf_bilty',compact('receiver','sender','biltys','station','biltymetas'));
		 
        if(!empty($req->savenprint)){
			
         //return back()->with(['message'=>"Bilty Added Successfull","print"=>$bilty]);
			$data['bilty'] = Biltys::with('getbiltymeta')->with('getsender')
							->with('getreceiver')->with('getsenderphone')->with('getreceiverphone')->with('getbiltymeta')->where('id',$bilty)->get();
			$data['customer'] = Customer::where('id', $data['bilty'][0]->sender_id)->first(); 
			if ($data['bilty'][0]->walkin == 1) {
			$data['biltymeta'] = WalkinBiltymeta::where('bilty_id',$bilty)->get(); 
			  } else {
		   $data['biltymeta'] = Biltymeta::where('bilty_id',$bilty)->get(); 
			 }

       //PDF::SetTitle('Bilty');
       //PDF::SetFont('freeserif', '', 12, '', true);
     
       if($data['bilty'][0]->bilty_type=="Paid")
       {
      $printCount = !empty($data['customer']->print_pages)?$data['customer']->print_pages:1;

       for ($i=0; $i < $printCount; $i++) { 
        $data['page'] = $i;
       // PDF::AddPage();
     // PDF::writeHTML(view('mehmoodgoodemployee/bilty/biltypaidpdf',$data)->render(),true, 0, true, 0);
           }

        //return PDF::Output('Bilty Report.pdf');
      }
      if($data['bilty'][0]->bilty_type=="advance")
       {
      $printCount = !empty($data['customer']->print_pages)?$data['customer']->print_pages:1;

       for ($i=0; $i < $printCount; $i++) {
        $data['page'] = $i; 
        //PDF::AddPage();
      //PDF::writeHTML(view('mehmoodgoodemployee/bilty/advancepdf',$data)->render(),true, 0, true, 0);
           }

        //return PDF::Output('Bilty Report.pdf');
      }
      else{
         $printCount = !empty($data['customer']->print_pages)?$data['customer']->print_pages:1;

       for ($i=0; $i < $printCount; $i++) {
        $data['page'] = $i;
       // PDF::AddPage();
      //PDF::writeHTML(view('mehmoodgoodemployee/bilty/biltypdf',$data)->render(),true, 0, true, 0);
           }

       // return PDF::Output('Bilty Report.pdf');
      }
return view('mehmoodgoodemployee.bilty.biltypdf',$data);
	   }
       else{
       return back()->with(['message'=>"Bilty Added Successfull"]);
        }
     }
   
   public function partinsert(Request $req){
      // dd($req->all());
     //   dd($_POST);
        if($req->language=="eng"){
        $receiverName = $req->input('receiver_name');
        $senderName = $req->input('sender_name');
         }else{
          //$receiverName = $req->input('receiver_nameurdu');
           //$senderName = $req->input('sender_nameurdu');
         // extra add lines        
         $receiverName = $req->input('receiver_name');
         $senderName = $req->input('sender_name');
         } 
         $caltype = $req->input('calType'); 
         //dd($req->all());

        $Validation = \Validator::make($req->all(),[
             'computer' => 'required',
              'bilty' => 'required',
               'date' => 'required', 
               
               //'sender_no' => 'required',
              // 'karachi_to' => 'required',
               
              // 'receiver_no' => 'required',
              // 'reference1' => 'nullable',
              // 'reference2' => 'nullable',
             //  'rent' => 'nullable',
             //  'Labour' => 'required',
             //  'tt' => 'required',
             //  'local_charges' => 'required',
             //  'lifter' => 'required',
             //  'home_delivery' => 'required',
             //  'other_charges' => 'required',
             //  'total_amount' => 'required',
             //  'advance' => 'nullable',
             //  'balance' => 'required',
              
           ]);

          if($Validation->fails())
          {
              return back()->withErrors($Validation)->withInput($req->all());
          }


         if(!empty($req->manual_sender)){
            $Validation = \Validator::make($req->all(),[
              'manual_sender' => 'required',
              'sender_name' => 'nullable',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
            $senderName = 0;
         }
         else{
            $Validation = \Validator::make($req->all(),[
              'manual_sender' => 'nullable',
              'sender_name' => 'required',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
         }

         if(!empty($req->manual_receiver)){
            $Validation = \Validator::make($req->all(),[
              'manual_receiver' => 'required',
              'receiver_name' => 'nullable',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
            $receiverName = 0;
         }
         else{
            $Validation = \Validator::make($req->all(),[
              'manual_receiver' => 'nullable',
              'receiver_name' => 'required',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
         }

         $delivery_address = '';
         if($req->input('delivery_mode') == "home_delivery"){
          $delivery_address = $req->input('home_delivery_address');
         }
         else if($req->input('delivery_mode') == "good_transport"){
          $delivery_address = $req->input('good_transport_address');
         }
         else{
          $delivery_address = null;
         }


         $bilty = new PartBilty;
         if($req->input('sender_name')==0)
         {
          $bilty->sender_name = $req->input('manual_sender');
          $bilty->sender_no = $req->input('manual_senderno');
         }
         if($req->input('receiver_name')==0)
          {
          $bilty->receiver_name = $req->input('manual_receiver');
          $bilty->receiver_no = $req->input('manual_receiverno');
          
          }
         
         $bilty->bilty_no = $req->input('computer');
         $bilty->bilty_id = $req->input('bilty_id');
         $bilty->bilty_against = $req->input('idnumber');
         $bilty->bilty_type = "partbilty";
         $bilty->date = date('Y-m-d',strtotime($req->input('date')));
         //if sender name is ur
        
         // $bilty->sender_id = $senderName;
         // $bilty->senderphone_id = $req->input('sender_no');
        
        
         // $bilty->receiver_id = $receiverName;
         // $bilty->receiverphone_id = $req->input('receiver_no');

$bilty['sender_id'] = $senderName;
         $CustomerPhoneno = CustomerPhoneno::where('customer_id', $senderName)->first();
           if(!$CustomerPhoneno) {
             $CustomerPhoneno = new CustomerPhoneno;
             $CustomerPhoneno->number = $req->input('sender_no');
             $CustomerPhoneno->customer_id = $senderName;
             $CustomerPhoneno->save();
             $bilty['senderphone_id'] = $CustomerPhoneno->id;
           } else if ($CustomerPhoneno->id == $req->input('sender_no')) {
$bilty['senderphone_id'] = $req->input('sender_no');
}else {
             $CustomerPhoneno = CustomerPhoneno::where('customer_id', $senderName)->first();
             $CustomerPhoneno->number = $req->input('sender_no');
             $CustomerPhoneno->customer_id = $senderName;
             $CustomerPhoneno->save();
             $bilty['senderphone_id'] = $CustomerPhoneno->id;
           }
         
        
         $bilty['receiver_id'] = $receiverName;
$CustomerPhoneno = CustomerPhoneno::where('customer_id', $receiverName)->first();
           if(!$CustomerPhoneno) {
             $CustomerPhoneno = new CustomerPhoneno;
             $CustomerPhoneno->number = $req->input('receiver_no');
             $CustomerPhoneno->customer_id = $receiverName;
             $CustomerPhoneno->save();
             $bilty['receiverphone_id'] = $CustomerPhoneno->id;
           } else if ($CustomerPhoneno->id == $req->input('receiver_no')) {
$bilty['receiverphone_id'] = $req->input('receiver_no');
}else {
             $CustomerPhoneno = CustomerPhoneno::where('customer_id', $receiverName)->first();
             $CustomerPhoneno->number = $req->input('receiver_no');
             $CustomerPhoneno->customer_id = $receiverName;
             $CustomerPhoneno->save();
             $bilty['receiverphone_id'] = $CustomerPhoneno->id;
           }

         $bilty->station_id = $req->input('karachi_to');
         $bilty->ref_1 = $req->input('reference1');
         $bilty->ref_2 = $req->input('reference2');
         $bilty->rent = $req->input('rent');
         $bilty->labour = $req->input('Labour');
         $bilty->tt = $req->input('tt');
         $bilty->local_charges = $req->input('local_charges');
         $bilty->crane_charges  = $req->input('lifter');
         $bilty->home_delivery = $req->input('home_delivery');
         $bilty->other_charges = $req->input('other_charges');
         $bilty->by_type  = $req->input('calType');
          $bilty->biltymake_from = "topay";

         $bilty->total_charges = $req->input('total_amount');
         $bilty->advance = $req->input('advance');
         $bilty->balance = $req->input('balance');


         $bilty->note = $req->input('note');
         $bilty->delivery_mode = $req->input('delivery_mode');
         $bilty->delivery_address = $delivery_address;

        // $bilty->remarks = $req->input('package');
         
        
           
          $bilty->save();

          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $brand = $req->input('brand');
          $rate = $req->input('rate');
          $weight = $req->input('weight');
          $biltymetaid = $req->input('bilty_meta_id');
          if(isset($biltymetaid[0])){
          foreach ($biltymetaid as $key => $value) {
             $biltymeta = new PartBiltymeta;
             $biltymeta->quantity = $quantity[$key];
             $biltymeta->packing_id = $packing[$key];
             $biltymeta->description = $good[$key];
             $biltymeta->brand = $brand[$key];  
             $biltymeta->rate = $rate[$key];  
             $biltymeta->weight = $weight[$key];
             $biltymeta->bilty_meta_id = $value;
             $biltymeta->bilty_id = $bilty->id;
             $biltymeta->save(); 
          }
        }
         

        if(!empty($req->savenprint)){
          // $this->pdf($bilty->id);
          return back()->with(['message'=>"Bilty Added Successfull","print"=>$bilty->id]);
        }
        else{
          return back()->with(['message'=>"Bilty Added Successfull"]);
        }
     }

     public function topayinsertwalkin(Request $req){

      // dd($req->all());
        $Validation = \Validator::make($req->all(),[
             'computer' => 'required',
             'bilty' => 'required',
             'date' => 'required', 
             'manual_sender' => 'required',
             'manual_senderno' => 'required',
             'manual_receiver' => 'required',
             'manual_receiverno' => 'required',
             'karachi_to' => 'required',
             'reference1' => 'nullable',
             'reference2' => 'nullable',
             'rent' => 'nullable',
             'Labour' => 'required',
             'tt' => 'required',
             'local_charges' => 'required',
             'lifter' => 'required',
             'home_delivery' => 'required',
             'other_charges' => 'required',
             'total_amount' => 'required',
             'advance' => 'nullable',
             'balance' => 'required',
              
           ]);

          if($Validation->fails())
          {
              return back()->withErrors($Validation)->withInput($req->all());
          }
          
         $bilty = new Biltys;
         
         $bilty->bilty_no = $req->input('bilty');
         $bilty->bilty_type = $req->input('biltytype');
         $bilty->date = date('Y-m-d',strtotime($req->input('date')));
         //if sender name is ur
        
         //$bilty->sender_id = $senderName;
        
        
          $bilty->receiver_name = $req->input('manual_receiver');
          $bilty->receiver_no = $req->input('manual_receiverno');
          $bilty->sender_name = $req->input('manual_sender');
          $bilty->sender_no = $req->input('manual_senderno');
          $bilty->station_name = $req->input('karachi_to');
          $bilty->ref_1 = $req->input('reference1');
          $bilty->ref_2 = $req->input('reference2');
          $bilty->rent = $req->input('rent');
          $bilty->labour = $req->input('Labour');
          $bilty->tt = $req->input('tt');
          $bilty->local_charges = $req->input('local_charges');
          $bilty->crane_charges  = $req->input('lifter');
          $bilty->home_delivery = $req->input('home_delivery');
          $bilty->other_charges = $req->input('other_charges');
          $bilty->biltymake_from = "topay";
          $bilty->by_type  = $req->input('walkincalType');

          $bilty->walkin = 1;

         $bilty->total_charges = $req->input('total_amount');
         $bilty->advance = $req->input('advance');
         $bilty->balance = $req->input('balance');
         $bilty->note = $req->input('note');
        // $bilty->remarks = $req->input('package');
         
          $bilty->save();

          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $brand = $req->input('brand');
          $rate = $req->input('rate');
          $weight = $req->input('weight');

          foreach ($quantity as $key => $value) {
             $biltymeta = new WalkinBiltymeta;
             $biltymeta->quantity = $value;
             $biltymeta->packing = $packing[$key];
             $biltymeta->description = $good[$key];
             $biltymeta->brand = $brand[$key];  
             $biltymeta->rate = $rate[$key];  
             $biltymeta->weight = $weight[$key];
            
             $biltymeta->bilty_id = $bilty->id;
             $biltymeta->save(); 
          }

        if(!empty($req->savenprint)){
          // $this->pdf($bilty->id);
          return back()->with(['message'=>"Bilty Added Successfull","print"=>$bilty->id]);
        }
        else{
          return back()->with(['message'=>"Bilty Added Successfull"]);
        }
     }


     public function updatetopaybiltywalkin(Request $req){
         // dd("IN");
         $id = $req->input('computer');
        /*$Validation = $req->validate([
             'computer' => 'required',
              'bilty' => 'required',
               'date' => 'required', 
               'sender_name' => 'required',
               'sender_no' => 'required',
               'karachi_to' => 'required',
                'receiver_name' => 'required',
               'receiver_no' => 'required',
               'reference1' => 'required',
               'reference2' => 'required',
               'rent' => 'required',
               'Labour' => 'required',
               'tt' => 'required',
               'local_charges' => 'required',
               'lifter' => 'required',
               'home_delivery' => 'required',
               'other_charges' => 'required',
               'total_amount' => 'required',
               'advance' => 'required',
                'balance' => 'required',
              
           ]); */
        
         $bilty = Biltys::whereId($id)->first();
         $bilty->bilty_no = $req->input('bilty');
         $bilty->bilty_type = $req->input('biltytype');
          $bilty->date = date('Y-m-d',strtotime($req->input('date')));
         $bilty->sender_name = $req->input('sender_name');
         $bilty->sender_no = $req->input('sender_no');
         $bilty->receiver_name = $req->input('receiver_name');
         $bilty->receiver_no = $req->input('receiver_no');
         $bilty->station_name = $req->input('karachi_to');
         $bilty->ref_1 = $req->input('reference1');
         $bilty->ref_2 = $req->input('reference2');
         $bilty->rent = $req->input('rent');
         $bilty->labour = $req->input('Labour');
         $bilty->tt = $req->input('tt');
         $bilty->local_charges = $req->input('local_charges');
         $bilty->crane_charges  = $req->input('lifter');
         $bilty->home_delivery = $req->input('home_delivery');
         $bilty->other_charges = $req->input('other_charges');

         $bilty->total_charges = $req->input('total_amount');
         $bilty->advance = $req->input('advance');
         $bilty->balance = $req->input('balance');
         $bilty->by_type  = $req->input('walkincalType');


        // $bilty->remarks = $req->input('package');
         // if($req->input('sender_name')==0)
         // {
          $bilty->sender_name = $req->input('manual_sender');
          $bilty->sender_no = $req->input('manual_senderno');
          // $bilty->sender_id = 0;
          // $bilty->senderphone_id = 0;
         // }
         // if($req->input('receiver_name')==0)
          // {
          $bilty->receiver_name = $req->input('manual_receiver');
          $bilty->receiver_no = $req->input('manual_receiverno');
          // $bilty->receiver_id = 0;
         // $bilty->receiverphone_id = 0;
          
          // }

        
        $bilty->note = $req->input('note');

         // dd($bilty);
        
          $bilty->update();
          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $brand = $req->input('brand');
          $rate = $req->input('rate');
          $weight = $req->input('weight');
          $biltymeta = WalkinBiltymeta::where(['bilty_id'=>$id])->delete();
          foreach ($quantity as $key => $value) {
             $biltymeta = new WalkinBiltymeta;
             $biltymeta->quantity = $value;
             $biltymeta->packing = $packing[$key];
             $biltymeta->description = $good[$key];
             $biltymeta->brand = $brand[$key]; 
             $biltymeta->rate = $rate[$key];  
             $biltymeta->weight = $weight[$key];
            
             $biltymeta->bilty_id = $bilty->id;
             $biltymeta->save(); 

          }

        
        return redirect()->route('topay')->with('message',"Bilty Updated Successfully");
     }


      public function payinsertwalkin(Request $req){

        $Validation = \Validator::make($req->all(),[
             'computer' => 'required',
             'bilty' => 'required',
             'date' => 'required', 
             'manual_sender' => 'required',
             'manual_senderno' => 'required',
             'manual_receiver' => 'required',
             'manual_receiverno' => 'required',
             'karachi_to' => 'required',
             'reference1' => 'nullable',
             'reference2' => 'nullable',
             'rent' => 'nullable',
             'Labour' => 'required',
             'tt' => 'required',
             'local_charges' => 'required',
             'lifter' => 'required',
             'home_delivery' => 'required',
             'other_charges' => 'required',
             'total_amount' => 'required',
             'advance' => 'nullable',
             'balance' => 'required',
              
           ]);

          if($Validation->fails())
          {
              return back()->withErrors($Validation)->withInput($req->all());
          }
          
         $bilty = new Biltys;
         
         $bilty->bilty_no = $req->input('bilty');
         $bilty->bilty_type = $req->input('biltytype');
         $bilty->date = date('Y-m-d',strtotime($req->input('date')));
         //if sender name is ur
        
         //$bilty->sender_id = $senderName;
        
        
          $bilty->receiver_name = $req->input('manual_receiver');
          $bilty->receiver_no = $req->input('manual_receiverno');
          $bilty->sender_name = $req->input('manual_sender');
          $bilty->sender_no = $req->input('manual_senderno');
          $bilty->station_name = $req->input('karachi_to');
          $bilty->ref_1 = $req->input('reference1');
          $bilty->ref_2 = $req->input('reference2');
          $bilty->rent = $req->input('rent');
          $bilty->labour = $req->input('Labour');
          $bilty->tt = $req->input('tt');
          $bilty->local_charges = $req->input('local_charges');
          $bilty->crane_charges  = $req->input('lifter');
          $bilty->home_delivery = $req->input('home_delivery');
          $bilty->other_charges = $req->input('other_charges');
          $bilty->biltymake_from = "paid";
          $bilty->walkin = 1;

         $bilty->total_charges = $req->input('total_amount');
         $bilty->advance = $req->input('advance');
         $bilty->balance = $req->input('balance');

        // $bilty->remarks = $req->input('package');
         
          $bilty->save();

          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $brand = $req->input('brand');
          $rate = $req->input('rate');
          $weight = $req->input('weight');

          foreach ($quantity as $key => $value) {
             $biltymeta = new WalkinBiltymeta;
             $biltymeta->quantity = $value;
             $biltymeta->packing = $packing[$key];
             $biltymeta->description = $good[$key];
             $biltymeta->brand = $brand[$key];  
             $biltymeta->rate = $rate[$key];  
             $biltymeta->weight = $weight[$key];
            
             $biltymeta->bilty_id = $bilty->id;
             $biltymeta->save(); 
          }

        if(!empty($req->savenprint)){
          // $this->pdf($bilty->id);
          return back()->with(['message'=>"Bilty Added Successfull","print"=>$bilty->id]);
        }
        else{
          return back()->with(['message'=>"Bilty Added Successfull"]);
        }
     }

      public function advanceinsertwalkin(Request $req){

        $Validation = \Validator::make($req->all(),[
             'computer' => 'required',
             'bilty' => 'required',
             'date' => 'required', 
             'manual_sender' => 'required',
             'manual_senderno' => 'required',
             'manual_receiver' => 'required',
             'manual_receiverno' => 'required',
             'karachi_to' => 'required',
             'reference1' => 'nullable',
             'reference2' => 'nullable',
             'rent' => 'nullable',
             'Labour' => 'required',
             'tt' => 'required',
             'local_charges' => 'required',
             'lifter' => 'required',
             'home_delivery' => 'required',
             'other_charges' => 'required',
             'total_amount' => 'required',
             'advance' => 'nullable',
             'balance' => 'required',
              
           ]);

          if($Validation->fails())
          {
              return back()->withErrors($Validation)->withInput($req->all());
          }
          
         $bilty = new Biltys;
         
         $bilty->bilty_no = $req->input('bilty');
         $bilty->bilty_type = $req->input('biltytype');
         $bilty->date = date('Y-m-d',strtotime($req->input('date')));
         //if sender name is ur
        
         //$bilty->sender_id = $senderName;
        
        
          $bilty->receiver_name = $req->input('manual_receiver');
          $bilty->receiver_no = $req->input('manual_receiverno');
          $bilty->sender_name = $req->input('manual_sender');
          $bilty->sender_no = $req->input('manual_senderno');
          $bilty->station_name = $req->input('karachi_to');
          $bilty->ref_1 = $req->input('reference1');
          $bilty->ref_2 = $req->input('reference2');
          $bilty->rent = $req->input('rent');
          $bilty->labour = $req->input('Labour');
          $bilty->tt = $req->input('tt');
          $bilty->local_charges = $req->input('local_charges');
          $bilty->crane_charges  = $req->input('lifter');
          $bilty->home_delivery = $req->input('home_delivery');
          $bilty->other_charges = $req->input('other_charges');
          $bilty->biltymake_from = "paid";
          $bilty->walkin = 1;

         $bilty->total_charges = $req->input('total_amount');
         $bilty->advance = $req->input('advance');
         $bilty->balance = $req->input('balance');

        // $bilty->remarks = $req->input('package');
         
          $bilty->save();

          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $brand = $req->input('brand');
          $rate = $req->input('rate');
          $weight = $req->input('weight');

          foreach ($quantity as $key => $value) {
             $biltymeta = new WalkinBiltymeta;
             $biltymeta->quantity = $value;
             $biltymeta->packing = $packing[$key];
             $biltymeta->description = $good[$key];
             $biltymeta->brand = $brand[$key];  
             $biltymeta->rate = $rate[$key];  
             $biltymeta->weight = $weight[$key];
            
             $biltymeta->bilty_id = $bilty->id;
             $biltymeta->save(); 
          }

        if(!empty($req->savenprint)){
          // $this->pdf($bilty->id);
          return back()->with(['message'=>"Bilty Added Successfull","print"=>$bilty->id]);
        }
        else{
          return back()->with(['message'=>"Bilty Added Successfull"]);
        }
     }


      public function updatetopaybilty(Request $req){
         
         $id = $req->input('computer');
        /*$Validation = $req->validate([
             'computer' => 'required',
              'bilty' => 'required',
               'date' => 'required', 
               'sender_name' => 'required',
               'sender_no' => 'required',
               'karachi_to' => 'required',
                'receiver_name' => 'required',
               'receiver_no' => 'required',
               'reference1' => 'required',
               'reference2' => 'required',
               'rent' => 'required',
               'Labour' => 'required',
               'tt' => 'required',
               'local_charges' => 'required',
               'lifter' => 'required',
               'home_delivery' => 'required',
               'other_charges' => 'required',
               'total_amount' => 'required',
               'advance' => 'required',
                'balance' => 'required',
              
           ]); */
        
         $bilty = Biltys::whereId($id)->first();
         
         $bilty->bilty_no = $req->input('bilty');
         $bilty->bilty_type = $req->input('biltytype');
          $bilty->date = date('Y-m-d',strtotime($req->input('date')));
         $bilty->sender_id = $req->input('sender_name');
         $bilty->senderphone_id = $req->input('sender_no');
         $bilty->receiver_id = $req->input('receiver_name');
         $bilty->receiverphone_id = $req->input('receiver_no');
         $bilty->station_id = $req->input('karachi_to');
         $bilty->ref_1 = $req->input('reference1');
         $bilty->ref_2 = $req->input('reference2');
         $bilty->rent = $req->input('rent');
         $bilty->labour = $req->input('Labour');
         $bilty->tt = $req->input('tt');
         $bilty->local_charges = $req->input('local_charges');
         $bilty->crane_charges  = $req->input('lifter');
         $bilty->home_delivery = $req->input('home_delivery');
         $bilty->other_charges = $req->input('other_charges');

         $bilty->total_charges = $req->input('total_amount');
         $bilty->advance = $req->input('advance');
         $bilty->balance = $req->input('balance');
         $bilty->by_type  = $req->input('calType');


        // $bilty->remarks = $req->input('package');
         if($req->input('sender_name')==0)
         {
          $bilty->sender_name = $req->input('manual_sender');
          $bilty->sender_no = $req->input('manual_senderno');
          $bilty->sender_id = 0;
          $bilty->senderphone_id = 0;
         }
         if($req->input('receiver_name')==0)
          {
          $bilty->receiver_name = $req->input('manual_receiver');
          $bilty->receiver_no = $req->input('manual_receiverno');
          $bilty->receiver_id = 0;
         $bilty->receiverphone_id = 0;
          
          }

          $delivery_address = '';
         if($req->input('delivery_mode') == "home_delivery"){
          $delivery_address = $req->input('home_delivery_address');
         }
         else if($req->input('delivery_mode') == "good_transport"){
          $delivery_address = $req->input('good_transport_address');
         }
         else{
          $delivery_address = null;
         }
        
        $bilty->note = $req->input('note');
         $bilty->delivery_mode = $req->input('delivery_mode');
         $bilty->delivery_address = $delivery_address;
        
          $bilty->update();
          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $brand = $req->input('brand');
          $rate = $req->input('rate');
          $weight = $req->input('weight');
          $biltymeta = Biltymeta::where(['bilty_id'=>$id])->delete();
if(!empty($quantity )){
foreach ($quantity as $key => $value) {
             $biltymeta = new Biltymeta;
             $biltymeta->quantity = $value;
             $biltymeta->packing_id = $packing[$key];
             $biltymeta->description = $good[$key];
             $biltymeta->brand = $brand[$key]; 
             $biltymeta->rate = $rate[$key];  
             $biltymeta->weight = $weight[$key];
            
             $biltymeta->bilty_id = $bilty->id;
             $biltymeta->save(); 
          }
}          


        if(!empty($req->savenprint)){
          // $this->pdf($bilty->id);
          return redirect()->route('topay')->with(['message'=>"Bilty Updated Successfull","print"=>$bilty->id]);
        }
        else{
          return redirect()->route('topay')->with(['message'=>"Bilty Updated Successfull"]);
        }
     }

     
    public function paid()
    {
      
     $bilty = Biltys::with('getbiltymeta')->with('getsender')
                  ->with('getreceiver')->get();
       
        $receiver = Customer::with('phoneno')->get();
       
        $sender = Customer::with('phoneno')->with('userpackage')->with('userstation')->get();
        $receivermanual = Customer::whereNotNull('customer_name_urdu')->with('phoneno')->get();   
        $sendermanual = Customer::whereNotNull('customer_name_urdu')->with('phoneno')->with('userpackage')->with('userstation')->where(['customer_type'=>"Paid"])->get();
        $station =  Stationdetail::get();
        $packagemetas =  Packmetas::get();
        $generatedid = Biltys::orderBy('id','desc')->first();
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
        $generatedbilty = Biltys::orderBy('bilty_no','desc')->first();
        
        //if record is not null
        if($generatedbilty!="")
        {
            // $biltyno = $generatedbilty->id+1;
            $biltyno = $generatedbilty->bilty_no+1;
        }
        //for first record
        else
        {
           $biltyno = 0;
        }
       
        
     // $bilty = Biltys::get();
        
        
        return view('mehmoodgoodemployee/bilty/paid')->with(compact('receiver',$receiver,'sender',$sender,'id',$id,'bilty',$bilty,'station',$station,'biltyno',$biltyno,'packagemetas',$packagemetas,'receivermanual',$receivermanual,'sendermanual',$sendermanual));
      }


     public function paidinsert(Request $req){
          
          if($req->language=="eng"){
        $receiverName = $req->input('receiver_name');
        $senderName = $req->input('sender_name');
         }else{
          $receiverName = $req->input('receiver_nameurdu');
           $senderName = $req->input('sender_nameurdu');
         } 
        // $receiverName = $req->input('receiver_name');
       // $senderName = $req->input('sender_name'); 
         $caltype = $req->input('calType'); 
 
        $Validation = \Validator::make($req->all(),[
             'computer' => 'required',
              'bilty' => 'required',
               'date' => 'required', 
               
               //'sender_no' => 'required',
               'karachi_to' => 'required',
               
               //'receiver_no' => 'required',
               'reference1' => 'nullable',
               'reference2' => 'nullable',
               'rent' => 'nullable',
               'Labour' => 'required',
               'tt' => 'required',
               'local_charges' => 'required',
               'lifter' => 'required',
               'home_delivery' => 'required',
               'other_charges' => 'required',
               'total_amount' => 'required',
               'advance' => 'nullable',
               'balance' => 'required',
              
           ]);

          if($Validation->fails())
          {
              return back()->withErrors($Validation)->withInput($req->all());
          }


         if(!empty($req->manual_sender)){
            $Validation = \Validator::make($req->all(),[
              'manual_sender' => 'required',
          //    'sender_name' => 'nullable',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
            $senderName = 0;
         }
         else{
            $Validation = \Validator::make($req->all(),[
              'manual_sender' => 'nullable',
           //   'sender_name' => 'required',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
         }

         if(!empty($req->manual_receiver)){
            $Validation = \Validator::make($req->all(),[
              'manual_receiver' => 'required',
           //   'receiver_name' => 'nullable',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
            $receiverName = 0;
         }
         else{
            $Validation = \Validator::make($req->all(),[
              'manual_receiver' => 'nullable',
            //  'receiver_name' => 'required',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
         }

         $delivery_address = '';
         if($req->input('delivery_mode') == "home_delivery"){
          //$delivery_address = $req->input('home_delivery_address');
          $delivery_address = $req->input('good_transport_address');
         }
         else if($req->input('delivery_mode') == "good_transport"){
          $delivery_address = $req->input('good_transport_address');
         }
         else{
          $delivery_address = null;
         }


         $bilty = new Biltys;
         if($req->input('sender_name')==0)
         {
          if($req->language=="urd"){
           $senderName = $req->input('sender_nameurdu');
           }
           else{
          $bilty->sender_name = $req->input('manual_sender');
           }
          $bilty->sender_no = $req->input('manual_senderno');
         }
         if($req->input('receiver_name')==0)
          {
           if($req->language=="urd"){
           $senderName = $req->input('sender_nameurdu');
           }else{
          $bilty->receiver_name = $req->input('manual_receiver');
           }
          $bilty->receiver_no = $req->input('manual_receiverno');
           }
         
         
         $bilty->bilty_no = $req->input('bilty');
         $bilty->bilty_type = $req->input('biltytype');
         $bilty->date = date('Y-m-d',strtotime($req->input('date')));
         //if sender name is ur
        
         $bilty->sender_id = $senderName;
         $bilty->senderphone_id = $req->input('sender_no');
        
        
         $bilty->receiver_id = $receiverName;
         $bilty->receiverphone_id = $req->input('receiver_no');
         $bilty->station_id = $req->input('karachi_to');
         $bilty->ref_1 = $req->input('reference1');
         $bilty->ref_2 = $req->input('reference2');
         $bilty->rent = $req->input('rent');
         $bilty->labour = $req->input('Labour');
         $bilty->tt = $req->input('tt');
         $bilty->local_charges = $req->input('local_charges');
         $bilty->crane_charges  = $req->input('lifter');
         $bilty->home_delivery = $req->input('home_delivery');
         $bilty->other_charges = $req->input('other_charges');
         $bilty->by_type  = $req->input('calType');
          $bilty->biltymake_from = "paid";

         $bilty->total_charges = $req->input('total_amount');
         $bilty->advance = $req->input('advance');
         $bilty->balance = $req->input('balance');
         $bilty->customer_type = $req->input('language');
      
         $delivery_address = '';
         if($req->input('delivery_mode') == "home_delivery"){
          $delivery_address = $req->input('home_delivery_address');
         }
         else{
          $delivery_address = $req->input('good_transport_address');
         }

         $bilty->note = $req->input('note');
         $bilty->delivery_mode = $req->input('delivery_mode');
         $bilty->delivery_address = $delivery_address;

        // $bilty->remarks = $req->input('package');
         
        
           
          $bilty->save();

          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $brand = $req->input('brand');
          $rate = $req->input('rate');
          $weight = $req->input('weight');

          foreach ($quantity as $key => $value) {
             $biltymeta = new Biltymeta;
             $biltymeta->quantity = $value;
             $biltymeta->packing_id = $packing[$key];
             $biltymeta->description = $good[$key];
             $biltymeta->brand = $brand[$key];  
             $biltymeta->rate = $rate[$key];  
             $biltymeta->weight = $weight[$key];
            
             $biltymeta->bilty_id = $bilty->id;
             $biltymeta->save(); 
          }
         

        if(!empty($req->savenprint)){
			dd('save and print');
          // $this->pdf($bilty->id);
          return back()->with(['message'=>"Bilty Added Successfull","print"=>$bilty->id]);
        }
        else{
          return back()->with(['message'=>"Bilty Added Successfull"]);
        }
      
     }


       public function editpaid($id)
       {

      $bilty = Biltys::with('getbiltymeta')->with('getsender')
                  ->with('getreceiver')->with('stationdetail')->with('getreceiverphone')->with('getreceiverphone')->with('getsenderphone')->where('id',$id)->first();
       $biltymeta = Biltymeta::with('getpackagedata')->where('bilty_id',$id)->get(); 
      
       
        $sender = Customer::with('phoneno')->where(['customer_type'=>$bilty->bilty_type])->get(); 
        //if sender is not enter manually
        if($bilty->sender_id!=0){  
        $station =  Stations::where('customer_id', $bilty->sender_id)->get();
        $packages =  Package::with('packages_metas')->where('customer_id', $bilty->sender_id)->get();
        }

        //if sender is enter manually
        if($bilty->sender_id==0){  
        $station =  Stations::all();
        $packages =  Package::with('packages_metas')->get();
        }
       
        $generatedid = Biltys::orderBy('id','desc')->first();
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

         return view('mehmoodgoodemployee/bilty/editpaid')->with(compact('sender',$sender,'bilty',$bilty,'station',$station,'biltymeta',$biltymeta,'packages',$packages));
        }

         public function viewpaid($id)
       {
          
       $bilty = Biltys::with('getbiltymeta')->with('getsender')
                  ->with('getreceiver')->with('stationdetail')->with('getreceiverphone')->with('getreceiverphone')->with('getsenderphone')->where('id',$id)->first();
       $biltymeta = Biltymeta::with('getpackagedata')->where('bilty_id',$id)->get(); 
       
       $receiver = Customer::with('phoneno')->where('customer_type',"ToPay")->get();
        $sender = Customer::with('phoneno')->with('userpackage')->with('userstation')->where('customer_type', "ToPay")->get();   
        $station =  Stationdetail::get();
        $generatedid = Biltys::orderBy('id','desc')->first();
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

         return view('mehmoodgoodemployee/bilty/viewpaid')->with(compact('receiver',$receiver,'sender',$sender,'bilty',$bilty,'station',$station,'biltymeta',$biltymeta));
        }
        
         public function getcategoriesdropdown(Request $req)
         {
        $senderid = $req->input('id');
          
        $phoneno = CustomerPhoneno::where('customer_id',$senderid)->get();
        return $phoneno;
        
         }
        public function getstationdropdown(Request $req)
         {
        $senderid = $req->input('id');
          
        $station = Stations::with('stationdetail')->where('customer_id',$senderid)->get();

        return $station;
        
         }


         public function getstationaddress(Request $req)
         {
          // dd($req->id);
        $station = Stationdetail::where('id',$req->id)->first();

        return $station;
        
         }

        public function getpackagesdropdown(Request $req)
        {
         $senderid = $req->input('id');
         if($senderid=="other")
         {
          $packages = Package::with('packages_metas')->get();
         }
         else{
         //$packages = Package::with('packages_metas')->where('customer_id',$senderid)->get();
          $packages = Package::with('packages_metas')->get();
         }
         return $packages;
         }

          public function getdescriptiondropdown(Request $req)
        {
          $packages = PackageMetaDescription::get();
       
         return $packages;
         }

          public function getsenderdropdown(Request $req)
          {
            $type = $req->input('type');
            if($type=="advance")
            {
             $packages = Customer::get();  
            }
            if($type!="advance")
            {
             $packages = Customer::where('customer_type',$type)->get();
            }
            return $packages;
         }

         public function getbiltysenderdropdown(Request $req)
          {
            $type = $req->input('type');
            if($type=="Paid")
            {
               $packages = Customer::whereHas('userbilty', function ($query) use ($type) {
                   $query->where('bilty_type','=', $type);
               })->get();  
           
           }
            if($type=="ToPay")
            {
              $packages = Customer::whereHas('userbilty', function ($query) use ($type) {
                $query->where('bilty_type','=', $type);
               })->get();  
            }
            return $packages;
         }



          public function updatepaidbilty(Request $req)
          {
       //  dd($_POST);
            $id = $req->input('computer');
        /*$Validation = $req->validate([
             'computer' => 'required',
              'bilty' => 'required',
               'date' => 'required', 
               'sender_name' => 'required',
               'sender_no' => 'required',
               'karachi_to' => 'required',
                'receiver_name' => 'required',
               'receiver_no' => 'required',
               'reference1' => 'required',
               'reference2' => 'required',
               'rent' => 'required',
               'Labour' => 'required',
               'tt' => 'required',
               'local_charges' => 'required',
               'lifter' => 'required',
               'home_delivery' => 'required',
               'other_charges' => 'required',
               'total_amount' => 'required',
               'advance' => 'required',
                'balance' => 'required',
              
           ]); */
        
         $bilty = Biltys::whereId($id)->first();
         
         $bilty->bilty_no = $req->input('bilty');
         $bilty->bilty_type = $req->input('biltytype');
          $bilty->date = date('Y-m-d',strtotime($req->input('date')));
         $bilty->sender_id = $req->input('sender_name');
         $bilty->senderphone_id = $req->input('sender_no');
         $bilty->receiver_id = $req->input('receiver_name');
         $bilty->receiverphone_id = $req->input('receiver_no');
         $bilty->station_id = $req->input('karachi_to');
         $bilty->ref_1 = $req->input('reference1');
         $bilty->ref_2 = $req->input('reference2');
         $bilty->rent = $req->input('rent');
         $bilty->labour = $req->input('Labour');
         $bilty->tt = $req->input('tt');
         $bilty->local_charges = $req->input('local_charges');
         $bilty->crane_charges  = $req->input('lifter');
         $bilty->home_delivery = $req->input('home_delivery');
         $bilty->other_charges = $req->input('other_charges');

         $bilty->total_charges = $req->input('total_amount');
         $bilty->advance = $req->input('advance');
         $bilty->balance = $req->input('balance');

        // $bilty->remarks = $req->input('package');
         if($req->input('sender_name')==0)
         {
          $bilty->sender_name = $req->input('manual_sender');
          $bilty->sender_no = $req->input('manual_senderno');
          $bilty->sender_id = 0;
          $bilty->senderphone_id = 0;
         }
         if($req->input('receiver_name')==0)
          {
          $bilty->receiver_name = $req->input('manual_receiver');
          $bilty->receiver_no = $req->input('manual_receiverno');
          $bilty->receiver_id = 0;
         $bilty->receiverphone_id = 0;
          
          }


          $delivery_address = '';
         if($req->input('delivery_mode') == "home_delivery"){
          $delivery_address = $req->input('home_delivery_address');
         }
         else if($req->input('delivery_mode') == "good_transport"){
          $delivery_address = $req->input('good_transport_address');
         }
         else{
          $delivery_address = null;
         }
        
        $bilty->note = $req->input('note');
         $bilty->delivery_mode = $req->input('delivery_mode');
         $bilty->delivery_address = $delivery_address;
        
          $bilty->update();
          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $brand = $req->input('brand');
          $rate = $req->input('rate');
          $weight = $req->input('weight');
          $biltymeta = Biltymeta::where(['bilty_id'=>$id])->delete();
          foreach ($quantity as $key => $value) {
             $biltymeta = new Biltymeta;
             $biltymeta->quantity = $value;
             $biltymeta->packing_id = $packing[$key];
             $biltymeta->description = $good[$key];
             $biltymeta->brand = $brand[$key]; 
             $biltymeta->rate = $rate[$key];  
             $biltymeta->weight = $weight[$key];
            
             $biltymeta->bilty_id = $bilty->id;
             $biltymeta->save(); 
          }

        
        return back()->with('message',"Bilty Updated Successfully");
      
     }

     


   public function advance(){

        $bilty = Biltys::with('getbiltymeta')->with('getsender')->with('getreceiver')->get();
       
        $receiver = Customer::with('phoneno')->get();
        $sender = Customer::with('phoneno')->with('userpackage')->with('userstation')->get();
        $receivermanual = Customer::whereNotNull('customer_name_urdu')->with('phoneno')->get();   
        $sendermanual = Customer::whereNotNull('customer_name_urdu')->with('phoneno')->with('userpackage')->with('userstation')->get();
        $station =  Stationdetail::get();
        $packagemetas =  Packmetas::get();
        $generatedid = Biltys::orderBy('id','desc')->first();
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
        $generatedbilty = Biltys::orderBy('bilty_no','desc')->first();
        
        //if record is not null
        if($generatedbilty!="")
        {
            // $biltyno = $generatedbilty->id+1;
            $biltyno = $generatedbilty->bilty_no+1;
        }
        //for first record
        else
        {
           $biltyno = 0;
        }
       
        
     // $bilty = Biltys::get();
        
        return view('mehmoodgoodemployee/bilty/advance')->with(compact('receiver',$receiver,'sender',$sender,'id',$id,'bilty',$bilty,'station',$station,'biltyno',$biltyno,'packagemetas',$packagemetas,'receivermanual',$receivermanual,'sendermanual',$sendermanual));
    }

     public function advanceinsert(Request $req){
       
           
         $receiverName = $req->input('receiver_name');
        $senderName = $req->input('sender_name'); 
         $caltype = $req->input('calType'); 

        $Validation = \Validator::make($req->all(),[
             'computer' => 'required',
              'bilty' => 'required',
               'date' => 'required', 
               
               //'sender_no' => 'required',
               'karachi_to' => 'required',
               
               //'receiver_no' => 'required',
               'reference1' => 'nullable',
               'reference2' => 'nullable',
               'rent' => 'nullable',
               'Labour' => 'required',
               'tt' => 'required',
               'local_charges' => 'required',
               'lifter' => 'required',
               'home_delivery' => 'required',
               'other_charges' => 'required',
               'total_amount' => 'required',
               'advance' => 'nullable',
               'balance' => 'required',
              
           ]);

          if($Validation->fails())
          {
              return back()->withErrors($Validation)->withInput($req->all());
          }


          if(!empty($req->manual_sender)){
            $Validation = \Validator::make($req->all(),[
              'manual_sender' => 'required',
          //    'sender_name' => 'nullable',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
            $senderName = 0;
         }
         else{
            $Validation = \Validator::make($req->all(),[
              'manual_sender' => 'nullable',
           //   'sender_name' => 'required',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
         }

         if(!empty($req->manual_receiver)){
            $Validation = \Validator::make($req->all(),[
              'manual_receiver' => 'required',
           //   'receiver_name' => 'nullable',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
            $receiverName = 0;
         }
         else{
            $Validation = \Validator::make($req->all(),[
              'manual_receiver' => 'nullable',
            //  'receiver_name' => 'required',
            ]);
            if($Validation->fails())
            {
                return back()->withErrors($Validation)->withInput($req->all());
            }
         }

         $delivery_address = '';
         if($req->input('delivery_mode') == "home_delivery"){
          //$delivery_address = $req->input('home_delivery_address');
          $delivery_address = $req->input('good_transport_address');
         }
         else if($req->input('delivery_mode') == "good_transport"){
          $delivery_address = $req->input('good_transport_address');
         }
         else{
          $delivery_address = null;
         }


         $bilty = new Biltys;
         if($req->input('sender_name')==0)
         {
          if($req->language=="urd"){
           $senderName = $req->input('sender_nameurdu');
           }
           else{
          $bilty->sender_name = $req->input('manual_sender');
           }
          $bilty->sender_no = $req->input('manual_senderno');
         }
         if($req->input('receiver_name')==0)
          {
           if($req->language=="urd"){
           $senderName = $req->input('sender_nameurdu');
           }else{
          $bilty->receiver_name = $req->input('manual_receiver');
           }
          $bilty->receiver_no = $req->input('manual_receiverno');
           }
         
         
         $bilty->bilty_no = $req->input('bilty');
         $bilty->bilty_type = $req->input('biltytype');
         $bilty->date = date('Y-m-d',strtotime($req->input('date')));
         //if sender name is ur
        
         $bilty->sender_id = $senderName;
         $bilty->senderphone_id = $req->input('sender_no');
        
        
         $bilty->receiver_id = $receiverName;
         $bilty->receiverphone_id = $req->input('receiver_no');
         $bilty->station_id = $req->input('karachi_to');
         $bilty->ref_1 = $req->input('reference1');
         $bilty->ref_2 = $req->input('reference2');
         $bilty->rent = $req->input('rent');
         $bilty->labour = $req->input('Labour');
         $bilty->tt = $req->input('tt');
         $bilty->local_charges = $req->input('local_charges');
         $bilty->crane_charges  = $req->input('lifter');
         $bilty->home_delivery = $req->input('home_delivery');
         $bilty->other_charges = $req->input('other_charges');
         $bilty->by_type  = $req->input('calType');
          $bilty->biltymake_from = "advance";

         $bilty->total_charges = $req->input('total_amount');
         $bilty->advance = $req->input('advance');
         $bilty->balance = $req->input('balance');

         $delivery_address = '';
         if($req->input('delivery_mode') == "home_delivery"){
          $delivery_address = $req->input('home_delivery_address');
         }
         else{
          $delivery_address = $req->input('good_transport_address');
         }

         $bilty->note = $req->input('note');
         $bilty->delivery_mode = $req->input('delivery_mode');
         $bilty->delivery_address = $delivery_address;

        // $bilty->remarks = $req->input('package');
         
        
           
          $bilty->save();

          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $brand = $req->input('brand');
          $rate = $req->input('rate');
          $weight = $req->input('weight');

          foreach ($quantity as $key => $value) {
             $biltymeta = new Biltymeta;
             $biltymeta->quantity = $value;
             $biltymeta->packing_id = $packing[$key];
             $biltymeta->description = $good[$key];
             $biltymeta->brand = $brand[$key];  
             $biltymeta->rate = $rate[$key];  
             $biltymeta->weight = $weight[$key];
            
             $biltymeta->bilty_id = $bilty->id;
             $biltymeta->save(); 
          }
         

        if(!empty($req->savenprint)){
          // $this->pdf($bilty->id);
          return back()->with(['message'=>"Bilty Added Successfull","print"=>$bilty->id]);
        }
        else{
          return back()->with(['message'=>"Bilty Added Successfull"]);
        }
     }


     public function editadvance($id)
       {
      
         $bilty = Biltys::with('getbiltymeta')->with('getsender')
                  ->with('getreceiver')->with('stationdetail')->with('getreceiverphone')->with('getreceiverphone')->with('getsenderphone')->where('id',$id)->first();
       $biltymeta = Biltymeta::with('getpackagedata')->where('bilty_id',$id)->get(); 
      
       
        $sender = Customer::with('phoneno')->get(); 
        //if sender is not enter manually
        if($bilty->sender_id!=0){  
        $station =  Stations::where('customer_id', $bilty->sender_id)->get();
        $packages =  Package::with('packages_metas')->where('customer_id', $bilty->sender_id)->get();
        }
        //if sender is enter manually
        if($bilty->sender_id==0){  
        $station =  Stations::all();
        $packages =  Package::with('packages_metas')->get();
        }
       
        $generatedid = Biltys::orderBy('id','desc')->first();
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

         return view('mehmoodgoodemployee/bilty/editadvance')->with(compact('sender',$sender,'bilty',$bilty,'station',$station,'biltymeta',$biltymeta,'packages',$packages));
        }

         public function viewadvance($id)
       {
      
       $bilty = Biltys::with('getbiltymeta')->with('getsender')
                  ->with('getreceiver')->with('stationdetail')->with('getreceiverphone')->with('getreceiverphone')->with('getsenderphone')->where('id',$id)->first();
       $biltymeta = Biltymeta::with('getpackagedata')->where('bilty_id',$id)->get(); 
       
       $receiver = Customer::with('phoneno')->where('customer_type',"ToPay")->get();
        $sender = Customer::with('phoneno')->with('userpackage')->with('userstation')->where('customer_type', "ToPay")->get();   
        $station =  Stationdetail::get();
        $generatedid = Biltys::orderBy('id','desc')->first();
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

         return view('mehmoodgoodemployee/bilty/viewadvance')->with(compact('receiver',$receiver,'sender',$sender,'bilty',$bilty,'station',$station,'biltymeta',$biltymeta));
        }

        public function updateadvancebilty(Request $req)
          {
       //  dd($_POST);
           $id = $req->input('computer');
        /*$Validation = $req->validate([
             'computer' => 'required',
              'bilty' => 'required',
               'date' => 'required', 
               'sender_name' => 'required',
               'sender_no' => 'required',
               'karachi_to' => 'required',
                'receiver_name' => 'required',
               'receiver_no' => 'required',
               'reference1' => 'required',
               'reference2' => 'required',
               'rent' => 'required',
               'Labour' => 'required',
               'tt' => 'required',
               'local_charges' => 'required',
               'lifter' => 'required',
               'home_delivery' => 'required',
               'other_charges' => 'required',
               'total_amount' => 'required',
               'advance' => 'required',
                'balance' => 'required',
              
           ]); */
        
         $bilty = Biltys::whereId($id)->first();
         
         $bilty->bilty_no = $req->input('bilty');
         $bilty->bilty_type = $req->input('biltytype');
          $bilty->date = date('Y-m-d',strtotime($req->input('date')));
         $bilty->sender_id = $req->input('sender_name');
         $bilty->senderphone_id = $req->input('sender_no');
         $bilty->receiver_id = $req->input('receiver_name');
         $bilty->receiverphone_id = $req->input('receiver_no');
         $bilty->station_id = $req->input('karachi_to');
         $bilty->ref_1 = $req->input('reference1');
         $bilty->ref_2 = $req->input('reference2');
         $bilty->rent = $req->input('rent');
         $bilty->labour = $req->input('Labour');
         $bilty->tt = $req->input('tt');
         $bilty->local_charges = $req->input('local_charges');
         $bilty->crane_charges  = $req->input('lifter');
         $bilty->home_delivery = $req->input('home_delivery');
         $bilty->other_charges = $req->input('other_charges');

         $bilty->total_charges = $req->input('total_amount');
         $bilty->advance = $req->input('advance');
         $bilty->balance = $req->input('balance');

        // $bilty->remarks = $req->input('package');
         if($req->input('sender_name')==0)
         {
          $bilty->sender_name = $req->input('manual_sender');
          $bilty->sender_no = $req->input('manual_senderno');
          $bilty->sender_id = 0;
          $bilty->senderphone_id = 0;
         }
         if($req->input('receiver_name')==0)
          {
          $bilty->receiver_name = $req->input('manual_receiver');
          $bilty->receiver_no = $req->input('manual_receiverno');
          $bilty->receiver_id = 0;
         $bilty->receiverphone_id = 0;
          
          }
        
        
          $bilty->update();
          //for saving in biltymeta
          $quantity = $req->input('quantity');
          $packing = $req->input('packing');
          $good = $req->input('good');
          $brand = $req->input('brand');
          $rate = $req->input('rate');
          $weight = $req->input('weight');
          $biltymeta = Biltymeta::where(['bilty_id'=>$id])->delete();
          foreach ($quantity as $key => $value) {
             $biltymeta = new Biltymeta;
             $biltymeta->quantity = $value;
             $biltymeta->packing_id = $packing[$key];
             $biltymeta->description = $good[$key];
             $biltymeta->brand = $brand[$key]; 
             $biltymeta->rate = $rate[$key];  
             $biltymeta->weight = $weight[$key];
            
             $biltymeta->bilty_id = $bilty->id;
             $biltymeta->save(); 
          }

        
        return back()->with('message',"Bilty Updated Successfully");
      
     }


   public function senderphone(Request $req){
        $customer_id = $req->input('id');
        $customerdata = CustomerPhoneno::where(['customer_id'=>$customer_id])->get();
        return $customerdata;
    }

    public function senderstation(Request $req){
        $customer_id = $req->input('id');
        $stationdata = Stations::where(['customer_id'=>$customer_id])->get();
        return $stationdata;
    }

    public function senderpackage(Request $req){
        $customer_id = $req->input('id');
        $package = Package::where(['customer_id'=>$customer_id])->get();
        return $package;
    }

     public function getratelist(Request $req){
        $customer_id = $req->input('customer_id');
        $station_id  = $req->input('station_id');
        $package_id  = $req->input('pack_id');
       
       $query = Ratelist::where(['customer_id'=>$customer_id,'station_id'=>$station_id])->first();
       
       $ratevalue = RatelistValue::with('packagevalue')->where(['ratelist_id'=>$query->id,'package_id'=>$package_id])->get();
        
        return  $ratevalue;
    }

    public function biltyReport(){
      return view('bilty_report/biltyreport');
    }

    public function generatepdf(Request $request){
      $request->validate([
        'customer_type'  => 'required',
        'from_date'      => 'required|date',
        'to_date'        => 'required|date',
      ]);
      
      $data['start_date']    = date('Y-m-d', strtotime($request->from_date));
      $data['end_date']      = date('Y-m-d', strtotime($request->to_date));
      $data['customer_type'] = $request->customer_type;
      
      if($data['customer_type'] == "all"){
        $data['bilty'] = Biltys::with('getsender')->with('getreceiver')->with('getbiltymeta')
          ->whereBetween('created_at', [$data['start_date'], $data['end_date']])
          ->get();
      } 
      else {
        $data['bilty'] = Biltys::with('getsender')->with('getreceiver')->with('getbiltymeta')
          ->whereBetween('created_at', [$data['start_date'], $data['end_date']])
          ->where('bilty_type', $data['customer_type'])->get();
      }
     // PDF::SetTitle('Bilty Report');
      //PDF::SetFont('freeserif', '', 12, '', true);
      //PDF::AddPage();
      //PDF::writeHTML(view('bilty_report/biltypdf',$data)->render(),true, 0, true, 0);
      //return PDF::Output('Bilty Report.pdf'); 
return redirect()->back();
    }


}
