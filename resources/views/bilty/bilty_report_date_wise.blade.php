<?php ini_set('max_execution_time', 300); //300 seconds = 5 minutes?>
<!DOCTYPE html>
<html>
	
		<meta charset="utf-8">
		<title>NSK :: Topaid Bilty Report </title>
		<style>
			body{
				margin:0;
				padding:0;
				font-size: 14px;
				font-family: serif;
			}
			td{
        border-bottom: 1px solid #000;
      }
		</style>
	
  <div style="width:740px !important;">
			<div style="width:100%;">
				<div style="float:left;width:220px;text-align:left;">
					<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
				</div>
				<div style="float:left;width:350px;">
					<center><p style="padding:5px;"><span style="font-size:18px;"> TOPAY BUILTY REPORT </span><br>
					<strong style="color:#ffb968;"> &nbsp; </strong></p></center>
				</div>
				<div style="float:left;width:180px;">
					<img src="images/logo.jpg" th="180px" height="60px" style="padding:10px 0px 0px 0px;"/>
				</div>
			</div>

      <div style="clear:both;"></div>
			<div style="width:40%;float:left;">
				Date From: <?php echo date('d-m-Y',strtotime($date_from)); ?>
			</div>
			<div style="width:40%;float:right;text-align:right;">
				Date To: <?php echo date('d-m-Y',strtotime($date_to)); ?>
			</div>
			<br clear="all" />
			<hr style="color:#ffb968;">
      <div style="clear:both;"></div>
			<br clear="all" />

      <table cellspacing="0" cellpadding="5" width="100%" border="1">
        <thead>
            <tr style="background:#ccc;">
                <th>SNo.</th>
                <th>Date</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Bilty Number</th>
                <!-- <th>Vehicle Number</th> -->
                <th>Karachi To</th>
                <th>Total </th>
            </tr>
        </thead>
        <?php
        if(isset($topaid_bilty_records) && sizeof($topaid_bilty_records) > 0 ){
          $serial_number = 0 ;
        ?>
        <tbody>
					<?php $total = 0; ?>
        @foreach($topaid_bilty_records as $rec)
            <tr>
                <?php
                    echo "<td>".$serial_number+=1 ;"</td>";
                    echo "<td>".$date = date('d/m/Y',strtotime($rec->DatePaidBilty))."</td>";
                    echo "<td>".$rec->Sender."</td>";
                    echo "<td>".$rec->Receiver."</td>";
                    echo "<td>".$rec->BiltyNumber."</td>";
                    // echo "<td>".$rec->VehicleNumber."</td>";
                    echo "<td>".$rec->KarachiTo."</td>";
                    echo "<td>".$rec->Total."</td>";
                  ?>
									<?php $total += $rec->Total;?>
            </tr>
        @endforeach
						<tr>
							<td colspan="6" align="right"><b>Total Amount : </b></td>
							<td><?php echo $total;?></td>
						</tr>
        </tbody>
        <?php
        }
        ?>
    </table>
		<div style="text-align:right;font-size:10px;">-By Dusky Solution</div>
  </div>
</body>
</html>
