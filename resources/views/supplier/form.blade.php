              



{!! Form::model($data, array('url'=>'supplier/'.$data->sup_id, 'method'=>'put', 'OnSubmit'=>'return fncSubmit_create();', 'name'=>'form1', 'role'=>'form1')) !!}


<div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">ข้อมูลของ : {{ $data->sup_name }}</h3>
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
            <label class="col-sm-4 col-form-label" for="t_name">ชื่อ <span class="text-danger">*</span></label>
            {!! Form::text('t_name',$data->sup_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อผู้ขาย','maxlength'=>'200']); !!}
    </div>

    <div class="form-group">
            {!! Form::label('t_add','ที่อยู่'); !!}
            {!! Form::text('t_add',$data->sup_address, ['class'=>'form-control','placeholder'=>'ระบุที่อยู่ผู้ขาย','maxlength'=>'300']); !!}
    </div>
    
    <div class="form-group">
            {!! Form::label('t_tel','เบอร์โทรศัพท์'); !!}
            {!! Form::text('t_tel',$data->sup_tel, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์','maxlength'=>'20']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('s_status','สถานะ'); !!}
        {!! Form::select('s_status', ['1' => 'ใช้งาน', '2' => 'ยกเลิก'], $data->ud_status, ['class' => 'form-control']); !!}
    </div>


<!-- END Basic Elements -->

        </p>
    </div>
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        {!! Form::submit('บันทึก', ['class'=>'btn btn-sm btn-primary']); !!}
    </div>
</div>

{!! Form::close() !!}


