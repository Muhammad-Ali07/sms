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
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
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
    $broker = $data['broker'];
    $job_inquiries = $data['ji'];
    // dump($job_inquiries);

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
                <span class="manager-name">{{ $broker->broker_name }}</span>
            </div>
            <!-- Date Range -->
            <div class="date-range" style="font-size: 12px; margin-top: 5px;">
                <p>From: {{ $fromDate }}</p>
                <p>To: {{ $toDate }}</p>
            </div>

        </div>

        <table class="invoice-details-table">
            <tr>
                <th>Sr No</th>
                <th>RFQ No#</th>
                <th>Job Id</th>
                <th>Customer Type</th>
                <th>Bilty type</th>
                <th>Bilty Status</th>
                <th>Payment Status</th>
            </tr>
            <tbody>
                @php
                    $sr = 1;
                @endphp
                @foreach ($job_inquiries as $ji )
                    @php
                        $builty = DB::table('now_builty')->where('job_inquiry_id',$ji->id)->first();
                        // dd($builty);

                        $status = '';

                        if($builty){
                            $bill = DB::table('bill')
                                                ->select('total', 'r_total')
                                                ->where('bilty_no', 'LIKE', '%"'.$builty->builty_id.'"%')
                                                ->first();
                            $tracking = DB::table('tracking')->where('builty_id', '=' ,$builty->builty_id)->orderBy('id','desc')->first();

                            if ($bill) {
                                // Bilty is already used in a bill, and we have the total and r_total columns
                                if($bill->r_total == 0){
                                    $status = 'Full Bill Paid';
                                }else if($bill->r_total < $bill->total){
                                    $status = 'Partially Bill Paid';
                                }else{
                                    $status = 'Unpaid';
                                }
                            } else {
                                    $status = 'Not used in bill';
                            }
                        }else{
                            $tracking = '';
                            $status = 'No Builty made!';
                        }
                    @endphp
                    <tr>
                        <td>{{ $sr }}</td>
                        <td>{{ $ji->code }}</td>
                        <td>{{ $ji->job_inquiry_id }}</td>
                        <td>{{ $ji->cutomer_type }}</td>
                        <td>{{ $ji->Builtytype }}</td>
                        <td>{{!empty($tracking) ? $tracking->status : ''}}</td>
                        <td>{{ $status }}</td>

                    </tr>
                    @php
                        $sr++;
                    @endphp
                @endforeach
            </tbody>
        </table>

<!-- Footer text at the bottom of the print page -->
<div class="print-footer">
    This is System Generated Report. powered by Yaaft
</div>

    </div>
</body>
</html>
