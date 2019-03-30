@extends('layouts.user')


@section('content')




        <!-- Fade In Block Modal -->
        <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="modal_content"></div>
            </div>
        </div>
        <!-- END Fade In Block Modal -->




<!-- Page Content -->
<div class="content content-full">
    


    <!-- Domains -->
    <div class="d-flex justify-content-between align-items-center mt-6 mb-3">
        <h2 class="font-w300 mb-0">My Shop</h2>
        
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
                    <h3 class="h4 font-w700 mb-1">{{ $data->m_name}}</h3>
                    <p class="font-size-sm mb-2">
                        {{ $data->m_address }}
                    </p>
                    <p class="font-size-sm text-muted mb-0">
                        Register on {{ $data->m_register_date }}
                    </p>
                </div>
                <div class="p-1 p-md-3">
                    <a class="btn btn-sm btn-outline-primary btn-rounded px-3 mr-1 my-1" href="{{ url('/user_manage/shop/'.$data->m_id) }}">
                        <i class="fa fa-home mr-1"></i> จัดการร้าน
                    </a>
                    <a href="#modalForm" data-toggle="modal"
                                   data-href="{{ url('store/'.$data->m_id.'/edit') }}" class="btn btn-sm btn-outline-info btn-rounded px-3 mr-1 my-1">
                        <i class="fa fa-edit mr-1"></i> ข้อมูลร้าน
                    </a>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <!-- END Domains -->
    

    <div class="d-flex justify-content-between align-items-center mt-6 mb-3">
        <h2 class="font-w300 mb-0">Other Shop</h2>
    </div>

    @foreach($data2 as $data)

    <div class="block block-rounded block-fx-pop mb-2 invisible" data-toggle="appear">
        <div class="block-content block-content-full border-left border-3x border-success">
            <div class="d-md-flex justify-content-md-between align-items-md-center">
                <div class="p-1 p-md-3">
                    <h3 class="h4 font-w700 mb-1">{{ $data->m_name}}</h3>
                    <p class="font-size-sm mb-2">
                        {{ $data->m_address }}
                    </p>
                </div>
                <div class="p-1 p-md-3">

                    <?
                    $day = ','.date('N').'|';
                    if(strrpos($data->ud_login, $day) == false)
                    {
                        echo 'อยู่นอกวันที่กำหนด';
                    }
                    else
                    {
                        $num = strrpos($data->ud_login, $day);
                        $start = substr($data->ud_login, $num+3, 5);
                        $stop = substr($data->ud_login, $num+9, 5);
                        
                        if((time() < strtotime($start)) || (time() > strtotime($stop)))
                        {
                            echo 'อยู่นอกเวลาที่กำหนด';
                        }
                        else
                        {   
                    ?>
                            <a class="btn btn-sm btn-outline-primary btn-rounded px-3 mr-1 my-1" href="{{ url('/user_manage/shop/'.$data->m_id) }}">
                                <i class="fa fa-home mr-1"></i> จัดการร้าน
                            </a>
                    <?
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <!-- END Domains -->
</div>
<!-- END Page Content -->






@endsection


@section('js')
<script src="{{asset('js/ajax-crud-modal-form.js')}}"></script>
<script src="{{asset('js/user_manage/myshop.js')}}"></script>
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