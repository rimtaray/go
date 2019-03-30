@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">เลือกร้านที่ต้องการสลับการจัดการ</h1>
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



                  
                  

                    <!-- Latest Projects -->
                    <h2 class="content-heading">
                        <i class="si si-briefcase mr-1"></i> รายชื่อร้าน
                    </h2>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-info">
                                    <div class="my-3">
                                        <i class="fab fa-2x fa-windows text-white-75"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">Windows App</div>
                                    <div class="font-size-sm text-muted">Accounting Dashboard</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-briefcase text-muted mr-1"></i> View Project
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-warning">
                                    <div class="my-3">
                                        <i class="fa fa-2x fa-mobile text-white-75"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">iOS App</div>
                                    <div class="font-size-sm text-muted">Accounting Dashboard</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-briefcase text-muted mr-1"></i> View Project
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-danger">
                                    <div class="my-3">
                                        <i class="fa fa-2x fa-globe text-white-75"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">Website Design</div>
                                    <div class="font-size-sm text-muted">https://example.com</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-briefcase text-muted mr-1"></i> View Project
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-success">
                                    <div class="my-3">
                                        <i class="fa fa-2x fa-birthday-cake text-white-75"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">Special Icon Set</div>
                                    <div class="font-size-sm text-muted">3000 icons</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-briefcase text-muted mr-1"></i> View Project
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-hero-sm btn-hero-secondary">
                            Check out more <i class="fa fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                    <!-- END Latest Projects -->




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