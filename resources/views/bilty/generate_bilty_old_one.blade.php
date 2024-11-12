<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilty</title>
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

        .info-table th, .info-table td {
            border: 1px solid #ddd;
            padding: 1px;
            text-align: left;
            font-size: 13px;
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
    
    .print-date {
    height: 100%; /* Height of the container */
}

.farhan {
    display: block; /* Ensure the span acts like a block */
    width: 100px;   /* Fixed width for the span */
    height: 100%;   /* The span height fills the parent container */
}

.farhan svg {
    width: 100%;  /* Adjust the SVG to fill the container's width */
    height: 100%; /* Adjust the SVG to fill the container's height */
}

    @media print {
        .print-footer {
            display: block;
        }
    }
</style>
</head>
@php
    $path  = url("generated-qr/$id");
    $qrcode = QrCode::size(400)->generate($path);
    $company = $data['company'];
    $logo = asset('images/' . $company[0]->logo);
    $bilty = DB::table('now_builty')->where('id',$id)->first();
    $customer = '';
    $cstArray = false;
    if(empty($bilty->customer)){
        $customer = DB::table('customer', '=' , $bilty->customer_id)->first(); 
        $cstArray = true;
    }else{
        $customer = $bilty->customer;
        $cstArray = false;
    }
    
    
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
                .company-address {
                    margin: 5px 0 0 0;
                    font-size: 12px; /* Smaller font size for the address */
                    color: #555; /* Optional: lighter color for the address */
                }
            </style>
            <div class="company-name">
                {{$company[0]->name}}
                <p class="company-address">Address:{{$company[0]->address}}</p> <!-- Address inside a paragraph with class -->            
            </div>

            <!-- Date of Print -->
            <div class="print-date">
                <span class="farhan">
                    {!! $qrcode !!}
                </span>
            </div>
        </div>

        <!-- Customer Info & Bilty Info in Separate Tables -->
        <div class="table-container">
            <!-- Customer Info Table -->
            @if($cstArray == true)
                <table class="info-table left-table">
                <tr>
                    <th colspan="2">Customer Info</th>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>{{$customer->name}}</td>
                </tr>
                <tr>
                    <td>Phone No:</td>
                    <td>{{isset($customer->phone) ? $customer->phone : ''}}</td>
                </tr>
                <tr>
                    <td>Credit Days:</td>
                    <td>{{isset($customer->credit_days) ? $customer->credit_days : ''}}</td>
                </tr>
            </table>
            @else
                <table class="info-table left-table">
                    <tr>
                        <th colspan="2">Customer Info</th>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td>{{$customer}}</td>
                    </tr>
                </table>

            @endif
            <!-- Invoice Info Table -->
            <table class="info-table right-table">
                <tr>
                    <th colspan="2">Bilty Info</th>
                </tr>
                <tr>
                    <td>Bilty No:</td>
                    <td>{{$bilty->builty_id}}</td>
                </tr>
                <tr>
                    <td>RFQ:</td>
                    <td>{{$bilty->job_inquiry_code}}</td>
                </tr>
                <tr>
                    <td>Job No.:</td>
                    <td>{{$bilty->computerno}}</td>
                </tr>
                <tr>
                    <td>Bilty Date:</td>
                    <td>{{$bilty->date}}</td>
                </tr>
            </table>
        </div>
        
        <table style="width:100%; background-color:#f2f2f2; text-align:center;">
            <thead>
                <tr>
                    <th>From: {{$bilty->from}}</th>  <!-- First heading: From -->
                    <th>To: {{$bilty->to}}</th>   <!-- Second heading: To -->
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        
        

<!-- Footer text at the bottom of the print page -->
<div class="print-footer">
    This is System Generated Report. powered by Yaaft
</div>
    
    </div>

    <script>
        $(document).ready(function() {
            const currentDate = new Date();
            const formattedDate = currentDate.toLocaleDateString('en-GB');
            $('#current-date').text(formattedDate); // Set the current date

            // Number to Words Function
            function numberToWords(num) {
                const c = ["", "thousand", "million", "billion", "trillion"];
                const a = [
                    "zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine",
                    "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen",
                    "seventeen", "eighteen", "nineteen"
                ];
                const b = [
                    "", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"
                ];

                if (num < 20) return a[num];
                if (num < 100) return b[Math.floor(num / 10)] + (num % 10 ? " " + a[num % 10] : "");
                if (num < 1000) return a[Math.floor(num / 100)] + " hundred" + (num % 100 ? " " + numberToWords(num % 100) : "");

                let word = "";
                let i = 0;
                while (num > 0) {
                    if (num % 1000 !== 0) {
                        word = numberToWords(num % 1000) + (i > 0 ? ' ' + c[i] : '') + (word ? ' ' + word : '');
                    }
                    num = Math.floor(num / 1000);
                    i++;
                }
                return word.trim();
            }

            // Calculate Total Freight Amount
            let totalFreight = 0;
            $('.freight-amount').each(function() {
                totalFreight += parseFloat($(this).text());
            });

            // Display Total Amount in Freight Table
            $('.total-freight').text(totalFreight.toFixed(2)); // Display total amount in PKR

            // Display Total Amount in Words
            $('#amount-in-words').text(numberToWords(totalFreight));

            // Calculate Sales Tax
            const salesTaxRate = 0.15; // 15%
            
            const salesTaxSRB = totalFreight * salesTaxRate; // 15% of Total Freight
            const salesTaxPRA = totalFreight * salesTaxRate; // 15% of Total Freight
        
            $('tr').each(function() {
                // Get the tax name and percentage from the data attributes
                var taxName = $(this).find('td[data-tax-name]').data('tax-name');
                var taxPercentage = $(this).find('td[data-tax-percentage]').data('tax-percentage');
                
                // Convert the percentage to a numeric value (remove the '%' symbol)
                var percentageValue = parseFloat(taxPercentage);
        
                // Example calculation: assuming $expenseDivision is available
                var expenseDivision = 1000; // Example value, replace with your actual value
                var taxValue = (totalFreight * percentageValue) / 100;
        
                // Log the tax name, percentage, and calculated value
                console.log('Tax Name: ' + taxName);
                console.log('Tax Percentage: ' + taxPercentage);
                console.log('Calculated Tax Value: ' + taxValue);
        
                // Update the table with the calculated tax value
                $(this).find('.sales-tax-srb').text(taxValue.toFixed(2));
            });



            // // Display Sales Tax Amounts
            // $('.sales-tax-srb').text(salesTaxSRB.toFixed(2)); // Display SRB Sales Tax
            // $('.sales-tax-pra').text(salesTaxPRA.toFixed(2)); // Display PRA Sales Tax

            // Display Total Amount Tax
            const totalSalesTax = salesTaxSRB + salesTaxPRA;
            $('.total-amount-tax').text(totalSalesTax.toFixed(2)); // Display total sales tax amount
        });
    </script>
</body>
</html>
