@extends('layouts.temp')

@section('css')
    <style>
        .loading {
            background: lightgrey;
            padding: 15px;
            position: fixed;
            border-radius: 4px;
            left: 50%;
            top: 50%;
            text-align: center;
            margin: -40px 0 0 -50px;
            z-index: 2000;
            display: none;
        }

        a, a:hover {
            color: white;
        }

        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')



<!-- Fade In Block Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="modal_content"></div>
    </div>
</div>
<!-- END Fade In Block Modal -->


    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">พนักงาน</h1>
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
                    


<!-- Dynamic Table Full -->
<div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
                        <h3 class="block-title">รายชื่อพนักงาน</h3>
                        <div class="block-options">
                            <a href="#modalForm" data-toggle="modal" data-href="{{ url('employee/create') }}" ><button type="button" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> เพิ่มรายชื่อ
                            </button></a>
                        </div>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">#</th>
                        <th class="text-center" style="width: 25%;">ชื่อ</th>
                        <th class="text-center" style="width: 15%;">ตำแหน่ง</th>
                        <th class="text-center" style="width: 15%;">เบอร์โทรศัพท์</th>
                        <th class="text-center" style="width: 10%;">สถานะ</th>
                        <th class="text-center" style="width: 10%;">สิทธิ์ใช้งาน</th>
                        <th class="text-center" style="width: 10%;">สิทธิ์เข้าระบบ</th>
                        <th class="text-center" style="width: 10%;">แก้ไข</th>
                    </tr>
                </thead>
                <tbody>

                    <?
                    $i = '1'; 
                    //$txt_type = collect(['1'=>'รายได้', '2'=>'ค่าใช้จ่าย']); 
                    $txt_status = collect(['1'=>'ใช้งาน', '2'=>'ยกเลิก']);
                    ?>

                    @foreach($data as $data)

                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-left">{{ $data->u_name }}</td>
                        <td class="text-left">{{ $data->ud_position }}</td>
                        <td class="text-left">{{ $data->ud_phone }}</td>
                        <td class="text-center">{{ $txt_status[$data->ud_status] }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                            <? if($data->ud_level < '5'){ ?>
                                <a href="#modalForm" data-toggle="modal"
                                   data-href="{{ url('employee/right/'.$data->ud_id) }}">
                                <button type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-check"></i> สิทธิ์ใช้งาน
                                </button>
                                </a>
                            <? } ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                            <? if($data->ud_level < '5'){ ?>
                                <a href="#modalForm" data-toggle="modal"
                                   data-href="{{ url('employee/login_dt/'.$data->ud_id) }}">
                                <button type="button" class="btn btn-sm btn-success" >
                                    <i class="fa fa-power-off"></i> วัน/เวลา
                                </button>
                                </a>
                            <? } ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#modalForm" data-toggle="modal"
                                   data-href="{{ url('employee/edit/'.$data->ud_id) }}">
                                <button type="button" class="btn btn-sm btn-warning">
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






<!-- Dynamic Table Full -->
<div class="block block-rounded block-bordered">
    <div class="block-header block-header-default">
                    <h3 class="block-title">รายการเชิญ</h3>
                    <div class="block-options">
                        <a href="#modalForm" data-toggle="modal" data-href="{{ url('invite/create') }}" ><button type="button" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i> เชิญ
                        </button></a>
                    </div>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%;">#</th>
                    <th class="text-center" style="width: 30%;">email</th>
                    <th class="text-center" style="width: 20%;">วันที่เชิญ</th>
                    <th class="text-center" style="width: 30%;">สถานะ</th>
                    <th class="text-center" style="width: 15%;">ยกเลิก</th>
                </tr>
            </thead>
            <tbody>

                <?
                $i = '1'; 
                //$txt_type = collect(['1'=>'รายได้', '2'=>'ค่าใช้จ่าย']); 
                $txt_status = collect(['0'=>'ยกเลิกการเชิญ','1'=>'กำลังเชิญ', '2'=>'รับการเชิญแล้ว','3'=>'ปฏิเสธการรับเชิญ','4'=>'หมดระยะเวลาการเชิญ']);
                ?>

                @foreach($invite as $invite)

                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-left">{{ $invite->in_email }}</td>
                    <td class="text-left">{{ $invite->created_at }}</td>
                    <td class="text-center">{{ $txt_status[$invite->in_status] }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{ url('invite/cancel/'.$invite->in_id) }}">
                            <button type="button" class="btn btn-sm btn-danger" <? if($invite->in_status != '1'){ echo ' disabled';}?>>
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
                <!-- END Page Content -->



    <div class="loading">
        <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i><br/>
        <span>Loading</span>
    </div>




@endsection

@section('css_before')

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
<script src="{{ URL::asset('assets/js/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins/simplemde/simplemde.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ URL::asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
<script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

<script>jQuery(function(){ Dashmix.helpers(['summernote', 'simplemde', 'ckeditor']); });</script>



@endsection


@section('js')
    <script src="{{asset('js/ajax-crud-modal-form.js')}}"></script>
    <script src="https://use.fontawesome.com/2c7a93b259.js"></script>

    <script language="javascript">
        function CheckNum(){
        if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 13){
            swal("ข้อมูลไม่ถูกต้อง!", "กรอกเฉพาะตัวเลขเท่านั้น!");
            event.returnValue = false;
            }
        }
    </script>

<script>
jQuery(function()
{ 
    Dashmix.helpers(['masked-inputs']); 
});
</script>

@endsection