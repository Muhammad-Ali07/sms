
<style>
    body {
        font-family: sans-serif;
    }
    h1 {
        font-size: 30px;
    }
    * {
        font-family: sans-serif;
        font-size: 14px;
    }
    .printViewHeader_Second {
        position: relative;
        width: 100%;
    }
    .printViewHeader_table table {
        width: 100%;
        border-collapse: collapse;
    }
    .printViewHeader_table table tr {
        border-collapse: collapse;
    }
    .printViewHeader_table table tr th {
        border-collapse: collapse;
        padding: 5px 10px;
        background: #ccc;
    }
    .printViewHeader_table table tr td {
        border-collapse: collapse;
        padding: 5px 10px;
    }
    .border-line {
        border-top: 1px solid #000;
        text-transform: uppercase;
        text-align: center;
        display: block;
        margin-top: 50px;
    }
    
</style>
<?php 

    $items = DB::table('now_builtyitems')->where('builtyid',$builties->id)->get();
  
?>

<div class="col-sm-12">
   <div class="panel panel-bd">
      <div id="printableArea">
         <div class="panel-body">
            <div class="printView">
               <div class="printViewHeader">
                  <div class="col-sm-12">
                     <div class="panel panel-bd">
                        <div class="col-sm-2" style="width: 130px;display:inline-block;vertical-align: top;">
                           <h1>INVOICE</h1>
                        </div>
                       
                        <!-- col-sm-2 close -->
                        <div class="col-sm-8" style="position: absolute;width: 700px;text-align: center;left: 0px;right: 0px;margin: 0 auto;">
                           <img src="https://nsklog.com/NSK1029/public/selfcompany_image/logo.png" alt=""style="width: 150px;">
                           <br>
                                Head Office: Plot No. A-353, Street No.1,<br> Gate No. 5, Quaid-E-Azam
                                Truck Stand, Hawks Bay Road,<br> Karachi, Pakistan.
                                92-21-32350818-19-20,  92-21-32350761<br> 0307-2222839, 0302-8296688<br>
                        </div>
                        <!-- col-sm-2 close -->
                        <!-- col-sm-2 close -->
                        <div class="col-sm-2" style="display:inline-block;vertical-align: top;float: right;">
                           <p><b> Invoice Number </b> : {{ $builties->TRNO }} </p>
                           <p><b> Invoice Date </b> : {{ date('d-m-Y',strtotime($builties->date)) }} </p>
                        </div>
                        <!-- col-sm-2 close -->
                     </div>
                     <!-- panel panel-bd close -->
                     <br>
                     <br><br>
                     <hr/>
                     <div class="printViewHeader_Second">
                        <table>
                           <tbody>
                              
                              <tr>
                                 <td><b>Sender Name</b> : {{ $builties->sendername }} </td>
                              </tr>
                              <tr>
                                 <td><b>Reciever Name</b> : {{ $builties->receivername }} </td>
                              </tr>
                              
                              <tr>
                                  @php
                                    $station = DB::table('now_station')->where('id',$builties->to)->first()->name;
                                
                                  @endphp
                                 
                                 <td><b>Station </b> : {{$station}} </td>
                              </tr>
                             
                           </tbody>
                        </table>
                     </div>
                     <!--printViewHeader_Second close-->
                     <br>
                     <div class="printViewHeader_table" style="width: 70%;margin: 0 auto;">
                        <table border='1'>
                           <tbody>
                            <tr>
                                <th>Description</th>
                                <th>Qauntity</th>
                                <th>Weight</th>  
                                 <th>Tax</th> 
                                  <th>Tax Amount</th> 
                                <th>Amount</th>
                                <th>Net Amount</th>
                            </tr>
                              @foreach($items as $item)
                            
                              <tr>
                                 <td>{{ $item->brand }}</td>
                                   <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->weight }}</td>
                                    <td>{{ $builties->tax }}%</td>
                                    <td>@php echo $taxamount =  $builties->total * ($builties->tax/100)  @endphp</td>
                                     <td>{{ $builties->total }}</td>
                                      <td>{{$builties->total + $taxamount }}</td>   
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     <div style="width: 150px;float:right">
                      {{$builties->status}}
                     </div>
                     
                     <div class="border-line" style="width: 150px;">
                        Signature
                     </div>
                     <!--printViewHeader_table close-->
                     <div>
                         <h4>Term and Conditions</h4>
                         <ul style="list-style: none;padding: 0px 0px;margin: 0px 0px;">
                             <li>The Company Will Not Be Responsible For Damages Caused By Theft, Robbery,
                             Vehicle Hijacking, Road Accidents, Fires, Rains, Floods, and Other Natural
                             Disasters. The Party Should Insure Its Goods and Assets.</li>
                         </ul>
                     </div>
                  </div>
                  <!-- col-sm-12 close -->
               </div>
               <!-- printViewHeader close -->
            </div>
            <!-- printView close -->
         </div>
         <!-- END: Content -->
         <br><br>
    
         <div style="border:1px dotted black"></div>
         <br><br>
        
         <div class="panel-body">
            <div class="printView">
               <div class="printViewHeader">
                  <div class="col-sm-12">
                     <div class="panel panel-bd">
                        <div class="col-sm-2" style="width: 130px;display:inline-block;vertical-align: top;">
                           <h1>INVOICE</h1>
                        </div>
                        <!-- col-sm-2 close -->
                        <div class="col-sm-8" style="position: absolute;width: 700px;text-align: center;left: 0px;right: 0px;margin: 0 auto;">
                           <img src="https://nsklog.com/NSK1029/public/selfcompany_image/logo.png" alt=""style="width: 150px;">
                           <br>
                                Head Office: Plot No. A-353, Street No.1,<br> Gate No. 5, Quaid-E-Azam
                                Truck Stand, Hawks Bay Road,<br> Karachi, Pakistan.
                                92-21-32350818-19-20,  92-21-32350761<br> 0307-2222839, 0302-8296688<br>
                        </div>
                        <!-- col-sm-2 close -->
                        <!-- col-sm-2 close -->
                        <div class="col-sm-2" style="display:inline-block;vertical-align: top;float: right;">
                           <p><b> Invoice Number </b> : {{ $builties->TRNO }} </p>
                           <p><b> Invoice Date </b> : {{ date('d-m-Y',strtotime($builties->date)) }} </p>
                        </div>
                        <!-- col-sm-2 close -->
                     </div>
                     <!-- panel panel-bd close -->
                     <br>
                     <br><br>
                     <hr/>
                     <div class="printViewHeader_Second">
                        <table>
                           <tbody>
                              
                              <tr>
                                 <td><b>Sender Name</b> : {{ $builties->sendername }} </td>
                              </tr>
                              <tr>
                                 <td><b>Reciever Name</b> : {{ $builties->receivername }} </td>
                              </tr>
                              
                              <tr>
                                  @php
                                    $station = DB::table('now_station')->where('id',$builties->to)->first()->name;
                                
                                  @endphp
                                 
                                 <td><b>Station </b> : {{$station}} </td>
                              </tr>
                             
                           </tbody>
                        </table>
                     </div>
                     <!--printViewHeader_Second close-->
                     <br>
                     <div class="printViewHeader_table" style="width: 70%;margin: 0 auto;">
                        <table border='1'>
                           <tbody>
                            <tr>
                                <th>Description</th>
                                <th>Qauntity</th>
                                <th>Weight</th>  
                                 <th>Tax</th> 
                                  <th>Tax Amount</th> 
                                <th>Amount</th>
                                <th>Net Amount</th>
                            </tr>
                              
                              @foreach($items as $item)
                            
                              <tr>
                                 <td>{{ $item->brand }}</td>
                                   <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->weight }}</td>
                                    <td>{{ $builties->tax }}%</td>
                                    <td>@php echo $taxamount =  $builties->total * ($builties->tax/100)  @endphp</td>
                                     <td>{{ $builties->total }}</td>
                                      <td>{{$builties->total + $taxamount }}</td>   
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     
                     <div style="width: 150px;float:right">
                      {{$builties->status}}
                     </div>
                     <div class="border-line" style="width: 150px;">
                        Signature
                     </div>
                     <!--printViewHeader_table close-->
                     <div>
                         <h4>Term and Conditions</h4>
                         <ul style="list-style: none;padding: 0px 0px;margin: 0px 0px;">
                             <li>The Company Will Not Be Responsible For Damages Caused By Theft, Robbery,
                             Vehicle Hijacking, Road Accidents, Fires, Rains, Floods, and Other Natural
                             Disasters. The Party Should Insure Its Goods and Assets.</li>
                         </ul>
                     </div>
                  </div>
                  <!-- col-sm-12 close -->
               </div>
               <!-- printViewHeader close -->
            </div>
            <!-- printView close -->
         </div>
         <!-- END: Content -->
      </div>
   </div>
</div>