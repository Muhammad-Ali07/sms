<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<style>
@media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
</style>
<body>
<h3 style="text-align: center;margin: auto;
  width: 60%;
  border: 1px solid black;
  padding: 2px;">This Is Sales Tax Invoice</h3>



  


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
        <th width="10%" style="border:2px solid #c7c3c3;">Date</th>
        <th width="10%" style="border:2px solid #c7c3c3;">T/R</th>
        <th width="10%" style="border:2px solid #c7c3c3;">CTN</th>
        <th width="20%" style="border:2px solid #c7c3c3;">Description</th>
         <th width="8%" style="border:2px solid #c7c3c3;">D.C. #</th>
         <th width="12%" style="border:2px solid #c7c3c3;">Destination</th>
         <th width="8%" style="border:2px solid #c7c3c3;">WeightKg</th>
         <th width="10%" style="border:2px solid #c7c3c3;">Rate</th>
         <th width="10%" style="border:2px solid #c7c3c3;">Total</th>
      </tr>
    </thead>
    <tbody>
    @php
     $pagechange = 0;
      $totalquantity= 0;
      $totalsubtotal = 0;
     @endphp 



    @foreach($bill[0]->getbiltymeta as $key=>$value)
    @php
   
  
     $totalquantity += $value->quantity;
     $totalsubtotal += $bill[0]->getbilty[0]->total_charges;
    $originalDate = $bill[0]->getbilty[0]->date;
    $newDate = date("d-m-Y", strtotime($originalDate));
   
     @endphp
      <tr>
        <td width="6%" style="border:2px solid #c7c3c3;">{{$key+1}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$newDate ??''}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->bilty_no ??''}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$value->quantity ??''}}</td>
        <td width="20%" style="border:2px solid #c7c3c3;">{{$value->description}}</td>
        <td width="8%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->total_charges ??''}}</td>
        <td  width="12%" style="border:2px solid #c7c3c3;">{{$destination ??''}}</td>
        <td  width="8%" style="border:2px solid #c7c3c3;">{{$value->weight ??''}}</td>
        <td  width="10%" style="border:2px solid #c7c3c3;">{{$value->rate ??''}}</td>
        <td  width="10%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbilty[0]->total_charges ??''}}</td>
      </tr>
      
     @endforeach   
     
           
    </tbody>
    <tfoot>
      <tr>
        <td width="26%" style="border:2px solid #c7c3c3;">ALL TOTAL CARTON'S</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$totalquantity}}</td>
         <td width="20%" style="border:2px solid #c7c3c3;"></td>
         <td width="20%" style="border:2px solid #c7c3c3;">ALL TOTAL WEIGHT'S</td>
         <td width="8%" style="border:2px solid #c7c3c3;"></td>
          <td width="10%" style="border:2px solid #c7c3c3;">Sub Total</td>
          <td width="10%" style="border:2px solid #c7c3c3;">{{$totalsubtotal ??''}}</td>
      </tr>
    </tfoot>
    
  </table>
  <table style="text-align:center;" width="80%">
    @php
     $salestax= $totalsubtotal*15/100;
      $amountwithsalestax =  $salestax+$totalsubtotal;
    @endphp
    <tr>
      <th colspan="3" style="text-align:left;" >Payment</th>
      <td width="20%" style="border-bottom: 1px solid #000;">Credit</td>
      <th colspan="14" style="text-align: right;">Special Sevice Charges</th>
      <td  width="17%" style="border:2px solid #c7c3c3; "></td>
       
    </tr>
    <tr>
      <th  colspan="3" style="text-align:left;" >Comments</th>
      <td  width="20%" style="border-bottom: 1px solid #000;"></td>
       
      <th colspan="14" style="text-align:right;">S.S.T 13%</th>
      <td width="17%" style="border:2px solid #c7c3c3;">{{$salestax}}</td>

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
      <td width="17%" style="border:2px solid #c7c3c3;">{{$amountwithsalestax}}</td>
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
   
    <th style="text-align:left;" >Invoice  </th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:10px;">{{$bill[0]->id}}</td>

    <th></th>
    <th></th>
     <th></th>
    <th></th>
   
   
    <th style="text-align:right;margin-left: 40%" ></th>
    
  </tr>
    @php
   $originalDate = $bill[0]->created_at;
    $newDate = date("d-m-Y", strtotime($originalDate));
    @endphp
   <tr>
    <th style="text-align:left;">Date</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;">{{$originalDate}}</td>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" ></th>
   </tr>
   <hr>
    <tr>
    <th style="text-align:left;">Customer</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;">{{$customer->customer_name ??''}}</td>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" ></th>
   </tr>
    <tr>
      
    <th style="text-align:left;">Address</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;">{{$customer->useraddress[0]->address??''}}</td>
    <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" ></th>
   </tr>
    <tr>
    <th style="text-align:left;">NTN NO,</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" ></th>
   </tr>
       <tr>
    <th style="text-align:left;">S.S.T</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;"></td>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
     <th style="text-align:right;margin-left: 40%" ></th>
   </tr>
    </thead>
    </table>
    <br><br>
  <table style="text-align:center;" width="100%">
    <thead>
      <tr>
        <th width="24%" style="border:2px solid #c7c3c3;">Particular</th>
         <th width="8%" style="border:2px solid #c7c3c3;">QTY</th>
         <th width="8%" style="border:2px solid #c7c3c3;">Rate</th>
          <th width="20%" style="border:2px solid #c7c3c3;">Value Without
           Sindh Sales Tax</th>
       
         <th width="20%" style="border:2px solid #c7c3c3;">Sindh Sales
         Tax 13 %</th>
         <th width="20%" style="border:2px solid #c7c3c3;">Total Value Including Sindh
          Sales Tax</th>
         
      </tr>
    </thead>
    <tbody>
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

      <tr>
        <td width="24%" style="border:2px solid #c7c3c3;">{{$bill[0]->getbill[0]->id ??''}}</td>
        <td width="8%" style="border:2px solid #c7c3c3;">{{$totalquantity}}</td>
        <td width="8%" style="border:2px solid #c7c3c3;"> {{$totalsubtotal}}</td>
        <td width="20%" style="border:2px solid #c7c3c3;">{{$totalsubtotal}}</td>
        <td width="20%" style="border:2px solid #c7c3c3;">{{$salestax}}</td>
        <td width="20%" style="border:2px solid #c7c3c3;">{{$amountwithsalestax}}</td>
      
      </tr>
      
     

           
    </tbody>
    <tfoot>
      <tr>
      <td width="24%" style="border:2px solid #c7c3c3;">TOTAL</td>
      <td width="8%" style="border:2px solid #c7c3c3;">{{$totalquantity}}</td>
      <td width="8%" style="border:2px solid #c7c3c3;"></td>
      <td width="20%" style="border:2px solid #c7c3c3;">{{$totalsubtotal}}</td>
      <td width="20%" style="border:2px solid #c7c3c3;">{{$salestax}}</td>
      <td width="20%" style="border:2px solid #c7c3c3;">{{$amountwithsalestax}}</td>
    </tr>
    </tfoot>
    
  </table>
 
  <div></div>
 <div>
  <p style="font-size: 12px;text-align: left;">Rupees in words: <u>{{convertNumberToWord($amountwithsalestax)}}</u></p>
   <p style="font-size: 12px;text-align: left">From: Mehmood Goods Transport Co.</p>
</div>


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
  <strong></strong>
  <strong></strong>
  <strong></strong>
    <strong style="text-decoration: overline ; text-align: center;width: 60%">Signature & Stamp
</strong>
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
 
</div>


</body>


</html>