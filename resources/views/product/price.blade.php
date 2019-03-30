@extends('layouts.temp')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">เพิ่มสินค้าเข้า</h1>
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
                <form action="" method="post" enctype="multipart/form-data" onsubmit="return false;">
                    <!-- Basic Elements -->
                    <h2 class="content-heading pt-0">ราคาสินค้า : ...</h2>
                    <div class="row push">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="example-select">ระดับราคาที่ยังไม่กำหนด</label>
                                <select class="form-control" id="example-select" name="example-select">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="t_amount">ราคา</label>
                                <input type="text" class="form-control" id="t_amount" name="t_name">
                            </div>
                            <div class="form-group">
                                <a href="{{ url('product/price') }}"><button type="button" class="btn btn-primary">บันทึก</button></a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- END Basic Elements -->

                </form>
            </div>
        </div>
        <!-- END Your Block -->

    </div>


    <div class="col-lg-6 col-xl-6">

            <!-- Dynamic Table Full -->
            <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">รายการระดับราคา</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%;">#</th>
                                    <th class="text-center" style="width: 30%;">ชื่อระดับราคา</th>
                                    <th class="text-center" style="width: 20%;">ราคา</th>
                                    <th class="text-center" style="width: 20%;">สถานะ</th>
                                    <th class="text-center" style="width: 20%;">ยกเลิก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-center">1</th>
                                    <td class="text-left">ขายส่ง</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">ปกติ</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i> ยกเลิก
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center">2</th>
                                    <td class="text-left">ขายปลีก</td>
                                    <td class="text-right">300</td>
                                    <td class="text-center">ปกติ</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i> ยกเลิก
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center">3</th>
                                    <td class="text-left">สมาชิกระดับ 1</td>
                                    <td class="text-right">250</td>
                                    <td class="text-center">ปกติ</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i> ยกเลิก
                                            </button>
                                        </div>
                                    </td>
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

@section('js_after')

    <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
    <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script>

@endsection