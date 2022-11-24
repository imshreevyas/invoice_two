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
                            <div class="float-right">
                                <button class="btn btn-primary " onclick="show_add_client_modal()">Add New Client</button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client Name</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) == 0)
                                    <tr class="text-center">
                                        <th colspan="7">No Clients yet!</th>
                                    </tr>
                                    @else
                                    @foreach($data as $key => $client)
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $client->client_name ?></td>
                                        <td><?= $client->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' ?></td>
                                        <td><?= $client->created_at ?></td>
                                        <td>
                                            <button onclick="show_modal('<?= $client->id ?>','<?= $client->client_name ?>','<?= $client->status ?>')" class="btn btn-sm btn-primary">Edit</button>
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

<!--  Edit Modal -->
<div class="modal" id="edit_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Client Name</label>
                            <input type="text" class="form-control" id="client_name" placeholder="Client Name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Activate</label>
                            <input type="radio" name="status" id="activate" value="1">
                            <label for="exampleInputPassword1">Deactivate</label>
                            <input type="radio" name="status" id="deactivate" value="0">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="update_client()" id="updateClient">Update Client</button>
                <button type="button" class="btn btn-secondary" onclick="clear_edit_model_data()" >Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal" id="add_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Client Name</label>
                            <input type="text" class="form-control" id="add_client_name" placeholder="Client Name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="add_client()" id="addClient">Add Client</button>
                <button type="button" class="btn btn-secondary" onclick="clear_add_model_data()" >Close</button>
            </div>
        </div>
    </div>
</div>


<!-- footer Component -->
@include('vendor.includes.footer')


<script>

    function show_modal(id, name, status) {
        $('#edit_modal').modal('show');
        $('#client_name').val(name);
        $('#updateClient').val(id);

        var status_id = status == 1 ? 'activate' : 'deactivate'
        $(`#${status_id}`).attr('checked', 'true');
    }

    function show_add_client_modal() {
        $('#add_client_name').val('');
        $('#add_modal').modal('show');
    }

    function clear_edit_model_data(){
        $('#edit_modal').modal('hide');
        $('#client_name').val('');
        $('#updateClient').val('');
        $('#updateClient').html('Update now.');
    }

    function clear_add_model_data(){
        $('#add_modal').modal('hide');
        $('#client_name').val('');
        $('#updateClient').html('Add Client');
    }

    function update_client() {

        $('#updateClient').html('Please Wait...');
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('page');
        const param = page != '' ? `?page=${page}` : '';
        var formdata = new FormData();
        var getSelectedValue = document.querySelector('input[name="status"]:checked');
        formdata.append('id', $('#updateClient').val());
        formdata.append('client_name', $('#client_name').val());
        formdata.append('status', getSelectedValue.value);

        axios.post('edit_client', formdata).then(function(res) {
            console.log(res);
            $('#client_name').val('');
            $('#updateClient').val('');
            $('#updateClient').html('Update now.');

            Object.values(res.data.message).forEach((msg) => {
                show_Toaster(msg, res.data.type);
            })
            if (res.data.type == 'success') {
                $('#edit_modal').modal('hide');
                window.location.href = `allClients${param}`;
            }

        }).catch(function(error) {
            Object.values(error.response.data.errors).forEach((msg) => {
                show_Toaster(msg[0], 'error');
            })
            $('#updateClient').html('Update now.');
        })
    }

    function add_client(){
        $('#addClient').html('Please Wait...');
        var formdata = new FormData();
        formdata.append('client_name', $('#add_client_name').val());

        axios.post('add_client', formdata).then(function(res) {

            Object.values(res.data.message).forEach((msg) => {
                show_Toaster(msg, res.data.type);
            })
            if (res.data.type == 'success') {
                $('#client_name').val('');
                $('#addClient').html('Add Client');
                $('#edit_modal').modal('hide');
                window.location.href = `allClients`;
            }

        }).catch(function(error) {
            Object.values(error.response.data.errors).forEach((msg) => {
                show_Toaster(msg[0], 'error');
            })
            $('#addClient').html('Add Client');
        })
    }
   
</script>