

    <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
        <h3 class="block-title">เพิ่มข้อมูลการจ่ายด้วยบัตรเครดิต</h3>
        <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
                </button>
        </div>
        </div>
        <div class="block-content">
        <p>

        <div class="row">

                <input type="hidden" name="t_credit_id" id="t_credit_id" value="{{ $data->cc_id }}">

                <div class="col-xs-12 col-md-6">                        
                        <div class="form-group">
                                {!! Form::label('t_credit_name','ชื่อบัตร'); !!}
                                <input type="text" class="form-control" name="t_credit_name" id="t_credit_name">
                        </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                                {!! Form::label('t_credit_no','เลขที่บัตรเครดิต'); !!}
                                <input type="text" class="form-control" name="t_credit_no" id="t_credit_no">
                        </div>
                </div>
        </div>

        <div class="row">
                <div class="col-xs-12 col-md-4">  
                        <div class="form-group">
                                {!! Form::label('t_credit_expired','วันที่หมดอายุ'); !!}
                                <input type="text" class="form-control" name="t_credit_expired" id="t_credit_expired">
                        </div>
                </div>
                <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                                {!! Form::label('t_credit_installment','Installment No'); !!}
                                <input type="text" class="form-control" name="t_credit_installment" id="t_credit_installment">
                        </div>
                </div>
                <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                                {!! Form::label('t_credit_isim','IsIM'); !!}
                                <input type="text" class="form-control" name="t_credit_isim" id="t_credit_isim">
                        </div>
                </div>
        </div>

        <div class="row">
                <div class="col-xs-12 col-md-3">  
                        <div class="form-group">
                                {!! Form::label('t_credit_pay','ยอดชำระ'); !!}
                                <input type="text" class="form-control" name="t_credit_pay" id="t_credit_pay" onkeyup="cal_credit_pay()">
                        </div>
                </div>
                <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                                {!! Form::label('t_credit_free','อัตราค่าธรรมเนียม (%)'); !!}
                                <input type="text" class="form-control" name="t_credit_free" id="t_credit_free" value="{{ $data->cc_free }}" readonly >
                        </div>
                </div>
                <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                                {!! Form::label('t_credit_freepay','ยอดค่าธรรมเนียม'); !!}
                                <input type="text" class="form-control" name="t_credit_freepay" id="t_credit_freepay" value="" readonly >
                        </div>
                </div>
                <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                                {!! Form::label('t_credit_total','ยอดทั้งหมด'); !!}
                                <input type="text" class="form-control" name="t_credit_total" id="t_credit_total" value="" readonly >
                        </div>
                </div>
        </div>


        </p>
        </div>
        <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-create-credit" onclick="credit_add()"  data-dismiss="modal">เพิ่ม</button>
        </div>
</div>
    
    