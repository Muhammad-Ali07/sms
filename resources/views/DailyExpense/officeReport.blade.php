<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>NSK :: Office's Report </title>
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
  <div style="width:740px !important;">
		<div style="width:100%;">
      <div style="float:left;width:180px;">
        <img src="images/logo.jpg" th="180px" height="60px" style="padding:10px 0px 0px 0px;"/>
      </div>
			<div style="float:left;width:350px;">
				<center><h3>OFFICE REPORT</h3></center>
			</div>
      <div style="float:left;width:220px;text-align:left;">
				<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
			</div>
      <div style="clear:both;"></div>
      <div style="float:left;width:50%;">
				<p>Plot #353-A, St # 1, Gate No.5, Quaid-E-Azam International Truck Stand Hawks Bay Road Karachi .</p><br>
			</div>
      <div style="float:right;width:20%;">
        <p style="text-align:right;">Ph# : 32350818<br>: 32350819</p>
      </div>
      <div style="clear:both;"></div>
		</div>
    <div style="clear:both;padding:0;margin:0;"></div>
		<hr style="color:#ffb968;">
    <div style="clear:both;"></div>
  	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" border="1">
      <thead>
        <tr>
          <th>SN#</th>
          <th>Date</th>
          <th>Office Name</th>
					<th>Office Address</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
      @foreach($bank_records as $rec)
        <tr>
          <?php $total = null; $serial_number = 0;?>
          <td><?php echo $serial_number=+1; ?></td>
          <?php $Date = date('d-m-Y', strtotime($rec->office_date)); ?>
          <td><?php echo $Date; ?></td>
          <td> {{$rec->office_name}} </td>
          <td> {{$rec->office_address}} </td>
          <td> {{$rec->office_balance}} </td>
          <?php $total += $rec->office_balance; ?>
        </tr>
      @endforeach
        <tr>
          <td align="right" style="text-align:right;background:#dcdcdc;" colspan="4">Total Amount in offices: </td><td style="background:#dcdcdc;"><?php echo $total;?></td>
        </tr>
      </tbody>
    </table>
		<div style="clear:both;"></div>
		<div style="text-align:right;font-size:10px;">-By Dusky Solution</div>
  </div>
</body>
</html>