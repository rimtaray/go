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
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">หมวดหมู่สินค้า</h1>
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

            <!-- Dynamic Table Full -->
                <div class="block block-rounded block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">รายชื่อหมวดหมู่</h3>
                        <div class="block-options">
                            <a href="#modalForm" data-toggle="modal" data-href="{{ url('productcat/create') }}" ><button type="button" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> เพิ่มหมวดหมู่สินค้า
                            </button></a>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->


                        <table class="table table-bordered table-hover table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%;">#</th>
                                    <th class="text-center" style="width: 40%;">ชื่อหมวดหมู่สินค้า</th>
                                    <th class="text-center" style="width: 30%;">หมวดหมู่หลัก</th>
                                    <th class="text-center" style="width: 10%;">สถานะ</th>
                                    <th class="text-center" style="width: 10%;">แก้ไข</th>
                                </tr>
                            </thead>

                            <tbody>                                    
                                <?
                                $i = '1'; 
                                $txt_status = collect(['1'=>'ใช้งาน', '2'=>'ยกเลิก']);
                                ?>
                                
                                @foreach($cat as $cat)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-left">{{ $cat->cat_name }}</td>
                                    <td class="text-left">{{ cat_name($cat->cat_type) }}</td>
                                    <td class="text-left">{{ $txt_status->get($cat->cat_status) }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#modalForm" data-toggle="modal"
                                                data-href="{{ url('/productcat/'.$cat->cat_id.'/edit') }}">
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

@endsection


@section('js')
    <script src="{{asset('js/ajax-crud-modal-form.js')}}"></script>
    <script src="https://use.fontawesome.com/2c7a93b259.js"></script>


    <script language="javascript">

        function fncSubmit_add()
        {
            if(document.frm_add.t_name.value == "")
            {
                    document.frm_add.t_name.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุชื่อหมวดหมู่");
                    return false;
            }
    
            document.frm_add.submit();
        }

        function fncSubmit_edit()
        {
            if(document.form2.t_name.value == "")
            {
                    document.form2.t_name.focus();
                    swal("ข้อมูลยังไม่ครบ!", "โปรดระบุชื่อหมวดหมู่");
                    return false;
            }
    
            document.form2.submit();
        }
        
    </script>
@endsection


@section('script')


    <script type="text/javascript">

        
        // $('document').ready(function(){
        //     $.get("{{ URL::to('cat_product/read-data') }}", function(data){
        //         //console.log(data);
        //         $('#cat-info').empty().html(data)                
        //     })

        // })


        // $('body').on('submit','#frm_add', function(e){
        //     e.preventDefault();
        //     let form = $(this);
        //     let data = form.serialize();
        //     let url = form.attr('action');
        //     $.post(url, data)
        // })

        // $('body').on('submit','#frm_add', function(e){
        //     e.preventDefault();
        //     let data = $(this).attr('action');
        //     //let data = $('#frm_add').serialize();
        //     console.log(data);
        // });

        // insert
        // $('body').on('submit','#frm_add', function(e){
        //     e.preventDefault();
        //     var data = $('#frm_add').serialize();
        //     var url = $(this).attr('action');
        //     var post = $(this).attr('method');
            
        //     $.ajax({
        //         tpye : post,
        //         url : url,
        //         data : data,
        //         dataTy : 'json',
        //         success:function(data)
        //         {
        //             console.log(data)
        //         }
        //     })
            
        // })

    </script>

@endsection