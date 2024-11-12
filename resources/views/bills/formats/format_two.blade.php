<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Format</title>
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

        .bill-header {
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
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Additional Styling -->
    <style>
        .bill-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #ccc;
            position: relative;
        }

        .logo img {
            width: 100px;
        }

        .company-name {
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center; /* Align icon vertically with text */
        }

        .company-name i {
            margin-left: 10px; /* Space between text and icon */
        }

        .actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .actions button {
            padding: 10px;
            font-size: 16px;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            align-items: center; /* Center icon vertically */
        }

        .actions button:hover {
            opacity: 0.8; /* Add a hover effect */
        }

        /* Specific button colors */
        .btn-close {
            background-color: #dc3545; /* Danger red for close */
        }

        .btn-print,
        .btn-download {
            background-color: #007bff; /* Primary color for print and download */
        }
        
        
        
        
        
.info-container {
    display: flex;
    justify-content: space-between;
    margin: 20px 0; /* Margin for spacing above and below the container */
}

.customer-info, .invoice-info {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    width: 48%; /* Adjust as needed */
    margin-right: 20px; /* Add right margin for spacing */
}

.invoice-info {
    margin-right: 0; /* Remove right margin from the last div */
}

.info-header {
    font-weight: bold;
    text-align: center;
    background-color: #f1f1f1;
    padding: 5px 0;
    margin-bottom: 10px;
}

.info-row {
    display: flex;
    justify-content: space-between;
    padding: 5px 0;
}

.info-label {
    font-weight: bold;
}

.info-value {
    text-align: right; /* Align value to the right */
    flex: 1; /* Allow value to take available space */
    padding-left: 10px; /* Space between label and value */
}

.tax-info-container {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin: 20px 0; /* Margin for spacing above and below the container */
    width:40%;
}

.tax-info-header {
    font-weight: bold;
    text-align: center;
    background-color: #f1f1f1;
    padding: 5px 0;
    margin-bottom: 10px;
}

.tax-info-row {
    display: flex;
    justify-content: space-between;
    padding: 5px 0;
    border-bottom: 1px solid #eee; /* Optional: Add a bottom border for separation */
}

.tax-info-label {
    flex: 1; /* Allow label to take available space */
    font-weight: bold;
}

.tax-info-rate {
    flex: 1; /* Allow rate to take available space */
    text-align: right; /* Align value to the right */
    padding-left: 10px; /* Space between label and value */
}

.tax-info-amount {
    flex: 1; /* Allow amount to take available space */
    text-align: right; /* Align value to the right */
    padding-left: 10px; /* Space between label and value */
}

