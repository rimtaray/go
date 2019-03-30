@extends('layouts.user')


@section('content')




        <!-- Fade In Block Modal -->
        <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="modal_content"></div>
            </div>
        </div>
        <!-- END Fade In Block Modal -->




<!-- Page Content -->
<div class="content content-full">
    


    @foreach($data as $data)

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
                                <i class="fa fa-store mr-1"></i> เปิด
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

@endsection