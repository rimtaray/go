@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">เพิ่มสินค้าเข้า Serial Number</h1>
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
            <div class="col-lg-4 col-xl-4">

                @if(Session::has('error'))	
                    <!-- Your Block -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
    
                                <div class="alert alert-danger">
                                    {{Session::get('error')}}
                                </div>
                            
                        </div>
                    </div>
                @endif
                    <!-- END Your Block -->

                
                    <!-- Block Tabs Default Style -->
                    <div class="block block-rounded block-bordered">
                        <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#btabs-static-home">ข้อมูลสินค้า s/n</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#btabs-static-right">เพิ่มรอบนำเข้าสินค้า</a>
                            </li>
                        </ul>
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="btabs-static-home" role="tabpanel">
                                
                                <div class="row push">
                                    <div class="col-12">
    
                                        {!! Form::open(array('url'=>'pro_cost/pro_add','files'=>true)) !!}

                                        {{ Form::hidden('ck','newsn') }}
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                {!! Form::label('s_cat','หมวดหมู่สินค้า'); !!}
                                                {!! Form::select('s_cat', $scat, null, ['class'=>'form-control', 'placeholder'=>'- เลือกหมวดหมู่ -']); !!}
                                            </div>
        
                                            <div class="form-group">
                                                    {!! Form::label('t_name','ชื่อสินค้า'); !!}
                                                    {!! Form::text('t_name',null, ['class'=>'form-control','placeholder'=>'ระบุชื่อสินค้า']); !!}
                                            </div>
        
                                            <div class="form-group">
                                                    {!! Form::label('t_low','แจ้งเตือนจำนวนขั้นต่ำ'); !!}
                                                    {!! Form::text('t_low',null, ['class'=>'form-control','placeholder'=>'ระบุแจ้งเตือนจำนวนขั้นต่ำ']); !!}
                                            </div>
        
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">เลือกภาพสินค้า</label>
                                            </div>
        
                                            <div class="form-group"></div>
        
                                            <div class="form-group">
                                                    {!! Form::submit('เพิ่ม', ['class'=>'btn btn-primary']); !!}
                                            </div>
        
                                        {!! Form::close() !!}
                                    
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="btabs-static-right" role="tabpanel">
                                
                            </div>
                        </div>
                    </div>
                    <!-- END Block Tabs Default Style -->




            </div>
        </div>

                
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

@endsection