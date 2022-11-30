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
                    <h1 class="m-0">Add Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-2">
                    <!-- Invoice Basic Details -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Profile</h3>

                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body text-center">
                            <form action="add_invoice" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <img src="<?= url($vendor_data->logo != '' ? $vendor_data->logo : 'public/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="col-md-12" id="select_client">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Upload Logo</label>
                                        <input type="file" name="logo" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="updateProfile">Update Profile Image</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Profile</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="add_invoice" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company Name</label>
                                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name">
                                        </div>
                                    </div>

                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                                        </div>
                                    </div>

                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Office Number</label>
                                            <input type="number" class="form-control" name="office_number" id="office_number" placeholder="Office Number">
                                        </div>
                                    </div>

                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Other Number</label>
                                            <input type="number" class="form-control" name="other_number" id="other_number" placeholder="Other Number">
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Office Address</label>
                                            <textarea class="form-control" name="office_address" id="office_address" placeholder="Office Address"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-6" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Other(Sales) Address</label>
                                            <textarea class="form-control" name="other_address" id="other_address" placeholder="Other(Sales) Address"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Bank Details</label>
                                            <textarea class="form-control" name="bank_details" id="bank_details" placeholder="Bank Details"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Swift Bank Details</label>
                                            <textarea class="form-control" name="swift_bank_details" id="swift_bank_details" placeholder="Swift Bank Details"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">City</label>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter City Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">State</label>
                                            <input type="text" class="form-control" name="state" id="state" placeholder="Enter State Name">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        <button type="submit" class="btn btn-primary" name="updateProfile">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</section>


</div>

<!-- footer Component -->
@include('vendor.includes.footer')