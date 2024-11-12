<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class YardController extends Controller
{
    public function addYard(){
        // dd('in controller');
    	return view('yard.add');
    }

    public function storeYard(Request $request){
        // dd($request->all());
		$name = $request->name;

		$result = DB::table('yard')->insert([
			'name'	=> $name,
		]);

        return redirect()->back()->with('success', 'Yard added successfully');
		
    }

	public function yard_edit($id){
	   // dd('in edit');
		$select = DB::table('yard')
		->where('id',$id)
		->first();			
		return view('yard.add',compact('select'));
	}

    public function yard_update(Request $request){

    	$id = $request->id;
    	$name = $request->name;
    
    	$edit = DB::table('yard')
    	->where('id',$id)
    	->update([
    		'name' => $name
    	]);		
    
    	return redirect()->back()->with('success', 'Yard updated successfully');

    }

    public function yardDelete($id){
    // dd($id);
    	$edit = DB::table('yard')
    		->where('id',$id)
    		->delete();			
    			
    return redirect()->back()->with('success', 'Yard deleted successfully');
    
    }

    //pickup point functions
    public function addPickupPoint(){
        // dd('in controller');
    	return view('pickup_point.add');
    }

    public function storePickupPoint(Request $request){
        // dd($request->all());
		$name = $request->name;

		$result = DB::table('pickup_points')->insert([
			'name'	=> $name,
		]);

        return redirect()->back()->with('success', 'Pickup Point added successfully');
		
    }

    public function pickupPoint_edit($id){
	   // dd('in edit');
		$select = DB::table('pickup_points')
		->where('id',$id)
		->first();			
		return view('pickup_point.add',compact('select'));
	}
	
	public function pickupPoint_update(Request $request){

    	$id = $request->id;
    	$name = $request->name;
    
    	$edit = DB::table('pickup_points')
    	->where('id',$id)
    	->update([
    		'name' => $name
    	]);		
    
    	return redirect()->back()->with('success', 'Pickup Point updated successfully');

    }
    
    public function pickupPointDelete($id){
    // dd($id);
    	$edit = DB::table('pickup_points')
    		->where('id',$id)
    		->delete();			
    			
    return redirect()->back()->with('success', 'Pickup Point deleted successfully');
    
    }
    
    // shipping line functions
    public function addShippingLine(){
    	return view('shipping_line.add');
    }

    public function storeShippingLine(Request $request){
        // dd($request->all());
		$name = $request->name;

		$result = DB::table('shipping_line')->insert([
			'name'	=> $name,
		]);

        return redirect()->back()->with('success', 'Shippine Line added successfully');
		
    }
    
    public function shippingLine_edit($id){
	   // dd('in edit');
		$select = DB::table('shipping_line')
		->where('id',$id)
		->first();			
		return view('shipping_line.add',compact('select'));
	}
	
	public function shippingLine_update(Request $request){

    	$id = $request->id;
    	$name = $request->name;
    
    	$edit = DB::table('shipping_line')
    	->where('id',$id)
    	->update([
    		'name' => $name
    	]);		
    
    	return redirect()->back()->with('success', 'Shipping Line updated successfully');

    }
    
    public function shippingLineDelete($id){
    // dd($id);
    	$edit = DB::table('shipping_line')
    		->where('id',$id)
    		->delete();			
    			
    return redirect()->back()->with('success', 'Shipping line deleted successfully');
    
    }
    
}
