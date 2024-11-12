<!DOCTYPE html>
<html>
	
		<meta charset="utf-8">
		<title>NSK :: Topaid Bilty Report </title>
		<style>
			body{
				margin:0;
				padding:0;
				font-size: 12px;
				font-family: serif;
			}
			.page-break {
    		page-break-after: always;
			}
			input[type='checkbox'] {
        width:10px;
        height:10px;
				margin-bottom:1px;
				margin-right:5px;
    	}
		</style>
	
	<body>

	<?php
          function convert_number_to_words($number) {
            $hyphen      = '-';
            $conjunction = ' and ';
            $separator   = ', ';
            $negative    = 'negative ';
            $decimal     = ' point ';
            $dictionary  = array(
                0                   => 'Zero',
                1                   => 'One',
                2                   => 'Two',
                3                   => 'Three',
                4                   => 'Four',
                5                   => 'Five',
                6                   => 'Six',
                7                   => 'Seven',
                8                   => 'Eight',
                9                   => 'Nine',
                10                  => 'Ten',
                11                  => 'Eleven',
                12                  => 'Twelve',
                13                  => 'Thirteen',
                14                  => 'Fourteen',
                15                  => 'Fifteen',
                16                  => 'Sixteen',
                17                  => 'Seventeen',
                18                  => 'Eighteen',
                19                  => 'Nineteen',
                20                  => 'Twenty',
                30                  => 'Thirty',
                40                  => 'Fourty',
                50                  => 'Fifty',
                60                  => 'Sixty',
                70                  => 'Seventy',
                80                  => 'Eighty',
                90                  => 'Ninety',
                100                 => 'Hundred',
                1000                => 'Thousand',
                1000000             => 'Million',
                1000000000          => 'Billion',
                1000000000000       => 'Trillion',
                1000000000000000    => 'Quadrillion',
                1000000000000000000 => 'Quintillion'
            );

            if (!is_numeric($number)) {
                return false;
            }

            if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
                // overflow
                trigger_error(
                    'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                    E_USER_WARNING
                );
                return false;
            }

            if ($number < 0) {
                return $negative . convert_number_to_words(abs($number));
            }

            $string = $fraction = null;

            if (strpos($number, '.') !== false) {
                list($number, $fraction) = explode('.', $number);
            }

            switch (true) {
                case $number < 21:
                    $string = $dictionary[$number];
                    break;
                case $number < 100:
                    $tens   = ((int) ($number / 10)) * 10;
                    $units  = $number % 10;
                    $string = $dictionary[$tens];
                    if ($units) {
                        $string .= $hyphen . $dictionary[$units];
                    }
                    break;
                case $number < 1000:
                    $hundreds  = $number / 100;
                    $remainder = $number % 100;
                    $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                    if ($remainder) {
                        $string .= $conjunction . convert_number_to_words($remainder);
                    }
                    break;
                default:
                    $baseUnit = pow(1000, floor(log($number, 1000)));
                    $numBaseUnits = (int) ($number / $baseUnit);
                    $remainder = $number % $baseUnit;
                    $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                    if ($remainder) {
                        $string .= $remainder < 100 ? $conjunction : $separator;
                        $string .= convert_number_to_words($remainder);
                    }
                    break;
            }

            if (null !== $fraction && is_numeric($fraction)) {
                $string .= $decimal;
                $words = array();
                foreach (str_split((string) $fraction) as $number) {
                    $words[] = $dictionary[$number];
                }
                $string .= implode(' ', $words);
            }

            return $string;
        }
        
        	if($builties->cutomer_type == 'Walkin'){
    			$charges = DB::table('customer_ratelist')
    			->join('now_rateslist','customer_ratelist.ratelist_id','now_rateslist.id')
    			->where('customer_ratelist.StationIdFrom',$builties->from)
    			->where('customer_ratelist.StationIdTo',$builties->to)
    			->where('customer_ratelist.customer_profile','normal')
    			->where('now_rateslist.package',$builties->package_id)
    			->first();
    		}else if($builties->cutomer_type == 'Billed'){
    		
    			$charges = DB::table('customer_ratelist')
    			->join('now_rateslist','customer_ratelist.ratelist_id','now_rateslist.id')
    			->where('customer_ratelist.StationIdFrom',$builties->from)
    			->where('customer_ratelist.StationIdTo',$builties->to)
    			->where('customer_ratelist.customer_profile','Billed')
    			->where('now_rateslist.package',$builties->package_id)
    			->first();
    		
    		}
    		   $charge_headers =  explode(',',$charges->other_charges);
			   $charge_amount =  explode(',',$charges->other_amount);
			  
          ?>

		<div style="width:800px !important;">
			<div style="width:100%;">
				<div style="float:left;width:180px;">
					<img src="images/logo.jpg" width="140px" height="40px" style="padding:10px 0px 0px 0px;"/>
				</div>
				<div style="float:left;width:350px;">
					<center>
						<p style="padding:5px;">
							<span style="font-size:14px;display:block;"><b>Office's Copy</b></span>
							<span style="font-size:14px;">TRANSIT RECIEPT</span><br>
							<strong style="font-size:12px;color:#000000;">NTN: 5215306-4</strong>
						</p>
					</center>
				</div>
				<div style="float:left;width:200px;text-align:right;">
					<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
				</div>
			</div>
			<div style="clear:both;"></div>

			<hr style="color:#ffb968;">
			<center>
				<p style="padding:0px !important;margin:0px !important;"><b>Head Office:</b> Plot No. A-353, Street No.1, Gate No. 5, Quaid-e-Azam Truck Stand, Hawks Bay Road, Karachi, Pakistan.<br>
				<img src="images/phone.png" width="10px" height="10px"> &nbsp;92-21-32350818-19-20-92 &nbsp;<img src="images/fax.png" width="10px" height="10px"> &nbsp;92-21-32350761 <img src="images/mobile.png" width="10px" height="10px"> &nbsp;0307-2222839, 0302-8296688<br>
				<img src="images/globe.png" width="10px" height="10px"> &nbsp;www.nsk.com.pk&nbsp; <img src="images/email.png" width="10px" height="10px"> &nbsp;nskg_trco1@yahoo.com</p>
			</center>
			<table width="100%" cellpadding='5' cellspacing="5" style="border:0px !important;line-height:5px;">
				<?php
					$date = date('d/m/Y', strtotime($builties->date)) ;
				?>
				<tr>
					<td width="50%">Date : <input type="text" value="{{ $date }}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:80%;" /></td>
					<td width="50%">Bilty No. <input type="text" value="{{ $builties->id }}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:70%;" /></td>
				</tr>
				<tr>
					<td width="50%">Sender : <input type="text" value="{{ $builties->sendername }}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:80%;" /></td>
					<td width="50%">Reciever : <input type="text" value="{{ $builties->receivername }}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:70%;" /></td>
				</tr>
				<tr>
					<?php
                        $Totation = DB::table('now_station')
                        ->where('id',$builties->to)
                        ->first();
                        ?>
					<td>KARACHI To : <input type="text" value="{{ $Totation->name }}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:65%;" /></td>

					<td>Vehicle No. <input type="text" value="{{ $builties->refno }}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:71%;" /></td>
				</tr>
			</table>
			<table width="100%" border="1" cellspacing="0" style="text-align:center;" >
				<tr >
					<th>Qty</th>
					<th>Description</th>
					<th colspan="3">Weight</th>
				</tr>
					 <?php
	                    $record = DB::table('now_builtyitems')->where('builtyid',$builties->id)->get();
	                  
	                                
					if(isset($record) && sizeof($record) > 0 ){
					
					?>
					@foreach($record as $rec)
					
						<tr>
							<td> {{ $rec->quantity }} </td>
							<td> {{ $rec->brand }} </td>
							<td colspan="3"> {{ $rec->weight }} </td>
						</tr>
					@endforeach()
					<?php
					}
					?>

					</td>
				</tr>
			</table>
	
			<table width="100%" border="1" cellspacing="0" style="text-align:left;" >
			    
				<?php
				$total = 0;
				if(isset($charge_headers) && sizeof($charge_headers) > 0){
				?>
				<tr>
				    <th> Freight </th>
				    @foreach($charge_headers as $headers)
				    	<th>{{ $headers }}</th>
				    @endforeach
				    <th> Other </th>
				    
				    	<th>Total</th>
				
					
				</tr>
				<tr>
				    <td>{{ $charges->rate }}</td>
				  @foreach($charge_amount as $amount)
				    	<td>{{ $amount }}</td>
				    @php $total += $amount @endphp
				    @endforeach
				    <td> {{ $charges->detentional_amount }} </td>
				    <td>{{ $total+$charges->rate+$charges->detentional_amount }}</td>
				   
				</tr>
				<?php
				}
				?>
			</table>

			<div class="amount" style="width:49%;height:100px;float:left;margin-left:5px;">
				<p style="margin-left:15px;font-size:14px;">Amount in Words:<br/><b> {{ convert_number_to_words($total+$charges->rate+$charges->detentional_amount) }} </b></p>
			</div>
			<div class="amount" style="width:49%;height:100px;float:right;margin-left:5px;">
				<p style="margin-left:15px;font-size:14px;text-align:right;">Generated by : {{--$name--}}</b></p>
			</div>
			<div style="clear:both;"></div>
			<table width="100%">
				<tr>
					<td style="font-size:10px;color:#707070;">This is a computer generated copy and does not require any signature</td>
					<!-- <td width="65%" height="100px" style="border:1px solid #000;">
						<table width="100%" style="float:left;text-align:left;">
							<td height="100px" valign="top" width="50%" style="text-decoration:underline;font-size:10px;">For Office Use Only</td>
							<td height="100px" valign="bottom" width="50%" style="text-decoration:overline;font-size:10px;text-align:right;padding:-5 5 25 5;">Clerk Sign</td>
						</table>
					</td> -->
				</tr>
			</table>
			<div style="clear:both;"></div>
			<div style="text-align:right;font-size:10px;">-By Dusky Solution</div>
		</div>
