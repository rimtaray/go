

    
    {!! Form::model($data, array('url'=>'employee/'.$data->ud_id, 'method'=>'put')) !!}



    <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">ข้อมูลพนักงาน : {{ $data->u_name }}</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <p>
    
    
                    {{ csrf_field() }}
                    <input name="ck" type="hidden" value="emp">

                    <div class="form-group">
                            {!! Form::label('t_position','ตำแหน่ง'); !!}
                            {!! Form::text('t_position', $data->ud_position, ['class'=>'form-control','placeholder'=>'ระบุตำแหน่ง','maxlength'=>'50']); !!}
                    </div>

                    <div class="form-group">
                            {!! Form::label('t_tel','เบอร์โทรศัพท์'); !!}
                            {!! Form::text('t_tel', $data->ud_phone, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์','maxlength'=>'20']); !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('s_status','สถานะ'); !!}
                        {!! Form::select('s_status', ['1' => 'ใช้งาน', '2' => 'ยกเลิก'], $data->ud_status, ['class' => 'form-control']); !!}
                    </div>

    
    
                </p>
            </div>
            <div class="block-content block-content-full text-right bg-light">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']); !!}
            </div>
        </div>
                {!! Form::close() !!}
        
    
    