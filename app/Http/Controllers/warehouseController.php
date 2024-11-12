<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class warehouseController extends Controller
{
    public function add_warehouse(){
    	 return view('warehouse.add');
    }

    public function add_warehouse_process(Request $request){
    	//dd($requst->all());

    	$code = $request->code;
		$name = $request->name;
		$address = $request->address;
		$email = $request->email;
		$phones = count($request->phones);
		$mobile = $request->mobile;


    	$last_id = DB::table('now_warehouse')->insertGetId([
    			'code'		=>$code,    	
    			'name'		=>$name,    	
    			'address'	=>$address,    	
    			'email'		=>$email,    	
    			'mobileno'	=>$mobile,    	
    		]);

    		if(!empty($phones)){  
    			for($j=0; $j<$phones; $j++){
					$result = DB::table('now_phone')->insert([
						'phone' 		=> $request->phones[$j],
						'customerid' 	=>  $last_id,
						'type' 			=> 'warehouse',
					]);
		    	}
		    }

		    	return redirect('view-warehouse');  
	    	
		
    }
    
public function view_warehouse(){
		$array = [];
		$warehouses  = DB::table('now_warehouse')
		->where('is_delete',1)
		->get();
		foreach($warehouses as $row){
			$phone = DB::table('now_phone')
			->where('customerid',$row->id)
			->where('type','warehouse')
			->get()->toArray();
			$array[] = array(array('id'=>$row->id,'WCode'=>$row->code,'name' =>$row->name,
			'address'=>$row->address,'email'=>$row->email,'mobile'=>$row->mobileno,'phone'=>($phone)));
		}
    	return view('warehouse.view',compact('array'));
    }

	public function edit_warehouse($id){

		$phone  = DB::table('now_phone')
		->where('customerid',$id)
		->where('type','warehouse')
		->select('phone')
		->get();
	

		$edit  = DB::table('now_warehouse')
		->where('id',$id)
		->first();

		$warehouses  = DB::table('now_warehouse')->get();
    	return view('warehouse.add',compact('warehouses','edit','phone'));
	}


	public function save_edit_warehouse(Request $request){
	
	
		
		$id = $request->id;
		$code = $request->code;
		$name = $request->name;
		$address = $request->address;
		$email = $request->email;
		$mobile = $request->mobile;

	

		$update =  DB::table('now_warehouse')
		->where('id',$id)
		->update([
			'code'=>$code, 
			'name'=>$name, 
			'address'=>$address, 
			'email'=>$email, 
			'mobileno'=>$mobile, 
		]);


		$contact = $request->phones;

		
		if(!empty($contact)){
		
		for($i= 0; $i <= count($contact); $i++ ){
			
			$customerphone = DB::table('now_phone')
			->where('customerid',$id)
			->where('type','warehouse')
			->get();
			foreach($customerphone as $key =>$row){

				$rowid = $row->id;


		$update =  DB::table('now_phone')
		->where('customerid',$id)
		->where('id',$rowid)
		->where('type','warehouse')
		->update([
			'phone'=>$contact[$key] 
		]);
		
		}
	}
}
	return redirect('view-warehouse');

	}

	public function del_warehouse($id){

		$update =  DB::table('now_warehouse')
		->where('id',$id)
		->update([
			
			'is_delete'=> 0, 
		]);

		return redirect('view-warehouse');

	}





}
