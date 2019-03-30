@extends('layouts.temp')

@section('content')



                <!-- Hero -->
                <div class="bg-body-light d-print-none">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ใบสั่งซื้อ</h1>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Invoice -->
                    <div class="block block-fx-shadow">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">ใบสั่งซื้อเลขที่ : {{ $order->o_no }}</h3>
                            <div class="block-options">
                                <!-- Print Page functionality is initialized in Helpers.print() -->
                                <button type="button" class="btn-block-option" onclick="Dashmix.helpers('print');">
                                    <i class="si si-printer mr-1"></i> พิมพ์ใบสั่งซื้อ
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-2 p-xl-4">
                                <!-- Invoice Info -->
                                <div class="row">
                                    <!-- Company Info -->
                                    <div class="col-6">
                                        <p class="h3">{{ $supp->sup_name or '' }}</p>
                                        <address>
                                            {{ $supp->sup_address or '' }}<br>
                                            {{ $supp->sup_tel or '' }}
                                        </address>
                                    </div>
                                    <!-- END Company Info -->

                                    <!-- Client Info -->
                                    <div class="col-6 text-right">
                                        <p class="h3">{{ $shop->m_name }}</p>
                                        <address>
                                            {{ $shop->m_address or '' }}<br>
                                            {{ $shop->m_tel or '' }}
                                        </address>
                                    </div>
                                    <!-- END Client Info -->
                                </div>

                                <div class="row">
                                    <div class="col-12"><b>วันที่ออก : </b>{{ $order->created_at }}</div>
                                </div>
                                <!-- END Invoice Info -->

                                <!-- Table -->
                                <div class="table-responsive push">
                                    <table class="table table-bordered">
                                        <thead class="bg-body">
                                            <tr>
                                                <th class="text-center" style="width: 60px;"></th>
                                                <th>ชื่อสินค้า (รุ่น)</th>
                                                <th class="text-center" style="width: 90px;">จำนวน</th>
                                                <th class="text-right" style="width: 120px;">ราคา</th>
                                                <th class="text-right" style="width: 120px;">รวม</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <? 
                                            $i = '1'; 
                                            $totalall = '0';
                                            $vat7 = '0';
                                            $totalvat = '0';
                                            ?>

                                            @foreach($data as $data)
                                            <? $totalall += $data->od_price * $data->od_num; ?>
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td>
                                                    {{ $data->od_name }} ({{ $data->od_model }})
                                                </td>
                                                <td class="text-center">
                                                    {{ $data->od_num }}
                                                </td>
                                                <td class="text-right">{{ number_format($data->od_price, 2, '.', ',') }}</td>
                                                <td class="text-right">{{ number_format($data->od_price * $data->od_num, 2, '.', ',') }}</td>
                                            </tr>
                                            @endforeach

                                            <?
                                            if($order->o_vat == '1') // vat นอก
                                            {
                                                $vat7 = ($totalall * 7) / 100 ;
                                                $totalvat = $totalall;
                                                $totalall = $totalvat + $vat7;
                                            }
                                            if($order->o_vat == '2') // vat ใน
                                            {
                                                $vat7 = ($totalall * 7) / 107 ;
                                                $totalvat = $totalall - $vat7;
                                                $totalall = $totalall;
                                            }
                                            ?>

                                            <tr>
                                                <td colspan="4" class="font-w600 text-right">รวม</td>
                                                <td class="text-right">{{ number_format($totalvat, 2, '.', ',') }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="font-w600 text-right">Vat Rate</td>
                                                <td class="text-right">7%</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="font-w600 text-right">Vat Due</td>
                                                <td class="text-right">{{ number_format($vat7, 2, '.', ',') }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="font-w700 text-uppercase text-right bg-body-light">รวมทั้งหมด</td>
                                                <td class="font-w700 text-right bg-body-light">{{ number_format($totalall, 2, '.', ',') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END Table -->

                                <div class="row">
                                    <div class="col-12"><b>หมายเหตุ : </b>{{ $data->o_etc }}</div>
                                </div>

                                <!-- Footer -->
                                <p class="text-muted text-right my-5">
                                    <b>ผู้ออก : </b>{{ $data->u_name }}
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

    <script src="{{ URL::asset('assets/js/dashmix.core.min.js') }}"></script>
    
    <script src="{{ URL::asset('assets/js/dashmix.app.min.js') }}"></script>



@endsection

