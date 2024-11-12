<!DOCTYPE html>
<html>
    <title>Bill Report</title>
    <meta charset="utf-8">
    <style>
        body{
            margin:0;
            padding:0;
            font-size: 14px;
            font-family: serif;
        }
        p{
            padding:0px;
            margin:0px;
        }
        .lh{
            padding:0px;
            margin:0px;
        }
        td{
            width:64.5px;
            text-align: center;
        }
        th{
            width:64.5px;
            text-align: center;
        }
        .page-break {
            page-break-after: always;
        }
.breaker {page-break-after: always !important;}
@media print {
  .breaker {page-break-after: always;}
}
    html, body { display: block; }

    </style>
<!--BILL TOP INFORMATION AREA-->
<div style="width:1150px !important;">
    <!--BREAKING DATA IN PAGES -->
    <?php
		
    $mytotal = 0;
    $totalamount = 0;
    $totalpageamount = 0;
    $totalpagefreightamount = 0;
    $totalamountfreight = 0;
    $totalpagepackamount = 0;
    $totalpackages = 0;
    $totaltaxamount = 0;
    $totalPacks = 0;
    $total = 0;
    $pg = 0;
    $totalQtyDisplay = 0;
    //   $per_page = 18;
    $per_pages = 18;
    $Qtyttls = 0;
    $normal_packs = 0;
    $small_packs = 0;
    $large_packs = 0;
    $pagenormal_packs= 0;
    $pagesmall_packs= 0;
    $pagelarge_packs= 0;
    $linepage = 0;
    $pagecount = 0;
    $increment = 0;
    $serial_number = 0;
  $pg +=1;

    ?>
    <div style="width:100%;">
        <div style="float:left;width:40%;" >

            <header>
                <img src="images/logo2.png" th="180px" height="70px" style="padding:10px 0px 0px 0px;"/>
            </header>

        </div>
        <div style="float:left;width:20%;text-align:center;">
            <center>
                <h3>SALE TAX INVOICE<br>Page # 1 </h3>
            </center>
        </div>
        <div style="float:left;width:40%;text-align:center;">
            <h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
        </div>
        <div style="clear:both;"></div>
        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:50%;">
            <p><b>NTN#:5215306-4 </b>&nbsp; EMAIL:nskg_trco1@yahoo.com</p>
        </div>
        <div style="clear:both;"></div>
        <div class="lh" style="float:left;width:20%;">
            <p style="text-align:left;">SALE TAX INVOICE :
               
                </p>

        </div>
        <div class="lh" style="float:left;width:65%;border:1px solid #ccc;">
            <p style="text-align:left;padding:0px 5px;font-weight:bold;">CONSIGNER'S NAME: {{$customer->customerName}}</p>
 
        </div>
        <div style="clear:both;"></div>
        
         
         <!-- $bill_date =$record[0]->bill_date; -->
     
        <div style="float:left;width:30%;">BILLING MONTH : {{date('M-Y')}}</div>
        <div style="float:left;width:30%">
            <center>
                <p> </p>
            </center>
        </div>
    </div>
    <div style="clear:both;padding:0;margin:0;"></div>
    <hr style="color:#ffb968;">
    <div style="clear:both;"></div>
    <table cellspacing="0" cell-padding="0" width="90%" border="1" class="breaker">
        <thead>
        <tr>
            <th>#</th>
            <th>Date Issued</th>
            <th>Invoice# / DC</th>
            <th>T/R ###</th>
			<th>Total Small Packs</th>
			<th>Total Large Packs</th>
            <th>Total Packs</th>
            <th >Station</th>
            <th >Rate Per Small Pack</th>
            <th >Rate Per Large Pack</th>
            <th>Total Frieght</th>
            <th>Tax Amount<br></th>
            <th >Total Amount</th>
        </tr>
        </thead>
        @foreach($bilty as $row)
        <tbody>
<tr>
<td></td>
<td>{{$row->date}}</td>
<td></td>
<td>{{$row->id}}</td>
<?php
$totalsmallsum = 0;
$totallargesum = 0;
$Totalpackagessum = 0;
$station = DB::table('now_station') 
->where('id',$row->to)
->first();

	$small = DB::table('now_builtyitems') 
	->where('builtyid',$row->id)
    ->where('package_id','1')
    ->first();
    
    $large = DB::table('now_builtyitems') 
	->where('builtyid',$row->id)
    ->where('package_id','2')
    ->first();  

    if(!empty($small)){

    $smallquantity = $small->quantity;
    $smallrating = $small->rate;
    $totalsmallquantity = $smallquantity * $smallrating ;
    }
    else{
        $smallquantity = 0;
        $smallrating = 0;
        $totalsmallquantity = 0; 
    }

    if(!empty($large)){

        $largequantity = $large->quantity;
        $largerating = $large->rate;
        $totallargequantity = $largequantity * $largerating ;
        }
        else{

            $largequantity =0;
            $largerating = 0;
            $totallargequantity = 0;
        }
    $finalprice  = $totalsmallquantity + $totallargequantity ; 
    $totalpackagescounter =  $largequantity + $smallquantity; 

  
 
$Totalpackagessum  =+ $totalpackagescounter;
$totalsmallsum =+  $smallquantity; 
$totallargesum =+   $largequantity; 
$totalrantplues =+  $finalprice;

?>


