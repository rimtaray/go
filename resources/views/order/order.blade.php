@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ใบสั่งซื้อสินค้า</h1>
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

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                    
                    <!-- Your Block -->
                    <div class="block block-rounded block-bordered">
                            <div class="block-content">
    
                                    {!! Form::open(array('url'=>'order', 'OnSubmit'=>'return fncSubmit_add();', 'name'=>'form1', 'role'=>'form1')) !!}
    
                                    {{ csrf_field() }}  
                                    <input type="hidden" name="ck" value="add_order">

                                    <!-- Basic Elements -->
                                    <h2 class="content-heading pt-0">เพิ่มสินค้าลงใบสั่งซื้อ</h2>
                                    <div class="row push">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <label for="t_barcode">รหัสสินค้า / บาร์โค้ด</label>
                                                <input type="text" class="form-control" id="t_barcode" name="t_barcode" maxlength="100" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="t_name">ชื่อสินค้า</label>
                                                <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="t_name" name="t_name" maxlength="100">
                                            </div>
                                            <div class="form-group">
                                                <label for="t_model">รุ่นสินค้า</label>
                                                <input type="text" class="form-control" id="t_model" name="t_model" maxlength="100">
                                            </div>
                                            <div class="form-group">
                                                <label for="t_num">จำนวน</label> 
                                                <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="t_num" name="t_num" maxlength="10" onkeypress="CheckNum()">
                                            </div>
                                            <div class="form-group">
                                                <label for="t_price">ราคาต่อหน่วย</label>
                                                <input type="text" class="form-control" id="t_price" name="t_price" maxlength="11" onkeypress="CheckNum()">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">เพิ่มสินค้า</button>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    
                                    <!-- END Basic Elements -->
                
                        
                                    {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- END Your Block -->


                    <!-- Your Block -->
                    <div class="block block-rounded block-bordered">
                            <div class="block-content">
                                
                                    <!-- Basic Elements -->
                                    <h2 class="content-heading pt-0">ผู้ขายสินค้า</h2>
                                    <div class="row push">
                                        <div class="col-lg-12 col-xl-12">

                                        {!! Form::open(array('url'=>'order', 'OnSubmit'=>'return fncSubmit_create();', 'name'=>'form', 'role'=>'form')) !!}

                                        {{ csrf_field() }}
                                        <input type="hidden" name="ck" value="save_order">

                                            <div class="form-group">
                                                <label for="example-select">ผู้ขายสินค้า</label>
                                                {!! Form::select('s_sup', $supp, null, ['class'=>'form-control', 'placeholder'=>'เลือกผู้ขายสินค้า']); !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="example-select">ภาษีมูลค่าเพิ่ม</label>
                                                <span class="text-danger">*</span></label>
                                                <select class="form-control" id="s_vat" name="s_vat">
                                                    <option value="">เลือกรูปแบบภาษี</option>
                                                    <option value="1">Vat นอก (แยกภาษี)</option>
                                                    <option value="2">Vat ใน (รวมภาษี)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="t_etc">หมายเหตุ</label>
                                                <textarea class="form-control" id="t_etc" name="t_etc" rows="4" maxlength="200"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">บันทึก / ออกใบสั่งซื้อ</button>
                                            </div>
                                            
                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                    
                                    
                                    <!-- END Basic Elements -->
                
                            </div>
                        </div>
                        <!-- END Your Block -->

            </div>

            <div class="col-lg-8 col-xl-8">


                <!-- Small Table -->
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">รายการสินค้าสั่งซื้อ</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <a href="{{ url('/order/del_all/0') }}" onclick="return confirm('ยืนยันยกเลิกการสั่งซื้อทั้งหมด' )">
                                    <button type="button" class="btn btn-danger">ยกเลิกการสั่งซื้อ</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%;">#</th>
                                    <th class="text-center" style="width: 25%;">รหัสสินค้า</th>
                                    <th class="text-center" style="width: 35%;">ชื่อสินค้า</th>
                                    <th class="text-center" style="width: 10%;">จำนวน</th>
                                    <th class="text-center" style="width: 15%;">ราคา/ชิ้น</th>
                                    <th class="text-center" style="width: 10%;">ยกเลิก</th>
                                </tr>
                            </thead>
                            <tbody>

                                <? $i = '1'; ?>
                                @foreach($data as $data)

                                <tr>
                                    <th class="text-center">{{ $i++ }}</th>
                                    <td class="text-left">{{ $data->od_no }}</td>
                                    <td class="text-left">{{ $data->od_name }} 
                                        <? if($data->od_model){?> ({{ $data->od_model }}) <? }?> </td>
                                    <td class="text-center">{{ $data->od_num }}</td>
                                    <td class="text-center">{{ $data->od_price}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                                <a href="{{ url('/order/del/'.$data->od_id) }}"><button type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </button></a>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                                

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Small Table -->


            </div>
        </div>

    </div>
    <!-- END Page Content -->
@endsection

@section('css_before')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('js_after')

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

    <script src="{{ URL::asset('assets/js/dashmix.core.min.js') }}"></script>
    
    <script src="{{ URL::asset('assets/js/dashmix.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ URL::asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ URL::asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>

@endsection


@section('js')

<script src="{{ asset('js/order/order.js') }}"></script>

@endsection