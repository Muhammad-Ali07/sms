<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>NSK :: Petty Cash Ledger Report </title>
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
	</head>
<!--
--------------------------------------------------------------------------------
--------------------------BILL TOP INFORMATION AREA ----------------------------
--------------------------------------------------------------------------------
------------------------------------------------------------------------------->
  <div style="width:740px !important;">
		<div style="width:100%;">
      <div style="float:left;width:180px;">
        <img src="{{url('images/logo.jpg')}}" th="180px" height="60px" style="padding:10px 0px 0px 0px;"/>
      </div>
			<div style="float:left;width:350px;">
				<center><h3>PETTY CASH LEDGER REPORT</h3></center>
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
          <th>Description</th>
          <th>Reference</th>
					<th>Office Name</th>
          <th>Payment</th>
          <th>Reciept</th>
          <th>Balance</th>
        </tr>
				<?php
					$balance = 0;
					$sno = 1;
			  ?>
        @foreach($ledger as $row)
        <tr>
          <td><?php echo $sno; ?></td>
          <td width="12%">
						<?php
							$date_format = date('d-m-Y',strtotime($row->date));
							echo $date_format;
						?>
					</td>
          <td width="40%">{{$row->description}}</td>
          <td>{{$row->ref}}</td>
					<td>
						<?php
							foreach($office as $res){
								if($res->office_id == $row->fk_office_id){
									echo $res->office_name;
								}
							}
						?>
					</td>
          <td><?php $debit += $row->debit; ?> {{$row->debit}}</td>
          <td><?php $credit += $row->credit; ?> {{$row->credit}}</td>
          <td>
						<?php
							echo $balance = $balance + $debit - $credit;
							$balance = 0;
						?>
					</td>
        </tr>
				<?php $sno += 1; ?>
        @endforeach
				<tr>
					<td colspan="5"><b> Total of Debit and Credit </b></td>
					<td><?php echo $debit; ?></td>
					<td><?php echo $credit; ?></td>
					<td><?php echo $bal = $debit - $credit; ?></td>
				</tr>
      </table>

    </div>
  </div>
<!--
--------------------------------------------------------------------------------
--------------------------------END OF BILL ------------------------------------
--------------------------------------------------------------------------------
------------------------------------------------------------------------------->
</body>
</html>
