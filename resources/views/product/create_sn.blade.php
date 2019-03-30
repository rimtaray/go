



{!! Form::open(array('url'=>'productsn','files'=>true, 'OnSubmit'=>'return fncSubmit_create();', 'name'=>'form1', 'role'=>'form1')) !!}

{{ csrf_field() }}

<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-primary-dark">
    <h3 class="block-title">เพิ่มสินค้าใหม่ S/N</h3>
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
            <li role="presentation" class="nav-item">
                <a class="nav-link text-primary" href="#tab-serial" aria-controls="tab-serial" role="tab"
                data-toggle="tab">รหัสสินค้า</a>
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

                        <input name="s_stock" type="hidden" value="1">
            
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

            <div role="tabpanel" class="tab-pane" id="tab-serial">
                <p>
                    
                        <div class="row">
                            <div class="col-sm-6">
                    
                                <div class="form-group">  
                                    <div class="table-responsive">  
                                         <table class="table table-bordered" id="dynamic_field">  
                                              <tr>  
                                                   <td><input type="text" name="sn[]" class="form-control form-control-sm" /></td>  
                                                   <td class="text-center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-sm"><i class="fa fa-trash"></i></button></td>  
                                              </tr>    
                                         </table>  
                                         <button type="button" name="add" id="add" class="btn btn-success">เพิ่มอีก</button>
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



<script>  
$(document).ready(function(){  
        var i=1;  
        $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="sn[]" class="form-control form-control-sm" /></td><td class="text-center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-sm"><i class="fa fa-trash"></i></button></td></tr>');  
        });  
        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });   
});  
</script>
                            

{{-- 
{!! Form::open(array('url'=>'productsn','files'=>true, 'OnSubmit'=>'return fncSubmit_create();', 'name'=>'form1', 'role'=>'form1')) !!}

<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-primary-dark">
    <h3 class="block-title">เพิ่มสินค้าใหม่ S/N</h3>
    <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-fw fa-times"></i>
        </button>
    </div>
</div>
<div class="block-content">
    <p>
        
        {{ csrf_field() }}

        <input name="ck" type="hidden" value="new">

        <h2 class="content-heading">ข้อมูลสินค้า</h2>
        <div class="row">
            <div class="col-sm-12">
                

            <div class="form-group row">
                {!! Form::label('s_cat','หมวดหมู่สินค้า', ['class'=>'col-sm-4 col-form-label']); !!}
                <div class="col-sm-8">
                {!! Form::select('s_cat', $scat, null, ['class'=>'form-control', 'placeholder'=>'- เลือกหมวดหมู่ -']); !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="t_name">ชื่อสินค้า <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                {!! Form::text('t_name',null, ['class'=>'form-control','placeholder'=>'ระบุชื่อสินค้า','maxlength'=>'100']); !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('t_low','แจ้งเตือนขั้นต่ำ', ['class'=>'col-sm-4 col-form-label']); !!}
                <div class="col-sm-8">
                {!! Form::text('t_low',null, ['class'=>'form-control','placeholder'=>'ระบุแจ้งเตือนจำนวนขั้นต่ำ','maxlength'=>'3', 'onkeypress'=>'CheckNum()']); !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('s_stock','ตัดสต๊อก', ['class'=>'col-sm-4 col-form-label']); !!}
                <div class="col-sm-8">
                {!! Form::select('s_stock', ['1' => 'ตัดสต๊อก', '0' => 'ไม่ตัดสต๊อก'],null, ['class' => 'form-control']); !!}
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
    </div>


    <h2 class="content-heading">นำเข้าสินค้า</h2>
    <div class="row">
        <div class="col-sm-12">
            


        <div class="form-group row">
            {!! Form::label('t_cost','ราคาทุนต่อหน่วย', ['class'=>'col-sm-4 col-form-label']); !!}
            <div class="col-sm-8">
            <input class="form-control" name="t_cost" type="text" placeholder="ระบุราคาทุน เช่น 200" maxlength="11" onkeypress="CheckNum()">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="t_price">ราคาขายต่อหน่วย <span class="text-danger">*</span></label>
            <div class="col-sm-8">
            <input class="form-control" name="t_price" type="text" placeholder="ระบุราคาขาย เช่น 300" maxlength="11" onkeypress="CheckNum()">
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
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        {!! Form::submit('เพิ่ม', ['class'=>'btn btn-primary']); !!}
    </div>
</div>
        {!! Form::close() !!} --}}