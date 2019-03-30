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
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" 
aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="modal_content"></div>
    </div>
</div>
<!-- END Fade In Block Modal -->


    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">รายการขายสินค้า</h1>
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
            <h3 class="block-title">รายการขายสินค้า</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 20%;">วัน/เวลา</th>
                        <th class="text-center" style="width: 20%;">เลขที่รายการ</th>
                        <th class="text-center" style="width: 30%;">ผู้ทำรายการ</th>
                        <th class="text-center" style="width: 15%;">สถานะ</th>
                        <th class="text-center" style="width: 15%;">ยกเลิก</th>
                    </tr>
                </thead>
                <tbody>

                    <? $txt_sta = array('ยกเลิก','ปกติ'); ?>

                    @foreach($bill as $bill)

                    <tr>
                        <td class="text-center">{{ $bill->created_at }}</td>
                        <td class="text-center"><a href="#modalForm" data-toggle="modal" data-href="{{ url('list/sale_detail/'.$bill->sb_id) }}" style="color:dodgerblue" >{{ $bill->sb_no }}</a></td>
                        <td class="text-left">{{ $bill->u_name }}</td>
                        <td class="text-center">{{ $txt_sta[$bill->sb_status] }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ url('/list/cancel_salelist/'.$bill->sb_id) }}" onclick="return confirm('ยืนยันการยกเลิกรายการขายที่ {{ $bill->sb_no }}' )">
                                <button type="button" class="btn btn-sm btn-danger" <? if($bill->sb_status == '0'){ echo ' disabled'; } ?> >
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

    <script language="javascript">
            
    // function confirmFunction(id,data){
    //         swal({
    //           title: "แน่ใจหรือไม่ ?",
    //           text: "คุณต้องการยกเลิกรายการขายเลขที่ " + data,
    //           type: "warning",
    //           showCancelButton: true,
    //           confirmButtonClass: 'btn-danger',
    //           confirmButtonText: 'ใช่, ต้องการยกเลิก!',
    //           cancelButtonText: "ไม่, ไม่ยกเลิก!",
    //           closeOnConfirm: false,
    //           //closeOnCancel: false
    //         },
    //         function(){
    //             window.location='barcode_save.php?act=del&baid=' + id + '&p=barcode_a7' ;              
    //         });
    // };
    
    </script>

@endsection


@section('js')
    <script src="{{asset('js/ajax-crud-modal-form.js')}}"></script>
@endsection