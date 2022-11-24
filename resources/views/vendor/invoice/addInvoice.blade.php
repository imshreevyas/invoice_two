<!-- Header Component -->
@include('vendor.includes.header')

<!-- Sidebar Component -->
@include('vendor.includes.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Invoice</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Invoice</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <form action="add_invoice" method="POST">
                {{ csrf_field() }}
                <!-- Invoice Basic Details -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add Invoice</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button> -->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1" id="select_client">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Select Client</label>
                                    <select name="client_name" onchange="show_client_text_box(this)" id="show_client_textbox" class="form-control">
                                        @if(count($clients) == 0)
                                        <option value="0">Other</option>
                                        @else
                                        @foreach($clients as $key => $client)
                                        <option value="1"><?= $client->client_name ?></option>
                                        @endforeach
                                        <option value="0">Other</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Invoice Type</label>
                                    <select name="invoice_type" onchange="show_po_card(this)" id="show_po" class="form-control">
                                        <option value="0">Proforma Invoice</option>
                                        <option value="1">P.o Invoice</option>
                                        <option value="2">Commercial Invoice</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Invoice Number</label>
                                    <input type="text" class="form-control" name="invoice_no" id="invoiceNo" placeholder="Invoice Number">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Invoice Date</label>
                                    <div class="input-group date" id="dateFeild" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#dateFeild" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input" placeholder="Select Date" name="invoice_date" data-target="#dateFeild">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group" id="po_number">
                                    <label for="exampleInputPassword1">P.O Number</label>
                                    <input type="text" class="form-control" name="po_number" placeholder="P.O Number">
                                </div>
                            </div>

                            <div class="col-md-2 d-none" id="client_name_text_box">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Client Name</label>
                                    <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Client Name">
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- Invoice Basic Details Ends -->

                <!-- Invoice Bill To Multiple -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add Address</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button> -->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="bill_to_div">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Enter Address Title</label>
                                    <input type="text" class="form-control" name="bill_to[0][title]" id="bill_to" placeholder="Enter Title">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Enter Address</label>
                                    <textarea type="text" class="form-control" name="bill_to[0][address]" id="bill_to" placeholder="Enter Bill To"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" onclick="append_bill_to()">Add New</button>
                    </div>
                </div>
                <!-- Invoice Bill To Multiple Ends -->

                <!-- Invoice Ship To Multiple -->
                <!-- <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Ship To</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" id="ship_to_div">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="ship_to[0]" id="bill_to" placeholder="Enter Bill To"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" onclick="append_ship_to()">Add New</button>
                    </div>
                </div> -->
                <!-- Invoice Ship To Multiple Ends-->

                <!-- P.O Details -->
                <div class="card card-default d-none" id="po_details">
                    <div class="card-header">
                        <h3 class="card-title">P.O Details</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button> -->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ref Number</label>
                                    <input type="text" class="form-control" name="po_details[ref_number]" id="ref_number" placeholder="Ref Number">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Terms</label>
                                    <input type="text" class="form-control" name="po_details[terms]" id="bill_to" placeholder="Enter Bill To">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Order Date</label>
                                    <div class="input-group date" id="dateFeild" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#dateFeild" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input" placeholder="Select Date" name="po_details[po_order_date]" data-target="#dateFeild">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ship Via</label>
                                    <input type="text" class="form-control" name="po_details[ship_via]" id="bill_to" placeholder="Enter Bill To">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Ship Date</label>
                                    <div class="input-group date" id="dateFeild" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#dateFeild" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input" placeholder="Select Date" name="po_details[po_ship_date]" data-target="#dateFeild">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ship Acc.</label>
                                    <input type="text" class="form-control" name="po_details[ship_acc]" id="bill_to" placeholder="Enter Bill To">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tracking NO.</label>
                                    <input type="text" class="form-control" name="po_details[tracking_no]" id="bill_to" placeholder="Enter Bill To">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- P.O Details Ends-->

                <!-- Product Details -->
                <div id="product_box">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Product Details (Box 1)</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button> -->
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="pro_div">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Part No.</label>
                                        <input type="text" class="form-control" name="box[0][0][part_num]" id="part_number" placeholder="Part Number">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Desc</label>
                                        <input type="text" class="form-control" name="box[0][0][desc]" id="bill_to" placeholder="Enter Description">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">QTY</label>
                                        <input type="text" class="form-control" name="box[0][0][qty]" id="bill_to" placeholder="Enter Quantity">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Unit Price</label>
                                        <input type="text" class="form-control" name="box[0][0][ship_acc]" id="bill_to" placeholder="Enter Unit Price">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">CD</label>
                                        <input type="text" class="form-control" name="box[0][0][cd]" id="bill_to" placeholder="Enter CD">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Total Price</label>
                                        <input type="text" class="form-control" name="box[0][0][tracking_no]" id="bill_to" placeholder="Enter Total Price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" onclick="append_product_div()">Add New Box</button>
                            <button type="button" class="btn btn-primary" onclick="append_product()">Add New</button>
                        </div>

                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- Product Details ends-->

                <!-- Notes -->
                <div class="row">
                    <!-- Notes -->
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Notes</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button> -->
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" id="notes_div">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Note type</label>
                                            <select name="notes[0][type]" id="" class="form-control">
                                                <option value="0">Normal</option>
                                                <option value="danger">Alert</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Notes</label>
                                            <textarea type="text" class="form-control" name="notes[0][msg]" id="bill_to" placeholder="Enter Bill To"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="append_notes()">Add New</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- Notes Ends -->

                    <!-- Extra Charges -->
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Extra Charges</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Admin Charges</label>
                                            <input type="text" class="form-control" name="extra[admin_charge]" id="bill_to" placeholder="Enter Bill To">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Wire Trans Fee</label>
                                            <input type="text" class="form-control" name="extra[wire_charge]" id="bill_to" placeholder="Enter Bill To">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- Extra Charges Ends -->
                </div>
                <!-- Notes End -->
                <br>
                <br>
                <!-- Extra Charges -->
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Create Invoice</button>
                    </div>
                </div>
                <!-- Extra Charges End-->


            </form>
        </div>
    </section>
    <br>
    <br>
    <br>
    <!-- Main Content -->
</div>

<!-- footer Component -->
@include('vendor.includes.footer')

<script>
    // run On Page ready 
    show_po_card();

    // Variables for multiple appends last key
    var bill_to_key = 0;
    var product_details_key = 0;
    var notes_key = 0;
    var box = 0;

    //  Append Htmls

    function append_bill_to() {
        bill_to_key++
        var html = `<div class="col-md-12" id="bill_to_${bill_to_key}">
            <div class="row">
                <div class="col-md-1">
                    <button type="button" <button type="button" class="btn-sm btn btn-link text-danger" onclick="delete_div('bill_to_${bill_to_key}')"><i class="fas fa-trash "></i></button>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Enter Address Title</label>
                        <input type="text" class="form-control" name="bill_to[${bill_to_key}][title]" id="bill_to" placeholder="Enter Title">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Enter Address</label>
                        <textarea type="text" class="form-control" name="bill_to[${bill_to_key}][address]" id="bill_to" placeholder="Enter Address"></textarea>
                    </div>
                </div>
            </div>
        </div>`;
        append_to_child('bill_to_div', html)
    }

    function append_notes() {
        notes_key++
        var html = `<div class="row" id="notes_${notes_key}">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-1">
                    <button type="button" class="fas fa-trash" onclick="delete_div('notes_${notes_key}')"></button>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Note type</label>
                                <select name="notes[${notes_key}][type]" id="" class="form-control">
                                    <option value="0">Normal</option>
                                    <option value="danger">Alert</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Notes</label>
                                <textarea type="text" class="form-control" name="notes[${notes_key}][msg]" id="bill_to" placeholder="Enter Bill To"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
        append_to_child('notes_div', html)
    }


    function append_product() {
        product_details_key++;
        var html = `<div class="row" id="pro_${product_details_key}">
            <button type="button" class="btn-sm btn btn-link text-danger" onclick="delete_div('pro_${product_details_key}')"><i class="fas fa-trash "></i></button>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputPassword1">Part No.</label>
                    <input type="text" class="form-control" name="product_details[${product_details_key}][part_num]" id="part_number" placeholder="Part Number">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputPassword1">Desc</label>
                    <input type="text" class="form-control" name="product_details[${product_details_key}][desc]" id="bill_to" placeholder="Enter Description">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputPassword1">QTY</label>
                    <input type="text" class="form-control" name="product_details[${product_details_key}][qty]" id="bill_to" placeholder="Enter Quantity">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputPassword1">Unit Price</label>
                    <input type="text" class="form-control" name="product_details[${product_details_key}][ship_acc]" id="bill_to" placeholder="Enter Unit Price">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputPassword1">CD</label>
                    <input type="text" class="form-control" name="product_details[${product_details_key}][cd]" id="bill_to" placeholder="Enter CD">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputPassword1">Total Price</label>
                    <input type="text" class="form-control" name="product_details[${product_details_key}][tracking_no]" id="bill_to" placeholder="Enter Total Price">
                </div>
            </div>
        </div>`;
        append_to_child('pro_div', html)
    }


    function append_product_div(){
        console.log('sadasdasd');
        box++;
        var html = `<div class="card card-default" id="box_${box}">
            <div class="card-header">
                <h3 class="card-title">Product Details (Box ${box+1})</h3>
                <div class="card-tools">
                <button type="button" class="btn-sm btn btn-link text-danger" onclick="delete_div('box_${box}')"><i class="fas fa-trash "></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="pro_div">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Part No.</label>
                            <input type="text" class="form-control" name="box[${box}][0][part_num]" id="part_number" placeholder="Part Number">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Desc</label>
                            <input type="text" class="form-control" name="box[${box}][0][desc]" id="bill_to" placeholder="Enter Description">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputPassword1">QTY</label>
                            <input type="text" class="form-control" name="box[${box}][0][qty]" id="bill_to" placeholder="Enter Quantity">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Unit Price</label>
                            <input type="text" class="form-control" name="box[${box}][0][ship_acc]" id="bill_to" placeholder="Enter Unit Price">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputPassword1">CD</label>
                            <input type="text" class="form-control" name="box[${box}][0][cd]" id="bill_to" placeholder="Enter CD">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Total Price</label>
                            <input type="text" class="form-control" name="box[${box}][0][tracking_no]" id="bill_to" placeholder="Enter Total Price">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary" onclick="append_product_div()">Add New Box</button>
                <button type="button" class="btn btn-primary" onclick="append_product()">Add New</button>
            </div>

            <!-- /.card-body -->
        </div>`;
        append_to_child('product_box', html)
    }






    // Other Functions
    function show_po_card(e) {

        if ($('#show_po').val() == 1) {
            $('#po_number').removeClass('d-none');
            $('#po_details').removeClass('d-none');
        } else {
            $('#po_number').addClass('d-none');
            $('#po_details').addClass('d-none');
        }
    }

    function show_client_text_box() {
        if ($('#show_client_textbox').val() == 0) {
            $('#client_name_text_box').removeClass('d-none');
        } else {
            $('#client_name_text_box').addClass('d-none');
        }
    }



    //  Common Js 

    //Date picker
    var date = new Date().toLocaleDateString();
    $('#dateFeild').datetimepicker({
        defaultDate: date,
        format: 'L'
    });

    //Date and time picker
    $('#dateFeild').datetimepicker({
        icons: {
            time: 'far fa-clock'
        }
    });

    function append_to_child(id, html) {
        $(`#${id}`).append(html);
    }

    function delete_div(id) {
        $(`#${id}`).remove();
    }
</script>