@php
$domestic_total = 0;
$export_total= 0;
$export_perc= 0;
$export_net = 0;

@endphp
<div class="monthlybillings">
    <h6>MONTHLY BILLINGS</h6>
    <h3>NEW SARHAD KARACHI GOODS TRANSPORT CO</h3>
    <h5>{{date('F - Y',strtotime($month))}}</h5>
    <table>
        <tr>
            <th>S.NO</th>
            <th>COMPANY NAME</th>
            <th>DOMESTIC</th>
            <th>EXPORT</th>
            <th>23% KARACHI</th>
            <th>77% AFG</th>
        </tr>
        @foreach($bills as $key => $bill)
        
        <?php
         $taxamountss = DB::table('now_builty')
                    ->selectRaw('SUM(now_builtyitems.rate * now_builtyitems.quantity) as total')
                    ->join('now_station','now_builty.to','now_station.id')
                    ->join('now_builtyitems','now_builty.id','now_builtyitems.builtyid')
                    ->WhereBetween('now_builty.date',[$bill->bill_date,$bill->end_date])
                    ->where('now_station.station_type_name','=','Domestic')
                    ->where('now_builty.customer',$bill->bill_customer)
                    ->get();
         $totalperce = $taxamountss[0]->total * ($bill->tax_percentage / 100);
         $rp = $taxamountss[0]->total + $totalperce;
        ?>
        
        <tr>
            <td style="text-align: center;">{{++$key}}</td>
            <td style="font-weight: bold;">{{$bill->name}}</td>
            <td align="center">@if($bill->desType == 'Domestic') @php $domestic_total += $bill->total;  @endphp {{number_format(round($rp))}} @else - @endif</td>
            <td align="center" >@if($bill->desType == 'Export') @php $export_total += $bill->total; @endphp {{number_format(round($bill->total))}}  @else - @endif</td>
            <td align="center" style="font-weight: bold;"> @if($bill->desType == 'Export') @php $export_perc += $bill->total * 0.23; @endphp  {{number_format(round($bill->total * 0.23))}}  @else - @endif </td>
            <td align="center">@if($bill->desType == 'Export') @php $export_net += $bill->total - ($bill->total * 0.23); @endphp {{number_format(round( $bill->total - ($bill->total * 0.23) ))}}  @else - @endif</td>
        </tr>
      @endforeach
        <tr>
            <td style="text-align: right;"></td>
            <td style="font-weight: bold;">GRAND TOTAL</td>
            <td>{{number_format(round($domestic_total))}}</td>
            <td>{{number_format(round($export_total))}}</td>
            <td style="font-weight: bold;">{{number_format(round($export_perc))}}</td>
            <td>{{number_format(round($export_net))}}</td>
        </tr>
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