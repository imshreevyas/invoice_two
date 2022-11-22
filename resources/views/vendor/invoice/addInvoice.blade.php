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



    <!-- Main Content -->
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Invoice Type</label>
                                    <select name="invoice_type" onchange="show_po_card(this)" id="show_po" class="form-control">
                                        <option value="0">Proforma Invoice</option>
                                        <option value="1">P.o Invoice</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Invoice Number</label>
                                    <input type="text" class="form-control" name="invoice_no" id="invoiceNo" placeholder="Invoice Number">
                                </div>
                            </div>

                            <div class="col-md-3">
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

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">P.O Number</label>
                                    <input type="text" class="form-control" name="po_number" id="po_number" placeholder="P.O Number">
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
                        <h3 class="card-title">Bill To</h3>

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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="bill_to[0]" id="bill_to" placeholder="Enter Bill To"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Invoice Bill To Multiple Ends -->

                <!-- Invoice Ship To Multiple -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Ship To</h3>

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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="ship_to[0]" id="bill_to" placeholder="Enter Bill To"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Invoice Ship To Multiple Ends-->

                <!-- P.O Details -->
                <div class="card card-default">
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
                                    <label for="exampleInputPassword1">P.O Number</label>
                                    <input type="text" class="form-control" name="po_details[po_number]" id="po_number" placeholder="P.O Number">
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
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Product Details</h3>

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
                                    <label for="exampleInputPassword1">Part No.</label>
                                    <input type="text" class="form-control" name="product_details[0][part_num]" id="po_number" placeholder="P.O Number">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Desc</label>
                                    <input type="text" class="form-control" name="product_details[0][desc]" id="bill_to" placeholder="Enter Bill To">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">QTY</label>
                                    <input type="text" class="form-control" name="product_details[0][qty]" id="bill_to" placeholder="Enter Bill To">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Unit Price</label>
                                    <input type="text" class="form-control" name="product_details[0][ship_acc]" id="bill_to" placeholder="Enter Bill To">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Total Price</label>
                                    <input type="text" class="form-control" name="product_details[0][tracking_no]" id="bill_to" placeholder="Enter Bill To">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- Product Details ends-->
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Note type</label>
                                            <select name="notes[type]" id="" class="form-control">
                                                <option value="0">Normal</option>
                                                <option value="danger">Alert</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Notes</label>
                                            <textarea type="text" class="form-control" name="notes[msg]" id="bill_to" placeholder="Enter Bill To"></textarea>
                                        </div>
                                    </div>
                                </div>
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
                                    <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button> -->
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

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Create Invoice</button>
                    </div>
                </div>
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

    show_po_card();

    function show_po_card(e) {
        console.log($('#show_po').val())
    }
</script>