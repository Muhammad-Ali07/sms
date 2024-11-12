<!DOCTYPE html>
<html>
	
		<meta charset="utf-8">
		<title>NSK :: Petty Cash Report </title>
		<style>
			body{
				margin:0;
				padding:0;
				font-size: 14px;
				font-family: serif;
			}
      p{padding:0px;
      margin:0px;}
      .lh{
        padding:0px;
        margin:0px;
      }
      td{
        text-align: center;
      }
      th{
        text-align: center;
      }
		</style>
	
<!--
--------------------------------------------------------------------------------
--------------------------BILL TOP INFORMATION AREA ----------------------------
--------------------------------------------------------------------------------
------------------------------------------------------------------------------->

<?php if($individual == 0){?>
  <div style="width:740px !important;">
		<div style="width:100%;">
      <div style="float:left;width:180px;">
        <img src="{{url('images/logo.jpg')}}" th="180px" height="60px" style="padding:10px 0px 0px 0px;"/>
      </div>
			<div style="float:left;width:350px;">
				<center><h3>PETTY CASH REPORT</h3></center>
			</div>
      <div style="float:left;width:220px;text-align:left;">
				<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
			</div>
      <div style="clear:both;"></div>
      <div style="float:left;width:50%;">
				<p>Plot #353-A, St # 1, Gate No.5, Quaid-E-Azam International Truck Stand Hawks Bay Road Karachi .</p>
			</div>
      <div style="float:right;width:20%;">
        <p style="text-align:right;">Ph# : 32350818<br>: 32350819<br>
      </div>
      <div style="clear:both;"></div>
		</div>
    <div style="clear:both;padding:0;margin:0;"></div>
		<hr style="color:#ffb968;">
    <div style="clear:both;"></div>
    <div style="width:100%;">
      <table width="100%" cellpadding="5" cellspacing="0" border="1">
        <tr>
          <th>Sno.</th>
          <th>Date</th>
					<th>Office Name</th>
          <th>Type</th>
          <th>Amount</th>
        </tr>
				<?php
					$balance = 0;
					$sno = 1;
			  ?>
			 
        @foreach($petty_Record as $row)
        
        <tr>
          <td><?php echo $sno; ?></td>
          <td width="12%">
						<?php
							$date_format = date('d-m-Y',strtotime($row->date));
							echo $date_format;
						?>
					</td>
					<td>
						<?php
							foreach($office as $res){
								if($res->office_id == $row->fk_office_id){
									echo $res->office_name;
								}
							}
						?>
					</td>
					<td>{{$row->type}}</td>
					<?php if($row->type == "Daily Cash Return"){?>
						<td>{{$row->return_amount}}</td>
					<?php }else{ ?>
						<?php
					
							$totalAmount = 0;
						
							foreach($pettymeta as $meta){
								if($meta->fk_pettycash_id == $row->id){
								    
								 	$totalAmount =  (int)$totalAmount + (int)$meta->amount;
								}
								
							
							}
						?>
						<td>{{$totalAmount}}</td>
					<?php } ?>
        </tr>
				<?php $sno += 1; ?>
        @endforeach
				<!-- <tr>
					<td colspan="5"><b> Total of Debit and Credit </b></td>
					<td><?php // echo $debit; ?></td>
					<td><?php // echo $credit; ?></td>
					<td><?php // echo $bal = $debit - $credit; ?></td>
				</tr> -->
      </table>

    </div>
		<div style="text-align:right;font-size:10px;">-By Dusky Solution</div>
  </div>
<!--
--------------------------------------------------------------------------------
--------------------------------END OF BILL ------------------------------------
--------------------------------------------------------------------------------
------------------------------------------------------------------------------->
<?php }else{ ?>

	<div style="width:740px !important;">
		<div style="width:100%;">
      <div style="float:left;width:180px;">
        <img src="{{url('images/logo.jpg')}}" th="180px" height="60px" style="padding:10px 0px 0px 0px;"/>
      </div>
			<div style="float:left;width:350px;line-height:1px;margin-top:15px;">
				<center>
					<h4>Daily Cash Report</h4>
					<h3><?php if($office_name[0]->office_name){ echo $office_name[0]->office_name; }?></h3>
				</center>
			</div>
      <div style="float:left;width:220px;text-align:left;">
				<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
			</div>
      <div style="clear:both;"></div>
      <div style="float:left;width:50%;">
				<p>Plot #353-A, St # 1, Gate No.5, Quaid-E-Azam International Truck Stand Hawks Bay Road Karachi .</p>
			</div>
      <div style="float:right;width:20%;">
        <p style="text-align:right;">Ph# : 32350818<br>: 32350819<br>
      </div>
      <div style="clear:both;"></div>
		</div>
    <div style="clear:both;padding:0;margin:0;"></div>
		<hr style="color:#ffb968;">
    <div style="clear:both;"></div>
		<?php
		$allAmountPayment1 = 0;
		$allAmountReciept1 = 0;
		$allAmountReciept = 0;
		$allAmountPayment = 0;
		?>
		@foreach($petty_Records as $row)
		<?php	$totalReciept = 0;
			     $totalPayment = 0;
			     $totalAmount = 0;
			foreach($pettymetas as $meta){
    			if($meta->fk_pettycash_id == $row->id){
        			if($row->type == "Reciept"){
        			    $totalReciept += (int)$meta->amount;
        			}else{
        			    $totalPayment += (int)$meta->amount;
        			}
    	        $totalAmount += (int)$meta->amount;
    			}
			}
			?>


			<?php $allAmountReciept1 += $totalReciept;
			$allAmountPayment1 += $totalPayment; ?>
		 @endforeach
			<div style="width:100%;">
			<center><h3>Available Amount in Office: {{$allAmountReciept1-$allAmountPayment1}}</h3></center>
      <table width="100%" cellpadding="5" cellspacing="0" border="1">
        <tr>
          <th>Sno.</th>
          <th>Date</th>
          <th>Type</th>
          <th>Amount</th>
        </tr>
				<?php
					$balance = 0;
					$sno = 1;
					$allAmount = 0;
			  ?>
        @foreach($petty_Record as $row)
        <tr>
          <td><?php echo $sno; ?></td>
          <td width="12%">
						<?php
							$date_format = date('d-m-Y',strtotime($row->date));
							echo $date_format;
						?>
					</td>
					<td>{{$row->type}}</td>
					<?php if($row->type == "Daily Cash Return"){?>
						<td><?php $allAmount += $row->return_amount; ?>{{$row->return_amount}}</td>
					<?php }else{ ?>
						<?php
							$totalReciept = 0;
							$totalPayment = 0;
							$totalAmount  = 0;
							foreach($pettymeta as $meta){
								if($meta->fk_pettycash_id == $row->id){
									if($row->type == "Reciept"){
										$totalReciept += $meta->amount;
									}else{
										$totalPayment += $meta->amount;
									}
									$totalAmount += $meta->amount;
								}
							}
						?>
						<td>
							<?php $allAmountReciept += $totalReciept; ?>
							<?php $allAmountPayment += $totalPayment; ?>
							{{$totalAmount}}
						</td>
					<?php } ?>
        </tr>
				<?php if($row->type != "Daily Cash Return"){?>
				<tr style="background:#ccc;">
					<td> - </td>
					<td> - </td>
					<td>
						<table width="100%" cellspacing="0" border="1">
							<tr>
								<th>Particular</th>
								<th>Reference</th>
								<th>Amount</th>
							</tr>
							<?php
								foreach($pettymeta as $meta){
									if($meta->fk_pettycash_id == $row->id){
							?>
							<tr>
								<td>{{$meta->desc}}</td>
								<td>{{$meta->ref}}</td>
								<td>{{$meta->amount}}</td>
							</tr>
							<?php
									}
								}
							 ?>
						</table>
					</td>
					<td> - </td>
				</tr>
				<?php } ?>
				<?php $sno += 1; ?>
        @endforeach
				<tr>
					<td colspan="3" style="text-align:right;"><b> Total Amount Reciept </b></td>
					<td><?php echo $allAmountReciept; ?></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align:right;"><b> Total Amount Payment </b></td>
					<td><?php echo $allAmountPayment; ?></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align:right;"><b> Total Amount </b></td>
					<td><?php echo $allAmountReciept - $allAmountPayment; ?></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align:right;"><b> Daily Cash Return in Total </b></td>
					<td><?php echo $allAmount; ?></td>
				</tr>
      </table>
    </div>
		<div style="text-align:right;font-size:10px;">-By Dusky Solution</div>
  </div>
<?php }?>
</body>
</html>
