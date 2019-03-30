@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">แก้ไขข้อมูลผู้ขาย / ผู้ผลิตสินค้า</h1>
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
                            <h2 class="content-heading pt-0">ข้อมูลของ : {{ $data->sup_name }}</h2>
                            <div class="row push">
                                <div class="col-12">

                                    {!! Form::model($data, array('url'=>'supplier/'.$data->sup_id, 'method'=>'put')) !!}

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                            <label class="col-sm-4 col-form-label" for="t_name">ชื่อ <span class="text-danger">*</span></label>
                                            {!! Form::text('t_name',$data->sup_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อผู้ขาย']); !!}
                                    </div>

                                    <div class="form-group">
                                            {!! Form::label('t_add','ที่อยู่'); !!}
                                            {!! Form::text('t_add',$data->sup_address, ['class'=>'form-control','placeholder'=>'ระบุที่อยู่ผู้ขาย']); !!}
                                    </div>
                                    
                                    <div class="form-group">
                                            {!! Form::label('t_tel','เบอร์โทรศัพท์'); !!}
                                            {!! Form::text('t_tel',$data->sup_tel, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์']); !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('s_status','สถานะ'); !!}
                                        {!! Form::select('s_status', ['1' => 'ใช้งาน', '2' => 'ยกเลิก'], $data->ud_status, ['class' => 'form-control']); !!}
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