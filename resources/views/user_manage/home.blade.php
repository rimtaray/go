@extends('layouts.user')


@section('content')



<!-- Page Content -->
<div class="content content-full">
    
@foreach($shop as $shop)

    <!-- Overview -->
    <h2 class="font-w300 mt-4 mb-3">{{ $shop->m_name }}</h2>
    <div class="row">
        <div class="col-sm-6 col-lg-3 invisible" data-toggle="appear">
            <div class="block block-rounded block-fx-pop text-center">
                <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                    <div>
                        <a class="link-fx text-success font-size-h1 font-w700" href="javascript:void(0)">
                            <?
                            $list_d = DB::table('tb_sale_bill')
                                    ->where('m_id',$shop->m_id)
                                    ->where('created_at','like',date('Y-m-d').'%')
                                    ->where('sb_status','1')
                                    ->count();
                            echo number_format($list_d);
                            ?>
                        </a>
                        <div class="font-size-sm font-w700 text-uppercase text-muted mt-1">รายการขาย(วัน)</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 invisible" data-toggle="appear" data-timeout="150">
            <div class="block block-rounded block-fx-pop text-center">
                <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                    <div>
                        <a class="link-fx text-success font-size-h1 font-w700" href="javascript:void(0)">
                            <? $sum_d = DB::table('tb_sale')
                                    ->join('tb_sale_bill','tb_sale_bill.sb_no','=','tb_sale.sb_no')
                                    ->selectRaw('sum(s_price) as sumprice')
                                    ->where('tb_sale_bill.sb_status','1')
                                    ->where('tb_sale.m_id',$shop->m_id)
                                    ->where('tb_sale_bill.m_id',$shop->m_id)
                                    ->where('tb_sale_bill.created_at','like',date('Y-m-d').'%')
                                    ->first(); 
                                echo number_format($sum_d->sumprice,2,'.',',');
                            ?>
                        </a>
                        <div class="font-size-sm font-w700 text-uppercase text-muted mt-1">ยอดขาย(วัน)</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 invisible" data-toggle="appear" data-timeout="300">
            <div class="block block-rounded block-fx-pop text-center">
                <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                    <div>
                        <a class="link-fx text-primary font-size-h1 font-w700" href="javascript:void(0)">
                            <?
                            $list_m = DB::table('tb_sale_bill')
                                    ->where('m_id',$shop->m_id)
                                    ->where('created_at','like',date('Y-m-').'%')
                                    ->where('sb_status','1')
                                    ->count();
                            echo number_format($list_m);
                            ?>
                        </a>
                        <div class="font-size-sm font-w700 text-uppercase text-muted mt-1">รายการขาย(เดือน)</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 invisible" data-toggle="appear" data-timeout="450">
            <div class="block block-rounded block-fx-pop text-center">
                <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                    <div>
                        <a class="link-fx text-primary font-size-h1 font-w700" href="javascript:void(0)">
                            <? $sum_m = DB::table('tb_sale')
                                    ->join('tb_sale_bill','tb_sale_bill.sb_no','=','tb_sale.sb_no')
                                    ->selectRaw('sum(s_price) as sumprice')
                                    ->where('tb_sale_bill.sb_status','1')
                                    ->where('tb_sale.m_id',$shop->m_id)
                                    ->where('tb_sale_bill.m_id',$shop->m_id)
                                    ->where('tb_sale_bill.created_at','like',date('Y-m-').'%')
                                    ->first(); 
                                echo number_format($sum_m->sumprice,2,'.',',');
                            ?>
                        </a>
                        <div class="font-size-sm font-w700 text-uppercase text-muted mt-1">ยอดขาย(เดือน)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Overview -->

@endforeach


    
</div>
<!-- END Page Content -->






@endsection

