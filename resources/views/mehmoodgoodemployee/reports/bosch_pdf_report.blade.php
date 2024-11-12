<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
@media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
</style>
</head>

<body>
<h3 style="text-align: center;margin: auto;
  width: 60%;
  border: 1px solid black;
  padding: 2px;">Sales Tax Invoice</h3>



  


<table style="text-align:center;" width="80%">
    <thead>
  <tr>
    <th style="text-align:left; border-bottom: 2px solid #000; margin-right:10px;">Customer</th><td  width="20%" style=" margin-right:10px;"></td>
    <th></th>
    <th></th>
     <th></th>
    <th></th>
     
   
    <th style="text-align:right;margin-left: 40%" >Bill #.</th><td  width="20%" style="border-bottom: 1px solid #000;margin-top:10% !important;">{{$bill[0]->getbill[0]->id ??''}}</td>
  </tr>
   <tr>
    <th style="text-align:left;">Name</th><td  width="45%" style="border-bottom: 1px solid #000; margin-right:20px;">{{$customer->customer_name}}</td>
     <th></th>
      <th></th>
  
    
     <th style="text-align:right;margin-left: 40%" >Date</th><td  width="20%" style="border-bottom: 1px solid #000;margin-top:10% !important;">{{$bill[0]->getbill[0]->created_at->format('d-m-d') ??''}}</td>
   </tr>
    <tr>
    <th style="text-align:left;">Address</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;">{{$customer->useraddress[0]->address}}</td>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" >Month of</th><td  width="20%" style="border-bottom: 1px solid #000;margin-top:10% !important;">{{$bill[0]->getbill[0]->created_at->format('M-Y') ??''}}</td>
   </tr>
    <tr>
    <th style="text-align:left;">City</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;">Karachi</td>
    <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" >Rep</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
   </tr>
    <tr>
    <th style="text-align:left;">Phone</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" ></th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
   </tr>
      
    </thead>
    </table>
    <br><br>
  <table style="text-align:center;" width="100%">
    <thead>
      <tr>
        <th width="4%" style="border:2px solid #c7c3c3;">S.n</th>
        <th width="12%" style="border:2px solid #c7c3c3;">Date</th>
        <th width="10%" style="border:2px solid #c7c3c3;">T/R</th>
        <th width="10%" style="border:2px solid #c7c3c3;">CTN</th>
        <th width="20%" style="border:2px solid #c7c3c3;">D.C #</th>
        <th width="15%" style="border:2px solid #c7c3c3;">Destination</th>
         
         <th width="12%" style="border:2px solid #c7c3c3;">Weight</th>
         <th width="8%" style="border:2px solid #c7c3c3;">Rate</th>
         <th width="10%" style="border:2px solid #c7c3c3;">TOTAL</th>
      </tr>
    </thead>
    <tbody>
       @php
$pagechange = 0;
@endphp 



    @foreach($bill[0]->getbiltymeta as $key=>$value)
    @php
    $totalquantity= 0;
    $totalsubtotal = 0;
     $totalquantity += $value->quantity;
     $totalsubtotal += $bill[0]->getbilty[0]->total_charges;
    $originalDate = $bill[0]->getbilty[0]->date;
    $newDate = date("d-m-Y", strtotime($originalDate));
    @endphp
      <tr>
        <td width="4%" style="border:2px solid #c7c3c3;">{{$key+1}}</td>
        <td width="12%" style="border:2px solid #c7c3c3;">{{$newDate ??''}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->bilty_no ??''}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$value->quantity ??''}}</td>
  
        <td width="20%" style="border:2px solid #c7c3c3;">{{$value->description ??''}}</td>
        <td width="15%" style="border:2px solid #c7c3c3;">{{$destination ??''}}</td>
        <td  width="12%" style="border:2px solid #c7c3c3;">{{$value->weight ??''}}</td>
        <td  width="8%" style="border:2px solid #c7c3c3;">{{$value->rate ??''}}</td>
        <td  width="10%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->total_charges ??''}}</td>
       
      </tr>
      
   @endforeach   

           
    </tbody>
    <tfoot>
      <tr>
        <td width="26%" style="border:2px solid #c7c3c3;">TOTAL CARTON'S</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$totalquantity}}</td>
         
         <td width="20%" style="border:2px solid #c7c3c3;"></td>
          <td width="15%" style="border:2px solid #c7c3c3;"></td>
          <td width="12%" style="border:2px solid #c7c3c3;"></td>
          <td width="8%" style="border:2px solid #c7c3c3;">Sub Total</td>
          <td width="10%" style="border:2px solid #c7c3c3;">{{$totalsubtotal ??''}}</td>
         
      </tr>
    </tfoot>
    
  </table>
  <table style="text-align:center;" width="80%">
    
    <tr>
      <th colspan="3" style="text-align:left;" >Payment</th>
      <td width="20%" style="border-bottom: 1px solid #000;">Credit</td>
      <th colspan="14" style="text-align: right;">Special Sevice Charges</th>
      <td  width="17%" style="border:2px solid #c7c3c3; "></td>
       
    </tr>
    <tr>
      <th  colspan="3" style="text-align:left;" >Comments</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
       
      <th colspan="14" style="text-align:right;">Tax Rate(s)</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>

    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >Name</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="14" style="text-align:right;"></th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >CC #</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="14" style="text-align:right;">TOTAL</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >Expires</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      
    </tr>
   
  </table>
  <div></div>
 <div>
  <p style="font-size: 12px;text-align: right">Eighty Three Thousand Nine Hundred Eighty Two Only</p>
