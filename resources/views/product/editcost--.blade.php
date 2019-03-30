@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">แก้ไขข้อมูลสินค้า Non s/n</h1>
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
                            <h2 class="content-heading pt-0">สินค้าที่แก้ไข : {{ $data->p_name }}</h2>
                            <div class="row push">
                                <div class="col-12">

                                {!! Form::model($data, array('url'=>'product/'.$data->p_id, 'method'=>'put')) !!}

                                {{ csrf_field() }}
                                    <div class="form-group">
                                        {!! Form::label('s_cat','หมวดหมู่สินค้า'); !!}
                                        {!! Form::select('s_cat', $scat->pluck('cat_name','cat_id'), $data->cat_id, ['class'=>'form-control', 'placeholder'=>'- เลือกหมวดหมู่ -']); !!}
                                    </div>

                                    <div class="form-group">
                                            {!! Form::label('t_barcode','รหัสสินค้า / barcode'); !!}
                                            {!! Form::text('t_barcode',$data->p_barcode, ['class'=>'form-control','placeholder'=>'ระบุรหัสสินค้า']); !!}
                                    </div>

                                    <div class="form-group">
                                            {!! Form::label('t_name','ชื่อสินค้า'); !!}
                                            {!! Form::text('t_name',$data->p_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อสินค้า']); !!}
                                    </div>

                                    <div class="form-group">
                                            {!! Form::label('t_low','แจ้งเตือนจำนวนขั้นต่ำ'); !!}
                                            {!! Form::text('t_low',$data->p_low, ['class'=>'form-control','placeholder'=>'ระบุแจ้งเตือนจำนวนขั้นต่ำ']); !!}
                                    </div>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">เลือกภาพสินค้า</label>
                                    </div>

                                    <div class="form-group"></div>

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

@section('js_after')

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

@endsection