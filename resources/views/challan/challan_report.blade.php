@extends('layouts.master')
@section('body') main @endsection
@section('main-content')
@include('includes.mobile-nav')
<div class="flex">
@include('includes.side-nav')

<!-- BEGIN: Content -->
<div class="content">
    <?php
   $sql = DB::table('challan')->where('id',$id)->first();
   $challanid       = $sql->id;
   $challanper       = $sql->station_per;
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
   $selfcompanyc = DB::table('selfcompany')->where('id',$sql->selfcompany)->first();
   if($selfcompanyc != '')
        $companylogo = asset("selfcompany_image/".$selfcompanyc->logo);
    else
        $companylogo = asset('selfcompany_image/logo.png');
  
   ?>
   
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
                           <td>92-21-32350818-19-20</td>
                        </tr>
                        <tr>
                           <td>92-21-32350761</td>
                        </tr>
                        <tr>
                           <td>0307-2222839</td>
                        </tr>
                        
                         <tr>
                           <td>0302-8296688</td>
                        </tr>
                        
                     </table>
                  </div>
                  <!-- col-sm-2 close -->
                  <div class="col-sm-8 mid-level-text" style="text-align: center;font-weight: 500;display:inline-block;vertical-align: top;width: 450px;">
                     <img src="{{$companylogo}}" alt="" style="width: 100%;max-width: 150px;margin: 0 auto;margin-bottom: 10px;">
                     <h4>Head Office: Plot No. A-353, Street No.1, Gate No. 5, Quaid-e-Azam</h4>
                     <h6>Truck Stand, Hawks Bay Road, Karachi, Pakistan.</h6>
                     <h6>92-21-32350818-19-20,  92-21-32350761 0307-2222839, 0302-8296688