</div>
<hr class="new2">
<div></div>
<div></div>
<div>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong style="text-decoration: overline ; text-align: left;">Prepared By</strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong style="text-decoration: overline ; text-align: left;">Checked By</strong>
</div>

<div>
  


</div>


  <div style="margin: auto;
  width: 60%;
  border: 1px solid black;" class="center">
  <p style="font-size: 12px">Any Discrepancies Should Be Notified To Us Within 7 Days Of Receipt Here of Or It Would Be Considered In Order</p>
</div>


<div class="pagebreak"> </div>


<h3 style="text-align: center;margin: auto;
  width: 60%;
  border: 1px solid black;
  padding: 2px;">Sales Tax Invoice</h3>



  


<table style="text-align:center;" width="80%">
    <thead>
  <tr>
    <th style="text-align:left;">Customer</th>
     <th></th>
    <th></th>
    <td  width="25%" style="border-bottom: 1px solid #000; margin-right:10px;">LINZ PHARMA</td>
     
     <th></th>
    <th></th>
     
   
    <th style="text-align:right;margin-left: 40%" >Bill</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
  </tr>
   <tr>
    <th style="text-align:left;">Name</th>
     <th></th>
     <th></th>
    <td  width="25%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
     <th></th>
     <th></th>

     <th style="text-align:right;margin-left: 40%" >Date</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
   </tr>
    <tr>
    <th style="text-align:left;">Address</th>
     <th></th>
     <th></th>
    <td  width="25%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" >Month of</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
   </tr>
    <tr>
    <th style="text-align:left;">City</th>
     <th></th>
     <th></th>
    <td  width="25%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
   
     
    
      <th></th>
      <th></th>
     <th style="text-align:right;margin-left: 40%" >Rep</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
   </tr>
    <tr>
    <th style="text-align:left;">Phone</th>
    <th></th>
     <th></th>
    <td  width="27%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" ></th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
   </tr>
      
    </thead>
    </table>
    <br><br>
  <table style="text-align:center;" width="100%">
    <thead>
      <tr>
        <th width="6%" style="border:2px solid #c7c3c3;">S.no</th>
        <th width="10%" style="border:2px solid #c7c3c3;">Date</th>
        <th width="10%" style="border:2px solid #c7c3c3;">T/R</th>
        <th width="10%" style="border:2px solid #c7c3c3;">CTN</th>
        <th width="20%" style="border:2px solid #c7c3c3;">D.C #</th>
        <th width="15%" style="border:2px solid #c7c3c3;">Destination</th>
         
         <th width="12%" style="border:2px solid #c7c3c3;"></th>
         <th width="8%" style="border:2px solid #c7c3c3;">Rate</th>
         <th width="10%" style="border:2px solid #c7c3c3;">TOTAL</th>
      </tr>
    </thead>
    <tbody>
        @php
