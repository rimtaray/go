@extends('layouts.temp')

@section('content')


<!-- Hero -->
<div class="bg-body-light d-print-none">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ออกใบรับสินค้า</h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">
    <!-- Invoice -->
    <div class="block block-fx-shadow">
        <div class="block-header block-header-default">
            <h3 class="block-title">#RE{{ $ins_rec->re_no }}</h3>
            <div class="block-options">
                <!-- Print Page functionality is initialized in Helpers.print() -->
                <button type="button" class="btn-block-option" onclick="Dashmix.helpers('print');">
                    <i class="si si-printer mr-1"></i> พิมพ์ใบรับสินค้า
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="p-sm-4 p-xl-4">
                <!-- Invoice Info -->
                <div class="row mb-4">
                    <!-- Company Info -->
                    <div class="col-6">
                        <p class="h3">{{ $shop->m_name }}</p>
                        <address>
                            {{ $shop->m_address }}
                        </address>
                    </div>
                    <!-- END Company Info -->

                    <!-- Client Info -->
                    <div class="col-6 text-right">
                        <p class="h3">ใบรับสินค้า</p>
                        <address>
                            เลขที่ใบรับ : RE{{ $ins_rec->re_no }}<br>
                            วันที่ออกใบรับ : {{ $ins_rec->re_date }}
                        </address>
                    </div>
                    <!-- END Client Info -->
                </div>
                <!-- END Invoice Info -->

                <!-- Table -->
                <div class="table-responsive push">
                    <table class="table table-bordered">
                        <thead class="bg-body">
                            <tr>
                                <th class="text-center" style="width: 60px;"></th>
                                <th>ชื่อสินค้า</th>
                                <th class="text-left" style="width: 150px;">รหัสสินค้า</th>
                                <th class="text-center" style="width: 90px;">จำนวน</th>
                                <th class="text-right" style="width: 120px;">ราคาทุน</th>
                                <th class="text-right" style="width: 120px;">รวม</th>
                            </tr>
                        </thead>
                        <tbody>

                            <? $i = '1';
                             $total_cost = '0'; ?>

                            @foreach($data as $data)

                            <? 
                            $sum_cost = '0';                            
                            $sum_cost = $data->ps_num * $data->pd_cost ; 
                            $total_cost += $sum_cost ; 
                            ?>

                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-left">{{ $data->p_name }}</td>
                                <td class="text-left">{{ $data->ps_sn }}</td>
                                <td class="text-center">{{ $data->ps_num }}</td>
                                <td class="text-right">{{ $data->pd_cost }}</td>
                                <th class="text-right">{{ number_format($sum_cost,2) }}</th>
                            </tr>

                            @endforeach

                            <tr>
                                <td colspan="5" class="font-w700 text-uppercase text-right bg-body-light">รวมทั้งหมด</td>
                                <td class="font-w700 text-right bg-body-light">{{ number_format($total_cost,2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END Table -->

                <!-- Footer -->
                <div class="row mb-5">
                    <!-- Company Info -->
                    <div class="col-6">
                    </div>
                    <!-- END Company Info -->

                    <!-- Client Info -->
                    <div class="col-6 text-center">
                        <p><b>ผู้ออกใบรับสินค้า</b>
                                <br><br>
                                ...............................<br>
                                {{ session()->get('uname')}}</p>
                    </div>
                    <!-- END Client Info -->
                </div>
                <!-- END Footer -->
            </div>
        </div>
    </div>
    <!-- END Invoice -->
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