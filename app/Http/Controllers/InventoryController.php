<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    
    
    public function saveeditpurchaseinventory(Request $reqst){
   // dd($reqst->all());
    $companyName = $reqst->companyName;
    $purchasedate= $reqst->purchasedate;
    $invoice = $reqst->invoice;
    $code = $reqst->itemName;
    $purchaserate = $reqst->purchaserate;
    $purchasequantity = $reqst->purchasequantity;
    
    $products = DB::table('inventory_data')->where('id',$code)->first();        
    $old = DB::table('puchase_inventory')->where('id',$reqst->id)->first(); 
      $productwarehouse = $products->warehouse;
    $oldvalue = $old->purchase_quantity;
    $productcapacity = $products->Capacity;
    $olddelvalue =  $oldvalue * $productcapacity;

     $deduct = $products->InvQuantity - $olddelvalue;
     
     
    $newvalue = $purchasequantity * $productcapacity;
    
     
    $final = $newvalue + $deduct;

   $amount = $purchasequantity * $purchaserate;
    $update =DB::table('puchase_inventory')->where('id',$reqst->id)->update([
        'purchase_company_name' => $companyName,
        'purchase_date'=> $purchasedate,
        'purchase_rate'=> $purchaserate,
        'purchase_quantity'=>$purchasequantity,
        'purchase_amount'=> $amount,
        'invoice'=>$invoice,
        'pcode'=>$code,
    ]);
    
 $updatequantity = DB::table('inventory_data')->where('id',$code)->update([
        'InvQuantity'=> $final
     ]);   
    
    return redirect('purchase-inventory');
    }
    
    public function editpurchaseinentory($id){
      $select = DB::table('puchase_inventory')->where('id',$id)->first();
        $comp=DB::table('inventory_data')
        ->join('category','inventory_data.inventory_name','category.id')
        ->join('autoshop','category.Name','autoshop.id')
        ->select('inventory_data.id as Cid','category.Des as Cname','inventory_data.rate as Rate',
        'inventory_data.InvQuantity as Quantity','autoshop.ShopName as Shop')
        ->where('inventory_data.InvQuantity','>','0')
        ->get();
        
        
        $comp=DB::table('inventory_data')
        ->join('category','inventory_data.inventory_name','category.id')
        ->join('autoshop','category.Name','autoshop.id')
        ->select('inventory_data.id as Cid','category.Des as Cname','inventory_data.rate as Rate',
        'inventory_data.InvQuantity as Quantity','autoshop.ShopName as Shop')
        ->where('inventory_data.InvQuantity','>','0')
        ->get(); 
   
   $autoshop = DB::table('autoshop')
   ->where('is_delete',1)
   ->get(); 
    
    $invent=DB::table('puchase_inventory')
    ->join('category','puchase_inventory.pcode','category.id')
    ->select('puchase_inventory.id','Des','purchase_company_name','purchase_date','purchase_rate','purchase_quantity','purchase_amount','invoice')
    ->where('puchase_inventory.is_delete',1)
    ->get();
        
        return view('inventory.purchase-inventory',compact('select','comp','autoshop','invent'));
    }    
    
     public function invoices(){
    $company = DB::table('autoshop')->where('is_delete',1)->get();
    return view('inventory.purchase-invoice',compact('company'));
  }
 
  public function generateinvoice(Request $req){
   
  $comp = $req->companyName;
  $From = $req->From;
  $to = $req->to;    

  $query = DB::table('purchase_invoices')
  ->where('Company',$comp)
  ->whereBetween('Date',[$req->From,$req->to])->get();
  
    $previousbalance = DB::table('amount_payable')->where('id',$comp)->first();
  $company = DB::table('autoshop')->where('is_delete',1)->get();
  return view('inventory.purchase-invoice',compact('company','query','comp','previousbalance'));
}


public function clearshopamount($id){
$bill = DB::table('purchase_bills')->select('BillNO')->where('ShopCode',$id)->Distinct()->get();
$amount = DB::table('amount_payable')->where('id',$id)->first();   

return view('inventory.clearance',compact('bill','amount'));
}

