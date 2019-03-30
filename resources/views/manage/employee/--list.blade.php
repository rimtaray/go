@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">พนักงาน</h1>
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
                        <h3 class="block-title">รายชื่อพนักงาน</h3>
                        <div class="block-options">
                            <button type="button" onclick="location.href='{{ url('employee/create') }}'" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> เพิ่มรายชื่อ
                            </button>
                        </div>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">#</th>
                        <th class="text-center" style="width: 25%;">ชื่อ</th>
                        <th class="text-center" style="width: 15%;">ตำแหน่ง</th>
                        <th class="text-center" style="width: 15%;">เบอร์โทรศัพท์</th>
                        <th class="text-center" style="width: 10%;">สถานะ</th>
                        <th class="text-center" style="width: 10%;">สิทธิ์ใช้งาน</th>
                        <th class="text-center" style="width: 10%;">สิทธิ์เข้าระบบ</th>
                        <th class="text-center" style="width: 10%;">แก้ไข</th>
                    </tr>
                </thead>
                <tbody>

                    <?
                    $i = '1'; 
                    //$txt_type = collect(['1'=>'รายได้', '2'=>'ค่าใช้จ่าย']); 
                    $txt_status = collect(['1'=>'ใช้งาน', '2'=>'ยกเลิก']);
                    ?>

                    @foreach($data as $data)

                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-left">{{ $data->u_name }}</td>
                        <td class="text-left">{{ $data->ud_position }}</td>
                        <td class="text-left">{{ $data->ud_phone }}</td>
                        <td class="text-center">{{ $txt_status[$data->ud_status] }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ url('/user/'.$data->u_id.'/right') }}">
                                <button type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-check"></i> สิทธิ์ใช้งาน
                                </button>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ url('/user/'.$data->u_id.'/login') }}">
                                <button type="button" class="btn btn-sm btn-success">
                                    <i class="fa fa-power-off"></i> วัน/เวลา
                                </button>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ url('/employee/'.$data->u_id.'/edit') }}">
                                <button type="button" class="btn btn-sm btn-warning">
                                    <i class="fa fa-wrench"></i> แก้ไข
                                </button>
                                </a>
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