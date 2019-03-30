

<!-- Page Content -->
<div class="content content-full">
    


    <!-- Domains -->
    <div class="d-flex justify-content-between align-items-center mt-6 mb-3">
        <h2 class="font-w300 mb-0">ร้านค้า</h2>
        
        <button type="button" class="btn btn-primary btn-sm btn-primary btn-rounded px-3" onclick="Dashmix.block('open', '#dm-add-domain');">
            <i class="fa fa-plus mr-1"></i> เพิ่มร้าน
        </button>
    </div>

    


<div class="row">
    <div class="col-lg-6 col-xl-6">

        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">ข้อมูลร้าน : {{ $data->m_name }}</h2>
                    <div class="row push">
                        <div class="col-12">
    
                            {!! Form::model($data, array('url'=>'store_update/'.$data->m_id, 'method'=>'put')) !!}

                            {{ csrf_field() }}

                            <div class="form-group">
                                {!! Form::label('t_name','ชื่อร้าน'); !!}
                                {!! Form::text('t_name', $data->m_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อร้าน']); !!}
                            </div>                            
                            <div class="form-group">
                                {!! Form::label('t_address','ที่อยู่'); !!}
                                {!! Form::text('t_address', $data->m_address,['class'=>'form-control','placeholder'=>'ระบุที่อยู่ร้าน']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('t_tel','โทรศัพท์'); !!}
                                {!! Form::text('t_tel', $data->m_tel, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์']); !!}
                            </div>  
                            <div class="form-group">
                                {!! Form::label('t_mobile','โทรศัพท์มือถือ'); !!}
                                {!! Form::text('t_mobile', $data->m_mobile, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์มือถือ']); !!}
                            </div>  

                        </div>
                    </div>
                        
                    <h2 class="content-heading pt-0">ข้อมูลใบกำกับภาษี</h2>
                    <div class="row push">
                        <div class="col-12">

                            <div class="form-group">
                                {!! Form::label('t_invno','เลขที่ผู้เสียภาษี'); !!}
                                {!! Form::text('t_invno', $data->m_inv_no, ['class'=>'form-control','placeholder'=>'ระบุเลขที่ผู้เสียภาษี']); !!}
                            </div>  
                            <div class="form-group">
                                {!! Form::label('t_invname','ชื่อออกใบกำกับภาษี'); !!}
                                {!! Form::text('t_invname', $data->m_inv_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อออกใบกำกับภาษี']); !!}
                            </div>  
                            <div class="form-group">
                                {!! Form::label('t_invadd','ที่อยู่ออกใบกำกับภาษี'); !!}
                                {!! Form::text('t_invadd', $data->m_inv_add, ['class'=>'form-control','placeholder'=>'ระบุที่อยู่ออกใบกำกับภาษี']); !!}
                            </div>  
                            <div class="form-group">
                                {!! Form::label('t_invtel','โทรศัพท์ออกใบกำกับภาษี'); !!}
                                {!! Form::text('t_invtel', $data->m_inv_tel, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์ออกใบกำกับภาษี']); !!}
                            </div>  

                        </div>
                    </div>

                    <h2 class="content-heading pt-0">ข้อมูลการพิมพ์ใบเสร็จ</h2>
                    <div class="row push">
                        <div class="col-12">
                                
                            <div class="form-group">
                                {!! Form::label('t_taxid','เลขที่ผู้เสียภาษี'); !!}
                                {!! Form::text('t_taxid', $data->m_taxid, ['class'=>'form-control','placeholder'=>'ระบุเลขที่ผู้เสียภาษี (สำหรับใบเสร็จ)']); !!}
                            </div>  
                            <div class="form-group">
                                {!! Form::label('s_receipt','การพิมพ์ใบเสร็จ'); !!}
                                {!! Form::select('s_receipt', [''=>'เลือกการพิมพ์ใบเสร็จ','0'=>'ไม่พิมพ์ใบเสร็จ','1' => 'พิมพ์ใบเสร็จทุกครั้ง','2'=>'พิมพ์ใบเสร็จบางครั้ง'], $data->m_receipt, ['class' => 'form-control']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('s_format','รูปแบบใบเสร็จ'); !!}
                                {!! Form::select('s_format', [''=>'เลือกรูปแบบใบเสร็จ','1' => 'ขนาด 3 นิ้ว อย่างย่อ', '2' => 'ขนาด 3 นิ้ว อย่างย่อแสดง VAT', '3'=>'ขนาด A5 อย่างย่อ', '4'=>'ขนาด A5 อย่างย่อแสดง VAT'], $data->m_rec_format, ['class' => 'form-control']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('s_num','จำนวนใบเสร็จ'); !!}
                                {!! Form::select('s_num', [''=>'เลือกจำนวนการพิมพ์ใบเสร็จ','1' => '1 ใบ', '2' => '2 ใบ', '3'=>'3 ใบ'], $data->m_rec_num, ['class' => 'form-control']); !!}
                            </div>


                            <div class="form-group">
                                {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']); !!}
                            </div>
                        </div>
                    </div>
                        {!! Form::close() !!}
                    
                    
                    <!-- END Basic Elements -->

            </div>
        </div>
        <!-- END Your Block -->

    </div>

</div>
<!-- END Page Content -->

</div>

