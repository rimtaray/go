@extends('layouts.user')


@section('content')



<!-- Page Content -->
<div class="content content-full">
    



    @foreach($data as $data)

    <div class="block block-rounded block-fx-pop mb-2 invisible" data-toggle="appear">
        <div class="block-content block-content-full border-left border-3x border-success">
            <div class="d-md-flex justify-content-md-between align-items-md-center">
                <div class="p-1 p-md-3">
                    <h3 class="h4 font-w700 mb-1">ร้าน {{ $data->m_name}} เชิญให้เข้าร่วม</h3>
                    <p class="font-size-sm text-muted mb-0">
                        เวลาเชิญ {{ $data->created_at }}
                    </p>
                </div>
                <div class="p-1 p-md-3">
                    <a class="btn btn-sm btn-outline-success btn-rounded px-3 mr-1 my-1" href="{{ url('invite/accept/'.$data->in_id) }}">
                        <i class="fa fa-check mr-1"></i> ตอบรับ
                    </a>

                    <a class="btn btn-sm btn-outline-danger btn-rounded px-3 mr-1 my-1" href="{{ url('invite/reject/'.$data->in_id) }}">
                        <i class="fa fa-times mr-1"></i> ปฎิเสธ
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


@section('js')

@endsection