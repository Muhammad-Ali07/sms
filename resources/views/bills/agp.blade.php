<!DOCTYPE html>

<html>

<title>Bill Report</title>

<meta charset="utf-8">

<style>

body {

    margin: 0;

    padding: 0;

    font-size: 14px;

    font-family: serif;

}



p {

    padding: 0px;

    margin: 0px;

}



.lh {

    padding: 0px;

    margin: 0px;

}



td {

    width: 64.5px;

    text-align: center;

    font-size: 12px;

}



th {

    width: 64.5px;

    text-align: center;

    font-size: 12px;

}



.page-break {

    page-break-after: always;

}



.breaker {

    page-break-after: always !important;

}



@media print {

    .breaker {

        page-break-after: always;

    }

}



html,

body {

    display: block;

}

</style>

<!--BILL TOP INFORMATION AREA-->

<div style="width:1150px !important;">

    <!--BREAKING DATA IN PAGES -->

    <?php



      $mytotal = 0;

      $totalamount = 0;

      $totalpageamount = 0;

      $totalpagefreightamount = 0;

      $totalamountfreight = 0;

      $totalpagepackamount = 0;

      $totalpackages = 0;

      $totaltaxamount = 0;

      $totalPacks = 0;

      $total = 0;

      $pg = 0;

      $totalQtyDisplay = 0;

      $per_pages = 18;

      $Qtyttls = 0;

      $normal_packs = 0;

      $small_packs = 0;

      $large_packs = 0;

      $pagenormal_packs= 0;

      $pagesmall_packs= 0;

      $packagerate = [];

      $pagelarge_packs= 0;

      $linepage = 0;

      $pagecount = 0;

      $increment = 0;

      $serial_number = 0;

      $pg +=1;

      $totalbill =0;

      $rowcounter = 0;

      $newbilltotal =[];

      $newPerctotal = [];

      $newfreighttotal = [];

      $totalPerc = 0;

      $totalfreight = 0;

      $packagequantity  = 0;

      $company = DB::table('selfcompany')->where('id',$data->selfcompany)->first();

      

      ?>



    <div style="width:100%;">

        <div style="float:left;width:40%;">

            <header>

                <img src="{{asset('selfcompany_image/'.$company->logo )}}" th="180px" height="70px"

                    style="padding:10px 0px 0px 0px;" />

            </header>

        </div>

        <div style="float:left;width:20%;text-align:center;">

            <center>

                <h3>SALE TAX INVOICE<br>Page # 1 </h3>

            </center>

        </div>

        <div style="float:left;width:40%;text-align:center;">

            <h3> {{ ($company->id == 1 ? 'NEW SARHAD KARACHI' : "WAZIR LOGISTICS"  ) }} @if($company->id == 1 ) <br>

                GOODS TRANSPORT CO.@endif </h3>

        </div>

        <div style="clear:both;"></div>

        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:50%;">

            <p><b> {{ ($company->id == 1 ? 'NTN#:5215306' : 'NTN#:3181351-8' ) }} </b> &nbsp; EMAIL:nskg_trco1@yahoo.com

            </p>

        </div>

        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:20%;">



            <p style="text-align:left;">SALE TAX INVOICE :

                <?php

                

                $cust = explode(' ',$customer->customerName);

                $result ='';

                echo date('ym',strtotime($data->bill_date));

                echo '/';

                foreach($cust as $name){

                    $result .= substr($name,0,1);

                }

                $wrd = substr($result,0,2);

                $wrd = str_replace('(',"",$wrd);

                $wrd = str_replace('&',"",$wrd);

                echo $wrd;



                ?>{{ $data->bill_Number }}

            </p>

        </div>

        <div class="lh" style="float:left;width:65%;border:1px solid #ccc;">

            <p style="text-align:left;padding:0px 5px;font-weight:bold;">CONSIGNER'S NAME: {{$customer->customerName}}

            </p>

        </div>

        <div style="clear:both;"></div>

        <!-- $bill_date =$record[0]->bill_date; -->

        <div style="float:left;width:30%;">BILLING MONTH : {{date('F/Y',strtotime($data->bill_date))}}

        </div>

        <br>

        <div style="float:left;width:30%;"><b>CONSIGNER'S NTN No : </b> {{ $customer->contact_point}}

        </div>



        <div style="float:left;width:30%">

            <center>

                <p> </p>

            </center>

        </div>

    </div>

    <div style="clear:both;padding:0;margin:0;"></div>

    <hr style="color:#ffb968;">

    <div style="clear:both;"></div>

    <?php

      $labels = DB::table('customerlabels')->where('CustomerID',$customer->customeNo )->get();

      ?>

    <table cellspacing="0" cell-padding="0" width="90%" border="1" class="breaker">

        <thead>

            <tr>

                <th>#</th>

                <th>Date Issued</th>

                <th>Invoice # / DC</th>

                <th>T/R#</th>

                @foreach($labels->unique('Name') as $rowlabels)

                <th>{{$rowlabels->Name}}</th>

                @endforeach

                <th>Station</th>

                @foreach($labels->unique('Name') as $rowlabels)

                <th>

                    <?php if($customer->customeNo == 124 or $customer->customeNo == 129 or $customer->customeNo == 139 or $customer->customeNo == 162 ){

                    echo "Rate Per Weight";

                }else{

                    echo "Rate Per " . $rowlabels->Name;

                } ?>

                </th>

                @endforeach

                <th>Total Frieght</th>

                @if($customer->customerName != 'UDL Distribution (pvt) ltd')

                <th>Tax Amount<br></th>

                <th>Total Amount</th>

                @endif

            </tr>

        </thead> 

            <?php  $counter = 1; ?>



            @foreach($bilty as $key => $row)

            

            <?php $getQty = DB::table('now_builtyitems')->where('builtyid',$row->id)->orderby('itemid','DESC')->get();  

             ?>



        <tbody>

            <tr>

                <td>{{$counter++}}</td>

                <td>{{$row->date}}</td>

                <td>{{$row->refno}}</td>

                <td>{{(!empty($row->builty_id) ? $row->builty_id : $row->id)}}</td>

                @foreach($labels->unique('Name') as $newlables)

                <td>

                    <?php

             

                  $rates = DB::table('now_builtyitems')->where('builtyid',$row->id)->get();

                  ?>



                    @foreach($rates as $rowrates)



                    <?php // $packagequantity[] = $rowrates->quantity; ?>

                    @if($newlables->PackageID == $rowrates->package_id)

                    <?php $packagequantity += $rowrates->quantity; ?>

                    {{$rowrates->quantity}}



                    @endif

                    @endforeach

                </td>



                @endforeach



                <td>

                    <?php

                  $station = DB::table('now_station') 

                     ->where('id',$row->to)

                     ->first();

                  ?>

                    {{$station->name}}

                </td>

                @foreach($labels->unique('Name') as $newlables1)

                <td>

                    <?php 

                $ratess = DB::table('now_builtyitems')->where('builtyid',$row->id)->get(); 

                $ratessys = DB::table('customer_ratelist')->where('customer_id',$customer->customeNo)->where('StationIdTo',$row->to)->orderByDesc('ID')->limit(1)->get();

                foreach($ratessys as $key1 =>  $rowrates16){

                    $finalrates = $rowrates16->rate;

                }

                 /// Here We Go

                ?>

                    @foreach($ratess as $key1 => $rowrates1)



                    @if($newlables1->PackageID == $rowrates1->package_id)

                    <?php 

                    if($customer->customeNo == 124 or $customer->customeNo == 129 or $customer->customeNo == 139  or $customer->customeNo == 162){

                        $total += $rowrates1->rate * ($rowrates1 == 'NULL' ? 1 : $rowrates1->weight);

                    }else{

                        $total += $rowrates1->rate * ($rowrates1 == 'NULL' ? 1 : $rowrates1->quantity);

                    }

                        ?>

                    {{number_format(($rowrates1->rate == 'NULL' ? 0 : $rowrates1->rate),2)}}



                    <?php $packagerate[] = ($rowrates1->rate == 'NULL' ? 0 : $rowrates1->rate) ?>



                    @endif

                    @endforeach

                </td>



                @endforeach





                <td> 

                    @foreach($packagerate as $key => $ratesofpackages)

                    

                    <?php  $total_get_qty = 1 ; 

                        if(isset($getQty) ){

                            if(isset($getQty[$key]) ){

                                if($getQty[$key]->quantity != 'NULL' || $getQty[$key]->quantity != ''){

                                    $total_get_qty = $getQty[$key]->quantity  ;

                                }else{

                                     $total_get_qty = 1 ;

                                }

                            }

                        } //sufyan

                    ?>

                    <?php

                    // $mytotalarr[] = $ratesofpackages * ($getQty[$key]->quantity == 'NULL'   ? 1 : $getQty[$key]->quantity); 

                    $mytotalarr[] = $ratesofpackages * ($total_get_qty); 

                    ?>

                    @endforeach



                    {{number_format($total,2)}}



                </td>



                <?php

               

                $totalfreight += $total ; 

                

                  $nettotal = ($total/100) * $data->tax_percentage;

                  

                 $totalPerc += $nettotal ;

                  $grandtotal =  $total + $nettotal;

                  $totalbill += $grandtotal;

                  

                  ?>



                @if($customer->customerName != 'UDL Distribution (pvt) ltd')

                <td> {{number_format($total * $data->tax_percentage/100,2)}} </td>

                <td> {{number_format($grandtotal,2)}} </td>

                @endif

            </tr>

            <?php

            $gtotal = 0;

               $total =0;

               $packagerate =[];

              // $packagequantity = [];

              // $packagequantity = [];

               $rowcounter += 1;

              

            ?>



            @if($rowcounter >=20)

            <?php $rowcounter = 0;

            $newbilltotal = $totalbill; 

            $newPerctotal = $totalPerc;

            $newfreighttotal = $totalfreight;

            

            

            $totalbill = 0;

            $totalPerc = 0;

            $totalfreight = 0;

            

             ?>



            <tr style="page-break-after: always !important;">

                <td> Page- # <?php echo $pg; ?> </td>

                <td></td>

                <td></td>

                <td></td>

                @foreach($labels->unique('Name') as $rowlabels)

                <td></td>

                @endforeach

                <td></td>

                @foreach($labels->unique('Name') as $rowlabels)

                <td></td>

                @endforeach

                <td> <b> {{number_format($newfreighttotal,2)}} <b> </td>

                @if($customer->customerName != 'UDL Distribution (pvt) ltd')

                <td> <b>{{number_format($newPerctotal,2)}}<b> </td>

                <td><b>{{number_format($newbilltotal,2)}}</b></td>

                @endif

            </tr>

    </table>









    <div style="width:100%;">

        <div style="float:left;width:40%;">

            <header>

                <img src="{{asset('selfcompany_image/'.$company->logo )}}" th="180px" height="70px"

                    style="padding:10px 0px 0px 0px;" />

            </header>

        </div>

        <div style="float:left;width:20%;text-align:center;">

            <center>

                <h3>SALE TAX INVOICE<br>Page # {{$pg + 1}} </h3>

            </center>

        </div>

        <div style="float:left;width:40%;text-align:center;">

            <h3> {{ ($company->id == 1 ? 'NEW SARHAD KARACHI' : "WAZIR LOGISTICS"  ) }} @if($company->id == 1 )<br>GOODS

                TRANSPORT CO.@endif</h3>

        </div>

        <div style="clear:both;"></div>

        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:50%;">

            <p><b>{{ ($company->id == 1 ? 'NTN#:5215306' : 'NTN#:3181351-8' ) }} </b>&nbsp; EMAIL:nskg_trco1@yahoo.com

            </p>

        </div>

        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:20%;">

            <p style="text-align:left;">SALE TAX INVOICE :

                <?php

                $cust = explode(' ',$customer->customerName);

                

                $result ='';

                echo date('ym',strtotime($data->bill_date));

                echo '/';

                foreach($cust as $name){

                    $result .= substr($name,0,1);

                }

                $wrd = substr($result,0,2);

                $wrd = str_replace('(',"",$wrd);

                $wrd = str_replace('&',"",$wrd);

                echo $wrd;



                ?>{{ $data->bill_Number }}

            </p>



        </div>

        <div class="lh" style="float:left;width:65%;border:1px solid #ccc;">

            <p style="text-align:left;padding:0px 5px;font-weight:bold;">CONSIGNER'S NAME: {{$customer->customerName}}

            </p>

        </div>

        <div style="clear:both;"></div>

        <!-- $bill_date =$record[0]->bill_date; -->

        <div style="float:left;width:30%;">BILLING MONTH : {{date('F/Y',strtotime($data->bill_date))}}

        </div>

        <br>

        <div style="float:left;width:30%;"><b>CONSIGNER'S NTN No : </b> {{ $customer->contact_point}}

        </div>



        <div style="float:left;width:30%">

            <center>

                <p> </p>

            </center>

        </div>

    </div>

    <div style="clear:both;padding:0;margin:0;"></div>

    <hr style="color:#ffb968;">

    <div style="clear:both;"></div>



    <table cellspacing="0" cell-padding="0" width="90%" border="1" class="breaker">

        <tr style="page-break-after: always !important;border: none; opacity:0;">

            <td style="border: none; opacity:0;"></td>



        </tr>



        <?php $pg++; ?>

        <?php 

         $mytotalarr1111[] =  $newbilltotal;

         $newPerctotal1111[] = $newPerctotal ;

         $newfreighttotal1111[] = $newfreighttotal;

         ?>



        <thead>

            <tr>

                <th width='1%' style='width:1%'>#</th>

                <th>Date Issued</th>

                <th>Invoice # 

                / DC</th>

                <th>T/R#</th>

                @foreach($labels->unique('Name') as $rowlabels)

                <th>{{$rowlabels->Name}}</th>

                @endforeach

                <th width='3%' style='width:3%'>Station</th>

                @foreach($labels->unique('Name') as $rowlabels)

                <th>Rate Per {{$rowlabels->Name}}</th>

                @endforeach

                <th>Total Frieght</th>

                @if($customer->customerName != 'UDL Distribution (pvt) ltd')

                <th>Tax Amount<br></th>

                <th>Total Amount</th>

                @endif

            </tr>

        </thead>





        @endif



        @endforeach



        <tr>

            <td width='1%' style='width:1%'> Page- 

            <br/># <?php echo $pg; ?> </td>

            <td></td>

            <td></td>

            <td></td>

            @foreach($labels->unique('Name') as $rowlabels)

            <td></td>

            @endforeach

            <td width='3%' style='width:3%'></td>

            @foreach($labels->unique('Name') as $rowlabels)

            <td></td>

            @endforeach



            <td><b><?php  echo  $totalfreight; ?></b></td>

            @if($customer->customerName != 'UDL Distribution (pvt) ltd')

            <td><b><?php  echo $totalPerc; ?></b></td>

            <td><b><?php echo number_format($totalbill,2); // echo $totalpageamount; ?></b></td>

            @endif

            <?php $mytotalarr1111[] =  $totalbill;?>

            <?php $mytotalarray[] =  $totalpageamount;?>

            <?php $mytotalarray_tax[] =  $totaltaxamount;?>

            <?php 

                $mytotalarray_freight[] =  $totalpagefreightamount;

                $newPerctotal1111[] = $totalPerc;

                $newfreighttotal1111[] = $totalfreight;

                

            ?>

        </tr>

        </tbody>

    </table>

    <?php

      $total = 0;

      $totalamount = 0;

      $totalpageamount = 0;

      $totalpagefreightamount = 0;

      $totalpagepackamount = 0;

      $totalQtyDisplay =0;

      

      

      ?>

    <span style="float:right;text-align:right;display:block;"></span>

    <br>

    <span style="float:right;text-align:right;display:block;"> </span>

    <div style="clear:both;"></div>

    <div style="width:100%;padding:5px;">

        <div style="float:left;width:40%;">

            <img src="{{asset('selfcompany_image/'.$company->logo )}}" th="180px" height="60px"

                style="padding:10px 0px 0px 0px;" />

        </div>

        <div style="float:left;width:10%;">

            <center>

                <h3>Bill Summary</h3>

            </center>

        </div>

        <div style="float:left;width:40%;text-align:right;">

            <h3> {{ ($company->id == 1 ? 'NEW SARHAD KARACHI' : "WAZIR LOGISTICS"  ) }} @if($company->id == 1 )<br>GOODS

                TRANSPORT CO.@endif</h3>

        </div>

        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:50%;">

            <p><b>{{ ($company->id == 1 ? 'NTN#:5215306' : 'NTN#:3181351-8' ) }} </b>&nbsp; EMAIL:nskg_trco1@yahoo.com

            </p>

        </div>

        <div style="clear:both;"></div>



        <div class="lh" style="float:left;width:20%;">

            <p style="text-align:left;">SALE TAX INVOICE :

                <?php

                $cust = explode(' ',$customer->customerName);

                $result ='';

                echo date('ym',strtotime($data->bill_date));

                echo '/';

                foreach($cust as $name){

                    $result .= substr($name,0,1);

                }

                $wrd = substr($result,0,2);

                $wrd = str_replace('(',"",$wrd);

                $wrd = str_replace('&',"",$wrd);

                echo $wrd;



                ?>{{ $data->bill_Number }}

            </p>

        </div>





        <div class="lh" style="float:left;width:85%;border:1px solid #ccc;">

            <p style="text-align:left;padding:0px 5px;font-weight:bold;">CONSIGNER'S NAME: {{$customer->customerName}}

            </p>

        </div>

        <div style="clear:both;"></div>

        <div style="float:left;width:32%;">BILLING MONTH : {{date('F/Y',strtotime($data->bill_date))}}

        </div>

        <br>

        <div style="float:left;width:30%;"><b>CONSIGNER'S NTN No : </b> {{ $customer->contact_point}}

        </div>



        <div style="width:100%">

            <center>

                <p> </p>

            </center>

        </div>

    </div>

    <div style="clear:both;padding:0;margin:0;"></div>

    <hr style="color:#ffb968;">

    <div style="clear:both;"></div>

    <div>

        <!--<img src="images/logo.jpg" style="z-index:0;top:50px;position:absolute;opacity: 0.2;-webkit-transform: rotate(-30deg);transform: rotate(-30deg);"/>-->

        <div style="width:50%;margin:0px auto;z-index:999;">

            <!-- amount start -->

            <table width="100%" cellspacing="0" border="1">

                <tr>

                    <th>Number of pages</th>

                    <th>Total freight per page</th>

                    <th>Total tax per page</th>

                    <th>Total amount per page</th>

                </tr>

                <?php

               $sr = 0;

               $ttls = 0;

               

               $ttls_tax = 0;

               $ttls_freight = 0;

          

               if(isset($mytotalarr1111) && sizeof($mytotalarr1111) > 0){

                   foreach($mytotalarr1111 as $myTtl){

                       $sr += 1;

                       echo '<tr><td>Total of Page #'.$sr.' </td>';

                       //echo '<td>'.$myTtl.'</td></tr>';

               

                       echo '<td>'.$newfreighttotal1111[$sr-1].'</td>';

                       echo '<td>'.$newPerctotal1111[$sr-1].'</td>';

                       echo '<td>'.number_format($myTtl,2).'</td></tr>';

                       

                        $ttls += $myTtl;

                        $ttls_tax +=$newPerctotal1111[$sr-1];

                        $ttls_freight += $newfreighttotal1111[$sr-1];

                     //    $ttls_tax = ($ttls_freight/100)*3;

               

                   }

               }else{

               ?>

                <tr>

                    <td> &nbsp; </td>

                    <td> &nbsp; </td>



                </tr>

                <?php } ?>



                <tr>

                    <th>Total Amount</th>

                    <th>{{ number_format($ttls_freight,2) }}</th>

                    <th>{{number_format($ttls_tax,2)}}</th>

                    <th>{{number_format($ttls,2)}}</th>

                </tr>

            </table>

        </div>

        @if($customer->customerName == 'UDL Distribution (pvt) ltd')

        <br />

        <div style="width:50%;margin:0px auto;z-index:999;">

            <table width="100%" cellspacing="0" border="1">

                <tr>

                    <th>Total Ctn/Bundle </th>

                    <th> Labour </th>

                    <th> Total Labour </th>

                    <th> Net Total </th>

                </tr>



                <tr>

                    <td> {{  number_format($packagequantity,2) }} </th>

                    <td> {{ $data->labour --}} </th>

                    <td> {{ $data->labour * $packagequantity }} </th>

                    <td> {{ number_format(($data->labour * $packagequantity +  $ttls),2) }} </th>

                </tr>

            </table>

        </div>

        @endif

        <table width="90%" cellspacing="20" style="position:absolute;bottom:30px;">

            <tr>

                <th style="width:23%;border-bottom:1px solid #000;">

                    <center>{{!empty($data->generatedby) ? $data->generatedby : '' }}</center>

                </th>

                <th style="width:23%;border-bottom:1px solid #000;"></th>

                <th style="width:23%;border-bottom:1px solid #000;"></th>

            </tr>

            <tr>

                <td>Prepared By</td>

                <td>Accountant</td>

                <td>Chief Executive</td>

            </tr>

        </table>

    </div>

    <div style="text-align:right;font-size:10px;align:bottom;">-By Dusky Solution</div>

    <div style="clear:both;" class="page-break"></div>

    <div style="width:95%;padding:5px;margin-top:15px;">

        <div style="float:left;width:40%;">

            <img src="{{asset('selfcompany_image/'.$company->logo )}}" th="180px" height="60px"

                style="padding:10px 0px 0px 0px;" />

        </div>

        <div style="float:left;width:15%;">

            <center>

                <h3>Sales Tax Invoice</h3>

            </center>

        </div>

        <div style="float:left;width:40%;text-align:right;">

            <h3> {{ ($company->id == 1 ? 'NEW SARHAD KARACHI' : "WAZIR LOGISTICS"  ) }} @if($company->id == 1 )<br>GOODS

                TRANSPORT CO.@endif</h3>

        </div>

        <div style="clear:both;"></div>

        <div class="lh" style="float:left;width:50%;">

            <p><b>{{ ($company->id == 1 ? 'NTN#:5215306' : 'NTN#:3181351-8' ) }}</b>&nbsp; EMAIL:nskg_trco1@yahoo.com

            </p>

        </div>

        <div style="clear:both;"></div>



        <div class="lh" style="float:left;width:20%;">

            <p style="text-align:left;">SALE TAX INVOICE :

                <?php

                $cust = explode(' ',$customer->customerName);

             

                $result ='';

                echo date('ym',strtotime($data->bill_date));

                echo '/';

                foreach($cust as $name){

                    $result .= substr($name,0,1);

                }

                $wrd = substr($result,0,2);

                $wrd = str_replace('(',"",$wrd);

                $wrd = str_replace('&',"",$wrd);

                echo $wrd;



                ?>{{ $data->bill_Number }}

            </p>

        </div>





        <div class="lh" style="float:left;width:85%;border:1px solid #ccc;">

            <p style="text-align:left;padding:0px 5px;font-weight:bold;">CONSIGNER'S NAME: {{$customer->customerName}}

            </p>

        </div>

        <div style="clear:both;"></div>

        <div style="float:left;width:32%;">BILLING MONTH : {{date('F/Y',strtotime($data->bill_date))}}

        </div>

        <br>

        <div style="float:left;width:30%;"><b>CONSIGNER'S NTN No : </b> {{ $customer->contact_point}}

        </div>



        <div style="width:100%">

            <center>

                <p> </p>

            </center>

        </div>

    </div>

    <div style="clear:both;padding:0;margin:0;"></div>

    <hr style="color:#ffb968;">

    <div style="clear:both;"></div>



    <div>

