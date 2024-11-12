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

    public function manager_wise_report_page(){
        $data = [];
        $data['employees'] = DB::table('employees')->where('designation','2')->get();
        // dd($data['employees']);
        return view('reports.manager_wise_report.form',compact('data'));
    }
    public function manager_wise_report(Request $request){

        // dump($request->all());
        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        $manager_id = $request->manager_id;
        $manager = DB::table('employees')->where('id',$manager_id)->first();
        $data['manager'] = $manager;
        $job_inquiries = DB::table('now_job_inquiry')
        ->where('manager_id', $manager_id)
        ->whereBetween('date', [$fromDate, $toDate])
        ->get();
        $data['ji'] = $job_inquiries;

        return view('reports.manager_wise_report.report',compact('data'));
    }

    public function customer_wise_report_page(){
        $data = [];
        $data['customers'] = DB::table('customer')->get();
        // dd($data['customers']);
        return view('reports.customer_wise_report.form',compact('data'));
    }
    public function customer_wise_report(Request $request){

        // dd($request->all());
        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        $customer_id = $request->customer_id;
        $customer = DB::table('customer')->where('id',$customer_id)->first();
        $data['customer'] = $customer;
        $job_inquiries = DB::table('now_job_inquiry')
        ->where('customer_id', $customer_id)
        ->whereBetween('date', [$fromDate, $toDate])
        ->get();
        $data['ji'] = $job_inquiries;
        // dd($data);
        return view('reports.customer_wise_report.report',compact('data'));
    }

    public function station_wise_report_page(){
        $data = [];
        $data['stations'] = DB::table('now_station')->get();
        // dd($data);
        return view('reports.station_wise_report.form',compact('data'));
    }
    public function station_wise_report(Request $request){

        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        $from_station_id = $request->station_id;
        $to_station_id = $request->station_to_id;
        $from_station = DB::table('now_station')->where('id',$from_station_id)->first();
        if($to_station_id != 'Select Station'){
            $to_station = DB::table('now_station')->where('id', $to_station_id)->first();
            $station = $from_station->name . ' to ' . $to_station->name;
            $job_inquiries = DB::table('now_job_inquiry')
            ->where('from', $from_station_id)
            ->where('to', $to_station_id)
            ->whereBetween('date', [$fromDate, $toDate])
            ->get();
        }else{
            $station = $from_station->name;
            $job_inquiries = DB::table('now_job_inquiry')
            ->where('from', $from_station_id)
            ->whereBetween('date', [$fromDate, $toDate])
            ->get();
        }
        $data['ji'] = $job_inquiries;
        // dd($station);
        $data['station'] = $station;

        // dd($data);
        return view('reports.station_wise_report.report',compact('data'));
    }


    public function broker_wise_report_page(){
        $data = [];
        // dd('in controller');
        $data['brokers'] = DB::table('broker')->get();
        // dd($data['customers']);
        return view('reports.broker_wise_report.form',compact('data'));
    }
    public function broker_wise_report(Request $request){

        // dd($request->all());
        $data = [];
        $fromDate = $request->from;
        $data['from_date'] = $fromDate;
        $toDate = $request->to;
        $data['to_date'] = $toDate;
        $data['report_name'] = $request->report_name;
        $data['title'] = $request->report_name;

        $broker_id = $request->broker_id;
        $broker = DB::table('broker')->where('broker_id',$broker_id)->first();
        $data['broker'] = $broker;
        $job_inquiries = DB::table('now_job_inquiry')
        ->where('broker_id', $broker_id)
        ->whereBetween('date', [$fromDate, $toDate])
        ->get();
        $data['ji'] = $job_inquiries;
        // dd($data);
        return view('reports.broker_wise_report.report',compact('data'));
    }

}
