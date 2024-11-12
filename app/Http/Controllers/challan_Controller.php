<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class challan_Controller extends Controller
{
	public function add_challan()
	{
		$chalanNo = DB::table('challan')->orderby('id', 'desc')->first();

		$selfcompany = DB::table('selfcompany')->orderby('id', 'desc')->get();

		$vehicles = DB::table('now_vehicles')->get();

		$stations = DB::table('now_station')->where('is_delete', 1)->get();
		return view('challan.add', compact('vehicles', 'stations', 'chalanNo', 'selfcompany'));
	}
	public function view_challan()
	{

		$view_all = DB::table('challan')->where('selfcompany', session('company')[0]->id)->orderBy('id', 'desc')->paginate(30);

		return view('challan.view', compact('view_all'));
	}

	public function add_challan_process(Request $request)
	{

		//	dd($request->all());

		//	$data['created_at'] = date('Y-m-d');

		$id = DB::table('challan')->insertGetId([
			'no' => $request->no,
			'selfcompany' => session('company')[0]->id,
			'date' => date('Y-m-d'),
			'driver' => $request->driver,
			'other_detail' => $request->other_detail,
			'other_amount' => $request->other_amount,
			'loadername' => $request->loadername,
			'dispatchtime' => $request->dispatchtime,
			'containerno' => $request->containerno,
			'containerseal' => $request->containerseal,
			'vehicle_id' => $request->vehicle_id,
			'from_station' => $request->from_station,
			'to_station' => $request->to_station,
			'station_type' => $request->station_type,
			'station_per' => $request->station_per,
			'mobile_no' => $request->mobile_no,
			'broker' => $request->broker,
			'DeliveryCharges' => $request->DeliveryCharges,
			'VehicleRent' => $request->VehicleRent,
			'notes' => $request->notes
		]);

		if ($id) {
			$builtyid = $id;
			$builtyid = $id;
			if (isset($request->trno) && count($request->trno) > 0) {
				$trno = count($request->trno);
			} else {
				$trno = 0;
			}
			if ($trno > 0) {
				for ($j = 0; $j < $trno; $j++) {
					$id = DB::table('now_challanlist')->insertGetId(['challanid' => $builtyid, 'trno' => $request->trno[$j]]);
					DB::table('now_builty')->where('id', $request->trno[$j])->update(['builty_status' => 'dispatched']);
					//		DB::table('manual_book')->where('TRNO',$request->trno[$j])->update(['builty_status'=>'dispatched']);

				}
			}

			return redirect("challan-report/$builtyid");
		} else {
			return redirect()->back();
		}

	}

	public function delete_challan_process($id)
	{

		try {
			// Delete related records from now_challanlist table
			DB::table('now_challanlist')->where('challanid', $id)->delete();

			// Delete the record from challan table
			DB::table('challan')->where('id', $id)->delete();

			return redirect()->back()->with('success', 'Challan deleted successfully!');
		} catch (\Exception $e) {
			return redirect()->back()->with('error', 'Failed to delete challan: ' . $e->getMessage());
		}
	}

	public function trs_builty($id)
	{
		return view('challan.trs_builty', compact('id'));
	}

	public function add_trs_builty(Request $request)
	{

		$builtyid = $request->builtyid;
		$trno = count($request->trno);
		if ($trno > 0) {
			for ($j = 0; $j < $trno; $j++) {
				$id = DB::table('now_challanlist')->insertGetId(['challanid' => $builtyid, 'trno' => $request->trno[$j]]);
				DB::table('now_builty')->where('id', $request->trno[$j])->update(['builty_status' => 'dispatched']);

			}
		}

		return redirect("challan-report/$builtyid");
	}

	public function challan_report($id)
	{
		return view('challan.challan_report', compact('id'));
	}


	public function generate_challan($id)
	{
		return redirect('builycheck-challan');
	}


	public function builty_check_challan()
	{
		return view('challan.checkbilty');
	}

	public function viewSVG()
	{
		return view('commesionbook');
	}
	public function saveviewSVG(Request $req)
	{

		$insertID = DB::table('commissionbook')->insertGetId([
			'DIK' => $req->DIK,
			'Sarailagon' => $req->Sarailogin,
			'Bannu' => $req->Bannu,
			'MirAnsha' => $req->MirAnsha,
			'Kohat' => $req->Kohat,
			'Peshawar' => $req->Pesharwar,
			'wapsirent' => $req->wapsirent,
			'total' => $req->total,
			'bakaya' => $req->bakaya,
			'totalcash' => $req->totalcash,
			'remaincashwithvehicle' => $req->remaincashwithvehicle,
			'cashreceived' => $req->cashreceived,
			'totalExpense' => $req->totalExpense,
			'cashwithvehicle' => $req->cashwithvehicle,
			'Deasil' => $req->Desiel,
			'mobile' => $req->MobileCall,
			'Toll' => $req->Toll,
			'MotarPolice' => $req->Motarwaypolice,
			'ChaiPani' => $req->Chai,
			'Manshiat' => $req->Manshiat_,
			'SpareParts' => $req->parts_,
			'Grease' => $req->Grease,
			'AirCheck' => $req->AirCheck,
			'munshiana' => $req->munshiana,
			'Labor' => $req->Labor,
			'KarachiAddaCommission' => $req->karachiAdda,
			'WapisAddaCommission' => $req->WapasAddaCommission,
			'GariService' => $req->Service,
			'Kanta' => $req->Kanta,
			'MechanicLabor' => $req->MechanicLabor,
			'Date' => $req->Date,
			'FromLocation' => $req->From,
			'TOLocation' => $req->TO,
			'SerailNO' => $req->SerialNO,
			'VehicleNO' => $req->VehicleNo,


		]);

		DB::table('commissionstationcharges')->insert([
			'CommsionBookID' => $insertID,
			'Station1' => $req->station1,
			'Station2' => $req->station2,
			'Station3' => $req->station3,
			'Station4' => $req->station4,
			'Station5' => $req->station5,
			'Station6' => $req->station6,
			'Station7' => $req->station7,
			'Station8' => $req->station8,
			'Station9' => $req->station9,
			'Station10' => $req->station10,
			'Station11' => $req->station11,
			'Station12' => $req->station12,
			'Station13' => $req->station13,
			'Station14' => $req->station14,
			'Station15' => $req->station15,
			'currentBalance1' => $req->currentRemain1,
			'currentBalance2' => $req->currentRemain2,
			'currentBalance3' => $req->currentRemain3,
			'currentBalance4' => $req->currentRemain4,
			'currentBalance5' => $req->currentRemain5,
			'currentBalance6' => $req->currentRemain6,
			'currentBalance7' => $req->currentRemain7,
			'currentBalance8' => $req->currentRemain8,
			'currentBalance9' => $req->currentRemain9,
			'currentBalance10' => $req->currentRemain10,
			'currentBalance11' => $req->currentRemain11,
			'currentBalance12' => $req->currentRemain12,
			'currentBalance13' => $req->currentRemain13,
			'currentBalance14' => $req->currentRemain14,
			'currentBalance15' => $req->currentRemain15,
			'PreviousBalance1' => $req->Remain1,
			'PreviousBalance2' => $req->Remain2,
			'PreviousBalance3' => $req->Remain3,
			'PreviousBalance4' => $req->Remain4,
			'PreviousBalance5' => $req->Remain5,
			'PreviousBalance6' => $req->Remain6,
			'PreviousBalance7' => $req->Remain7,
			'PreviousBalance8' => $req->Remain8,
			'PreviousBalance9' => $req->Remain9,
			'PreviousBalance10' => $req->Remain10,
			'PreviousBalance11' => $req->Remain11,
			'PreviousBalance12' => $req->Remain12,
			'PreviousBalance13' => $req->Remain13,
			'PreviousBalance14' => $req->Remain14,
			'PreviousBalance15' => $req->Remain15,
			'TotalBalance1' => $req->stationTotal1,
			'TotalBalance2' => $req->stationTotal2,
			'TotalBalance3' => $req->stationTotal3,
			'TotalBalance4' => $req->stationTotal4,
			'TotalBalance5' => $req->stationTotal5,
			'TotalBalance6' => $req->stationTotal6,
			'TotalBalance7' => $req->stationTotal7,
			'TotalBalance8' => $req->stationTotal8,
			'TotalBalance9' => $req->stationTotal9,
			'TotalBalance10' => $req->stationTotal10,
			'TotalBalance11' => $req->stationTotal11,
			'TotalBalance12' => $req->stationTotal12,
			'TotalBalance13' => $req->stationTotal13,
			'TotalBalance14' => $req->stationTotal14,
			'TotalBalance15' => $req->stationTotal15,
			'remark1' => $req->remark1,
			'remark2' => $req->remark2,
			'remark3' => $req->remark3,
			'remark4' => $req->remark4,
			'remark5' => $req->remark5,
			'remark6' => $req->remark6,
			'remark7' => $req->remark7,
			'remark8' => $req->remark8,
			'remark9' => $req->remark9,
			'remark10' => $req->remark10,
			'remark11' => $req->remark11,
			'remark12' => $req->remark12,
			'remark13' => $req->remark13,
			'remark14' => $req->remark14,
			'remark15' => $req->remark15,
			'TripNO' => $req->TripNO,
			'CashDetail1' => $req->cash1,
			'CashDetail2' => $req->cash2,
			'CashDetail3' => $req->cash3,
			'CashDetail4' => $req->cash4,
			'VehicleCash1' => $req->Vcash1,
			'VehicleCash2' => $req->Vcash2,
			'VehicleCash3' => $req->Vcash3,
			'VehicleCash4' => $req->Vcash4,
			'TIN' => $req->TIn,
			'TExp' => $req->TEX,
			'T' => $req->T,
			'Difference' => $req->Difference,
			'NI' => $req->NI,
		]);
		return redirect('showcommissionbook');
	}
	public function saveeditcommission(Request $req)
	{

		DB::table('commissionbook')->where('id', $req->id)->update([
			'DIK' => $req->DIK,
			'Sarailagon' => $req->Sarailogin,
			'Bannu' => $req->Bannu,
			'MirAnsha' => $req->MirAnsha,
			'Kohat' => $req->Kohat,
			'Peshawar' => $req->Pesharwar,
			'wapsirent' => $req->wapsirent,
			'total' => $req->total,
			'bakaya' => $req->bakaya,
			'totalcash' => $req->totalcash,
			'remaincashwithvehicle' => $req->remaincashwithvehicle,
			'cashreceived' => $req->cashreceived,
			'totalExpense' => $req->totalExpense,
			'cashwithvehicle' => $req->cashwithvehicle,
			'Deasil' => $req->Desiel,
			'mobile' => $req->MobileCall,
			'Toll' => $req->Toll,
			'MotarPolice' => $req->Motarwaypolice,
			'ChaiPani' => $req->Chai,
			'Manshiat' => $req->Manshiat_,
			'SpareParts' => $req->parts_,
			'Grease' => $req->Grease,
			'AirCheck' => $req->AirCheck,
			'munshiana' => $req->munshiana,
			'Labor' => $req->Labor,
			'KarachiAddaCommission' => $req->karachiAdda,
			'WapisAddaCommission' => $req->WapasAddaCommission,
			'GariService' => $req->Service,
			'Kanta' => $req->Kanta,
			'MechanicLabor' => $req->MechanicLabor,
		]);

		DB::table('commissionstationcharges')->where('CommsionBookID', $req->id)->update([
			'Station1' => $req->station1,
			'Station2' => $req->station2,
			'Station3' => $req->station3,
			'Station4' => $req->station4,
			'Station5' => $req->station5,
			'Station6' => $req->station6,
			'Station7' => $req->station7,
			'Station8' => $req->station8,
			'Station9' => $req->station9,
			'Station10' => $req->station10,
			'Station11' => $req->station11,
			'Station12' => $req->station12,
			'Station13' => $req->station13,
			'Station14' => $req->station14,
			'Station15' => $req->station15,
			'currentBalance1' => $req->currentRemain1,
			'currentBalance2' => $req->currentRemain2,
			'currentBalance3' => $req->currentRemain3,
			'currentBalance4' => $req->currentRemain4,
			'currentBalance5' => $req->currentRemain5,
			'currentBalance6' => $req->currentRemain6,
			'currentBalance7' => $req->currentRemain7,
			'currentBalance8' => $req->currentRemain8,
			'currentBalance9' => $req->currentRemain9,
			'currentBalance10' => $req->currentRemain10,
			'currentBalance11' => $req->currentRemain11,
			'currentBalance12' => $req->currentRemain12,
			'currentBalance13' => $req->currentRemain13,
			'currentBalance14' => $req->currentRemain14,
			'currentBalance15' => $req->currentRemain15,
			'PreviousBalance1' => $req->Remain1,
			'PreviousBalance2' => $req->Remain2,
			'PreviousBalance3' => $req->Remain3,
			'PreviousBalance4' => $req->Remain4,
			'PreviousBalance5' => $req->Remain5,
			'PreviousBalance6' => $req->Remain6,
			'PreviousBalance7' => $req->Remain7,
			'PreviousBalance8' => $req->Remain8,
			'PreviousBalance9' => $req->Remain9,
			'PreviousBalance10' => $req->Remain10,
			'PreviousBalance11' => $req->Remain11,
			'PreviousBalance12' => $req->Remain12,
			'PreviousBalance13' => $req->Remain13,
			'PreviousBalance14' => $req->Remain14,
			'PreviousBalance15' => $req->Remain15,
			'TotalBalance1' => $req->stationTotal1,
			'TotalBalance2' => $req->stationTotal2,
			'TotalBalance3' => $req->stationTotal3,
			'TotalBalance4' => $req->stationTotal4,
			'TotalBalance5' => $req->stationTotal5,
			'TotalBalance6' => $req->stationTotal6,
			'TotalBalance7' => $req->stationTotal7,
			'TotalBalance8' => $req->stationTotal8,
			'TotalBalance9' => $req->stationTotal9,
			'TotalBalance10' => $req->stationTotal10,
			'TotalBalance11' => $req->stationTotal11,
			'TotalBalance12' => $req->stationTotal12,
			'TotalBalance13' => $req->stationTotal13,
			'TotalBalance14' => $req->stationTotal14,
			'TotalBalance15' => $req->stationTotal15,
			'remark1' => $req->remark1,
			'remark2' => $req->remark2,
			'remark3' => $req->remark3,
			'remark4' => $req->remark4,
			'remark5' => $req->remark5,
			'remark6' => $req->remark6,
			'remark7' => $req->remark7,
			'remark8' => $req->remark8,
			'remark9' => $req->remark9,
			'remark10' => $req->remark10,
			'remark11' => $req->remark11,
			'remark12' => $req->remark12,
			'remark13' => $req->remark13,
			'remark14' => $req->remark14,
			'remark15' => $req->remark15,
			'TripNO' => $req->TripNO,
			'CashDetail1' => $req->cash1,
			'CashDetail2' => $req->cash2,
			'CashDetail3' => $req->cash3,
			'CashDetail4' => $req->cash4,
			'VehicleCash1' => $req->Vcash1,
			'VehicleCash2' => $req->Vcash2,
			'VehicleCash3' => $req->Vcash3,
			'VehicleCash4' => $req->Vcash4,
			'TIN' => $req->TIn,
			'TExp' => $req->TEX,
			'T' => $req->T,
			'Difference' => $req->Difference,
			'NI' => $req->NI,
		]);



		return redirect('showcommissionbook');
	}

	public function viewcommission($id)
	{
		$select = DB::table('commissionbook')->where('id', $id)->first();
		return view('viewCommissionBook', compact('select'));
	}
	public function NewviewCommission($id)
	{
		$view = 1;
		$select = DB::table('commissionbook')->where('id', $id)->first();
		return view('viewCommissionBook', compact('select', 'view'));
	}
	public function showcommissionbook()
	{
		$select = DB::table('commissionbook')->get();
		return view('newcommissionbook', compact('select'));
	}

	public function checkbalance(Request $reqest)
	{
		$amountcheker = DB::table('VehicleAdvance')
			->orderBy('id', 'desc')->limit(1)
			->where('VehicleNO', $reqest->values)->first();

		if (!empty($amountcheker)) {
			$amount = $amountcheker->Amount;
			$trip = $amountcheker->TripNO + 1;
		} else {
			$amount = "";
			$trip = 1;
		}

		$array = [$amount, $trip];
		return $array;

	}




	public function edit_vehicle_voucher_expense($id)
	{
		$select = DB::table('VehiclePaymentVoucher')->where('VoucherNO', $id)->first();
		$amountcheker = DB::table('VehicleAdvance')->where('VehicleNO', $select->TruckNO)->orderBy('id', 'desc')->first();

		return view('challan.edit-vehicle-voucher', compact('select'));
	}

	public function save_edit_vehicle_voucher(Request $req)
	{

		$voucherNO = $req->voucherNo;
		$Rent = $req->Rent;
		$TruckNO = $req->TruckNO;
		$Date = $req->Date;
		$income = '';
		$expense = '';
		for ($i = 0; $i < count($req->stationName); $i++) {

			$income = (int) $income + (int) $req->stationAmount[$i];

			DB::table('VehiclePaymentVoucher')->where('id', $req->stationchargesID[$i])->update([

				'Date' => $Date,
				'VoucherNO' => $voucherNO,
				'TruckNO' => $TruckNO,
				'station' => $req->stationName[$i],
				'Rent' => $Rent,
				'Charges' => $req->stationAmount[$i],

			]);
		}


		for ($j = 0; $j < count($req->Expenseamount); $j++) {

			$expense = (int) $expense + (int) $req->Expenseamount[$j];

			DB::table('VehiclevoucherExpense')->where('id', $req->ExpenseID[$j])->update([
				'VoucherNO' => $voucherNO,
				'Detail' => $req->Detial[$j],
				'Date' => $Date,
				'Amount' => $req->Expenseamount[$j],

			]);

		}

		return redirect('show-payment-voucher');
	}

	public function show_payment_voucher()
	{
		$selectvehicles = DB::table('now_vehicles')->get();
		$voucherno = DB::table('VehiclePaymentVoucher')->select('VoucherNO')->orderBy('id', 'desc')->first();

		if (!empty($voucherno)) {
			$voucherno = $voucherno->VoucherNO;
		} else {
			$voucherno = 1;
		}
		$select = DB::table('VehiclePaymentVoucher')->select('VoucherNO')->DIstinct()->get();
		return view('challan.vehiclevoucher', compact('select', 'selectvehicles', 'voucherno'));
	}



	public function viewall_payment_voucher($id)
	{
		$select = DB::table('VehiclePaymentVoucher')->where('VoucherNO', $id)->first();
		$tripno = DB::table('VehicleAdvance')->where('VoucherNO', $id)->first();
		return view('challan.view-voucher', compact('select', 'tripno'));
	}

	public function add_payment_voucher_Expsense($id)
	{
		$select = DB::table('VehicleAdvance')->where('VoucherNO', $id)->first();
		return view('challan.addvehicleexpense', compact('id', 'select'));
	}
	public function add_nill_labour_process(Request $req)
	{

		foreach ($req->Details as $key => $data) {
			DB::table('nill_daily_expense')->insert([
				'Details' => $data,
				'Amount' => $req->amount[$key],
				'labour_date' => $req->labour_date,
			]);
		}
		return redirect()->back();


	}


	public function add_vehicle_voucher_expense(Request $req)
	{
		$total = [];
		for ($i = 0; $i < count($req->Details); $i++) {
			$total[] = $req->amount[$i];
			DB::table('VehiclevoucherExpense')->insert([
				'VoucherNO' => $req->voucherNO,
				'Detail' => $req->Details[$i],
				'Amount' => $req->amount[$i],
				'Date' => date('Y-m-d'),
			]);
		}
		$grosstotal = array_sum($total);
		$nettotal = $req->cash - $grosstotal;
		DB::table('VehicleAdvance')->where('VoucherNO', $req->voucherNO)->update([
			'Amount' => $nettotal
		]);
		return redirect('show-payment-voucher');
	}

	public function add_vehicle_voucher_process(Request $req)
	{

		$trip = $req->trip;
		$Rent = $req->Rent;
		$tatal = [];

		for ($i = 0; $i < count($req->stations); $i++) {
			$total[] = $req->amount[$i];
			$insert = DB::table('VehiclePaymentVoucher')->insert([
				'Date' => $req->Date,
				'VoucherNO' => $req->voucherNO,
				'TruckNO' => $req->truck,
				'Rent' => $req->Rent,
				'station' => $req->stations[$i],
				'Charges' => $req->amount[$i],
			]);
		}
		$gross = array_sum($total);
		$balance = $Rent - $gross;

		DB::table('VehicleAdvance')->insert([
			'VehicleNO' => $req->truck,
			'TripNO' => $trip,
			'Date' => $req->Date,
			'VoucherNO' => $req->voucherNO,
			'Amount' => $balance,
		]);
		return redirect('show-payment-voucher');
	}

	public function find_bilty_from_date(Request $request)
	{

		$From = $request->input('Fdate');
		$To = $request->input('Todate');
		$view_all = DB::table('challan')->whereBetween('date', [$From, $To])->orderBy('id', 'desc')->paginate(30);

		return view('challan.view', compact('view_all'));
	}

	public function print_challan_report($id)
	{
		return view('challan.challan_report_print', compact('id'));

	}

	public function edit_challan_process($idd, Request $request)
	{

		$challan = DB::table('challan')->delete($idd);

		$id = DB::table('challan')->insertGetId([
			'no' => $request->no,
			'date' => date('Y-m-d'),
			'selfcompany' => session('company')[0]->id,
			'driver' => $request->driver,
			'loadername' => $request->loadername,
			'dispatchtime' => $request->dispatchtime,
			'containerno' => $request->containerno,
			'containerseal' => $request->containerseal,
			'vehicle_id' => $request->vehicle_id,
			'from_station' => $request->from_station,
			'to_station' => $request->to_station,
			'station_type' => $request->station_type,
			'station_per' => $request->station_per,
			'mobile_no' => $request->mobile_no,
			'broker' => $request->broker,
			'DeliveryCharges' => $request->DeliveryCharges,
			'VehicleRent' => $request->VehicleRent,
			'notes' => $request->notes

		]);

		if ($id) {
			$builtyid = $id;
			$builtyid = $id;
			if (isset($request->trno) && count($request->trno) > 0) {
				$trno = count($request->trno);
			} else {
				$trno = 0;
			}

			if ($trno > 0) {
				for ($j = 0; $j < $trno; $j++) {
					$avid = DB::table('now_challanlist')->where(['challanid' => $idd, 'trno' => $request->trno[$j]])->delete();
					// $avid->delete();
					$id = DB::table('now_challanlist')->insertGetId(['challanid' => $builtyid, 'trno' => $request->trno[$j]]);
					DB::table('now_builty')->where('id', $request->trno[$j])->update(['builty_status' => 'dispatched']);

				}
			}

			return redirect("challan-report/$builtyid");
		} else {
			return redirect()->back();
		}

	}

	public function edit_challan($id)
	{
		$this->data['chalan'] = DB::table('challan')->find($id);
		// print_r($id);die;

		$this->data['vehicles'] = DB::table('now_vehicles')->get();
		$this->data['challanlist'] = DB::table('now_challanlist')->where('challanid', $id)->get();
		// echo "<pre>";print_r($this->data['challanlist']);die;
		$this->data['stations'] = DB::table('now_station')->where('is_delete', 1)->get();
		return view('challan.edit', $this->data);
	}


	public function filter_builty(Request $request)
	{
		$from = $request->from;
		$to = $request->to;
		$station = $request->station;
		$self_company = session('company')[0]->id;

		$builties = DB::select("
			SELECT * 
			FROM now_builty 
			WHERE date BETWEEN ? AND ? 
			AND `to` = ? 
			AND self_company = ?
		", [$from, $to, $station, $self_company]);

		$rows = count($builties);

		return response()->json(['data' => $builties, 'total_rows' => $rows]);
	}


	public function get_total_challan_frieght(Request $request)
	{
		if ($request->builties) {
			$total = [];
			$sql2 = DB::table('now_builty')->whereIn('now_builty.id', $request->builties)->get();

			foreach ($sql2 as $builties) {
				// $sql3 = DB::table('now_builtyitems')->where('builtyid',$builties->id)->first();
				if ($builties->Builtytype == 'Paid') {
					// $total[] = $sql3->rate;
				} else {
					$total[] = $builties->bilty_total;
				}

			}

			/*$manualbooks = DB::table('manual_book')->whereIn('manual_book.TRNO',$request->builties)->get();
					   
						foreach($manualbooks as $manualbook){
						   
							$total[] = $manualbook->Amount;
						}
					 */

			return array_sum($total);
		}
	}

	public function update_challan(Request $request)
	{

		//dd($request->all());
		$supplier = $request->sp;
		$builties = $request->builties;

		foreach ($builties as $key => $builty) {

			if (!empty($supplier[$key])) {

				DB::table('now_builtyitems')->where('builtyid', $builty)->update(['supplier' => $supplier[$key]]);
			}

		}


		$challan = DB::table('challan')->where('id', $request->id)->update([
			'other_detail' => $request->otherdetail,
			'other_amount' => $request->otheramount,
			'DeliveryCharges' => $request->dc,
			'VehicleRent' => $request->freight,
			'notes' => $request->notes
		]);

		if ($challan) {
			return 'true';
		}
	}








}
