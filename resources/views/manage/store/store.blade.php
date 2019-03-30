@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ข้อมูลร้าน</h1>
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
                                <a href="{{ url('store/'.$data->m_id.'/edit') }}">
                                <button type="button" class="btn btn-hero-sm btn-hero-primary" data-toggle="tooltip" title="แก้ไขข้อมูล">
                                    <i class="fa fa-wrench mr-1"></i> แก้ไขข้อมูล
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Advanced -->
                    <div class="row">
                        <!-- Lists -->
                        <div class="col-md-6 col-xl-4">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full bg-primary-darker text-center">
                                    <a class="item item-circle mx-auto bg-black-25" href="javascript:void(0)">
                                        <i class="fab fa-2x fa-steam-symbol text-white"></i>
                                    </a>
                                    <p class="text-white font-size-h3 font-w300 mt-3 mb-0">
                                        {{ $data->m_name }}
                                    </p>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-borderless table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="text-left" style="width: 30%;">
                                                    <strong>ชื่อร้าน</strong>
                                                </td>
                                                <td class="text-left" style="width: 70%;">
                                                    <strong>{{ $data->m_name }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">ที่อยู่</td>
                                                <td>
                                                    <strong>{{ $data->m_address }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">โทรศัพท์</td>
                                                <td>
                                                    <strong>{{ $data->m_tel }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">มือถือ</td>
                                                <td>
                                                    <strong>{{ $data->m_mobile }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full bg-gd-fruit text-center">
                                    <a class="item item-circle mx-auto bg-black-25" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-film text-white"></i>
                                    </a>
                                    <p class="text-white font-size-h3 font-w300 mt-3 mb-0">
                                        ใบกำกับภาษี
                                    </p>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-borderless table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="text-left" style="width: 30%;">
                                                    <strong>เลขที่ผู้เสียภาษี</strong>
                                                </td>
                                                <td class="text-left" style="width: 70%;">
                                                    <strong>{{ $data->m_inv_no }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">ชื่อออกใบกำกับฯ</td>
                                                <td>
                                                    <strong>{{ $data->m_inv_name }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">ที่อยู่ออกใบกำกับฯ</td>
                                                <td>
                                                    <strong>{{ $data->m_inv_add }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">โทรศัพท์</td>
                                                <td>
                                                    <strong>{{ $data->m_inv_tel }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full bg-primary text-center">
                                    <a class="item item-circle mx-auto bg-black-25" href="javascript:void(0)">
                                        <i class="fab fa-2x fa-youtube text-white"></i>
                                    </a>
                                    <p class="text-white font-size-h3 font-w300 mt-3 mb-0">
                                        ตั้งค่าการพิมพ์ใบเสร็จ
                                    </p>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-borderless table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="text-left" style="width: 30%;">
                                                    <strong>เลขที่ผู้เสียภาษี</strong>
                                                </td>
                                                <td class="text-left" style="width: 70%;">
                                                    <strong>{{ $data->m_taxid }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">การพิมพ์ใบเสร็จ</td>
                                                <td>
                                                    <strong>{{ $data->m_receipt }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">รูปแบบใบเสร็จ</td>
                                                <td>
                                                    <strong>{{ $data->m_rec_format }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">จำนวนใบเสร็จ</td>
                                                <td>
                                                    <strong>{{ $data->m_rec_num }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END Lists -->

                        
                    </div>
                    <!-- END Advanced -->




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

