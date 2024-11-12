<?php
//var_dump($bank_data);
//die();
?>
  
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>NSK :: Banks Ledger Report </title>
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
            <?php
            if(isset($BankName) && sizeof($BankName) > 0){
            ?>
            <center><h3><?php echo $BankName; ?></h3></center>
            <?php
            }else{
            ?>
				<center><h3>BANKS LEDGER REPORT</h3></center>
            <?php
            }
            ?>
			</div>
      <div style="float:left;width:220px;text-align:left;">
				<h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
			</div>
      <div style="clear:both;"></div>
      <div style="float:left;width:50%;">
				<p>Plot #353-A, St # 1, Gate No.5, Quaid-E-Azam International Truck Stand Hawks Bay Road Karachi .</p> <br>

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
                <th>Customer Name/ Description/ Other Info.</th>
                <?php
                if(!isset($bank_data)){
                ?>
                <th>Bank Name</th>
                <?php
                }
                ?>
								<th>Payment</th>
			          <th>Reciept</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
                 
          <?php
          if(isset($bank_ledger_records) && sizeof($bank_ledger_records) > 0){
                $serail_number=0;
                $res=0 ;
         
           ?>
            @foreach($bank_ledger_records as $rec)
              <tr>
                  <td><?php echo $serail_number+=1;?></td>
                  <?php
                  $bank_ledger_date = date('d-m-Y', strtotime($rec->bank_ledger_date));
                  ?>
                  <td> {{$bank_ledger_date }} </td>
                  <td>{{$rec->bank_ledger_name }} | {{ $rec->CustomerName }} | {{$rec->ChequeNumber}}</td>
                  <?php
                  if(!isset($bank_data)){
                  ?>
                  <td> {{ $rec->bank_ledger_name }} </td>
                  <?php
                  }
                  ?>
                  <td> {{ $rec->bank_ledger_debit }} </td>
                  <td> {{ $rec->bank_ledger_credit }} </td>
                  <?php
                  $res=$res+$rec->bank_ledger_debit-$rec->bank_ledger_credit;
                  ?>
                  <td><?php echo $res;?></td>
              </tr>

            @endforeach()
            <?php
          } // Close isset condition
          ?>
        </tbody>
    </table>
    <br/>
    <p><b>Total Debit : </b><?php echo $total_amount_debit; ?></p>
    <p><b>Total Credit : </b><?php echo $total_amount_credit; ?></p>


		<div style="clear:both;"></div>
<div style="text-align:right;font-size:10px;">-By Dusky Solution</div>
  </div>

</body>
</html>
