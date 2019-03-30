

    <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
            <h3 class="block-title">เพิ่มข้อมูลการจ่ายด้วยคูปอง</h3>
            <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-fw fa-times"></i>
                    </button>
            </div>
            </div>
            <div class="block-content">
            <p>
    
    
            <div class="form-group">
                    {!! Form::label('t_idcard','รหัสคูปอง'); !!}
                    {!! Form::text('t_idcard',null, ['class'=>'form-control']); !!}
            </div>
    
            <div class="form-group">
                    {!! Form::label('t_name','มูลค่า'); !!}
                    {!! Form::text('t_name',null, ['class'=>'form-control']); !!}
            </div>
    
            <div class="form-group">
                    {!! Form::label('t_name','วันเริ่มใช้ได้'); !!}
                    {!! Form::text('t_name',null, ['class'=>'form-control']); !!}
            </div>
    
            <div class="form-group">
                    {!! Form::label('t_name','วันหมดอายุ'); !!}
                    {!! Form::text('t_name',null, ['class'=>'form-control']); !!}
            </div>
    
            <div class="form-group">
                    {!! Form::label('t_name','สถานะคูปอง'); !!}
                    {!! Form::text('t_name',null, ['class'=>'form-control']); !!}
            </div>
    
    
            </p>
            </div>
            <div class="block-content block-content-full text-right bg-light">
            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
            {!! Form::submit('เพิ่ม', ['class'=>'btn btn-primary']); !!}
            </div>
    </div>
        
        