

    {!! Form::open(array('url'=>'invite')) !!}



    <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">เชิญผู้ใช้งาน</h3>
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
                    {!! Form::label('t_email','อีเมลผู้รับเชิญ'); !!}
                    {!! Form::email('t_email',null, ['class'=>'form-control','placeholder'=>'ระบุอีเมล','autofocus']); !!}
            </div>
    
    
                </p>
            </div>
            <div class="block-content block-content-full text-right bg-light">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                {!! Form::submit('เชิญ', ['class'=>'btn btn-primary']); !!}
            </div>
        </div>
                {!! Form::close() !!}
        
    
    