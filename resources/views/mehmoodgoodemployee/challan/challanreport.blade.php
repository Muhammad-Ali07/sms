<!DOCTYPE html>
<html>
<head>
<style>
.page-break {
    page-break-after: always;
}
</style>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- <link rel="stylesheet" href="{{ asset('public/assets/fonts/ArialUnicodeMS.ttf') }}"> -->
  <!-- <style>
    *{  font-family: 'Droid Arabic Naskh' }
  </style> -->
</head>

    <div style="width:200%;">
            <img src="{{ url("public/images/MGT_LOGO-1.png") }}" width="1500%">
      </div>

<body>
    <table width="100%" align="right" >
      <tr>
        <td ><b style="font-size:12px;margin-left:-40px !important">Module</b><span> : Challan</span></td>
      </tr>
      <tr>
        <td><b style="font-size:12px;text-align:right;">User</b> <span style="position:absolute;right:143px;"> :{{Auth::user()->name}} </span></td>
      </tr>
      <?php
      $date = date('d-m-Y');
      date_default_timezone_set("Asia/Karachi");
      ?>
      <tr>
        <td><b style="font-size:12px;text-align:right;">Run Date</b> : <?php if(isset($run_date)){ echo $run_date; } ?> &nbsp;&nbsp;&nbsp;  {{date('h:i:a')}}</td>
      </tr>
    </table>
  <table width="65%" style="text-align: center;">
    <tr>
      <td width="10%" style="font-size:12px;"><b>Date: </b></td>
      <td  style="text-align:left;"><?php if(isset($start_date)){ echo date('d-m-Y',strtotime($start_date)) ; } ?>
      </td>
      <td  width="30%">To</td><br>
      <td width="10%" style="font-size:12px;"><b>Date:</b> </td>
      <td  style="text-align:left;"><?php if(isset($end_date)){ echo date('d-m-Y',strtotime($end_date)) ; } ?></td>
    </tr>
  </table>
  @if(($BiltyType!="")) 
 <table width="50%" style="text-align: right;padding-top:-10px !important;">
    <tr>
      <td width="25%" style="font-size:12px;"><b>Bilty Type:</b></td>
      <td  style="text-align:left;"><?php if(isset($BiltyType)){ echo $BiltyType; }?>
      </td>
    </tr>
  </table>
    @endif
        @if(($vehiclename!="")) 
    <table width="65%" style="text-align: center;">
    <tr>
      <td width="25%" style="font-size:12px;"><b>Vehicle Name:</b></td>
      <td  style="text-align:left;"><?php if(isset($vehiclename)){ echo $vehiclename; }?>
      </td>
    </tr>
  </table>
  @endif
  
  <table width="105%" style="text-align: center;">
  
      <tr>
        <th bgcolor="#c7c3c3" width="6%"  style="border:2px solid #c7c3c3;">C.No</th>
        <th bgcolor="#c7c3c3" width="15%" style="border:2px solid #c7c3c3;">Sender Name</th>
        <th bgcolor="#c7c3c3" width="15%" style="border:2px solid #c7c3c3;">Receiver  Name</th>
        <th bgcolor="#c7c3c3" width="8%"  style="border:2px solid #c7c3c3;">B.No</th>
        <th bgcolor="#c7c3c3" width="10%" style="border:2px solid #c7c3c3;">Qty</th>
        <th bgcolor="#c7c3c3" width="10%" style="border:2px solid #c7c3c3;">Rent</th>
        <th bgcolor="#c7c3c3" width="10%" style="border:2px solid #c7c3c3;">Total</th>
        <th bgcolor="#c7c3c3" width="10%" style="border:2px solid #c7c3c3;">Advance</th>
        <th bgcolor="#c7c3c3" width="10%" style="border:2px solid #c7c3c3;">Balance</th>
      </tr>
   
    <tbody>
@php 
 $pagechange = 0;
@endphp
     @if(isset($biltydata))
         @php
         $quantity = 0;
         $rent = 0;
         $totalcharges = 0;
         $advance = 0;
         $balance = 0;
      
         @endphp
         @foreach($biltydata as $value)
          @php
          $pagechange += 1;
        if(isset($value->getbiltymeta[0]))
        {
         $quantity += $value->getbiltymeta[0]->quantity;
         }
         $rent += $value->rent;
         $totalcharges += $value->total_charges;
         $advance += $value->advance;
         $balance +=$value->balance;
         @endphp
      <tr>
        
      <td width="6%" style="border:2px solid #c7c3c3;">{{$value->id ??''}}</td>
     @if(isset($value->getsender[0]))
      <td width="15%" style="border:2px solid #c7c3c3;">{{$value->getsender[0]->customer_name}}</td>
      @endif
       @if(!isset($value->getsender[0]))
        <td style="border:2px solid #c7c3c3;"></td>
      @endif
       @if(isset($value->getreceiver[0]))
       <td width="15%" style="border:2px solid #c7c3c3;">{{$value->getreceiver[0]->customer_name}}</td>
       @endif
         @if(!isset($value->getreceiver[0]))
       <td width="15%"style="border:2px solid #c7c3c3;"></td>
       @endif
     <td  width="10%" style="border:2px solid #c7c3c3;">{{$value->getbiltymeta[0]->quantity ??''}}</td>
      <td width="8%" style="border:2px solid #c7c3c3;">{{$value->bilty_no ??''}}</td>
      <td width="10%" style="border:2px solid #c7c3c3;">{{$value->rent ??''}}</td>
      <td width="10%" style="border:2px solid #c7c3c3;">{{$value->total_charges ??''}}</td>
      <td width="10%" style="border:2px solid #c7c3c3;">{{$value->advance ??''}}</td>
      <td width="10%" style="border:2px solid #c7c3c3;">{{$value->balance ??''}}</td>
      </tr>
      @if($pagechange==39)   
      <div class="page-break"></div>
    </tbody>

  </table>
