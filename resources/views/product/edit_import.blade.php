              


{!! Form::model($import, array('url'=>'product/'.$import->pd_id, 'OnSubmit'=>'return fncSubmit_add();', 'name'=>'form1', 'role'=>'form1', 'method'=>'put')) !!}


<div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">รหัสสินค้า : {{ $import->ps_sn }}</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
            </button>
        </div>
    </div>
    <div class="block-content">
        <p>
                  

                    
    {{ csrf_field() }}
    <input name="ck" type="hidden" value="edit_import">
    <input name="h_pdid" type="hidden" value="{{ $import->pd_id }}">
    <input name="h_psid" type="hidden" value="{{ $import->ps_id }}">
    <input name="h_pid" type="hidden" value="{{ $import->p_id }}">


    <h2 class="content-heading">ข้อมูลการนำเข้า </h2>
    <div class="row">
        <div class="col-sm-12">
            

        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="t_num">จำนวน <span class="text-danger">*</span></label>
            <div class="col-sm-8">
            {!! Form::text('t_num',$import->ps_num, ['class'=>'form-control','placeholder'=>'ระบุจำนวนสินค้า','onkeypress'=>'CheckNum()','maxlength'=>'5']); !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('t_cost','ราคาทุน', ['class'=>'col-sm-4 col-form-label']); !!}
            <div class="col-sm-8">
            {!! Form::text('t_cost',$import->pd_cost, ['class'=>'form-control','placeholder'=>'ระบุราคาทุน','onkeypress'=>'CheckNum()','maxlength'=>'11']); !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('s_status','สถานะ', ['class'=>'col-sm-4 col-form-label']); !!}
            <div class="col-sm-8">
            {!! Form::select('s_status', ['1' => 'ใช้งาน', '0' => 'ยกเลิก'], $import->pd_status, ['class' => 'form-control']); !!}
            </div>
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


