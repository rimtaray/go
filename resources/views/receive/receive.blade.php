@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ออกใบรับสินค้า</h1>
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
            <div class="col-12">


                <!-- Dynamic Table Full -->
                <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">รายการรับสินค้า Non s/n</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">#</th>
                                        <th class="text-center" style="width: 20%;">รหัสสินค้า</th>
                                        <th class="text-center" style="width: 40%;">ชื่อสินค้า</th>
                                        <th class="text-center" style="width: 10%;">จำนวน</th>
                                        <th class="text-center" style="width: 15%;">วันที่รับเข้า</th>
                                        <th class="text-center" style="width: 10%;">ยกเลิก</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?
                                    $i = '1'; 
                                    ?>
                    
                                    @foreach($data as $data)
    
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="text-left">{{ $data->p_barcode }}</td>
                                        <td class="text-left">{{ $data->p_name}}</td>
                                        <td class="text-center">{{ $data->ps_num }}</td>
                                        <td class="text-left">{{ $data->created_at }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ url('/receive/close/'.$data->pd_id) }}">
                                                <button type="button" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                
                                    @endforeach
                    
                                </tbody>
                            </table>
                        </div>

                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <a href="{{ url('/receive/issue_non') }}">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i> ออกใบรับสินค้า Non s/n
                                </button>
                            </a>
                        </div>

                    </div>
                        <!-- END Dynamic Table Full -->
            </div>
        </div>


<div class="row">
    <div class="col-12">





                <!-- Dynamic Table Full -->
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">รายการรับสินค้า s/n</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%;">#</th>
                                    <th class="text-center" style="width: 60%;">ชื่อสินค้า</th>
                                    <th class="text-center" style="width: 10%;">จำนวน</th>
                                    <th class="text-center" style="width: 15%;">วันที่รับเข้า</th>
                                    <th class="text-center" style="width: 10%;">ยกเลิก</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?
                                $i = '1'; 
                                ?>
                
                                @foreach($data_sn as $data_sn)

                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-left">{{ $data_sn->p_name}}</td>
                                    <td class="text-center">{{ $data_sn->psnum }}</td>
                                    <td class="text-left">{{ $data_sn->created_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ url('/receive/close/'.$data_sn->pd_id) }}">
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
            
                                @endforeach
                
                            </tbody>
                        </table>
                    </div>

                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <a href="{{ url('/receive/issue_sn') }}">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fa fa-check"></i> ออกใบรับสินค้า s/n
                            </button>
                        </a>
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