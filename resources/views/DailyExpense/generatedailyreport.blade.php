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
                        <!-- col-sm-2 close -->
                        <div class="col-sm-2" style="display:inline-block;vertical-align: top;float: right;">
                           <p><b> Invoice Number </b> : {{rand(000,999)}} </p>
                           <p><b> Invoice Date </b> : {{ date('Y-m-d') }} </p>
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
   <th>S.No</th>
      <th>Expense Name</th>
      <th>Category</th>
      <th>Date</th>
      <th>Amount</th> 
     

   
   </tr>
</thead>
<tbody>
<?php $serial = 0; ?>
@foreach($getexpense as $row)
<?php
$value=DB::table('expense_category')->where('id',$row->exp_category)->first();

?>
<?php $serial += 1; ?>
<?php
    $sum[] = $row->Expense_Amount;
    ?>
   <tr>
   <td>{{$serial}}</td>
      <td>{{$row->Expense_Name}}</td>
       <td>{{$value->expense_category}}</td>
      <td>{{$row->Expense_Date}}</td>
      <td>{{$row->Expense_Amount}}</td>
    
      @endforeach
    
     
    
   </tr>

</table>
                     </div>
                 
                        <br>
                     </div>
                      <div align="right" class="example" style="width: 980px;">
                        Total Expense Amount  
                    
                             <?php
             
             $nettotal = array_sum($sum)
             
             ?>
             {{$nettotal}}
         
                     </div>
                     <div class="border-line" style="width: 150px;">
                        Signature
                     </div>
                     <!--printViewHeader_table close-->
                     <div>
                         <h4>Term and Conditions</h4>
                         <ul style="list-style: none;padding: 0px 0px;margin: 0px 0px;">
                             <!--<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>-->
                             <!--<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>-->
                             <!--<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>-->
                             <!--<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>-->
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