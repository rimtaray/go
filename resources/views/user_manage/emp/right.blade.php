

    
    {!! Form::model($data, array('url'=>'employee/'.$data->ud_id, 'method'=>'put')) !!}



    <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">ชื่อผู้ใช้ : {{ $data->u_name }}</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <p>
    
    
                    <input name="ck" type="hidden" value="right">


                            <!-- Themed -->
                            <h2 class="content-heading">สิทธิ์การใช้งาน</h2>
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    
                                    <div class="form-group">
                                        <label class="col-12">รายการเมนู</label>

                                        @foreach($right as $right)
                                        
                                        <div class="custom-control custom-switch custom-control-success custom-control-lg mb-2">
                                            <input type="checkbox" class="custom-control-input" id="cb[{{ $right->ri_no }}]" name="cb[{{ $right->ri_no }}]" value="{{ $right->ri_id }}"
                                            <?
                                            if(strrpos($data->ud_right, $right->ri_id.'/') == true)
                                            {
                                                echo ' checked';
                                            }
                                            ?>
                                            >
                                            <label class="custom-control-label" for="cb[{{ $right->ri_no }}]">{{ $right->ri_name }}</label>
                                        </div>

                                        @endforeach
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END Themed -->
    
    
                </p>
            </div>
            <div class="block-content block-content-full text-right bg-light">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']); !!}
            </div>
        </div>
                {!! Form::close() !!}
        
    
    