www.nsk.com.pk     nskg_trco1@yahoo.com</h6>
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
                        <td><b style="width: 230px;">Goods booked from {{$from ? $from->name : ''}} to {{$to ? $to->name : ''}}</td>
                        <td><b>Broker Name</b> {{ $broker}}</td>
                     </tr>
                     <tr>
                        <td><b>Date</b>  {{$challandate}}</td>
                        <td><b>Mobile</b> {{$mobileno}}</td>
                     </tr>
                     <tr>
                        <td><b>Truck No</b> {{ $truckno }}</td>
                     </tr>
                     <tr>
                         <td><b>Notes:</b> {{ $sql->notes }}</td>
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
                        <th style="width: 70px;">Builty Type</th>
                        <th>Supply</th>
                        <th>Rent</th>
                     </tr>
                     <?php
                        $totalsupply = [];
                        $totalrent = [];
                        $total = [];
                        $otherdetail = null;
                        $otheramount = null; 
                        $list = DB::table('now_challanlist')->where('challanid',$challanid)->get();
                        
                        foreach($list as $sql1){
                            
                        $otherdetail = $sql->other_detail;
                        $otheramount = $sql->other_amount;
                            $sql2 = DB::table('now_builty')->join('now_station','now_builty.to','now_station.id')->where('now_builty.id',$sql1->trno)->select('now_builty.*','now_station.*','now_builty.id as idd')->first();
                            
                            if(!empty($sql2)){
                                    $receivername =  $sql2->receivername;
                                    $sendername =  $sql2->sendername; 
                                    
                                    $sql3 = DB::table('now_builtyitems')->where('builtyid',$sql1->trno)->first();
                                    
                                    if(!empty($sql3->supplier)){
                                        $totalsupply[] = $sql3->supplier;  
                                    }
                                    
                                    if($sql2->Builtytype == 'Paid' ){
                                        // $total[] = $sql3->rate;
                                    }else{
                                        //  $total[] = ($sql3) ? ($sql2->total - $sql2->local_freight - $sql2->labour - $sql2->other) : NULL ;
                                         $total[] = ($sql3) ? ($sql2->total) : NULL ;
                                    }
                                
                                   ?>
                     <tr>
                         <td>{{$sql2->builty_id}} <input type='hidden' name="builties[]"  value="{{$sql2->idd}}"/> </td>
                        <td>{{$sendername}}</td>
                        <td>{{$receivername}}</td>
                        <td>{{$sql2->name}}</td>
                        <td> {{ ($sql3) ? $sql3->quantity : NULL }} <?php  // !empty($sql3->quantity) ? $sql3->quantity : ''; ?>  </td>
                        <td> {{ ($sql3) ? $sql3->brand : NULL }} <?php // !empty($sql3->brand) ? $sql3->brand : ''; ?> </td>
                        <td> {{$sql2->Builtytype}} </td>
                        <td> @php $suppliercharges =  ($sql3 ) ? $sql3->supplier : NULL;  @endphp  <input type='text' name="sp[]" class="suppliers" style='text-align: center;width: 30px;' value="{{$suppliercharges}}"/> </td>
                        <td>
                            
                           @if(!empty($sql2->Builtytype) && $sql2->Builtytype == 'Paid')
                           -----------
                           @else
                           {{-- ($sql3) ?  ($sql2->total - $sql2->local_freight - $sql2->labour - $sql2->other)    : NULL --}}
                           {{ $sql3 ? $sql2->total : NULL }}
                           @endif   
                        </td>
                     </tr>
                            <?php    
                            }else{
                                
                               ?>
                                    <?php
                            }
                            
                            
                            
                            
                            
                             } 
                        $nettotalsupply  = array_sum($totalsupply);
                        $nettotalrent    = array_sum($total);
                        $deliverycharges = $sql->DeliveryCharges;
                        $VehicleRent     = $sql->VehicleRent;
                        $tt              = $nettotalrent * $challanper / 100;
                        ?>
                     <tr>
                        <td  colspan='7'>{{-- $nettotalsupply --}}</td>
                        <td colspan='6'>@if($tt) {{$tt}} @else {{$nettotalrent}}  @endif</td>
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
                        <td> <input style='text-align: center;width: 30px;' type='text' id='dc' value="{{$deliverycharges}}"/> </td>
                     </tr>
                     <tr>
                        <td>Freight</td>
                        <td> <input type='text' style='text-align: center;width: 30px;' id='freight' value="{{$VehicleRent ?? 0}}"/> </td>
                    
                     </tr>
                     <tr>
                       <td> <input type='text' style='text-align: center;width: 30px;'  id='otherdetail' value="{{($otherdetail != '' ? $otherdetail : 'Other')}}"/> </td>
                        <td> <input type='text' style='text-align: center;width: 30px;' id='otheramount' value="{{$otheramount}}"/> </td>
                     </tr>
                     <?php 
                    //  dd($nettotalrent,$otheramount,$nettotalsupply,$deliverycharges,$VehicleRent);
                    // dd($nettotalrent , ($otheramount ?? 0) , $nettotalsupply ,  $deliverycharges , ($VehicleRent ?? 0));
                        $netreceivableamount = $nettotalrent - ($otheramount ?? 0) - $nettotalsupply -  $deliverycharges - ($VehicleRent == '' ? 0 : $VehicleRent);
                        // $netreceivableamount=12;
                        ?> 
                        
                         <tr>
                        <td>Katoti</td>
                        <td><input type='text' style='text-align: center;width: 30px;' id='katotiamount' onchange="calculate_katoti()" value=""/>
                            <input type='hidden'   id='net_amount' value="{{$netreceivableamount}}"/>
                        </td>
                     </tr>
                     
                     <tr>
                        <td>Net Amount</td>
                        <td id="net_amount_after">{{$netreceivableamount}}</td>
                     </tr>
                  </table>
               </div>
               <div class="mallkichori" style="margin-top: 5px;">
                  Both the driver and the truck owner of the company will be responsible for delivering the goods to their destination in the right way.
                  <br>
                  Both the driver and the owner will be responsible until the return receipt of the goods is delivered to the company.<br>
                  <b>Note:</b> I have read the terms and conditions and I agree with them and sign them. 
               </div>
               <div class="border-line" style="display: inline-block;width: 25%">
                  Signature <br> Booking Clerk
               </div>
               
               <div class="center-line" style="text-align: center;width: 48%;display: inline-block;margin-top: 18px;">
                   Note <br> <textarea style="width: 90%;" id="notesdetails">{{ $sql->notes }}</textarea>
               </div>
               <!--printViewHeader_table close-->
               <div class="border-line" style="float: left;width: 25%;display: inline-block;">
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
   <a class="printableArea123 btn btn-info" href="javascript:void(0)" >
   Print
   </a>
   
   <a class="updatechallan btn btn-info" href="javascript:void(0)" >
   Update
   </a>
   
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.3.3/jQuery.print.min.js"></script>
<script>
   $('.printableArea123').on('click', function() { 
   
   // select print button with class "print," then on click run callback function
   $.print("#printableArea"); // inside callback function the section with class "content" will be printed
   });
   
   
    $('.updatechallan').click(function(){
        
        var id = "{{$challanid}}";
        var dc = $('#dc').val();
        var freight = $('#freight').val();
        var otheramount = $('#otheramount').val();
        var otherdetail = $('#otherdetail').val();
        var suppliers = $('').each();
        var notes = $('#notesdetails').val();
       
        
        var sp = $("input[name='sp[]']")
              .map(function(){return $(this).val();}).get();
              
        var builties = $("input[name='builties[]']")
              .map(function(){return $(this).val();}).get();
              
    
        // console.log(sp);
       
        $.ajax({
            type:'GET',
            url:'<?php echo url('/') ?>/update-challan',
            data:{id:id,dc:dc,freight:freight,otheramount:otheramount,otherdetail:otherdetail,sp:sp,builties:builties,notes:notes},
            success:function(res){
                location.reload();
            }
        });
        
    });
    
    function calculate_katoti(){
        console.log(1212)
        katotiamount = $('#katotiamount').val()
        net_amount = $('#net_amount').val()
        
        net_amount_after = net_amount - katotiamount;
        
          $('#net_amount_after').html(net_amount_after)
    }
    
</script>


   

@endsection