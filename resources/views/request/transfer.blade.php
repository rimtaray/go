@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">เบิกจ่ายสินค้าไปร้านต่างสาขา</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item">Generic</li>
                        <li class="breadcrumb-item active" aria-current="page">Blank</li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
        <div class="col-lg-6 col-xl-6">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <form action="" method="post" enctype="multipart/form-data" onsubmit="return false;">
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">เพิ่มรายการเบิกจ่ายสินค้า (s/n)</h2>
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="t_name">รหัสสินค้า / บาร์โค้ด</label>
                                <input type="text" class="form-control" id="t_name" name="t_name">
                            </div>
                            <div class="form-group">
                                <a href="{{ url('') }}"><button type="button" class="btn btn-primary">เพิ่มรายการ</button></a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- END Basic Elements -->

                </form>
            </div>    
        </div>




    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">รายการสินค้า Non s/n</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                            <th style="width: 15%;">Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Jose Mills</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client1<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger">Disabled</span>
                            </td>
                            <td>
                                <em class="text-muted">2 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Laura Carr</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client2<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-warning">Trial</span>
                            </td>
                            <td>
                                <em class="text-muted">3 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Adam McCoy</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client3<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger">Disabled</span>
                            </td>
                            <td>
                                <em class="text-muted">8 days ago</em>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td class="font-w600">
                                <a href="be_pages_generic_blank.html">Laura Carr</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                client4<em class="text-muted">@example.com</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-info">Business</span>
                            </td>
                            <td>
                                <em class="text-muted">2 days ago</em>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->



        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
                <div class="block-content">
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return false;">
                        <!-- Basic Elements -->
                        <h2 class="content-heading pt-0">ร้านที่รับสินค้า</h2>
                        <div class="row push">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="example-select">รายชื่อร้านค้า</label>
                                    <select class="form-control" id="example-select" name="example-select">
                                        <option value="0">Please select</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">พิมพ์ใบส่งสินค้า</button>
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- END Basic Elements -->
    
                    </form>
                </div>
            </div>
            <!-- END Your Block -->




        </div>

        <div class="col-lg-6 col-xl-6">
            
            <!-- Table -->
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Table</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                            <code>.table</code>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Name</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td class="font-w600">
                                    <a href="be_pages_generic_profile.html">Lori Moore</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-danger">Disabled</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">2</th>
                                <td class="font-w600">
                                    <a href="be_pages_generic_profile.html">Judy Ford</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-warning">Trial</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">3</th>
                                <td class="font-w600">
                                    <a href="be_pages_generic_profile.html">Brian Stevens</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-warning">Trial</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">4</th>
                                <td class="font-w600">
                                    <a href="be_pages_generic_profile.html">Ryan Flores</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-success">VIP</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">5</th>
                                <td class="font-w600">
                                    <a href="be_pages_generic_profile.html">Carl Wells</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-warning">Trial</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">6</th>
                                <td class="font-w600">
                                    <a href="be_pages_generic_profile.html">Helen Jacobs</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-info">Business</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Table -->
        </div>
        </div>


        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

@endsection