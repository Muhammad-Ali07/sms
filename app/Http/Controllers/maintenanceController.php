<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class maintenanceController extends Controller
{
	public function head_maintenance(){
    	$maintenances = DB::table('now_maintenance')
		->where('status','1')
		->get();
    	return view('maintenance.add',compact('maintenances'));
    }

    public function head_maintenance_process(Request $request){
    	
    $headname 		= $request->headname;
		$maintaindate 	= $request->maintaindate;
		$category 		= $request->category;
		$details 		= $request->details;

		$result = DB::table('now_maintenance')->insert([
			'maintaindate' 	=> $maintaindate,
			'headname' 		=> 	$headname,
			'category' 		=> $category,
			'details' 		=> $details,

		]);

		if($result){
			return redirect()->back();
		}else{
			return redirect()->back();
		}
    }

	public function view_head_maintenance(){
    	$maintenances = DB::table('now_maintenance')
		->where('status','1')
		->get();

    	return view('maintenance.view',compact('maintenances'));
    }


	public function save_edit_maintenance(Request $request){

	$code 			= $request->id;
		$headname 		= $request->headname;
		$maintaindate 	= $request->maintaindate;
		$category 		= $request->category;
		$details 		= $request->details;

		$update = DB::table('now_maintenance')
		->where('id',$code)
		->update([
				'maintaindate' =>$maintaindate,
				'headname' => $headname,
				'category' => $category,
				'details' => $details
		]);
		return redirect('head-maintenance');
	}
	public function maintenance_del_process($id){
		$update = DB::table('now_maintenance')
		->where('id',$id)
		->update([
			'status'=> 0 

		]);

		return redirect('head-maintenance');
	}



	public function maintenance_edit_process($id){

		$maintenances = DB::table('now_maintenance')
		->where('status','1')
		->get();
		$edit_maintenances = DB::table('now_maintenance')
		->where('id', $id)
		->first();
    	return view('maintenance.add',compact('edit_maintenances','maintenances'));
		
		
	}


	
}