public function saveclearshopamount(Request $req){
//dd($req->all());
if($req->method == 1){
$shop = $req->shopName;
$BillNo = $req->BillNo;
$Total = $req->Total;
$Previous = $req->Previous;
$Paid = $req->Paid;
DB::table('purchase_bills')->insert([
    'BillNO' =>$BillNo,
    'ShopCode' =>$shop,
    'Date' =>date('Y-m-d'),
    'method'=> 'Cash',
    'Amount'=> $Paid, 
]);
$amountpaid = $Total - $Paid;
$updated = DB::table('amount_payable')->where('shopcode',$shop)->update(['Amount'=> $amountpaid,]);   
}

else if($req->method == 2){
$shop = $req->shopName;
$BillNo = $req->BillNo;
$Total = $req->Total;
$Previous = $req->Previous;
$totalamount = [];
for($i = 0; $i < count($req->chequeAmount); $i++){
$totalamount[] = $req->chequeAmount[$i];
$imageName = $req->upload[$i]->getClientOriginalName();  
$location= $req->upload[$i]->move(public_path('cheques'), $imageName); 
DB::table('purchase_bills')->insert([
    'BillNO' =>$BillNo,
    'ShopCode' =>$shop,
    'Date' =>date('Y-m-d'),
    'method'=> 'Cheque',
    'Amount'=> $req->chequeAmount[$i], 
    'bank'=> $req->bank[$i], 
    'ChequeNO'=> $req->chequeNO[$i], 
    'Image' => $imageName,
]);    
}

$netpayable = array_sum($totalamount);
$amountpayable = DB::table('amount_payable')->where('shopcode',$shop)->first();
$amountpaid = $amountpayable->Amount - $netpayable;
$updated = DB::table('amount_payable')->where('shopcode',$shop)->update(['Amount'=> $amountpaid,]);  
}

else if($req->method == 3){
//dd($req->all());
$shop = $req->shopName;
$BillNo = $req->BillNo;
$Balance = $req->Total;

$nettotal = $Balance - $req->TransferAmount;
DB::table('purchase_bills')->insert([
    'BillNO' =>$BillNo,
    'ShopCode' =>$shop,
    'Date' =>date('Y-m-d'),
    'method'=> 'Transfer',
    'Amount'=> $req->TransferAmount, 
    'FromBank'=> $req->Fbank,
    'FromAccount'=> $req->Faccount, 
    'ToBank' => $req->TBank,
    'ToAccount' => $req->Taccount, 
]);    
$updated = DB::table('amount_payable')->where('shopcode',$shop)->update(['Amount'=>$nettotal,]);  
}





return redirect('invoices');
}

public function savegenerateinvoice(Request $req){
//dd($req->all());
  for($i = 0; $i < count($req->invoices); $i++){
      $ids[] = $req->invoices[$i];
  }
$InvoiceAmount = DB::table('purchase_invoices')->whereIn('id',$ids)->sum('Amount');
$Bill = DB::table('purchase_bills')->orderBy('id','desc')->limit(1);   
if($Bill->first() != ''){
  $billNo = $Bill->limit(1)->first()->BillNO + 1;  
}
else{
  $billNo = 50000;
} 
$privious = DB::table('amount_payable')->where('shopcode',$req->comp)->first();


$shopName = DB::table('autoshop')->select('ShopName','id')->where('id',$req->comp)->first();
return view('inventory.bill',compact('InvoiceAmount','billNo','privious','shopName','ids'));
}

