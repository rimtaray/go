              


{!! Form::model($barcode, array('url'=>'product/'.$barcode->p_id, 'OnSubmit'=>'return fncSubmit_barcode();', 'name'=>'form3', 'role'=>'form3', 'method'=>'put', 'target'=>'_blank')) !!}


<div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">ชื่อสินค้า : {{ $barcode->p_name }}</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
            </button>
        </div>
    </div>
    <div class="block-content">
        <p>
                  

                    
    {{ csrf_field() }}
    <input name="ck" type="hidden" value="barcode">

    <div class="text-center"><img src="{{ asset('images_product/resize/'.$barcode->p_image) }}"></div>
    <h2 class="content-heading">ข้อมูลสินค้า </h2>
    <div class="row">
        <div class="col-sm-12">
            

        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="t_barcode">รหัสสินค้า <span class="text-danger">*</span></label>
            <div class="col-sm-8">
            {!! Form::text('t_barcode',$barcode->p_barcode, ['class'=>'form-control','placeholder'=>'ระบุรหัสสินค้า','id'=>'t_barcode']); !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="t_name">ชื่อสินค้า <span class="text-danger">*</span></label>
            <div class="col-sm-8">
            {!! Form::text('t_name',$barcode->p_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อสินค้า','id'=>'t_name']); !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="t_price">ราคาสินค้า</label>
            <div class="col-sm-8">
            {!! Form::text('t_price',$barcode->p_price, ['class'=>'form-control','placeholder'=>'ระบุราคาสินค้า','id'=>'t_price']); !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="t_num">จำนวนที่ต้องการพิมพ์ <span class="text-danger">*</span></label>
            <div class="col-sm-8">
            {!! Form::text('t_num', null, ['class'=>'form-control','placeholder'=>'ระบุจำนวนที่ต้องการสั่งพิมพ์','id'=>'t_num','onkeypress'=>'CheckNum()']); !!}
            </div>
        </div>



    </div>
</div>



<!-- END Basic Elements -->

        </p>
    </div>
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        
        {!! Form::button('<i class="fa fa-print"></i> พิมพ์', ['type'=>'submit','class'=>'btn btn-sm btn-primary']); !!}
    </div>
</div>

{!! Form::close() !!}


