<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Invoice</title>
</head>
<style>
    body {
        font-family: "Open Sans";
        font-size: 12px;
    }

    .address-company {
        padding-top: 5px;
        line-height: 1;
    }

    .invoice-header {
        display: inline-flex;
    }

    .row.header-row {
        width: 100%;
        display: inline-flex;
        /* padding: 10px 50px; */
        margin: 0 auto;
    }

    .col-new1 {
        width: 50%;
    }

    .header-title h2 {
        margin: 0;
        letter-spacing: 10px;
        color: #ffff;
        font-size: 26px;
    }

    .col-new2 img {
        width: 100%;
        max-width: 100px;
    }

    .invoice-hea {
        margin: 0px 0px;
    }

    .col-new2 {
        width: 50%;
        text-align: end;
        padding-top: 5px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    strong {
        font-family: auto;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 5px;
        font-family: "Open Sans";
        font-size: 12px;
    }

    .ta-1 tr:nth-child(even),
    .ta-2 tr:nth-child(even) {
        background-color: #21bb49;
    }

    .invoice-c-table {
        display: flex;
        padding: 0px 0px;
    }

    table.ta-1,
    table.ta-2 {
        margin: 0px 0px;
    }

    .ta-1 th,
    .ta-2 th {
        background: #c3c3c3;
        font-family: auto;
        font-size: 12px;
        font-family: "Open Sans";
        padding: 3px 6px;
    }

    table.ta-3 td {
        border: none;
    }

    section.secont-sec {
        padding: 50px 0px;
    }

    .ta-3 td {
        padding: 13px 20px;
    }

    .ta-3 td:nth-child(odd) {
        background-color: red;
    }

    .row.se-se {
        display: flex;
    }

    .row.se-se {
        width: 100%;
    }

    section.secont-sec .col {
        width: 25%;
        padding: 20px 0px;
        border: 1px solid #ddd3d3;
        text-align: center;
    }

    .col.col-color {
        background: #21bb49;
    }

    .col.col-color.bo-radi {
        border-top-left-radius: 25px;
    }

    .col.col-color.bo-radis {
        border-bottom-left-radius: 25px;
    }

    .col.bo-radi1 {
        border-top-right-radius: 25px;
    }

    .col.bo-radis1 {
        border-bottom-right-radius: 25px;
    }

    .col.col-color.bo-rad3 {
        border-bottom-left-radius: 25px;
    }

    .section-break {
        border: 1px solid #a1a1a1;
        margin: 20px 0px;
    }

    section.Invoice-table-details {
        width: 100%;
    }

    .row.in-table-row {
        display: flex;
    }

    .col-1 {
        width: 40%;
    }

    .col-2 {
        width: 20%;
        color: #21bb49;
        font-weight: 700;
    }

    .row.in-table-row:first-child {
        margin: 50px;
        color: #21bb49;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 1px;
    }

    .row.in-table-row1 {
        display: flex;
        width: 100%;
    }

    .col-11 {
        width: 40%;
    }

    .col-22 {
        width: 20%;
    }

    .in-table-inner {
        padding: 50px 150px;
    }

    tr.table-headers-color th {
        font-size: 12px;
        color: #21bb49;
        letter-spacing: 1px;
        border: none;
    }

    section.Invoice-table-details td,
    section.Invoice-table-details th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        border: none;
    }

    .in-table-inner td,
    .in-table-inner th {
        text-align: left !important;
    }

    th.th-right {
        text-align: end !important;
    }

    td.td-right {
        text-align: end !important;
    }

    .row.inv-row {
        display: flex;
        width: 100%;
    }

    .col-01 {
        width: 100%;
    }

    .col-02 {
        width: 100%;
    }

    section.invoice-last-table {
        padding: 20px 0px;
    }

    p.hea.uni,
    p.last-un {
        text-align: end;
    }

    p.hea.uni-middle {
        text-align: center;
    }

    p.uni-middle-p {
        text-align: center;
    }

    section.invoice-last-table p.hea {
        color: #21bb49;
    }

    /* .row.inv-row {
border-bottom: 1px solid #21bb49;
} */

    .row.inv-row:last-child {
        border: none;
    }

    /* .row.inv-row:nth-child(1),
.row.inv-row:nth-child(2),
.row.inv-row:nth-child(3),
.row.inv-row:nth-child(4),
.row.inv-row:nth-child(5),
.row.inv-row:nth-child(6),
.row.inv-row:nth-child(7),
.row.inv-row:nth-child(8),
.row.inv-row:nth-child(9) {
border: none;
} */

    .right-align {
        text-align: right !important;
    }

    .row.inv-row.border-bottom,
    .border-bottom {
        border-bottom: 1px solid #a1a1a1;
    }

    .row.inv-row.border-bottom:last-child {
        border-bottom: none;
    }

    .row.inv-row:nth-child(10) {
        border-bottom: 2px solid #21bb49;
    }

    .sign {
        text-align: end;
        padding: 0px 0px;
    }

    .row.foot-row {
        display: flex;
        width: 100%;
    }

    .col-001,
    .col-002,
    .col-003 {
        width: 33.33%;
        text-align: center;
    }

    .row.foot-row.te-cenetr p {
        text-align: center;
        width: 100%;
        margin: 0 auto;
    }

    .footer-sec {
        margin: 10px 0px 0px 0px;
        padding: 10px 0px;
        border: 2px solid #21bb49;
    }

    .footer-row-end {
        text-align: center;
        border: 2px solid #21bb49;
        margin: 0px 0px;
    }

    .footer-row-end p {
        margin: 0;
        padding: 10px 0px;
        font-family: auto;
    }

    p.inv-title {
        font-size: 35px;
        margin: 0px;
    }

    .header-title img {
        max-width: 110px;
        padding-right: 10px;
    }

    p.inv-title {
        font-size: 30px;
        margin: 0px;
    }

    p.last-p {
        font-size: 17px;
    }

    table.ta-1 {
        margin-right: 5px;
    }

    table.ta-1,
    table.ta-2 {
        /* margin: 0px 0px; */
        margin-left: 5px;
    }

    p.address {
        margin: 5px 0px;
    }

    p.phonenu {
        margin: 5px 0px;
    }

    p.email-n {
        margin: 5px 0px;
    }

    .row.inv-row p {
        margin: 7px 0px;
    }

    p.hea {
        padding-bottom: 5px;
    }

    section.invi-heading {
        text-align: right;
    }

    p.in-main-hea {
        font-size: 32px;
    }

    section.invi-heading p {
        margin: 5px 0px;
    }

    .invoice-details {
        padding: 5px 0px;
    }

    .border-bottom-2px {
        border-bottom: 2px solid #a1a1a1;
    }

    p.uni-middle-p.p-bold {
        font-weight: bold;
    }

    .full-content {
        max-width: 1270px;
        margin: auto;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        padding: 0 30px;
    }

    .row.invi-row {
        width: 100%;
    }

    p.inv-title,
    p.address,
    p.phonenu,
    p.email-n,
    p.last-p {
        text-align: start;
    }

    @media screen and (max-width: 992px) {
        .in-row-heading h2 {
            width: 645px;
        }

        .invoice-c-table {
            padding: 10px 0px;
        }

        section.secont-sec {
            padding: 50px 90px;
        }

        section.invoice-last-table {
            padding: 10px 0px;
        }

        .sign {
            padding: 0px 0px;
        }

        .col-new2 {
            width: 50%;
        }

        .full-content {
            padding: 20px;
        }
    }

    @media screen and (max-width: 768px) {
        .in-row-heading h2 {
            width: 590px;
        }

        section.secont-sec {
            padding: 50px 80px;
        }

        section.invoice-last-table {
            padding: 50px 80px;
        }

        .sign {
            padding: 0px 0px;
        }

        .col-new2 {
            width: 50%;
        }

        .invoice-c-table {
            padding: 0px 0px;
        }

        .full-content {
            padding: 10px;
        }

        section.invoice-last-table {
            padding: 0px 0px;
        }
    }

    /* @media screen and (max-width: 576px) {
        .invoice-hea {
            position: relative;
            margin: 0px 10px;
        }

        .in-row-heading h2 {
            width: 280px;
            font-size: 17px;
        }

        .in-row-logo {
            top: -18px;
            left: -13px;
        }

        .in-row-logo img {
            max-width: 60px;
        }

        .invoice-c-table {
            padding: 10px 0px;
            display: block;
            margin: 0 auto;
        }

        section.secont-sec {
            padding: 30px 10px;
        }

        section.invoice-last-table {
            padding: 0px 0px;
        }

        .invoice-c-table table.ta-1,
        .invoice-c-table table.ta-2 {
            margin: 0px 0px;
        }

        .sign {
            padding: 10px 0px;
        }

        .footer-sec {
            margin: 50px 10px 0px 10px;
            padding: 0px 0px;
        }

        .footer-row-end {
            margin: 0px 0px;
        }

        .row.foot-row {
            display: block;
        }

        .col-001,
        .col-002,
        .col-003 {
            width: 100%;
            text-align: center;
        }

        .header-title h2 {
            font-size: 20px;
        }

        .col-new1 {
            margin-top: 30px;
            width: 100%;
        }

        .col-new2 {
            width: 100%;
            text-align: end;
        }

        .row.header-row {
            display: block;
        }

    } */

    @media (min-width: 1500px) and (max-width: 1920px) {
        .in-row-logo {
            top: -35px;
            right: 600px;
        }

        .in-row-heading h2 {
            width: 1185px;
        }

        .in-row-logo {
            top: -35px;
            left: -600px !important;
        }
    }

    .invoice-c-table {
        width: 100% !important;
    }



    .row.inv-row p {
        margin: 5px 0px;
    }

    .col-01,
    .col-02 {
        width: 25% !important;
    }

    .table_sec {
        width: 100%;
        display: flex;
    }

    .ta-1,
    .ta-2 {
        width: 50% !important;
        margin: 0;

    }

    table.ta-1,
    table.ta-2 {
        margin: 0;
    }

    .invoice-last-table th,
    .invoice-last-table td {
        border: none;
        padding: 0;
    }

    .invoice-last-table p {
        margin: 0 auto;
    }
