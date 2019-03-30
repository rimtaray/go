@extends('layouts.user')

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





 <!-- Page Content -->
 <div class="content content-full content-boxed">
    <!-- Latest Friends -->
    <h2 class="content-heading">
        <i class="si si-users mr-1"></i> ข้อมูลส่วนตัว
    </h2>
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="block block-rounded text-center">
                <div class="block-content block-content-full bg-image" style="background-image: url('assets/media/photos/photo4.jpg');">
                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar14.jpg" alt="">
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <div class="font-w600">{{ $data->u_name }}</div>
                    <div class="font-size-sm text-muted">{{ $data->u_email }}</div>
                </div>
                <div class="block-content block-content-full">
                    <a class="btn btn-sm btn-light" href="#modalForm" data-toggle="modal"
                                   data-href="{{ url('employee/myaccount/'.$data->u_id) }}">
                        <i class="fa fa-user-circle text-muted mr-1"></i> แก้ไขข้อมูล
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- END Latest Friends -->

    
</div>
<!-- END Page Content -->



    <div class="loading">
        <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i><br/>
        <span>Loading</span>
    </div>





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


@endsection