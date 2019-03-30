



            {!! Form::open(array('url'=>'supplier', 'OnSubmit'=>'return fncSubmit_create();', 'name'=>'form1', 'role'=>'form1')) !!}

<div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">ข้อมูลผู้ขาย / ผู้ผลิต</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
            </button>
        </div>
    </div>
    <div class="block-content">
        <p>
           
                        
        <!-- Basic Elements -->

            {{ csrf_field() }}

                <div class="form-group">
                        <label class="col-sm-4 col-form-label" for="t_name">ชื่อ <span class="text-danger">*</span></label>
                        {!! Form::text('t_name',null, ['class'=>'form-control','placeholder'=>'ระบุชื่อผู้ขาย','maxlength'=>'200']); !!}
                </div>

                <div class="form-group">
                        {!! Form::label('t_add','ที่อยู่'); !!}
                        {!! Form::text('t_add',null, ['class'=>'form-control','placeholder'=>'ระบุที่อยู่ผู้ขาย','maxlength'=>'300']); !!}
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