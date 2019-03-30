
{!! Form::model($productcat, array('url'=>'productcat/'.$productcat->cat_id, 'method'=>'put', 'OnSubmit'=>'return fncSubmit_edit();', 'name'=>'form2', 'role'=>'form2')) !!}

<div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">แก้ไขหมวดหมู่สินค้า : {{ $productcat->cat_name }}</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
            </button>
        </div>
    </div>
    <div class="block-content">
        <p>
                  

{{ csrf_field() }}
    <!-- Basic Elements -->
    <div class="row push">
        <div class="col-lg-12 col-xl-12">
            <div class="form-group">
                <label class="col-sm-4 col-form-label" for="t_name">ชื่อหมวดหมู่ <span class="text-danger">*</span></label>
                {!! Form::text('t_name', $productcat->cat_name , ['class'=>'form-control','maxlength'=>'100']); !!}
            </div>

            <div class="form-group">
                {!! Form::label('s_type','หมวดหมู่หลัก'); !!}
                {!! Form::select('s_type', $scat, $productcat->cat_type, ['class' => 'form-control']); !!}
            </div>

            <div class="form-group">
                {!! Form::label('s_status','สถานะ'); !!}
                {!! Form::select('s_status', ['1' => 'ใช้งาน', '2' => 'ยกเลิก'], $productcat->cat_status, ['class' => 'form-control']); !!}
            </div>
            
        </div>
    </div>
    
    
    <!-- END Basic Elements -->

        </p>
    </div>
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        {!! Form::submit('บันทึก', ['class'=>'btn btn-sm btn-primary']); !!}
    </div>
</div>

{!! Form::close() !!}
