@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">ข้อมูลสินค้าในสต๊อก</h1>
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
        <h3 class="block-title">รายการสินค้าในสต๊อก Non s/n</h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%;">#</th>
                    <th class="text-center" style="width: 15%;">รหัสสินค้า</th>
                    <th class="text-center" style="width: 40%;">ชื่อสินค้า</th>
                    <th class="text-center" style="width: 10%;">จำนวนในระบบ</th>
                    <th class="text-center" style="width: 10%;">จำนวนเช็ค</th>
                    <th class="text-center" style="width: 20%;">ผู้รายงาน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">1805260002</td>
                    <td class="text-left">HAPPY TG UC SS J710</td>
                    <td class="text-center">2018-09-12</td>
                    <th class="text-center">10</th>
                    <td class="text-center">0</td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-center">1805260002</td>
                    <td class="text-left">HAPPY TG UC SS J710</td>
                    <td class="text-center">2018-09-12</td>
                    <th class="text-center">10</th>
                    <td class="text-center">0</td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-center">1805260002</td>
                    <td class="text-left">HAPPY TG UC SS J710</td>
                    <td class="text-center">2018-09-12</td>
                    <th class="text-center">10</th>
                    <td class="text-center">0</td>
                </tr>
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
        <h3 class="block-title">รายการสินค้าในสต๊อก s/n</h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%;">#</th>
                    <th class="text-center" style="width: 35%;">ชื่อสินค้า</th>
                    <th class="text-center" style="width: 20%;">หมวดหมู่</th>
                    <th class="text-center" style="width: 10%;">จำนวนในระบบ</th>
                    <th class="text-center" style="width: 10%;">จำนวนเช็ค</th>
                    <th class="text-center" style="width: 20%;">ผู้รายงาน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">1805260002</td>
                    <td class="text-left">HAPPY TG UC SS J710</td>
                    <td class="text-center">2018-09-12</td>
                    <th class="text-center">10</th>
                    <td class="text-center">0</td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-center">1805260002</td>
                    <td class="text-left">HAPPY TG UC SS J710</td>
                    <td class="text-center">2018-09-12</td>
                    <th class="text-center">10</th>
                    <td class="text-center">0</td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-center">1805260002</td>
                    <td class="text-left">HAPPY TG UC SS J710</td>
                    <td class="text-center">2018-09-12</td>
                    <th class="text-center">10</th>
                    <td class="text-center">0</td>
                </tr>
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