<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
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
    $data = $datas['data'];
    $customer = $datas['customer'];
    $company = $datas['company'];
    $logo = asset('images/' . $company[0]->logo);
    $bilty = $datas['bilty'];
    $taxes = $datas['taxes'];
    
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
            <div class="company-name">
                {{$company[0]->name}}
            </div>

            <!-- Date of Print -->
            <div class="print-date">
                Date: <span id="current-date"></span>
            </div>
        </div>

        <!-- Customer Info & Invoice Info in Separate Tables -->
        <div class="table-container">
            <!-- Customer Info Table -->
            <table class="info-table left-table">
                <tr>
                    <th colspan="2">Customer Info</th>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>{{$customer->customerName}}</td>
                </tr>
                <tr>
                    <td>Phone No:</td>
                    <td>23344555566</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>Street 5, XYZ, City, State, Country</td>
                </tr>
            </table>

            <!-- Invoice Info Table -->
            <table class="info-table right-table">
                <tr>
                    <th colspan="2">Invoice Info</th>
                </tr>
                <tr>
                    <td>Bill Reference No:</td>
                    <td>{{$data->bill_Number}}</td>
                </tr>
                <tr>
                    <td>Sales Tax Invoice No:</td>
                    <td>456789</td>
                </tr>
                <tr>
                    <td>Bill Date:</td>
                    <td>{{$data->bill_date}}</td>
                </tr>
                <tr>
                    <td>Tata Textile No:</td>
                    <td>345678</td>
                </tr>
            </table>
        </div>

        <table class="invoice-details-table">
            <tr>
                <th>Sr No</th>
                <th>Bilty No</th>
                <th>Job Id</th>
                <th>Bilty Date</th>
                <th>Vehicle No</th>
                <th>Local No</th>
                <th>Freight Amount (PKR)</th>
            </tr>
            @php
                 $sr = 1;
            @endphp
            @foreach($bilty as $b)
                @php
                    $expenses = DB::table('now_bilty_selling_expense')
                        ->where('builty_id', $b->id)  // Filter by the specific builty_id
                        ->select('id', 'builty_id', 
                                 DB::raw('REPLACE(amount, ",", "") as amount'),  // Remove commas from the amount
                                 'description', 'created_at')
                        ->get();
                    $total_expense = 0;
                    foreach($expenses as $e){
                        $total_expense += $e->amount;
                    }
                @endphp
                <tr>
                    <td>{{$sr}}</td>
                    <td>
                        {{$b->builty_id}}
                    </td>
                    <td>{{$b->computerno}}</td>
                    <td>{{$b->date}}</td>
                    <td>{{$b->local_vehicle_no}}</td>
                    <td>{{$b->local_mobile_no}}</td>
                    <td class="freight-amount">{{$total_expense}}</td>
                </tr>
                @php $sr++; @endphp
            @endforeach
            
            <!--<tr>-->
            <!--    <td>3</td>-->
            <!--    <td>003</td>-->
            <!--    <td>27-05-2024</td>-->
            <!--    <td>003</td>-->
            <!--    <td rowspan="2">Lahore</td> <!-- Merged Cell for Same Origin -->
            <!--    <td>Karachi</td>-->
            <!--    <td>DEF-9101</td>-->
            <!--    <td>Truck</td>-->
            <!--    <td class="freight-amount">6000</td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--    <td>4</td>-->
            <!--    <td>004</td>-->
            <!--    <td>28-05-2024</td>-->
            <!--    <td>004</td>-->
            <!--    <td>Multan</td>-->
            <!--    <td>GHI-1213</td>-->
            <!--    <td>Bus</td>-->
            <!--    <td class="freight-amount">4500</td>-->
            <!--</tr>-->
            <tr>
                <td colspan="6" style="text-align: right; font-weight: bold;">Total Freight Amount (PKR):</td>
                <td class="total-freight" style="text-align: center;"></td>
            </tr>
            <!-- Add more rows as needed -->
        </table>

        <!-- Freight Details Here -->

        <div class="flex-container">
            <!-- Terms and Conditions Section -->
            <div class="terms-conditions">
                <h4>Terms and Conditions</h4>
                <ul style="font-size: small;"> <!-- Use inline style for font size -->
                    <li>All amounts are due within 30 days.</li>
                    <li>A late fee of 1.5% will be applied for overdue payments.</li>
                    <li>All shipments are subject to the terms and conditions of the freight carrier.</li>
                </ul>
            </div>

            <!-- Sales Tax Table -->
            <div class="sales-tax-table" >
                <table class="table" style="float:right">
                    <thead>
                        <tr>
                            <th>Tax Description</th>
                            <th>Rate</th>
                            <th>Amount (PKR)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taxes as $t)
                        <tr>
                            <td data-tax-name="{{ $t->tax_name }}">Sales Tax ({{ $t->tax_name }})</td>
                            <td data-tax-percentage="{{ $t->tax_percentage }}">{{ $t->tax_percentage }}</td>
                            <td class="sales-tax-srb">0.00</td>
                        </tr>
                        @endforeach
                        <!--<tr>-->
                        <!--    <td colspan="2"><strong>Total Sales Tax</strong></td>-->
                           
                        <!--    <td class="total-amount-tax">0.00</td>-->
                        <!--</tr>-->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Display Current Date and Amount in Words -->
        <!-- Total Amount in Words -->
        <div class="total-amount">
            Total Amount in Words: <span id="amount-in-words"></span>
        </div>
        
        <!-- Additional Information Section -->
        <div class="additional-info" style="display: flex; justify-content: space-between; margin-top: 30px;  margin-bottom: 50px;">
            <!-- Left Column -->
            <div class="left-column" style="width: 70%;">
                <p>PR no:         __________________________</p>
                <p>PO no:         __________________________</p>
                <p>GRN no:      __________________________</p>
                <p>Bank:          Habib Metro</p>
                <p>Acct Title:   SMS Logistics PVT Limited</p>
                <p>Branch:        Shahra e Quaideen</p>
                <p>IBAN no:      PK79 MPBL 0106 0671 4019 4247</p>
            </div>
        
            <!-- Right Column -->
            <div class="right-column" style="width: 25%; text-align: center;">
                <p>(Authorize Sign & Stamp)</p>
            </div>
        </div>
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
