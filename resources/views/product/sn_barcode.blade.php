@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">เพิ่มสินค้าเข้า Serial Number</h1>
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
        <div class="col-lg-6 col-xl-6">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">นำเข้า : {{ $pname }}</h2>
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">

                            {{ Form::open(array('url'=>'prohave_barcode')) }}

                            {{ csrf_field() }}
                            {{ Form::hidden('h_pid', $pid) }}

                            <div class="form-group">
                                {!! Form::label('t_barcode','รหัสสินค้า / บาร์โค้ด'); !!}
                                {!! Form::text('t_barcode',null, ['class'=>'form-control','autofocus']); !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('เพิ่ม', ['class'=>'btn btn-primary']); !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                    
                    
                    <!-- END Basic Elements -->

            </div>    
        </div>
        </div>

        <div class="col-lg-6 col-xl-6">
            
            
            <!-- Dynamic Table Full -->
            <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">รายการที่เพิ่มใหม่</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%;">#</th>
                                    <th class="text-center" style="width: 70%;">รหัส / บาร์โค้ด</th>
                                    <th class="text-center" style="width: 20%;">ยกเลิก</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?
                                $i = '1'; 
                                ?>


                                @foreach($data as $data)
                                <tr>
                                    <th class="text-center">{{ $i++ }}</th>
                                    <td class="text-left">{{ $data->pb_barcode}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('') }}">
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fa fa-times"></i> ยกเลิก
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


        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

@endsection