</style>

<body>

    <div class="full-content">

        <section class="full-invoice-content">
            <!-- <div class="invoice-header"> -->

            <div class="invoice-hea">
                <div class="row header-row">
                    <!-- <div class="header-title">
                        
                    </div> -->
                    <div class="col-new2">
                        <p class="inv-title">LUUNARICH INT PVT LTD (Sonrich Group)</p>
                        <div class="address-company">
                            <p class="address"><span>Address : </span>No.204/A/1,Bandaragama Road,Kesbewa <br>
                                <span>TP:</span>(+94)383370000
                            </p>
                            <p class="email-n"><span>Email : info@sonrich.lk</span></p>
                            <p class="last-p"><span>Reciept Number : </span>{{ $invoice->invoice_no }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- </div> -->


            <table class="ta-1" style="width: 100%!important;">
                <tr>
                    <th width="20%" rowspan="2">Sender:</th>
                    <th>Number: </th>
                    <th width="20%" rowspan="2">Receiver:</th>
                    <th>Number:</th>
                </tr>

                <tr>
                    <th>Date:</th>
                    <th>Date:</th>
                </tr>
                <tr>
                    <td>Company Name:</td>
                    <td>Sonrich Asia (pvt) ltd</td>
                    <td>Customer Name:</td>
                    <td>{{ $invoice->customer_name }}</td>
                </tr>
                <tr>
                    <td>Company Address:</td>
                    <td>No.204/A/1,Bandaragama Road,Kesbewa</td>
                    <td>Customer Address:</td>
                    <td>{{ $invoice->customer_address }}</td>
                </tr>
                <tr>
                    <td>Phone No :</td>
                    <td>(+94) 38 337 0000 </td>
                    <td>Phone No 1:</td>
                    <td>{{ $invoice->mobile_no1 }}</td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td>info@sonrich.lk</td>
                    <td>Phone No 2:</td>
                    <td>{{ $invoice->mobile_no2 }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Customer District</td>
                    <td>{{ $invoice->customer_district }}</td>
                </tr>
            </table>


        </section>

        <div class="section-break"></div>



        <section class="invi-heading border-bottom-2px">
            <table style="border: none;" width="100%">
                <tr style="border: none;">
                    <td style="border: none;">
                        <p class="inv-title">{{ $invoice->customer_name }}</p>
                        <div class="address-company">
                            <p class="address"><span>Address : </span>{{ $invoice->customer_address }} |
                                <span>TP:</span>{{ $invoice->mobile_no1 }}
                            </p>
                            <!-- <p class="email-n"><span>Email : info@sonrich.lk</span></p> -->
                        </div>
                    </td>
                    <td style="border: none; text-align: right;">
                        <p class="in-main-hea">Invoice</p>
                        <div class="invoice-details">
                            <p><span>Invoice number : </span>{{ $invoice->invoice_no }}</p>
                            <p><span>Date : </span>{{ now() }}</p>
                        </div>
                    </td>
                </tr>
            </table>


        </section>


        <section class="invoice-last-table">
            <table style="border: none;">
                <tr>
                    <th width="40%">
                        <p class="hea"><strong>DESCRIPTION</strong></p>
                    </th>
                    <th width="20%">
                        <p class="hea uni-middle right-align"><strong>RATE</strong></p>
                    </th>
                    <th width="20%">
                        <p class="hea uni-middlec right-align"><strong>QTY</strong></p>
                    </th>
                    <th width="20%">
                        <p class="hea uni-middlec right-align"><strong>AMOUNT</strong></p>
                    </th>
                </tr>

                @php
                $subtotal = 0;
                $alldiscount = 0;
                $totalTax = 0;
                $deliverFee = 0;
                $packageIds = [];
                $futurePlans = $invoice->future_product_packages;
                $mainPlans = $invoice->main_product_package;


                @endphp
                @if($futurePlans != null)
                @foreach (json_decode($invoice->future_product_packages, true) as $packageId)
                @php
                $packageIds[] = $packageId;
                @endphp

                @foreach (product_items($packageId) as $index => $productItem)

                <tr>
                    <td>
                        <strong>{{ ucfirst($productItem->title) }}</strong>
                        <br><br>
                        <hr>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align">{{ $productItem->amount }}</p>
                        <br>
                        <hr>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align">{{ $productItem->quantity }}</p>
                        <br>
                        <hr>
                    </td>
                    <td>
                        @php
                        $row_sum = $productItem->amount * $productItem->quantity;
                        @endphp
                        <p class="last-un right-align">{{ 'Rs ' . $row_sum }}</p>
                        <br>
                        <hr>
                    </td>
                </tr>
                @php
                $subtotal += $row_sum;
                if ($index === 0 || !in_array($packageId, $packageIds)) {
                $alldiscount += $productItem->package_discount;
                $totalTax += $productItem->package_tax;
                $deliverFee += $productItem->package_delivery_fee;
                }
                @endphp
                @endforeach
                @endforeach
                @endif
                @if ($mainPlans != null)

                @foreach (product_items($invoice->main_product_package) as $index => $productItem)

                <tr>
                    <td>
                        <strong>{{ ucfirst($productItem->title) }}</strong>
                        <br><br>
                        <hr>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align">{{ $productItem->amount }}</p>
                        <br>
                        <hr>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align">{{ $productItem->quantity }}</p>
                        <br>
                        <hr>
                    </td>
                    <td>
                        @php
                        $row_sum = $productItem->amount * $productItem->quantity;
                        @endphp
                        <p class="last-un right-align">{{ 'Rs ' . $row_sum }}</p>
                        <br>
                        <hr>
                    </td>
                </tr>
                @php
                $subtotal += $row_sum;
                if ($index === 0) {
                $alldiscount += $productItem->package_discount;
                $totalTax += $productItem->package_tax;
                $deliverFee += $productItem->package_delivery_fee;
                }
                @endphp
                @endforeach
                @endif
                <tr>
                    <td></td>
                    <td>
                        <p class="uni-middle-p right-align"><b>Subtotals</b></p>
                    </td>
                    <td></td>
                    <td>
                        <p class="uni-middle-p right-align">Rs.{{ $subtotal }}</p>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <p class="uni-middle-p right-align"><b>Wholesale Discount</b></p>
                    </td>
                    <td></td>
                    <td>
                        <p class="uni-middle-p right-align">Rs.{{ $alldiscount }}</p>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <p class="uni-middle-p right-align"><b>Total Amount with Total Discount</b></p>
                        <hr>
                    </td>
                    <td><br><br>
                        <hr>
                    </td>

                    <td>
                        @php
                        $amountwithdiscount = $subtotal - $alldiscount;
                        @endphp
                        <p class="uni-middle-p right-align">Rs.{{ $amountwithdiscount }}</p>
                        <br>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align"><b>Tax</b></p>
                    </td>
                    <td>
                        <br>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align">Rs.{{ $totalTax }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align"><b>Deliver Charge</b></p>
                        <hr>
                    </td>
                    <td>
                        <br>
                        <hr>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align">Rs.{{ $deliverFee }}</p>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p class="uni-middle-p right-align"><b>Total</b></p>
                    </td>
                    <td></td>
                    <td>
                        <p class="uni-middle-p right-align">Rs.{{ $amountwithdiscount + $deliverFee + $totalTax }}</p>
                    </td>
                </tr>



                <!-- <div class="tn-ta">
                <div class="row inv-row border-bottom">
                    <div class="col-01">
                        <p class="hea"><strong>DESCRIPTION</strong></p>
                        <p><strong>Services</strong></p>
                        <p>Cost of various services</p>
                    </div>
                    <div class="col-02">
                        <p class="hea uni-middle right-align"><strong>RATE</strong></p>
                        <p class="uni-middle-p right-align">Rs.10000</p>
                        <p class="uni-middle-p right-align">+Tax</p>
                    </div>
                    <div class="col-02">
                        <p class="hea uni-middlec right-align"><strong>QTY</strong></p>
                        <p class="uni-middle-p right-align">10</p>
                    </div>
                    <div class="col-02">
                        <p class="hea uni"><strong>AMOUNT</strong></p>
                        <p class="last-un">Rs.5000</p>
                    </div>
                </div>

                <div class="row inv-row border-bottom">
                    <div class="col-01">
                        <p><strong>Consulting</strong></p>
                        <p>Consultant for your business</p>
                    </div>
                    <div class="col-02">
                        <p class="uni-middle-p right-align">Rs.12000</p>
                        <p class="uni-middle-p right-align">+tax</p>
                    </div>
                    <div class="col-02">
                        <p class="uni-middle-p right-align">5</p>
                    </div>
                    <div class="col-02">
                        <p class="last-un">Rs.30000</p>
                    </div>
                </div>



                <div class="row inv-row">
                    <div class="col-01">
                        <p></p>
                    </div>
                    <div class="col-02">
                        <p class="uni-middle-p p-bold right-align">Subtotals</p>
                    </div>
                    <div class="col-02">
                        <p class="uni-middle-p"></p>
                    </div>
                    <div class="col-02">
                        <p class="last-un">Rs.500000</p>
                    </div>
                </div>

                <div class="row inv-row">
                    <div class="col-01">
                        <p></p>
                    </div>
                    <div class="col-02">
                        <p class="uni-middle-p p-bold right-align">Discount</p>
                    </div>
                    <div class="col-02">
                        <p class="uni-middle-p"></p>
                    </div>
                    <div class="col-02">
                        <p class="last-un">Rs.300000</p>
                    </div>
                </div>

                <div class="row inv-row">
                    <div class="col-01">
                        <p></p>
                    </div>
                    <div class="col-02 border-bottom">
                        <p class="uni-middle-p p-bold right-align">Tax</p>
                    </div>
                    <div class="col-02 border-bottom">
                        <p class="uni-middle-p"></p>
                    </div>
                    <div class="col-02 border-bottom">
                        <p class="last-un">Rs.100000</p>
                    </div>
                </div>

                <div class="row inv-row">
                    <div class="col-01">
                        <p></p>
                    </div>
                    <div class="col-02">
                        <p class="uni-middle-p p-bold right-align">Total</p>
                    </div>
                    <div class="col-02">
                        <p class="uni-middle-p"></p>
                    </div>
                    <div class="col-02">
                        <p class="last-un">Rs.2000000</p>
                    </div>
                </div>

                <div class="row inv-row">
                    <div class="col-01">
                        <p></p>
                    </div>
                    <div class="col-02">
                        <p class="uni-middle-p p-bold right-align">Deposit Requested</p>
                    </div>
                    <div class="col-02">
                        <p class="uni-middle-p"></p>
                    </div>
                    <div class="col-02">
                        <p class="last-un">Rs.1500000</p>
                    </div>
                </div>

                <div class="row inv-row">
                    <div class="col-01">
                        <p></p>
                    </div>
                    <div class="col-02 border-bottom-2px">
                        <p class="uni-middle-p p-bold right-align">Deposit Due</p>
                    </div>
                    <div class="col-02 border-bottom-2px">
                        <p class="uni-middle-p"></p>
                    </div>
                    <div class="col-02 border-bottom-2px">
                        <p class="last-un">Rs.3000000</p>
                    </div>
                </div>
            </div> -->
        </section>



        <section class="footer-section" style="margin-top:15px;">
            <div class="footer-row-end">
                <p>THANK YOU! WE APPRECIATE YOUR BUSINESS
                    <br>
                    Luunarich International Pvt ltd (Sonrich Group)
                    <br>
                    Address : No.204/A/1,Bandaragama Road,Kesbewa | TP:(+94)383370000
                </p>

            </div>
            <p style='text-align:center;'>This document digitally geney receipt. Won't be needing any signs...</p>
        </section>
    </div>

    <!-- Display other invoice details as needed -->
</body>

</html>