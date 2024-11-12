<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class vehicleController extends Controller
{
    public function add_vehicle(){
    	return view('vehicle.add');
    }

    public function add_vehicle_process(Request $request){

		$vehiclecat = $request->vehiclecat;
		$driver = $request->driver;
		$owner = $request->owner;
		$status = $request->status;
		$vtype = $request->vtype;
		$vno = $request->vno;
		
		$result = DB::table('now_vehicles')->insert([
			'vehiclecat'	=> $vehiclecat,
			'driver'		=> $driver,
			'owner'			=> $owner,
			'status'		=> $status,
			'vtype'			=> $vtype,
			'vno'			=> $vno,
		]);

		
			return redirect('vehicles-details');
		
		
    }

    public function vehicles_payment(){
    	
    	$vehicles = DB::table('now_vehicles')
    	->where('is_delete',1)
    	->get();

    	return view('vehicle.vehicles_payment',compact('vehicles'));
    }

    public function add_vehicle_payment(Request $request){
    	
    	$vehicle 		= $request->vehicle;
		$condition 		= $request->condition;
		$purchaseform 	= $request->purchaseform;
		$permonth 		= $request->permonth;
		$totalmonth 	= $request->totalmonth;
		$purchase 		= $request->purchase;
		$paymode 		= $request->paymode;
		$purchasedate 	= $request->purchasedate;
		$advance 		= $request->advance;
		$totalprice 	= $request->totalprice;
		$cashprice 		= $request->cashprice;

		$result = DB::table('now_vehiclepayments')->insert([

			'vehicle' 		=> $vehicle,
			'condition' 	=> $condition ,
			'purchaseform' 	=> $purchaseform,
			'permonth' 		=> $permonth,
			'totalmonth' 	=> $totalmonth,
			'purchase' 		=> $purchase,
			'paymode' 		=> $paymode, 
			'purchasedate' 	=> $purchasedate,
			'advance' 		=> $advance,
			'totalprice' 	=> $totalprice,
			'cashprice' 	=> $cashprice,


		]);

		return redirect('vehicles-details');
    }

    public function vehicles_book_details(){
    	return view('vehicle.vehicles_book_details',compact('vehicles'));
    }

    public function add_vehicles_boook_detail(Request $request){
    	//dd($request->all());
    	$vehicle = $request->vehicle;
		$mark = $request->mark;
		$style = $request->style;
		$horsepower = $request->horsepower;
		$booksir =$request->booksir;
		$vehiclesize = $request->vehiclesize;
		$regdate = $request->regdate;
		$engineno = $request->engineno;
		$unloadenweight = $request->unloadenweight;
		$manudate = $request->manudate;
		$jughi = $request->jughi;
		$modelyear = $request->modelyear;
		$cylinder = $request->cylinder;
		$loadenweight = $request->loadenweight;
		$hgv = $request->hgv;
		$nooftyre = $request->nooftyre;
		$chasisno = $request->chasisno;
		$regcity = $request->regcity;
		$seatingcapacity = $request->seatingcapacity;

		$result = DB::table('now_bookdetails')->insert([
					'vehicle'		=>$vehicle,
					'mark' 			=>$mark,
					'style' 		=>$style,
					'horsepower'	=>$horsepower,
					'booksir'		=>$booksir,
					'vehiclesize' 	=>$vehiclesize,
					'engineno' 		=>$regdate,
					'regdate' 		=>$engineno,
					'unloadenweight'=>$unloadenweight,
					'manudate'		=>$manudate,
					'jughi'			=>$jughi,
					'modelyear'		=>$modelyear,
					'cylinder'		=>$cylinder,
					'loadenweight'	=>$loadenweight,
					'hgv'			=>$hgv,
					'nooftyre' 		=>$nooftyre,
					'chasisno' 		=>$chasisno ,
					'regcity'		=>$regcity,
					'seatingcapacity'=>$seatingcapacity,

			]);

		if($result){
			return redirect()->back();
		}else{
			return redirect()->back();
		}

	
    }

    public function vehicles_tax_details(){
    	return view('vehicle.vehicles_tax_detail');
    }

    public function vehicles_details(){
    	$vehicles = DB::table('now_vehicles')
		->where('is_delete',1)
		->get();



    	$vehiclepayments = DB::table('now_vehiclepayments')->get();
		
    	


    	return view('vehicle.vehicles_detail',compact('vehicles','vehiclepayments'));
    }


	public function vehicles_edit($id){
		$edit = DB::table('now_vehicles')
		->where('id',$id)
		->first();			
		return view('vehicle.add',compact('edit'));
	}


	
public function edit_vehicle_process(Request $request){



	
	$code = $request->id;
	$vehiclecat = $request->vehiclecat;
	$driver = $request->driver;
	$owner = $request->owner;
	$status = $request->status;
	$vtype = $request->vtype;
	$vno = $request->vno;

	$edit = DB::table('now_vehicles')
	->where('id',$code)
	->update([
		'vehiclecat' => $vehiclecat,
		'driver' => $driver,
		'owner' => $owner,
		'status' => $vehiclecat,
		'vtype' => $vtype,
		'vno' => $vno,
	]);		

	return redirect('vehicles-details');



}



public function delete_vehicle_process($id){

	$edit = DB::table('now_vehicles')
		->where('id',$id)
		->update([

			'is_delete' => 0

		]);			
			
		return redirect('vehicles-details');


}




}
