<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TbReceive;

class TbReceiveController extends Controller
{
    public function index()
    {
        //
    }

    public function check($ck)
    {
        $mid = session()->get('mid');

        if($ck == 'list')  // รายการใบรับสินค้า
        {
            return $this->receive_list($mid);
        }

        if($ck == 'receive')  //  หน้าออกใบรับสินค้า
        {
            return $this->receive($mid);
        }

        if($ck == 'issue_non')  //  ออกใบรับสินค้า
        {
            return $this->issue_non($mid);
        }

        if($ck == 'issue_sn')  //  ออกใบรับสินค้า sn
        {
            return $this->issue_sn($mid);
        }
    }

    public function work($work, $id)
    {

    }

    public function receive_list($mid)
    {
        $data = DB::table('tb_receive')
                ->select('re_id','re_no','re_date','re_status','u_name')
                ->join('tb_users','tb_users.u_id','=','tb_receive.u_id')
                ->where('m_id',$mid)
                ->orderBy('re_date','desc')
                ->get();

        return view('receive.list',[
            'data'=>$data
            ]);
    }

    public function receive($mid)
    {
        $data = DB::table('tb_product')
                ->select('tb_product_detail.pd_id','p_barcode','p_name','ps_num','tb_product_detail.created_at')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
                ->where('p_sn','0')
                ->where('pd_status','2')
                ->get();

        $data_sn = DB::table('tb_product')
                ->select('tb_product_detail.pd_id','p_barcode','p_name','ps_num','tb_product_detail.created_at')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
                ->where('p_sn','1')
                ->where('pd_status','2')
                ->groupBy('tb_product_detail.p_id')
                ->selectRaw('sum(ps_num) as psnum')
                ->get();

        return view('receive.receive',[
            'data'=>$data,
            'data_sn'=>$data_sn
        ]);

    }

    public function get_rec($mid)  // หาเลขที่ใบรับ
    {
        $d = date("ym");
        $maxno = DB::table('tb_receive')
                    ->where('m_id',$mid)
                    ->max('re_no');

        if($maxno == "")
        {
            return $d . "0001";
        }
        else
        {
            $subno = substr($maxno,0,4);
            if($d == $subno)
            {
                return $maxno + 1;
            }
            else
            {
                return $d . "0001";
            }
        }

    }

    public function issue_non($mid)
    {
        $data = DB::table('tb_product')
                ->select('tb_product_detail.pd_id','p_barcode','p_name','p_sn','ps_num','ps_sn','pd_cost','tb_product_detail.created_at')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
                ->where('p_sn','0')
                ->where('pd_status','2')
                ->where('m_id',$mid)
                ->get();

        $shop = \App\TbShop::where('m_id',$mid)->first();
        $rec = $this->get_rec($mid);  // เลขที่ใบรับ

        // insert receive
        $ins_rec = new TbReceive();
        $ins_rec->re_no = $rec;
        $ins_rec->re_date = date("Y-m-d");
        $ins_rec->re_status = '1';
        $ins_rec->u_id = session()->get('uid');
        $ins_rec->m_id = $mid;
        $ins_rec->save();

        // update product status
        DB::table('tb_product')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->where('p_sn','0')
                ->where('pd_status','2')
                ->where('m_id',$mid)
                ->update(['pd_status'=>'1','re_id'=>$ins_rec->re_id]);

        return view('receive.issue',[
            'data'=>$data,
            'shop'=>$shop,
            'ins_rec'=>$ins_rec
        ]);

    }

    public function issue_sn($mid)
    {
        $data = DB::table('tb_product')
                ->select('tb_product_detail.pd_id','ps_sn','p_name','p_sn','ps_num','pd_cost','tb_product_detail.created_at')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
                ->where('p_sn','1')
                ->where('pd_status','2')
                ->where('m_id',$mid)
                ->get();

        $shop = \App\TbShop::where('m_id',$mid)->first();
        $rec = $this->get_rec($mid);  // เลขที่ใบรับ

        // insert receive
        $ins_rec = new TbReceive();
        $ins_rec->re_no = $rec;
        $ins_rec->re_date = date("Y-m-d");
        $ins_rec->re_status = '1';
        $ins_rec->u_id = session()->get('uid');
        $ins_rec->m_id = $mid;
        $ins_rec->save();

        // update product status
        DB::table('tb_product')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->where('p_sn','1')
                ->where('pd_status','2')
                ->where('m_id',$mid)
                ->update(['pd_status'=>'1','re_id'=>$ins_rec->re_id]);

        return view('receive.issue',[
            'data'=>$data,
            'shop'=>$shop,
            'ins_rec'=>$ins_rec
        ]);

    }
}
