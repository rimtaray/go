@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ประกันสินค้า</h1>
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
                            <form action="" method="post" enctype="multipart/form-data" onsubmit="return false;">
                                <!-- Basic Elements -->
                                <h2 class="content-heading pt-0">ตรวจสอบประกัน</h2>
                                <div class="row push">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="t_name">บาร์โค้ด</label>
                                            <input type="text" class="form-control" id="t_name" name="t_name">
                                        </div>
                                        <div class="form-group">
                                            <a href="{{ url('') }}"><button type="button" class="btn btn-primary">ตรวจสอบ</button></a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <!-- END Basic Elements -->
            
                            </form>
                        </div>
                    </div>
                    <!-- END Your Block -->

            </div>

            <div class="col-lg-8 col-xl-8">




                    <!-- Small Table -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">รายการเคลม</h3>
                        </div>
                        <div class="block-content">

                            <div class="form-group">
                                    <label for="t_name">ชื่อผู้เคลมสินค้า</label>
                                    <input type="text" class="form-control" id="t_name" name="t_name">
                                </div>
                            <table class="table table-striped table-hover table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">#</th>
                                        <th class="text-center" style="width: 15%;">รหัสสินค้า</th>
                                        <th class="text-center" style="width: 35%;">ชื่อสินค้า</th>
                                        <th class="text-center" style="width: 15%;">ค่าบริการ</th>
                                        <th class="text-center" style="width: 20%;">หมายเหตุ</th>
                                        <th class="text-center" style="width: 10%;">ยกเลิก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center" scope="row">1</th>
                                        <td class="text-left">123123123</td>
                                        <td class="text-left">Andrea Gardner</td>
                                        <td class="text-center">0.00</td>
                                        <td class="text-center">เปิดไม่ติด</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <a href="{{ url('') }}"><button type="button" class="btn btn-primary">ออกใบเคลมสินค้า</button></a>
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