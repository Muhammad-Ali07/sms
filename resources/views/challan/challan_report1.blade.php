<?php
   $sql = DB::table('challan')->where('id',$id)->first();
   
   $challanid       = $sql->id;
   $challandate     = $sql->date;
   $challandriver   = $sql->driver;
   $loadername      = $sql->loadername;
   $dispatchtime    = $sql->dispatchtime;
   $containerno     = $sql->containerno;
   $containerseal   = $sql->containerseal;
   $truckno         = $sql->vehicle_id;
   $challanfrom     = $sql->from_station;
   $challanto       = $sql->to_station;
   $mobileno        = $sql->mobile_no;
   $broker          = $sql->broker;
   
   $from = DB::table('now_station')->where('id',$challanfrom)->first();
   $to = DB::table('now_station')->where('id',$challanto)->first();
   ?>
@extends('layouts.master')
@section('body') main @endsection
@section('main-content')
@include('includes.mobile-nav')
<div class="flex">
@include('includes.side-nav')
<!-- BEGIN: Content -->
<div class="content">
<!-- BEGIN: Top Bar -->
<div class="top-bar"></div>
<div class="col-sm-12">
<div class="panel panel-bd">
<div id="printableArea">
   <div class="panel-body">
      <div class="printView">
         <div class="printViewHeader">
            <div class="col-sm-12">
               <div class="panel panel-bd">
                  <div class="col-sm-2" style="width: 130px;display:inline-block;vertical-align: top;">
                     <table>
                        <tr>
                           <td>Phone:</td>
                        </tr>
                        <tr>
                           <td>021-32351080-82</td>
                        </tr>
                        <tr>
                           <td>0333-3789114</td>
                        </tr>
                        <tr>
                           <td>0315-2132811</td>
                        </tr>
                     </table>
                  </div>
                  <!-- col-sm-2 close -->
                  <div class="col-sm-8 mid-level-text" style="text-align: center;font-weight: 500;display:inline-block;vertical-align: top;width: 500px;">
                     <img src="{{asset('src/images/logo.png')}}" alt="" style="width: 100%;max-width: 150px;margin: 0 auto;margin-bottom: 10px;">
                     <h4>khaleel Market Near Quaid-e-Azam truck Stand Main Hawks Bay Road Karachi 75750</h4>
                     <h6>Service: Goods Transportation, Containerized Movement, Warehousing, Mazda Truck/High Wall Truck/Trailers/Crane,Rental Solution</h6>
                     <h6>Please Contact 03333-3789114, Nowshera-union@hotmail.com,<br> fakherparcha@gmail.com, facebook.com/NUGT.khi</h6>
                  </div>
                  <!-- col-sm-2 close -->
                  <div class="col-sm-2" style="width: 130px;display:inline-block;vertical-align: top;float: right;">
                     <table>
                        <tr>
                           <td>No.  <br> {{ $challanid }}</td>
                        </tr>
                        <tr>
                           <td>Date:  {{ $challandate }}</td>
                        </tr>
                        <tr>
                           <td>Truck No: {{ $truckno }}</td>
                        </tr>
                        <tr>
                           <td style="border: none;text-transform: uppercase;"><b style="font-size: 17px;">Orignal</b></td>
                        </tr>
                     </table>
                  </div>
                  <!-- col-sm-2 close -->
               </div>
               <!-- panel panel-bd close -->
               <br>
               <div class="printViewHeader_Second">
                  <table>
                     <tr>
                        <td><b>Chalan No</b> {{$challanid}}</td>
                        <td><b>Driver Name</b> {{$challandriver}}</td>
                     </tr>
                     <tr>
                        <td><b style="width: 230px;">Goods booked from {{$from->name}} to {{$to->name}}</td>
                        <td><b>Broker Name</b> {{ $broker}}</td>
                     </tr>
                     <tr>
                        <td><b>Date</b>  {{$challandate}}</td>
                        <td><b>Mobile</b> {{$mobileno}}</td>
                     </tr>
                     <tr>
                        <td><b>Truck No</b> {{ $truckno }}</td>
                     </tr>
                  </table>
               </div>
               <!--printViewHeader_Second close-->
               <br>
               <div class="printViewHeader_table">
                  <table>
                     <tr>
                        <th>Bilty Number</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Station</th>
                        <th>Qauntity</th>
                        <th>Description</th>
                        <th>Builty Type</th>
                        <th>Supply</th>
                        <th>Rent</th>
                     </tr>
                    <?php
                        $totalsupply = [];
                        $totalrent = [];
                        $total = [];
                        $list = DB::table('now_challanlist')->where('challanid',$challanid)->get();
               
                        foreach($list as $sql1){
           
                            $sql2 = DB::table('now_builty')->join('now_station','now_builty.to','now_station.id')->where('now_builty.id',$sql1->trno)->first();
                            $receivername =  $sql2->receivername;
                            $sendername =  $sql2->sendername; 
                            
                            $sql3 = DB::table('now_builtyitems')->where('builtyid',$sql1->trno)->first();
                        
                            if(!empty($sql3->supplier)){
                                $totalsupply[] = $sql3->supplier;  
                            }
                            
                            if($sql2->Builtytype == 'Paid' ){
                                // $total[] = $sql3->rate;
                            }else{
                                 $total[] = $sql3->rate;
                            }
                    ?>
                
                     <tr>
                        <td>{{$sql1->trno}}</td>
                        <td>{{$sendername}}</td>
                        <td>{{$receivername}}</td>
                        <td>{{$sql2->name}}</td>
                        <td> {{ $sql3->quantity }} <?php  // !empty($sql3->quantity) ? $sql3->quantity : ''; ?>  </td>
                        <td> {{ $sql3->brand }} <?php // !empty($sql3->brand) ? $sql3->brand : ''; ?> </td>
                        <td> {{$sql2->Builtytype}} </td>
                        <td> {{ $sql3->supplier }} <?php  // !empty($sql3->supplier) ? $sql3->supplier : ''; ?> </td>
                        <td>
                           @if($sql2->Builtytype == 'Paid')
                           -----------
                           @else
                           
                           {{ $sql3->rate }}
                           @endif   
                        </td>
                     </tr>
                     <?php } 
                        $nettotalsupply = array_sum($totalsupply);
                        $nettotalrent = array_sum($total);
                        $deliverycharges = $sql->DeliveryCharges;
                        $VehicleRent= $sql->VehicleRent;
                        
                        ?>
                     <tr>
                        <td  colspan='7'>{{-- $nettotalsupply --}}</td>
                        <td colspan='6'>{{$nettotalrent}}</td>
                     </tr>
                  </table>
                  <BR>
                  <table border="2">
                     <tr>
                        <td> Total </td>
                        <td>{{$nettotalrent}}</td>
                     </tr>
                     <tr>
                        <td> Supply </td>
                        <td>{{$nettotalsupply}}</td>
                     </tr>
                     <tr>
                        <td>Delivery Charges </td>
                        <td>{{$deliverycharges}}</td>
                     </tr>
                     <tr>
                        <td>Freight</td>
                        <td>{{$VehicleRent}}</td>
                     </tr>
                     <?php 
                        $netreceivableamount = $nettotalrent + $nettotalsupply-  $deliverycharges - $VehicleRent  ;
                        ?>   
                     <tr>
                        <td>Net Amount</td>
                        <td>{{$netreceivableamount}}</td>
                     </tr>
                  </table>
               </div>
               <div class="mallkichori" style="margin-top: 5px;">
                  Both the driver and the truck owner of the company will be responsible for delivering the goods to their destination in the right way.
                  <br>
                  Both the driver and the owner will be responsible until the return receipt of the goods is delivered to the company.<br>
                  <b>Note:</b> I have read the terms and conditions and I agree with them and sign them. 
               </div>
               <div class="border-line">
                  Signature <br> Booking Clerk
               </div>
               <!--printViewHeader_table close-->
               <div class="border-line" style="float: left;">
                  Signature <br> Driver
               </div>
               <!--printViewHeader_table close-->
            </div>
            <!-- col-sm-12 close -->
         </div>
         <!-- printViewHeader close -->
      </div>
      <!-- printView close -->
   </div>
   <!-- END: Content -->
</div>
<!-- BEGIN: Dark Mode Switcher-->
<div class="panel-footer text-left">
   <a class="btn btn-info" href="{{route('print-challan-report',['id'=>$challanid])}}" >
   Print
   </a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.3.3/jQuery.print.min.js"></script>
<script>
   $('.printableArea123').on('click', function() { // select print button with class "print," then on click run callback function
     $.print("#printableArea"); // inside callback function the section with class "content" will be printed
   });
</script>
@endsection