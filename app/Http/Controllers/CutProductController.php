<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbSale;
use DB;

class CutProductController extends Controller
{
    public function store(Request $request)
    {       
        if($request->ck == 'expired')
        {
            return $this->cut_product('6',$request,'/cut/expired','ตัดสินค้าหมดอายุ');
        }

        if($request->ck == 'break')
        {
            return $this->cut_product('2',$request,'/cut/break','ตัดสินค้าเสียหาย');
        }

        if($request->ck == 'share')
        {
            return $this->cut_product('9',$request,'/cut/share','ตัดสินค้าแบ่งขาย');
        }
    }

    public function cut_product($code,$req,$page,$txt)
    {            
        $product = DB::table('tb_product')
                ->select('p_name','tb_product_detail.pd_id','ps_id','ps_sn','pd_cost','pd_price','pd_price','ps_id','ps_num')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->join('tb_product_sn','tb_product_detail.pd_id','=','tb_product_sn.pd_id')
                ->where('ps_sn',$req->t_sn)
                ->where('pd_status','1')
                ->where('ps_num','>','0')
                ->where('m_id',session()->get('mid'))
                ->orderBy('tb_product_detail.created_at','asc')
                ->first();
        
        if($product)
        {
            $this->cut_number($product);  // ตัดสต๊อก
            $this->ins_basket($product,$req,$code); // บันทึกในตารางขาย

            SWAL::message('ผลการทำงาน',$txt . ' สินค้าชื่อ '. $product->p_name . ' รหัส ' . $product->ps_sn . ' เรียบร้อยแล้ว' ,'success',['timer'=>5000]);
        }
        else
        {
            SWAL::message('ผลการทำงาน','ไม่พบสินค้ารหัส '.$req->t_sn,'warning',['timer'=>5000]);
        }

        return redirect($page);
    }

    public function cut_number($pro)
    {
        $num = $pro->ps_num - 1;
        $this->upd_product_num($pro->ps_id,$num);

        return 1;
    }    

    public function upd_product_num($psid,$num)
    {
        DB::table('tb_product_sn')
            ->where('ps_id',$psid)
            ->update(['ps_num'=>$num]);

        return 1;
    }

    public function ins_basket($product,$req,$code)
    {
        $ins = new TbSale();
        $ins->s_barcode = $req->t_sn;
        $ins->s_pname = $product->p_name;
        $ins->s_pdid = $product->pd_id;
        $ins->s_psid = $product->ps_id;
        $ins->s_pcost = $product->pd_cost;
        $ins->u_id = session()->get('uid');
        $ins->m_id = session()->get('mid');
        $ins->s_num = '1';
        $ins->s_status = $code;
        $ins->save();

        return 1;
    }



}
