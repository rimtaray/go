@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">หมวดหมู่กระเป๋าเงิน</h1>
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
                                <h2 class="content-heading pt-0">เพิ่มหมวดหมู่กระเป๋าเงิน</h2>
                                <div class="row push">
                                    <div class="col-lg-12 col-xl-12">
                            {!! Form::open(array('url'=>'walletcat')) !!}

                            {{ csrf_field() }}
                                        <div class="form-group">
                                            {!! Form::label('t_name','ชื่อหมวดหมู่'); !!}
                                            {!! Form::text('t_name',null, ['class'=>'form-control','placeholder'=>'ระบุชื่อหมวดหมู่']); !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('s_type','ประเภทหมวดหมู่'); !!}
                                            {!! Form::select('s_type', ['' => '- เลือก -'] +$wcat,'',array('class'=>'form-control','id'=>'ctype'));!!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('s_cat','หมวดหมู่หลัก'); !!}
                                            <select name="s_cat" id="s_cat" class="form-control"></select>
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
                    <!-- END Your Block -->

            </div>

            <div class="col-lg-8 col-xl-8">

            <!-- Dynamic Table Full -->
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">รายชื่อหมวดหมู่</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">#</th>
                        <th class="text-center" style="width: 20%;">ประเภท</th>
                        <th class="text-center" style="width: 30%;">ชื่อหมวดหมู่</th>
                        <th class="text-center" style="width: 20%;">หมวดหมู่หลัก</th>
                        <th class="text-center" style="width: 10%;">สถานะ</th>
                        <th class="text-center" style="width: 10%;">แก้ไข</th>
                    </tr>
                </thead>
                            <tbody>

                                <?
                                $i = '1'; 
                                $txt_type = collect(['1'=>'รายได้', '2'=>'ค่าใช้จ่าย']); 
                                $txt_status = collect(['1'=>'ใช้งาน', '2'=>'ยกเลิก']);
                                ?>


                                @foreach($walletcat as $w_cat)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-left">{{ $txt_type->get($w_cat->wc_type) }}</td>
                                    <td class="text-left">{{ $w_cat->wc_name }}</td>
                                    <td class="text-left">{{ wallet_name($w_cat->wc_cat) }}</td>
                                    <td class="text-left">{{ $txt_status->get($w_cat->wc_status) }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('/walletcat/'.$w_cat->wc_id.'/edit') }}">
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-wrench"></i> แก้ไข
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


    <script type="text/javascript">
        $('#ctype').change(function(){
            var typeID = $(this).val();    
            if(typeID){
                $.ajax({
                    type:"GET",
                    url:"{{url('api/get-wcat-list')}}?type_id="+typeID,
                    success:function(res){               
                        if(res){
                            $("#s_cat").empty();
                            $("#s_cat").append('<option value="0">ตั้งเป็นหมวดหมู่หลัก</option>');
                            $.each(res,function(key,value)
                            {
                                $("#s_cat").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }else{
                            $("#s_cat").empty();
                        }
                    }
                });
            }else{
                $("#s_cat").empty();
            }
        });
    </script>



@endsection

    