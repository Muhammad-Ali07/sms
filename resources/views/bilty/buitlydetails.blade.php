
@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')

 @include('includes.mobile-nav')
 <div class="flex">

        <!-- BEGIN: Side Menu -->
    @include('includes.side-nav')

           <!-- BEGIN: Content -->
      <div class="content">
   <!-- BEGIN: Top Bar -->
   <div class="top-bar">
      <!-- BEGIN: Breadcrumb -->
      <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Bilty Details</a> </div>
      <!-- END: Breadcrumb -->
   </div>
   <style>
        div#printableArea1234 * {
    font-family: 'Roboto' !important;
    font-weight: 500;
    text-transform: capitalize;
}

.printableArea123 {
    background: #6c0606;
    color: #ffff;
    position: relative;
    top: 8px;
}
   </style>

   <div class="col-sm-12">
   <div class="panel panel-bd">
   <div id="printableArea">
      <div class="panel-body">
           <div id="printableArea1234">
          <?php
$path = asset("src");

            $sql = DB::table('now_builty')
            ->where('id',$builtyid)
            ->first();

        $builtyid = $sql->id;
         $customer = $sql->customer;
         $date = $sql->date;
         $refno = $sql->refno;
         $from = $sql->from;
         $to = $sql->to;
         $refno = $sql->refno;
         $deliverymode = $sql->deliverymode;
         $note = $sql->note;
         $Language= $sql->Language;
         $Builtytype = $sql->Builtytype;
         $receivername = $sql->receivername;
         $receiverphone = $sql->receiverphone;
         $sendername = $sql->sendername;
         $senderphone = $sql->senderphone;
