@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">สินค้าเสียหาย</h1>
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
            <div class="col-lg-6 col-xl-6">
                    <!-- Your Block -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
                            
                                <!-- Basic Elements -->
                                <h2 class="content-heading pt-0">ตัดสต๊อกสินค้าเสียหาย</h2>
                                <div class="row push">
                                    <div class="col-lg-12 col-xl-12">

    
                                            {!! Form::open(array('url'=>'cut')) !!}
            
                                            {{ csrf_field() }}  
                                            <input type="hidden" name="ck" value="break">
            
                                                    <div class="form-group">
                                                        {!! Form::label('t_sn','รหัสสินค้า / Serial number'); !!}
                                                        <input type="text" name="t_sn" class="form-control" autofocus>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                            {!! Form::submit('ตัดสต๊อก', ['class'=>'btn btn-primary']); !!}
                                                    </div>
                        
                                            {!! Form::close() !!}

                                    </div>
                                </div>
                                
                                
                                <!-- END Basic Elements -->
            
                        </div>
                    </div>
                    <!-- END Your Block -->



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