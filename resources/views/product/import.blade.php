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
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">รอบสินค้าเข้า</h1>
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
            


            <div class="col-lg-12 col-xl-12">

            <?
            $txt_status = collect(['0'=>'ยกเลิก','1'=>'ปกติ', '2'=>'รอนำเข้า']);
            ?>

            <!-- Dynamic Table Full -->
            <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">รอบนำเข้าสินค้า : {{ $sproduct->p_name }}</h3>
                        <div class="block-options">
                            <a href="{{ url('product/nonsn') }}">
                                <button type="button" class="btn btn-hero-sm btn-hero-secondary">
                                    <i class="fa fa-reply mr-1"></i> กลับ
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 25%;">นำเข้า</th>
                                    <th class="text-center" style="width: 10%;">จำนวน</th>
                                    <th class="text-center" style="width: 20%;">ราคาทุน</th>
                                    <th class="text-center" style="width: 25%;">ผู้นำเข้า</th>
                                    <th class="text-center" style="width: 10%;">สถานะ</th>
                                    <th class="text-center" style="width: 10%;">แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
            
                
                                    @foreach($import as $import)
            
                                <tr>
                                    <td class="text-center"><small>{{ $import->created_at }}</small></td>
                                    <td class="text-center">{{ $import->ps_num }}</td>
                                    <td class="text-right">{{ $import->pd_cost}}</td>
                                    <td class="text-left">{{ $import->u_name }}</td>
                                    <td class="text-center">{{ $txt_status[$import->pd_status] }}</td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="#modalForm" data-toggle="modal"
                                            data-href="{{ url('/product/editimport/'.$import->pd_id) }}">
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

            </div>



        </div>

                
    </div>
    <!-- END Page Content -->


    <div class="loading">
            <i class="fa fa-sync fa-spin fa-2x"></i><br/>
            <span>กำลังโหลด</span>
        </div>


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
    <script src="{{asset('js/ajax-crud-modal-form.js')}}"></script>

    <script language="javascript">

        function fncSubmit_add()
        {        
            if(document.form1.t_num.value == "")
            {
                    document.form1.t_num.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุจำนวนอย่างน้อย 1");
                    return false;
            }
            if(document.form1.t_price.value == "")
            {
                    document.form1.t_price.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุราคาขายต่อหน่วย");
                    return false;
            }
    
            document.form1.submit();
        }
        

        function CheckNum(){
        if ((event.keyCode < 48 || event.keyCode > 57) && event.keyCode != 13){
            swal("ข้อมูลไม่ถูกต้อง!", "กรอกเฉพาะตัวเลขเท่านั้น!");
            event.returnValue = false;
            }
        }
    </script>
@endsection