<hr>
		<div style="clear:both;width:800px !important;">
			<div style="width:100%;">
				<div style="float:left;width:180px;">
					<img src="images/logo.jpg" width="140px" height="40px" style="padding:10px 0px 0px 0px;"/>
				</div>
				<div style="float:left;width:350px;">
					<center>
						<p style="padding:5px;">
							<span style="font-size:14px;display:block;"><b>Client's Copy</b></span>
							<span style="font-size:14px;">TRANSIT RECIEPT</span><br>
							<strong style="color:##000000;font-size:12px;">NTN: 5215306-4</strong>
						</p>
					</center>
				</div>
				<div style="float:left;width:200px;text-align:right;">
					<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
				</div>
			</div>
			<div style="clear:both;"></div>

			<hr style="color:#ffb968;">
			<center>
				<p style="padding:0px !important;margin:0px !important;"><b>Head Office:</b> Plot No. A-353, Street No.1, Gate No. 5, Quaid-e-Azam Truck Stand, Hawks Bay Road, Karachi, Pakistan.<br>
				<img src="images/phone.png" width="10px" height="10px"> &nbsp;92-21-32350818-19-20-92 &nbsp;<img src="images/fax.png" width="10px" height="10px"> &nbsp;92-21-32350761 <img src="images/mobile.png" width="10px" height="10px"> &nbsp;0307-2222839, 0302-8296688<br>
				<img src="images/globe.png" width="10px" height="10px"> &nbsp;www.nsk.com.pk&nbsp; <img src="images/email.png" width="10px" height="10px"> &nbsp;nskg_trco1@yahoo.com</p>
			</center>
			<table width="100%" cellpadding='5' cellspacing="5" style="border:0px !important;line-height:5px;">
				<?php
					$date = date('d/m/Y', strtotime($builties->date)) ;
				?>
				<tr>
					<td width="50%">Date : <input type="text" value="{{ $date }}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:80%;" /></td>
					<td width="50%">Bilty No. <input type="text" value="{{$builties->id}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:70%;" /></td>
				</tr>
				<tr>
					<td width="50%">Sender : <input type="text" value="{{$builties->sendername}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:80%;" /></td>
					<td width="50%">Reciever : <input type="text" value="{{$builties->receivername}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:70%;" /></td>
				</tr>
				<?php
                    $Totation = DB::table('now_station')
                    ->where('id',$builties->to)
                    ->first();
                    ?>
				<tr>
					<td>KARACHI To : <input type="text" value="{{$Totation->name}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:65%;" /></td>

					<td>Vehicle No. <input type="text" value="{{$builties->refno }}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:71%;" /></td>
				</tr>
			</table>
			<table width="100%" border="1" cellspacing="0" style="text-align:center;" >
				<tr >
					<th>Qty</th>
					<th>Description</th>
					<th colspan="3">Weight</th>
				</tr>
					<?php
	                    $record = DB::table('now_builtyitems')->where('builtyid',$builties->id)->get();
	                
	                                
					if(isset($record) && sizeof($record) > 0 ){
					
					?>
					@foreach($record as $rec)
					
						<tr>
							<td> {{ $rec->quantity }} </td>
							<td> {{ $rec->brand }} </td>
							<td colspan="3"> {{ $rec->weight }} </td>
						</tr>
					@endforeach

					<?php
					}
					?>
					</td>
				</tr>
			</table>
			<table width="100%" border="1" cellspacing="0" style="text-align:left;" >
				<?php
				$total = 0;
				if(isset($charge_headers) && sizeof($charge_headers) > 0){
				?>
				<tr>
				    <th> Freight </th>
				    @foreach($charge_headers as $headers)
				    	<th>{{ $headers }}</th>
				    @endforeach
				    <th> Other </th>
				    
				    	<th>Total</th>
				
					
				</tr>
				<tr>
				    <td>{{ $charges->rate }}</td>
				  @foreach($charge_amount as $amount)
				    	<td>{{ $amount }}</td>
				    @php $total += $amount @endphp
				    @endforeach
				    <td> {{ $charges->detentional_amount }} </td>
				    <td>{{ $total+$charges->rate+$charges->detentional_amount }}</td>
				   
				</tr>
				<?php
				}
				?>
			</table>

			<div class="amount" style="width:49%;height:100px;float:left;margin-left:5px;">
				<p style="margin-left:15px;font-size:14px;">Amount in Words:<br/><b> {{ convert_number_to_words($total+$charges->rate+$charges->detentional_amount) }}</b></p>
			</div>
			<div class="amount" style="width:49%;height:100px;float:right;margin-left:5px;">
				<p style="margin-left:15px;font-size:14px;text-align:right;">Generated by : {{--$name--}}</b></p>
			</div>
			<div style="clear:both;"></div>
			<table width="100%">
				<tr>
					<td style="font-size:10px;color:#707070;">This is a computer generated copy and does not require any signature</td>
					<!-- <td width="65%" height="100px" style="border:1px solid #000;">
						<table width="100%" style="float:left;text-align:left;">
							<td height="100px" valign="top" width="50%" style="text-decoration:underline;font-size:10px;">For Office Use Only</td>
							<td height="100px" valign="bottom" width="50%" style="text-decoration:overline;font-size:10px;text-align:right;padding:-5 5 25 5;">Clerk Sign</td>
						</table>
					</td> -->
				</tr>
			</table>
			<div style="text-align:right;font-size:10px;">-By Dusky Solution</div>
		</div>
		<p class="page-break"></p>
		<div style="width:800px !important;">
			<div style="width:100%;">
				<div style="float:left;width:180px;">
					<img src="images/logo.jpg" width="140px" height="40px" style="padding:10px 0px 0px 0px;"/>
				</div>
				<div style="float:left;width:350px;">
					<center>
						<p style="padding:5px;">
							<span style="font-size:14px;display:block;"><b>Customer's Copy</b></span>
							<span style="font-size:14px;">TRANSIT RECIEPT</span><br>
							<strong style="color:#000000;font-size:12px;;">NTN: 5215306-4</strong>
						</p>
					</center>
				</div>
				<div style="float:left;width:200px;text-align:right;">
					<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
				</div>
			</div>
			<div style="clear:both;"></div>

			<hr style="color:#ffb968;">
			<center>
				<p style="padding:0px !important;margin:0px !important;"><b>Head Office:</b> Plot No. A-353, Street No.1, Gate No. 5, Quaid-e-Azam Truck Stand, Hawks Bay Road, Karachi, Pakistan.<br>
				<img src="images/phone.png" width="10px" height="10px"> &nbsp;92-21-32350818-19-20-92 &nbsp;<img src="images/fax.png" width="10px" height="10px"> &nbsp;92-21-32350761 <img src="images/mobile.png" width="10px" height="10px"> &nbsp;0307-2222839, 0302-8296688<br>
				<img src="images/globe.png" width="10px" height="10px"> &nbsp;www.nsk.com.pk&nbsp; <img src="images/email.png" width="10px" height="10px"> &nbsp;nskg_trco1@yahoo.com</p>
			</center>
			<table width="100%" cellpadding='5' cellspacing="5" style="border:0px !important;line-height:5px;">
				<?php
					$date = date('d/m/Y', strtotime($builties->date)) ;

				?>
				<tr>
					<td width="50%">Date : <input type="text" value="{{ $date }}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:80%;" /></td>
					<td width="50%">Bilty No. <input type="text" value="{{$builties->id}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:70%;" /></td>
				</tr>
				<tr>
					<td width="50%">Sender : <input type="text" value="{{$builties->sendername}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:80%;" /></td>
					<td width="50%">Reciever : <input type="text" value="{{$builties->receivername}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:70%;" /></td>
				</tr>

				<?php
                    $Totation = DB::table('now_station')
                    ->where('id',$builties->to)
                    ->first();
                    ?>

				<tr>
					<td>KARACHI To : <input type="text" value="{{$Totation->name}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:65%;" /></td>

					<td>Vehicle No. <input type="text" value="{{$builties->refno}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:71%;" /></td>
				</tr>
			</table>
			<table width="100%" border="1" cellspacing="0" style="text-align:center;" >
				<tr >
					<th>Qty</th>
					<th>Description</th>
					<th colspan="3">Weight</th>
				</tr>
					<?php
	                    $record = DB::table('now_builtyitems')->where('builtyid',$builties->id)->get();
	                
	                                
					if(isset($record) && sizeof($record) > 0 ){
					
					?>
					@foreach($record as $rec)
					
						<tr>
							<td> {{ $rec->quantity }} </td>
							<td> {{ $rec->brand }} </td>
							<td colspan="3"> {{ $rec->weight }} </td>
						</tr>
					@endforeach

					<?php
					}
					?>

					</td>
				</tr>
			</table>
			<table width="100%" border="1" cellspacing="0" style="text-align:left;" >
				<?php
				$total = 0;
				if(isset($charge_headers) && sizeof($charge_headers) > 0){
				?>
				<tr>
				    <th> Freight </th>
				    @foreach($charge_headers as $headers)
				    	<th>{{ $headers }}</th>
				    @endforeach
				    <th> Other </th>
				    
				    	<th>Total</th>
				
					
				</tr>
				<tr>
				    <td>{{ $charges->rate }}</td>
				  @foreach($charge_amount as $amount)
				    	<td>{{ $amount }}</td>
				    @php $total += $amount @endphp
				    @endforeach
				    <td> {{ $charges->detentional_amount }} </td>
				    <td>{{ $total+$charges->rate+$charges->detentional_amount }}</td>
				   
				</tr>
				<?php
				}
				?>
			</table>

			<div class="amount" style="width:49%;height:100px;float:left;margin-left:5px;">
				<p style="margin-left:15px;font-size:14px;">Amount in Words:<br/><b> {{ convert_number_to_words($total+$charges->rate+$charges->detentional_amount) }} </b></p>
			</div>
			<div class="amount" style="width:49%;height:100px;float:right;margin-left:5px;">
				<p style="margin-left:15px;font-size:14px;text-align:right;">Generated by : {{--$name--}}</b></p>
			</div>
			<div style="clear:both;"></div>
			<!-- <div style="width:100%;padding:5px;border:1px solid #ffb968;">
				<h4 style="text-decoration:underline;"><b><i>Terms & Conditions</i></b></h4>
				<p><i>"New Sarhad Karachi Goods Transport Company holds no responsibility of any type of nature of Robbery and all other natural disasters locally or on road anywhere . All customers are strongly recommended to insure their goods. Please see Overleaf for terms & conditions"</i></p>
			</div> -->
			<table width="100%">
				<tr>
					<td style="font-size:10px;color:#707070;">This is a computer generated copy and does not require any signature</td>
					<!-- <td width="65%" height="100px" style="border:1px solid #000;">
						<table width="100%" style="float:left;text-align:left;">
							<td height="100px" valign="top" width="50%" style="text-decoration:underline;font-size:10px;">For Office Use Only</td>
							<td height="100px" valign="bottom" width="50%" style="text-decoration:overline;font-size:10px;text-align:right;padding:-5 5 25 5;">Clerk Sign</td>
						</table>
					</td> -->
				</tr>
			</table>
			<div style="text-align:right;font-size:10px;">-By Dusky Solution</div>
		</div>
	</body>
</html>
