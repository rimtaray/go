@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">เพิ่มสินค้าเข้า serial number</h1>
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

                @if(Session::has('error'))	
                    <!-- Your Block -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
    
                                <div class="alert alert-danger">
                                    {{Session::get('error')}}
                                </div>
                            
                        </div>
                    </div>
                @endif
                    <!-- END Your Block -->

                
                    <!-- Block Tabs Default Style -->
                    <div class="block block-rounded block-bordered">
                        <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="#btabs-static-home">ข้อมูลสินค้า s/n</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#btabs-static-right">เพิ่มรอบนำเข้าสินค้า</a>
                            </li>
                        </ul>
                        <div class="block-content tab-content">
                            <div class="tab-pane" id="btabs-static-home" role="tabpanel">
                                
                                <div class="row push">
                                    <div class="col-12">
   
                                        {!! Form::open(array('url'=>'pro_add','files'=>true)) !!}

                                        <input name="ck" type="hidden" value="update">
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                {!! Form::label('s_cat','หมวดหมู่สินค้า'); !!}
                                                {!! Form::select('s_cat', $scat->pluck('cat_name','cat_id'), $sproduct->cat_id, ['class'=>'form-control', 'placeholder'=>'- เลือกหมวดหมู่ -']); !!}
                                            </div>
        
                                            <div class="form-group">
                                                    {!! Form::label('t_name','ชื่อสินค้า'); !!}
                                                    {!! Form::text('t_name',$sproduct->p_name, ['class'=>'form-control','placeholder'=>'ระบุชื่อสินค้า']); !!}
                                            </div>
        
                                            <div class="form-group">
                                                    {!! Form::label('t_low','แจ้งเตือนจำนวนขั้นต่ำ'); !!}
                                                    {!! Form::text('t_low',$sproduct->p_low, ['class'=>'form-control','placeholder'=>'ระบุแจ้งเตือนจำนวนขั้นต่ำ']); !!}
                                            </div>
        
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">เลือกภาพสินค้า</label>
                                            </div>
        
                                            <div class="form-group"></div>
        
                                            <div class="form-group">
                                                    {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']); !!}
                                            </div>
        
                                        {!! Form::close() !!}
                                    
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane active" id="btabs-static-right" role="tabpanel">
                                {!! Form::open(array('url'=>'pro_add')) !!}

                                {{ csrf_field() }}
                                <input name="ck" type="hidden" value="have_sn">
                                <? if($pid){ ?>{{ Form::hidden('h_pid', $pid) }}<? } ?>

                                            <div class="form-group">
                                                {!! Form::label('t_cost','ราคาทุนต่อหน่วย'); !!}
                                                <input class="form-control" name="t_cost" type="text" placeholder="ระบุราคาทุน เช่น 200" autofocus>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('t_price','ราคาขายต่อหน่วย'); !!}
                                                <input class="form-control" name="t_price" type="text" placeholder="ระบุราคาขาย เช่น 300">
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('t_date','วันหมดอายุ'); !!}
                                                <input type="text" class="js-datepicker form-control" id="t_date" name="t_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('t_alert','แจ้งเตือนก่อนหมดอายุ(วัน)'); !!}
                                                <input class="form-control" name="t_alert" type="text" placeholder="(ถ้ามี) ระบุจำนวนวัน เช่น 5">
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('t_claim','ระยะเวลารับประกัน(วัน)'); !!}
                                                <input class="form-control" name="t_claim" type="text" placeholder="(ถ้ามี) ระบุจำนวนวัน เช่น 365">
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('s_sup','ผู้ผลิต'); !!}
                                                {!! Form::select('s_sup', $ssup, 'null', ['class'=>'form-control', 'placeholder'=>'- เลือกผู้ผลิต -']); !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::submit('เพิ่ม', ['class'=>'btn btn-primary']); !!}
                                            </div>

                                        {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!-- END Block Tabs Default Style -->





            </div>


            <div class="col-lg-8 col-xl-8">

                    <?
                    $txt_status = collect(['0'=>'ยกเลิก','1'=>'ปกติ', '2'=>'รอนำเข้า']);
                    ?>

                    <!-- Dynamic Table Full -->
                    <div class="block block-rounded block-bordered">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">รอบนำเข้าสินค้า s/n : {{ $sproduct->p_name }}</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                                <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 20%;">นำเข้า</th>
                                            <th class="text-center" style="width: 10%;">จำนวน</th>
                                            <th class="text-center" style="width: 15%;">ราคาทุน</th>
                                            <th class="text-center" style="width: 15%;">ราคาขาย</th>
                                            <th class="text-center" style="width: 20%;">ผู้นำเข้า</th>
                                            <th class="text-center" style="width: 10%;">สถานะ</th>
                                            <th class="text-center" style="width: 10%;"><small>แก้ไข/เพิ่ม</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    
                        
                                            @foreach($import as $import)
                    
                                        <tr>
                                            <td class="text-center"><small>{{ $import->created_at }}</small></td>
                                            <? $pdnum = App\TbProductSn::where('pd_id','=',$import->pd_id)
                                            ->where('ps_status','1')
                                            ->count(); ?>
                                            <td class="text-center">{{ $pdnum }}</td>
                                            <td class="text-right">{{ $import->pd_cost}}</td>
                                            <td class="text-right">{{ $import->pd_price }}</td>
                                            <th class="text-left">{{ $import->u_name }}</th>
                                            <th class="text-left">{{ $txt_status[$import->pd_status] }}</th>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ url('/pro_cost/editimport_sn/'.$import->pd_id) }}">
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" title="แก้ไข">
                                                        <i class="fa fa-wrench"></i> 
                                                    </button>
                                                    </a>

                                                    <a href="{{ url('/pro_cost/add_serial/'.$import->pd_id) }}">
                                                    <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" title="เพิ่ม">
                                                        <i class="fa fa-plus"></i> 
                                                    </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            <!-- END Dynamic Table Full -->

            </div>



        </div>

                
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

@endsection