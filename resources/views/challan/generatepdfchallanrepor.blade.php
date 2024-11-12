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
</style>
<?php
  function topay($challanid)
  {
   $topayy = '0';
   $topay = DB::table('now_challanlist')->where('challanid',$challanid)->get();
   foreach ($topay as $value) 
   {
      $topayy += DB::table('now_builty')->where('id',$value->trno)->where('Builtytype','To Pay')->get()->sum('bilty_total');
   }
   //print_r($topayy);die;
   return $topayy;
  }


  function paid($challanid)
  {
   $paid = '0';
   $paidd = DB::table('now_challanlist')->where('challanid',$challanid)->get();
   foreach ($paidd as $value) 
   {
      $paid += DB::table('now_builty')->where('id',$value->trno)->where('Builtytype','Paid')->get()->sum('bilty_total');
   }
   //print_r($paid);die;
   return $paid;
  }


  function Local($challanid)
  {
   $paid = '0';
   $paidd = DB::table('now_challanlist')->where('challanid',$challanid)->get();
   foreach ($paidd as $value) 
   {
      $paid += DB::table('now_builty')->where('id',$value->trno)->get()->sum('local_freight');
   }
   //print_r($paid);die;
   return $paid;
  }

  function Labour($challanid)
  {
   $paid = '0';
   $paidd = DB::table('now_challanlist')->where('challanid',$challanid)->get();
   foreach ($paidd as $value) 
   {
      $paid += DB::table('now_builty')->where('id',$value->trno)->get()->sum('labour');
   }
   //print_r($paid);die;
   return $paid;
  }

  function freight($challanid)
  {
   $paid = '0';
   $paidd = DB::table('now_challanlist')->where('challanid',$challanid)->get();
// echo"<pre>"; print_r($paidd);die;
   if($paidd){
   foreach ($paidd as $value) 
   {
      $paid += DB::table('now_builty')->where('id',$value->trno)->get()->sum('freight');
   }
   }

   return $paid;
  }
 ?>
<div class="col-sm-12">
   <div class="panel panel-bd">
      <div id="printableArea">
         <div class="panel-body">
            <div class="printView">
               <div class="printViewHeader">
                  <div class="col-sm-12">
                     <div class="panel panel-bd">
                        <div class="col-sm-2" style="width: 100%;display:inline-block;vertical-align: top;">
                           
                           <h1>Challan Report</h1>
                        </div>
                        <!-- col-sm-2 close -->
                        <!-- col-sm-2 close -->
                        <div class="col-sm-2" style="display:inline-block;vertical-align: top;float: right;">
                        
                           <p><b> Month </b> : @if($month == '1') January @elseif($month == '2') February @elseif($month == '3') March @elseif($month == '4') April @elseif($month == '5') May @elseif($month == '6') June @elseif($month == '7') July @elseif($month == '8') August @elseif($month == '9') September @elseif($month == '10') October @elseif($month == '11') Novomber @elseif($month == '12') December @endif  </p>
                          
                        </div>
                        <!-- col-sm-2 close -->
                     </div>
                     <!-- panel panel-bd close -->
                     <br>
                    
                    
                     <hr/>

          

                     <?php
                     $sum=[];
                     
                     ?>
                     <div class="printViewHeader_table">
                     <table border='1'  style="width:100%">

<thead>

   <tr>
                                       <th>S.NO</th>
                                       <th>Date</th>
                                       <th>Vehicle No</th>
                                       <th>Station</th>
                                       <th>To pay</th>
                                       <th>Paid</th>
                                       <th>Local</th>
                                       <th>Vehicle Right</th>
                                       <th>Labour</th>
                                       
                                    </tr>
</thead>
<tbody>
                                    @if($challan)
                                    <?php 
                                        $id=1 ;
                                        $topay = 0;
                                        $paid = 0;
                                        $local = 0;
                                        $freight = 0;
                                        $labour = 0;
                                    foreach($challan as $row){
                                    ?>
                                    saad
                                    <?php 
                                        $topay += topay($row->id);
                                        $paid += paid($row->id);
                                        $local += Local($row->id);
                                        $freight += freight($row->id);
                                        $labour += Labour($row->id);
                                    ?>
                                    <tr>
                                       <td>{{$id++}}</td>
                                       <td>{{$row->date}}</td>
                                       <td>{{$row->vehicle_id}}</td>
                                       <td>{{$row->station_name}}</td>
                                       <td><?php echo topay($row->id); ?></td>
                                       <td><?php echo paid($row->id); ?></td>
                                       <td><?php echo Local($row->id); ?></td>
                                       <td><?php echo freight($row->id); ?></td>
                                       <td><?php echo Labour($row->id); ?></td>
                                    </tr>
                                    <?php } ?>

                                    @endif
                                 </tbody>

</table>
                     </div>
                     <table border='1' style="float: right; width: 50%;text-align: right;">
                        <tbody>
                           <tr>
                              <th>Total Challan</th>
                              <td>{{$topay}}</td>
                           </tr>
                           <tr>
                              <th>Paid</th>
                              <td>{{$paid}}</td>
                           </tr>
                           <tr>
                              <th>Local</th>
                              <td>{{$local}}</td>
                           </tr>
                           <tr>
                              <th>Fright</th>
                              <td>{{$freight}}</td>
                           </tr>
                           <tr>
                              <th>Labour</th>        
                              <td>{{$labour}}</td>
                           </tr>
                        </tbody>
                     </table>
                 
                        <br>
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
</div>