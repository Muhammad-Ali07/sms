<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use mpdf\mpdf;
use PDF;

class ReportController extends Controller
{
    public function vehicle_trip_report(){
        
        $vehicles = DB::table('now_vehicles')->where('is_delete',1)->get();
        $pdf = PDF::loadView('reports.vehicle_trip',compact('vehicles'))->save('Vehicle_trip.pdf');
	    return $pdf->stream('vehicle_trip.pdf');
    }
    
    public function vehicle_trip_report_form(){
        dd('form');
    }
    
    public function challan_report()
    {

    	$this->data['month'] ='';
    	$this->data['challan'] ='';
		return view('challan.report',$this->data);
	}


	public function filter_challan_report(Request $request)
	{
// 		$month = $request->input('month');
// 		$this->data['challan'] = DB::table('challan')->select('challan.*','now_station.name as station_name','station_type.station_type')->join('now_station','now_station.id' ,'challan.to_station')->join('station_type','station_type.station_type','challan.station_type')->whereMonth('challan.date',
// 		$month)->get();
		
// // 		echo "<pre>";print_r($this->data['challan']);die;

// 		$this->data['month'] = $month;

// 		return view('challan.report',$this->data);
        $month = $request->input('month');
		$this->data['challan'] = DB::table('challan')->select('challan.*','now_station.name as station_name','station_type.station_type')->join('now_station','now_station.id' ,'challan.to_station')->join('station_type','station_type.station_type','challan.station_type')->whereMonth('challan.date',
		$month)->get();
		$this->data['month'] = $month;


		$pdf = PDF::loadView('challan.generatepdfchallanrepor',$this->data);
        $pdf->setPaper('A4', 'Landscape');
     	return $pdf->stream('report.pdf');
		


		return view('challan.report',$this->data);
	}
}
