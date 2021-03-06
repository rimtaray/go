@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">สินค้าต่ำกว่ากำหนด</h1>
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
            <div class="col-12">

 <!-- Dynamic Table Full -->
<div class="block block-rounded block-bordered">
    <div class="block-header block-header-default">
        <h3 class="block-title">รายการสินค้าคำกว่ากำหนด Non s/n</h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%;">#</th>
                    <th class="text-center" style="width: 30%;">ชื่อสินค้า</th>
                    <th class="text-center" style="width: 15%;">กำหนด</th>
                    <th class="text-center" style="width: 15%;">คงเหลือ</th>
                    <th class="text-center" style="width: 15%;">ซื้อเพิ่ม</th>
                    <th class="text-center" style="width: 20%;">เพิ่มในรายการซื้อ</th>
                </tr>
            </thead>
            <tbody>

                <? $i = '1'; ?>
                @foreach($data as $data)
                @if($data->p_low >= $data->psnum)

                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-left">{{ $data->p_name }}</td>
                    <td class="text-center">{{ $data->p_low }}</td>
                    <th class="text-center">{{ $data->psnum }}</th>
                    <td class="text-center">{{ $data->p_buy }}</td>
                    <td class="text-center">
    
                            {!! Form::open(array('url'=>'add_low')) !!}

                            {{ csrf_field() }}  
                            {{ Form::hidden('h_pid',$data->p_id) }}
                            {{ Form::hidden('ck','add_buy') }}

                            <div class="input-group">
                                <input type="text" class="form-control from-control-sm" id="t_buy" name="t_buy">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
        
                            {!! Form::close() !!}
                    </td>
                </tr>
                @endif
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
    <!-- END Dynamic Table Full -->

            </div>
        </div>


<div class="row">
    <div class="col-12">

 <!-- Dynamic Table Full -->
<div class="block block-rounded block-bordered">
    <div class="block-header block-header-default">
        <h3 class="block-title">รายการสินค้าต่ำกว่ากำหนด s/n </h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%;">#</th>
                    <th class="text-center" style="width: 30%;">ชื่อสินค้า</th>
                    <th class="text-center" style="width: 15%;">กำหนด</th>
                    <th class="text-center" style="width: 15%;">คงเหลือ</th>
                    <th class="text-center" style="width: 15%;">ซื้อเพิ่ม</th>
                    <th class="text-center" style="width: 20%;">เพิ่มในรายการซื้อ</th>
                </tr>
            </thead>
            <tbody>

                    <? $i = '1'; ?>
                    @foreach($data_sn as $data_sn)
                    @if($data_sn->p_low >= $data_sn->psnum)
    
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-left">{{ $data_sn->p_name }}</td>
                        <td class="text-center">{{ $data_sn->p_low }}</td>
                        <th class="text-center">{{ $data_sn->psnum }}</th>
                        <td class="text-center">{{ $data_sn->p_buy }}</td>
                        <td class="text-center">
    
                                {!! Form::open(array('url'=>'add_low')) !!}
    
                                {{ csrf_field() }}  
                                {{ Form::hidden('h_pid',$data_sn->p_id) }}
                                {{ Form::hidden('ck','add_buy') }}
    
                                <div class="input-group">
                                    <input type="text" class="form-control from-control-sm" id="t_buy" name="t_buy">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
            
                                {!! Form::close() !!}
                        </td>
                    </tr>
    
                    @endif
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