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
  .buityid  {
         font-size: 47.183px !important;
     }

.QrCode____img svg {
    width: 360px;
}
</style>
<div class="col-sm-12">
<div class="panel panel-bd">
<div id="printableArea">
<div class="panel-body">
<div id="printableArea1234">
@php
$path  = url("generated-qr/$id");
$qrcode = QrCode::size(400)->generate($path);
@endphp
   <?php
        $path = asset("src");
        $path2 = asset("selfcompany_image");
        $sql = DB::table('now_builty')->where('id',$id)->first();


        $topaytotal =  $sql->total;
        $freight =  $sql->freight;
        $other =  $sql->other;
        $labor =   $sql->labour;
        $localfreight =  $sql->local_freight;
        $builtyid = $sql->id;
        $customer = $sql->customer;
        $date = $sql->date;
        $refno = $sql->refno;
        $selfcompany = $sql->self_company;
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
        $selfcompanyc = DB::table('selfcompany')->where('id',$selfcompany)->first();

      $sql1 = DB::table('now_builtyitems')->where('builtyid',$id)->get();


      $fromstation = DB::table('now_station')
                                //->join('now_phone','now_station.id','now_phone.customerid')
                                ->where('now_station.id',$from)
                                //->where('now_phone.type','station')
                                ->first();

       $fromstationOther = DB::table('now_station')
                                ->join('now_phone','now_station.id','now_phone.customerid')
                                ->where('now_station.id',$from)
                                ->where('now_phone.type','station')
                                ->first();

      $tostation = DB::table('now_station')
                               // ->join('now_phone','now_station.id','now_phone.customerid')
                                ->where('now_station.id',$to)
                                //->where('now_phone.type','station')
                                ->first();

         $tostationOthers = explode(',',$tostation->phones);

      $builtyaddresss = DB::table('biltyaddress')->where('builtyNO',$id)->get();

       $i = 0;
      foreach($sql1 as $items){

        if($Builtytype == 'Paid'){
            $paid = 'Paid';
        }
        else{

         $topaytotal;
        }

        $quant[$i] = $items->quantity;
        $brand[$i] = $items->brand;
        $weight[$i] = $items->weight;
        $i = $i + 1;
      }
