@extends('layouts.temp')

@section('content')


<!-- Hero -->
<div class="bg-body-light d-print-none">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Invoice</h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">
    <!-- Invoice -->
    <div class="block block-fx-shadow">
        <div class="block-header block-header-default">
            <h3 class="block-title">#INV{{ $inv->i_no }}</h3>
            <div class="block-options">
                <!-- Print Page functionality is initialized in Helpers.print() -->
                <button type="button" class="btn-block-option" onclick="Dashmix.helpers('print');">
                    <i class="si si-printer mr-1"></i> Print Invoice
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="p-sm-4 p-xl-7">
                <!-- Invoice Info -->
                <div class="row mb-5">
                    <!-- Company Info -->
                    <div class="col-4">
                        <p class="h3">{{ $shop->m_inv_name }}</p>
                        <address>
                            {{ $shop->m_inv_add }}<br>
                            โทรศัพท์ : {{ $shop->m_inv_tel }}<br>
                            หมายเลขประจำตัวผู้เสียภาษี : {{ $shop->m_inv_no }}
                        </address>
                    </div>
                    <!-- END Company Info -->

                    <!-- Client Info -->
                    <div class="col-4">
                        <p class="h3">ใบกำกับภาษี <br> TAX INVOICE</p>
                        <address>
                            วันที่ออกเอกสาร : {{ $inv->i_date }}<br>
                            เลขที่เอกสาร : {{ $inv->i_no }}<br>
                            ใบกำกับภาษีอ้างอิง : {{ $inv->i_refer }}<br>
                            ใบเสร็จเลขที่ : {{ $inv->sb_no }} 
                        </address>
                    </div>
                    <!-- END Client Info -->

                    <!-- Client Info -->
                    <div class="col-4 text-right">
                            <p class="h3">ลูกค้า</p>
                            <address>
                                เลขประจำตัวผู้เสียภาษี : {{ $inv->i_idcard }}<br>
                                ชื่อลูกค้า : {{ $inv->i_name }}<br>
                                ที่อยู่ : {{ $inv->i_add }}<br>
                                โทรศัพท์ : {{ $inv->i_tel }}
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
                                <th class="text-center" style="width: 90px;">จำนวน</th>
                                <th class="text-right" style="width: 120px;">ราคา</th>
                                <th class="text-right" style="width: 120px;">จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>

                            <? 
                            $i = 1; 
                            $amount = 0;
                            ?>
                            @foreach($product as $product)
                            <? $amount += $product->s_price; ?>
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-left">{{ $product->s_pname }}</td>
                                <td class="text-center">{{ $product->s_num }}</td>
                                <td class="text-right">{{ number_format($product->s_price,2,'.',',') }}</td>
                                <td class="text-right">{{ number_format($product->s_price,2,'.',',') }}</td>
                            </tr>
                            @endforeach

                            @if($inv->i_type == 'ex')
                            <?
                            $total_mix = $amount - $product->sb_discount;
                            $vat = ($total_mix * 7) / 10;
                            ?>
                            @elseif($inv->i_type == 'in')
                            <?
                            $vat = (($amount - $product->sb_discount) * 7) / 107;
                            $total_mix = ($amount - $product->sb_discount) - $vat;
                            ?>
                            @endif

                            <tr>
                                <td colspan="4" class="font-w600 text-right">ส่วนลดบิล</td>
                                <td class="text-right">- {{ number_format($product->sb_discount,2,'.',',')}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-w600 text-right">จำนวนเงิน</td>
                                <td class="text-right">{{ number_format($total_mix,2,'.',',')}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-w600 text-right">ภาษีมูลค่าเพิ่ม 7%</td>
                                <td class="text-right">{{ number_format($vat,2,'.',',') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-w700 text-uppercase text-right bg-body-light">รวมจำนวนเงินทั้งสิ้น</td>
                                <td class="font-w700 text-right bg-body-light">{{ number_format($total_mix+$vat,2,'.',',') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END Table -->

                <!-- Footer -->
                <p class="text-muted text-center my-5">
                    Thank you for doing business with us.
                </p>
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