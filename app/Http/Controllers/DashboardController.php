<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbSaleBill;
use DB;
use App\TbSale;

class DashboardController extends Controller
{
    public function index()
    {
        $sum_d = DB::table('tb_sale')
                ->join('tb_sale_bill','tb_sale_bill.sb_no','=','tb_sale.sb_no')
                ->selectRaw('sum(s_price) as sumprice')
                ->where('tb_sale_bill.sb_status','1')
                ->where('tb_sale.m_id',session()->get('mid'))
                ->where('tb_sale_bill.m_id',session()->get('mid'))
                ->where('tb_sale_bill.created_at','like',date('Y-m-d').'%')
                ->first();

        $list_d = TbSaleBill::where('m_id',session()->get('mid'))
                ->where('created_at','like',date('Y-m-d').'%')
                ->where('sb_status','1')
                ->count();


        $sum_m = DB::table('tb_sale')
                ->join('tb_sale_bill','tb_sale_bill.sb_no','=','tb_sale.sb_no')
                ->selectRaw('sum(s_price) as sumprice')
                ->where('tb_sale_bill.sb_status','1')
                ->where('tb_sale.m_id',session()->get('mid'))
                ->where('tb_sale_bill.m_id',session()->get('mid'))
                ->where('tb_sale_bill.created_at','like',date('Y-m-').'%')
                ->first();

        $list_m = TbSaleBill::where('m_id',session()->get('mid'))
                ->where('created_at','like',date('Y-m-').'%')
                ->where('sb_status','1')
                ->count();

        return view('dashboard',[
            'sum_d'=>$sum_d,
            'sum_m'=>$sum_m,
            'list_d'=>$list_d,
            'list_m'=>$list_m
            ]);
    }
    
}
