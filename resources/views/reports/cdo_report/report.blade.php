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
        bottom: 0;
        left: 50%;
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

    <style>
        .download-buttons {
            margin-top: 10px;
        }
    </style>
</head>
@php
    $report_name = $data['report_name'];
    $company = session('company');
    $logo = asset('images/' . $company[0]->logo);
    $fromDate = $data['from_date'];
    $toDate = $data['to_date'];
    $cdo = $data['cdo'];
@endphp
<body>

    <div class="container" id="container_div">
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
                <span class="manager-name">CDO REPORT</span>
            </div>
            <!-- Date Range -->
            <div class="date-range" style="font-size: 12px; margin-top: 5px;">
                <div class="download-buttons">
                    <button id="download_pdf" style="padding: 5px 10px; font-size: 12px;">
                        Download as PDF
                    </button>
                    
                    <button id="download_excel" style="padding: 5px 10px; font-size: 12px;">
                        Download as Excel
                    </button>
                </div>
            </div>

        </div>

        <table class="invoice-details-table" id="invoice-details-table">
            <tr>
                <th>Job No#</th>
                <th>Container No#</th>
                <th>Placement Date</th>

            </tr>
            <tbody>
                @php
                    $sr = 1;
                @endphp
                @foreach ($cdo as $c )
                    @php
                        $cdo_dtl = DB::table('initialization_dtl')->where('initialization_id','=',$c->id)->get();
                    @endphp
                    <tr>
                         <th colspan="3">CDO # {{ $c->csm_no }}</th>
                        @if(!empty($cdo_dtl) && count($cdo_dtl) > 0)
                            @foreach($cdo_dtl as $c_dtl)
                                <tr>
                                    <td>{{ $c_dtl->job_no }}</td>
                                    <td>{{ $c_dtl->container_no }}</td>
                                    <td>{{ $c_dtl->placement_date }}</td>

                                    <!-- Add more columns as needed -->
                                </tr>
                            @endforeach
                        @endif
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
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
<script>
    $(document).ready(function () {
        // PDF Download Button Click
        $('#download_pdf').on('click', function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({
                orientation: 'portrait', // Use 'landscape' if you have wide tables
                unit: 'pt', // Switch to points for finer control over positioning
                format: 'a4'
            });
        
            doc.html(document.getElementById('container_div'), {
                callback: function (doc) {
                    doc.save('Report.pdf');
                },
                x: 60, // Horizontal offset to center content; adjust as needed
                y: 30, // Vertical offset from top
                html2canvas: {
                    scale: 0.5 // Scale content down for better fit and centering
                }
            });
        });

        // Excel Download Button Click
        $('#download_excel').on('click', function () {
            const table = document.getElementById('invoice-details-table');
            const workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
            XLSX.writeFile(workbook, 'Report.xlsx'); // Save the Excel file
        });
    });
</script>
</body>
</html>

