

    {!! Form::open(array('url'=>'employee')) !!}



<div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
            <h3 class="block-title">เพิ่มรายชื่อพนักงานใหม่</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <p>

    {{ csrf_field() }}

        <div class="form-group">
                {!! Form::label('t_idcard','รหัสประจำตัวประชาชน'); !!}
                {!! Form::text('t_idcard',null, ['class'=>'form-control'.($errors->has('t_idcard')?" is-invalid":""),'placeholder'=>'ระบุรหัสประจำตัวประชาชน','onkeypress'=>'CheckNum()','maxlength'=>'13']); !!}
        </div>

        <div class="form-group">
                {!! Form::label('t_name','ชื่อ - สกุล'); !!}
                {!! Form::text('t_name',null, ['class'=>'form-control','placeholder'=>'ระบุชื่อ - สกุล','maxlength'=>'100']); !!}
        </div>

        <div class="form-group">
                {!! Form::label('t_email','อีเมล (ใช้เป็น username เข้าระบบ)'); !!}
                {!! Form::email('t_email',null, ['class'=>'form-control','placeholder'=>'ระบุอีเมล','maxlength'=>'255']); !!}
        </div>

        <div class="form-group">
                {!! Form::label('t_pass','รหัสผ่าน'); !!}
                {!! Form::text('t_pass',null, ['class'=>'form-control','placeholder'=>'ระบุรหัสผ่านสำหรับเข้าระบบ']); !!}
        </div>

        <div class="form-group">
                {!! Form::label('t_position','ตำแหน่ง'); !!}
                {!! Form::text('t_position',null, ['class'=>'form-control','placeholder'=>'ระบุตำแหน่ง','maxlength'=>'50']); !!}
        </div>

        <div class="form-group">
                {!! Form::label('t_tel','เบอร์โทรศัพท์'); !!}
                {!! Form::text('t_tel',null, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์','maxlength'=>'20']); !!}
        </div>


            </p>
        </div>
        <div class="block-content block-content-full text-right bg-light">
            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
            {!! Form::submit('เพิ่ม', ['class'=>'btn btn-primary']); !!}
        </div>
    </div>
            {!! Form::close() !!}
    

