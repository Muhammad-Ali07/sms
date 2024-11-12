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
  padding: 2px;">Broker Ledger</h3>

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

  


<table style="text-align:center;" width="80%">
    <thead>
  <tr>
    <th style="text-align:left; border-bottom: 2px solid #000; margin-right:10px;">Customer</th><td  width="20%" style=" margin-right:10px;"></td>
    <th></th>
    <th></th>
     <th></th>
    <th></th>
     
   
  
  </tr>
   <tr>
    <th style="text-align:left;">Name</th><td  width="45%" style="border-bottom: 1px solid #000; margin-right:20px;">{{$brokerdata[0]->getbroker->broker_name ??''}}</td>
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
        <th width="20%" style="border:2px solid #c7c3c3;">Description</th>
        <th width="12%" style="border:2px solid #c7c3c3;">Cash/bank</th>
        <th width="23%" style="border:2px solid #c7c3c3;">Bank name</th>
        <th width="10%" style="border:2px solid #c7c3c3;">Cheque number</th>
         <th width="10%" style="border:2px solid #c7c3c3;">Debit</th>
         <th width="10%" style="border:2px solid #c7c3c3;">Credit</th>
          <th width="10%" style="border:2px solid #c7c3c3;">Balance</th>
      </tr>
    </thead>
    <tbody>
        @php

       $credittotal = 0; 
       $serial = 0;
       $balance = 0;
       $totaldebit = 0;
       $totalcredit = 0;

       @endphp
       
       

         @php
       $credittotal = 0; 
       @endphp
       @if(isset($brokerdata))
        @php
        $totalcredit = 0;
        $totaldebit = 0;
        $totalbalance = 0;
        @endphp
       @foreach($brokerdata as $key=>$value)
     

      <tr>
        <td width="4%" style="border:2px solid #c7c3c3;">{{$key+1}}</td>
        <td width="20%" style="border:2px solid #c7c3c3;">{{date("d-m-Y", strtotime($value->date)) ??''}}</td>
        <td width="12%" style="border:2px solid #c7c3c3;">{{$value->payment_type ??''}}</td>
        <td width="23%" style="border:2px solid #c7c3c3;">
          @if($value->payment_type=="Bank")
          @php
          $bankname = $model->where('branch_id',$value->branch_id)->first();
          @endphp
          {{$bankname->branch->bank->name}}{{"/"}}{{$bankname->branch->name}}
          @endif
          @if($value->payment_type=="Petty Cash")
           {{"-"}}
          @endif
       </td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{$value->cheque_no ??''}}</td>
        <td  width="10%" style="border:2px solid #c7c3c3;">@if($value->balance_type=="Receivable"){{$value->amount ??''}}
        @php 
        $totaldebit += $value->amount;  
        @endphp
        @endif
        @if($value->balance_type=="Payable"){{"-"}}@endif  

        </td>
        <td  width="10%" style="border:2px solid #c7c3c3;">
        @if($value->balance_type=="Receivable"){{"-"}}@endif
        @if($value->balance_type=="Payable"){{$value->amount ??''}}
        @php 
        $totalcredit += $value->amount;  
        @endphp
        @endif 
         @php
         $balance =$totaldebit-$totalcredit;
        @endphp 
        </td>
        <td  width="10%" style="border:2px solid #c7c3c3;">{{$balance}}</td>
       
      </tr>
      @endforeach
      @endif
       
      @if(isset($withoutbill))
       @foreach($withoutbill as $key=>$value)
       @php
       $serial +=1;
       $balance +=$value->getreceipt[0]->enter_amount;
       $totaldebit += $value->getreceipt[0]->enter_amount; 
        $paymenttype = "Cash";
        @endphp
        @if($value->getreceipt[0]->bank_id!="")
        @php

        $paymenttype = "Bank";
      
        @endphp
        @endif
      
      <tr>
        <td width="4%" style="border:2px solid #c7c3c3;">{{$serial}}</td>
        <td width="12%" style="border:2px solid #c7c3c3;">{{$value->created_at ??''}}</td>
        <td width="7%" style="border:2px solid #c7c3c3;">{{$value->bill_id ??''}}</td>
        <td width="15%" style="border:2px solid #c7c3c3;">{{"Payment against customer"}}</td>
  
        <td width="15%" style="border:2px solid #c7c3c3;">{{ $paymenttype ??''}}</td>
        <td width="10%" style="border:2px solid #c7c3c3;">{{ $value->getreceipt[0]->cheque_no ??''}}</td>
        <td  width="12%" style="border:2px solid #c7c3c3;">{{"-"}}</td>
        <td  width="8%" style="border:2px solid #c7c3c3;"></td>
        <td  width="8%" style="border:2px solid #c7c3c3;">{{$value->getreceipt[0]->enter_amount ??''}}</td>
        <td  width="9%" style="border:2px solid #c7c3c3;">{{$balance}}</td>
       
      </tr>
      @endforeach
      @endif



    





       @if(!isset($brokerdata[0]))
        <tr>
         <td colspan="9">No Records Found</td>
       
      </tr>
       @endif


           
    </tbody>
    <tfoot>
      <tr>
        <td width="4%" style="border:2px solid #c7c3c3;"></td>
        <td width="12%" style="border:2px solid #c7c3c3;"></td>
         
         <td width="7%" style="border:2px solid #c7c3c3;"></td>
          <td width="15%" style="border:2px solid #c7c3c3;"></td>
            <td width="15%" style="border:2px solid #c7c3c3;"></td>
           <td width="10%" style="border:2px solid #c7c3c3;"></td>
            <td width="12%" style="border:2px solid #c7c3c3;">Sub Total</td>
          <td width="8%" style="border:2px solid #c7c3c3;">{{$totaldebit}}</td>
          <td width="8%" style="border:2px solid #c7c3c3;">{{$totalcredit}}</td>
          <td width="9%" style="border:2px solid #c7c3c3;">{{ $balance}}</td>
         
      </tr>
    </tfoot>
    
  </table>
 
  <div></div>
 <div>
  <p style="font-size: 12px;text-align: right"><b>Amount in words:</b>{{convertNumberToWord($balance)}}{{"only"}}</p>
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