public function clearBill(Request $req){
//dd($req->all());

if($req->method == 1){
$shop = $req->shopName;
$BillNo = $req->BillNo;
$Total = $req->Total;
$Previous = $req->Previous;
$Paid = $req->Paid;

DB::table('purchase_bills')->insert([
    'BillNO' =>$BillNo,
    'ShopCode' =>$shop,
    'Date' =>date('Y-m-d'),
    'method'=> 'Cash',
    'Amount'=> $Paid, 
]);
for($i = 0; $i < count($req->invoices); $i++){
DB::table('purchase_invoices')->where('id',$req->invoices[$i])->update(['status' => 0,]);
}
$amountpayable = DB::table('amount_payable')->where('shopcode',$shop)->first();
$amountpaid = $amountpayable->Amount - $Paid;
$updated = DB::table('amount_payable')->where('shopcode',$shop)->update(['Amount'=> $amountpaid,]);   
}

else if($req->method == 2){
$shop = $req->shopName;
$BillNo = $req->BillNo;
$Total = $req->Total;
$Previous = $req->Previous;
$totalamount = [];
for($i = 0; $i < count($req->chequeAmount); $i++){
$totalamount[] = $req->chequeAmount[$i];
$imageName = $req->upload[$i]->getClientOriginalName();  
$location= $req->upload[$i]->move(public_path('cheques'), $imageName); 
DB::table('purchase_bills')->insert([
    'BillNO' =>$BillNo,
    'ShopCode' =>$shop,
    'Date' =>date('Y-m-d'),
    'method'=> 'Cheque',
    'Amount'=> $req->chequeAmount[$i], 
    'bank'=> $req->bank[$i], 
    'ChequeNO'=> $req->chequeNO[$i], 
    'Image' => $imageName,
]);    
}

$netpayable = array_sum($totalamount);
for($i = 0; $i < count($req->invoices); $i++){
DB::table('purchase_invoices')->where('id',$req->invoices[$i])->update(['status' => 0,]);
}
$amountpayable = DB::table('amount_payable')->where('shopcode',$shop)->first();
$amountpaid = $amountpayable->Amount - $netpayable;
$updated = DB::table('amount_payable')->where('shopcode',$shop)->update(['Amount'=> $amountpaid,]);  
}
return redirect('invoices');
}




  public function checkpro(Request $req){
     $id =  $req->values;
     $pro = DB::table('category')->where('Name',$id)->get();
     return view('inventory.check',compact('pro'));
   }

   public function purchase_inventory_process(Request $request){
  // dd($request->all());
   
    $totalamount = [];
    
    $companyName        =$request->companyName;
    $purchasedate       =$request->purchasedate;
    $invoice            =$request->invoice;
    $itemName           =$request->itemName;
    $purchaserate       =$request->purchaserate;
    $purchasequantity   =$request->purchasequantity;
    
    if($request->purchaserate != '' && $request->purchasequantity != ''){
    for($i = 0; $i < count($itemName); $i++ ){ 
    $totalamount[]   = $purchaserate[$i] * $purchasequantity[$i]; 
    $insert = DB::table('puchase_inventory')->insert([
      'purchase_company_name'     => $companyName,
      'purchase_date'             => $purchasedate,
      'invoice'                   => $invoice, 
      'purchase_rate'             => $purchaserate[$i],
      'purchase_quantity'         => $purchasequantity[$i],
      'purchase_amount'           => $totalamount[$i],
      'pcode'                     => $itemName[$i],]);   
    }
    
  
  for($j =0; $j < count($itemName); $j++ ){
      
    $capacity = DB::table('inventory_data')->where('id',$itemName[$j])->first();
    $capacityfound =  $capacity->Capacity;  
    $foundtotalquantity =  $capacity->InvQuantity; 
    $totalquantity = $purchasequantity[$j] * $capacityfound; 
    $netquantitywillbe = $totalquantity + $foundtotalquantity;
     DB::table('inventory_data')->where('id',$itemName[$j])->update([
        'InvQuantity' => $netquantitywillbe     
    ]); 
  }  
    
    
   $netpayable = array_sum($totalamount);
    $findshopledger = DB::table('amount_payable')->where('shopcode',$companyName)->first();
    if($findshopledger == '' ){
      DB::table('amount_payable')->insert([
          'shopcode' => $companyName, 
          'Amount' =>$netpayable,
      ]);
    }else{
      $totalnetpayable = $findshopledger->Amount + $netpayable ;
      DB::table('amount_payable')->where('shopcode',$companyName)->update([
        'Amount' =>$totalnetpayable,]);
    }
    
    $invoicefinder = DB::table('purchase_invoices')
    ->where('invoice',$invoice) 
    ->where('Company',$companyName)    
    ->first();
    
    if(!empty($invoicefinder)){
    $invoicenewtotol = $invoicefinder->Amount + $netpayable;
    
        DB::table('purchase_invoices')->where('invoice',$invoice)
        ->update([
          'Amount' => $invoicenewtotol,
            ]);
    }
    
    else{
      DB::table('purchase_invoices')->insert([
      'invoice' => $invoice, 
      'Date' =>$purchasedate,
      'Amount' => $netpayable, 
      'Company' => $companyName  
    ]);
    }
    
  }
    else{
      dd('Please Fill all the fields');
    }
   return redirect('purchase-inventory');   
   }
  public function purchase_inventory(){

    $comp=DB::table('inventory_data')
        ->join('category','inventory_data.inventory_name','category.id')
        ->join('autoshop','category.Name','autoshop.id')
        ->select('inventory_data.id as Cid','category.Des as Cname','inventory_data.rate as Rate',
        'inventory_data.InvQuantity as Quantity','autoshop.ShopName as Shop')
        ->get(); 
   
   $autoshop = DB::table('autoshop')
   ->where('is_delete',1)
   ->get(); 
    
    $invent=DB::table('inventory_data')
    ->join('category','inventory_data.inventory_name','category.id')
    ->join('puchase_inventory','inventory_data.id','puchase_inventory.pcode')
    ->select('puchase_inventory.id','Des','purchase_company_name','purchase_date','purchase_rate','purchase_quantity','purchase_amount','invoice')
    ->where('puchase_inventory.is_delete',1)
    ->get();
    return view('inventory/purchase-inventory',compact('comp','invent','autoshop'));
     }
    
    public function ExtraInventory(){
  $company=DB::table('inventory_data')
  ->where('is_delete',1)
  ->get();
  $inventory=DB::table('inventory_data')
  ->join('extrainventory','inventory_data.id','extrainventory.ItemName')
  ->where('extrainventory.is_delete',1)
  ->get();
  return view('inventory.extra',compact('company','inventory'));
}
public function ExtraInventorySave(Request $request){
$quantity = $request->quantity;
$Pname = $request->Pname;
$find = DB::table('inventory_data')->where('id',$Pname)->first();
$available = $find->InvQuantity;  
$new  = $available + $quantity;
$insert = DB::table('extrainventory')->insert([
 'Quantity' => $quantity,
 'ItemName' => $Pname,
 'Date' => date('Y-m-d')
]);
DB::table('inventory_data')->where('id',$Pname)->update([

  'InvQuantity' => $new,
]);
return redirect('extra-inventory');
}
    
    public function delete_extra($id){

      $update1 = DB::table('extrainventory')
      ->where('id', $id)
      ->update([
          'is_delete' =>0
            
      ]);
      return redirect('extra-inventory');


    }

    public function edit_extra($id){
     
      $query = DB::table('extrainventory')
      ->where('id',$id)->first();
   $company=DB::table('inventory_data')
  ->where('is_delete',1)
  ->get();
  $inventory=DB::table('inventory_data')
  ->join('extrainventory','inventory_data.id','extrainventory.ItemName')
  ->where('extrainventory.is_delete',1)
  ->get();


  //dd($query);
      return view('inventory.extra',compact('company','inventory','query'));
    }



    public function edit_extra_process(Request $request){

      //dd($request->all());
        $id            =$request->id;
        $quantity = $request->quantity;
        $Pname = $request->Pname;
      
        
        $insert= DB::table('extrainventory')
         ->where('id',$request->id)
          ->update([

            'Quantity' => $quantity,
            'ItemName' => $Pname,
        ]);   
      
        return redirect('extra-inventory');
      
    }



    
  public function save_packing(Request $req){
    DB::table('packing')->insert([
      'PackingName' => $req->PackName,
      'Category' => $req->UOM,
    ]);
      return redirect('add-packing');
  } 

