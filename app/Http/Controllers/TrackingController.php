<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;  
use PDF;
class TrackingController extends Controller
{
    public function view_tracking(){
        // dd('done');
        $truck=DB::table('vehicles')->get();
        $station=DB::table('now_station')->get();
        $data=DB::table('tracking')->where('is_delete',1)->get();
        $status=DB::table('status')->where('is_delete',1)->get();
        $challant=DB::table('challan')->get();
        $builties = DB::table('now_builty')->get();
        $builties = DB::table('now_builty')
    ->whereNotIn(DB::raw("builty_id COLLATE utf8mb4_general_ci"), function($query) {
        $query->select(DB::raw("builty_id COLLATE utf8mb4_general_ci"))->from('tracking');
    })
    ->get();
    // dd($builties);
        // $tracking = DB::table('tracking')->get();
        return view('Tracking/add',compact('truck','station','data','builties','status','challant'));
    }
    public function view_tracking_process(Request $request){
        
       
        $builty_id = $request->bilty_id;
        $rfq_no = $request->rfq_no;
        $builty_date = $request->builty_date;
        $status = $request->status;
        $computer_no = $request->computer_no;
        
        $tracking = DB::table('tracking')->insert([
                'builty_id' => $builty_id,
                'rfq_no' => $rfq_no,
                'builty_date' => $builty_date,
                'status' => $status,
                'computer_no' => $computer_no,
            ]);
            
    
        // $challanBilties = DB::table('challan')
        // ->join('now_challanlist','now_challanlist.challanid','challan.id')
        // ->where('challan.vehicle_id',$truckno)
        // ->select('now_challanlist.trno')
        // ->get();
      
        // foreach($challanBilties as $bilties){
      
        //     DB::table('tracking')->insert([
        //         'Tracking_Date'     => $tackingdate,
        //         'bilty_ids'         => $bilties->trno,
        //         'Tracking_Truck_no' => $truckno,
        //         'status'            => $status,
        //         'Tracking_Station'  => $trackingstation,
        //     ]);
        // }
        
        
         return redirect()->back()->with('success', 'Tracking information added successfully!');
    }
    
    
    public function bilty_tracking(){
        $station    = DB::table('now_station')->get();
        $status     = DB::table('status')->where('is_delete',1)->get();
        $data       = DB::table('tracking')->where('is_delete',1)->get();
      return view('Tracking/bilty_tracking',compact('station','status','data'));
    }
    
    function  bilty_tracking_process(Request $request){
    
       
        $tackingdate = $request->tackingdate;
        $bilties = $request->bilty_no;
        $trackingstation = $request->trackingstation;
        $status = $request->status;
      
         DB::table('tracking')->insert([
                'Tracking_Date'     => $tackingdate,
                'bilty_ids'         => $bilties,
                'status'            => $status,
                'Tracking_Station'  => $trackingstation,
            ]);
      
         return redirect()->back()->with('message','success added');
    }
    
    public function bilty_tracking_filter(Request $request){
       
        $track=DB::table('tracking')->join('now_station','tracking.Tracking_Station','now_station.id')->where('tracking.bilty_ids',$request->bilty_no)->get();
        $pdf = PDF::loadView('Tracking.bilty_tracking_report',compact('track'));
        $pdf->setPaper('A4', 'Landscape');
        return $pdf->stream('report.pdf');
        
    }

    public function edit_tracking($id){
      
        $query = DB::table('tracking')
         ->where('id',$id)
         ->first();
         $status=DB::table('status')->where('is_delete',1)->get();
         $builties = DB::table('now_builty')->get();
 
          $data=DB::table('tracking')->where('is_delete',1)->get();

        return view('Tracking/add',compact('data','status','builties','query'));
             
 
 
     }
 
 
 public function edit_tracking_process(Request $request){
     
    //  dd($request->all());
     $id = $request->form_id;

       DB::table('tracking')
     ->where('id',$id)
     ->update([
        'builty_id' => $request->builty_id,
        'builty_date' => $request->builty_date,
        'rfq_no' => $request->rfq_no,
        'computer_no' => $request->computer_no,
        'status' => $request->status,
     ]);
 
     return redirect('add-tracking')->with('message','success edit');;
 }
 
 
 
 
 public function delete_tracking($id){
 
     $delete = DB::table('tracking')
     ->where('id',$id)
     ->update([
 
         'is_delete' => 0,
     ]);
 
    return redirect('add-tracking')->with('message','delete success');
 }
 
 public function stutus(Request $request)
 {
     $addstatus = DB::table('status')->where('is_delete',1)->get();
    //  dd($addstatus);
    return view('Tracking.status',compact('addstatus'));
 }


 public function save_status(Request $request)
 {
    $status = $request->status;
    $description = $request->description;
    
    DB::table('status')->Insert([
        'status' => $status,
        'description' => $description,
    ]);
    
    return redirect()->back();
    // return view('status.add');

 }

 public function editStatus(Request $req, $id)
 {
    $query = DB::table('status')->where('id',$id)->first();
    $addstatus = DB::table('status')->where('is_delete',1)->get();
    return view('Tracking.status',compact('query','addstatus'));
 }



 public function save_editstatus(request $req)
 {
       
        $insert = DB::table('status')
        ->where('id',$req->id)
        ->update([
            'description' => $req->description,
            'status'=>$req->status,
        ]);
        return redirect('status');
 }




     public function deletestatus($id)
     {
    
        $update1 = DB::table('status')
        ->where('id', $id)
        ->update([
            'is_delete' => 0,
        ]);
    
        return redirect('status');
    
     }
     
    public function track_by_challan(Request $req)
    {
        $track=DB::table('tracking')->join('now_station','tracking.Tracking_Station','now_station.id')->where('tracking.Tracking_Truck_no',$req->id)->get();
        $pdf = PDF::loadView('Tracking.tracking_report',compact('track'));
        $pdf->setPaper('A4', 'Landscape');
        return $pdf->stream('report.pdf');

    }
    
     public function save_roles(Request $request)
 {
     
     
    $roles = $request->roles;
  
    DB::table('roles')->Insert([
        'roles' => $roles,
        'status' => 1,
    ]);
    
    return redirect()->back();
    // return view('status.add');

 }
 
    public function fetchBuiltyDetails(Request $request)
    {
        $builty_id = $request->input('builty_id');

        // Fetch data from the now_builty table
        $builtyDetails = DB::table('now_builty')->where('builty_id', $builty_id)->first();

        if ($builtyDetails) {
            // Return the builty details as JSON response
            return response()->json([
                'data' => $builtyDetails,
                // Add more fields as needed
            ]);
        } else {
            return response()->json(['error' => 'Builty not found'], 404);
        }
    }


}