// 2300
      echo '<?xml version="1.0" encoding="utf-8"?>
   <!-- Generator: Adobe Illustrator 24.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
   <svg version="1.1" id="Group_3_copy" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
      y="0px" viewBox="50 -70 2380 3508" style="enable-background:new 0 0 2480 3508;" xml:space="preserve">
      <style type="text/css">
         .st0 {
         fill: transparent;
         stroke: #000000;
         stroke-width: 5px;
         }
         .st1{fill:none;stroke:#000000;stroke-width:5;}
         .st2{font-family:"Goldplay-SemiBold";}
         .st3{font-size:75.1461px;}
         .st4{font-size:37.9631px;}
         .st5{font-size:53.5643px;}
         .st6{font-family:"Goldplay-Medium";}
         .st7{font-size:37.5043px;}
         .st8{font-size:34.0627px;}
         .st9{font-family:"Goldplay-Bold";}
         .st10{font-size:37.0017px;}
         .st11{font-size:37.0519px;}
         .st12{font-size:39.5232px;}
         .st13{font-size:24.962px;}
         .st14{font-size:38.0215px;}
         .st15{font-size:20.5833px;}
         .st16{font-size:23.0832px;}
         .st17{fill-rule:evenodd;clip-rule:evenodd;}
         .st18{font-size:34.0832px;}
         .st19{fill:none;stroke:#000000;stroke-width:8;}
         .st20{font-size:45.7637px;}
         .st21{font-size:37.183px;}
         .st22{font-size:42.9035px;}
         .st23{font-size:35.9645px;}
         .st24{fill:#000;}
         .st25{font-size:36.9165px;}
         .st26{font-size:83.333px;}
      </style>
      <image style="overflow:visible;enable-background:new;" width="2480" height="3508" id="Background" xlink:href="'.$path.'/A07A285E.png"  transform="matrix(1 0 0 1 0 5.4894)"></image>
      <g>
         <path id="Rounded_Rectangle_1" class="st0" d="M139.5,58.8H458c27.6,0,50,22.4,50,50l0,0v360.2c0,27.6-22.4,50-50,50H139.5
            c-27.6,0-50-22.4-50-50V108.8C89.5,81.2,111.9,58.8,139.5,58.8z"/>
         <path id="Rounded_Rectangle_2" class="st0" d="M139.5,792.4H2340c27.6,0,50,22.4,50,50l0,0v770.8c0,27.6-22.4,50-50,50H139.5
            c-27.6,0-50-22.4-50-50V842.4C89.5,814.7,111.9,792.4,139.5,792.4L139.5,792.4z"/>
         <path class="st1" d="M88.6,448.6v410.3"/>
         <path class="st1" d="M1974.3,431.5v361.1"/>
         <path class="st1" d="M1975.7,700.3H91.6"/>
        <path id="Shape_3_copy_2" class="st1" d="M1007.1,520.2v182.00"/>
         <path id="Rounded_Rectangle_1_copy_2" class="st0" d="M553.9,58.8h1372.5c27.6,0,50,22.4,50,50v360.3c0,27.6-22.4,50-50,50H553.9
            c-27.6,0-50-22.4-50-50V108.8C503.9,81.2,526.2,58.8,553.9,58.8z"/>
         <foreignObject xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" transform="matrix(1 0 0 1 117.0677 95.7438)" class="st6 st7 QrCode____img" style="position: relative;width: 380px;display: block;font-size: 30px;height: 380px;"><span class="farhan">'.$qrcode.'</span></foreignObject>
         <text id="Sender_Name:_Syed_Saif_Ali_" transform="matrix(1 0 0 1 141.8676 574.9479)" class="st2 st4">Sender Name: '.$sendername.' </text>
         <text id="Sender_Phone_:_" transform="matrix(1 0 0 1 141.8676 661.7985)" class="st2 st4">Sender Phone#: '.$senderphone.' </text>
         <text id="Receiver_Phone_:_" transform="matrix(1 0 0 1 1050.3392 661.7985)" class="st2 st4">Receiver Phone#: '.$receiverphone.' </text>
         <text id="From:_Dusky_Solution" transform="matrix(1 0 0 1 241.8676 756.1735)" class="buityid st2 st4">From: '.(!empty($fromstation->name) ? $fromstation->name : '').' </text>
         <text id="To:_Dusky_Solution" transform="matrix(1 0 0 1 1154.1449 756.1735)" class="buityid st2 st4">To: '.(!empty($tostation->name) ? $tostation->name : '').' </text>
         <text id="_20_KG" transform="matrix(1 0 0 1 1806.2972 967.9908)" class="st2 st5">'.(!empty($weight[0])?$weight[0] : '').'</text>
         <text id="_20_KG_copy" transform="matrix(1 0 0 1 1806.2972 1055.9928)" class="st2 st5">'.(!empty($weight[1])?$weight[1] : '').'</text>
         <text id="_20_KG_copy_2" transform="matrix(1 0 0 1 1806.2972 1149.9928)" class="st2 st5">'.(!empty($weight[2])?$weight[2] : '').'</text>
         <text id="_20_KG_copy_3" transform="matrix(1 0 0 1 1806.2972 1242.9899)" class="st2 st5">'.(!empty($weight[3])?$weight[3] : '').'</text>
         <text id="_20_KG_copy_5" transform="matrix(1 0 0 1 1806.2972 1333.9908)" class="st2 st5">'.(!empty($weight[4])?$weight[4] : '').'</text>
         <text id="_1000_-" transform="matrix(1 0 0 1 2077.2974 974.9928)" class="st2 st4">'.((empty($rate[0]) ? ( $Builtytype != 'To Pay' ) ? '' : 'Freight  : ' .($topaytotal - $localfreight - $labor - $other) : $rate[0])).'</text>
         <text id="_1000_-_copy" transform="matrix(1 0 0 1 2077.2974 1058.9918)" class="st2 st4"> '.((empty($rate[0]) ? ( $Builtytype != 'To Pay' ) ? '' : 'Local : ' .$localfreight : $rate[0])).'</text>
         <text id="_1000_-_copy_2" transform="matrix(1 0 0 1 2077.2974 1148.9899)" class="st2 st4"> '.((empty($rate[0]) ? ( $Builtytype != 'To Pay' ) ? '' : 'Labor : ' .$labor : $rate[0])).'</text>
         <text id="_1000_-_copy_3" transform="matrix(1 0 0 1 2077.2974 1236.9908)" class="st2 st4"> '.((empty($rate[0]) ? ( $Builtytype != 'To Pay' ) ? '' : 'Other : ' .$other : $rate[0])).'</text>
         <text id="_1000_-_copy_5" transform="matrix(1 0 0 1 2077.2974 1470.9928)" class="st2 st4"> '.(!empty($paid) ? $paid : 'Total : ' .$topaytotal).'</text>
         <text id="_01" transform="matrix(1 0 0 1 848.2963 976.9908)" class="st2 st5">'.(!empty($quant[0])?$quant[0] : '').'</text>
         <text id="_02" transform="matrix(1 0 0 1 848.2963 1057.9293)" class="st2 st5">'.(!empty($quant[1])?$quant[1] : '').'</text>
         <text id="_03" transform="matrix(1 0 0 1 848.2963 1148.8668)" class="st2 st5">'.(!empty($quant[2])?$quant[2] : '').'</text>
         <text id="_04" transform="matrix(1 0 0 1 848.2963 1239.9069)" class="st2 st5">'.(!empty($quant[3])?$quant[3] : '').'</text>
         <text id="_05" transform="matrix(1 0 0 1 848.2963 1330.3737)" class="st2 st5">'.(!empty($quant) ? array_sum($quant) : '').'</text>
         <text id="_20_KG_copy_4" transform="matrix(1 0 0 1 1806.2992 2731.9917)" class="st2 st5">'.(!empty($weight[0])?$weight[0] : '').'</text>
         <text id="_20_KG_copy_4-2" transform="matrix(1 0 0 1 1806.2992 2819.9897)" class="st2 st5">'.(!empty($weight[1])?$weight[1] : '').'</text>
         <text id="_20_KG_copy_4-3" transform="matrix(1 0 0 1 1806.2992 2913.9907)" class="st2 st5">'.(!empty($weight[2])?$weight[2] : '').'</text>
         <text id="_20_KG_copy_4-4" transform="matrix(1 0 0 1 1806.2992 3006.9907)" class="st2 st5">'.(!empty($weight[3])?$weight[3] : '').'</text>
         <text id="_20_KG_copy_6" transform="matrix(1 0 0 1 1806.2992 3097.9917)" class="st2 st5">'.(!empty($weight[4])?$weight[4] : '').'</text>
         <text id="_1000_-_copy_4" transform="matrix(1 0 0 1 2077.2983 2738.9907)" class="st2 st4">'.((empty($rate[0]) ? ( $Builtytype != 'To Pay' ) ? '' : 'Freight : ' .($topaytotal - $localfreight - $labor - $other) : $rate[0])).'</text>
         <text id="_1000_-_copy_4-2" transform="matrix(1 0 0 1 2077.2983 2822.9897)" class="st2 st4">'.((empty($rate[0]) ? ( $Builtytype != 'To Pay' ) ? '' : 'Local  : ' .$localfreight : $rate[0])).'</text>
         <text id="_1000_-_copy_4-3" transform="matrix(1 0 0 1 2077.2983 2912.9907)" class="st2 st4"> '.((empty($rate[0]) ? ( $Builtytype != 'To Pay' ) ? '' : 'Labor : ' .$labor : $rate[0])).'</text>
         <text id="_1000_-_copy_4-4" transform="matrix(1 0 0 1 2077.2983 3000.9927)" class="st2 st4"> '.((empty($rate[0]) ? ( $Builtytype != 'To Pay' ) ? '' : 'Other : ' .$other : $rate[0])).'</text>
         <text id="_1000_-_copy_6" transform="matrix(1 0 0 1 2077.2983 3190.9897)" class="st2 st4"> '.(!empty($paid) ? $paid : 'Total : ' .$topaytotal).'</text>
         <text id="_01_copy" transform="matrix(1 0 0 1 848.2972 2730.9927)" class="st2 st5">'.(!empty($quant[0])?$quant[0] : '').'</text>
         <text id="_02_copy" transform="matrix(1 0 0 1 848.6635 2821.9263)" class="st2 st5">'.(!empty($quant[1])?$quant[1] : '').'</text>
         <text id="_03_copy" transform="matrix(1 0 0 1 848.6635 2912.8647)" class="st2 st5">'.(!empty($quant[2])?$quant[2] : '').'</text>
         <text id="_04_copy" transform="matrix(1 0 0 1 848.7133 3003.9077)" class="st2 st5">'.(!empty($quant[3])?$quant[3] : '').'</text>
         <text id="_05_copy" transform="matrix(1 0 0 1 848.7133 3094.3755)" class="st2 st5">'.(!empty($quant) ? array_sum($quant) : '').'</text>
         <foreignObject xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" transform="matrix(1 0 0 1 1140.7152 965.525)" class="st6 st7" style="
    position: relative;
    width: 590px;
    display: block;
    font-size: 30px;
    height: 410px;
    white-space: normal;
    line-height: 34px;
    overflow: hidden;
"><span class="farhan">'.(!empty($brand[0])?  $brand[0] : '').'</span></foreignObject>
         <text transform="matrix(1 0 0 1 1140.7152 1045.5299)" class="st6 st7">'.(!empty($brand[1]) ? $brand[1] : ''). '</text>
         <text transform="matrix(1 0 0 1 1140.7152 1135.5358)" class="st6 st7">'.(!empty($brand[2]) ? $brand[2] : ''). '</text>
         <text transform="matrix(1 0 0 1 1140.7152 1225.5416)" class="st6 st7">'.(!empty($brand[3]) ? $brand[3] : ''). '</text>
         <text transform="matrix(1 0 0 1 1140.7152 1325.5465)" class="st6 st7">'.(!empty($brand[4]) ? $brand[4] : '').'</text>
         <foreignObject xmlns="http://www.w3.org/2000/svg" id="_1-2" data-name="1" transform="matrix(1 0 0 1 1140.7152 2714.5259)" class="st6 st7" style="
    position: relative;
    width: 590px;
    display: block;
    font-size: 30px;
    height: 410px;
    white-space: normal;
    line-height: 34px;
    overflow: hidden;
"><span class="farhan">'.(!empty($brand[0])?  $brand[0] : '').'</span></foreignObject>


         <text transform="matrix(1 0 0 1 1140.7152 2810.5308)" class="st6 st7">'.(!empty($brand[1]) ? $brand[1] : ''). '</text>
         <text transform="matrix(1 0 0 1 1140.7152 2902.5366)" class="st6 st7">'.(!empty($brand[2]) ? $brand[2] : ''). '</text>
         <text transform="matrix(1 0 0 1 1140.7152 3000.5425)" class="st6 st7">'.(!empty($brand[3]) ? $brand[3] : ''). '</text>
         <text transform="matrix(1 0 0 1 1140.7152 3080.5474)" class="st6 st7">'.(!empty($brand[4]) ? $brand[4] : '').'</text>
         <text transform="matrix(1 0 0 1 1140.7152 2939.5532)" class="st6 st7"></text>
         <text transform="matrix(1 0 0 1 1140.7152 2984.5591)" class="st6 st7"></text>
         <text transform="matrix(1 0 0 1 1140.7152 3029.564)" class="st6 st7"></text>
         <text transform="matrix(1 0 0 1 553.0277 836.6227)" class="st6 st8">'.(!empty($fromstationOther->phone) ? $fromstationOther->phone : '').'</text>
         <text transform="matrix(1 0 0 1 553.0277 877.4977)" class="st6 st8"></text>
         <text id="_0311-9991588" transform="matrix(1 0 0 1 551.6586 980.5631)" class="st6 st8">'.(!empty($tostationOthers[0]) ? $tostationOthers[0] : '').'</text>
         <text id="_0311-9991588" transform="matrix(1 0 0 1 551.6586 933.5631)" class="st6 st8">'.(!empty($tostationOthers[1]) ? $tostationOthers[1] : '').'</text>
         <text id="_0321-6029494" transform="matrix(1 0 0 1 550.973 1403.5475)" class="st6 st8"></text>
         <text id="_0321-6029494" transform="matrix(1 0 0 1 550.973 1403.5475)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 549.6078 1040.4137)" class="st6 st8">'.(!empty($sql->local_mobile_no) ? $sql->local_mobile_no : '').'</text>
         <text transform="matrix(1 0 0 1 549.6078 1081.2887)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 553.0277 1150.5153)" class="st6 st8">'.(!empty($sql->local_vehicle_no) ? $sql->local_vehicle_no : '').'</text>
         <text transform="matrix(1 0 0 1 553.0277 1191.3912)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 551.6586 1269.5104)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 551.6586 1310.3854)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 552.3422 1499.2877)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 552.3422 1540.1627)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 553.7094 1606.6569)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 553.7094 1647.5319)" class="st6 st8"></text>
         <text id="Quantity" transform="matrix(1 0 0 1 863.5853 860.9547)" class="st9 st10">Quantity</text>
         <text id="Goods_description" transform="matrix(1 0 0 1 1250.8998 860.9547)" class="st9 st10">Goods description</text>
         <text id="Weight_KG_" transform="matrix(1 0 0 1 1799.3617 860.9547)" class="st9 st10">Weight (KG)</text>
         <text id="Tnt" transform="matrix(1 0 0 1 2082.3521 862.8141)" class="st9 st11">Total Amount</text>
         <text id="Peshawar" transform="matrix(1 0 0 1 250.0536 860.8629)" class=" st9 st12">Branch/Number </text>
         <text id="_Khadim_Goods_" transform="matrix(1 0 0 1 154.9222 872.4088)" class=" st6 st13"></text>
         <text id="nOWSHERA" transform="matrix(1 0 0 1 152.0536 955.8707)" class=" st9 st12">'.(!empty($tostation->name) ? $tostation->name : '').'</text>
         <text id="_Khadim_Goods_copy" transform="matrix(1 0 0 1 154.9222 965.4156)" class="st6 st13"> </text>
         <text id="iSLAMABAD" transform="matrix(1 0 0 1 152.0536 1043.816)" class="st9 st12">Local Mobile No</text>
         <text id="_aL_yOUSUF_gOODS_" transform="matrix(1 0 0 1 154.9222 1069.3619)" class="st6 st13"></text>
         <text id="gUJRANWALA" transform="matrix(1 0 0 1 152.0536 1161.443)" class="st9 st12">Local Vehicle No</text>
         <text id="_pAK_cHAUDHARY_gOODS_" transform="matrix(1 0 0 1 154.9222 1186.9879)" class="st6 st13"></text>
         <text id="lAHORE" transform="matrix(1 0 0 1 152.0536 1279.066)" class="st9 st12">Recieved By</text>
         <text id="_NOWSHERA_uNION_" transform="matrix(1 0 0 1 154.9222 1304.6119)" class="st6 st13"></text>
         <text id="fAISALABAD" transform="matrix(1 0 0 1 152.0536 1393.9567)" class="st9 st12">Contact</text>
         <text id="_NOWSHERA_uNION_2" transform="matrix(1 0 0 1 154.9222 1419.5016)" class="st6 st13"></text>
         <text id="mULTAN" transform="matrix(1 0 0 1 152.0536 1504.7428)" class="st9 st12">Date</text>
         <text id="_Khan_Shaheen_Goods_" transform="matrix(1 0 0 1 154.9222 1530.2877)" class="st6 st13"></text>
         <text id="BAHAWALPUR" transform="matrix(1 0 0 1 152.0536 1610.0602)" class="st9 st12">Signature</text>
         <text id="_Abbas_Co._" transform="matrix(1 0 0 1 154.9222 1635.6051)" class="st6 st13"></text>
         <text id="Receiver_Name:_Hassan_Baqir_" transform="matrix(1 0 0 1 1050.3392 576.6422)" class="st2 st14">Receiver Name: '.$receivername.' </text>
         <path id="Rounded_Rectangle_3" class="st0" d="M2043.3,792.6h297.9c27,0,48.8,22.4,48.8,50V900l0,0h-346.7l0,0V792.6L2043.3,792.6z
            "/>
         <text transform="matrix(1 0 0 1 2125.3755 1585.5153)" class="st2 st15"></text>
         <text transform="matrix(1 0 0 1 2176.3081 1610.2145)" class="st2 st15"></text>
         <g>
            <text id="Sign_" transform="matrix(1 0 0 1 2103.9321 1555.9254)" class="st6 st16">Sign</text>
            <path class="st17" d="M2161.6,1551.7h187.1v1.4h-187.1V1551.7z"/>
         </g>
         <text transform="matrix(1 0 0 1 969.2113 1701.9518)" class="st2 st18"></text>
         <path id="Rounded_Rectangle_4" class="st19" d="M123.7,792.6h695.8v870.6H123.7c-18.9,0-34.2-15.3-34.2-34.2V826.8
            C89.5,807.9,104.8,792.6,123.7,792.6L123.7,792.6z"/>
         <path class="st1" d="M817.8,900H91.6"/>
         <path id="Shape_5_copy" class="st1" d="M817.8,993H91.6"/>
         <path id="Shape_5_copy_2" class="st1" d="M817.8,1107.9H91.6"/>
         <path id="Shape_5_copy_3" class="st1" d="M817.8,1222.8H91.6"/>
         <path id="Shape_5_copy_4" class="st1" d="M817.8,1337.7H91.6"/>
         <path id="Shape_5_copy_4" class="st1" d="M1440.1000,137.7H491.6" transform="matrix(1 0 0 1 332.0536 1210.8707)"></path>
         <path id="Shape_5_copy_5" class="st1" d="M817.8,1452.5H91.6"/>
         <path id="Shape_5_copy_6" class="st1" d="M817.8,1567.4H91.6"/>
         <path class="st19" d="M1107.1,700.2v650.2"/>
         <path id="Shape_6_copy" class="st19" d="M1771.2,895.2v765.2"/>
         <path id="Shape_6_copy_2" class="st19" d="M2043.3,895.2v765.2"/>
         <path id="Rounded_Rectangle_3_copy" class="st19" d="M1771.8,792.6h271.5V900h-271.5L1771.8,792.6L1771.8,792.6z"/>
         <path id="Rounded_Rectangle_3_copy_2" class="st19" d="M1107.1,792.6h664.1V900h-664.1V792.6z"/>
         <path id="Rounded_Rectangle_3_copy_3" class="st19" d="M819.3,792.6h287.8V900H819.3V792.6z"/>
         <text id="ORIGINAL" transform="matrix(1 0 0 1 2000.00 670.50)" class="buityid st9 st20">Builty# : '.(!empty($sql->builty_id) ? $sql->builty_id : $builtyid).'</text>
         <g>
            <path id="Rounded_Rectangle_1_copy" class="st0" d="M2020.9,58.8h318.5c27.6,0,50,22.4,50,50l0,0v360.2c0,27.6-22.4,50-50,50
               h-318.5c-27.6,0-50-22.4-50-50V108.8C1970.9,81.2,1993.3,58.8,2020.9,58.8z"/>
            <text id="Date:__" transform="matrix(1 6.993007e-03 0 1 2000.7517 246.4951)" class="st2 st21">Date: '.date('d-m-Y',strtotime($date)).' </text>
            <text id="No:_" transform="matrix(1 6.993007e-03 0 1 2000.7517 151.4951)" class="buityid st2 st21">Office Copy </text>
            <text id="Vehicle_No:__" transform="matrix(1 6.993007e-03 0 1 2002.8367 349.8075)" class="st2 st21">DN#: '.$refno.' </text>
            <text id="Bilty:_-25" transform="matrix(1 6.993007e-03 0 1 2002.8367 454.8085)" class="st2 st21">Builty Type : '.$Builtytype.'</text>
            <path class="st1" d="M1975.7,281.9H2390"/>
            <path id="Shape_1_copy_2" class="st1" d="M1975.7,382.9H2390"/>
            <path id="Shape_1_copy" class="st1" d="M1975.7,177.7h411.1"/>
         </g>
         <text transform="matrix(1 0 0 1 520.000 150.0739)" class="st6" style="font-size: 65px;">NEW SARHAD KARACHI</text>
         <text transform="matrix(1 0 0 1 520.000 220.0739)" class="st6" style="font-size: 55px;">GOODS TRANSPORT COMPANY</text>
         <text transform="matrix(1 0 0 1 520.000 305.0739)" class="st6" style="font-size: 30px">Head Office: Plot No. A-353, Street No.1, Gate No. 5, Quaid-e-Azam </text>
         <text transform="matrix(1 0 0 1 520.000 348.2311)" class="st6" style="font-size: 30px">Truck Stand, Hawks Bay Road, Karachi, Pakistan.</text>
         <text transform="matrix(1 0 0 1 520.000 391.3883)" class="st6"style="font-size: 30px" xml:space="preserve">92-21-32350818-19-20,  92-21-32350761 0307-2222839, 0302-8296688</text>
         <text transform="matrix(1 0 0 1 520.000 434.5446)" class="st6" style="font-size: 30px" xml:space="preserve">www.nsk.com.pk     nskg_trco1@yahoo.com</text>
         <text transform="matrix(1 0 0 1 520.000  477.7028)" class="st6" style="font-size: 30px">SNTN: 5215306-4</text>
         <g id="logo">
            <image style="enable-background:new;" width="787" height="440" id="image-2" xlink:href="'.$path2.'/'.$selfcompanyc->logo.'"  transform="matrix(1 0 0 1 1350.4515 70.9059)">
            </image>
         </g>












<foreignObject xmlns="http://www.w3.org/2000/svg" id="_1-2" class="st17" d="M814,1403.3h957.2v256.5H814V1403.3z" style="">


</foreignObject>





         <text transform="matrix(1 0 0 1 857.0453 1454.5612)" class="st24 st6 st25">The Company will not be responsible for damages</text>
         <text transform="matrix(1 0 0 1 857.0453 1498.861)" class="st24 st6 st25">caused by theft, robbery, vehicle hijacking, road</text>
         <text transform="matrix(1 0 0 1 857.0453 1543.1608)" class="st24 st6 st25">accidents, fires, rains, floods, and other natural</text>
         <text transform="matrix(1 0 0 1 857.0453 1587.4606)" class="st24 st6 st25">disasters. The party should insure its goods and</text>
         <text transform="matrix(1 0 0 1 857.0453 1631.7614)" class="st24 st6 st25">assets.</text>
         <path id="Rounded_Rectangle_1-2" class="st0" d="M138.7,1794.8H452c27.2,0,49.2,22.4,49.2,50l0,0v360.2c0,27.6-22,50-49.2,50H138.7
            c-27.2,0-49.2-22.4-49.2-50v-360.2C89.5,1817.2,111.5,1794.8,138.7,1794.8L138.7,1794.8z"/>
         <path id="Rounded_Rectangle_2-2" class="st0" d="M139.5,2528.3h2199.9c27.6,0,50,22.4,50,50v770.8c0,27.6-22.4,50-50,50H139.5
            c-27.6,0-50-22.4-50-50v-770.8C89.5,2550.7,111.9,2528.3,139.5,2528.3z"/>
         <path class="st0" d="M89.6,2184.6v410.3"/>
         <path class="st1" d="M1976.9,2167.5v361.1"/>
         <path class="st1" d="M1975.7,2436.3H91.6"/>
         <path id="Shape_3_copy_2-2" class="st1" d="M1017.1,2251.2v185.2"/>

         <path id="Rounded_Rectangle_1_copy_2-2" class="st0" d="M553.9,1794.8h1372.5c27.6,0,50,22.4,50,50c0,0,0,0,0,0v360.2
            c0,27.6-22.4,50-50,50H553.9c-27.6,0-50-22.4-50-50v-360.2C503.9,1817.2,526.2,1794.8,553.9,1794.8L553.9,1794.8z"/>
         <foreignObject xmlns="http://www.w3.org/2000/svg" data-name="1" id="Phones:-2" transform="matrix(1 0 0 1 117.0677 1831.7438)" class="st6 st7 QrCode____img" style="position: relative;width: 380px;display: block;font-size: 30px;height: 380px;"><span class="farhan">'.$qrcode.'</span></foreignObject>
         <text id="Sender_Name:_Syed_Saif_Ali" transform="matrix(1 0 0 1 141.8676 2310.9468)" class="st2 st4">Sender Name: '.$sendername.' </text>
         <text id="Sender_Phone_:_" transform="matrix(1 0 0 1 141.8676 2397.7983)" class="st2 st4">Sender Phone#: '.$senderphone.' </text>
         <text id="Receiver_Phone_:_" transform="matrix(1 0 0 1 1050.3392  2397.7983)    " class="st2 st4">Receiver Phone#: '.$receiverphone.' </text>
         <text id="From:_Dusky_Solution-2" transform="matrix(1 0 0 1 241.8676 2492.1714)" class= buityid st2 st4">From: '.(!empty($fromstation->name) ? $fromstation->name : '').'</text>
         <text id="To:_Dusky_Solution-2" transform="matrix(1 0 0 1 1154.1449 2492.1714)" class="buityid st2 st4">To: '.(!empty($tostation->name) ? $tostation->name : '').'</text>
         <text transform="matrix(1 0 0 1 553.0277 2572.6235)" class="st6 st8">'.(!empty($fromstationOther->phone) ? $fromstationOther->phone : '').'</text>
         <text transform="matrix(1 0 0 1 553.0277 2613.4985)" class="st6 st8"></text>
         <text id="_0311-9991588-2" transform="matrix(1 0 0 1 551.6586 2720.562)" class="st6 st8">'.(!empty($tostationOthers[0]) ? $tostationOthers[0] : '').'</text>
         <text id="_0311-9991588-2" transform="matrix(1 0 0 1 551.6586 2670.562)" class="st6 st8">'.(!empty($tostationOthers[1]) ? $tostationOthers[1] : '').'</text>
         <text id="_0321-6029494-2" transform="matrix(1 0 0 1 550.973 3139.5474)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 549.6078 2776.4136)" class="st6 st8">'.(!empty($sql->local_mobile_no) ? $sql->local_mobile_no : '').'</text>
         <text transform="matrix(1 0 0 1 549.6078 2817.2886)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 553.0277 2886.5151)" class="st6 st8">'.(!empty($sql->local_vehicle_no) ? $sql->local_vehicle_no : '').'</text>
         <text transform="matrix(1 0 0 1 553.0277 2927.3911)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 551.6586 3005.5103)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 551.6586 3046.3853)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 552.3422 3235.2886)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 552.3422 3276.1636)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 553.7094 3342.6538)" class="st6 st8"></text>
         <text transform="matrix(1 0 0 1 553.7094 3383.5288)" class="st6 st8"></text>
         <text id="Quantity-2" transform="matrix(1 0 0 1 863.5853 2596.9546)" class="st9 st10">Quantity</text>
         <text id="Goods_description-2" transform="matrix(1 0 0 1 1250.8998 2596.9546)" class="st9 st10">Goods description</text>
         <text id="Weight_KG_2" transform="matrix(1 0 0 1 1799.3617 2596.9546)" class="st9 st10">Weight (KG)</text>
         <text id="Total_Amount-2" transform="matrix(1 0 0 1 2082.3521 2598.8149)" class="st9 st11">Total Amount</text>
         <text id="Peshawar-2" transform="matrix(1 0 0 1 250.0536 2600.8638)" class="st9 st12">Branch/Number</text>
         <text id="_Khadim_Goods_2" transform="matrix(1 0 0 1 154.9222 2608.4087)" class="st6 st13"></text>
         <text id="nOWSHERA-2" transform="matrix(1 0 0 1 152.0536 2695.8706)" class="st9 st12">'.(!empty($tostation->name) ? $tostation->name : '').'</text>
         <text id="_Khadim_Goods_copy-2" transform="matrix(1 0 0 1 154.9222 2701.4165)" class="st6 st13"></text>
         <text id="iSLAMABAD-2" transform="matrix(1 0 0 1 152.0536 2779.8169)" class="st9 st12">Local Mobile No</text>
         <text id="_aL_yOUSUF_gOODS_2" transform="matrix(1 0 0 1 154.9222 2805.3618)" class="st6 st13"></text>
         <text id="gUJRANWALA-2" transform="matrix(1 0 0 1 152.0536 2897.4438)" class="st9 st12">Local Vehicle No</text>
         <text id="_pAK_cHAUDHARY_gOODS_2" transform="matrix(1 0 0 1 154.9222 2922.9888)" class="st6 st13"></text>
         <text id="lAHORE-2" transform="matrix(1 0 0 1 152.0536 3015.0669)" class="st9 st12">Recieved By</text>
         <text id="_NOWSHERA_uNION_3" transform="matrix(1 0 0 1 154.9222 3040.6118)" class="st6 st13"></text>
         <text id="fAISALABAD-2" transform="matrix(1 0 0 1 152.0536 3129.9565)" class="st9 st12">Contact</text>
         <text id="_NOWSHERA_uNION_4" transform="matrix(1 0 0 1 154.9222 3155.5024)" class="st6 st13"></text>
         <text id="mULTAN-2" transform="matrix(1 0 0 1 152.0536 3240.7437)" class="st9 st12">Date</text>
         <text id="_Khan_Shaheen_Goods_2" transform="matrix(1 0 0 1 154.9222 3266.2886)" class="st6 st13"></text>
         <text id="BAHAWALPUR-2" transform="matrix(1 0 0 1 152.0536 3346.0571)" class="st9 st12">Signature</text>
         <text id="_Abbas_Co._2" transform="matrix(1 0 0 1 154.9222 3371.606)" class="st6 st13">'.(!empty($builtyaddresss[5]->Address)?$builtyaddresss[5]->Address : '').'</text>
         <text id="Receiver_Name:_Hassan_Baqir_2" transform="matrix(1 0 0 1 1050.3392 2312.6411)" class="st2 st14">Receiver Name: '. $receivername.' </text>
         <path id="Rounded_Rectangle_3-2" class="st19" d="M2043.3,2528.6h297.9c27,0,48.8,22.4,48.8,50v57.3l0,0h-346.8l0,0V2528.6
            L2043.3,2528.6z"/>
         <text transform="matrix(1 0 0 1 2125.3755 3321.5151)" class="st2 st15"></text>
         <text transform="matrix(1 0 0 1 2176.3081 3346.2153)" class="st2 st15"></text>
         <g>
            <text id="Sign_2" transform="matrix(1 0 0 1 2103.9321 3291.9243)" class="st6 st16">Sign</text>
            <path class="st17" d="M2161.6,3287.7h187.1v1.4h-187.1V3287.7z"/>
         </g>
         <text transform="matrix(1 0 0 1 969.2113 3439.9517)" class="st2 st18"></text>
         <path id="Rounded_Rectangle_4-2" class="st19" d="M123.7,2528.6h695.8v870.6H123.7c-18.9,0-34.2-15.3-34.2-34.2v-802.2
            C89.5,2543.9,104.8,2528.6,123.7,2528.6C123.7,2528.6,123.7,2528.6,123.7,2528.6z"/>
         <path class="st1" d="M817.8,2636H91.6"/>
         <path id="Shape_5_copy-2" class="st1" d="M817.8,2729H91.6"/>
         <path id="Shape_5_copy_2-2" class="st1" d="M817.8,2843.9H91.6"/>
         <path id="Shape_5_copy_3-2" class="st1" d="M817.8,2958.8H91.6"/>
         <path id="Shape_5_copy_4-2" class="st1" d="M817.8,3073.7H91.6"/>
        <path id="Shape_5_copy_4" class="st1" d="M1440.1000,137.7H491.6" transform="matrix(1 0 0 1 332.0536 2970.8707)"></path>
         <path id="Shape_5_copy_5-2" class="st1" d="M817.8,3188.5H91.6"/>
         <path id="Shape_5_copy_6-2" class="st1" d="M817.8,3303.4H91.6"/>
         <path class="st19" d="M1107.1,2555.2v555.2"/>
         <path id="Shape_6_copy-2" class="st19" d="M1771.2,2631.2v765.2"/>
         <path id="Shape_6_copy_2-2" class="st19" d="M2043.3,2631.2v765.2"/>
         <rect id="Rounded_Rectangle_3_copy-2" x="1771.2" y="2528.6" class="st19" width="272.1" height="107.3"/>
         <rect id="Rounded_Rectangle_3_copy_2-2" x="1107.1" y="2528.6" class="st19" width="664.1" height="109.9"/>
         <path id="Rounded_Rectangle_3_copy_3-2" class="st19" d="M819.5,2528.6h287.6V2636H819.5V2528.6z"/>
         <text id="FOR_VEHICLE" transform="matrix(1 0 0 1 2000.00 2410.9517)" class="buityid st9 st20">Builty# : '.(!empty($sql->builty_id) ? $sql->builty_id : $builtyid).'</text>
         <text transform="matrix(1 0 0 1 126.0394 2037.4215)" class="st2 st22"> </text>
         <text transform="matrix(1 0 0 1 165.767 2088.9058)" class="st2 st22"> </text>
         <text transform="matrix(1 0 0 1 172.6107 2140.3901)" class="st2 st22"> </text>
         <text transform="matrix(1 0 0 1 520.000 1900.0739)" class="st6" style="font-size: 65px;">NEW SARHAD KARACHI</text>
         <text transform="matrix(1 0 0 1 520.000 1950.0739)" class="st6" style="font-size: 55px;">GOODS TRANSPORT COMPANY</text>
         <text transform="matrix(1 0 0 1 520.00 2041.0739)" class="st6" style="font-size: 30px">Head Office: Plot No. A-353, Street No.1, Gate No. 5, Quaid-e-Azam</text>
         <text transform="matrix(1 0 0 1 520.00 2084.231)" class="st6" style="font-size: 30px">Truck Stand, Hawks Bay Road, Karachi, Pakistan.</text>
         <text transform="matrix(1 0 0 1 520.00 2127.3882)" class="st6" style="font-size: 30px">92-21-32350818-19-20,  92-21-32350761 0307-2222839, 0302-8296688</text>
         <text transform="matrix(1 0 0 1 520.00 2170.5444)" class="st6" style="font-size: 30px" xml:space="preserve">www.nsk.com.pk  nskg_trco1@yahoo.com</text>
         <text transform="matrix(1 0 0 1 520.00  2213.7026)" class="st6" style="font-size: 30px">SNTN: 5215306-4</text>
         <g id="logo-2">
            <image style="enable-background:new;" width="787" height="440" id="image-2_2_" xlink:href="'.$path2.'/'.$selfcompanyc->logo.'"  transform="matrix(1 0 0 1 1350.4515 1829.9059)">
            </image>
         </g>







        <foreignObject xmlns="http://www.w3.org/2000/svg" id="_1-2" class="st17" d="M814,3139.3h957.2v256.4H814V3139.3z" style=""></foreignObject>












         <text transform="matrix(1 0 0 1 857.0453 3190.5581)" class="st24 st6 st25">The Company will not be responsible for damages</text>
         <text transform="matrix(1 0 0 1 857.0453 3234.8579)" class="st24 st6 st25">caused by theft, robbery, vehicle hijacking, road</text>
         <text transform="matrix(1 0 0 1 857.0453 3279.1577)" class="st24 st6 st25">accidents, fires, rains, floods, and other natural</text>
         <text transform="matrix(1 0 0 1 857.0453 3323.4575)" class="st24 st6 st25">disasters. The party should insure its goods and</text>
         <text transform="matrix(1 0 0 1 857.0453 3367.7583)" class="st24 st6 st25">assets.</text>
         <text id="_------------------------------------------------------------" transform="matrix(1 0 0 1 77.5145 1762.3069)" class="st6 st26">-------------------------------------------------------------------------------------</text>
         <path id="Rounded_Rectangle_1_copy-2" class="st0" d="M2025.7,1794.8H2340c27.3,0,49.4,22.4,49.4,50l0,0v360.2
            c0,27.6-22.1,50-49.4,50h-314.3c-27.3,0-49.3-22.4-49.4-50v-360.2C1976.4,1817.2,1998.4,1794.8,2025.7,1794.8L2025.7,1794.8z"/>
         <text id="Date:__" transform="matrix(1 6.993007e-03 0 1 2000.7517 1982.4932)" class="st2 st21">Date: '.date('d-m-Y',strtotime($date)).' </text>
         <text id="No:__" transform="matrix(1 6.993007e-03 0 1 2000.7517 1887.4932)" class="buityid st2 st21">Client Copy </text>
         <text id="Vehicle_No:__2" transform="matrix(1 6.993007e-03 0 1 2002.8367 2085.8076)" class="st2 st21">DN#: '.$refno.' </text>
         <text id="Bilty:_-25-2" transform="matrix(1 6.993007e-03 0 1 2002.8367 2190.8096)" class="st2 st21">Builty Type : '.$Builtytype.'</text>
         <path class="st1" d="M1975.7,2017.9H2390"/>
         <path id="Shape_1_copy_2-2" class="st1" d="M1975.7,2118.9H2390"/>
         <path id="Shape_1_copy-2" class="st1" d="M1975.7,1913.7h411.1"/>
      </g>
   </svg>
   ';
   ?>
</div>
<!--printableArea close-->
<div class="panel-footer text-left">
   <a class="btn btn-danger" href="{{route('view-bilty')}}">Cancel</a>
   <a class="btn btn-danger" href="javascript:void(0)" onclick="ExportToDoc()">Download</a>
   <button class="btn btn-info printableArea123">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
         <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
         <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
      </svg>
   </button>
</div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.3.3/jQuery.print.min.js"></script>

<script>
    function ExportToDoc(filename = ''){
        alert(1);
    var HtmlHead = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";

    var EndHtml = "</body></html>";

    //complete html
    var html = HtmlHead +document.getElementById("MainHTML").innerHTML+EndHtml;

    //specify the type
    var blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
    });

    // Specify link url
    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

    // Specify file name
    filename = filename?filename+'.doc':'document.doc';

    // Create download link element
    var downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob ){
        navigator.msSaveOrOpenBlob(blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = url;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }

    document.body.removeChild(downloadLink);
}


</script>


<script>

   $('.printableArea123').on('click', function() {

   // select print button with class "print," then on click run callback function
     $.print("#printableArea1234"); // inside callback function the section with class "content" will be printed
   });
</script>
@endsection
