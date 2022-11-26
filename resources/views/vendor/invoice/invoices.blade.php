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
                    <h1 class="m-0">All Invoices</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Invoices</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Invoices Till Date</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client Name</th>
                                        <th>Invoice Number</th>
                                        <th>Invoice Date</th>
                                        <th>P.O Number</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) == 0)
                                    <tr class="text-center">
                                        <th colspan="7">No Invoice yet!</th>
                                    </tr>
                                    @else
                                    @foreach($data as $key => $invoice)
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $invoice->client_name ?></td>
                                        <td><?= $invoice->invoice_no ?></td>
                                        <td><?= $invoice->invoice_date ?></td>
                                        <td><?= $invoice->po_number ?></td>
                                        <td><?= $invoice->created_at ?></td>
                                        <td>
                                            <a href="editInvoice/<?= $invoice->id ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="invoicePreview/<?= $invoice->id ?>" class="btn btn-sm btn-primary">Preview</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="d-flex float-right">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

        </div>
    </section>

    <!-- Main Content -->
</div>

<!-- footer Component -->
@include('vendor.includes.footer')