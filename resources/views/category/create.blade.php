



            {!! Form::open(array('url'=>'productcat', 'name'=>'frm_add', 'role'=>'frm_add', 'id'=>'frm_add', 'OnSubmit'=>'return fncSubmit_add();')) !!}

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
                     
                            {{ csrf_field() }}

                                    <div class="form-group">
                                        <label class="col-sm-4 col-form-label" for="t_name">ชื่อหมวดหมู่ <span class="text-danger">*</span></label>
                                        {!! Form::text('t_name',null, ['class'=>'form-control','placeholder'=>'ระบุชื่อหมวดหมู่','maxlength'=>'100','autofocus'=>'autofocus']); !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('s_type','ประเภทหมวดหมู่'); !!}
                                        {!! Form::select('s_type', $scat, null, ['class'=>'form-control', 'placeholder'=>'ตั้งเป็นหมวดหมู่หลัก']); !!}
                                    </div>
                                    
        
            
            
                        </p>
                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">ปิด</button>
                        {!! Form::submit('เพิ่ม', ['class'=>'btn btn-primary']); !!}
                    </div>
                </div>
                        {!! Form::close() !!}