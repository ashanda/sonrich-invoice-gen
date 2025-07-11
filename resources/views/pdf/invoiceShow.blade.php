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
        width: 100%;
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
        background-color: #c3c3c3;
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
        background: #000;
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
        color: #000;
        font-weight: 700;
    }

    .row.in-table-row:first-child {
        margin: 50px;
        color: #000;
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
        color: #000;
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
        color: #000;
    }

    .row.inv-row:last-child {
        border: none;
    }

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
        border-bottom: 2px solid #000;
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
        border: 2px solid #000;
    }

    .footer-row-end {
        text-align: center;
        border: 2px solid #ff0001;
        margin: 0px 0px;
    }

    .footer-row-end p {
        margin: 0;
        padding: 10px 0px;
        font-family: auto;
    }

    .header-title img {
        max-width: 110px;
        padding-right: 10px;
    }

    p.inv-title {
        font-size: 26px;
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
        max-width: 794px;
        margin: auto;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        padding: 0 30px;
        height: 100%;
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
            width: 100%;
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
            width: 100%;
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
                    <div class="col-new2">
                        <table style="border: none;">
                            <tr style="border: none;">
                                @php
                                    $logo = public_path('storage/' . $invoice->companies->logo);
                                    // Get the MIME type of the image
                                    $imageMimeType = mime_content_type($logo);

                                    // Read the image file and convert it to base64
                                    $logoBase64 = base64_encode(file_get_contents($logo));

                                    // Create the data URI with the dynamic MIME type
                                    $dataUri = 'data:' . $imageMimeType . ';base64,' . $logoBase64;
                                @endphp
                                <td width="20%" style="border: none; background-color: #000; text-align: center;">
                                    <img style="width: 100%;" src="{{ $dataUri  }}" alt="">
                                </td>
                                <td width="80%" style="border: none;">
                                    <p class="inv-title">{{ $invoice->companies->company_name }}
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <div style="text-align: left;" class="address-company">
                            <p><span>Address : </span>{{ $invoice->companies->address }}</p>
                            <p><span>TP :</span>{{ $invoice->companies->telephone_number }}</p>
                            <p class="email-n"><span>Email : {{ $invoice->companies->email }}</span></p>
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
                    <td>{{ $invoice->companies->company_name }}</td>
                    <td>Customer Name:</td>
                    <td>{{ $invoice->customer_name }}</td>
                </tr>
                <tr>
                    <td>Company Address:</td>
                    <td>{{ $invoice->companies->address }}</td>
                    <td>Customer Address:</td>
                    <td>{{ $invoice->customer_address }}</td>
                </tr>
                <tr>
                    <td>Phone No :</td>
                    <td>{{ $invoice->companies->telephone_number }} </td>
                    <td>Phone No 1:</td>
                    <td>{{ $invoice->mobile_no1 }}</td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td>{{ $invoice->companies->email }}</td>
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



        <section class="invi-heading">
            <table style="border: none;" width="100%">
                <tr style="border: none;">
                    <td style="border: none;">
                        <p class="inv-title">{{ $invoice->customer_name }}</p>
                        <div class="invoice-details">
                            <p><span>Address : </span>{{ $invoice->customer_address }}</p>
                            <P><span>TP:</span>{{ $invoice->mobile_no1 }}</p>
                            <!-- <p class="email-n"><span>Email : info@luvnarich.net</span></p> -->
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


        <section class="invoice-last-table" style="position: relative;">
            <img style="width: 60%; position: absolute;  opacity: 0.1; top:0; right: 0; transform: translateX(-50%);" src="https://i.ibb.co/sF5SRDr/icon.png" alt="">
            <table style="border: none;">
                <tr class="border-bottom-2px">
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
                $serviceCharge = 0;
                $packageIds = [];
                $futurePlans = $invoice->future_product_packages;
                $quantitiesFuture = json_decode($invoice->future_product_package_quantities, true) ?? [];
                $mainPlans = $invoice->main_product_package;
                $quantitiesMain = json_decode($invoice->main_product_package_quantities, true) ?? [];


                @endphp

                @if($futurePlans != null)
                    @foreach (json_decode($invoice->future_product_packages, true) as $packageId)
                @php
                $packageIds[] = $packageId;
                $packageQtyFutures = $quantitiesFuture[$packageId] ?? 1;
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
                        <p class="uni-middle-p right-align">{{ $productItem->quantity * $packageQtyFutures }}</p>
                        <br>
                        <hr>
                    </td>
                    <td>
                        @php
                        $row_sum = $productItem->amount * $productItem->quantity * $packageQtyFutures;
                        @endphp
                        <p class="last-un right-align">{{ 'Rs ' . $row_sum }}</p>
                        <br>
                        <hr>
                    </td>
                </tr>
                @php
                $subtotal += $row_sum;
                if ($index === 0 || !in_array($packageId, $packageIds)) {
                $alldiscount += $productItem->package_discount * $packageQtyFutures;
                $totalTax += $productItem->package_tax * $packageQtyFutures;
                $deliverFee += $productItem->package_delivery_fee * $packageQtyFutures;
                $serviceCharge += $productItem->service_charge * $packageQtyFutures;
                }
                @endphp
                @endforeach
                @endforeach
                @endif

                @if($mainPlans != null)
                    @foreach (json_decode($invoice->main_product_package, true) as $packageId)
                @php
                $packageIds[] = $packageId;
                $packageQtyMains = $quantitiesMain[$packageId] ?? 1;
                
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
                        <p class="uni-middle-p right-align">{{ $productItem->quantity * $packageQtyMains }}</p>
                        <br>
                        <hr>
                    </td>
                    <td>
                        @php
                        $row_sum = $productItem->amount * $productItem->quantity * $packageQtyMains;
                        @endphp
                        <p class="last-un right-align">{{ 'Rs ' . $row_sum }}</p>
                        <br>
                        <hr>
                    </td>
                </tr>
                @php
                $subtotal += $row_sum;
                if ($index === 0 || !in_array($packageId, $packageIds)) {
                $alldiscount += $productItem->package_discount * $packageQtyMains;
                $totalTax += $productItem->package_tax * $packageQtyMains;
                $deliverFee += $productItem->package_delivery_fee * $packageQtyMains;
                $serviceCharge += $productItem->service_charge * $packageQtyMains;
                }
                @endphp
                @endforeach
                @endforeach
                @endif


                <tr>
                    <td></td>
                    <td>
                        <p class="uni-middle-p right-align"><b>Subtotal</b></p>
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
                        <p class="uni-middle-p right-align"><b>Discounted price</b></p>
                        <hr>
                    </td>
                    <td>
                        <br>
                        <hr>
                    </td>

                    <td>
                        @php
                        $amountwithdiscount = $subtotal - $alldiscount;
                        @endphp
                        <p class="uni-middle-p right-align">Rs.{{ $amountwithdiscount }}</p>
                        
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align"><b>Packaging, Distribution & Handling Fee </b></p>
                    </td>
                    <td>
                        <br>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align">Rs.{{ $totalTax }}</p>
                    </td>
                </tr>
                @if($serviceCharge != 0)
                <tr>
                    <td>
                        <br>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align"><b>Tax and service charges</b></p>
                        <hr>
                    </td>
                    <td>
                        <br>
                        <hr>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align">Rs.{{ $serviceCharge }}</p>
                        <hr>
                    </td>
                </tr>
                @endif
                <tr>
                    <td>
                        <br>
                    </td>
                    <td>
                        <p class="uni-middle-p right-align"><b>Delivery Charges</b></p>
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
                        <p class="uni-middle-p right-align">Rs.{{ $amountwithdiscount + $deliverFee + $totalTax + $serviceCharge }}</p>
                    </td>
                </tr>

        </section>

    </div>

    <!-- Display other invoice details as needed -->
</body>

</html>