public function add_packing(){
  $packing = DB::table('packing')
 ->where('is_delete',1)
  ->get();
  return view('inventory.packing',compact('packing'));
}

  public function checkpacking(Request $req){
    $id =  $req->values;
    $select = DB::table('packing')->where('Category',$id)->get();
    return view('inventory.check',compact('select'));
  }
  
   public function checkprevious(Request $req){
   
  $remainamount  = DB::table('customerPayment')
  ->where('Customer_ID',$req->values)->first();

return view('inventory.check',compact('remainamount'));
  }
  
  
  

public function add_warehouse(){
$selcet = DB::table('warehouse')
->where('is_delete',1)
->get();
  return view('inventory.warehouse',compact('selcet'));
}

public function save_warehouse(Request $req){
  DB::table('warehouse')->insert([
    'WareHouseName'=> $req->warehouse,
    'Address'=> $req->Address,

  ]);

  return redirect('add-warehouse');
}

public function edit_warehouse($id){
     
  $query = DB::table('warehouse')
  ->where('id',$id)->first();

  $selcet = DB::table('warehouse')
  ->where('is_delete',1)
  ->get();

//dd($query);
  return view('inventory.warehouse',compact('selcet','query'));
}



public function edit_warehouse_process (Request $request){

  //dd($request->all());
    $id            =$request->id;
    $warehouse = $request->warehouse;
    $Address= $request->Address;
  
    
    $insert = DB::table('warehouse')
    ->where('id',$request->id)
    ->update([

        'WareHouseName'=> $warehouse,
        'Address'=>  $Address,
    ]);   
  
    return redirect('add-warehouse');
  
}










