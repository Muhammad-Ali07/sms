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
	<table width="100%" style="align-content: center; font-size: 10px; text-align: center;">
		<tr>
			<td colspan="20"></td>
		</tr>
		<tr>

			<td colspan="2" style="border:2px solid #c7c3c3;">{{date('g:iA', strtotime($challan[0]->dispatch_time??''))}}</td>
			<td colspan="2">وقت روانگی </td>
			<td colspan="2" style="border:2px solid #c7c3c3;">{{$challan[0]->loader_name??''}}</td>
			<td colspan="2">نام لوڈر </td>
			<td colspan="2" style="border:2px solid #c7c3c3;">{{ $challan[0]->getvehicle->owner_name ??''}}</td>
			<td colspan="2">نام ڈرائیور </td>
			<td colspan="2" style="border:2px solid #c7c3c3;">{{date("d-m-Y")}}</td>
			<td colspan="2">تاریخ </td>
			<td colspan="2" style="border:2px solid #c7c3c3;">{{$challan[0]->id ??''}}</td>
			<td colspan="2" style="text-align: right;">چالان نمبر </td>
		</tr>
                  
		<tr>
			<td colspan="8"></td>
			<td colspan="4" style="border:2px solid #c7c3c3;">{{ $challan[0]->getvehicle->car_number }}</td>
			<td colspan="2" style="text-align: right;">ٹرک  نمبر </td>
			<td colspan="3" style="border:2px solid #c7c3c3;">{{$challan[0]->getstation->station_name}}</td>
			<td colspan="3" style="text-align: right;">کراچی تا </td>
		</tr>
		<tr>
			<td colspan="8"></td>
			<td colspan="4" style="border:2px solid #c7c3c3;">{{$challan[0]->broker_name}}</td>
			<td colspan="2" style="text-align: right;">مالک / بروکر </td>
			<td colspan="3" style="border:2px solid #c7c3c3;">{{$challan[0]->mobilenum->phone_no}}</td>
			<td colspan="3" style="text-align: right;">موبائل نمبر </td>
		</tr>
   
		<tr>
			<td colspan="8"></td>
			<td colspan="4" style="border:2px solid #c7c3c3;">{{$challan[0]->cont_seal}}</td>
			<td colspan="2" style="text-align: right;">سیل نمبر </td>
			<td colspan="3" style="border:2px solid #c7c3c3;">{{$challan[0]->cont_number}}</td>
			<td colspan="3" style="text-align: right;">کنٹینر نمبر </td>
		</tr>
	</table>
	<br>
	<br>
   
	<table style="text-align: center;font-size: 10px;">
		<thead>
			<tr>
				<th width="10%" style="border:2px solid #c7c3c3;"><b>  بقایا رقم </b></th>
				<th width="8%" style="border:2px solid #c7c3c3;"><b>  پیشگی</b> </th>
				<th width="8%"  style="border:2px solid #c7c3c3;"><b>  کرایہ </b></th>
				<th width="8%" style="border:2px solid #c7c3c3;"><b>  وزن </b></th>
				<th width="13%" style="border:2px solid #c7c3c3;"><b>  تفصیل </b></th>
				<th width="5%" style="border:2px solid #c7c3c3;"><b>تعداد </b></th>
				<th width="20%" style="border:2px solid #c7c3c3;"><b>  وصوال کرنے والے کا نام </b></th>
				<th width="18%" style="border:2px solid #c7c3c3;"><b>  بھیجنے والے کا نام </b></th>
				<th width="11%" style="border:2px solid #c7c3c3;"><b>  بلٹی نمبر </b></th>
			</tr>
		</thead>
		<tbody>
			@php 
				$totalBilty = 0; 
				$totalQty = 0;
				$totalWeight = 0;
				$totalRent = 0;
                                 $weight = 0;
                               $totalWeight = 0;
				$totalCharges = 0;
				$totalAdvance = 0;
				$totalBalance = 0;
			@endphp
                
		@foreach($challanmeta as $key=>$value)
		        
			@foreach($value->getbiltydata as $biltyvalue)

			<tr>
				 @if($challanmeta[$key]->getbiltydata[0]->bilty_type=="Paid"||$challanmeta[$key]->getbiltydata[0]->bilty_type=="advance")
                     @php
                     $rent= "-";
                     $totalcharge= "-";
                     $peshgi = "-";
                     $rakam = "-";
                   

                     @endphp
                <td  width="8%" style="border:2px solid #c7c3c3;">{{ "-" }}</td>
				<td  width="10%" style="border:2px solid #c7c3c3;">{{ "-" }}</td>
                    
                    @else
                     @php
                     $rent = $biltyvalue->rent;
                     if(isset($biltyvalue->getbiltymeta[0])){
                    // $weight = $biltyvalue->getbiltymeta[0]->weight;
                    // $totalWeight +=  $weight;
                      }
                      if(!isset($biltyvalue->getbiltymeta[0])){
                     
                      }
                     $totalcharge = $biltyvalue->total_charges;
                     $peshgi = $biltyvalue->advance;
                     $rakam = 0;
                    $totalRent += $biltyvalue->rent??0;
                     @endphp
                     <td width="8%" style="border:2px solid #c7c3c3;">
					@if($biltyvalue->balance!=0){{$biltyvalue->balance??''}}
				    @endif
                     @if($biltyvalue->balance==0)
                     {{$biltyvalue->total_charges??''}}
                     @endif
                     @php
                     $totalCharges += $biltyvalue->total_charges??0;
                      if($biltyvalue->balance!="")
						{
						$totalBalance += $biltyvalue->balance??0;
					      }
						
						if($biltyvalue->balance=="")
						{
						$totalBalance += $biltyvalue->total_charges;
						}
                     @endphp

				  </td>
				<td width="10%" style="border:2px solid #c7c3c3;">
                      @if($biltyvalue->advance!="")
				   {{ $biltyvalue->advance}}
                     @endif
                      @if($biltyvalue->advance=="")
					{{0}}
					@endif
					@if($biltyvalue->advance==""&&$biltyvalue->advance!="")
					{{0}}
					 @endif
                     @php
                     $totalAdvance += $biltyvalue->advance??0;
                     @endphp
                    
           
				</td>
                     @endif
				

				

				<td width="8%" style="border:2px solid #c7c3c3;">{{$rent??''}}</td>
				<td width="8%" style="border:2px solid #c7c3c3;">