<?php 

$fuelamount=0;

$labour=$data->labour?$data->labour:0;

$fuel=$data->fuelCharge?$data->fuelCharge:0;

$fuelamount=($fuel/100)*$ttls_freight;



?>

        <img src="{{asset('selfcompany_image/'.$company->logo )}}"

            style="z-index:0;top:50px;position:absolute;opacity: 0.2;-webkit-transform: rotate(-30deg);transform: rotate(-30deg);@elsez-index:0;top:300px;left:30%;position:absolute;opacity: 0.2;-webkit-transform: rotate(-30deg);transform: rotate(-30deg);width: 35%;" />

        <div style="width:100%;margin:0px auto;z-index:999;align:center;width:70%;">

            <table width="100%" cellspacing="0" border="1">

                <thead>

                    <tr>

                        <th style="width:10px !important;">S.NO</th>

                        <th style="width:20px !important;">Description</th>

                        <th style="width:20px !important;">Total No of Ctn/Qty</th>

                        <th style="width:20px !important;">Value Exclusive of Srb</th>

                        <th style="width:20px !important;">Fuel adj{{$fuel}}%</th>

                         <th style="width:20px !important;">Labour amount</th>

                         <th style="width:20px !important;">SRB {{$data->tax_percentage}}% amount</th>

                        <th style="width:20px !important;">Value Inclusive of SRB</th>

                    </tr>

                </thead>

                <tbody>



                    <tr>

                        <td>1</td>

 

                        <td>Transporation Freight</td>

                        <td>{{ number_format($packagequantity,2) }}</td>

                        <td>{{ number_format($ttls_freight,2) }}</td>

                        <td>{{ number_format($fuelamount,2)}}</td>

                        <td>{{ $labour}}</td>

                        <?php
                        $net_total_without_srb=($ttls_freight + $fuelamount + $labour);
                        $srb_amount = (($ttls_freight + $fuelamount + $labour) * ($data->tax_percentage / 100));
                        ?>

                        <td>{{ number_format($srb_amount,2)}}</td>

                        <td>{{ number_format($net_total_without_srb+$srb_amount,2)  }}</td>

                    </tr>

                </tbody>

            </table>

            <div style="clear:both;"></div>

            <br>

            <br>

            <br>

            <?php

         Session::forget('hello');  

         Session::forget('hello1');  
 
         ?>

            <div class="lh" style="float:right;width:30%;">

                <p style="border: 1px solid #000;padding: 5px 5px;border-collapse: collapse;"><b>Net

                        Amount 1:</b>&nbsp;&nbsp; {{ number_format($ttls_freight,2) }}</p>

                @if(number_format($fuelamount, 2) > 0) 
                
                <p style="border: 1px solid #000;padding: 5px 5px;border-collapse: collapse;"><b>Fuel adj </b>&nbsp;&nbsp; {{$data->fuelCharge}}%:</b>&nbsp;&nbsp; {{ number_format($fuelamount, 2)}}</p>
                
                @endif
                
                
                
                @if(number_format($labour, 2) > 0) 

                <p style="border: 1px solid #000;padding: 5px 5px;border-collapse: collapse;"><b>Labour:</b>&nbsp;&nbsp; {{ number_format($labour, 2)}}</p>
                
                @endif

          

                <p style="border: 1px solid #000;padding: 5px 5px;border-collapse: collapse;"><b>Total Amount:</b>&nbsp;&nbsp; {{ number_format($net_total_without_srb, 2)}}</p>
                
         

                @if(number_format($srb_amount, 2) > 0)        

                <p style="border: 1px solid #000;padding: 5px 5px;border-collapse: collapse;"><b>SRB

                        {{$data->tax_percentage}}%:</b>&nbsp;&nbsp; {{ number_format($srb_amount, 2)}}</p>

                @endif
 
                
                
                <p style="border: 1px solid #000;padding: 5px 5px;border-collapse: collapse;"><b>Grand

                        Total:</b>&nbsp;&nbsp; {{ number_format($net_total_without_srb + $srb_amount,2)}} </p>

            </div>

            <div style="clear:both;"></div>

            <br>

            <br>

            <br>

            <div class="lh" style="float:left;width:30%;">

                <hr style="width:50%;text-align:left;margin-left:0">

                <p>Signature</p>

            </div>

        </div>

        <!--END OF BILL -->

        </body>



</html>