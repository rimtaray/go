@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ใบสั่งซื้อ</h1>
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
            <h3 class="block-title">รายการใบสั่งซื้อ</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <a href="{{ url('doc/order') }}">
                    <button type="button" class="btn btn-hero-sm btn-hero-primary">
                        <i class="fa fa-plus mr-1"></i> ออกใบสั่งซื้อ
                    </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 20%;">เลขที่ใบสั่งซื้อ</th>
                        <th class="text-center" style="width: 25%;">ชื่อผู้ออก</th>
                        <th class="text-center" style="width: 15%;">ออกวันที่</th>
                        <th class="text-center" style="width: 10%;">VAT</th>
                        <th class="text-center" style="width: 15%;">สถานะ</th>
                        <th class="text-center" style="width: 15%;">ยกเลิก</th>
                    </tr>
                </thead>
                <tbody>
                        
                    <? 
                        $txt_sta = array('ยกเลิก','ปกติ'); 
                        $txt_vat = array('','แยก','รวม');   
                    ?>

                    @foreach($data as $data)

                    <tr>
                        <td class="text-center">
                            <a href="{{ url('/order/print/'.$data->o_id) }}" style="color:dodgerblue" >
                            {{ $data->o_no }}
                            </a>
                        </td>
                        <td class="text-left">{{ $data->u_name }}</td>
                        <td class="text-center">{{ $data->o_date }}</td>
                        <td class="text-center">{{ $txt_vat[$data->o_vat] }}</td>
                        <td class="text-center">{{ $txt_sta[$data->o_status] }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ url('/order/cancel_order/'.$data->o_id) }}" onclick="return confirm('ยืนยันการยกเลิกรายการสั่งซื้อที่ {{ $data->o_no }}' )">
                                    <button type="button" class="btn btn-sm btn-danger" <? if($data->o_status == '0'){ echo ' disabled'; } ?> >
                                        <i class="fa fa-times"></i> ยกเลิก
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