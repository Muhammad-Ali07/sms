<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class stationController extends Controller
{

    public function add_sub_station_process(Request $reqst){
        // dd($reqst->all());
         $rules = [
            'station' => 'required',
            'sub_stations.*' => 'required',
        ];
         $validatedData = $reqst->validate($rules);
         if($validatedData){
            for($i = 0; $i < count($reqst->sub_stations); $i++){
            $insert = DB::table('substation')->insert([
        
                'stationID' => $reqst->station,
                'stationName' => $reqst->sub_stations[$i],
            ]);
         }
    }
    // Return a JSON response with a success message
        return response()->json(['message' => 'Sub stations added successfully!'], 200);
    // return redirect('substation');
    }

    public function sub_station(){

    $station = DB::table('now_station')
    ->where('is_delete',1)
    ->get();
    
    
    $viewsub = DB::table('now_station')
    ->join('substation','now_station.id','substation.stationID')->get();
    
    // dd($viewsub);
        return view('station.substation',compact('station','viewsub'));
    }

    public function view_station_details($id){
        
$stataion = DB::table('now_station')
->where('id',$id)
->first();

$stataionPhone = DB::table('now_phone')
->where('customerid',$id)
->where('type','station')
->get();


$stataionAddress = DB::table('now_address')
->where('customerid',$id)
->where('type','station')
->get();


$stataioncharges = DB::table('station_charges')
->where('station_id',$id)
->get();





return view('station.view-station-detail',compact('stataion','stataionPhone','stataionAddress','stataioncharges'));


}






    public function add_station(){
        $data = [];
        
        $viewsub = DB::table('now_station')
            ->join('substation','now_station.id','substation.stationID')->get();
        $stations = DB::table('now_station')->where('is_delete',1)->get();
        
        $data['viewsub'] = $viewsub;
        $data['stations'] = $stations;
        return view('station.add',compact('data'));
    }

     public function add_station_process(Request $request){
        // dd($request->all());
        $stationtype   = $request->StationTypes;
        // $station_id   = $request->station_id;
        $name         = $request->name;
        $phones       = implode(',',$request->phones);
        $address      = implode(',',$request->address);
        $concern_person = implode(',',$request->concern_person);

        $last_id = DB::table('now_station')->insertGetId([

         //   'station_id'      => $station_id ,
            'station_type_name' =>$request->StationTypes,
            'name'              => $name,
            'phones'            => $phones,
            'address'           => $address,
            'concern_person'    => $concern_person
          ]);

        return redirect('add-station');
    }

    public function add_customer_to_station(){
        $sender      = DB::table('now_customer')->get();
        $station_type = DB::table('station_type')->get();
        $stations = DB::table('now_station')->get();

      return view('station.station_to_customer',compact('sender','station_type','stations'));
    }
    public function add_customer_station_process(Request $req){

            if($req->input('insertdata')){

            $sender_id        = $req->input('sender');
            $station_id       = $req->input('station');
            $station_type     = $req->input('stationType');
            $medicine_small   = $req->input('msmall');
            $medicine_large   = $req->input('mlarge');
            $sample_small     = $req->input('ssmall');
            $sample_large     = $req->input('slarge');
            $ctn_rate         = $req->input('ctn_rate');
            $rate_kg          = $req->input('rate_kg');
            $other            = $req->input('otherRate');
            $date             = $req->input('date');
            $pkgdate          = date('Y-m-d',strtotime($date));

            $data = array(
                "medicine_small"=>"$medicine_small",
                "medicine_large"=>"$medicine_large",
                "sample_small"=>"$sample_small",
                "sample_large"=>"$sample_large",
                "ctn_rate"=>$ctn_rate,
                "rate_kg"=>"$rate_kg",
                "other"=>$other,
                "Date" => $pkgdate,
                "fk_sender_id"=>"$sender_id",
                "fk_station_id"=>"$station_id",
                "fk_station_type"=>"$station_type"
            );

            $chk['check'] = DB::table('pkg_price')->where('fk_sender_id',$sender_id)->where('fk_station_id',$station_id)->get();
            if($chk['check'] != false){
                $check = sizeof($chk['check']);
                if($check > 0){
                    // return redirect('sender_stations')->with('error', 'An Existing Record Found.');
                    return redirect()->back()->with('error', 'An Existing Record Found.');
                }
                else{
                    DB::table('pkg_price')->insert($data);
                    // return redirect('sender_stations')->with('message', 'Record inserted successfully.');
                    return redirect()->back()->with('message', 'Record inserted successfully.');


                }
            }
        }
        else if($req->input('updatedata')){

            $id=$req->input('id');
            $sender_id=$req->input('sender');
            $station_id=$req->input('station');
            $station_type=$req->input('stationType');
            $medicine_small=$req->input('msmall');
            $medicine_large=$req->input('mlarge');
            $sample_small=$req->input('ssmall');
            $sample_large=$req->input('slarge');
            $ctn_rate=$req->input('ctn_rate');
            $rate_kg=$req->input('rate_kg');
            $other = $req->input('otherRate');
            $date = $req->input('date');
            $pkgdate = date('Y-m-d',strtotime($date));
            $olddata = DB::table('pkg_price')->where('pkg_id',$id)->first();



            $dataold = array(
                "medicine_small"=>"$olddata->medicine_small",
                "medicine_large"=>"$olddata->medicine_large",
                "sample_small"=>"$olddata->sample_small",
                "sample_large"=>"$olddata->sample_large",
                "ctn_rate"=>"$olddata->ctn_rate",
                "rate_kg"=>"$olddata->rate_kg",
                "other"=> $olddata->other,
                "Date" => $olddata->Date,
                "fk_sender_id"=>"$olddata->fk_sender_id",
                "fk_station_id"=>"$olddata->fk_station_id",
                "fk_station_type"=>"$olddata->fk_station_type",
                 'fkpkg_id'  =>  $id,
            );

            DB::table('pkg_price_history')->insert($dataold);


            $data = array(
                "medicine_small"=>"$medicine_small",
                "medicine_large"=>"$medicine_large",
                "sample_small"=>"$sample_small",
                "sample_large"=>"$sample_large",
                "ctn_rate"=>"$ctn_rate",
                "rate_kg"=>"$rate_kg",
                "other"=>$other,
                "Date" => $pkgdate,
                "fk_sender_id"=>"$sender_id",
                "fk_station_id"=>"$station_id",
                "fk_station_type"=>"$station_type"
            );


            $builtypaid = DB::table('paid_bilty')->where(['station_type_id'=>$station_type,'fk_customer_id'=>$sender_id,'bilty_station_id'=>$station_id,])->whereDate('bilty_date', '>', $pkgdate)->get();



           if(isset($builtypaid))
           {
              foreach ($builtypaid as $record)
              {


                      if($data['medicine_small']!=""||$data['medicine_large']!="")
                      {

                      $largerate = $record->bilty_large*$medicine_large;
                      $smallrate = $record->bilty_small*$medicine_small;
                      $totalrate = $largerate+$smallrate;
                      $rate  = "";
                      $category =  "Medicine";


                      DB::table('paid_bilty')
                          ->where('bilty_id', $record->bilty_id)
                          ->update(['bilty_total' => $totalrate,'bilty_category'=>$category,
                                     'rate'=>$rate]);

                      }
                      if($data['sample_small']!=""||$data['sample_large']!="")
                      {

                      $largerate = $record->bilty_large*$sample_large;
                      $smallrate = $record->bilty_small*$sample_small;

                      $totalrate = $largerate+$smallrate;
                      $category =  "Sample";
                       $rate  = "";

                      DB::table('paid_bilty')
                          ->where('bilty_id', $record->bilty_id)
                          ->update(['bilty_total' => $totalrate,'bilty_category'=>$category,'rate'=>$rate]);

                      }
                      if($data['ctn_rate']!="")
                      {

                      $ctnrate = $record->ctn_qty*$ctn_rate;
                      $totalrate = $ctnrate;
                      $category =  "Carton";
                      $largerate = "";
                      $smallrate = "";


                      DB::table('paid_bilty')
                          ->where('bilty_id', $record->bilty_id)
                          ->update(['bilty_total' => $totalrate,'rate'=>$ctn_rate,'bilty_category'=>$category]);

                      }
                      if($data['rate_kg']!="")
                      {

                      $otherrate = $record->weight*$rate_kg;
                      $totalrate = $otherrate;
                      $category =  "Weight";
                      $largerate = "";
                      $smallrate = "";



                      DB::table('paid_bilty')
                          ->where('bilty_id', $record->bilty_id)
                          ->update(['bilty_total' => $totalrate,'rate'=>$rate_kg,
                         'bilty_category'=>$category]);

                      }
                      if($data['other']!="")
                      {

                       $otherrate = $record->weight*$other;
                       $totalrate = $otherrate;
                       $category =  "Other";
                       $largerate = "";
                      $smallrate = "";

                      DB::table('paid_bilty')
                          ->where('bilty_id', $record->bilty_id)
                          ->update(['bilty_total' => $totalrate,'rate'=>$other,
                         'bilty_category'=>$category]);

                      }
              }

              DB::table('pkg_price')->where('pkg_id',$id)->update($data);
              return redirect('sender_stations')->with('message', 'Record Updated Successfully.');
           }
       }
    }

    public function view_customer_to_station(){

        $data['price'] = DB::table('pkg_price')->join('now_station','now_station.id','=','pkg_price.fk_station_id')->join('now_customer','now_customer.id','=','pkg_price.fk_sender_id')->join('station_type','station_type.station_type_id','=','now_station.fk_station_type')->get();
        return view('station.station_customers',$data);
    }

    public function view_station(){

          $stations = DB::table('now_station')->where('is_delete',1)->get();
          return view('station.view',compact('stations'));
    }


public function index(Request $request)
{
    // Start building the query
    $query = DB::table('now_station')->where('is_delete', 1);

    // Check if search parameters are present and apply filters
    if ($request->has('name')) {
        $query->where('name', 'like', '%' . $request->input('name') . '%');
    }

    if ($request->has('phone')) {
        $query->where('phones', 'like', '%' . $request->input('phone') . '%');
    }

    if ($request->has('concern_person')) {
        $query->where('concern_person', 'like', '%' . $request->input('concern_person') . '%');
    }

    if ($request->has('station_type')) {
        $query->where('station_type_name', 'like', '%' . $request->input('station_type') . '%');
    }

    // Execute the query and get the results
    $stations = $query->get();

    // Pass the results to the view
    return view('station.view', compact('stations'));
}


public function editstation($id){

    $editstation = DB::table('now_station')
    ->where('id', $id)
    ->first();

    $address = DB::table('now_address')
    ->where('customerid', $id)
    ->where('type','station')
    ->get();

    $phone = DB::table('now_phone')
    ->where('customerid', $id)
    ->where('type', 'station')
    ->get();

    $charges = DB::table('station_charges')
    ->where('station_id', $id)
    ->get();



        return view ('station.addform',compact('editstation','address','phone','charges'));
}


public function saveeditstation(Request $req){


    $station_id = $req->station_id;
    $name       = $req->name;
    $type       = $req->StationTypes;
    $phones       = implode(',',$req->phones);
    $address      = implode(',',$req->address);
    $update1 = DB::table('now_station')->where('id', $station_id)->update([
        'name'              => $name,
        'station_type_name' =>$type,
        'phones'            => $phones,
        'address'           => $address
    ]);
        return redirect('add-station');
    }



public function delete_station($id){

    $update1 = DB::table('now_station')
    ->where('id', $id)
    ->update([
        'is_delete' => 0,

    ]);

    return redirect('view-station');

}

    public function station_builty(Request $request)
    {

        $builties = DB::table('now_builty')->where('date',$request->date)->where('to',$request->to)->where('self_company',session('company')[0]->id)->get();
        // $manualbook = DB::table('manual_book')->where('station',$request->to)->get();
    //   return 'data';
        return view('challan.station_builty',compact('builties'));
    }

    public function filter_builty(Request $request)
    {
        $builties = DB::table('now_builty')->whereBetween('date',[$request->from,$request->to])->get();

        return view('challan.station_builty',compact('builties'));
    }

    public function add_description(){
        $descriptions = DB::table('description')->get();
        return view('station.add-description',compact('descriptions'));
    }

    public function add_description_process(Request $request){

         DB::table('description')->insert([
        'name'              => $request->name,

    ]);
        return redirect()->back();
    }
}

