<!DOCTYPE html>
<html>
<head>
<title></title>
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
        <th width="6%" style="border:2px solid #c7c3c3;">S.no</th>
        <th width="9%" style="border:2px solid #c7c3c3;">Date</th>
        <th width="10%" style="border:2px solid #c7c3c3;">T/R</th>
        <th width="10%" style="border:2px solid #c7c3c3;">CTN/BAGS</th>
        <th width="15%" style="border:2px solid #c7c3c3;">Description</th>
         <th width="10%" style="border:2px solid #c7c3c3;">Destination</th>
         <th width="7%" style="border:2px solid #c7c3c3;">LCL/FCL</th>
         <th width="8%" style="border:2px solid #c7c3c3;">Rate</th>
         <th width="8%" style="border:2px solid #c7c3c3;">Weight Kg</th>
         <th width="7%" style="border:2px solid #c7c3c3;">Home Delivery</th>
         <th width="10%" style="border:2px solid #c7c3c3;">Total</th>
      </tr>
    </thead>
    <tbody>
      @php
      $pagechange = 0;
      $totalquantity= 0;
      $totalweight= 0;
      $totalsubtotal = 0;
     @endphp 



    @foreach($bill[0]->getbiltymeta as $key=>$value)
    @php
   
  
     $totalquantity += $value->quantity;
     $totalsubtotal += $bill[0]->getbilty[0]->total_charges;
      $totalweight += $value->weight;
     $originalDate = $bill[0]->getbilty[0]->date;
     $newDate = date("d-m-Y", strtotime($originalDate));
     @endphp
      <tr>
        <td width="6%" style="border:2px solid #c7c3c3;">{{$key+1}}</td>
        <td width="9%" style="border:2px solid #c7c3c3;">{{$newDate}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->bilty_no ??''}}</td>
         <td width="10%" style="border:2px solid #c7c3c3;">{{$value->quantity ??''}}</td>
         <td width="15%" style="border:2px solid #c7c3c3;">{{$value->description ??''}}</td>
         <td width="10%" style="border:2px solid #c7c3c3;">{{$destination ??''}}</td>
         <td width="7%" style="border:2px solid #c7c3c3;">{{"LCL"}}</td>
         <td width="8%" style="border:2px solid #c7c3c3;">{{$value->rate ??''}}</td>
         <td width="8%" style="border:2px solid #c7c3c3;">{{$value->weight ??''}}</td>
         <td width="7%" style="border:2px solid #c7c3c3;">{{$bill[0]->home_delivery ??''}}</td>
         <td width="10%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->total_charges ??''}}</td>
      </tr>
        @endforeach
     

