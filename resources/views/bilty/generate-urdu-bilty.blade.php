<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <!--<link rel="stylesheet" href="{{ asset('public/assets/fonts/ArialUnicodeMS.ttf') }}"> -->
      <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap" rel="stylesheet">
      <style>
         * {
         font-family: 'Noto Nastaliq Urdu', serif;
         }
         .print_View {
         position: relative;
         width: 100%;
         direction: rtl;
         }
         .print_View_top {
         position: relative;
         width: 100%;
         overflow: hidden;
         }
         .logo_side_print {
         position: relative;
         width: 33%;
         float: right;
         }
         .logo_side_print img {
         width: 250px;
         }
         .print_View_mid {
         position: relative;
         left: 0px;
         top: 0px;
         width: 33%;
         text-align: center;
         float: right;
         }
         .print_View_mid h3 {
         position: relative;
         width: 100%;
         color: #020069;
         margin: 0px;
         padding: 0;
         line-height: normal;
         height: auto;
         font-family: system-ui;
         font-size: 20px;
         text-transform: uppercase;
         font-weight: 800;
         }
         .print_View_mid h4 {
         padding: 0;
         font-family: system-ui;
         color: #ed9b32;
         margin: 3px 0px;
         font-weight: 800;
         font-size: 20px;
         }
         .print_View_end {
         float: right;
         width: 33%;
         font-family: sans-serif;
         font-weight: 900;
         line-height: normal;
         text-align: left;
         font-size: 17px;
         }
         .print_View_end span {
         display: block;
         font-size: 17px;
         }
         .printTable {
         position: relative;
         width: 100%;
         overflow: hidden;
         margin-top: 15px;
         display: block;
         }
         .printTable table {
         position: relative;
         width: 100%;
         border-collapse: collapse;
         }
         .printTable table tr {
         position: relative;
         }
         .printTable table tr td {
         color: #000;
         font-size: 16px;
         position: relative;
         border: 1px solid #ed9b32;
         text-align: right;
         padding: 0px 10px;
         }
         .printTable table tr th {
         color: #000;
         font-size: 14px;
         position: relative;
         border: 1px solid #ed9b32;
         text-align: right;
         padding: 0px 20px;
         }
         .printTable table tr th span {
         margin-left: 5px;
         }
         .printTable table tr td span {
         margin-left: 5px;
         }
      </style>
   </head>
   <?php
      $path = asset("src");
       $path2 = asset("selfcompany_image");
       $sql = DB::table('now_builty')->where('id',$id)->first();
       
        $to = $sql->to;
        $date = $sql->date;
        $sendername = $sql->sendername;
        $receivername = $sql->receivername;
        $topaytotal =  $sql->total;
        $Builtytype = $sql->Builtytype;
        $freight =  $sql->freight;
       $other =  $sql->other;
       $labor =   $sql->labour;
       $vehicle=$sql->local_vehicle_no;
       $localfreight =  $sql->local_freight;
        $sql1 = DB::table('now_builtyitems')->where('builtyid',$id)->get();
        $tostation = DB::table('now_station')
                              // ->join('now_phone','now_station.id','now_phone.customerid')
                               ->where('now_station.id',$to)
                               //->where('now_phone.type','station')
                               ->first();
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
        $item[$i] = $items->items;
       $weight[$i] = $items->weight;
       $i = $i + 1; 
      }
      
      ?>
   <!--onload="window.print()"-->
   <body>
      <div class="print_View">
         <div class="print_View_top">
            <div class="logo_side_print">
               <img src="https://nsklog.com/NSK1029/public/src/images/logo.png" alt="">
            </div>
            <!--logo_side_print close-->
            <div class="print_View_mid">
               <h3>Transit Receipt</h3>
               <h4>NTN: 5215306</h4>
               <h3>HEAD OFFICE</h3>
            </div>
            <!--print_View_mid close-->
            <div class="print_View_end">
               <span> نیو سرحد کراچی گڈز ٹرانسپورٹ کمپنی </span>
               NEW SARHAD KARACHI
               <br>
               GOODS TRANSPORT CO.
            </div>
            <!--print_View_end close-->
         </div>
         <!--print_View_top close-->
         <div class="printTable" style="page-break-after: always;">
            <img src="https://nsklog.com/NSK1029/dateImg.png" alt="" style="width: 100%;">
            <table style="table-layout: fixed;width: 100%;">
               <tbody>
                  <tr colspan="12">
                     <th colspan="3"> <span> تاریخ  </span>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     {{date('d-m-Y',strtotime($date))}} </th>
                     <th colspan="3"> <span>  ا ز کراچی تا </span>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     
                     {{(!empty($tostation->name) ? $tostation->name : '')}}  </th>
                     <th colspan="3"> <span> گاڑی نمبر  </span>{{$vehicle}} </th>
                     <th colspan="3"> <span> بلٹی نمبر  </span>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     {{(!empty($sql->builty_id) ? $sql->builty_id : $builtyid)}}  </th>
                  </tr>
                  <tr colspan="12">
                    <td colspan="6" style="height: 80px;vertical-align: top;width:50%" > <span>    ارسال کنندہ         </span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{$sendername}} </td>
                    <td colspan="6" style="height: 80px;vertical-align: top;width:50%"> <span>    ارسال کنندہ         </span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{$sendername}} </td>
                  </tr>
                  <tr colspan="12">
                     <td colspan="1"> <span>        تعداد          </span> </td>
                     <td colspan="4"> <span>          تفصیل         </span> </td>
                     <td colspan="2"> <span>          وزن          </span></td>
                     <td colspan="5"> <span>          کرایہ         
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             7000 </span></td>
                  </tr>
              
                    @foreach($sql1 as $key => $item )
                        @if($key <= 0 )
                         <tr colspan="12">
                             <td colspan="1" style="border-top: none;border-bottom: none;"> {{$item->quantity}}  </td>
                             <td style="border-top: none;border-bottom: none;font-family: sans-serif;font-size: 14px;line-height: normal;" colspan="4" style="border-top: none;border-bottom: none;"> {{ $items->items }} {{ $item->brand }} </td>
                             <td colspan="2" style="border-top: none;border-bottom: none;"> {{$item->weight}} </td>
                             <td colspan="5"> <span>       مزدوری       
                             
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             300
                             </span></td>
                          </tr>
                        @endif
                      @endforeach
                  <tr>
                     <td colspan="1"  style="border-top: none;border-bottom: none;">  </td>
                     <td colspan="4"  style="border-top: none;border-bottom: none;"> </td>
                     <td colspan="2"  style="border-top: none;border-bottom: none;"> </td>
                     <td colspan="5"> <span>     لوکل کرایہ      
                     
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     </span> </td>
                  </tr>
                  <tr>
                     <td colspan="1" style="border-top: none;border-bottom: none;"> </td>
                     <td colspan="4" style="border-top: none;border-bottom: none;"> </td>
                     <td colspan="2" style="border-top: none;border-bottom: none;"></td>
                     <td colspan="5"> <span>     متفرق          
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      </span> </td> 
                  </tr>
                  <tr>
                     <td colspan="1" style="border-top: none;border-bottom: none;"> </td>
                     <td colspan="4" style="border-top: none;border-bottom: none;"> </td>
                     <td colspan="2" style="border-top: none;border-bottom: none;"> </td>
                     <td colspan="5"> <span style="font-size: 25px;">    ٹوٹل         
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     7300
                     </span> </td>
                  </tr>
              
                  <tr colspan="12">
                     <td colspan="7" style='font-size:12px'> 
                     <span>
                        نوٹ: موجود حالات میں گاڑیوں کا اسلحہ کہ زور پر اغواء ہونا
                        ڈکیتی یا مال کی لوٹ مار اور قدرتی حادثات مثلاً بارش ہونا
                        
                        سیلاب یا نہر میں بہہ جانا شارٹ سرکٹ یا کسی بھی وجہ سے
                        آگ لگ جانا گاڑیوں کی مال سمیت جلنا ایسی کسی صورت
                        
                        میں ٹرانسپورٹ کمپنی کسی قسم کہ ہر جانے کلیم کی ذمےدار
                        نہیں ہو گی لہٰذا پارٹیوں سے ان کے مفاد میں التماس ہے
                        
                        کہ اپنے مال کا مکمل انشورنس کرائیں شکریہ۔۔۔
                     </span>
                     </td>
                     <td colspan="5"> </td>
                  </tr>
                  <tr colspan="12">
                     <td colspan="7" style="
                        height: 90px;
                        vertical-align: top;
                        "> دفتری استعمال کے لیے </td>
                     <td colspan="3" style="
                        vertical-align: bottom;
                        "> تاریخ و دستخط وصول کنندہ </td>
                     <td colspan="2" style="
                        vertical-align: bottom;
                        ">دستخط</td>
                  </tr>
                  <tr colspan"12">
                     <td colspan="7">
                        <!--لیہ 03005662211-->
                        <!--ٹانگ 511125-0963 -->
                        <!--کرک 8680632-0334-->
                        <!--بکھر 7041566-0334-->
                        <!--سراے نورنگ 0969350478-->
                        <!--<br>-->
                        <!--کوہاٹ 03439245305-->
                        <!--ڈیرہ اسماعیل خان 0966733785 03463437147-->
                        <!--بنوں 098612728-->
                        <!--0928612628-->
                        <!--<br>-->
                        <!--مردان 03451021010-->
                        <!--ہاشم گڑہی پشاور 03332652333-->
                        <img src="http://nsklog.com/NSK1029/urdutext02.png" alt="" style="width: 100%;">
                     </td>
                     <td  colspan="5">
                        <!--برانچ کھارادر Gk6 (B-98-G3,G4) نزد مچھی میانی مارکیٹ جی الا نہ روڈ کھارادر کراچی -->
                        <!--Tel: 92 21 3243 4888 3252 2024-->
                        <!--Cell 0345-2434888, 0307-2222829-->
                        <img src="http://nsklog.com/NSK1029/urdutext03.png" alt="" style="width: 100%;">
                     </td>
                  </tr>
               </tbody>
            </table>
            <div style="width: 100%;text-align: center;margin-top: 10px;font-size: 18px;"> 
               شرائط بلٹی کی پشت پر ملا حظہ کریں ۔
            </div>
         </div>
         
         
         
           <div class="print_View_top">
            <div class="logo_side_print">
               <img src="https://nsklog.com/NSK1029/public/src/images/logo.png" alt="">
            </div>
            <!--logo_side_print close-->
            <div class="print_View_mid">
               <h3>Customer Copy</h3>
               <h4>NTN: 5215306</h4>
               <h3>HEAD OFFICE</h3>
            </div>
            <!--print_View_mid close-->
            <div class="print_View_end">
               <span> نیو سرحد کراچی گڈز ٹرانسپورٹ کمپنی </span>
               NEW SARHAD KARACHI
               <br>
               GOODS TRANSPORT CO.
            </div>
            <!--print_View_end close-->
         </div>
         <!--print_View_top close-->
         <div class="printTable">
            <img src="https://nsklog.com/NSK1029/dateImg.png" alt="" style="width: 100%;">
            <table>
               <tbody>
                  <tr>
                     <th> <span> تاریخ  </span>{{date('d-m-Y',strtotime($date))}} </th>
                     <th> <span>  ا ز کراچی تا </span>{{(!empty($tostation->name) ? $tostation->name : '')}}  </th>
                     <th> <span> گاڑی نمبر  </span> </th>
                     <th> <span> بلٹی نمبر  </span>{{(!empty($sql->builty_id) ? $sql->builty_id : $builtyid)}}  </th>
                  </tr>
                  <tr>
                     <td colspan="2" style="height: 80px;vertical-align: top;"> <span>    ارسال کنندہ         </span>{{$sendername}} </td>
                     <td colspan="2" style="height: 80px;vertical-align: top;"> <span>    وصول  کنندہ         </span> {{$receivername}}</td>
                  </tr>
                  <tr>
                     <td> <span>        تعداد          </span> </td>
                     <td> <span>          تفصیل         </span> </td>
                     <td> <span>          وزن          </span> </td>
                 <td> <span>          کرایہ          </span></td> 
                  </tr>
                   @foreach($sql1 as $key => $item )
                        @if($key <= 0 )
                         <tr>
                             <td style="border-top: none;border-bottom: none;"> {{$item->quantity}}  </td>
                             <td style="border-top: none;border-bottom: none;"> {{ $items->items }} {{ $item->brand }} </td>
                             <td style="border-top: none;border-bottom: none;"> {{$item->weight}} </td>
                            <td> <span>      مزدوری             </span></td>
                          </tr>
                        @endif
                      @endforeach
                  
                  <tr>
                     <td style="border-top: none;border-bottom: none;">  </td>
                     <td style="border-top: none;border-bottom: none;"> </td>
                     <td style="border-top: none;border-bottom: none;"> </td>
                     <td> <span>     لوکل کرایہ           </span> </td>
                  </tr>
                  <tr>
                     <td style="border-top: none;border-bottom: none;"> </td>
                     <td style="border-top: none;border-bottom: none;"> </td>
                     <td style="border-top: none;border-bottom: none;"></td>
                    <td> <span>     متفرق            </span> </td> 
                  </tr>
                  <tr>
                     <td style="border-top: none;border-bottom: none;"> </td>
                     <td style="border-top: none;border-bottom: none;"> </td>
                     <td style="border-top: none;border-bottom: none;"> </td>
                     <td> <span style="font-size: 25px;">    ٹوٹل            </span> </td>
                  </tr>
                  <tr>
                     <td colspan="2"  style='font-size:10px'> 
                        نوٹ: موجود حالات میں گاڑیوں کا اسلحہ کہ زور پر اغواء ہونا
                        ڈکیتی یا مال کی لوٹ مار اور قدرتی حادثات مثلاً بارش ہونا
                        
                        سیلاب یا نہر میں بہہ جانا شارٹ سرکٹ یا کسی بھی وجہ سے
                        آگ لگ جانا گاڑیوں کی مال سمیت جلنا ایسی کسی صورت
                        
                        میں ٹرانسپورٹ کمپنی کسی قسم کہ ہر جانے کلیم کی ذمےدار
                        نہیں ہو گی لہٰذا پارٹیوں سے ان کے مفاد میں التماس ہے
                        
                        کہ اپنے مال کا مکمل انشورنس کرائیں شکریہ۔۔۔
                     </td>
                     <td colspan="2"> </td>
                  </tr>
                  <tr>
                     <td colspan="2" style="
                        height: 90px;
                        vertical-align: top;
                        "> دفتری استعمال کے لیے </td>
                     <td style="
                        vertical-align: bottom;
                        "> تاریخ و دستخط وصول کنندہ </td>
                     <td style="
                        vertical-align: bottom;
                        ">دستخط</td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        لیہ 03005662211
                        ٹانگ 511125-0963 
                        کرک 8680632-0334
                        بکھر 7041566-0334
                        سراے نورنگ 0969350478
                        کوہاٹ 03439245305
                        ڈیرہ اسماعیل خان 0966733785 03463437147
                        بنوں 098612728
                        0928612628
                        مردان 03451021010
                        ہاشم گڑہی پشاور 03332652333
                     </td>
                     <td  colspan="2">
                        برانچ کھارادر Gk6 (B-98-G3,G4) نزد مچھی میانی مارکیٹ جی الا نہ روڈ کھارادر کراچی 
                        Tel: 92 21 3243 4888 3252 2024
                        Cell 0345-2434888, 0307-2222829
                     </td>
                  </tr>
               </tbody>
            </table>
            <div style="width: 100%;text-align: center;margin-top: 10px;font-size: 18px;"> 
               شرائط بلٹی کی پشت پر ملا حظہ کریں ۔
            </div>
         </div>
         
         <!--printTable close-->
      </div>
      <!--print_View close-->
   </body>
</html>