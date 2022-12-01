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
                    <h1 class="m-0">Profile</h1>
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
                            <form action="update_logo" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <img src="<?= url($vendor_data->logo != '' ? $vendor_data->logo : 'public/dist/img/user2-160x160.jpg') ?>" style="height:180px;width:180px" class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="col-md-12" id="select_client">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Upload Logo</label>
                                        <input type="file" name="logo" id="logo" class="form-control">
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
                            <form action="editProfile" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="{{ $vendor_data->username }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company Name</label>
                                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $vendor_data->company_name }}" placeholder="Enter Company Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" value="{{ $vendor_data->email }}" placeholder="Enter Email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Office Number</label>
                                            <input type="number" class="form-control" name="office_no" id="office_no" value="{{ $vendor_data->office_no }}" placeholder="Office Number" required>
                                        </div>
                                    </div>

                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Other Number</label>
                                            <input type="number" class="form-control" name="other_no" id="other_no" value="{{ $vendor_data->other_no }}" placeholder="Other Number" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Office Address</label>
                                            <textarea class="form-control summernote" name="office_address" id="office_address" value="{{ $vendor_data->office_address }}" placeholder="Office Address" required>{{ $vendor_data->office_address }}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-6" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Other(Sales) Address</label>
                                            <textarea class="form-control summernote" name="other_address" id="other_address" value="{{ $vendor_data->other_address }}" placeholder="Other(Sales) Address" required>{{ $vendor_data->other_address }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Bank Details</label>
                                            <textarea class="form-control summernote" name="bank_details" id="bank_details" value="{{ $vendor_data->bank_details }}" placeholder="Bank Details" required>{{ $vendor_data->bank_details }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Swift Bank Details</label>
                                            <textarea class="form-control summernote" name="swift_bank_details" id="swift_bank_details" value="{{ $vendor_data->swift_bank_details }}" placeholder="Swift Bank Details" required>{{ $vendor_data->swift_bank_details }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-2" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">City</label>
                                            <input type="text" class="form-control" name="city" id="city" value="{{ $vendor_data->city }}" placeholder="Enter City Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="client_name_text_box">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">State</label>
                                            <input type="text" class="form-control" name="state" id="state" value="{{ $vendor_data->state }}" placeholder="Enter State Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        <button type="submit" class="btn btn-primary" name="updateProfileDetails">Update Profile</button>
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

@if(Session::get('msg') != '' && count(session()->get('msg')) > 0)
@foreach(session()->get('msg') as $singlemsg)

<script>
    show_Toaster('<?= $singlemsg ?>', '<?= session()->get('type') ?>')
</script>
@endforeach

@php(session(['type' => '','msg' => []]))
@endif

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            tabsize: 1,
            height: 150,
        });

    });
</script>