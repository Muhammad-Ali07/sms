<!DOCTYPE html>
<html>
	
		<meta charset="utf-8">
		<title>NSK :: Paid Bilty Report </title>
		<style>
			body{
				margin:0;
				padding:0;
				font-size: 12px;
				font-weight: bold;
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
	<div style="clear:both;width:800px;">
		
		@if(!empty($biltyRecord))
			@foreach($biltyRecord as $row)
		
			<div style="width:100%;">
				<div style="float:left;width:180px;">
					<img src="images/logo.jpg" width="140px" height="40px" style="padding:10px 0px 0px 0px;"/>
				</div>
				<div style="float:left;width:350px;">
					<center>
						<p style="padding:5px;">
							<span style="font-size:13px;display:block;"><b>Office's Copy</b></span>
							<span style="font-size:13px;">TRANSIT RECIEPT</span><br>
							<strong style="color:#000000;font-size:12px;">SNTN: 5215306-4</strong>
						</p>
					</center>
				</div>
				<div style="float:left;width:200px;text-align:right;">
					<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
				</div>
			</div>
			<div style="clear:both;"></div>
			<hr style="color:#ffb968;">
			<center style="font-size:14px;">
				<p style="padding:0px !important;margin:0px !important;"><b>Head Office:</b> Plot No. A-353, Street No.1, Gate No. 5, Quaid-e-Azam Truck Stand, Hawks Bay Road, Karachi, Pakistan.<br>
				<img src="images/phone.png" width="10px" height="10px"> &nbsp;92-21-32350818-19-20-92 &nbsp;<img src="images/fax.png" width="10px" height="10px"> &nbsp;92-21-32350761 <img src="images/mobile.png" width="10px" height="10px"> &nbsp;0307-2222839, 0302-8296688<br>
				<img src="images/globe.png" width="10px" height="10px"> &nbsp;www.nsk.com.pk&nbsp; <img src="images/email.png" width="10px" height="10px"> &nbsp;nskg_trco1@yahoo.com</p>
			</center>
			<table width="100%" cellpadding='0' cellspacing="5" style="border:0px !important;">
				<?php
					$date = $row->date;
					$date = date('d-m-Y',strtotime($date));
				?>
				<tr>
					<td width="50%">Date : <input type="text" value="{{$date}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:80%;" /></td>
					<td width="50%">Bilty No. <input type="text" value="{{$row->id}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:70%;" /></td>
				</tr>
				<tr>
					<td>KARACHI To : <input type="text" value="<?php // if($row->gronly == 0){ echo $row->bilty_station; }?>" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:65%;" /></td>
					<td>GR No: <?php  //if($row->gronly == 1){ echo $row->bilty_station_grno; }?></td>
				</tr>
				<tr>
					<td>Sender : <input type="text" value="{{$row->sendername}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:77%;" /></td>
					<td>Receiver : <input type="text" value="{{$row->receivername}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:74%;" /></td>
				</tr>
				<tr>
					<td>Vehicle No. <input type="text" value="{{$row->refno}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:71%;" /></td>
					<td>Ph : <input type="text" value="{{$row->receiverphone}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:78%;" /></td>
				</tr>
			</table>
			<table width="100%" border="1" cellspacing="0" style="text-align:center;" >
				<tr>
					<th>Qty</th>
					<th>Category</th>
					<?php if($row->packagename == 'Sample' || $row->packagename == 'Medicine Small' OR $row->packagename == 'Medicine large'){ ?>
					<th>Large</th>
					<th>Small</th>
					<th>Description</th>
					<?php }else{ ?>
						<th>Description</th>
						<th>Weight</th>
					<?php } ?>
					<th>Freight</th>
					<th>Remarks</th>
				</tr>
				@foreach($biltyRecord as $rec)
				
				<tr>
					<?php
						/* $l1 = $row->bilty_large;
						$l2 = $row->bilty_small;
						$qty = $l1 + $l2;
						if($row->bilty_category == 'Carton' ){
							$qty = $row->ctn_qty;
						} */
					?>
					<td valign="top">
						<p>
						<?php
						 /*  if($qty == 0){
								echo $row->ctn_qty;
							}else{
								echo $qty;
							} */
							echo $rec->quantity;
						?>
						</p>
					</td>
					<td style="text-align:left;padding:5px;" width="200px">
            <table width="100%">
              <tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Medicine Small' OR $row->packagename == 'Medicine large'){echo 'checked';}?> /><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">MEDICINE</span></td>
              </tr>
              <tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Literature'){echo 'checked';}?> /><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">LITERATURE</span></td>
              </tr>
              <tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Sample'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">SAMPLE</span></td>
              </tr>
							<tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Carton'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">CARTON</span></td>
              </tr>
							<tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Weight'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">WEIGHT</span></td>
              </tr>
							<tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Other'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">OTHER</span></td>
              </tr>
            </table>
            <table>
              <tr style="height:100px">
  							<td valign="bottom"><label style="font-size:12px;font-weight:bold;">InvoiceNo. {{$row->id}}</label></td>
              </tr>
            </table>
					</td>
					<?php if($row->packagename == 'Sample' || $row->packagename == 'Medicine Small' OR $row->packagename == 'Medicine large'){ ?>
						<td valign="top"><p> <?php 
								if($rec->packagename == 'Medicine large'){
									echo $rec->quantity;
								}
						
						?> {{-- $row->bilty_large --}}</p></td>
						<td valign="top"><p> <?php if($rec->packagename == 'Medicine Small'){
									echo $rec->quantity;
								}?>
								{{-- $row->bilty_small --}}</p></td>
						<td valign="top"><p>{{ $rec->brand }}</p></td>
					<?php }else{ ?>
						<td valign="top"><p>{{  $rec->brand }}</p></td>
						<td valign="top"><p>{{ $rec->weight }}</p></td>
					<?php } ?>
					<td width="100px">
            <table height="140px" width="100%">
              <tr>
                <td><center><h1>PAID</h1></center></td>
              </tr>
            </table>
          </td>
		 <td></td>
				</tr>
				@endforeach
			</table>
			<table width="100%">
				<tr>
					<td style="font-size:12px;font-weight:bold;color:#707070;">This is a computer generated copy and does not require any signature</td>
					<!-- <td width="65%" height="100px" style="border:1px solid #000;">
						<table width="100%" style="float:left;text-align:left;">
							<td height="100px" valign="top" width="50%" style="text-decoration:underline;font-size:12px;font-weight:bold;">For Office Use Only</td>
							<td height="100px" valign="bottom" width="50%" style="text-decoration:overline;font-size:12px;font-weight:bold;text-align:right;padding:-5 5 25 5;">Clerk Sign</td>
						</table>
					</td> -->
					<td style="font-size:12px;font-weight:bold;color:#000;text-align:right;">Generated By : {{--$name--}}</td>
				</tr>
			</table>
		@endforeach
		@endif
		<!-- <div style="text-align:right;font-size:12px;font-weight:bold;">-By Dusky Solution</div> -->
	</div>
	<br>
<hr>
	<br>
	<div style="clear:both;width:800px;">
	@if(!empty($biltyRecord))
		@foreach($biltyRecord as $row)
			<div style="width:100%;">
				<div style="float:left;width:180px;">
					<img src="images/logo.jpg" width="140px" height="40px" style="padding:10px 0px 0px 0px;"/>
				</div>
				<div style="float:left;width:350px;">
					<center>
						<p style="padding:5px;">
							<span style="font-size:13px;display:block;"><b>Client's Copy</b></span>
							<span style="font-size:13px;">TRANSIT RECIEPT</span><br>
							<strong style="color:#000000;font-size:12px;">SNTN: 5215306-4</strong>
						</p>
					</center>
				</div>
				<div style="float:left;width:200px;text-align:right;">
					<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
				</div>
			</div>
			<div style="clear:both;"></div>
			<hr style="color:#ffb968;">
			<center style="font-size:12px;">
				<p style="padding:0px !important;margin:0px !important;"><b>Head Office:</b> Plot No. A-353, Street No.1, Gate No. 5, Quaid-e-Azam Truck Stand, Hawks Bay Road, Karachi, Pakistan.<br>
				<img src="images/phone.png" width="10px" height="10px"> &nbsp;92-21-32350818-19-20-92 &nbsp;<img src="images/fax.png" width="10px" height="10px"> &nbsp;92-21-32350761 <img src="images/mobile.png" width="10px" height="10px"> &nbsp;0307-2222839, 0302-8296688<br>
				<img src="images/globe.png" width="10px" height="10px"> &nbsp;www.nsk.com.pk&nbsp; <img src="images/email.png" width="10px" height="10px"> &nbsp;nskg_trco1@yahoo.com</p>
			</center>
			<table width="100%" cellpadding='5' cellspacing="5" style="border:0px !important;">
				<?php
					
					$date = $row->date;
					$date = date('d-m-Y',strtotime($date));
				
				?>
				<tr>
					<td width="50%">Date : <input type="text" value="{{$date}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:80%;" /></td>
					<td width="50%">Bilty No. <input type="text" value="{{$row->id}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:70%;" /></td>
				</tr>
				<tr>
					<td>KARACHI To : <input type="text" value="<?php //if($row->gronly == 0){ echo $row->bilty_station; }?>" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:65%;" /></td>
					<td>GR No: <?php //if($row->gronly == 1){ echo $row->bilty_station_grno; }?></td>
				</tr>
				<tr>
					<td>Sender : <input type="text" value="{{$row->sendername}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:77%;" /></td>
					<td>Receiver : <input type="text" value="{{$row->receivername}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:74%;" /></td>
				</tr>
				<tr>
					<td>Vehicle No. <input type="text" value="{{$row->refno}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:71%;" /></td>
					<td>Ph : <input type="text" value="{{$row->receiverphone}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:78%;" /></td>
				</tr>
			</table>
			<table width="100%" border="1" cellspacing="0" style="text-align:center;" >
				<tr>
					<th>Qty</th>
					<th>Category</th>
					<?php if($row->packagename == 'Sample' || $row->packagename == 'Medicine Small' OR $row->packagename == 'Medicine large'){ ?>
					<th>Large</th>
					<th>Small</th>
					<th>Description</th>
					<?php }else{ ?>
						<th>Description</th>
						<th>Weight</th>
					<?php } ?>
					<th>Freight</th>
					<th>Remarks</th>
				</tr>
				@foreach($biltyRecord as $rec)
				
				<tr>
					<?php
						/* $l1 = $row->bilty_large;
						$l2 = $row->bilty_small;
						$qty = $l1 + $l2;
						if($row->bilty_category == 'Carton' ){
							$qty = $row->ctn_qty;
						} */
					?>
					<td valign="top">
						<p>
						<?php
						  /* if($qty == 0){
								echo $row->ctn_qty;
							}else{
								echo $qty;
							} */
							
							echo $rec->quantity;
						?>
						</p>
					</td>
					<td style="text-align:left;padding:5px;" width="200px">
            <table width="100%">
              <tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Medicine Small' OR $row->packagename == 'Medicine large'){echo 'checked';}?> /><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">MEDICINE</span></td>
              </tr>
              <tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Literature'){echo 'checked';}?> /><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">LITERATURE</span></td>
              </tr>
              <tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Sample'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">SAMPLE</span></td>
              </tr>
							<tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Carton'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">CARTON</span></td>
              </tr>
							<tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Weight'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">WEIGHT</span></td>
              </tr>
							<tr>
  							<td style="font-size:12px;font-weight:bold;"><input type="checkbox" <?php if($row->packagename == 'Other'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;top:3;">OTHER</span></td>
              </tr>
            </table>
            <table>
              <tr style="height:100px">
  							<td valign="bottom"><label style="font-size:12px;font-weight:bold;">InvoiceNo. {{$row->id}}</label></td>
              </tr>
            </table>
					</td>
					<?php if($row->packagename == 'Sample' || $row->packagename == 'Medicine Small' OR $row->packagename == 'Medicine large'){ ?>
						<td valign="top"><p> <?php 
								if($rec->packagename == 'Medicine large'){
									echo $rec->quantity;
								}
						
						?> {{-- $row->bilty_large --}}</p></td>
						<td valign="top"><p> <?php if($rec->packagename == 'Medicine Small'){
									echo $rec->quantity;
								}?>
								{{-- $row->bilty_small --}}</p></td>
						<td valign="top"><p>{{ $rec->brand }}</p></td>
					<?php }else{ ?>
						<td valign="top"><p>{{  $rec->brand }}</p></td>
						<td valign="top"><p>{{ $rec->weight }}</p></td>
					<?php } ?>
					<td width="100px">
            <table height="140px" width="100%">
              <tr>
                <td><center><h1>PAID</h1></center></td>
              </tr>
            </table>
          </td>
					<td></td>
				</tr>
				@endforeach
			</table>
			<table width="100%">
				<tr>
					<td style="font-size:12px;color:#707070;text-align:left;">This is a computer generated copy and does not require any signature</td>
					<!-- <td width="65%" height="100px" style="border:1px solid #000;">
						<table width="100%" style="float:left;text-align:left;">
							<td height="100px" valign="top" width="50%" style="text-decoration:underline;font-size:12px;">For Office Use Only</td>
							<td height="100px" valign="bottom" width="50%" style="text-decoration:overline;font-size:12px;text-align:right;padding:-5 5 25 5;">Clerk Sign</td>
						</table>
					</td> -->
					<td style="font-size:12px;color:#000;text-align:right;">Generated By : {{--$name--}}</td>
				</tr>
			</table>
		@endforeach
		@endif
		<div style="text-align:right;font-size:12px;">-By Dusky Solution</div>
	</div>

	<div style="margin-top:10%;width:800px;">
	@if(empty($biltyRecord))
		@foreach($biltyRecord as $row)
			<div style="width:100%;">
				<div style="float:left;width:180px;">
					<img src="images/logo.jpg" width="140px" height="40px" style="padding:10px 0px 0px 0px;"/>
				</div>
				<div style="float:left;width:350px;">
					<center>
						<p style="padding:5px;">
							<span style="font-size:13px;display:block;"><b>Customer's Copy</b></span>
							<span style="font-size:13px;">TRANSIT RECIEPT</span><br>
							<strong style="color:#000000;font-size:12px;">SNTN: 5215306-4</strong>
						</p>
					</center>
				</div>
				<div style="float:left;width:200px;text-align:right;">
					<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
				</div>
			</div>
			<div style="clear:both;"></div>
			<hr style="color:#ffb968;">
			<center style="font-size:14px;">
				<p style="padding:0px !important;margin:0px !important;"><b>Head Office:</b> Plot No. A-353, Street No.1, Gate No. 5, Quaid-e-Azam Truck Stand, Hawks Bay Road, Karachi, Pakistan.<br>
				<img src="images/phone.png" width="10px" height="10px"> &nbsp;92-21-32350818-19-20-92 &nbsp;<img src="images/fax.png" width="10px" height="10px"> &nbsp;92-21-32350761 <img src="images/mobile.png" width="10px" height="10px"> &nbsp;0307-2222839, 0302-8296688<br>
				<img src="images/globe.png" width="10px" height="10px"> &nbsp;www.nsk.com.pk&nbsp; <img src="images/email.png" width="10px" height="10px"> &nbsp;nskg_trco1@yahoo.com</p>
			</center>
			<table width="100%" cellpadding='5' cellspacing="5" style="border:0px !important;font-size:13px;">
				<?php
					$date = $row->bilty_date;
					$date = date('d-m-Y',strtotime($date));
				?>
				<tr>
					<td width="50%">Date : <input type="text" value="{{$date}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:80%;" /></td>
					<td width="50%">Bilty No. <input type="text" value="{{$row->bilty_number}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:70%;" /></td>
				</tr>
				<tr>
					<td>KARACHI To : <input type="text" value="<?php if($row->gronly == 0){ echo $row->bilty_station; }?>" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:65%;" /></td>
					<td>GR No: <?php if($row->gronly == 1){ echo $row->bilty_station_grno; }?></td>
				</tr>
				<tr>
					<td>Sender : <input type="text" value="{{$row->bilty_sender}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:77%;" /></td>
					<td>Receiver : <input type="text" value="{{$row->bilty_reciever}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:74%;" /></td>
				</tr>
				<tr>
					<td>Vehicle No. <input type="text" value="{{$row->bilty_vehicle_id}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:71%;" /></td>
					<td>Ph : <input type="text" value="{{$row->bilty_phone}}" style="outline: none;border: 0px;border-bottom: 1px solid #000;width:78%;" /></td>
				</tr>
			</table>
			<table width="100%" border="1" cellspacing="0" cellpadding="5" style="text-align:center;font-size:13px;" >
				<tr>
					<th>Qty</th>
					<th>Category</th>
					<?php if($row->bilty_category == 'Sample' || $row->bilty_category == 'Medicine'){ ?>
					<th>Large</th>
					<th>Small</th>
					<th>Description</th>
					<?php }else{ ?>
						<th>Description</th>
						<th>Weight</th>
					<?php } ?>
					<th>Freight</th>
					<th>Remarks</th>
				</tr>
				<tr>
					<?php
						$l1 = $row->bilty_large;
						$l2 = $row->bilty_small;
						$qty = $l1 + $l2;
						if($row->bilty_category == 'Carton' ){
							$qty = $row->ctn_qty;
						}
					?>
					<td valign="top">
						<p>
						<?php
						  if($qty == 0){
								echo $row->ctn_qty;
							}else{
								echo $qty;
							}
						?>
						</p>
					</td>
					<td style="text-align:left;padding:5px;height:200px;" width="200px">
            <table width="100%">
              <tr>
  							<td style="font-size:12px;margin-top:10px;padding:10px;"><input type="checkbox" <?php if($row->bilty_category == 'Medicine'){echo 'checked';}?> /><span style="padding:0px 0px 0px 5px;position:absolute;display:block;top:3;">MEDICINE</span></td>
              </tr>
              <tr>
  							<td style="font-size:12px;margin-top:10px;padding:10px;"><input type="checkbox" <?php if($row->bilty_category == 'Literature'){echo 'checked';}?> /><span style="padding:0px 0px 0px 5px;position:absolute;display:block;top:3;">LITERATURE</span></td>
              </tr>
              <tr>
  							<td style="font-size:12px;margin-top:10px;padding:10px;"><input type="checkbox" <?php if($row->bilty_category == 'Sample'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;display:block;top:3;">SAMPLE</span></td>
              </tr>
							<tr>
  							<td style="font-size:12px;margin-top:10px;padding:10px;"><input type="checkbox" <?php if($row->bilty_category == 'Carton'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;display:block;top:3;">CARTON</span></td>
              </tr>
							<tr>
  							<td style="font-size:12px;margin-top:10px;padding:10px;"><input type="checkbox" <?php if($row->bilty_category == 'Weight'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;display:block;top:3;">WEIGHT</span></td>
              </tr>
							<tr>
  							<td style="font-size:12px;margin-top:10px;padding:10px;"><input type="checkbox" <?php if($row->bilty_category == 'Other'){echo 'checked';}?>/><span style="padding:0px 0px 0px 5px;position:absolute;display:block;top:3;">OTHER</span></td>
              </tr>
            </table>
            <table>
              <tr style="height:300px">
  							<td valign="bottom"><label style="font-size:12px;">InvoiceNo. {{$row->bilty_invoice}}</label></td>
              </tr>
            </table>
					</td>
					<?php if($row->bilty_category == 'Sample' || $row->bilty_category == 'Medicine'){ ?>
						<td valign="top"><p>{{-- $row->bilty_large --}}</p></td>
						<td valign="top"><p>{{-- $row->bilty_small --}}</p></td>
						<td valign="top"><p>{{-- $row->bilty_description --}}</p></td>
					<?php }else{ ?>
						<td valign="top"><p>xs{{$row->bilty_description}}</p></td>
						<td valign="top"><p>{{$row->weight}}</p></td>
					<?php } ?>
					<td width="100px">
            <table height="240px" width="100%">
              <tr>
                <td><center><h1>PAID</h1></center></td>
              </tr>
            </table>
          </td>
					<td></td>
				</tr>
			</table>
			<table width="100%">
				<tr>
					<td style="font-size:12px;color:#707070;">This is a computer generated copy and does not require any signature</td>
					<!-- <td width="65%" height="100px" style="border:1px solid #000;">
						<table width="100%" style="float:left;text-align:left;">
							<td height="100px" valign="top" width="50%" style="text-decoration:underline;font-size:12px;">For Office Use Only</td>
							<td height="100px" valign="bottom" width="50%" style="text-decoration:overline;font-size:12px;text-align:right;padding:-5 5 25 5;">Clerk Sign</td>
						</table>
					</td> -->
					<td style="font-size:12px;color:#000;text-align:right;">Generated By : {{--$name--}}</td>
				</tr>
			</table>
		@endforeach
		@endif
		<div style="text-align:right;font-size:12px;">-By Dusky Solution</div>
	</div>
</body>
</html>