<td>{{$smallquantity}}</td>
<td>{{$largequantity}}</td>
<td>{{$totalpackagescounter}}</td>
<td>{{$station->name}}</td>
<td>{{$smallrating}}</td>
<td>{{$largerating }}</td>
<td>{{$finalprice}}</td>
<td></td>
<td>{{$finalprice}}</td>
</tr>

    @endforeach
        <tr>
            <td colspan="3">Total Page {{$pg}} </td>
            <td>Total Qty :</td>			
            <td>{{$totalsmallsum}}</td>
            <td>{{$totallargesum}}</td>
            <td>{{$Totalpackagessum}}</td>
            <td></td>
            <td></td>
           <td>  Total Amount :</td>
           <td>{{$finalprice}}</td>
            <td></td>
            <td>{{$totalrantplues}}</td>
      
        </tr>
</tbody>
    </table>

   
    
 <div style="width:100%;">
        <div style="float:left;width:40%;" >

            <header>
                <img src="images/logo2.png" th="180px" height="70px" style="padding:10px 0px 0px 0px;"/>
            </header>

        </div>
        <div style="float:left;width:20%;text-align:center;">
            <center>
                <h3>SALE TAX INVOICE<br>Page # 2 </h3>
            </center>
        </div>
        <div style="float:left;width:40%;text-align:center;">
            <h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
        </div>
        <div style="clear:both;"></div>
        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:50%;">
            <p><b>NTN#:5215306-4 </b>&nbsp; EMAIL:nskg_trco1@yahoo.com</p>
        </div>
        <div style="clear:both;"></div>
        <div class="lh" style="float:left;width:20%;">
            <p style="text-align:left;">SALE TAX INVOICE :
               
                </p>

        </div>
        <div class="lh" style="float:left;width:65%;border:1px solid #ccc;">
            <p style="text-align:left;padding:0px 5px;font-weight:bold;">CONSIGNER'S NAME: {{$customer->customerName}}</p>
 
        </div>
        <div style="clear:both;"></div>
        
         
         <!-- $bill_date =$record[0]->bill_date; -->
     
        <div style="float:left;width:30%;">BILLING MONTH : {{date('M-Y')}}</div>
        <div style="float:left;width:30%">
            <center>
                <p> </p>
            </center>
        </div>
    </div>
    <div style="clear:both;padding:0;margin:0;"></div>
    <hr style="color:#ffb968;">
    <div style="clear:both;"></div>
    <table cellspacing="0" cell-padding="0" width="90%" border="1" class="breaker">
        <thead>
        <tr>
            <th>#</th>
            <th>Date Issued</th>
            <th>Invoice# / DC</th>
            <th>T/R ###</th>
			<th>Total Small Packs</th>
			<th>Total Large Packs</th>
            <th>Total Packs</th>
            <th >Station</th>
            <th >Rate Per Small Pack</th>
            <th >Rate Per Large Pack</th>
            <th>Total Frieght</th>
            <th>Tax Amount<br></th>
            <th >Total Amount</th>
        </tr>
        </thead>
        @foreach($bilty as $row)
        <tbody>
<tr>
<td></td>
<td>{{$row->date}}</td>
<td></td>
<td>{{$row->id}}</td>
<?php
$totalsmallsum = 0;
$totallargesum = 0;
$Totalpackagessum = 0;
$station = DB::table('now_station') 
->where('id',$row->to)
->first();

	$small = DB::table('now_builtyitems') 
	->where('builtyid',$row->id)
    ->where('package_id','1')
    ->first();
    
    $large = DB::table('now_builtyitems') 
	->where('builtyid',$row->id)
    ->where('package_id','2')
    ->first();  

    if(!empty($small)){

    $smallquantity = $small->quantity;
    $smallrating = $small->rate;
    $totalsmallquantity = $smallquantity * $smallrating ;
    }
    else{
        $smallquantity = 0;
        $smallrating = 0;
        $totalsmallquantity = 0; 
    }

    if(!empty($large)){

        $largequantity = $large->quantity;
        $largerating = $large->rate;
        $totallargequantity = $largequantity * $largerating ;
        }
        else{

            $largequantity =0;
            $largerating = 0;
            $totallargequantity = 0;
        }
    $finalprice  = $totalsmallquantity + $totallargequantity ; 
    $totalpackagescounter =  $largequantity + $smallquantity; 

  
 
$Totalpackagessum  =+ $totalpackagescounter;
$totalsmallsum =+  $smallquantity; 
$totallargesum =+   $largequantity; 
$totalrantplues =+  $finalprice;

?>


<td>{{$smallquantity}}</td>
<td>{{$largequantity}}</td>
<td>{{$totalpackagescounter}}</td>
<td>{{$station->name}}</td>
<td>{{$smallrating}}</td>
<td>{{$largerating }}</td>
<td>{{$finalprice}}</td>
<td></td>
<td>{{$finalprice}}</td>
</tr>

    @endforeach
        <tr>
            <td colspan="3">Total Page-# {{$pg}} </td>
            <td>Total Qty :</td>			
            <td>{{$totalsmallsum}}</td>
            <td>{{$totallargesum}}</td>
            <td>{{$Totalpackagessum}}</td>
            <td></td>
            <td></td>
           <td>  Total Amount :</td>
           <td>{{$totalrantplues}}</td>
            <td></td>
            <td>{{$totalrantplues}}</td>
      
        </tr>
</tbody>
    </table>
<!--END OF BILL -->
</body>
</html>
