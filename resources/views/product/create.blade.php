



{!! Form::open(array('url'=>'product', 'OnSubmit'=>'return fncSubmit_create();', 'name'=>'form1', 'role'=>'form1','files'=>true)) !!}

{{ csrf_field() }}

<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-primary-dark">
    <h3 class="block-title">เพิ่มสินค้าใหม่ Non S/N</h3>
    <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-fw fa-times"></i>
        </button>
    </div>
</div>
<div class="block-content">
    <p>

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
            <li role="presentation" class="nav-item">
                <a class="nav-link text-primary" href="#tab-import" aria-controls="tab-import" role="tab"
                data-toggle="tab">นำเข้าสินค้า</a>
            </li>
        </ul>
        
        <div class="block-content tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab-product">                
                <p>       
                    <input name="ck" type="hidden" value="new">
            
                    <div class="row">
                        <div class="col-sm-6">                            
            
                        <div class="form-group row">
                            {!! Form::label('s_cat','หมวดหมู่สินค้า', ['class'=>'col-sm-5 col-form-label']); !!}
                            <div class="col-sm-7">
                            <select class="form-control" name="s_cat">
                                <option value="0">ไม่มีหมวดหมู่</option>
                            @foreach($scat as $scat)
                                <option value="{{ $scat->cat_id }}">{{ $scat->cat_name }}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="t_barcode">รหัสสินค้า <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                            {!! Form::text('t_barcode',null, ['class'=>'form-control','placeholder'=>'ระบุรหัสสินค้า','maxlength'=>'30']); !!}
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="t_name">ชื่อสินค้า <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                            {!! Form::text('t_name',null, ['class'=>'form-control','placeholder'=>'ระบุชื่อสินค้า','maxlength'=>'100']); !!}
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="t_price">ราคาขาย <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                            <input class="form-control" name="t_price" type="text" placeholder="ระบุราคาขาย เช่น 300" maxlength="11" onkeypress="CheckNum()">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="t_name">หน่วยนับ</label>
                            <div class="col-sm-7">
                            {!! Form::text('t_unit',null, ['class'=>'form-control','placeholder'=>'ระบุหน่วยนับ เช่น ชิ้น','maxlength'=>'10']); !!}
                            </div>
                        </div>
            
                        <div class="form-group row">
                            {!! Form::label('t_low','แจ้งเตือนขั้นต่ำ', ['class'=>'col-sm-5 col-form-label']); !!}
                            <div class="col-sm-7">
                            {!! Form::text('t_low',null, ['class'=>'form-control','placeholder'=>'ระบุแจ้งเตือนจำนวนขั้นต่ำ','maxlength'=>'3', 'onkeypress'=>'CheckNum()']); !!}
                            </div>
                        </div>
            
                        <div class="form-group row">
                            {!! Form::label('s_stock','ตัดสต๊อก', ['class'=>'col-sm-5 col-form-label']); !!}
                            <div class="col-sm-7">
                            {!! Form::select('s_stock', ['0' => 'ไม่ตัดสต๊อก', '1' => 'ตัดสต๊อก'],null, ['class' => 'form-control']); !!}
                            </div>
                        </div>
            
                        <div class="form-group row">
                            {!! Form::label('image','ภาพสินค้า', ['class'=>'col-sm-5 col-form-label']); !!}
                            <div class="col-sm-7">
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
                        <textarea class="js-simplemde" id="simplemde" name="t_detail"></textarea>
                    </div>                    
                </p>
            </div>

            <div role="tabpanel" class="tab-pane" id="tab-import">
                <p>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            
                
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="t_num">จำนวนสินค้า <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            <input class="form-control" name="t_num" type="text" placeholder="ระบุจำนวน (อย่างน้อย 1)" maxlength="5" onkeypress="CheckNum()" >
                            </div>
                        </div>
                
                        <div class="form-group row">
                            {!! Form::label('t_cost','ราคาทุนต่อหน่วย', ['class'=>'col-sm-4 col-form-label']); !!}
                            <div class="col-sm-8">
                            <input class="form-control" name="t_cost" type="text" placeholder="ระบุราคาทุน เช่น 200" maxlength="11" onkeypress="CheckNum()">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            {!! Form::label('t_date','วันหมดอายุ', ['class'=>'col-sm-4 col-form-label']); !!}
                            <div class="col-sm-8">
                            <input type="text" class="js-datepicker form-control" id="t_date" name="t_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            {!! Form::label('t_alert','เตือนก่อนหมดอายุ', ['class'=>'col-sm-4 col-form-label']); !!}
                            <div class="col-sm-8">
                            <input class="form-control" name="t_alert" type="text" placeholder="(ถ้ามี) ระบุจำนวนวัน เช่น 5" maxlength="4" onkeypress="CheckNum()">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            {!! Form::label('t_claim','รับประกัน(วัน)', ['class'=>'col-sm-4 col-form-label']); !!}
                            <div class="col-sm-8">
                            <input class="form-control" name="t_claim" type="text" placeholder="(ถ้ามี) ระบุจำนวนวัน เช่น 365" maxlength="5" onkeypress="CheckNum()">
                            </div>
                        </div>
                
                        <div class="form-group row">
                            {!! Form::label('s_sup','ผู้ผลิต', ['class'=>'col-sm-4 col-form-label']); !!}
                            <div class="col-sm-8">
                            {!! Form::select('s_sup', $ssup, 'null', ['class'=>'form-control', 'placeholder'=>'- เลือกผู้ผลิต -']); !!}
                            </div>
                        </div>
                
                
                
                        </div>
                    </div>
                
                        
                </p>
            </div>
        </div>
    </div>

        </p>
    </div>
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        {!! Form::submit('เพิ่ม', ['class'=>'btn btn-primary']); !!}
    </div>
</div>
        {!! Form::close() !!}