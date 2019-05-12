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
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" 
aria-labelledby="modal-block-large" aria-hidden="true">
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
                        <a href="{{ url('product/nonsn') }}">
                        <button type="button" class="btn btn-hero-sm btn-hero-info">
                            <i class="fa fa-shopping-basket mr-1"></i> รายการสินค้า Non S/N
                        </button>
                        </a>
                    </div>
                </div>
            </div>


<!-- Dynamic Table Full -->
<div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">รายการสินค้า Serial number</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <a href="#modalForm" data-toggle="modal" data-href="{{ url('productsn/create') }}" ><button type="button" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> เพิ่มสินค้าใหม่
                    </button></a>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">#</th>
                        <th class="text-center" style="width: 15%;">หมวดหมู่</th>
                        <th class="text-center" style="width: 20%;">ชื่อสินค้า</th>
                        <th class="text-center" style="width: 10%;">ราคา</th>
                        <th class="text-center" style="width: 10%;">จำนวน</th>
                        <th class="text-center" style="width: 10%;">ภาพสินค้า</th>
                        <th class="text-center" style="width: 10%;">แก้ไข</th>
                        <th class="text-center" style="width: 10%;">เพิ่ม</th>
                        <th class="text-center" style="width: 10%;">รอบนำเข้า</th>
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
                        <td class="text-left">{{ $data->p_name }}</td>
                        <td class="text-right">{{ $data->p_price }}</td>
                        <td class="text-center">
                            <?
                                // $count = DB::table('tb_product')
                                //     ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                                //     ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
                                //     ->groupBy('tb_product_detail.p_id')
                                //     ->selectRaw('sum(ps_num) as psnum')
                                //     ->where('tb_product.p_id',$data->p_id)
                                //     ->first();
                                // echo number_format($count->psnum);
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="{{ asset('images_product/'.$data->p_image) }}" target="_blank"><img src="{{ asset('images_product/resize/'.$data->p_image) }}"></a>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#modalForm" data-toggle="modal"
                                   data-href="{{ url('/productsn/'.$data->p_id.'/edit') }}">
                                <button type="button" class="btn btn-sm btn-warning">
                                    <i class="fa fa-wrench"></i> แก้ไข
                                </button>
                                </a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#modalForm" data-toggle="modal" data-href="{{ url('productsn/add_sn/'.$data->p_id) }}" ><button type="button" class="btn btn-sm btn-success">
                                    <i class="fa fa-plus"></i> เพิ่มสินค้า
                                </button></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{ url('productsn/import/'.$data->p_id) }}"><i class="fa fa-archive fa-2x text-info"></i></a>
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
        <i class="fa fa-4x fa-cog fa-spin text-info"></i><br/>
        <span>Loading</span>
    </div>

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

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

@endsection


@section('js')
    <script src="{{asset('js/ajax-crud-modal-form.js')}}"></script>
    <script src="{{asset('js/product/list_cost_sn.js')}}"></script>
@endsection