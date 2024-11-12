@php
    $counter = 1;
    $grandTotal = 0;
    $grandSrf = 0;
    $grandNet = 0;
@endphp

<div class="monthlybillings">
    <h6>Out Standing Billing</h6>
    <h3>NEW SARHAD KARACHI GOODS TRANSPORT CO</h3>
    <h5>{{-- date('F - Y',strtotime($month)) --}}</h5>
    <table>
        @if($customer == 'all')
        <tr>
            <th>S.NO</th>
            <th>COMPANY NAME</th>
            <th>Value EXCLUSIVE</th>
            <th>SRB TAX</th>
            <th>Value INCLUSIVE</th>
            <!--<th></th>-->
          
        </tr>
        
        @foreach($bills as $key => $bill)
        @php 
            
            $remaningAmount = 0;
            $customer = explode('_',$key);
            
           
            $remainings =  DB::table('paidreceipt_metas')->where('customerid',$customer[0])->get();
            foreach($remainings as $remaining){
                $remaningAmount += $remaining->received;
            }
            
            $total = array_sum($bill) - $remaningAmount;
            $srb = $total * 0.03;
            $net = $total + $srb;
            
            $grandTotal += $total;
            $grandSrf += $srb;
            $grandNet += $net;
        @endphp 
       
        <tr>
            <td style="text-align: center;">{{$counter++}}</td>
            <td style="font-weight: bold;">{{$customer[1]}}</td>
            <td align="center">{{number_format($total ,2)}}</td>
            <td align="center" >{{number_format($srb,2)}}</td>
            <td align="center" style="font-weight: bold;"> {{number_format($net,2)}}</td>
            <!--<td align="center"></td>-->
        </tr>
      @endforeach
      <tr>
            <td style="text-align: right;"></td>
            <td style="font-weight: bold;">GRAND TOTAL</td>
            <td align="center"> {{number_format($grandTotal,2)}} </td>
            <td align="center">{{number_format($grandSrf,2)}}</td>
            <td align="center" style="font-weight: bold;">{{number_format($grandNet,2)}}</td>
            <!--<td align="center" ></td>-->
        </tr>
        
      @else
       @php $total = 0; @endphp
     <tr>
            <th>S.NO</th>
            <th>COMPANY NAME</th>
            <th>Billing Month</th>
            <th>Type Of Bill</th>
            <th>Bill No</th>
            <th>Amount</th>
          
        </tr>
       
        @foreach($bills as $key => $bill)
            @php $total += $bill->total @endphp
            <tr>
                <td style="text-align: center;">{{++$key}}</td>
                <td style="font-weight: bold;">{{$bill->name}}</td>
                <td align="center">{{date('F-Y',strtotime($bill->bill_date))}}</td>
                <td align="center" >{{$bill->desType}}</td>
                <td style="font-weight: bold;" align="center" > {{$bill->bill_Number}}</td>
                <td align="center">{{number_format($bill->total,2)}}  </td>
            </tr>
        
            
      @endforeach
        <tr>
            
            <td style="font-weight: bold;" colspan='5'>TOTAL</td>
            
            <td align="center" >{{number_format($total)}}</td>
        </tr>
      @endif
      
    </table>
</div>
<!--monthlybillings close-->
<style>
    .monthlybillings table {
        position: relative;
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        font-family: sans-serif;
    }
    .monthlybillings table tr {
        position: relative;
        width: 100%;
    }
    .monthlybillings table tr td {
        border: 1px solid #000;
        font-weight: 500;
        font-size: 14px;
        font-family: sans-serif;
        color: #000;
        padding: 2px 5px;
    }
    .monthlybillings table tr td span {
        float: right;
        margin-right: 10px;
    }
    .monthlybillings table tr th {
        border: 1px solid #000;
        font-weight: 500;
        font-size: 14px;
        font-family: sans-serif;
        color: #1f4986;
        padding: 2px 5px;
    }
    * {
        position: relative;
        font-family: sans-serif !important;
    }
    .monthlybillings {
        position: relative;
        width: 100%;
    }
    .monthlybillings h6 {
        position: relative;
        width: 100%;
        margin: 0px 0px;
        text-align: center;
    }
    .monthlybillings h3 {
        position: relative;
        width: 100%;
        margin: 0px 0px;
        text-align: center;
        color: #bb1100;
        margin: 5px 0px;
    }
    .monthlybillings h5 {
        position: relative;
        width: 100%;
        margin: 0px 0px;
        text-align: center;
    }
</style>