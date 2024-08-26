<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Charge</title>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        * {
            margin: 0;
        }

        body {
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        img, picture, video, canvas, svg {
            display: block;
            max-width: 100%;
        }

        input, button, textarea, select {
            font: inherit;
        }

        p, h1, h2, h3, h4, h5, h6 {
            overflow-wrap: break-word;
        }

        #root, #__next {
            isolation: isolate;
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .align-end {
            text-align: end;
        }

        .mb-2 {
            margin-bottom: 8px;
        }

        .gap-4 {
            gap: 12px;
        }

        .border {
            border: 1px solid black;
        }

        .border-b-none {
            border-bottom: none;
        }

        .border-t-none {
            border-top: none;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0 24px;
        }

        h2 {
            font-size: 1.25rem;
        }

        header {
            padding-left: 10px;
            padding-right: 10px;
            /*padding-bottom: 10px;*/
        }

        header p:last-child {
            width: fit-content;
            margin-left: auto;
            font-size: 0.95rem;
        }

        header div {
            display: flex;
            justify-content: space-between;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding-bottom: 10px;
            background-color: #fff;
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 0;
            font-family: serif;
        }

        .sub-title, .info {
            text-align: center;
            font-size: 14px;
            margin: 5px 0;
        }

        .maintenance-header {
            text-align: center;
            padding: 10px;
            font-size: 14px;
        }

        .maintenance-header-info {
            display: flex;
            justify-content: space-between;
        }

        .maintenance-header-info > div {
            text-align: start;
        }


        .charges-table {
            width: 100%;
            border-collapse: collapse;
        }

        .charges-table th {
            border: 1px solid black;
        }

        .charges-table tbody td {
            padding: 0 8px;
            border-right: 1px solid black;
        }

        .charges-table td:first-child {
            text-align: center;
        }

        .charges-table th:last-child {
            padding-left: -10px;
        }

        .charges-table td:last-child {
            text-align: right;
        }

        .charges-table .group-title:first-of-type h4 {
            margin-top: 4px;
        }

        .charges-table .group-title h4 {
            width: fit-content;
            border-bottom: 1px solid black;
        }

        .charges-table .group-total .text {
            text-align: right;
            padding-right: 12px;
        }

        .charges-table .group-total td {
            padding-bottom: 18px;
        }

        .charges-table .group-total:nth-last-child(2) td {
            padding-bottom: 8px;
        }

        .charges-table tr:last-child {
            border-top: 1px solid black;
        }

        .charges-table .total {
            border-top: 1px solid black;
        }

        .charges-table .total td {
            border: none;
            padding-top: 4px;
            padding-bottom: 4px;
        }

        .charges-table .total td:nth-last-child(2) {
            border-right: 1px solid black;
        }

        .tax-container {
            position: relative;
            border: 1px solid black;
            gap: 12px;
            padding-left: 10px;
            justify-content: space-between;
        }

        .tax-container > div {
            padding: 10px 0;
        }

        .tax-container > div h4 {
            text-transform: uppercase;
            font-size: 1rem;
            font-weight: 500;
        }

        .custom-border {
            border-top: 1px solid black;
            position: absolute;
            width: 100%;
            bottom: 32px;
            margin-left: -10px;
        }

        .tax-container .tax-table {
            border-collapse: collapse;
            width: 50%;
        }

        .tax-table tr:first-of-type td {
            padding-top: 40px;
        }

        .tax-table td {
            padding: 0;
            border-right: 1px solid black;
        }

        .tax-table td:last-child {
            border-right: none;
            text-align: right;
            padding-right: 8px;
        }

        .tax-table .group-total td {
            padding-bottom: 12px;
        }

        .grand-total td {
            border-top: 1px solid black;
            padding-top: 4px;
            padding-bottom: 4px;
            padding-right: 8px;
            text-align: right;
        }

        .arrears-total td {
            text-align: right;
            padding-right: 8px;
            padding-bottom: 4px;
        }


        .notes {
            padding: 10px;
        }

        .notes h3 {
            width: fit-content;
            border-bottom: 1px solid black;
            margin-bottom: 8px;
        }

        .notes ol {
            padding-left: 20px;
        }

        .notes ol li {
            margin-bottom: 4px;
            padding-left: 12px;
        }
    </style>
</head>
<body>
<main class="container">
    <header class="border border-b-none">
        <h1 class="title">Raghuleela Mega Mall Kandivali(W) Premises Co.Op.Society Ltd.</h1>
        <p class="info"><strong>Registration No : MUMWYR/GNL/O/2136/2010-11/Year 2010</strong></p>
        <p class="info">5th Floor, Raghuleela Mega Mall, Behind Poisar Depot, Kandivali(W), Mumbai - 400067,
            <br/>E.Mail: accounts@raghuleelakandivali.in</p>
        <div>
            <p><strong>PAN: AABAR0186Q</strong></p>
            <p><strong>GSTIN:27AABAR0186Q1Z0</strong></p>
        </div>
        <p><strong>ORIGINAL</strong></p>
    </header>

    <div class="maintenance-header border border-b-none">
        <h2>Maintenance Charges</h2>
        <p class="mb-2"><strong>Demand Note for the Period: {{$invoice->bill_month}} {{$invoice->bill_year}}</strong>
        </p>

        <div class="maintenance-header-info">
            <div>
                <div class="flex gap-4 justify-between">
                    <p><strong>Unit No:</strong> S119 </p>
                    <p><strong>(Mob: {{$owner->phone}})</strong></p>
                </div>
                <p><strong>Name:</strong> Mr. & Mrs. {{$owner->name}}</p>
                <p><strong>GSTIN:</strong> 27AKXPM9523F1ZJ</p>
            </div>
            <div>
                <p><strong>Bill No:</strong> {{$invoice->id}}/{{$invoice->bill_year}}/{{$invoice->bill_month}}</p>
                <p><strong>Date:</strong> {{$invoice->bill_date}}</p>
                <p><strong>Due Date:</strong> {{$maintainance->due_day}}</p>
                <p><strong>Carpet Area:</strong> {{$owner->flat_sqrft}} (Sqft)</p>
            </div>
        </div>

    </div>

    <table class="charges-table border ">
        <thead>
        <tr>
            <th>Sl.No</th>
            <th>Account Name</th>
            <th>Rate</th>
            <th>Amount (Rs.)</th>
        </tr>
        </thead>
        <tbody>
        <!-- A - Taxable Charges -->
        <tr class="group-title ">
            <td></td>
            <td><h4>A - Taxable Charges (SAC Code: 999599)</h4></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>1</td>
            <td>Service Charge</td>
            <td>00.00</td>
            <td>00.00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Insurance Charge</td>
            <td>00.00</td>
            <td>00.00</td>
        </tr>


        <tr class="group-total">
            <td></td>
            <td class="text">Group Total</td>
            <td></td>
            @php
                $groupATotal = 0;
            @endphp
            <td><strong>{{number_format($groupATotal, 2)}}</strong></td>
        </tr>

        <tr class="group-title">
            <td></td>
            <td><h4>B - Non Taxable Charges</h4></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Electricity Charge</td>
            <td>00.00</td>
            {{--            <td>{{number_format($invoice->electricity_charges, 2)}}</td>--}}
            <td>000.00</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Water Charge</td>
            <td>00.00</td>
            <td>{{number_format($invoice->water_charges, 2)}}</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Vehicle Charge</td>
            <td>00.00</td>
            <td>{{number_format($invoice->vehicle_charges, 2)}}</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Maintenance Cost</td>
            <td>{{number_format($maintainance->per_sqrft_maintaince_cost, 2)}}</td>
            <td>{{number_format($invoice->maintainance_cost, 2)}}</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Property Tax Cost</td>
            <td>{{number_format($maintainance->per_sqrft_property_tax, 2)}}</td>
            <td>{{number_format($invoice->property_tax_cost, 2)}}</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Non Occupancy Charges</td>
            <td></td>
            <td>00.00</td>
        </tr>
        <tr class="group-total">
            <td></td>
            <td class="text">Group Total</td>
            <td></td>
            @php
                $groupBTotal = $invoice->maintainance_cost + $invoice->property_tax_cost + $invoice->water_charges +
                                $invoice->vehicle_charges
            @endphp
            <td><strong>{{number_format($groupBTotal, 2)}}</strong></td>
        </tr>


        <tr class="group-title">
            <td></td>
            <td><h4>C - BMC Property Tax</h4></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>10</td>
            <td>BMC Property Tax(Shop Area)</td>
            <td>00.00</td>
            <td>00.00</td>
        </tr>
        <tr>
            <td>11</td>
            <td>BMC Property Tax(Loft Area)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>12</td>
            <td>BMC Property Tax(Common Area)</td>
            <td></td>
            <td></td>
        </tr>
        <tr class="group-total">
            <td></td>
            <td class="text">Group Total</td>
            <td></td>
            @php
                $groupCTotal = 0
            @endphp
            <td><strong>{{number_format($groupCTotal, 2)}}</strong></td>
        </tr>

        <tr class="group-title">
            <td></td>
            <td><h4>D - Interest / Penalty</h4></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>13</td>
            <td>Interest Maint. Chgs.</td>
            <td></td>
            <td>00.00</td>
        </tr>
        <tr>
            <td>14</td>
            <td>Interest on Property Tax</td>
            <td></td>
            <td>00.00</td>
        </tr>
        <tr class="group-total">
            <td></td>
            <td class="text">Group Total</td>
            <td></td>
            @php
                $groupDTotal = 0
            @endphp
            <td><strong>{{number_format($groupDTotal, 2)}}</strong></td>
        </tr>

        <!-- Total -->
        <tr class="total">
            <td></td>
            <td></td>
            <td class="text"><strong>Net Amount</strong></td>
            @php
                $netAmount = $groupATotal + $groupBTotal + $groupCTotal + $groupDTotal;
            @endphp
            <td><strong>{{ number_format( $netAmount, 2)}}</strong></td>
        </tr>


        </tbody>
    </table>

    {{--  for laravel-pdf library: to add new page with following content   --}}
    @pageBreak

    <section class="tax-container flex">
        <div>
            <h2>With Tax Charges</h2>
            <span>In Words:</span>
            @php
                $amountInWords = \Rmunate\Utilities\SpellNumber::value(12520)
                    ->currency("inr")
                    ->toLetters()
            @endphp
            <h4>{{$amountInWords}}</h4>
            <div class="custom-border"></div>
        </div>
        <table class="tax-table">
            <tbody>
            <tr>
                <td>CGST @ 9% On Group A</td>
                <td>000.00</td>
            </tr>
            <tr>
                <td>SGST @ 9% On Group A</td>
                <td>000.00</td>
            </tr>
            <tr>
                <td>Round off</td>
                <td>000.00</td>
            </tr>
            <tr class="group-total">
                <td>Bill Amount</td>
                <td><strong>{{number_format( $netAmount, 2)}}</strong></td>
            </tr>
            <tr>
                <td>Arrears - Principal (Maint.)</td>
                <td>000.00</td>
            </tr>
            <tr>
                <td>Arrears of Total Prop. Tax</td>
                <td>000.00</td>
            </tr>
            <tr>
                <td>Arrears of Int.on Prop. Tax</td>
                <td>000.00</td>
            </tr>
            <tr>
                <td>Arrears - Others</td>
                <td>000.00</td>
            </tr>
            <tr>
                <td>Arrears - Interest</td>
                <td>000.00</td>
            </tr>
            <tr class="arrears-total">
                <td>Total Arrears</td>
                <td><strong>000.00</strong></td>
            </tr>

            <tr class="grand-total">
                <td><strong>Grand Total</strong></td>
                <td><strong>{{number_format( $netAmount, 2)}}</strong></td>
            </tr>
            </tbody>
        </table>
    </section>

    <div class="notes border border-t-none">
        <h3><strong>NOTES :</strong></h3>
        <ol>
            <li>The Billing Method has been revised as per resolution passed by General body from time to time</li>
            <li>For billing inquiry Contact 28630038 between 11.00 am to 5.30 pm.</li>
            <li>The Billing Charges are estimated based on past data.</li>
            <li>BMC Property Tax Bill revised as per annexure January 2017 & penalty charged at 2% p.m. as per BMC
                notice RF. No. A&C/SIE.01A/2/Dated 04/01/2019.
            </li>
            <li>Non Occupancy Charges 5% of service charge. Interest for delayed payment @21% p.a.</li>
            <li>No Cash Payment. No TDS to be deducted.</li>
            <li>Cheque in favour of Raghuleela Mega Mall Kandivali (W) Premises Co-op. Society Ltd .</li>
            <li>For online payment -Bank Name: Union Bank of India Br. Kandivali West, A/c. No. 170610010009868 IFSC :
                UBIN0553826.
                <br/>
                Email the same with shop Details on :accounts@raghuleelakandivali.in
            </li>
            <li>Society reserve the right to raise bill on account of statutory tax + penalty contested by the Society
                with Govt. and MCGM E & O E
            </li>
        </ol>
    </div>
</main>
</body>
</html>
