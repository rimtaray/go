<div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
        <h3 class="block-title">เพิ่มข้อมูลการจ่ายด้วยเช็ค</h3>
        <div class="block-options">
                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
                </button>
        </div>
        </div>
        <div class="block-content">
        <p>


        <div class="row">
                <div class="col-xs-12 col-md-6">   
                        <div class="form-group">
                                {!! Form::label('t_check_name','ธนาคาร'); !!}
                                <input type="text" class="form-control" name="t_check_name" id="t_check_name">
                        </div>
                </div>
                <div class="col-xs-12 col-md-6">
                
                        <div class="form-group">
                                {!! Form::label('t_check_branch','สาขา'); !!}
                                <input type="text" class="form-control" name="t_check_branch" id="t_check_branch">
                        </div>
                </div>
                <div class="col-xs-12 col-md-6">
                
                        <div class="form-group">
                                {!! Form::label('t_check_number','เลขที่เช็ค'); !!}
                                <input type="text" class="form-control" name="t_check_number" id="t_check_number">
                        </div>
                </div>
                <div class="col-xs-12 col-md-6">
                
                        <div class="form-group">
                                {!! Form::label('t_check_date','วันที่เช็ค'); !!}
                                <input type="text" class="form-control" name="t_check_date" id="t_check_date">
                        </div>
                </div>
                <div class="col-xs-12 col-md-6">
                
                        <div class="form-group">
                                {!! Form::label('t_check_no','เลขที่สมุดบัญชี'); !!}
                                <input type="text" class="form-control" name="t_check_no" id="t_check_no">
                        </div>
                </div>
                <div class="col-xs-12 col-md-6">
                
                        <div class="form-group">
                                {!! Form::label('t_check_amount','ยอดเงิน'); !!}
                                <input type="text" class="form-control" name="t_check_amount" id="t_check_amount">
                        </div>
                </div>
                <div class="col-xs-12 col-md-6">
                
                        <div class="form-group">
                                {!! Form::label('t_check_status','สถานะเช็ค'); !!}
                                <input type="text" class="form-control" name="t_check_status" id="t_check_status">
                        </div>
                </div>
        </div>


        </p>
        </div>
        <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="check_add()">เพิ่ม</button>
        </div>
</div>
        
        