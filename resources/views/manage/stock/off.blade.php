@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ปิด / เปิดระบบ เพื่อเช็คสต็อก</h1>
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

                    

                    <!-- Icon based -->
                    <h2 class="content-heading">Icon based</h2>
                    <div class="row gutters-tiny">
                        
                        <div class="col-6 col-md-4 col-xl-2">
                            <a class="block text-center bg-primary" href="javascript:void(0)">
                                <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                    <div>
                                        <i class="fa fa-2x fa-trash text-primary-lighter"></i>
                                        <div class="font-w600 mt-3 text-uppercase text-white">ล้างข้อมูลเดิม</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                            <a class="block text-center bg-xsmooth" href="javascript:void(0)">
                                <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                    <div>
                                        <i class="fa fa-2x fa-pause text-xsmooth-lighter"></i>
                                        <div class="font-w600 mt-3 text-uppercase text-white">ปิดระบบ</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                            <a class="block text-center bg-xmodern" href="javascript:void(0)">
                                <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                    <div>
                                        <i class="fa fa-2x fa-play text-xmodern-lighter"></i>
                                        <div class="font-w600 mt-3 text-uppercase text-white">เปิดระบบ</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Icon based -->




    </div>
    <!-- END Page Content -->
@endsection

@section('css_before')

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

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