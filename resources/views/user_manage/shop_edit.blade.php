
    
{!! Form::model($data, array('url'=>'store_update/'.$data->m_id, 'method'=>'put')) !!}


{{ csrf_field() }}
<div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">ข้อมูลร้าน : {{ $data->m_name }}</h3>
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
                <a class="nav-link text-primary active" href="#tab-store" aria-controls="tab-store" role="tab"
                data-toggle="tab">ข้อมูลร้าน</a>
            </li>
            <li role="presentation" class="nav-item">
                <a class="nav-link text-primary" href="#tab-vat" aria-controls="tab-vat" role="tab"
                data-toggle="tab">ใบกำกับภาษี</a>
            </li>
            <li role="presentation" class="nav-item">
                <a class="nav-link text-primary" href="#tab-receive" aria-controls="tab-receive" role="tab"
                data-toggle="tab">ใบเสร็จ</a>
            </li>
        </ul>
        
        <div class="block-content tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab-store">                
                <p>       

                    <div class="form-group">
                        {!! Form::label('t_name','ชื่อร้าน'); !!}
                        {!! Form::text('t_name', $data->m_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อร้าน','maxlength'=>'100']); !!}
                    </div>                            
                    <div class="form-group">
                        {!! Form::label('t_address','ที่อยู่'); !!}
                        {!! Form::text('t_address', $data->m_address,['class'=>'form-control','placeholder'=>'ระบุที่อยู่ร้าน','maxlength'=>'300']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('t_tel','โทรศัพท์'); !!}
                        {!! Form::text('t_tel', $data->m_tel, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์','maxlength'=>'20']); !!}
                    </div>  
                    <div class="form-group">
                        {!! Form::label('t_mobile','โทรศัพท์มือถือ'); !!}
                        {!! Form::text('t_mobile', $data->m_mobile, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์มือถือ','maxlength'=>'10']); !!}
                    </div>  
                    
                </p>
            </div>

            <div role="tabpanel" class="tab-pane" id="tab-vat">
                <p>

                    <div class="form-group">
                        {!! Form::label('t_invno','เลขที่ผู้เสียภาษี'); !!}
                        {!! Form::text('t_invno', $data->m_inv_no, ['class'=>'form-control','placeholder'=>'ระบุเลขที่ผู้เสียภาษี','maxlength'=>'13', 'onkeypress'=>'CheckNum()']); !!}
                    </div>  
                    <div class="form-group">
                        {!! Form::label('t_invname','ชื่อออกใบกำกับภาษี'); !!}
                        {!! Form::text('t_invname', $data->m_inv_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อออกใบกำกับภาษี','maxlength'=>'100']); !!}
                    </div>  
                    <div class="form-group">
                        {!! Form::label('t_invadd','ที่อยู่ออกใบกำกับภาษี'); !!}
                        {!! Form::text('t_invadd', $data->m_inv_add, ['class'=>'form-control','placeholder'=>'ระบุที่อยู่ออกใบกำกับภาษี','maxlength'=>'300']); !!}
                    </div>  
                    <div class="form-group">
                        {!! Form::label('t_invtel','โทรศัพท์ออกใบกำกับภาษี'); !!}
                        {!! Form::text('t_invtel', $data->m_inv_tel, ['class'=>'form-control','placeholder'=>'ระบุเบอร์โทรศัพท์ออกใบกำกับภาษี','maxlength'=>'20']); !!}
                    </div>  
                    
                                      
                </p>
            </div>

            <div role="tabpanel" class="tab-pane" id="tab-receive">
                <p>
                                
                    <div class="form-group">
                        {!! Form::label('t_taxid','เลขที่ผู้เสียภาษี'); !!}
                        {!! Form::text('t_taxid', $data->m_taxid, ['class'=>'form-control','placeholder'=>'ระบุเลขที่ผู้เสียภาษี (สำหรับใบเสร็จ)','maxlength'=>'13', 'onkeypress'=>'CheckNum()']); !!}
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
                    
                        
                </p>
            </div>
        </div>
    </div>

        </p>
    </div>
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
        {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']); !!}
    </div>
</div>
        {!! Form::close() !!}


