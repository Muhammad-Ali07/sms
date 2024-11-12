<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    
    public function Edit_vehicle_Replacement($id){
    
    $query = DB::table('vehicle_part_replace')->where('id',$id)->first();
     $vehicles = DB::table('vehicles')->where('INTruck',1)->get();  
       $view = DB::table('vehicle_part_replace')->get();  
     return view('garage/accident-maintenance',compact('vehicles','view','query'));

    }
    
   public function Edit_vehicle_expense($id){
    $query = DB::table('garage_inventory_data')->where('id',$id)->first();
    $data=DB::table('category')->where('Name',$query->shopName)->get();
    $colum=DB::table('autoshop')->get();
    $selectAll = DB::table('garage_inventory_data')
    ->where('is_delete',1)
    ->where('status','Expense')->get();
    $vehicles = DB::table('vehicles')->where('INTruck',1)->get();  
    return view('garage.add_garage',compact('vehicles','colum','data','selectAll','query'));    
   } 
   
   
   
    public function Edit_vehicle_Accident($id){
    $query = DB::table('garage_inventory_data')->where('id',$id)->first();
    $data=DB::table('category')->where('Name',$query->shopName)->get();
    $colum=DB::table('autoshop')->get();
    $selectAll = DB::table('garage_inventory_data')
    ->where('is_delete',1)
    ->where('status','Accident')->get();
    $vehicles = DB::table('vehicles')->where('INTruck',1)->get();  
    return view('garage.accidentmanagement',compact('vehicles','colum','data','selectAll','query'));    
   } 
   
   
   
   
   
   
   
    public function garage_reports(){
        
    $vehicles = DB::table('garage_inventory_data')
    ->Distinct('Truck_Name')
    ->select('Truck_Name')    
    ->get();    
   
        return view('garage.reports',compact('vehicles'));
    }
    
    
public function garagereportgenerate(Request $req){
//dd($req->all());
 if($req->companyName !='' AND $req->From !='' AND $req->to !='' AND $req->type !='' ){
    $viewReports =DB::table('garage_inventory_data')
    ->orderBy('id','desc')
    ->where('Truck_Name',$req->companyName)
    ->whereBetween('Garage_date',[$req->From,$req->to])
    ->where('status',$req->type)
    ->get();    
 }
 
 
 
  if($req->companyName !='' AND $req->From =='' AND $req->to =='' AND $req->type =='' ){
    $viewReports =DB::table('garage_inventory_data')
    ->orderBy('id','desc')
    ->where('Truck_Name',$req->companyName)
    ->get();    
 }
 
 if($req->companyName =='' AND $req->From !='' AND $req->to !='' AND $req->type !=''){
$viewReports =DB::table('garage_inventory_data')->whereBetween('Garage_date',[$req->From,$req->to]) ->where('status',$req->type)
    ->orderBy('id','desc')
    ->get();    
 }
 
  if($req->companyName !='' AND $req->From !='' AND $req->to !='' AND $req->type ==''){
$viewReports =DB::table('garage_inventory_data')->whereBetween('Garage_date',[$req->From,$req->to])->where('Truck_Name',$req->companyName)
    ->orderBy('id','desc')
    ->get();    
 }
 
  if($req->companyName =='' AND $req->From !='' AND $req->to !='' AND $req->type ==''){
$viewReports =DB::table('garage_inventory_data')->whereBetween('Garage_date',[$req->From,$req->to])
    ->orderBy('id','desc')
    ->get();    
 }
 
  $vehicles = DB::table('garage_inventory_data')
    ->Distinct('Truck_Name')
    ->select('Truck_Name')    
    ->get();    
return view('garage.reports',compact('vehicles','viewReports'));
}
    
