

    
    {!! Form::model($data, array('url'=>'employee/'.$data->u_id, 'method'=>'put')) !!}



    <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">ข้อมูลส่วนตัว : {{ $data->u_name }}</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <p>
    
    
                    {{ csrf_field() }}
                    <input name="ck" type="hidden" value="myaccount">

                    <div class="form-group">
                            {!! Form::label('t_idcard','เลขประจำตัวประชาชน'); !!}
                            {!! Form::text('t_idcard', $data->u_idcard, ['class'=>'form-control','placeholder'=>'ระบุเลขประจำตัวประชาชน','maxlength'=>'13', 'onkeypress'=>'CheckNum()']); !!}
                    </div>

                    <div class="form-group">
                            {!! Form::label('t_name','ชื่อ - สกุล'); !!}
                            {!! Form::text('t_name', $data->u_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อ-สกุล','maxlength'=>'100']); !!}
                    </div>

                    <div class="form-group">
                            {!! Form::label('t_email','อีเมล'); !!}
                            {!! Form::email('t_email', $data->u_email, ['class'=>'form-control','placeholder'=>'ระบุอีเมล','maxlength'=>'255']); !!}
                    </div>

    
    
                </p>
            </div>
            <div class="block-content block-content-full text-right bg-light">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']); !!}
            </div>
        </div>
                {!! Form::close() !!}
        
    
    