public function add_data_inventory()
    {
        $company=DB::table('inventory_data')
         ->join('category','inventory_data.inventory_name','category.id')
         ->join('autoshop','category.Name','autoshop.id')
         ->select('inventory_data.id as Cid','category.Des as Cname','inventory_data.rate as Rate',
      'inventory_data.InvQuantity as Quantity','autoshop.ShopName as Shop')
                   
                    ->where('inventory_data.InvQuantity','>','0','')
                    
      ->get();
    
      
        $truck=DB::table('vehicles')->where('INTruck',1)->get();
        $truckout=DB::table('vehicles')->where('INTruck',0)->get();
        $walking=DB::table('vehicles')->where('INTruck',2)->get();

        $comp=DB::table('inventory_data')
        ->where('is_delete',1)
        ->get();

                      $invent=DB::table('now_inventory')
                      ->join('category','now_inventory.Pcode','category.id')
                      ->join('autoshop','category.Name','autoshop.id')
                      ->join('vehicles','now_inventory.Truckno','vehicles.id')
                      ->select('now_inventory.id','category.Des as Products','autoshop.ShopName as ShopName','vehicleno',
                      'Companyname','Quantity','now_inventory.rate','now_inventory.Total','Inventory_Date','INTruck')
                      ->where('now_inventory.is_delete',1)
                      ->get();
                      
                      
        return view ('inventory/inventory',compact('company','comp','invent','truck','truckout','walking'));
        
    }
    
    public function add_inventory()
    {
     $inventorydata = DB::table('category')
     ->join('inventory_data','category.id','inventory_data.inventory_name')
     ->get();
     

     $ware = DB::table('autoshop')->get(); 
     $comp =DB::table('category')->where('is_delete',1)->get(); 
        
        
        return view ('inventory/add-inventory',compact('inventorydata','comp','ware'));
        
    }
public function add_inventory_process(Request $request){
        // dd($request->all());
      $name                    =$request->input('nameofinventory');
      $UOM                     =$request->input('UOM');
      $quantity                =$request->input('inventoryquantity');
      $Capacity                =$request->input('Capacity');
      $date                    =date('Y-m-d');
      $rateper                 =$request->input('rateper');
      $packing                 =$request->input('packing');
      $warehouse               =$request->input('warehouse');

      $shopNames = DB::table('category')->select('Name')->where('id',$name)->first();
      
      

if($UOM == 'Piece'){

  $quantityNew =  $quantity;   
  $rate  =$rateper;    
  $total= $quantityNew  * $rate;

}     
 else{
      $quantityNew =  $quantity * $Capacity;   
      $rate  =$rateper / $Capacity;    
      $total= $quantityNew  * $rate;
    }
      $insert = DB::table('inventory_data')->insert([
          
          'inventory_name' => $name,
          'InvQuantity' => $quantityNew,
          'rate' => $rate,
          'InvDate' => $date,
          'InvAmount' => $total ,
          'UOM' => $UOM,
          'Capacity' => $Capacity, 
          'Packing' =>   $packing,
           
      ]);   

DB::table('category')->where('id', $name)->update([
    'is_delete' => 0,
    ]);
    
return redirect('add-inventory');
}

