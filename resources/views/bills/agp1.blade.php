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
<div style="width:100% !important;">
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
    $totalsmallsum =0; 
    $totallargesum =0;
    $Totalpackagessum =0;
    $finalprice =0;
     $totalamountvalue=[];
     $totalamountdata=[];
     $totalquantiyvalue=[];
     
   
 
  $pg +=1;

    ?>
    
    <div style="width:100%;">

    <div style="width:100%;padding:5px;">
        <div style="float:left;width:40%;">
            <img src="images/logo.jpg"  th="180px" height="60px" style="padding:10px 0px 0px 0px;"/>
        </div>
        <div style="float:left;width:20%;">
            <center><h3>Bill Summary</h3></center>
        </div>
        <div style="float:left;width:40%;text-align:right;">
            <h3>NEW SARHAD KARACHI<br>GOODS TRANSPORT CO.</h3>
        </div>
        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:50%;">
            <p><b>NTN#:5215306-4 </b>&nbsp; EMAIL:nskg_trco1@yahoo.com</p>
        </div>

        <div style="clear:both;"></div>
        <div class="lh" style="float:left;width:20%;">
            <p style="text-align:left;">BILL NO :
                
                </p>
        </div>
        <div style="clear:both;"></div>
        <div style="float:left;width:30%;">BILLING MONTH :
           
    
        </div>
        <div style="float:left;width:30%"><center><p> </p></center></div>
    </div>
    <div style="clear:both;padding:0;margin:0;"></div>
    <hr style="color:#ffb968;">
    <div style="clear:both;"></div>
    <div>
        <img src="images/logo.jpg" style="z-index:0;top:50px;position:absolute;opacity: 0.1;-webkit-transform: rotate(-30deg);transform: rotate(-30deg);"/>
        <div style="width:50%;margin:0px auto;z-index:999;">

            <!-- amount start -->

            <table width="100%" cellspacing="0" border="1">
                <tr>
                    <th >Number of pages</th>

                    <th>Total freight per page</th>
                    <th>Total tax per page</th>
                    <th>Total amount per page</th>

                </tr> 
               
                <tr>
                    <th>Total Amount</th>

                    <th></th>
                    <th></th>
                    <th></th>

                </tr>
            </table>

           
            <!-- freight end -->

        </div>


        <table width="100%" cellspacing="20" style="position:absolute;bottom:30px;">
            <tr>
                <th style="width:23%;border-bottom:1px solid #000;"><center>name here</center></th>
                <th style="width:23%;border-bottom:1px solid #000;"></th>
                <th style="width:23%;border-bottom:1px solid #000;"></th>
            </tr>
            <tr>
                <td>Prepared By</td>
                <td>Accountant</td>
                <td>Chief Executive</td>
            </tr>
        </table>
        
    </div>
    
    <div style="text-align:right;font-size:10px;align:bottom;">-By Dusky Solution</div>
    
    
    
    
    
    
    
    <div style="clear:both;" class="page-break"></div>
    
 <div style="width:100%;">
        <div style="float:left;width:40%;" >

            <header>
                <img src="images/logo.jpg" th="180px" height="70px" style="padding:10px 0px 0px 0px;"/>
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
            <td>{{array_sum($totalquantiyvalue)}}</td>
            <td>{{$data->labour * array_sum($totalquantiyvalue)}}</td>
            <td>{{$data->labour * array_sum($totalquantiyvalue) + array_sum($totalamountvalue)}}</td>
           <td>  Total Amount :</td>
           <td>{{array_sum($totalamountvalue)}}</td>
            <td></td>
            <td>{{array_sum($totalamountvalue)}}</td>

        </tr>
       
        
</tbody>
    </table>
<!--END OF BILL -->
</body>
</html>