.total-row {
    font-weight: bold; /* Highlight total row */
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

            <!-- Centered Icons -->
   
        <!--<div class="actions">-->
        <!--    <button class="btn-close" onclick="closeTab();"><i class="fas fa-times"></i></button> -->
        <!--    <button class="btn-print" onclick="window.print();"><i class="fas fa-print"></i></button> -->
        <!--    <button class="btn-download" onclick="downloadDocument();">-->
        <!--        <i class="fas fa-download"></i>-->
        <!--    </button>-->
        <!--</div>-->
             <!-- Company Name (Right-aligned) -->
        <div class="company-name">
            {{$company[0]->name}}
        </div>
        </div>
        
        <!-- Customer Info & Invoice Info in Separate Divs -->
        <!-- Customer Info & Invoice Info in Separate Divs -->
<!-- Customer Info & Invoice Info in Separate Divs -->
<div class="info-container">
    <!-- Customer Info Div -->
    <div class="customer-info" id="customerInfo">
        <div class="info-header" id="customerHeader">Customer Info</div>
        <div class="info-row" id="customerName">
            <span class="info-label">Name:</span>
            <span class="info-value">{{$customer->customerName}}</span>
        </div>
        <div class="info-row" id="customerPhone">
            <span class="info-label">Phone No:</span>
            <span class="info-value">23344555566</span>
        </div>
        <div class="info-row" id="customerAddress">
            <span class="info-label">Address:</span>
            <span class="info-value">Street 5, XYZ, City, State, Country</span>
        </div>
    </div>

    <!-- Invoice Info Div -->
    <div class="invoice-info" id="invoiceInfo">
        <div class="info-header" id="invoiceHeader">Invoice Info</div>
        <div class="info-row" id="invoiceBillReference">
            <span class="info-label">Bill Reference No:</span>
            <span class="info-value">{{$data->bill_Number}}</span>
        </div>
        <div class="info-row" id="invoiceTaxNo">
            <span class="info-label">Sales Tax Invoice No:</span>
            <span class="info-value">456789</span>
        </div>
        <div class="info-row" id="invoiceDate">
            <span class="info-label">Bill Date:</span>
            <span class="info-value">{{$data->bill_date}}</span>
        </div>
        <div class="info-row" id="invoiceTataTextileNo">
            <span class="info-label">Tata Textile No:</span>
            <span class="info-value">345678</span>
        </div>
    </div>
</div>


        <!-- Customer Info & Invoice Info in Separate Tables -->
        <!--<div class="table-container">-->
            <!-- Customer Info Table -->
        <!--    <table class="info-table left-table">-->
        <!--        <tr>-->
        <!--            <th colspan="2">Customer Info</th>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td>Name:</td>-->
        <!--            <td>John Doe</td>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td>Phone No:</td>-->
        <!--            <td>23344555566</td>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td>Address:</td>-->
        <!--            <td>Street 5, XYZ, City, State, Country</td>-->
        <!--        </tr>-->
        <!--    </table>-->

            <!-- Invoice Info Table -->
        <!--    <table class="info-table right-table">-->
        <!--        <tr>-->
        <!--            <th colspan="2">Invoice Info</th>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td>Bill Reference No:</td>-->
        <!--            <td>3456789</td>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td>Sales Tax Invoice No:</td>-->
        <!--            <td>456789</td>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td>Invoice Date:</td>-->
        <!--            <td>25-05-2024</td>-->
        <!--        </tr>-->
        <!--        <tr>-->
        <!--            <td>Tata Textile No:</td>-->
        <!--            <td>345678</td>-->
        <!--        </tr>-->
        <!--    </table>-->
        <!--</div>-->

        <!-- Invoice Details Table -->
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
            @foreach($bilty as $b)
                @php
                    $expenses = DB::table('now_bilty_selling_expense')
                    ->where('builty_id', $b->builty_id)  // Filter by the specific builty_id
                    ->select('id', 'builty_id', 'amount', 'description', 'created_at')  // Select relevant columns
                    ->get();
                    $total_expense = 0;
                    foreach($expenses as $e){
                        $total_expense += $e->amount;
                    }
                @endphp
                <tr>
                    <td>1</td>
                    <td>
                        {{$b->builty_id}}
                    </td>
                    <td>{{$b->computerno}}</td>
                    <td>{{$b->date}}</td>
                    <td>{{$b->local_vehicle_no}}</td>
                    <td>{{$b->local_mobile_no}}</td>
                    <td class="freight-amount">{{$total_expense}}</td>
                </tr>
            @endforeach
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
            <!-- Sales Tax Info in Separate Divs -->
            <!-- Sales Tax Info in Separate Divs -->
            <div class="tax-info-container" id="sales-tax-container">
                <div class="tax-info-header">Sales Tax</div>
                
                <div class="tax-info-row header-row">
                    <span class="tax-info-label">Tax Description</span>
                    <span class="tax-info-rate">Rate</span>
                    <span class="tax-info-amount">Amount (PKR)</span>
                </div>
                @foreach($taxes as $t)
                    <div class="tax-info-row">
                        <span class="tax-info-label">Sales Tax ({{$t->tax_name}})</span>
                        <span class="tax-info-rate">{{$t->tax_percentage}}</span>
                        <span class="tax-info-amount amount-srb">0.00</span>
                    </div>
                @endforeach
            
                <div class="tax-info-row total-row">
                    <span class="tax-info-label"><strong>Total Sales Tax</strong></span>
                    <span class="tax-info-rate"></span> <!-- Empty for alignment -->
                    <span class="tax-info-amount total-amount">0.00</span>
                </div>
            </div>


            <!--<div class="sales-tax-table" >-->
            <!--    <table class="table" style="float:right">-->
            <!--        <thead>-->
            <!--            <tr>-->
            <!--                <th>Tax Description</th>-->
            <!--                <th>Rate</th>-->
            <!--                <th>Amount (PKR)</th>-->
            <!--            </tr>-->
            <!--        </thead>-->
            <!--        <tbody>-->
            <!--            <tr>-->
            <!--                <td>Sales Tax (SRB)</td>-->
            <!--                <td>15%</td>-->
            <!--                <td class="sales-tax-srb">0.00</td>-->
            <!--            </tr>-->
            <!--            <tr>-->
            <!--                <td>Sales Tax (PRA)</td>-->
            <!--                <td>15%</td>-->
            <!--                <td class="sales-tax-pra">0.00</td>-->
            <!--            </tr>-->
            <!--            <tr>-->
            <!--                <td colspan="2"><strong>Total Sales Tax</strong></td>-->
                           
            <!--                <td class="total-amount-tax">0.00</td>-->
            <!--            </tr>-->
            <!--        </tbody>-->
            <!--    </table>-->
            <!--</div>-->
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
      function downloadDocument() {
            // Create the content for the Word document
            const content = `
                <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word">
                    <head>
                        <meta charset="utf-8">
                        <title>Bill Document</title>
                        <style>
                            body { font-family: Arial, sans-serif; }
                            .total-amount { font-weight: bold; }
                        </style>
                    </head>
                    <body>
                        <h1>Bill Document</h1>
                        <h2>Company Name Here</h2>
                        <h3>Customer Info</h3>
                        <p>Name: John Doe</p>
                        <p>Phone No: 23344555566</p>
                        <p>Address: Street 5, XYZ, City, State, Country</p>
                        <h3>Invoice Info</h3>
                        <p>Bill Reference No: 3456789</p>
                        <p>Invoice Date: 25-05-2024</p>
                        <h3>Invoice Details</h3>
                        <table border="1" style="border-collapse:collapse; width: 100%;">
                            <tr>
                                <th>Sr No</th>
                                <th>Bilty No</th>
                                <th>Date</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Vehicle No</th>
                                <th>Vehicle Type</th>
                                <th>Freight Amount (PKR)</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>001</td>
                                <td>25-05-2024</td>
                                <td>Karachi</td>
                                <td>Lahore</td>
                                <td>ABC-1234</td>
                                <td>Truck</td>
                                <td>5000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>002</td>
                                <td>26-05-2024</td>
                                <td>Karachi</td>
                                <td>Faisalabad</td>
                                <td>XYZ-5678</td>
                                <td>Van</td>
                                <td>7000</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>003</td>
                                <td>27-05-2024</td>
                                <td>Lahore</td>
                                <td>Karachi</td>
                                <td>DEF-9101</td>
                                <td>Truck</td>
                                <td>6000</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>004</td>
                                <td>28-05-2024</td>
                                <td>Lahore</td>
                                <td>Multan</td>
                                <td>GHI-1213</td>
                                <td>Bus</td>
                                <td>4500</td>
                            </tr>
                        </table>
                        <p>Total Amount (PKR): 26825</p>
                        <p>Terms and Conditions: All payments must be made within 30 days of invoice date.</p>
                    </body>
                </html>
            `;

            // Create a Blob from the content
            const blob = new Blob([content], { type: 'application/msword' });

            // Create a link element
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'bill.doc';

            // Append the link to the body
            document.body.appendChild(link);
            link.click();

            // Remove the link after downloading
            document.body.removeChild(link);
        }

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

            // Display Sales Tax Amounts
            $('.sales-tax-srb').text(salesTaxSRB.toFixed(2)); // Display SRB Sales Tax
            $('.sales-tax-pra').text(salesTaxPRA.toFixed(2)); // Display PRA Sales Tax
            // Loop through each tax-info-row to calculate and display sales tax
            $('.tax-info-row').each(function() {
                // Get the tax rate for the current tax row
                const taxRate = parseFloat($(this).find('.tax-info-rate').text()) / 100;
                
                // Calculate the sales tax amount (assuming you have a totalFreight variable defined)
                const salesTaxAmount = totalFreight * taxRate;
            
                // Display the calculated sales tax amount in the corresponding element
                $(this).find('.amount-srb').text(salesTaxAmount.toFixed(2));
            });

            // Display Total Amount Tax
            const totalSalesTax = salesTaxSRB + salesTaxPRA;
            $('.total-amount-tax').text(totalSalesTax.toFixed(2)); // Display total sales tax amount
        });
    </script>
</body>
</html>