<!--   <div class="footer" style="font-size:10px;bottom:0px;text-align: center;position:fixed;">
  <i><u >TRANSPORT MANAGEMENT SYSTEM</u></i>
</div> -->
   <div style="width:200%;">
            <img src="{{ url("public/images/MGT_LOGO-1.png") }}" width="1500%">
      </div>     
    <table width="100%" align="right" >
      <tr>
        <td ><b style="font-size:12px;margin-left:-40px !important">Module</b><span> : Challan</span></td>
      </tr>
      <tr>
        <td><b style="font-size:12px;text-align:right;">User</b> <span style="position:absolute;right:143px;"> :{{Auth::user()->name}} </span></td>
      </tr>
      <?php
      $date = date('d-m-Y');
      date_default_timezone_set("Asia/Karachi");
      ?>
      <tr>
        <td><b style="font-size:12px;text-align:right;">Run Date</b> : <?php if(isset($run_date)){ echo $run_date; } ?> &nbsp;&nbsp;&nbsp;  {{date('h:i:a')}}</td>
      </tr>
    </table>
  <table width="65%" style="text-align: center;">
    <tr>
      <td width="10%" style="font-size:12px;"><b>Date: </b></td>
      <td  style="text-align:left;"><?php if(isset($start_date)){ echo date('d-m-Y',strtotime($start_date)) ; } ?>
      </td>
      <td  width="30%">To</td><br>
      <td width="10%" style="font-size:12px;"><b>Date:</b> </td>
      <td  style="text-align:left;"><?php if(isset($end_date)){ echo date('d-m-Y',strtotime($end_date)) ; } ?></td>
    </tr>
  </table>
  @if(($BiltyType!="")) 
 <table width="50%" style="text-align: right;padding-top:-10px !important;">
    <tr>
      <td width="25%" style="font-size:12px;"><b>Bilty Type:</b></td>
      <td  style="text-align:left;"><?php if(isset($BiltyType)){ echo $BiltyType; }?>
      </td>
    </tr>
  </table>

    @endif
     
     @if(($vehiclename!=""))     
    <table width="65%" style="text-align: center;">
    <tr>
      <td width="25%" style="font-size:12px;"><b>Vehicle Name:</b></td>
      <td  style="text-align:left;"><?php if(isset($vehiclename)){ echo $vehiclename; }?>
      </td>
    </tr>
  </table>
 @endif

  <table width="105%" style="text-align: center;">
    <tbody>
       <tr>
        <th bgcolor="#c7c3c3" width="6%"  style="border:2px solid #c7c3c3;">C.No</th>
        <th bgcolor="#c7c3c3" width="15%" style="border:2px solid #c7c3c3;">Sender Name</th>
        <th bgcolor="#c7c3c3" width="15%" style="border:2px solid #c7c3c3;">Receiver  Name</th>
        <th bgcolor="#c7c3c3" width="8%"  style="border:2px solid #c7c3c3;">B.No</th>
        <th bgcolor="#c7c3c3" width="10%" style="border:2px solid #c7c3c3;">Qty</th>
        <th bgcolor="#c7c3c3" width="10%" style="border:2px solid #c7c3c3;">Rent</th>
        <th bgcolor="#c7c3c3" width="10%" style="border:2px solid #c7c3c3;">Total</th>
        <th bgcolor="#c7c3c3" width="10%" style="border:2px solid #c7c3c3;">Advance</th>
        <th bgcolor="#c7c3c3" width="10%" style="border:2px solid #c7c3c3;">Balance</th>
      </tr>
       @php
       $pagechange= 0;
        @endphp
      @endif
    @endforeach
    @endif
    </tbody>
        <tfoot >
         <tr>
      <th bgcolor="#c7c3c3" id="total" colspan="3">Total</th>
      <td bgcolor="#c7c3c3">{{$count ??''}}</td>
      <td bgcolor="#c7c3c3">{{$quantity ??''}}</td>
      <td bgcolor="#c7c3c3">{{$rent??''}}</td>
      <td bgcolor="#c7c3c3">{{$totalcharges??''}}</td>
      <td bgcolor="#c7c3c3">{{ $advance??''}}</td>
      <td bgcolor="#c7c3c3">{{ $balance??''}}</td>
        </tr>
      </tfoot>
    
      
  </table>
<!-- <div class="footer" style="font-size:10px;bottom:0px;text-align: center;position:fixed;bottom:0px;margin-bottom: -100px;">
  <i><u >TRANSPORT MANAGEMENT SYSTEM</u></i>
</div> -->
</body>

</html>