<tr>
    <td width="25%" style="border:2px solid #c7c3c3;">Total Carton</td>
    <td width="10%" style="border:2px solid #c7c3c3;">{{$totalquantity}}</td>
     <td width="15%"></td>
     <td width="25%" style="border:2px solid #c7c3c3;">Total Weight</td>
     <td width="8%" style="border:2px solid #c7c3c3;">{{ $totalweight ??''}}</td>
  </tr>
           
    </tbody>
    
  </table>
  <table style="text-align:center;" width="80%">
    
    <tr>
      <th colspan="3" style="text-align:left;" >Payment</th>
      <td width="20%" style="border-bottom: 1px solid #000;">Credit</td>
      <th colspan="13" style="text-align: right;">Sub Total</th>
      <td  width="17%" style="border:2px solid #c7c3c3; ">{{$totalsubtotal ??''}}</td>
       
    </tr>
    <tr>
      <th  colspan="3" style="text-align:left;" >Sales Tax</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
       
      <th colspan="13" style="text-align:right;">Special Service Charges</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>

    </tr>
    <tr>
      <th colspan="3" style="text-align:left; font-size: 8px;" >Net Tax Inc. Value</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="13" style="text-align:right;"></th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >CC #</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="13" style="text-align:right;">S.R.B 13%</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >Comments</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="13" style="text-align:right;"></th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="17" style="text-align:right; font-weight: bolder;">TOTAL</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
  </table>
  <div></div>
  @php
     
      //this function is used for converting into words
      function convertNumberToWord($num = false)
       {
      $num = str_replace(array(',', ' '), '' , trim($num));
      if(! $num) {
        return false;
       }
       $num = (int) $num;
      $words = array();
      $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
      $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
     $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
       }
      @endphp

 <div>
  <p style="font-size: 12px;text-align: right">{{convertNumberToWord($totalsubtotal)}} </p>
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
<div style="page-break-before: always; text-align: center">
    <h3 style="text-align: center;margin: auto;
  width: 60%;
  border: 1px solid black;
  padding: 2px;">Bill</h3>



  


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
        <th width="6%" style="border:2px solid #c7c3c3;">S.no</th>
        <th width="9%" style="border:2px solid #c7c3c3;">Date</th>
        <th width="10%" style="border:2px solid #c7c3c3;">T/R</th>
        <th width="10%" style="border:2px solid #c7c3c3;">CTN/BAGS</th>
        <th width="15%" style="border:2px solid #c7c3c3;">Description</th>
         <th width="10%" style="border:2px solid #c7c3c3;">Destination</th>
         <th width="7%" style="border:2px solid #c7c3c3;">LCL/FCL</th>
         <th width="8%" style="border:2px solid #c7c3c3;">Rate</th>
         <th width="8%" style="border:2px solid #c7c3c3;">Weight Kg</th>
         <th width="7%" style="border:2px solid #c7c3c3;">Home Delivery</th>
         <th width="10%" style="border:2px solid #c7c3c3;">Total</th>
      </tr>
    </thead>
    <tbody>
       @php
      $pagechange = 0;
      $totalquantity= 0;
      $totalweight= 0;
      $totalsubtotal = 0;
     @endphp 



    @foreach($bill[0]->getbiltymeta as $key=>$value)
    @php
   
  
     $totalquantity += $value->quantity;
     $totalsubtotal += $bill[0]->getbilty[0]->total_charges;
      $totalweight += $value->weight;
     $originalDate = $bill[0]->getbilty[0]->date;
     $newDate = date("d-m-Y", strtotime($originalDate));
     @endphp
      <tr>
        <td width="6%" style="border:2px solid #c7c3c3;">{{$key+1}}</td>
        <td width="9%" style="border:2px solid #c7c3c3;">{{$newDate}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->bilty_no ??''}}</td>
         <td width="10%" style="border:2px solid #c7c3c3;">{{$value->quantity ??''}}</td>
         <td width="15%" style="border:2px solid #c7c3c3;">{{$value->description ??''}}</td>
         <td width="10%" style="border:2px solid #c7c3c3;">{{$destination}}</td>
         <td width="7%" style="border:2px solid #c7c3c3;">{{"LCL"}}</td>
         <td width="8%" style="border:2px solid #c7c3c3;">{{$value->rate ??''}}</td>
         <td width="8%" style="border:2px solid #c7c3c3;">{{$value->weight ??''}}</td>
         <td width="7%" style="border:2px solid #c7c3c3;"></td>
         <td width="10%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->total_charges ??''}}</td>
      </tr>
        @endforeach
<tr>
    <td width="25%" style="border:2px solid #c7c3c3;">Total Carton</td>
    <td width="10%" style="border:2px solid #c7c3c3;"></td>
     <td width="15%"></td>
     <td width="25%" style="border:2px solid #c7c3c3;">Total Weight</td>
     <td width="8%" style="border:2px solid #c7c3c3;"></td>
  </tr>
           
    </tbody>
    
  </table>
  <table style="text-align:center;" width="80%">
    
    <tr>
      <th colspan="3" style="text-align:left;" >Payment</th>
      <td width="20%" style="border-bottom: 1px solid #000;">Credit</td>
      <th colspan="13" style="text-align: right;">Sub Total</th>
      <td  width="17%" style="border:2px solid #c7c3c3; ">{{$totalsubtotal}}</td>
       
    </tr>
    <tr>
      <th  colspan="3" style="text-align:left;" >Comments</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
       
      <th colspan="13" style="text-align:right;">Special Service Charges</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>

    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >Name</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="13" style="text-align:right;">Tax Rate(s)</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >CC #</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="13" style="text-align:right;"></th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="3" style="text-align:left;" >Comments</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
      <th colspan="13" style="text-align:right;"></th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
    <tr>
      <th colspan="17" style="text-align:right; font-weight: bolder;">TOTAL</th>
      <td width="17%" style="border:2px solid #c7c3c3;"></td>
    </tr>
  </table>
  <div></div>
 <div>
  <p style="font-size: 12px;text-align: right">{{convertNumberToWord($totalsubtotal)}} </p>
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
</div>
</body>


</html>