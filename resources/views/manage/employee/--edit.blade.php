@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">แก้ไขข้อมูลผู้ใช้งาน</h1>
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
                                <a class="nav-link active" href="#btabs-static-home">ข้อมูลผู้ใช้งาน</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#btabs-static-right">สิทธิ์ใช้งาน</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#btabs-static-login">สิทธ์เข้าระบบ</a>
                            </li>
                        </ul>
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="btabs-static-home" role="tabpanel">
                                
                                <div class="row push">
                                    <div class="col-12">
    
                                    {!! Form::model($data, array('url'=>'employee/'.$data->u_id, 'method'=>'put')) !!}
    
                                    {{ csrf_field() }}
    
                                        <div class="form-group">
                                                {!! Form::label('t_idcard','รหัสประจำตัวประชาชน'); !!}
                                                {!! Form::text('t_idcard', $data->u_idcard, ['class'=>'form-control','placeholder'=>'ระบุรหัสประจำตัวประชาชน']); !!}
                                        </div>
    
                                        <div class="form-group">
                                                {!! Form::label('t_name','ชื่อ - สกุล'); !!}
                                                {!! Form::text('t_name', $data->u_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อ - สกุล']); !!}
                                        </div>
    
                                        <div class="form-group">
                                                {!! Form::label('t_email','อีเมล (ใช้เป็น username เข้าระบบ)'); !!}
                                                {!! Form::email('t_email', $data->u_email, ['class'=>'form-control','placeholder'=>'ระบุอีเมล']); !!}
                                        </div>
    
                                        <div class="form-group">
                                                {!! Form::label('t_position','ตำแหน่ง'); !!}
                                                {!! Form::text('t_position', $data->ud_position, ['class'=>'form-control','placeholder'=>'ระบุตำแหน่ง']); !!}
                                        </div>
    
                                        <div class="form-group">
                                                {!! Form::label('t_tel','เบอร์โทรศัพท์'); !!}
                                                {!! Form::text('t_tel', $data->ud_phone, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์']); !!}
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

                            </div>
                            <div class="tab-pane" id="btabs-static-right" role="tabpanel">
                                <h4 class="font-w400">สิทธิ์ใช้งาน</h4>
                                <p>...</p>
                            </div>
                            <div class="tab-pane" id="btabs-static-login" role="tabpanel">
                                <h4 class="font-w400">สิทธ์เข้าระบบ</h4>
                                <p>...</p>
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