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
 
<body onload="window.print()">
	
	<br>
	<br>
	<br>
	<br>
	<br>
	<div style="width: 100%;">
		<table style="text-align: center;">
			<tr>
				<td colspan="2" style="border:2px solid #c7c3c3;">{{$bilty[0]->stationdetail->station_name??$bilty[0]->station_name}}</td>
				<td colspan="2" style="border:none;">کراچی  تا  </td>
				<td colspan="3" style="border:2px solid #c7c3c3;">{{date("d-m-Y", strtotime($bilty[0]->date))??''}}</td>
				<td colspan="1" style="border:none;">تاریخ </td>
				<td colspan="1" style="border:2px solid #c7c3c3;">{{$bilty[0]->bilty_no??''}}</td>
				<td colspan="2" style="border:none;">بلٹی نمبر  </td>
				<td colspan="2" style="border:2px solid #c7c3c3;">{{$bilty[0]->id??''}}</td>
				<td colspan="2" style="border:none;">کمپیوٹر نمبر </td>
			</tr>
			<tr>
				<td colspan="4" style="border:2px solid #c7c3c3;">{{$bilty[0]->getsenderphone[0]->number??$bilty[0]->sender_no}}</td>
				<td colspan="2" style="border:none;">فون نمبر </td>
				
				<td colspan="6" style="border:2px solid #c7c3c3;">@if($bilty[0]->customer_type=="urd"){{$bilty[0]->getsender[0]->customer_name_urdu??$bilty[0]->sender_name}}@else{{ $bilty[0]->getsender[0]->customer_name }}@endif</td>
				<td colspan="3" style="text-align: right;">بھیجنے والے کا نام </td>
			</tr>
			<tr>
				<td colspan="4" style="border:2px solid #c7c3c3;">{{$bilty[0]->getreceiverphone[0]->number??$bilty[0]->receiver_no}}</td>
				<td colspan="5" style="border:2px solid #c7c3c3;">
					@if($bilty[0]->customer_type=="urd"){{$bilty[0]->getreceiver[0]->customer_name_urdu??$bilty[0]->receiver_name}}@else{{ $bilty[0]->getsender[0]->customer_name }}@endif
				</td>
				<td colspan="5" style="text-align: right;">وصول کرنے والے کا نام </td>
			</tr>
			<tr>
				<td colspan="4" style="border:2px solid #c7c3c3;">{{$bilty[0]->ref_2??''}}</td>
				<td colspan="3">ریفرینس نمبر  2</td>
				<td colspan="4" style="border:2px solid #c7c3c3;">{{$bilty[0]->ref_1??''}}</td>
				<td colspan="4" style="text-align: right;">ریفرنس نمبر  1</td>
			</tr>
			<tr>
				<td colspan="14" rowspan="2" style="border:2px solid #c7c3c3;"><span style="text-align:center;">
					@if($page==0) 
					Original
					@endif
					@if($page==1)
					Duplicate
					@endif
					@if($page==2)
					Office Copy
					@endif
					@if($page==3)
					Triplicate 
					@endif <span dir="rtl">نوٹ : بغیر بلٹی مال ڈلیور نہ کیا جائے  </span></span><span> Track your goods on mgctc-online.com.</span></td>
			</tr>
		</table>
	</div>
	<table style="text-align: center;">
		<tr>
			<td colspan="6"></td>
			<td colspan="6"></td>
		</tr>
		<tr>
			<td colspan="4">
				<table>
					<tr>
						<td style="border:2px solid #c7c3c3;">رقم </td>
						<td style="border:2px solid #c7c3c3;">چارجز </td>
					</tr>
					<tr>
						<td style="border:2px solid #c7c3c3;">{{--$bilty[0]->rent??''--}} XXXX </td>
						<td style="border:2px solid #c7c3c3;">کرایہ </td>
					</tr>

					<tr>
						<td style="border:2px solid #c7c3c3;">{{--$bilty[0]->labour??''--}} - </td>
						<td style="border:2px solid #c7c3c3;">مزدوری </td>
					</tr>
					<tr>
						<td style="border:2px solid #c7c3c3;">{{--$bilty[0]->tt??''--}} - </td>
						<td style="border:2px solid #c7c3c3;">TT</td>
					</tr>
					<tr>
						<td style="border:2px solid #c7c3c3;">{{--$bilty[0]->local_charges??''--}} -</td>
						<td style="border:2px solid #c7c3c3;">لوکل چارجز </td>
					</tr>
					<tr>
						<td style="border:2px solid #c7c3c3;">{{--$bilty[0]->crane_charges??''--}} - </td>
						<td style="border:2px solid #c7c3c3;">لفٹر کرین چارجز </td>
					</tr>
					<tr>
						<td style="border:2px solid #c7c3c3;">{{--$bilty[0]->home_delivery??''--}} - </td>
						<td style="border:2px solid #c7c3c3;">ہوم ڈلیوری چارجز </td>
					</tr>
					<tr>
						<td style="border:2px solid #c7c3c3;">{{--$bilty[0]->other_charges??''--}} - </td>
						<td style="border:2px solid #c7c3c3;">دیگر چارجز </td>
					</tr>
					<tr>
						<td style="border:2px solid #c7c3c3;">{{--$bilty[0]->total_charges??''--}} XXXX</td>
						<td style="border:2px solid #c7c3c3;">کل رقم </td>
					</tr>
					<tr>
						<td style="border:2px solid #c7c3c3;">@if($bilty[0]->advance!="")
							{{--$bilty[0]->advance??''--}} XXXX
						   @endif
                            @if($bilty[0]->advance=="")
							{{--0--}} XXXX
						   @endif
						</td>
						<td style="border:2px solid #c7c3c3;">ایڈوانس </td>
					</tr>
					<tr>
						<td style="border:2px solid #c7c3c3;">@if($bilty[0]->advance!="")
							{{--$bilty[0]->balance??''--}} XXXX
						   @endif
						   @if($bilty[0]->advance=="")
							{{--$bilty[0]->total_charges??''--}} XXXX
						   @endif</td>
						<td style="border:2px solid #c7c3c3;">بقایا </td>
					</tr>
					<tr>
						@if($bilty[0]->bilty_type=="ToPay")
						<td colspan="5" >بلٹی   <span>:غیر ادا شدہ  </span><span>کرایہ</span> کیفیت</td>
						@endif
						@if($bilty[0]->bilty_type=="Paid")
						<td colspan="5" >بلٹی   <span>: ماہانہ   بل</span><span>کرایہ</span> کیفیت</td>
						@endif
						@if($bilty[0]->bilty_type=="advance")
						<td colspan="5" >بلٹی    <span>: نقد  بل</span><span>کرایہ</span> کیفیت</td>
						@endif
					</tr>
				</table>
			</td>
			<td colspan="8">
				<table>
					<thead>
						<tr>
							<th colspan="1" style="border:2px solid #c7c3c3;">وزن</th>
							<th colspan="3" style="border:2px solid #c7c3c3;">برانڈ مارک </th>
							<th colspan="3" style="border:2px solid #c7c3c3;">تفصیل مال </th>
							<th colspan="3" style="border:2px solid #c7c3c3;">پیکنگ </th>
							<th colspan="1" style="border:2px solid #c7c3c3;">تعداد </th>
						</tr>
					</thead>
					<tbody>
						@php
						$weight = 0;
						$qty = 0;
						@endphp
						@foreach($biltymeta as $values)
						@php
						$weight += $values->weight;
						$qty += $values->quantity;
						$packingname = DB::table('packages_metas')->where('packages_id',$values->packing_id)->first();
						@endphp
						<tr>
							<td colspan="1" style="border:2px solid #c7c3c3;">{{$values->weight??''}}</td>
							<td colspan="3" style="border:2px solid #c7c3c3;">{{$values->brand??''}}</td>
							<td colspan="3" style="border:2px solid #c7c3c3;">{{$values->description??''}}</td>
							<td colspan="3" style="border:2px solid #c7c3c3;">{{$packingname->package_name??$values->packing}}</td>
							<td colspan="1" style="border:2px solid #c7c3c3;">{{$values->quantity}}</td>
						</tr>
						@endforeach
						<tr>
							<td colspan="1" style="border:2px solid #c7c3c3;">{{$weight}}</td>
							<td colspan="9" style="border:2px solid #c7c3c3;">کل </td>
							<td colspan="1" style="border:2px solid #c7c3c3;">{{$qty}}</td>

						</tr>
						<tr>
							<td colspan="11" ></td>
						</tr>
						<tr>
							<td colspan="11" ></td>
						</tr>
						<tr>
							<td colspan="11" ></td>
						</tr>
						<tr>
							<td colspan="11" ></td>
						</tr>
						<tr>
							<td colspan="11" ></td>
						</tr>
						<tr>
							<td colspan="11" ></td>
						</tr>
						<tr>
							<td colspan="11" ></td>
						</tr>
						<tr>
							<td colspan="9" style="border:2px solid #c7c3c3;">{{$bilty[0]->note??''}}</td>
							<td colspan="2" style="border:2px solid #c7c3c3;">نوٹ</td>

						</tr>
						<tr>
							<td  colspan="3"  style="border:2px solid #c7c3c3;">{{$bilty[0]->stationdetail->phone_1 ??''}}</td>
							<td colspan="6" style="border:2px solid #c7c3c3;">{{$bilty[0]->delivery_address??''}}</td>
							<td colspan="3" style="border:2px solid #c7c3c3;">ترسیل کا پتہ</td>
						</tr>
						
					</tbody>
				
				</table>
			</td>
		</tr>
	</table>
	
</body>
</html>