public function view_inventory_data(){
    
 $inventorydata = DB::table('inventory_data')
->where('is_delete',1)
 ->get(); 
 $query = DB::table('inventory_data')   
  ->where('id',$id)
  ->where('is_delete',1)
  ->first();
   

  $invent=DB::table('now_inventory')
  ->where('is_delete',1)
  ->get();


  return redirect('inventory/add-inventory',compact('inventorydata','query','invent'));



}
public function edit_inventory_process(Request $request){
//dd($request->all());

        $result = DB::table('inventory_data')
        ->where('id',$request->id)
        ->update([
          
            'inventory_name' =>  $request->nameofinventory,
            'InvQuantity'    =>   $request->inventoryquantity,
            'rate'        =>   $request->rateper,
            'InvAmount' =>  $request->nameofinventory,
            'UOM'    =>   $request->UOM,
            'Capacity'        =>  $request->Capacity,
            'Packing'      =>   $request->packing,
        ]);

           return redirect('add-inventory');

 }


 public function edit_inventory($id){

$query = DB::table('inventory_data')
->where('id',$id)->first();

  $inventorydata = DB::table('category')
     ->join('inventory_data','category.id','inventory_data.inventory_name')
     ->where('category.is_delete',1)
     ->get();
     
     $ware = DB::table('autoshop')->get(); 
     $comp =DB::table('category')->where('is_delete',1)->get(); 
 return view ('inventory/add-inventory',compact('inventorydata','comp','ware','query'));

 }

public function delete_inventory($id){

    $update1 = DB::table('inventory_data')
    
    ->where('id', $id)
    ->update([
        'is_delete' =>0
      
    ]);

  return redirect('add-inventory');

}
 
//  public function module_inventory_process(Request $request){
    
//       $id                              =$request->input('id');                  
//       $companyname                     =$request->input('companyname');
//       $inventdate                      =$request->input('inventdate');
//       $truckname                       =$request->input('truckname');
//       $inventtruckname                 =$request->input('inventtruckname');
//       $inventamount                    =$request->input('inventamount');
//      // $inventpair                     =$request->input('inventpair');
//       $inventlitre                      =$request->input('inventlitre');
//      // $invnetkg                        =$request->input('inventkg');
      
//        $result = DB::table('now_inventory')->inser([
          
//             'Companyname'          =>   $companyname,
//             'Inventory_Date'         =>   $inventdate,
//             'Invent_Truck_in_out'               =>    $truckname, 
//             'Invent_Truck_Name'        =>  $inventtruckname,
//             'Inventory_Amount'      =>   $inventamount,
//           //  'Grease_Kg'            =>   $inventpair,
//           //  'Pair'                 =>   $invnetk,
//             'Oil_Litre'            =>     $inventlitre,
            
//         ]);

//            return redirect('data-inventory');

 //}  
 public function add_module_inventory(){
     
     
 }
 public function delete_purchase_inventory($id){

  $update1 = DB::table('puchase_inventory')
  ->where('id', $id)
  ->update([
      'is_delete' =>0
    
  ]);
  return redirect('purchase-inventory');

}
 public function edit_purchase_inventory($id){

  $query=DB::table('puchase_inventory')
  ->where('id',$id)
  ->get();
  
  
  
   $comp=DB::table('inventory_data')
        ->where('is_delete',1)
        ->get();
  
  return view('inventory/purchase-inventory',compact('query','comp'));

 }
public function edit_purchase_inventory_process(Request $request){

//dd($request->all());
  $id                                 =$request->input('id');
  $purchasecompany                    = $request->input('purchasecompany');
  $purchasedate                       = $request->input('purchasedate');
  $purchaserate                       =$request->input('purchaserate');
  $purchasequantity                   =$request->input('purchasequantity');

  
   $insert = DB::table('puchase_inventory')
   ->where('id',$request->id)
    ->update([
        'purchase_company_name' =>  $purchasecompany,
        'purchase_date' => $purchasedate,
        'purchase_rate' =>  $purchaserate,
        'purchase_quantity' =>  $purchasequantity,
  ]);   

  return redirect('purchase-inventory');


}

