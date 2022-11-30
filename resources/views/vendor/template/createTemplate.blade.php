<!-- Header Component -->
@include('vendor.includes.header')

<!-- Sidebar Component -->
@include('vendor.includes.sidebar')


<!--  Main Content Starts-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Templates</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Invoice Template</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" id="section">

            <div class="card card-default" id="section_0">
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
                <div class="card-body" id="element_main_0">

                    <div class="row">
                        <!-- Single Element -->
                        <div class="col-md-12">
                            <div class="row" id="element_div_0">
                                <div class="col-md-3">
                                    <select name="inputType"class="form-control"  onchange="create_element(this,'element_div_0')" >
                                        <option value="-1">Input Type</option>
                                        <option value="0">Paragraph</option>
                                        <option value="1">Table</option>
                                        <option value="2">Footer Notes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary add_section" data-key="0" onclick="add_new_section(this)">Add New Section</button>
                </div>
            </div>

        </div>
    </section>
</div>

<!--  Main Content Ends-->

<!-- footer Component -->
@include('vendor.includes.footer')


<script>
    function add_new_element(div) {

    }

    function add_new_section(e) {
        var key = $('.add_section').attr('data-key');
        var newKey = parseInt(key)+1;
        $('.add_section').attr('data-key',newKey);
        var html = `<div class="card card-default" id="section_${newKey}">
                <div class="card-header">
                    
                    <h3 class="card-title">Dynamic Section ${newKey} </h3>
                    <button type="button" class="btn btn-tool" onclick="delete_section('section_${newKey}')">
                        <i class="fas fa-trash text-danger"></i>
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="element_main_${newKey}">

                    <div class="row">
                        <!-- Single Element -->
                        <div class="col-md-12">
                            <div class="row" id="element_div_${newKey}">
                                <div class="col-md-3">
                                    <select name="inputType"class="form-control"  onchange="create_element(this,'element_div_${newKey}')" >
                                        <option value="-1">Input Type</option>
                                        <option value="0">Paragraph</option>
                                        <option value="1">Table</option>
                                        <option value="2">Footer Notes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary section" data-key="${newKey}" onclick="add_new_section('section-${newKey}')">Add New Section</button>
                </div>
        </div>`;

        
        $('#section').append(html);
    }

    function delete_section(id){
        $(`#${id}`).remove();
    }


    function create_element(e, id){


        var type = $(e).val(); 

        if(type == 0){
            $(e).parent().remove();
            var html = `
            <div class="col-md-3">
                <input type="text" name="title" class="form-control">
            </div>
            <div class="col-md-5">
                <textarea type="text" name="title" class="form-control"></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="add_new_element('element_main_0','0')">add new Item</button>
            `
            $(`#${id}`).append(html);

            
        }


    }
</script>