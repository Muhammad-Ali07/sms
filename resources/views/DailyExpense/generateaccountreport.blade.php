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
   margin-top: 70px;
   }
   .example{
   font-weight: 900;
   }
</style>
@php 
$expenseamount = null;
@endphp
   <div class="panel panel-bd">
      <div id="printableArea">
         <div class="panel-body">
            <div class="printView">
               <div class="printViewHeader">
                  <div class="col-sm-12">
                     <h1 align="center">Daily Labour Payment Reports</h1>
                     <div class="panel panel-bd">
                        <div class="col-sm-2" style="width: 130px;display:inline-block;vertical-align: top;margin-bottom:100px">
                        </div>
                        <!-- col-sm-2 close -->
                        <!-- col-sm-2 close -->
                        <div class="col-sm-2" style="display:inline-block;vertical-align: top;float: right;">
                           <p><b> Invoice Number </b> : {{rand(000,999)}} </p>
                           <p><b> Invoice Date </b> : {{ date('Y-m-d') }} </p>
                        </div>
                        <!-- col-sm-2 close -->
                     </div>
                     <!-- panel panel-bd close -->
                     <br>
                     <hr/ style="clear: both;">
                     <?php
                        $sum=[];
                     
                        ?>
                     <div class="printViewHeader_table" style="width: 100%;position: relative;overflow: hidden;">
                         <div class="col-sm-6"  style="width:45%;display: inline-block;vertical-align: top;">
                        <table border='1'>
                           <thead>
                              <tr>
                                 <th>S#</th>
                                 <th>Date</th>
                                 <th>Mazda No</th>
                                 <th> Name</th>
                                 <th>Amount</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $serial = 0; ?>
                              @foreach($getmazda as $value1)
                              <?php $serial += 1; 
                              $sum[] = $value1->Mazda_Amount ; 
                              ?>
                              <tr>
                                 <td>{{$serial}}</td>
                                 <td>{{$value1->Mazda_date}}</td>
                                 <td>{{$value1->Mazda_name}}</td>
                                 <td>{{$value1->Piont_of_loading}}</td>
                                 <td>{{$value1->Mazda_Amount}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                        </div>
                        <div class="col-sm-6"  style="width:45%;display: inline-block;vertical-align: top;">
                        <table border='1'>
                           <thead>
                              <tr>
                                 <th>S#</th>
                                 <th>Date</th>
                                 <th>Container No</th>
                                 <th> Name</th>
                                 <th>Amount</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $serial = 0; ?>
                              @foreach($getcontainer as $value2)
                              <?php $serial += 1; 
                              $sum[] = $value2->Container_Amount;
                              ?>
                              <tr>
                                 <td>{{$serial}}</td>
                                 <td>{{$value2->Container_date}}</td>
                                 <td>{{$value2->Container_Number}}</td>
                                 <td>{{$value2->Container_pointsale}}</td>
                                 <td>{{$value2->Container_Amount}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                        </div>
                     </div>
                  <div align="right" class="example" style="width: 45%;">
                      <br/>
                     Amount {{array_sum($sum)}} <br/>
                     @foreach($expenses as $expense)
                     @php $expenseamount += $expense->amount @endphp
                     {{$expense->Details}} {{$expense->amount}} <br/>
                     @endforeach
                     
                     Net Amount {{array_sum($sum) + $expenseamount}}
                  </div>
                  <div class="border-line" style="width: 45%;">
                     Signature
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
</div>