public function data_inventory_process(Request $request){
if($request->CustomerName != ''){
 
  $addnew = DB::table('vehicles')->insertGetId([

    'vehicleno' => $request->CustomerName,
    'INTruck' => 2,
]);
$Pname                        =$request->input('Pname');
$companyName                  =$request->input('companyName');
$dateinventory                =$request->input('dateinventory');
$datainltr                    =$request->input('datainltr');
$rate = DB::table('inventory_data')->where('id',$Pname)->first();
$newrate =  $rate->rate;
$existquantity = $rate->InvQuantity;
$total = $request->salerates  *  $datainltr;
$newquantity = $existquantity - $datainltr;
if($newquantity < 0){
dd('insufficient Stock....!');
}
else{
 $insert = DB::table('now_inventory')->insert([
   
  'Companyname'=> $companyName,
  'Inventory_Date'=> $dateinventory,
  'Quantity'=> $datainltr,
  'rate'=> $request->salerates,
  'Total'=> $total,
  'Pcode'=> $Pname,
  'Truckno'=>$addnew,
]);   
$update = Db::table('inventory_data')->where('id',$Pname)->update([
  'InvQuantity'=> $newquantity,
]);

DB::table('PaymentList')->insert([
    'Amount' => $request->input('received'),
    'CustomerCOde' => $addnew,
    'PDate' => date('Y-m-d'),
]);

$remaining = $total - $request->input('received');

DB::table('customerPayment')->insert([
    'Amount' => $remaining,
    'Customer_ID' => $addnew,
]);
return redirect('data-inventory');
}

}


else if($request->WalkingOut != ''){
$Pname                        =$request->input('Pname');
$companyName                  =$request->input('companyName');
$dateinventory                =$request->input('dateinventory');
$datainltr                    =$request->input('datainltr');
$rate = DB::table('inventory_data')->where('id',$Pname)->first();
$newrate =  $rate->rate;
$existquantity = $rate->InvQuantity;
$total = $request->salerates  *  $datainltr;
$newquantity = $existquantity - $datainltr;
if($newquantity < 0){
dd('insufficient Stock....!');
}
else{
 $insert = DB::table('now_inventory')->insert([
  'Companyname'=> $companyName,
  'Inventory_Date'=> $dateinventory,
  'Quantity'=> $datainltr,
  'rate'=> $request->salerates,
  'Total'=> $total,
  'Pcode'=> $Pname,
  'Truckno'=>$request->WalkingOut,
]);

DB::table('PaymentList')->insert([
    'Amount' => $request->input('received'),
    'CustomerCOde' =>$request->WalkingOut,
    'PDate' => date('Y-m-d'),
]);

$updatedata =DB::table('customerPayment')->where('Customer_ID',$request->WalkingOut)->first();

$netreceiable = $updatedata->Amount + $total; 
$remaining = $netreceiable - $request->input('received');
$updatepayment = DB::table('customerPayment')->where('Customer_ID',$request->WalkingOut)->update([
    'Amount' =>$remaining,
]);

$update = Db::table('inventory_data')->where('id',$Pname)->update([
  'InvQuantity'=> $newquantity,
]); 
return redirect('data-inventory');
}

}



else if($request->Outtruck != ''){
   // dd('out truck');
$Pname                        =$request->input('Pname');
$companyName                  =$request->input('companyName');
$dateinventory                =$request->input('dateinventory');
$datainltr                    =$request->input('datainltr');
$rate = DB::table('inventory_data')->where('id',$Pname)->first();
$newrate =  $rate->rate;
$existquantity = $rate->InvQuantity;
$total = $request->salerates  *  $datainltr;
$newquantity = $existquantity - $datainltr;
if($newquantity < 0){
dd('insufficient Stock....!');
}

else{
 $insert = DB::table('now_inventory')->insert([
  'Companyname'=> $companyName,
  'Inventory_Date'=> $dateinventory,
  'Quantity'=> $datainltr,
  'rate'=> $request->salerates,
  'Total'=> $total,
  'Pcode'=> $Pname,
  'Truckno'=>$request->Outtruck,
]); 

DB::table('PaymentList')->insert([
    'Amount' => $request->input('received'),
    'CustomerCOde' => $request->Outtruck,
    'PDate' => date('Y-m-d'),
]);

$updatedata =DB::table('customerPayment')->where('Customer_ID',$request->Outtruck)->first();

$netreceiable = $updatedata->Amount + $total; 
$remaining = $netreceiable - $request->input('received');
$updatepayment = DB::table('customerPayment')->where('Customer_ID',$request->Outtruck)->update([
    'Amount' =>$remaining,
]);

$update = Db::table('inventory_data')->where('id',$Pname)->update([
  'InvQuantity'=> $newquantity,
]); 
return redirect('data-inventory');
}


}

else if($request->AddNew != ''){
    
$addnew = DB::table('vehicles')->insertGetId([

    'vehicleno' => $request->AddNew,
    'INTruck' => 0,
]);
$Pname                        =$request->input('Pname');
$companyName                  =$request->input('companyName');
$dateinventory                =$request->input('dateinventory');
$datainltr                    =$request->input('datainltr');
$rate = DB::table('inventory_data')->where('id',$Pname)->first();
$newrate =  $rate->rate;
$existquantity = $rate->InvQuantity;
$total = $request->salerates  *  $datainltr;
$newquantity = $existquantity - $datainltr;
if($newquantity < 0){
dd('insufficient Stock....!');
}
else{
 $insert = DB::table('now_inventory')->insert([
   
  'Companyname'=> $companyName,
  'Inventory_Date'=> $dateinventory,
  'Quantity'=> $datainltr,
  'rate'=> $request->salerates,
  'Total'=> $total,
  'Pcode'=> $Pname,
  'Truckno'=>$addnew,
]);

DB::table('PaymentList')->insert([
    'Amount' => $request->input('received'),
    'CustomerCOde' => $addnew,
    'PDate' => date('Y-m-d'),
]);

$remaining = $total - $request->input('received');

DB::table('customerPayment')->insert([
    'Amount' => $remaining,
    'Customer_ID' => $addnew,
]);

$update = Db::table('inventory_data')->where('id',$Pname)->update([
  'InvQuantity'=> $newquantity,
]); 
return redirect('data-inventory');
}
}



else{
  $Pname                        =$request->input('Pname');
  $companyName                  =$request->input('companyName');
  $dateinventory                =$request->input('dateinventory');
  $Truckno                      =$request->input('Truckno');
  $datainltr                    =$request->input('datainltr');
$rate = DB::table('inventory_data')->where('id',$Pname)->first();
               // $newrate =  $rate->rate;
$existquantity = $rate->InvQuantity;
$total = $request->salerates  *  $datainltr;
$newquantity = $existquantity - $datainltr;
if($newquantity < 0){
  dd('insufficient Stock....!');
}
else{
   $insert = DB::table('now_inventory')->insert([
     
    'Companyname'=> $companyName,
    'Inventory_Date'=> $dateinventory,
    'Quantity'=> $datainltr,
    'rate'=> $request->salerates,
    'Total'=> $total,
    'Pcode'=> $Pname,
    'Truckno'=>$Truckno,
  
  ]);   
  $update = Db::table('inventory_data')->where('id',$Pname)->update([
    'InvQuantity'=> $newquantity,
  ]); 
  return redirect('data-inventory');
}
}
}
public function delete_data_inventory($id){

  $update1 = DB::table('puchase_inventory')
  ->where('id', $id)
  ->update([
      'is_delete' =>0
        
  ]);
  return redirect('data-inventory');

}


      public function delete_warehouse($id){

  $update1 = DB::table('warehouse')
  ->where('id', $id)
  ->update([
      'is_delete' =>0
        
  ]);
  return redirect('add-warehouse');

}
    public function delete_packing ($id){

  $update1 = DB::table('packing')
  ->where('id',$id)
  ->update([
      'is_delete' =>0
        
  ]);
  return redirect('add-packing');

}

public function edit_packing($id){
     
  $query = DB::table('packing')
  ->where('id',$id)->first();

  $packing = DB::table('packing')
 ->where('is_delete',1)
  ->get();
  return view('inventory.packing',compact('packing','query'));
}



public function edit_packing_process (Request $request){

  //dd($request->all());
    $id            =$request->id;
    $PackName = $request->PackName;
    $UOM= $request->UOM;
  
    
    $insert = DB::table('packing')
    ->where('id',$request->id)
    ->update([

      'PackingName' => $PackName,
      'Category' => $UOM,
    ]);   
  
    return redirect('add-packing');
  
}

}
