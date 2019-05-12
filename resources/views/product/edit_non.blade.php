


{!! Form::model($sproduct, array('url'=>'product/'.$sproduct->p_id, 'OnSubmit'=>'return fncSubmit_edit();', 'name'=>'form1', 'role'=>'form1', 'method'=>'put','files'=>true)) !!}


<div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">ชื่อสินค้า : {{ $sproduct->p_name }}</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
            </button>
        </div>
    </div>
    <div class="block-content">
        <p>
                  

                    
    {{ csrf_field() }}
    <input name="ck" type="hidden" value="edit_non">

    <!-- Block Tabs Default Style -->
    <div class="block block-rounded block-bordered">
        <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
            <li role="presentation" class="nav-item active">
                <a class="nav-link text-primary active" href="#tab-product" aria-controls="tab-product" role="tab"
                data-toggle="tab">ข้อมูลสินค้า</a>
            </li>
            <li role="presentation" class="nav-item">
                <a class="nav-link text-primary" href="#tab-detail" aria-controls="tab-detail" role="tab"
                data-toggle="tab">รายละเอียดสินค้า</a>
            </li>
        </ul>
        
        <div class="block-content tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab-product">                
                <p>       
            
                    <div class="row">
                        <div class="col-sm-6">                            
            

        <div class="form-group row">
                {!! Form::label('s_cat','หมวดหมู่สินค้า', ['class'=>'col-sm-4 col-form-label']); !!}
                <div class="col-sm-8">
                {!! Form::select('s_cat', $scat->pluck('cat_name','cat_id'), $sproduct->cat_id, ['class'=>'form-control', 'placeholder'=>'- ไม่มีหมวดหมู่ -']); !!}
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="t_barcode">รหัสสินค้า <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                {!! Form::text('t_barcode',$sproduct->p_barcode, ['class'=>'form-control','placeholder'=>'ระบุรหัสสินค้า','id'=>'t_barcode', 'maxlength'=>'30']); !!}
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="t_name">ชื่อสินค้า <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                {!! Form::text('t_name',$sproduct->p_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อสินค้า','id'=>'t_name', 'maxlength'=>'100']); !!}
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="t_price">ราคาขาย <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                {!! Form::text('t_price',$sproduct->p_price, ['class'=>'form-control','placeholder'=>'ระบุราคาขาย','onkeypress'=>'CheckNum()','maxlength'=>'11']); !!}
                </div>
            </div>
                
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="t_name">หน่วยนับ</label>
                <div class="col-sm-8">
                {!! Form::text('t_unit',$sproduct->p_unit, ['class'=>'form-control','placeholder'=>'ระบุหน่วยนับ เช่น ชิ้น','maxlength'=>'10']); !!}
                </div>
            </div>
    
            <div class="form-group row">
                {!! Form::label('t_low','แจ้งเตือนขั้นต่ำ', ['class'=>'col-sm-4 col-form-label']); !!}
                <div class="col-sm-8">
                {!! Form::text('t_low',$sproduct->p_low, ['class'=>'form-control','placeholder'=>'ระบุแจ้งเตือนจำนวนขั้นต่ำ', 'onkeypress'=>'CheckNum()', 'maxlength'=>'3']); !!}
                </div>
            </div>
    
            <div class="form-group row">
                {!! Form::label('s_status','สถานะ', ['class'=>'col-sm-4 col-form-label']); !!}
                <div class="col-sm-8">
                {!! Form::select('s_status', ['1' => 'ใช้งาน', '0' => 'ยกเลิก'], $sproduct->p_status, ['class' => 'form-control']); !!}
                </div>
            </div>
    
            <div class="form-group row">
                {!! Form::label('s_stock','ตัดสต๊อก', ['class'=>'col-sm-4 col-form-label']); !!}
                <div class="col-sm-8">
                {!! Form::select('s_stock', ['1' => 'ตัดสต๊อก', '0' => 'ไม่ตัดสต๊อก'], $sproduct->p_stock, ['class' => 'form-control']); !!}
                </div>
            </div>
    
            <div class="form-group row">
                {!! Form::label('image','ภาพสินค้า', ['class'=>'col-sm-4 col-form-label']); !!}
                <div class="col-sm-8">
                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">เลือกภาพสินค้า</label>
                </div>
            </div>
            
                    </div>
            
                    <div class="col-sm-6">
                            
                        

                    </div>
                
                
                    </div>
                </p>
            </div>

            <div role="tabpanel" class="tab-pane" id="tab-detail">
                <p>
                    <div class="form-group">
                        <!-- SimpleMDE Container -->
                        <textarea class="js-simplemde" id="simplemde" name="t_detail">{{ $sproduct->p_detail }}</textarea>
                    </div>                    
                </p>
            </div>

        </div>
    </div>

</p>
</div>
<div class="block-content block-content-full text-right bg-light">
    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
    {!! Form::submit('บันทึก', ['class'=>'btn btn-sm btn-primary']); !!}
</div>
</div>

{!! Form::close() !!}

