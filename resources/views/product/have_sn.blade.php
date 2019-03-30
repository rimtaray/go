@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">เพิ่มสินค้า Serial Number</h1>
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

                                @if(Session::has('error'))	
                                    <div class="alert alert-danger">
                                        {{Session::get('error')}}
                                    </div>
                                @endif

                                    <!-- Basic Elements -->
                                    <h2 class="content-heading pt-0">{{ $head }}</h2>
                                    <div class="row push">

                                        <div class="col-12">
                                        {!! Form::open(array('url'=>'prohavesn')) !!}

                                        {{ csrf_field() }}

                                        <? if($pid){ ?>{{ Form::hidden('s_name', $pid) }}<? } ?>
                                            <div class="form-group">
                                                <label for="s_name">เลือกชื่อสินค้า</label>
                                                <select class="form-control" id="s_name" name="s_name" <? if($pid){ echo 'disabled';} ?>>

                                                    <option value="">- เลือกชื่อสินค้า -</option>
                                                    @foreach($sproduct as $pro)
                                                    <? if($pro->p_id == $pid) { $ena = ' selected';}else{ $ena = '';} ?>
                                                    <option value="{{ $pro->p_id }}" {{ $ena }}>{{ $pro->p_name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('t_cost','ราคาทุนต่อหน่วย'); !!}
                                                {!! Form::text('t_cost',null, ['class'=>'form-control','placeholder'=>'ระบุราคาทุน เช่น 2000']); !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('t_date','วันหมดอายุ'); !!}
                                                <input type="text" class="js-datepicker form-control" id="t_date" name="t_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('t_alert','แจ้งเตือนก่อนหมดอายุ(วัน)'); !!}
                                                {!! Form::text('t_alert',null, ['class'=>'form-control','placeholder'=>'(ถ้ามี) ระบุจำนวนวัน เช่น 5']); !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('t_claim','ระยะเวลารับประกัน(วัน)'); !!}
                                                {!! Form::text('t_claim',null, ['class'=>'form-control','placeholder'=>'(ถ้ามี) ระบุจำนวนวัน เช่น 365']); !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('s_sup','ผู้ผลิต'); !!}
                                                {!! Form::select('s_sup', $ssup, 'null', ['class'=>'form-control', 'placeholder'=>'- เลือกผู้ผลิต -']); !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']); !!}
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