@extends('layouts.temp')

@section('content')

<!-- Page Content -->
<div class="content content-full">
    


    <!-- Domains -->
    <div class="d-flex justify-content-between align-items-center mt-6 mb-3">
        <h2 class="font-w300 mb-0">ร้านค้า</h2>
        
        <button type="button" class="btn btn-primary btn-sm btn-primary btn-rounded px-3" onclick="Dashmix.block('open', '#dm-add-domain');">
            <i class="fa fa-plus mr-1"></i> เพิ่มร้าน
        </button>
    </div>

    <div class="overflow-hidden">
        <div id="dm-add-domain" class="block block-rounded d-none bg-body-dark animated fadeIn">
            <div class="block-header bg-white-25">
                <h3 class="block-title">เพิ่มร้านใหม่</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option">
                        <i class="si si-question"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
    
                {!! Form::open(array('url'=>'user_manage')) !!}

                {{ csrf_field() }}  
                {{ Form::hidden('ck','add_new') }}
                
                    <div class="form-group row gutters-tiny mb-0 items-push">
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="t_name" name="t_name" placeholder="ชื่อร้าน">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fa fa-plus mr-1"></i> ลงทะเบียนร้านใหม่
                            </button>
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

    @foreach($data as $data)

    <div class="block block-rounded block-fx-pop mb-2 invisible" data-toggle="appear">
        <div class="block-content block-content-full border-left border-3x border-success">
            <div class="d-md-flex justify-content-md-between align-items-md-center">
                <div class="p-1 p-md-3">
                    <h3 class="h4 font-w700 mb-1">a</h3>
                    <p class="font-size-sm mb-2">
                        a
                    </p>
                    <p class="font-size-sm text-muted mb-0">
                        Register on a
                    </p>
                </div>
                <div class="p-1 p-md-3">
                    <a class="btn btn-sm btn-outline-primary btn-rounded px-3 mr-1 my-1" href="#">
                        <i class="fa fa-store mr-1"></i> เปิด
                    </a>
                    <a class="btn btn-sm btn-outline-info btn-rounded px-3 mr-1 my-1" href="#">
                        <i class="fa fa-edit mr-1"></i> ข้อมูลร้าน
                    </a>
                    <a class="btn btn-primary btn-sm" title="Edit" href="#modalForm" data-toggle="modal"
                       data-href="#">
                        Edit</a>
                    <a class="btn btn-sm btn-outline-success btn-rounded px-3 mr-1 my-1" href="#W">
                        <i class="fa fa-address-card mr-1"></i> พนักงาน
                    </a>
                    <a class="btn btn-sm btn-outline-danger btn-rounded px-3 my-1" onclick="ajaxDelete('{{url('laravel-crud-search-sort-ajax-modal-form/delete')}}/'+$('#delete_id').val(),$('#delete_token').val())" >
                        <i class="fa fa-times mr-1"></i> Delete
                    </a>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <!-- END Domains -->
</div>
<!-- END Page Content -->
@endsection