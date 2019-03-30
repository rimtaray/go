@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">บาร์โค้ด</h1>
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
            <div class="col-lg-4 col-xl-4">
                    <!-- Your Block -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
                            <form action="" method="post" enctype="multipart/form-data" onsubmit="return false;">
                                <!-- Basic Elements -->
                                <h2 class="content-heading pt-0">สร้างบาร์โค้ด</h2>
                                <div class="row push">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="t_name">ชื่อสินค้า</label>
                                            <input type="text" class="form-control" id="t_name" name="t_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="t_name">บาร์โค้ด</label>
                                            <input type="text" class="form-control" id="t_name" name="t_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="t_amount">ราคาสินค้า</label>
                                            <input type="text" class="form-control" id="t_amount" name="t_name">
                                        </div>
                                        <div class="form-group">
                                            <a href="{{ url('') }}"><button type="button" class="btn btn-primary">สร้าง</button></a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <!-- END Basic Elements -->
            
                            </form>
                        </div>
                    </div>
                    <!-- END Your Block -->

            </div>

            <div class="col-lg-8 col-xl-8">

            <!-- Dynamic Table Full -->
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">รายการบาร์โค้ด</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%;">#</th>
                                    <th class="text-center" style="width: 25%;">ชื่อสินค้า</th>
                                    <th class="text-center" style="width: 25%;">บาร์โค้ด</th>
                                    <th class="text-center" style="width: 25%;">ราคา</th>
                                    <th class="text-center" style="width: 15%;">พิมพ์</th>
                                    <th class="text-center" style="width: 5%;">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-left">Andrea Gardner</td>
                                    <td class="text-left">114242424</td>
                                    <td class="text-left">ราคา 100 บาท</td>
                                    <td class="text-center">
                                            <div class="input-group">
                                                <input type="text" class="form-control from-control-sm" id="t_barcode" name="t_barcode">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-print"></i></button>
                                                </div>
                                            </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-left">Andrea</td>
                                    <td class="text-left">5398688</td>
                                    <td class="text-left">ราคา 100 บาท</td>
                                    <td class="text-center">
                                            <div class="input-group">
                                                <input type="text" class="form-control from-control-sm" id="t_barcode" name="t_barcode">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-print"></i></button>
                                                </div>
                                            </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-left">Gardner</td>
                                    <td class="text-left">557272</td>
                                    <td class="text-left">ราคา 100 บาท</td>
                                    <td class="text-center">
                                            <div class="input-group">
                                                <input type="text" class="form-control from-control-sm" id="t_barcode" name="t_barcode">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-print"></i></button>
                                                </div>
                                            </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Dynamic Table Full -->

            </div>
        </div>

    </div>
    <!-- END Page Content -->
@endsection

@section('css_before')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('js_after')

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

    <script src="{{ URL::asset('assets/js/dashmix.core.min.js') }}"></script>
    
    <script src="{{ URL::asset('assets/js/dashmix.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ URL::asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ URL::asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>

@endsection