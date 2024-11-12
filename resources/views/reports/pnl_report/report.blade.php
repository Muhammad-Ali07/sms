<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['title'] }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Container to center content */
        .container {
            width: 80%;
            margin: 0 auto;
        }

        .bill-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 2px solid #000;
        }

        .bill-header .logo img {
            width: 200px;
        }

        .bill-header .company-name {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            flex-grow: 1;
        }

        .bill-header .print-date {
            text-align: right;
            font-size: 14px;
        }

        /* Table styles */
        .info-table {
            width: 30%; /* Set to a maximum of 30% */
            border-collapse: collapse; /* Collapses borders to avoid double borders */
            margin: 20px 0; /* Space above and below the table */
        }

        .info-table th, .info-table td {
            border: 1px solid #ddd; /* Border for each cell */
            padding: 5px; /* Minimal padding */
            text-align: left;
        }

        .info-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Space between the two tables */
        .table-container {
            display: flex;
            justify-content: space-between; /* Aligns the tables to the sides */
            gap: 20px; /* Space between the two tables */
        }

        /* New Invoice Details Table */
        .invoice-details-table {
            width: 100%; /* Full width */
            border-collapse: collapse; /* Collapses borders to avoid double borders */
            margin-top: 20px; /* Space above the invoice details table */
        }

        .invoice-details-table th, .invoice-details-table td {
            border: 1px solid #ddd; /* Border for each cell */
            padding: 5px; /* Minimal padding */
            text-align: left;
        }

        .invoice-details-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Styles for Total Amount in Words */
        .total-amount {
            font-weight: bold; /* Bold text */
            margin-top: 20px; /* Space above the total amount */
        }

        /* Sales Tax Table Styles */
        .sales-tax-table {
            width: 50%; /* Full width */
            border-collapse: collapse; /* Collapses borders to avoid double borders */
            margin-top: 20px; /* Space above the sales tax table */
            text-align: left;
        }

        .sales-tax-table th, .sales-tax-table td {
            border: 1px solid #ddd; /* Border for each cell */
            padding: 5px; /* Minimal padding */
        }

        .sales-tax-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

         .container {
            margin-top: 20px;
        }
        .terms-conditions {
            width: 50%;
            padding-right: 20px; /* Spacing between columns */
        }
        .sales-tax-table {
            width: 50%;
        }
        .flex-container {
            display: flex;
            justify-content: space-between;
        }

        .additional-info {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}

.left-column {
    width: 70%;
}

.right-column {
    width: 25%;
    text-align: center;
}

    </style>
    <style>
    /* Style for the footer text */
    .print-footer {
        /*position: fixed;*/
        bottom: 0;
        left: 50%;
        /*transform: translateX(-50%);*/
        text-align: center;
        font-size: 12px; /* Adjust the size as needed */
        width: 100%;
        margin-top: 20px; /* Add margin to the top */
    }

    @media print {
        .print-footer {
            display: block;
        }
    }
</style>
</head>
@php
    $report_name = $data['report_name'];
    $company = session('company');
    $logo = asset('images/' . $company[0]->logo);
    $fromDate = $data['from_date'];
    $toDate = $data['to_date'];
    $mergedResults = $data['ji'];
@endphp
<body>

    <div class="container">
        <!-- Bill Header -->
        <div class="bill-header">
            <!-- Company Logo -->
            <div class="logo">
                <img src="{{ $logo }}" alt="Company Logo">
            </div>

            <!-- Company Name -->
            <style>
                .manager-name {
                    text-transform: none; /* Ensures the text is not capitalized */
                    font-weight: normal; /* Makes the text not bold */
                    font-size: 0.8em; /* Adjusts the font size to be smaller than the company name */
                    display: block; /* Ensures it appears on a new line */
                    margin-top: 4px; /* Adds some space between the company name and manager name */
                }
            </style>
            <div class="company-name">
                {{$data['report_name']}}
                <br>
                <span class="manager-name">PNL Report</span>
            </div>
            <!-- Date Range -->
            <div class="date-range" style="font-size: 12px; margin-top: 5px;">
                <p>From: {{ $fromDate }}</p>
                <p>To: {{ $toDate }}</p>
            </div>

        </div>
        <style>
            .bg-light-primary {
                background-color: #cce5ff; /* Light primary color */
                color: #004085; /* Darker text for contrast */
            }
            
            .bg-light-red {
                background-color: #f8d7da; /* Light red color */
                color: #721c24; /* Darker text for contrast */
            }
            
            .bg-light-yellow {
                background-color: #fff3cd; /* Light yellow color */
                color: #856404; /* Darker text for contrast */
            }

        </style>
        <table class="invoice-details-table">
            <tr>
                <th>Sr No</th>
                <th>Date</th>
                <th>Type</th>
                <th>Particular</th>
                <th>Buying Amount</th>
                <th>Selling Amount</th>
                <th>Total</th>
            </tr>
            <tbody>
                @php
                    $sr = 1;
                    $total_total_buying = 0;
                    $total_total_selling = 0;

                @endphp
                @foreach ($mergedResults as $mr )
                
                    @php
                        if(isset($mr->builty_id)){
                            $total_buying = DB::table('now_bilty_puchase_expense')->where('bilty_id', '=' , $mr->id)->sum('amount'); 
                            $total_selling = DB::table('now_bilty_selling_expense')->where('builty_id', '=' , $mr->id)->sum('amount'); 
                            $total_balance = $total_selling - $total_buying;
                        }
                    @endphp
                    <!--<tr class="-->
                    <!--        @if(isset($mr->builty_id))-->
                    <!--            bg-light-primary-->
                    <!--        @elseif(isset($mr->Expense_Name))-->
                    <!--            bg-light-red-->
                    <!--        @else-->
                    <!--            bg-light-yellow-->
                    <!--        @endif-->
                    <!--    ">-->
                    <tr>
                        <td>{{ $sr }}</td>
                        <td>{{ $mr->date }}</td>
                        <td>
                            @if(isset($mr->builty_id))
                                Builty
                            @elseif(isset($mr->Expense_Name))
                                Expense
                            @else
                                Salary
                            @endif
                        </td>                        
                        
                            <td>
                                
                                @if(isset($mr->builty_id))
                                    {{$mr->job_inquiry_code}}
                                @elseif(isset($mr->Expense_Name))
                                    {{$mr->Expense_Amount}}
                                @else
                                    Salary
                                @endif
                            </td>

                            <td>
                                @if(isset($mr->builty_id))
                                    {{$total_buying}}
                                @elseif(isset($mr->Expense_Name))
                                    {{$mr->Expense_Amount}}
                                @else
                                    Salary
                                @endif
                            </td>

                            <td>
                                @if(isset($mr->builty_id))
                                    {{$total_selling}}
                                @elseif(isset($mr->Expense_Name))
                                    -                                
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                @if(isset($mr->builty_id))
                                    {{$total_balance}}
                                @elseif(isset($mr->Expense_Name))
                                    -
                                @else
                                    -
                                @endif
                            </td>
                        
                    </tr>
                    @php
                    
                        $sr++;
                        $total_total_buying += $total_buying;
                        $total_total_selling += $total_selling;
                    @endphp
                @endforeach
                    <tr>
                        <td colspan="5">Total</td>
                        <td >{{$total_total_buying}}</td>
                        <td>{{$total_total_selling}}</td>

                    </tr>
            </tbody>
        </table>

<!-- Footer text at the bottom of the print page -->
<div class="print-footer mt-5">
    This is System Generated Report. powered by Yaaft
</div>

    </div>
</body>
</html>