@php
$totalWeight += $bilty_weight??0;
                                $weight = $bilty_weight??0;
@endphp
                                         
				
                   {{ $weight ??''}}                    
                   
				</td>
				<td width="13%" style="border:2px solid #c7c3c3;">@if(isset($value->getbiltymetadata[0])){{$value->getbiltymetadata[0]->description??$value->getbiltywalkinmetadata[0]->description}}@endif</td>
				<td width="5%" style="border:2px solid #c7c3c3;">
                @if($value->bilty_quantity!=0){{$value->bilty_quantity}}@endif
                  
                       
                  @if($value->bilty_quantity==0)

                  @php
                  $checkinbiltyadjust = DB::table('biltyadjust_quantity')->where('bilty_id',$value->bilty_id)->first();
                  $bilty_quantity = DB::table('bilty_metas')->where('bilty_id',$value->bilty_id)->sum('quantity');
                  $bilty_weight = DB::table('bilty_metas')->where('bilty_id',$value->bilty_id)->sum('weight');
                  
                  @endphp
				   @if($checkinbiltyadjust=="")
				    @if(isset($value->getbiltymetadata[0]))
					{{$bilty_quantity??$value->getbiltywalkinmetadata[0]->quantity}}
					@php
					$totalQty += $bilty_quantity;
					$totalQty +=$value->getbiltywalkinmetadata[0]->quantity??0;
					@endphp
						@endif
					@endif
                     @if($checkinbiltyadjust!="")
                     {{$checkinbiltyadjust->total_quantity??''}}

                     @endif
                    

                @endif
				</td>
				<td  width="20%" style="border:2px solid #c7c3c3;">	

