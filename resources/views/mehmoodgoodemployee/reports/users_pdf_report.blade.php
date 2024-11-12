<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<style>



#users td, #users th {
  border: 1px solid #ddd;
  padding: 8px;
}
.post-date {
                float: right;
                
                font-size:16px
            }
            .post-dateleft {
                float: left;
                
                font-size:16px
            }



 .post-datemiddle {
                 text-align: center; 
                font-size:16px
        }           
 hr.new2 {
border: 1px solid black;
 
}
a {
border-top: 1px solid black;
padding-bottom: 5px;
}
.center {
  margin: auto;
  width: 60%;
  border: 1px solid black;
  padding: 2px;
}
.centerpurple {
  margin: auto;
  width: 60%;
  border: 1px solid purple;
  padding: 2px;
}

</style>
<body>

<div class="centerpurple">
<h2><center>Sales Tax Invoice</center></h2>

</div>


<h4 style="text-align: right">Bills</h4>


	<hr class="new2">
<table width="28%" align="left" style="font-size:16px;text-align:left;">
<div class="post-date">
 <b><span class="label">Bill #: </span>0072</b>
 <br>
 <span class="label">Date: </span>12.12.1212
 <br>
 <span class="label">For the Month of:</span>JUL 2019
  <br>
  <span class="label">Rep</span> 
 </div>
 

<tr>
<td><b style="font-size:16px;text-align:left;border-bottom: 1px solid black;
padding-bottom: 2px;">Customer: </b>&nbsp;&nbsp;&nbsp;<span style=""></span></td>
<td><b style="font-size:16px;text-align:left;"> </b>&nbsp;&nbsp;&nbsp;<span style=""></span></td>

</tr>
<tr>
<td><b style="font-size:16px;text-align:left;">Name: </b>&nbsp;&nbsp;&nbsp;<span style=""></span></td>
<td><b style="font-size:16px;text-align:left;">STAHL PAKISTAN</b>&nbsp;&nbsp;&nbsp;<span style=""></span></td>
</tr>

<tr>
<td><b style="font-size:16px;text-align:left;">Address: </b>&nbsp;&nbsp;&nbsp;<span style=""></span></td>
<td>Plot # &nbsp;&nbsp;&nbsp;<span style=""></span></td>
</tr>
<tr>
<td><b style="font-size:16px;text-align:left;">City: </b>&nbsp;&nbsp;&nbsp;<span style=""></span></td>
<td>Karachi &nbsp;&nbsp;&nbsp;<span style=""></span></td>
</tr>
<tr>
<td><b style="font-size:16px;text-align:left;">Phone: </b>&nbsp;&nbsp;&nbsp;<span style=""></span></td>
<td>093939&nbsp;&nbsp;&nbsp;<span style=""></span></td>
</tr>
@if(isset($postfrom))

<tr>
<td><b style="font-size:16px;text-align:left;">Date from: </b>&nbsp;&nbsp;&nbsp;<span style="">{{$postfrom}}</span></td>
<td><b style="font-size:16px;text-align:left;"> </b>&nbsp;&nbsp;&nbsp;<span style=""></span></td>
</tr>
@endif
@if(isset($postto))
<tr>
<td><b style="font-size:16px;text-align:left;">Date to: </b>&nbsp;&nbsp;&nbsp;<span style="">{{$postto}}</span></td>
<td><b style="font-size:16px;text-align:left;"> </b>&nbsp;&nbsp;&nbsp;<span style=""></span></td>
</tr>
@endif

</tr>
<tr>
</tr>
<?php
$date = date('d-m-Y');
date_default_timezone_set("Asia/Karachi");
?>
<tr>
<td><b style="font-size:16px;text-align:right;"></b>  &nbsp;&nbsp;&nbsp;  </td>
</tr>
</table>

<div style="font-size:24px;font-weight:bold;"><div style="padding-bottom:2px;width:48%;
">
    <br>
    <br>
    <br>
</span></div>
<hr>
<table id="users"   width="100%" style="font-size:14px;margin-top:10px;text-align:center;color:#2c2c2c;" border="0" cellspacing="0" >

<thead>
<tr>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;height: 40px;">S.no</td>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">Date</td>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">T/R</td>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">CTN</td>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">Description</td>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">Destination</td>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">DO#</td>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">Weight
Kg</td>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">Rate</td>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">Home Delivery</td>
<td style="border-top:2px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">TOTAL</td>
</tr> 
</thead>

<tbody>
@php
$pagechange = 0;
@endphp	

@for($pagechange;$pagechange<23;$pagechange++)
 <tr>
<td style="border-top:1px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">{{$pagechange+1}}</td>
<td style="border-top:1px solid #000;border-bottom:2px solid #000; "></td>
<td style="border-top:1px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">
 </td>

<td style="border-top:1px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">

</td>

<td style="border-top:1px solid #000;border-bottom:2px solid #000; border: 1px solid #000;">
</td>
<td style="border-top:1px solid #000;border-bottom:2px solid #000; border: 1px solid #000;"></td>
<td style="border-top:1px solid #000;border-bottom:2px solid #000; border: 1px solid #000;"></td>
<td style="border-top:1px solid #000;border-bottom:2px solid #000; border: 1px solid #000;"></td>
<td style="border-top:1px solid #000;border-bottom:2px solid #000; border: 1px solid #000;"></td>
<td style="border-top:1px solid #000;border-bottom:2px solid #000; border: 1px solid #000;"></td>
<td style="border-bottom:2px solid #000; border: 1px solid #000;"></td>

</tr> 
@endfor




</tbody>
<tfoot>
	<tr>
	<td colspan="2">TOTAL CARTON/DRM&BAG</td>
	<td>0</td>
	<td></td>
	<td></td>
	<td></td>
	<td>TOTAL WEIGHT'S</td>
    <td>0</td>
    <td></td>
     <td></td>
     <td></td>
 </tr>
 <div class="row">
 <tr>
<td colspan="9" style="visibility:hidden"></td>
<td>sub total</td>
<td  style="text-align: right">0</td>
</tr>
 <tr>
<td colspan="9" style="visibility:hidden"></td>
<td>special service charges</td>
<td  style="text-align: right">0</td>
</tr>
<tr>
<td >Payment</td>
<td>Credit</td>
<td colspan="7" style="visibility:hidden"></td>
<td>S.R.B</td>
<td  style="text-align: right">0</td>
</tr>
<tr>
	<td>Comments</td>
<td></td>
<td colspan="7" style="visibility:hidden"></td>
<td></td>
<td style="text-align: right">0</td>
</tr>
<tr>
<td>Name</td>
<td></td>
<td colspan="7" style="visibility:hidden"></td>
<td>Total</td>
<td  style="text-align: right">0</td>
</tr>
<tr>
<td>CC#</td>
<td></td>	
</tr>
<tr>
<td>Expires</td>
<td></td>
</tr>


</tfoot>



</table>
<hr class="new2">
<br>
<br>
<div class="post-dateleft">
<a>Prepared By</a>
</div>
<div class="post-datemiddle">
<a>Checked By</a>
</div>
<div class="col-sm-6">
<div class="center">
  <p style="font-size: 12px">Any Discrepancies Should Be Notified To Us Within 7 Days Of Receipt Hereof Or It Would Be Considered In Order</p>
</div>
</div>
</body>
</html>