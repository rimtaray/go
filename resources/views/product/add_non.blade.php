



{!! Form::open(array('url'=>'product', 'OnSubmit'=>'return fncSubmit_add();', 'name'=>'form1', 'role'=>'form1')) !!}

<div class="block block-themed block-transparent mb-0">
<div class="block-header bg-primary-dark">
    <h3 class="block-title">เพิ่มสินค้า : {{ $data->p_name }}</h3>
    <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-fw fa-times"></i>
        </button>
    </div>
</div>
<div class="block-content">
    <p>
        
        {{ csrf_field() }}

        <input name="ck" type="hidden" value="add_non">
        {{ Form::hidden('h_pid', $data->p_id) }}
        {{ Form::hidden('h_barcode', $data->p_barcode) }}
        
    <div class="text-center"><img src="{{ asset('images_product/resize/'.$data->p_image) }}"></div>


    <h2 class="content-heading">นำเข้าสินค้า</h2>
    <div class="row">
        <div class="col-sm-12">
            

        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="t_num">จำนวนสินค้า <span class="text-danger">*</span></label>
            <div class="col-sm-8">
            <input class="form-control" name="t_num" type="text" placeholder="ระบุจำนวน เช่น 20" maxlength="5" onkeypress="CheckNum()" >
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
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        {!! Form::submit('เพิ่ม', ['class'=>'btn btn-primary']); !!}
    </div>
</div>
        {!! Form::close() !!}