@if($biltyvalue->customer_type=="urd"){{$biltyvalue->getreceiver[0]->customer_name_urdu??$biltyvalue->sender_name}}@else{{ $biltyvalue->getsender[0]->customer_name??$biltyvalue->sender_name }}@endif</td>

				<td  width="18%" style="border:2px solid #c7c3c3;"> @if($biltyvalue->customer_type=="urd"){{$biltyvalue->getsender[0]->customer_name_urdu??$biltyvalue->sender_name }}@else{{ $biltyvalue->getsender[0]->customer_name??$biltyvalue->sender_name }}@endif</td>
				<td  width="11%" style="border:2px solid #c7c3c3;">{{$biltyvalue->bilty_no??''}}</td>
			</tr>
			@endforeach 
			
			@php 
				$totalBilty++; 
                              
				if($value->bilty_quantity!=0)
				{
				$totalQty += $value->bilty_quantity??0;
				}
           
				 if($value->bilty_quantity==0)
				 {
				 	 if(isset($checkinbiltyadjust))
				 {
				 	if($checkinbiltyadjust!="")
				 	{
				$totalQty +=	 $checkinbiltyadjust->total_quantity??0;
				 	}
				 }
				 if(isset($checkinbiltyadjust))
				 {
				if($checkinbiltyadjust=="")
				 {	 
				$totalQty += $value->getbiltymetadata[0]->quantity??0;
				}
			}
			}
				
				
				
				
				if(isset($biltyvalue))
				{
				
			}
		 @endphp
                    
                 @endforeach

             
		</tbody>
		<tbody>

			<tr style=" ">
				<td style="border:2px solid #c7c3c3;">
				
			     {{$totalBalance}}
               
			   </td>
				<td style="border:2px solid #c7c3c3;">{{$totalAdvance}}</td>
				<td style="border:2px solid #c7c3c3;">{{$totalCharges}}</td>
	<!--			<td style="border:2px solid #c7c3c3;">{{$totalRent}}</td>
	-->
	         <td style="border:2px solid #c7c3c3;"> {{$totalWeight}}</td>
				<td  style="border:2px solid #c7c3c3;"></td>
				<td  style="border:2px solid #c7c3c3;">{{$totalQty}}</td>
				<td style="border:2px solid #c7c3c3;"></td>
				<td  style="border:2px solid #c7c3c3;">ٹوٹل </td>
				<td style="border:2px solid #c7c3c3;">{{$totalBilty}}</td>
 		</tr>

			<tr>
				
				<td bgcolor="#c7c3c3" colspan="2"  style="line-height: 20px; border:1px solid #2c2c2c;"><font ><b> کل رقم : {{$totalBalance-$totalBalance*$challan[0]->delivery_commission/100}}</b></font></td>
				<td style="line-height: 20px" ><b>{{$challan[0]->next_rent}} </b></td>
				<td  ><b> اگلا کرایہ </b></td>
				<td  colspan="2"><b> دیگر چارجز {{ ":" }}  {{$challan[0]->other_charges}} </b></td>
				
				<td style="line-height: 20px"><b>{{$totalBalance*$challan[0]->delivery_commission/100}}</b></td>
				<td colspan="2"><b> ڈلیوری  کمیشن </b></td>
			</tr>
				<tr>
				<td colspan="8" style="border:2px solid #c7c3c3;"></td>
				<td >نوٹ </td>
			</tr>
			<br>
			<tr>
				<td  colspan="3">{{$challan[0]->getstation->phone_1 ??''}}</td>
				<td >فون نمبر </td>

				<td  colspan="3">{{$challan[0]->getstation->address_1 ??''}}</td>
				<td colspan="2">ڈلیوری  پتہ </td>
			</tr>
		</tbody>
	</table>
</body>
</html>