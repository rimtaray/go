@extends('layouts.temp')

@section('css')
    <style>
        .loading {
            background: lightgrey;
            padding: 15px;
            position: fixed;
            border-radius: 4px;
            left: 50%;
            top: 50%;
            text-align: center;
            margin: -40px 0 0 -50px;
            z-index: 2000;
            display: none;
        }

        a, a:hover {
            color: white;
        }

        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')



<!-- Fade In Block Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal_content"></div>
    </div>
</div>
<!-- END Fade In Block Modal -->


    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">รายการสินค้า</h1>
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


            <div class="row mb-2">
                <div class="col-12">
                    <div class="text-right">
                        <a href="{{ url('productsn/sn') }}">
                        <button type="button" class="btn btn-hero-sm btn-hero-info">
                            <i class="fa fa-shopping-basket mr-1"></i> รายการสินค้า S/N
                        </button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Dynamic Table Full -->
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">รายการสินค้า <small>Non Serial number</small></h3>
                        <div class="block-options">
                                <a href="#modalForm" data-toggle="modal" data-href="{{ url('product/create') }}" ><button type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus"></i> เพิ่มสินค้าใหม่
                                </button></a>
                        </div>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">#</th>
                        <th class="text-center" style="width: 15%;">หมวดหมู่</th>
                        <th class="text-center" style="width: 15%;">รหัสสินค้า</th>
                        <th class="text-center" style="width: 25%;">ชื่อสินค้า</th>
                        <th class="text-center" style="width: 10%;">ราคา</th>
                        <th class="text-center" style="width: 5%;">จำนวน</th>
                        <th class="text-center" style="width: 10%;">ภาพสินค้า</th>
                        <th class="text-center" style="width: 15%;">แก้ไข</th>
                    </tr>
                </thead>
                <tbody>

                    <?
                    $i = '1'; 
                    ?>
    
                    @foreach($data as $data)
    
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-left">{{ cat_product($data->cat_id) }}</td>
                        <td class="text-left">{{ $data->p_barcode}}</td>
                        <td class="text-left">{{ $data->p_name }}</td>
                        <td class="text-right">{{ number_format($data->p_price) }}</td>
                        <td class="text-center">{{ $data->psnum }}</td>
                        <td class="text-center">
                            <a href="{{ asset('images_product/'.$data->p_image) }}" class="img-link img-link-zoom-in img-thumb img-lightbox"><img class="img-fluid" src="{{ asset('images_product/resize/'.$data->p_image) }}"></a>
                        </td>
                        <td class="text-center">
                            <div class="dropdown dropleft">
                                <button type="button" class="btn btn-hero-sm btn-hero-primary dropdown-toggle" id="dropdown-dropleft-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    อื่นๆ
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-dropleft-hero-primary">
                                    <a class="dropdown-item" href="#modalForm" data-toggle="modal"
                                    data-href="{{ url('product/edit/'.$data->p_id) }}"><i class="fa fa-wrench"></i> แก้ไข</a>
                                    <a class="dropdown-item" href="#modalForm" data-toggle="modal" data-href="{{ url('product/add_non/'.$data->p_id) }}"><i class="fa fa-plus"></i> เพิ่มสินค้า</a>
                                    <a class="dropdown-item" href="#modalForm" data-toggle="modal" data-href="{{ url('product/import/'.$data->p_id) }}"><i class="fa fa-archive"></i> รอบนำเข้า</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#modalForm" data-toggle="modal" data-href="{{ url('product/barcode/'.$data->p_id) }}"><i class="fa fa-barcode"></i> บาร์โค้ด</a>
                                </div>
                            </div>

                        </td>
                    </tr>

                    @endforeach
    
                </tbody>
            </table>
                </div>
            </div>
            <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->


    <div class="loading">
        <i class="fa fa-sync fa-spin fa-2x"></i><br/>
        <span>กำลังโหลด</span>
    </div>

@endsection

@section('css_before')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/dropzone/dist/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/simplemde/simplemde.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/magnific-popup/magnific-popup.css') }}">
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
    <script src="{{ URL::asset('assets/js/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/simplemde/simplemde.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ URL::asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers('magnific-popup'); });</script>
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>



@endsection


@section('js')
    <script src="{{asset('js/ajax-crud-modal-form.js')}}"></script>
    <script src="{{ asset('js/product/list_cost.js') }}"></script>
@endsection