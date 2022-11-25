<style>
    html {
        font-family: sans-serif;
        line-height: 1.15;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -ms-overflow-style: scrollbar;
        -webkit-tap-highlight-color: transparent;
    }

    .width_120 {
        width: 100px;
    }

    .pd-95 {
        padding: 0.85rem !important;
    }

    .bold {
        font-weight: bold;
    }

    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
            "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji",
            "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
        font-size: 12px !important;
    }

    .center {
        text-align: center;
    }

    .fn_23 {
        font-size: 23px;
    }

    .table_width {
        width: 700px;
        margin: 0 auto;
        display: block !important;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-bottom: 0.5rem;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
    }

    .h1,
    h1 {
        font-size: 2.5rem;
    }

    .h2,
    h2 {
        font-size: 2rem;
    }

    .h3,
    h3 {
        font-size: 1.75rem;
    }

    .h4,
    h4 {
        font-size: 1.5rem;
    }

    .h5,
    h5 {
        font-size: 1.25rem;
    }

    .h6,
    h6 {
        font-size: 1rem;
    }

    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    th {
        font-size: 13px;
    }

    @media (min-width: 576px) {
        .container {
            max-width: 540px;
        }
    }

    @media (min-width: 768px) {
        .container {
            max-width: 720px;
        }
    }

    @media (min-width: 992px) {
        .container {
            max-width: 960px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 1170px;
        }
    }

    .container-fluid {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .color-red {
        color:red !important;
    }
    .table td,
    .table th {
        padding: 0.25rem;
        vertical-align: top;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #111;
    }

    .table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }

    .table .table {
        background-color: #fff;
    }

    .table-sm td,
    .table-sm th {
        padding: 0.3rem;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #111;
    }

    .table-bordered thead td,
    .table-bordered thead th {
        border-bottom-width: 2px;
    }

    .table-borderless tbody+tbody,
    .table-borderless td,
    .table-borderless th,
    .table-borderless thead th {
        border: 0;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary,
    .table-primary>td,
    .table-primary>th {
        background-color: #b8daff;
    }

    .table-hover .table-primary:hover {
        background-color: #9fcdff;
    }

    .table-hover .table-primary:hover>td,
    .table-hover .table-primary:hover>th {
        background-color: #9fcdff;
    }

    .table-secondary,
    .table-secondary>td,
    .table-secondary>th {
        background-color: #d6d8db;
    }

    .table-hover .table-secondary:hover {
        background-color: #c8cbcf;
    }

    .table-hover .table-secondary:hover>td,
    .table-hover .table-secondary:hover>th {
        background-color: #c8cbcf;
    }

    .table-success,
    .table-success>td,
    .table-success>th {
        background-color: #c3e6cb;
    }

    .table-hover .table-success:hover {
        background-color: #b1dfbb;
    }

    .table-hover .table-success:hover>td,
    .table-hover .table-success:hover>th {
        background-color: #b1dfbb;
    }

    .table-info,
    .table-info>td,
    .table-info>th {
        background-color: #bee5eb;
    }

    .table-hover .table-info:hover {
        background-color: #abdde5;
    }

    .table-hover .table-info:hover>td,
    .table-hover .table-info:hover>th {
        background-color: #abdde5;
    }

    .table-warning,
    .table-warning>td,
    .table-warning>th {
        background-color: #ffeeba;
    }

    .table-hover .table-warning:hover {
        background-color: #ffe8a1;
    }

    .table-hover .table-warning:hover>td,
    .table-hover .table-warning:hover>th {
        background-color: #ffe8a1;
    }

    .table-danger,
    .table-danger>td,
    .table-danger>th {
        background-color: #f5c6cb;
    }

    .table-hover .table-danger:hover {
        background-color: #f1b0b7;
    }

    .table-hover .table-danger:hover>td,
    .table-hover .table-danger:hover>th {
        background-color: #f1b0b7;
    }

    .table-light,
    .table-light>td,
    .table-light>th {
        background-color: #fdfdfe;
    }

    .table-hover .table-light:hover {
        background-color: #ececf6;
    }

    .table-hover .table-light:hover>td,
    .table-hover .table-light:hover>th {
        background-color: #ececf6;
    }

    .table-dark,
    .table-dark>td,
    .table-dark>th {
        background-color: #c6c8ca;
    }

    .table-hover .table-dark:hover {
        background-color: #b9bbbe;
    }

    .table-hover .table-dark:hover>td,
    .table-hover .table-dark:hover>th {
        background-color: #b9bbbe;
    }

    .table-active,
    .table-active>td,
    .table-active>th {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover>td,
    .table-hover .table-active:hover>th {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table .thead-dark th {
        color: #fff;
        background-color: #212529;
        border-color: #32383e;
    }

    .table .thead-light th {
        color: #495057;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .table-dark {
        color: #fff;
        background-color: #212529;
    }

    .table-dark td,
    .table-dark th,
    .table-dark thead th {
        border-color: #32383e;
    }

    .table-dark.table-bordered {
        border: 0;
    }

    .table-dark.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.05);
    }

    .table-dark.table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.075);
    }

    @media (max-width: 575.98px) {
        .table-responsive-sm {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .table-responsive-sm>.table-bordered {
            border: 0;
        }
    }

    @media (max-width: 767.98px) {
        .table-responsive-md {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .table-responsive-md>.table-bordered {
            border: 0;
        }
    }

    @media (max-width: 991.98px) {
        .table-responsive-lg {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .table-responsive-lg>.table-bordered {
            border: 0;
        }
    }

    @media (max-width: 1199.98px) {
        .table-responsive-xl {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .table-responsive-xl>.table-bordered {
            border: 0;
        }
    }

    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }

    .table-responsive>.table-bordered {
        border: 0;
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {

        /*hide all other components which not needed*/
        html,
        body {
            width: 600px;
        }

        /*the display entire div */
        .print-container,
        .print-container * {
            visibility: visible;
        }

        @page {
            size: A4 poitrate;
            -webkit-print-color-adjust: exact;
        }
    }

    .f-bold {
        font-weight: bold;
        font-size: 17px;
    }

    .c-center {
        text-align: center;
        font-weight: bold;
    }

    .ttm-row {
        padding: 80px 0px 80px 0px;
    }

    .vertical-padding {
        vertical-align: middle;
        text-align: center;
        padding: 10px 80px 10px 80px;
        color: #000;
    }

    td img {
        width: 150px;
        margin: auto;
        position: relative;
        top: 10px;
    }

    td {
        font-size: 13px;
    }
</style>
<!--page start-->
<div class="page">
    <!--header start-->
    <!--site-main start-->
    <div class="site-main">
        <!-- sidebar -->
        <div style="padding: 20px 0px 50px 0px" class="ttm-row only-one-section ttm-bgcolor-white clearfix">
            <div class="container">
                <!-- row -->
                <div class="row table_width" style="text-align: center">
                    <img src="img/logo.png" width="100" alt="">
                    <h4 style="margin: 0; text-align: center">Tax Invoice</h4>


                    @if($data['invoice_type'] == 0)
                    <div style="display: flex; justify-content: space-between;">
                        <div>
                            <p style="text-align: left;"><span style="font-size:
                  17px;font-weight:500">Regd Off : SPARK AVIATION</span><br>
                                <span style="font-weight:500">601, Raj Atlantis 1,</span><br>
                                <span style="font-weight:500">Ramdev Park, Mira Road East,</span><br>
                                <span style="font-weight:500">Thane 401107,</span> <br>
                                <span style="font-weight:500">MAHARASHRA, INDIA</span>
                            </p>
                        </div>
                        <div>
                            <h4>InvoiceNo <span> {{ $data['invoice_no'] }} </span></h4>
                            <p>Invoice Date: <span> {{ date('d/m/Y', strtotime($data['invoice_date'])) }} </span></p>
                        </div>
                    </div>
                    @elseif($data['invoice_type'] == 1)
                    <div style="display: flex; justify-content: space-between;">
                        <div>
                            <p style="text-align: left;"><span style="font-size:17px;font-weight:500">Purchase Order No:- 45613213213</p>
                        </div>
                        <div>
                            <p>Date: <span> {{ date('d/m/Y', strtotime($data['invoice_date'])) }} </span></p>
                        </div>
                    </div>
                    @else
                    <h4>Commercial Invoice / Packing Slip</h4>
                    <div style="display: flex; justify-content: space-between;">
                        <div>
                            <p style="text-align: left;"><span style="font-size:17px;font-weight:500">Invoice No:- 45613213213</p>
                        </div>
                        <div>
                            <p>Invoice Date: <span> {{ date('d/m/Y', strtotime($data['invoice_date'])) }} </span></p>
                        </div>
                    </div>

                    @endif


                    <!-- Address Section -->
                    <div style="padding:20px 40px 20px 40px;">
                        <table style="border-collapse: collapse;border-spacing: 0px;width: 100%;border-top: 0px;border-bottom: 1px solid;border-right: 1px solid;padding: 20px;" id="headings" class="table table-bordered">
                            <tbody>
                                @php($address = json_decode($data['bill_to'], true))
                                @if(count($address) > 0)
                                    @php($j = 1)
                                    @for($i=1; $i <= count($address); $i++) @if($j < 2) <tr>
                                        @endif
                                        <th style="text-align: left">
                                            <h6>{{ $address[$i-1]['title'] }}</h6>

                                            <span style="font-weight: 500">
                                                {{ $address[$i-1]['address'] }}
                                            </span>
                                        </th>
                                        @if($j == 2 || $i == count($address))
                                        @php($j = 1)
                                        </tr>
                                        @else
                                            @php($j++)
                                        @endif
                                    @endfor
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- Address Section Ends-->


                    <!-- PO Details Section -->
                    @php($po_details = json_decode($data['po_details'],true))
                    @if($data['invoice_type'] == 1 && count($po_details) > 0) 
                    <table style="border-collapse: collapse;border-spacing: 0px;width: 100%;border-top: 1px;" id="headings" class="table table-bordered">
                        <tbody style="border: 1px solid;">
                            <tr style="border: 1px solid;">
                                <td class="bold" style="border-top: 1px;text-align: center;" colspan="1">
                                    P.O. No.
                                </td>
                                <td class="bold text-center" style="border-top: 0px" colspan="1">
                                    Terms
                                </td>
                                <td class="bold" style="border-top: 1px" colspan="1">
                                    Order Date
                                </td>
                                <td class="bold" style="border-top: 1px" colspan="1">
                                    Ship via
                                </td>
                                <td class="bold" style="border-top: 1px" colspan="1">
                                    Ship Date
                                </td>
                                <td class="bold" style="border-top: 1px" colspan="1">
                                    Ship Acc.
                                </td>
                                <td class="bold" style="border-top:1px" colspan="1">
                                    Tracking No.
                                </td>
                            </tr>


                            <tr>
                                <td class="" style="border-top: 0px" colspan="1">{{ $po_details['ref_number'] }}</td>
                                <td class="" style="border-top: 0px" colspan="1">{{ $po_details['terms'] }}</td>
                                <td class="" style="border-top: 0px" colspan="1">{{ date('d/m/Y', strtotime($po_details['po_order_date'])) }}</td>
                                <td class="" style="border-top: 0px" colspan="1">{{ $po_details['ship_via'] }}</td>
                                <td class="" style="border-top: 0px" colspan="1">{{ date('d/m/Y', strtotime($po_details['po_ship_date'])) }}</td>
                                <td class="" style="border-top: 0px" colspan="1">{{ $po_details['ship_acc'] }}</td>
                                <td class="" style="border-top: 0px" colspan="1">{{ $po_details['tracking_no'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                    <!-- PO Details Section Ends-->



                    <!-- Products Details Section-->

                    <table style="border-collapse: collapse;border-spacing: 0px;width: 100%;border-top: 1px;margin-top: 30px;" id="headings" class="table table-bordered">
                        <tbody style="border: 0px solid;">
                            <tr style="border: 1px solid;">
                                <td class="bold" style="border-top: 1px;text-align: center;" colspan="1">
                                    S.N
                                </td>
                                <td class="bold text-center" style="border-top: 0px" colspan="1">
                                    PART NO>
                                </td>
                                <td class="bold" style="border-top: 1px" colspan="1">
                                    DESC>
                                </td>
                                <td class="bold" style="border-top: 1px" colspan="1">
                                    QTY
                                </td>
                                <td class="bold" style="border-top: 1px" colspan="1">
                                    CD
                                </td>
                                <td class="bold" style="border-top: 1px" colspan="1">
                                    UNIT PRICE $
                                </td>
                                <td class="bold" style="border-top:1px" colspan="1">
                                    TOTAL PRICE $
                                </td>
                            </tr>

                            <tr>
                                <td class="" style="border-top: 0px" colspan="1">
                                    1
                                </td>
                                <td class="" style="border-top: 0px" colspan="1">EMT00300-01</td>
                                <td class="" style="border-top: 0px" colspan="1">
                                    RESERVOIR
                                </td>
                                <td class="" style="border-top: 0px" colspan="1">1</td>
                                <td class="" style="border-top: 0px" colspan="1">NE</td>
                                <td class="" style="border-top: 0px" colspan="1">1303.50</td>
                                <td class="" style="border-top: 0px" colspan="1">1303.50</td>
                            </tr>

                            <tr>
                                <td class="" style="border: 0px" colspan="1"> </td>
                                <td class="" style="border: 0px" colspan="1"></td>
                                <td class="" style="border: 0px" colspan="1"></td>
                                <td class="" style="border: 0px" colspan="1"></td>
                                <td class="" style="border: 0px" colspan="1"></td>
                                <td class="" style="border-top: 0px" colspan="1">WIRE TRANS FEE-</td>
                                <td class="" style="border-top: 0px" colspan="1"> 25.00</td>
                            </tr>
                            <tr style="border: 0px;">
                                <td class="" style="border: 0px" colspan="1"> </td>
                                <td class="" style="border: 0px" colspan="1"></td>
                                <td class="" style="border: 0px" colspan="1"></td>
                                <td class="" style="border: 0px" colspan="1"></td>
                                <td class="" style="border: 0px" colspan="1"></td>
                                <td class="" style="border-top: 0px" colspan="1">TOTAL PRICE-</td>
                                <td class="" style="border-top: 0px" colspan="1">1328.50</td>
                            </tr>
                        </tbody>
                    </table>


                    <!-- Notes -->
                    @php($notes = json_decode($data['notes'], true))
                    @if(count($notes) > 0)
                        @foreach($notes as $note)
                            <h5 style="text-transform: uppercase;text-align: left;margin-top:15px;" class="{{ $note['type'] == 0 ? '' : 'color-red' }}"> {{ $note['msg'] }} </h5>
                        @endforeach
                    @endif
                    <!-- Notes Ends -->

                    <!-- Bank Details  -->
                    <p style="text-align: left;">Please use the following Bank details for your money transfer to <span>SPARK AVIATION</span>from outside India: </p>
                    <div style="display: flex; justify-content:space-between">
                        <div style="text-align:left;color:#000;font-weight:400;font-size:13px;border:1pxsolid #000">
                            <p style="padding:10px;margin:0px">
                                Beneficiary Name: <span> SPARK AVIATION</span><br>
                                Bank Name:<span>HDFC Bank Ltd.</span><br>
                                A/c. No:<span>50200062918771</span><br>
                                Account Type:<span>Current</span><br>
                                IFSC:<span>HDFC0001077</span><br>
                                Branch:<span>Berverly Park,Mira Road, Thane</span><br>
                                Swift Code:<span>HDFCINBB</span><br>
                                Corresponding Bank:<span>J P Morgan Chase Bank, New York, USA</span><br>
                                Swift Code: <span>CHASU33</span><br>
                                CHIPS ABA:<span>0002</span><br>
                                FEDWIRE ABA<span>021000021</span><br>
                                CHIPS UID<span>#354459</span>
                            </p>
                        </div>

                    </div>


                    <p class="bold" style="margin-top: 10px; text-align: left">
                        Sales Off : Spark Aviation UBP/ST/O/3L/2A-M3M Urbana Business Park,sector-67, Gurugram, Haryana, 122101, India.
                    </p>
                </div>
                <!-- row end -->
            </div>
        </div>
        <!-- sidebar end -->
    </div>
    <!--site-main end-->
    <!--footer start-->
    <!--back-to-top end-->
</div>