public function accidentvehicles(){
   $data=DB::table('category')->get();
   $colum=DB::table('autoshop')->get();
   $selectAll = DB::table('garage_inventory_data')
    ->where('is_delete',1)
   ->where('status','Accident')->get();
   $vehicles = DB::table('vehicles')->where('INTruck',3)->get();    
    
    return view('garage.accidentmanagement',compact('vehicles','colum','data','selectAll'));
}    
    
    public function add_new_garage(){
    $data=DB::table('category')->get();
    $colum=DB::table('autoshop')->get();
    $selectAll = DB::table('garage_inventory_data')
     ->where('is_delete',1)
    ->where('status','Expense')->get();
    $vehicles = DB::table('vehicles')->where('INTruck',1)->get();  
    return view('garage.add_garage',compact('vehicles','colum','data','selectAll'));    
    }
    
    public function save_add_new_garage(Request $req){
        for($i = 0; $i < count($req->Details); $i++){
      DB::table('garage_inventory_data')->insert([
          'garage_inventory'=>$req->Details[$i] ,
           'Garage_date'=> date('Y-m-d'), 
            'Truck_Name'=> $req->vehicleNo,
             'Amount'=>$req->amount[$i],
              'status'=>'status',
              
    ]);
        }
        return redirect('add-new-garage');
    }
    
 public function data_garage(){   

   return redirect('trip-garage');  
     
 }
 public function trip_garage(){

    $inventorydata=DB::table('garage_inventory_data')
    ->where('is_delete',1)
    ->get();
    
     $item=DB::table('inventory_data')
    ->get();
  
     return view('garage/trip',compact('item','inventorydata'));
     
 }
 
 
 public function delete_vehicle_expense($id){
    DB::table('garage_inventory_data')->where('id',$id)->update([
        'is_delete' => 0,
        ]);
        
      return redirect('garage');
 }
 
 
 public function trip_garage_process(Request $request){
if(!empty($request->queryID)){
$Amount   = $request->garageamount[0];
$itemName = $request->itemName[0];
$quantity = $request->Quantity[0];
$total = $Amount *  $quantity;
 DB::table('garage_inventory_data')->where('id',$request->queryID)->update([
     'garage_inventory' =>$itemName,
     'Truck_Name' => $request->vehicleNo,
     'UnitPrice' => $Amount,
     'Quantity' => $quantity,
     'Amount' => $total,
     'shopName' => $request->garageauto,
     ]);
    return redirect('garage');
}

else{
if($request->garageauto == ''){
  DB::table('vehicles')->where('id',$request->vehicleNo)->update([
    'INTruck' => 1,
    ]);   
    return redirect('garage');  
    
}
else{
if($request->vehiclestatus == 'Active'){
DB::table('vehicles')->where('id',$request->vehicleNo)->update([
    'INTruck' => 1,
    ]);   
}


if($request->accident == 1){
    $stauts = 'Accident';
    
}
else{
    $stauts = 'Expense';
}
//dd($request->all());
 
$tatal = [];  
$tatal2 = [];  
for($i =0; $i < count($request->itemName); $i++){
$total = $request->Quantity[$i] * $request->garageamount[$i];  
$total2[] = $request->Quantity[$i] * $request->garageamount[$i];  
$insert = DB::table('garage_inventory_data')->insert([ 
            'garage_inventory'      => $request->itemName[$i],
            'Garage_date'           => date('Y-m-d'),
            'Truck_Name'            => $request->vehicleNo,
            'Quantity'              => $request->Quantity[$i],
            'UnitPrice'             =>  $request->garageamount[$i],    
            'Amount'                => $total,
            'status'                => $stauts,
            'shopName'              => $request->garageauto,
    ]);
}

$garageshop =  DB::table('garage_shop_amount')->where('ShopCode',$request->garageauto)->first();
$totalamount = array_sum($total2);
if(!empty($garageshop->Amount)){
$found = $garageshop->Amount;
$nettotal =  $found + $totalamount;
DB::table('garage_shop_amount')->where('ShopCode',$request->garageauto)->update([
'Amount' =>$nettotal,
]);    
}
else{
   DB::table('garage_shop_amount')->insert([
       'ShopCode' => $request->garageauto,
       'Amount' =>$totalamount,
       ]);
}


if($request->vehiclestatus == 'Active'){
DB::table('vehicles')->where('id',$request->vehicleNo)->update([
    'INTruck' => 1,
    ]);   
    
    return redirect('garage');
}

if($stauts == 'Expense'){
return redirect('garage');
}

else{
return redirect('accidentvehicles');
}
     
 }
}
}


public function save_acident_garage(Request $req){
if(!empty($req->queryid)){
$from = $req->from_vehicle;
$TO = $req->to_vehicle;
$item = $req->item[0];
$qty = $req->qty[0];
$Amount = $req->Amount[0];
DB::table('vehicle_part_replace')->where('id',$req->queryid)->update([
'Fromvehicle' => $from,
'Tovehicle' => $TO,
'Itemcode' => $item,
'qty' => $qty,
'Amount' => $Amount,
]);   
}
else{
for($i =0; $i < count($req->item); $i++){
DB::table('vehicle_part_replace')->insert([
   'Fromvehicle' =>$req->from_vehicle,
   'Tovehicle' =>$req->to_vehicle,
   'Itemcode' =>$req->item[$i],
   'qty' =>$req->qty[$i],
   'Amount' =>$req->Amount[$i],
]);
}
}
return redirect('vehicle-garage');
}


 public function acident_garage(){
      $vehicles = DB::table('vehicles')->where('INTruck',1)->get();  
       $view = DB::table('vehicle_part_replace')->get();  
     return view('garage/accident-maintenance',compact('vehicles','view'));
     
 }
 public function delete_garage($id){


 $update1 = DB::table('garage_inventory_data')
    ->where('id', $id)
    ->update([
        'is_delete' =>0,
      
    ]);
    return redirect('trip-garage');

 }
  public function edit_garage($id){

  $query = DB::table('garage_inventory_data')
  ->where('id',$id)
  ->first();

  $item=DB::table('inventory_data')
    ->get();
  $inventorydata=DB::table('garage_inventory_data')
  ->where('is_delete',1)
  ->get();

  return view('garage/trip',compact('query','item','inventorydata'));
  }
  public function save_edit_garage(Request $request){

  $id                                   =$request->input('id');
  $garageinventory                      =$request->input('garageinventory');
  $companyname                          =$request->input('companyname');
  $garagedate                           =$request->input('garagedate');
  $truckname_in_out                     =$request->input('truckname_in_out');
  $garagetruckname                      =$request->input('garagetruckname');
  $oillitre                             =$request->input('oillitre');
  $garageamount                         =$request->input('garageamount');


    $insert = DB::table('garage_inventory_data')
    ->where('id',$id)
    ->update([


  'garage_inventory'          =>$garageinventory,
  'Company_Name'              =>$companyname,
  'Garage_date'               =>$garagedate,
  'Truck_In_Out'              =>$truckname_in_out,
  'Truck_Name'                =>$garagetruckname,
  'Litre'                    =>$oillitre,
    'Amount'                  =>$garageamount,
    ]);
return redirect('trip-garage');
 }
 
    public function get_autoshop_categories(Request $request){
    $garagecategory = DB::table('category')->where('Name',$request->values)->select('id','Des')->get();
    return view('inventory.check',compact('garagecategory'));
    }
 
 }