$pagechange = 0;
@endphp 



    @foreach($bill[0]->getbiltymeta as $key=>$value)
    @php
    $totalquantity= 0;
    $totalsubtotal = 0;
     $totalquantity += $value->quantity;
     $totalsubtotal += $bill[0]->getbilty[0]->total_charges;
    $originalDate = $bill[0]->getbilty[0]->date;
    $newDate = date("d-m-Y", strtotime($originalDate));
    @endphp
      <tr>
        <td width="4%" style="border:2px solid #c7c3c3;">{{$key+1}}</td>
        <td width="12%" style="border:2px solid #c7c3c3;">{{$newDate ??''}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;"></td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$value->quantity ??''}}</td>
  
        <td width="20%" style="border:2px solid #c7c3c3;">{{$value->description ??''}}</td>
        <td width="15%" style="border:2px solid #c7c3c3;"></td>
        <td  width="12%" style="border:2px solid #c7c3c3;">{{$value->weight ??''}}</td>
        <td  width="8%" style="border:2px solid #c7c3c3;">{{$value->rate ??''}}</td>
        <td  width="10%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->total_charges ??''}}</td>
       
      </tr>
      
   @endforeach   
           
    </tbody>
    <tfoot>
      <tr>
        <td width="26%" style="border:2px solid #c7c3c3;">TOTAL CARTON'S</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$totalquantity}}</td>
         
         <td width="20%" style="border:2px solid #c7c3c3;"></td>
          <td width="15%" style="border:2px solid #c7c3c3;"></td>
          <td width="12%" style="border:2px solid #c7c3c3;"></td>
          <td width="8%" style="border:2px solid #c7c3c3;">Sub Total</td>
          <td width="10%" style="border:2px solid #c7c3c3;">{{$totalsubtotal}}</td>
         
      </tr>
    </tfoot>
    
  </table>
  <table style="text-align:center;" width="80%">
    
    <tr>
      <th colspan="3" style="text-align:left;" >Payment</th>
      <td width="20%" style="border-bottom: 1px solid #000;">Credit</td>
      <th colspan="14" style="text-align: right;">Special Sevice Charges</th>
      <td  width="17%" style="border:2px solid #c7c3c3; "></td>
       
    </tr>
    <tr>
      <th  colspan="3" style="text-align:left;" >Comments</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
       
      <th colspan="14" style="text-align:right;">SRB</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>

    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >Name</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="14" style="text-align:right;"></th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >CC #</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="14" style="text-align:right;">TOTAL</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >Expires</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      
    </tr>
   
  </table>
  <div></div>
 <div>
  <p style="font-size: 12px;text-align: right">Eighty Three Thousand Nine Hundred Eighty Two Only</p>
</div>
<hr class="new2">
<div></div>
<div></div>
<div>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong style="text-decoration: overline ; text-align: left;">Prepared By</strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong style="text-decoration: overline ; text-align: left;">Checked By</strong>
</div>

<div>
  


</div>


  <div style="margin: auto;
  width: 60%;
  border: 1px solid black;" class="center">
  <p style="font-size: 12px">Any Discrepancies Should Be Notified To Us Within 7 Days Of Receipt Here of Or It Would Be Considered In Order</p>
</div>
<div class="pagebreak"> </div>
<h3 style="text-align: center;margin: auto;
  width: 60%;
  border: 1px solid black;
  padding: 2px;">Sales Tax Invoice</h3>



  


<table style="text-align:center;" width="80%">
    <thead>
  <tr>
    <th style="text-align:left;">Customer</th>
     <th></th>
    <th></th>
    <td  width="25%" style="border-bottom: 1px solid #000; margin-right:10px;">LINZ PHARMA</td>
     
     <th></th>
    <th></th>
     
   
    <th style="text-align:right;margin-left: 40%" >Bill</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
  </tr>
   <tr>
    <th style="text-align:left;">Name</th>
     <th></th>
     <th></th>
    <td  width="25%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
     <th></th>
     <th></th>

     <th style="text-align:right;margin-left: 40%" >Date</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
   </tr>
    <tr>
    <th style="text-align:left;">Address</th>
     <th></th>
     <th></th>
    <td  width="25%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" >Month of</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
   </tr>
    <tr>
    <th style="text-align:left;">City</th>
     <th></th>
     <th></th>
    <td  width="25%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
   
     
    
      <th></th>
      <th></th>
     <th style="text-align:right;margin-left: 40%" >Rep</th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
   </tr>
    <tr>
    <th style="text-align:left;">Phone</th>
    <th></th>
     <th></th>
    <td  width="27%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" ></th><td  width="20%" style="border-bottom: 1px solid #000;text-align: right;margin-top:10% !important;"></td>
   </tr>
      
    </thead>
    </table>
    <br><br>
  <table style="text-align:center;" width="100%">
    <thead>
      <tr>
        <th width="6%" style="border:2px solid #c7c3c3;">S.no</th>
        <th width="10%" style="border:2px solid #c7c3c3;">Date</th>
        <th width="10%" style="border:2px solid #c7c3c3;">T/R</th>
        <th width="10%" style="border:2px solid #c7c3c3;">CTN</th>
        <th width="20%" style="border:2px solid #c7c3c3;">D.C #</th>
        <th width="15%" style="border:2px solid #c7c3c3;">Destination</th>
         
         <th width="12%" style="border:2px solid #c7c3c3;"></th>
         <th width="8%" style="border:2px solid #c7c3c3;">Rate</th>
         <th width="10%" style="border:2px solid #c7c3c3;">TOTAL</th>
      </tr>
    </thead>
    <tbody>
      @php
$pagechange = 0;
@endphp 



    @foreach($bill[0]->getbiltymeta as $key=>$value)
    @php
    $totalquantity= 0;
    $totalsubtotal = 0;
     $totalquantity += $value->quantity;
     $totalsubtotal += $bill[0]->getbilty[0]->total_charges;
    $originalDate = $bill[0]->getbilty[0]->date;
    $newDate = date("d-m-Y", strtotime($originalDate));
    @endphp
      <tr>
        <td width="4%" style="border:2px solid #c7c3c3;">{{$key+1}}</td>
        <td width="12%" style="border:2px solid #c7c3c3;">{{$newDate ??''}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;"></td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$value->quantity ??''}}</td>
  
        <td width="20%" style="border:2px solid #c7c3c3;">{{$value->description ??''}}</td>
        <td width="15%" style="border:2px solid #c7c3c3;"></td>
        <td  width="12%" style="border:2px solid #c7c3c3;">{{$value->weight ??''}}</td>
        <td  width="8%" style="border:2px solid #c7c3c3;">{{$value->rate ??''}}</td>
        <td  width="10%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->total_charges ??''}}</td>
       
      </tr>
      
   @endforeach   
           
    </tbody>
    <tfoot>
      <tr>
        <td width="26%" style="border:2px solid #c7c3c3;">TOTAL CARTON'S</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$totalquantity}}</td>
         
         <td width="20%" style="border:2px solid #c7c3c3;"></td>
          <td width="15%" style="border:2px solid #c7c3c3;"></td>
          <td width="12%" style="border:2px solid #c7c3c3;"></td>
          <td width="8%" style="border:2px solid #c7c3c3;">Sub Total</td>
          <td width="10%" style="border:2px solid #c7c3c3;">{{$totalsubtotal}}</td>
         
      </tr>
    </tfoot>
  </table>
  <table style="text-align:center;" width="80%">
    
    <tr>
      <th colspan="3" style="text-align:left;" >Payment</th>
      <td width="20%" style="border-bottom: 1px solid #000;">Credit</td>
      <th colspan="14" style="text-align: right;">Special Sevice Charges</th>
      <td  width="17%" style="border:2px solid #c7c3c3; "></td>
       
    </tr>
    <tr>
      <th  colspan="3" style="text-align:left;" >Comments</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
       
      <th colspan="14" style="text-align:right;">SRB</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>

    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >Name</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="14" style="text-align:right;"></th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >CC #</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="14" style="text-align:right;">TOTAL</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >Expires</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      
    </tr>
   
  </table>
  <div></div>
 <div>
  <p style="font-size: 12px;text-align: right">Eighty Three Thousand Nine Hundred Eighty Two Only</p>
</div>
<hr class="new2">
<div></div>
<div></div>
<div>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong style="text-decoration: overline ; text-align: left;">Prepared By</strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong></strong>
  <strong style="text-decoration: overline ; text-align: left;">Checked By</strong>
</div>

<div>
  


</div>


  <div style="margin: auto;
  width: 60%;
  border: 1px solid black;" class="center">
  <p style="font-size: 12px">Any Discrepancies Should Be Notified To Us Within 7 Days Of Receipt Here of Or It Would Be Considered In Order</p>
</div>




</body>


</html>