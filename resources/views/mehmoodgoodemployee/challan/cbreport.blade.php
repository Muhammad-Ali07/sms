<!DOCTYPE html>
<html>
<head>

	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- <link rel="stylesheet" href="{{ asset('public/assets/fonts/ArialUnicodeMS.ttf') }}"> -->
	<!-- <style>
		*{  font-family: 'Droid Arabic Naskh' }
	</style> -->
</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<table style="text-align:center;" width="80%">
		<thead>
	<tr>
		<th style="text-align:left;" >Date</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;">{{date("d-m-Y", strtotime($cb[0]->date ))??''}}</td>
		<th style="text-align:left;" >Truck No.</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: left;margin-top:10% !important;">{{$cb[0]->getvehicledata[0]->car_number}}</td>
		<th style="text-align:left;" >C.B.#</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: left;margin-top:10% !important;">{{$cb[0]->cb_number??''}}</td>
	</tr>
			>
		</thead>
    </table>
    <br><br>
	<table style="text-align:center;" width="100%">
		<thead>
			<tr>
				<th width="10%" style="border:2px solid #c7c3c3;">S.No</th>
				<th width="10%" style="border:2px solid #c7c3c3;">CB.No</th>
				<th width="60%" style="border:2px solid #c7c3c3;">Description</th>
				<th width="20%" style="border:2px solid #c7c3c3;">Amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cb[0]->getcommissionbookmetas as $key=>$value)
			@php

			$challan = DB::table('challan')->where('id',$value->challan_metaid)
			->first();
			$station = DB::table('station_details')->where('id',$challan->station_id)
			->first();
			 
			$vehicle = DB::table('vehicle')->where('id',$challan->driver_id)
			->first();
			@endphp
			<tr>
				<td width="10%" style="border:2px solid #c7c3c3;">{{$key+1??''}}</td>
				<td width="10%" style="border:2px solid #c7c3c3;">{{$challan->id}}</td>
				<td width="60%" style="border:2px solid #c7c3c3;">{{$station->station_name??''}}</td>
				<td width="20%" style="border:2px solid #c7c3c3;">{{$challan->total_amount??''}}</td>
			</tr>
			
			@endforeach

           
		</tbody>
		<tr>
		 <td colspan="3" style="border:2px solid #c7c3c3;">Total</td>
			<td style="border:2px solid #c7c3c3;">{{$cb[0]->totalreceiving??''}}</td>	
			</tr>	
	</table>
	<br><br>
	<table align="right"  width="100%">
		<thead>
			<tr>
				
				<td  width="20%" style="border-bottom: 1px solid #000;">{{$cb[0]->totalreceiving??''}}</td>
				<th style="text-align:left;" >کل وصولی</th>
				<td  width="20%"></td>
				<td  width="18%"></td>
				<td  width="20%" style="border-bottom: 1px solid #000;">
					@if($cb[0]->total_weight!=1)
					{{$cb[0]->total_weight??''}}
				     @endif
				    @if($cb[0]->total_weight==1)
					{{"0"}}
				     @endif

				 </td>
				<th style="text-align:left;" >کل وزن</th>
			</tr>
			<tr>
				<td  width="20%" style="border-bottom: 1px solid #000;">{{$cb[0]->fixrent??''}}</td>
				<th style="text-align:left;" >طے شدہ کرايہ</th>
			</tr>
			<tr>
				<td  width="20%" style="border-bottom: 1px solid #000;">{{$cb[0]->cash_receiving??''}}</td>
				<th style="text-align:left;" >نقد ادائیگی</th>
			</tr>
			<tr>
				<td  width="20%" style="border-bottom: 1px solid #000;">{{$cb[0]->commission??''}}</td>
				<th style="text-align:left;" >کمیشن</th>
			</tr>
			<tr>
				<td  width="20%" style="border-bottom: 1px solid #000;">{{$cb[0]->remaining_commission??''}}</td>
				<th style="text-align:left;" >پہنچ کمیشن بقایا</th>
			</tr>		
		</thead>
	</table>

	
</body>
</html>