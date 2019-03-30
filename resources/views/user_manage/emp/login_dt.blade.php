

    
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
    
    
                    <input name="ck" type="hidden" value="login_dt">


                            <!-- Themed -->
                            <h2 class="content-heading">สิทธิ์การเข้าระบบ</h2>
                            <div class="row">
                                    
                            <label class="col-12">วัน / เวลา</label>

                            <? 
                            $day = array('','วันจันทร์','วันอังคาร','วันพุธ','วันพฤหัส','วันศุกร์','วันเสาร์','วันอาทิตย์');
                            $t = '1';
                            $time = explode(',',$data->ud_login);
                            ?>

                            @for($i=1;$i<=7;$i++)

                                <div class="col-4">
                                    <div class="form-group">
                                        
                                        <div class="custom-control custom-switch custom-control-success custom-control-lg mb-2">
                                            <input type="checkbox" class="custom-control-input" id="day[{{ $i }}]" name="day[{{ $i }}]" value="{{ $i }}"
                                            <?
                                            $x = '';
                                            if(strrpos($data->ud_login, ','.$i.'|') == true)
                                            {
                                                echo ' checked';
                                                $x = explode('|',$time[$t++]);
                                            }
                                            ?>
                                            >
                                            <label class="custom-control-label" for="day[{{ $i }}]">{{ $day[$i] }}</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="start[{{ $i }}]">เวลาเริ่ม</label>
                                                <input type="time" class="js-masked-time form-control" id="start[{{ $i }}]" name="start[{{ $i }}]" placeholder="00:00" value="{{ $x[1] or '' }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="stop[{{ $i }}]">เวลาสิ้นสุด</label>
                                                <input type="time" class="js-masked-time form-control" id="stop[{{ $i }}]" name="stop[{{ $i }}]" placeholder="00:00" value="{{ $x[2] or '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                            @endfor


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
        
    
    