?>


                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: Input -->
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-base mr-auto">
                                        Add Details
                                    </h2>
                                    <!--                            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                              <label class="form-check-label ml-0 sm:ml-2" for="show-example-1">Show example code</label>
                              <input id="show-example-1" data-target="#input" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                              </div> -->
                                </div>
                                <div class="print_bilty">
                                    <div class="print_top">
                                        <div class="top_left_">
                                            <h6>OFFICE'S COPY</h6>
                                            <p>TRANSIT RECIEPT </p>
                                            <p>SNTN:5215306-4</p>
                                        </div>
                                        <div class="top_mid">
                                            <img src="{{asset('src/images/logo.png')}}" alt="">
                                            <p>
                                                Head Ofﬁce: Plot No. A-353, Street No.1, Gate No. 5, Quaid-e-Azam<br> Truck Stand, Hawks Bay Road, Karachi, Pakistan.<br> 92-21-32350818-19-20-92 92-21-32350761 0307-2222839, 0302-8296688<br> www.nsk.com.pk
                                                nskg_trco1@yahoo.com
                                            </p>
                                        </div>
                                        <div class="top_right_">
                                            <ul>
                                                <li>
                                                    <h5>GR NO.:
                                                        <span><input type="text"  value="{{$builtyid}}" placeholder=""></span>
                                                    </h5>
                                                </li>
                                                <li>
                                                    <h5>Date:
                                                        <span><input type="text" value="{{$date}}" placeholder=""></span>
                                                    </h5>
                                                </li>
                                                <li>
                                                    <h5>Vehicle NO.:
                                                        <span><input value="{{$refno}}"  type="text" placeholder=""></span>
                                                    </h5>
                                                </li>
                                                <li>
                                                    <h5>Bilty NO.:
                                                        <span><input  value="{{$builtyid}}"  type="text" placeholder=""></span>
                                                    </h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--print_top close-->
                                    <div class="print_mid">
                                        <div class="mid_left">
                                            <div class="per_detail">
                                                <div class="per_left">
                                                    <h5>Sender Name:
                                                        <span><input type="text" value="{{$sendername}}" placeholder=""></span>
                                                    </h5>
                                                </div>
                                                <div class="per_right">
                                                    <h5>Reciver Name:
                                                        <span><input type="text" value="{{$receivername }}" placeholder=""></span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <!--per_detail close-->
                                            <div class="per_detail">
                                                <div class="per_left">
                                                    <h5>Sender phone#:
                                                        <span><input type="text" value="{{$senderphone}}" placeholder=""></span>
                                                    </h5>
                                                </div>
                                                <div class="per_right">
                                                    <h5>Reciver phone#:
                                                        <span><input type="text" value="{{$receiverphone }}" placeholder=""></span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <!--per_detail close-->
                                            <div class="per_detail">
                                                <div class="per_left">
                                                    <h5>From
                                                        <?php
                                                        $fromstation = DB::table('now_station')
                                                        ->where('id',$from)
                                                        ->first();
                                                        ?>

                                                        <span><input type="text"  value="{{$fromstation->name}}" placeholder=""></span>
                                                    </h5>
                                                </div>
                                                <div class="per_right">
                                                    <h5>To
                                                     <?php
                                                        $tostation = DB::table('now_station')
                                                        ->where('id',$to)
                                                        ->first();

                                                        ?>
                                                        <span><input type="text"  value="{{$tostation->name}}" placeholder=""></span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <!--per_detail close-->
                                        </div>
                                        <!--mid_left close-->
                                        <div class="mid_right" style='display:none'>
                                            <img src="{{asset('src/images/qrcode.png')}}" alt="">
                                        </div>
                                        <!--mid_right close-->
                                    </div>
                                    <!--print_mid close-->
                                    <div class="print_bottom">
                                        <table>
                                            <thead>
                                                <th>Quantity</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Weight(KG)</th>
                                                <th>Type</th>
                                                <th>Rate</th>
                                            </thead>
                                            <tbody class="new_entry">
                                                <?php
                                                    $sql1 = DB::table('now_builtyitems')
                                                    ->where('builtyid',$builtyid)
                                                    ->get();
                                                    $i = 0;
                                                    ?>

                                                     <tr>
                                                    <td>


                                                        @foreach($sql1 as $quantity)
                                                        <input type="text" value="{{$quantity->quantity}}">
                                                        @endforeach
                                                    </td>
                                                    <td>

                                                        <input type="text" value="{{$quantity->quantity}}">

                                                    </td>
                                                    <td>

                                                       @foreach($sql1 as $des)
                                                        <input type="text" value="{{$des->brand}}">
                                                        @endforeach
                                                    </td>
                                                    <td>

                                                        @foreach($sql1 as $weight)
                                                        <input type="text" value="{{$weight->weight}}">
                                                        @endforeach
                                                    </td>
                                                    <td>

                                                        <input type="text" value="{{$Builtytype}}">

                                                    </td>
                                                    <td>
                                                    @foreach($sql1 as $rate)
                                                        <input type="text" value="{{$rate->rate}}">
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="station_details">
                                            <div class="details_left">
                                                <ul>


                                                <li>
                                                    From

                                                    <div class="stat_left">
                                                        {{$fromstation->name}}
                                                    </div>
                                                    <div class="stat_right">
                                                       <?php
                                                       $now_phone = DB::table('now_phone')
                                                    ->where('customerid',$from)
                                                    ->where('type','station')
                                                    ->get();
                                                    ?>

                                                        @foreach($now_phone as $fromphone)
                                                        {{$fromphone->phone}} <BR>
                                                        @endforeach
                                                    </div>
                                                </li>
                                                 <li>
                                                     To
                                                    <div class="stat_left">
                                                       {{$tostation->name}}
                                                    </div>
                                                    <div class="stat_right">

                                                       <?php
                                                       $now_phone1 = DB::table('now_phone')
                                                    ->where('customerid',$to)
                                                    ->where('type','station')
                                                    ->get();
                                                    ?>

                                                        @foreach($now_phone1 as $fromphone1)
                                                        {{$fromphone1->phone}} <BR>
                                                        @endforeach






                                                    </div>
                                                </li>
                                                <!--<li>-->
                                                <!--    <div class="stat_left">-->
                                                <!--        Tanke-->
                                                <!--    </div>-->
                                                <!--    <div class="stat_right">-->
                                                <!--        0963-511125<br>-->
                                                <!--        0300-5662211-->
                                                <!--    </div>-->
                                                <!--</li>-->
                                                <!--<li>-->
                                                <!--    <div class="stat_left">-->
                                                <!--        Karkh-->
                                                <!--    </div>-->
                                                <!--    <div class="stat_right">-->
                                                <!--        0334-8680632<br>-->
                                                <!--        0300-5662211-->
                                                <!--    </div>-->
                                                <!--</li>-->
                                                <!--<li>-->
                                                <!--    <div class="stat_left">-->
                                                <!--        Bhakar-->
                                                <!--    </div>-->
                                                <!--    <div class="stat_right">-->
                                                <!--        0334-7041566<br>-->
                                                <!--        0300-5662211-->
                                                <!--    </div>-->
                                                <!--</li>-->
                                                <!--<li>-->
                                                <!--    <div class="stat_left">-->
                                                <!--        Saray Noor Rang-->
                                                <!--    </div>-->
                                                <!--    <div class="stat_right">-->
                                                <!--        0969-350478<br>-->
                                                <!--        0300-5662211-->
                                                <!--    </div>-->
                                                <!--</li>-->
                                                <!--<li>-->
                                                <!--    <div class="stat_left">-->
                                                <!--        Kohat-->
                                                <!--    </div>-->
                                                <!--    <div class="stat_right">-->
                                                <!--        0343-9245305<br>-->
                                                <!--        0300-5662211-->
                                                <!--    </div>-->
                                                <!--</li>-->
                                                <!--<li>-->
                                                <!--    <div class="stat_left">-->
                                                <!--        Dairah Ismail Khan-->
                                                <!--    </div>-->
                                                <!--    <div class="stat_right">-->
                                                <!--        0966-733785<br> 0346-3437147-->
                                                <!--    </div>-->
                                                <!--</li>-->
                                                <!--<li>-->
                                                <!--    <div class="stat_left">-->
                                                <!--        Banoh-->
                                                <!--    </div>-->
                                                <!--    <div class="stat_right">-->
                                                <!--        0928-612728<br> 0928-612628-->
                                                <!--    </div>-->
                                                <!--</li>-->
                                                <!--<li>-->
                                                <!--    <div class="stat_left">-->
                                                <!--        Mardan-->
                                                <!--    </div>-->
                                                <!--    <div class="stat_right">-->
                                                <!--        0345-1021010<br>-->
                                                <!--        0300-5662211-->
                                                <!--    </div>-->
                                                <!--</li>-->
                                                <!--<li>-->
                                                <!--    <div class="stat_left">-->
                                                <!--        DG Road Peshaware-->
                                                <!--    </div>-->
                                                <!--    <div class="stat_right">-->
                                                <!--        0305-900031<br>-->
                                                <!--        0300-5662211-->
                                                <!--    </div>-->
                                                <!--</li>-->
                                                <!--<li>-->
                                                <!--    <div class="stat_left">-->
                                                <!--        Hashim Gharhi Peshaware-->
                                                <!--    </div>-->
                                                <!--    <div class="stat_right">-->
                                                <!--        0333-2652333<br>-->
                                                <!--        0300-5662211-->
                                                <!--    </div>-->
                                                <!--</li>-->
                                            </ul>
                                            </div>
                                            <div class="details_right">
                                                <p>Branch Kharadar GK6(B-98,G3,G4) near machi miani market Gialana Road Kharadar Karachi</p>
                                            </div>
                                        </div>
                                        <div class=".positon-relative btn btn-primary mt-5 add">
                                            <a href="#">Add More</a>
                                        </div>
                                    </div>
                                    <!--pribt-botttom close-->
                                </div>
                                <!--print_bilty close-->
                            </div>
                            <!-- END: Input -->
                            <!-- BEGIN: Input Sizing -->
                        </div>



</div>
   <!--printableArea close-->
      <div class="panel-footer text-left">
         <a class="btn btn-danger" href="https://asaanapps.com/aida/Cinvoice">Cancel</a>
         <button class="btn btn-info printableArea123">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
         </button>
      </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.3.3/jQuery.print.min.js"></script>
   <script>
$('.printableArea123').on('click', function() { // select print button with class "print," then on click run callback function
  $.print("#printableArea1234"); // inside callback function the section with class "content" will be printed
});
   </script>

@endsection

