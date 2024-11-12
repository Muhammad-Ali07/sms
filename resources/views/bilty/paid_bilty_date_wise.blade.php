<?php ini_set('max_execution_time', 300); //300 seconds = 5 minutes ?>
<!DOCTYPE html>
<html>

<head>
         @php
             $selfcompany = DB::table('selfcompany')->where('id',$paid_bilty_records[0]->self_company)->first();
         @endphp

   <meta charset="utf-8">
   <title>{{$selfcompany->name}} Paid Builty </title>
   <style>
      body {
         margin: 0;
         padding: 0;
         font-size: 14px;
         font-family: serif, Arial;
      }

      td {
         border-bottom: 1px solid #000;
      }
   </style>
</head>
<div style="width:740px !important;">
   <div style="width:100%;">
      <div style="float:left;width:180px;">



         @if(!empty($paid_bilty_records[0]))
         @php
         $selfcompany = DB::table('selfcompany')->where('id',$paid_bilty_records[0]->self_company)->first();
         @endphp
         @endif


         @if(!empty($selfcompany->logo))
         <img src="{{asset('selfcompany_image/'.$selfcompany->logo)}}"
            style="padding:10px 0px 0px 0px;width:160px;height: 80px;" />
         @endif

      </div>
      <div style="float:left;width:350px;">
         <center>
            <p style="padding:5px;">
               <span style="font-size:18px;"> PAID BUILTY REPORT </span>
               <br>
               <strong style="color:#ffb968;"> &nbsp; </strong>
            </p>
         </center>
      </div>
      <div style="float:left;width:220px;text-align:left;">
         <h3>SMS Private Limited</h3>
      </div>
   </div>
   <div style="clear:both;"></div>
   <div style="width:40%;float:left;">Date From: <?php echo date("Y-M-d", strtotime($date_from)) ?></div>
   <div style="width:40%;float:right;text-align:right;">Date To: <?php echo date("Y-M-d", strtotime($date_to)); ?></div>
   <br clear="all" />
   <hr style="color:#ffb968;">
   <div style="clear:both;"></div>
   <br clear="all" />
   <table cellspacing="0" cellpadding="5" width="100%" border="1">
      <thead>
         <tr style="background:#ccc;">
            <th>SNo.</th>
            <th>Date</th>
            <th>Sender</th>
            <th>From Station</th>
            <th>Receiver</th>
            <th>To Station</th>
            <th>Bilty No.</th>
            <th>Total</th>
         </tr>
      </thead>
      <?php if (isset($paid_bilty_records) && sizeof($paid_bilty_records) > 0) {
         $serial_number = 0; ?>
         <tbody>
            <?php 
                $total = 0;
                $sub_total = 0;
            ?>
            @foreach($paid_bilty_records as $rec)
                @php
                    $total = DB::table('now_bilty_selling_expense')
                        ->where('builty_id', '=', $rec->bid)
                        ->pluck('amount') // Get the amounts as a collection
                        ->map(function($amount) {
                            // Remove commas and convert to float
                            return (float) str_replace(',', '', $amount);
                        })
                        ->sum(); // Sum the cleaned amounts
                @endphp
            <tr>
               <?php
               echo "<td>" . $serial_number += 1;
               "</td>";
               echo "<td>" . $date = date('d/m/Y', strtotime($rec->date)) . "</td>";
               echo "<td>" . $rec->sendername . "</td>";
               echo "<td>" . $rec->from_station_name . "</td>";
               echo "<td>" . $rec->receivername . "</td>";
               echo "<td>" . $rec->to_station_name . "</td>";
               echo "<td>" . $rec->builty_id . "</td>";
               echo "<td>" . $total . "</td>";
               $sub_total += $total; ?>
            </tr>
            @endforeach
            <tr>
               <?php if ($all == 1) { ?>
                  <td colspan="8" align="right"><b>Total Amount : </b></td>
               <?php } else { ?>
                  <td colspan="7" align="right"><b>Total Amount : </b></td>
               <?php } ?>
               <td><?php echo $sub_total; ?></td>
            </tr>
         </tbody>
      <?php } ?>
   </table>
   <div style="text-align:right;font-size:10px;">-By Dusky Solution</div>
</div>
</body>

</html>