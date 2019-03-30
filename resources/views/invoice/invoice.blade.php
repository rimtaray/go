@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ใบกำกับภาษี</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item">Generic</li>
                        <li class="breadcrumb-item active" aria-current="page">Blank</li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">ข้อมูลออกใบกำกับภาษี</h2>
                    <div class="row push">
                        <div class="col-lg-8 col-xl-5">
    
                            {!! Form::open(array('url'=>'invoice')) !!}

                            {{ csrf_field() }}  
                            <input name="ck" type="hidden" value="invoice">

                            <div class="form-group">
                                {!! Form::label('s_bill','อ้างอิงจากใบเสร็จเลขที่'); !!}
                                {!! Form::select('s_bill', $bill, null, ['class'=>'form-control', 'placeholder'=>'เลือกเลขที่ใบเสร็จ']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('s_bill','อ้างอิงจากใบกำกับภาษีเลขที่ (ใบกำกับภาษีที่ยกเลิก)'); !!}
                                {!! Form::select('s_invcc', $inv_cc, null, ['class'=>'form-control', 'placeholder'=>'เลือกเลขที่ใบกำกับภาษี']); !!}
                            </div>
                            <div class="form-group">
                                <label for="t_name">ชื่อผู้ซื้อ</label>
                                <input type="text" class="form-control" id="t_name" name="t_name">
                            </div>
                            <div class="form-group">
                                <label for="t_add">ที่อยู่ผู้ซื้อ</label>
                                <input type="text" class="form-control" id="t_add" name="t_add">
                            </div>
                            <div class="form-group">
                                <label for="t_phone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" id="t_phone" name="t_phone">
                            </div>
                            <div class="form-group">
                                <label for="t_office">สำนักงานใหญ่ / เลขที่สาขา</label>
                                <input type="text" class="form-control" id="t_office" name="t_office">
                            </div>
                            <div class="form-group">
                                <label for="t_idcard">เลขประจำตัวผู้เสียภาษี / เลขประจำตัวประชาชน</label>
                                <input type="text" class="form-control" id="t_idcard" name="t_idcard">
                            </div>
                            <div class="form-group">
                                <label for="s_type">ประเภทภาษี</label>
                                <select class="form-control" id="s_type" name="s_type">
                                    <option value="">เลือกประเภทภาษี</option>
                                    <option value="ex">แยกภาษี</option>
                                    <option value="in">รวมภาษี</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">บันทึก / พิมพ์ใบกำกับภาษี</button>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- END Basic Elements -->

            
                    {!! Form::close() !!}
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

@endsection