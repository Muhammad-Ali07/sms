<!DOCTYPE html>
<html>
	
		<meta charset="utf-8">
		<title>NSK :: Ledger Report </title>
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
  <div style="width:740px !important;">
		<div style="width:100%;">
      <div style="float:left;width:180px;">
        <img src="images/logo.jpg" th="180px" height="60px" style="padding:10px 0px 0px 0px;"/>
      </div>
			<div style="float:left;width:350px;">
				<center><h3>EMPLOYEE LEDGER REPORT</h3></center>
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
					<th>Payment</th>
          <th>Reciept</th>
          <th>Balance</th>
        </tr>
				<?php
					$balance = 0;
					$sno = 1;
          $debit=0;
          $credit=0;
				?>
        @foreach($employee_ledger_record as $row)
        <tr>
          <td>{{$row->el_id}}</td>
          <td width="15%">
						<?php
							$date_format = date('d-m-Y',strtotime($row->el_date));
							echo $date_format;
						?>
					</td>
          <td width="30%">{{$row->el_desc}}</td>
          <td>{{$row->el_reference}}</td>
          <td>{{$row->el_debit}}<?php $debit += $row->el_debit; ?></td>
          <td>{{$row->el_credit}}<?php $credit += $row->el_credit; ?></td>
          <td>
						<?php
							$balance = $balance + $debit - $credit;
							echo $balance;
							$balance = 0;
						?>
					</td>
        </tr>
				<?php $sno +=1; ?>
        @endforeach
				<tr>
					<td colspan="4"><b> Total of Debit and Credit </b></td>
					<td><b><?php echo $debit; ?></b></td>
					<td><b><?php echo $credit; ?></b></td>
					<td><b><?php echo $bal = $debit - $credit; ?></b></td>
				</tr>
      </table>
    </div>
		<div style="text-align:right;font-size:10px;">-By Dusky Solution</div>
  </div>
<!--
--------------------------------------------------------------------------------
--------------------------------END OF BILL ------------------------------------
--------------------------------------------------------------------------------
------------------------------------------------------------------------------->

</body>
</html>