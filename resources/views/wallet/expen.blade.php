@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">บันทึกการเงิน</h1>
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

                @if(Session::has('error'))	
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                @endif
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">ค่าใช้จ่าย</h2>
                    <div class="row push">

                        <div class="col-12">
    
                        {!! Form::open(array('url'=>'wallet_expen')) !!}

                        {{ csrf_field() }}
                            <div class="form-group">
                                {!! Form::label('s_cat','ประเภทหมวดหมู่'); !!}
                                {!! Form::select('s_cat', $scat, null, ['class'=>'form-control', 'placeholder'=>'ระบุหมวดหมู่ค่าใช้จ่าย']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('t_date','วันที่ทำรายการ'); !!}
                                <input type="text" class="js-datepicker form-control" id="t_date" name="t_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="form-group">
                                {!! Form::label('t_name','ชื่อรายการ'); !!}
                                {!! Form::text('t_name',null, ['class'=>'form-control','placeholder'=>'ระบุชื่อรายการ']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('t_amount','จำนวนเงิน'); !!}
                                {!! Form::text('t_amount',null, ['class'=>'form-control','placeholder'=>'ระบุจำนวนเงิน']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('t_etc','หมายเหตุ'); !!}
                                {!! Form::textarea('t_etc',null,['class'=>'form-control', 'rows' => 4, 'cols' => 40]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']); !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                        
                    </div>
                    
                    
                    <!-- END Basic Elements -->

            </div>
        </div>
        <!-- END Your Block -->

        </div>



        <div class="col-lg-8 col-xl-8">

            <!-- Dynamic Table Full -->
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">

                        <h3 class="block-title">รายการค่าใช้จ่าย เดือน <?=$txt_date . ' ' . date('Y'); ?></h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">#</th>
                        <th class="text-center" style="width: 20%;">วันที่</th>
                        <th class="text-center" style="width: 20%;">หมวดหมู่</th>
                        <th class="text-center" style="width: 30%;">ชื่อรายการ</th>
                        <th class="text-center" style="width: 10%;">จำนวน</th>
                        <th class="text-center" style="width: 10%;">สถานะ</th>
                        <th class="text-center" style="width: 5%;"></th>
                    </tr>
                </thead>
                            <tbody>

                                    <?
                                    $i = '1'; 
                                    $txt_status = collect(['1'=>'ปกติ', '2'=>'ยกเลิก']);
                                    ?>


                                    @foreach($wallet as $wallet)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="text-left">{{ $wallet->w_dt }}</td>
                                        <td class="text-left">{{ $wallet->wc_id }}</td>
                                        <td class="text-left">{{ $wallet->w_name }}</td>
                                        <td class="text-left">{{ $wallet->w_amount }}</td>
                                        <td class="text-left">{{ $txt_status->get($wallet->w_status) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('/wallet_expen/'.$wallet->w_id.'/edit') }}">
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-wrench"></i>
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