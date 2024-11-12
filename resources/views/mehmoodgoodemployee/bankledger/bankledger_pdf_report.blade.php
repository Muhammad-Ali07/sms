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

<body onload="window.print()">
<h3 style="text-align: center;margin: auto;
  width: 60%;
  border: 1px solid black;
  padding: 2px;">Bank Ledger</h3>



  


<table style="text-align:center;" width="80%">
    <thead>
  <tr>
    <th style="text-align:left; border-bottom: 2px solid #000; margin-right:10px;">Bank</th><td  width="20%" style=" margin-right:10px;"></td>
    <th></th>
    <th></th>
     <th></th>
    <th></th>
     
   
  
  </tr>
   <tr>
    <th style="text-align:left;">Name</th><td  width="45%" style="border-bottom: 1px solid #000; margin-right:20px;">
      {{$bank->bank->name}}/{{$bank->name}}</td>
     <th></th>
      <th></th>
  
    

   </tr>
    <tr>
    <th style="text-align:left;">Datefrom</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;">{{$from}}</td>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
    
   </tr>
    <tr>
    <th style="text-align:left;">Date to</th><td  width="20%" style="border-bottom: 1px solid #000; margin-right:20px;">{{$to}}</td>
    <th></th>
     <th></th>
     <th></th>
     <th></th>
    
   </tr>
    <tr>

     <th></th>
     <th></th>
     <th></th>
     <th></th>

   </tr>
      
    </thead>
    </table>
    <br><br>
  <table style="text-align:center;" width="100%">
    <thead>
      <tr>
        <th width="4%" style="border:2px solid #c7c3c3;">S.n</th>
        <th width="12%" style="border:2px solid #c7c3c3;">Date</th>
        <th width="25%" style="border:2px solid #c7c3c3;">Description</th>
         <th width="20%" style="border:2px solid #c7c3c3;">Debit</th>
         <th width="10%" style="border:2px solid #c7c3c3;">Credit</th>
          <th width="10%" style="border:2px solid #c7c3c3;">Balance</th>
      </tr>
    </thead>
    <tbody>
       @php
        $totalcredit = 0;
        $balance = 0;
       @endphp
       @if(isset($ledger))

       @foreach($ledger as $key=>$value)
  
     
       @php
      
       $Date = date("d-m-Y", strtotime($value->created_at));
     
        
       @endphp 
      <tr>
        <td width="4%" style="border:2px solid #c7c3c3;">{{$key+1}}</td>
        <td width="12%" style="border:2px solid #c7c3c3;">{{$Date ??''}}</td>
        <td width="25%" style="border:2px solid #c7c3c3;">{{$value->description ??''}}</td>
        <td width="20%" style="border:2px solid #c7c3c3;">{{$value->debit ??''}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$value->credit ??''}}</td>
        <td  width="10%" style="border:2px solid #c7c3c3;">{{$value->balance ??''}}</td>
       
      </tr>
        @php
        $balance = $value->balance;
        @endphp
       @endforeach
       
      
      
      @endif
      
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

           
    </tbody>
    <tfoot>
      <tr>
        <td width="4%" style="border:2px solid #c7c3c3;"></td>
        <td width="12%" style="border:2px solid #c7c3c3;"></td>
         
         <td width="25%" style="border:2px solid #c7c3c3;"></td>
          <td width="20%" style="border:2px solid #c7c3c3;"></td>
          <td width="10%" style="border:2px solid #c7c3c3;"></td>
          <td width="10%" style="border:2px solid #c7c3c3;"></td>
           
         
      </tr>
    </tfoot>
    
  </table>
  <table style="text-align:center;" width="80%">
    
   
   
    <tr>
      <th colspan="3" style="text-align:left;" ></th>
      <td  width="20%" ></td>
      
    </tr>
   
  </table>
  <div></div>
 <div>
  <p style="font-size: 12px;text-align: right"><b>{{"Amount in words:"}}{{convertNumberToWord($balance)}}{{"only"}}</b></p>
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


  





</body>


</html>