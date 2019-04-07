<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbSaleBill;
use DB;
use App\TbSale;
use App\TbBillNo;
use App\TbPayment;
use App\TbCheck;

class TbSaleBillController extends Controller
{
    

    public function store(Request $request)
    {       
        // if($request->ck == 'pay')
        // {
        //     return $this->pay($request);
        // }
    }

    public function pay(Request $req)
    {
        // หาเลข และเพิ่ม bill ลงใน tb_sale_bill
        $sbno = $this->ins_sale_bill($req);

        // เพิ่มรายการสินค้าลง tb_sale
        foreach($req->h_psn as $key => $value){
            // $key = รหัสสินค้า (ps_sn)
            // $value = จำนวนที่ซื้อ

            // ดึงข้อมูลสินค้า
            $prod = $this->check_stock($key);

            if($prod[0]->p_stock == '1'){
                // เป็นสินค้าที่ต้องตัดสต๊อก

                // ตัดสต๊อก
                $this->cut_number($prod[0],$value);

                // เพิ่มสินค้าลง tb_sale
                $this->ins_basket($prod[0],$key,$value,$sbno);
            }else{
                // เป็นสินค้าไม่ต้องตัดสต๊อก

                // เพิ่มสินค้าลง tb_sale
                $this->ins_basket($prod[0],$key,$value,$sbno);
            }
        }

        foreach($req->credit_id as $key => $value)
        {
            $this->ins_credit($req, $sbno, $key);
        }

        foreach($req->check_id as $key => $value)
        {
            $this->ins_check($req, $sbno, $key);
        }

        // foreach($req->bank_id as $key => $value)
        // {
        //     $this->ins_bank($req, $sbno, $key);
        // }
        
        // ออกใบเสร็จ
        return $this->go_to_bill($sbno);
        //return redirect('sale');
    }

    private function cut_number($pro,$num)
    {
        $total = $pro->ps_num - $num;

        DB::table('tb_product_sn')
            ->where('ps_id',$pro->ps_id)
            ->update(['ps_num'=>$total]);

        return 1;
    }

    private function ins_basket($product,$id,$num,$sbno)
    {
        $ins = new TbSale();
        $ins->s_barcode = $id;
        $ins->s_pname = $product->p_name;
        $ins->s_pdid = $product->pd_id;
        $ins->s_psid = $product->ps_id;
        $ins->s_pcost = $product->pd_cost;
        $ins->s_pprice = $product->p_price;
        $ins->u_id = session()->get('uid');
        $ins->m_id = session()->get('mid');
        $ins->s_num = $num;
        $ins->s_status = '1';
        $ins->s_price = $product->p_price;
        $ins->sb_no = $sbno;
        $ins->save();

        return 1;
    }

    private function check_stock($id)
    {
        $data = DB::table('tb_product')
        ->select('p_name','p_stock','p_price','ps_num','tb_product_sn.pd_id','ps_id','pd_cost')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->groupBy('tb_product_detail.p_id')
        ->selectRaw('sum(ps_num) as psnum')
        ->where('m_id',session()->get('mid'))
        ->where('ps_sn',$id)
        ->get();

        return $data;
    }

    

    private function ins_sale_bill($req)
    {
        $sbno = $this->get_billno();

        $ins = new TbSaleBill();
        $ins->sb_no = $sbno;
        $ins->sb_discount = $req->pay_discount;
        $ins->sb_money = $req->pay_getmoney;
        $ins->u_id = session()->get('uid');
        $ins->m_id = session()->get('mid');
        $ins->sb_status = '1';
        $ins->save();

        // update tb_bill_no
        $upd = TbBillNo::where('bno_mid', session()->get('mid'))->firstOrFail();
        $upd->bno_no = $sbno;
        $upd->save();

        // if($req->credit_name != '')
        // {
        //     $this->ins_credit($req, $sbno);
        // }

        // if($req->check_name != '')
        // {
        //     $this->ins_check($req, $sbno);
        // }

        return $sbno;
    }

    private function ins_credit($req, $sbno, $key)
    {
        $ins = new TbPayment();
        $ins->pay_type = '1';
        $ins->pay_type_id = $req->credit_id[$key];
        $ins->pay_amount = $req->credit_pay[$key];
        $ins->pay_free = $req->credit_free[$key];
        $ins->pay_credit_no = $req->credit_no[$key];
        $ins->pay_credit_expired = $req->credit_expired[$key];
        $ins->pay_installment_no = $req->credit_installment[$key];
        $ins->pay_isim = $req->credit_isim[$key];
        $ins->pay_status = '1';
        $ins->m_id = session()->get('mid');
        $ins->sb_no = $sbno;
        $ins->save();

        return 1;
    }

    private function ins_check($req, $sbno, $key)
    {
        $ins = new TbCheck();
        $ins->ch_name = $req->check_name[$key];
        $ins->ch_branch = $req->check_branch[$key];
        $ins->ch_number = $req->check_number[$key];
        $ins->ch_date = $req->check_date[$key];
        $ins->ch_no = $req->check_no[$key];
        $ins->ch_amount = $req->check_amount[$key];
        $ins->ch_status = $req->check_status[$key];
        $ins->m_id = session()->get('mid');
        $ins->sb_no = $sbno;
        $ins->save();

        return 1;
    }

    private function ins_bank($req, $sbno, $key)
    {
        $ins = new TbPayment();
        $ins->pay_type = '4';
        $ins->pay_type_id = $req->t_bank_id[$key];
        $ins->pay_amount = $req->t_bank_amount[$key];
        $ins->pay_free = '';
        $ins->pay_credit_no = '';
        $ins->pay_credit_expired = '';
        $ins->pay_installment_no = '';
        $ins->pay_isim = '';
        $ins->pay_status = '1';
        $ins->m_id = session()->get('mid');
        $ins->sb_no = $sbno;
        $ins->save();

        return 1;
    }

    private function get_billno()
    {
        // $mid = session()->get('mid');

        // $billmax = DB::table('tb_sale_bill')
        //             ->where('m_id',$mid)
        //             ->where('sb_no', 'like', date("ymd").'%')
        //             ->max('sb_no');

        //เช็คว่ามีบันทึกของร้านรึยัง
        $chk_bill = DB::table('tb_bill_no')
                    ->where('bno_mid', session()->get('mid'))
                    ->count();

        if($chk_bill < 1)
        {
            // ถ้ายังไม่มี บันทึกลง tb_bill_no
            $billno = new TbBillNo();
            $billno->bno_no = '0';
            $billno->bno_mid = session()->get('mid');
            $billno->save();
        }

        $billmax = DB::table('tb_bill_no')
                    ->where('bno_mid', session()->get('mid'))
                    ->where('bno_no', 'like', date("ymd").'%')
                    ->max('bno_no');

        if($billmax)
        {
            $billno = $billmax + 1;
        }
        else
        {
            $billno = date("ymd") . "0001";
        }
        

        return $billno;
    }

    private function go_to_bill($sbno)
    {
        $sale = DB::table('tb_sale')
        ->select('s_barcode','s_pname','s_pdid','s_psid','s_pcost','s_pprice','s_num','s_price','created_at')
        ->where('sb_no',$sbno)
        ->where('u_id',session()->get('uid'))
        ->where('m_id',session()->get('mid'))
        ->get();

        $bill = DB::table('tb_sale_bill')
        ->select('sb_no','sb_discount','sb_money','tb_sale_bill.created_at','u_name')
        ->join('tb_users','tb_users.u_id','=','tb_sale_bill.u_id')
        ->where('sb_no',$sbno)
        ->where('tb_sale_bill.u_id',session()->get('uid'))
        ->where('m_id',session()->get('mid'))
        ->first();

        //$shop = App\TbShop::find(session()->get('mid'));
        $shop = DB::table('tb_shop')
        ->where('m_id', session()->get('mid'))
        ->first();
        
        return view('sale.rec_mini3_vat',[
            'sale'=>$sale,
            'bill'=>$bill,
            'shop'=>$shop,
            'pp'=>''
            ]);
    }

    public function go_to_bill_re($sbno, $pp)
    {
        $sale = DB::table('tb_sale')
        ->select('s_barcode','s_pname','s_pdid','s_psid','s_pcost','s_pprice','s_num','s_price','created_at')
        ->where('sb_no',$sbno)
        ->where('u_id',session()->get('uid'))
        ->where('m_id',session()->get('mid'))
        ->get();

        $bill = DB::table('tb_sale_bill')
        ->select('sb_no','sb_discount','sb_money','tb_sale_bill.created_at','u_name')
        ->join('tb_users','tb_users.u_id','=','tb_sale_bill.u_id')
        ->where('sb_no',$sbno)
        ->where('tb_sale_bill.u_id',session()->get('uid'))
        ->where('m_id',session()->get('mid'))
        ->first();

        //$shop = App\TbShop::find(session()->get('mid'));
        $shop = DB::table('tb_shop')
        ->where('m_id', session()->get('mid'))
        ->first();
        
        return view('sale.rec_mini3_vat',[
            'sale'=>$sale,
            'bill'=>$bill,
            'shop'=>$shop,
            'pp'=>$pp
            ]);
    }

    public function salelist()
    {
        $bill = DB::table('tb_sale_bill')
        ->select('sb_id','sb_no','sb_status','tb_sale_bill.created_at','u_name')
        ->join('tb_users','tb_users.u_id','=','tb_sale_bill.u_id')
        ->where('m_id',session()->get('mid'))
        ->orderBy('sb_no','desc')
        ->get();
        
        return view('sale.list',[
            'bill'=>$bill
        ]);
    }

    public function cancel_salelist($id)
    {
        // ดึงข้อมูลในบิล
        $bill = DB::table('tb_sale_bill')
        ->join('tb_sale','tb_sale.sb_no','=','tb_sale_bill.sb_no')
        ->where('tb_sale.m_id',session()->get('mid'))
        ->where('tb_sale_bill.m_id',session()->get('mid'))
        ->where('sb_id',$id)
        ->get();

        foreach($bill as $bill)
        {
            $p_now = $this->product_now($bill->s_psid); // เช็คจำนวนสินค้าตอนนี้
            $this->upd_num_pro($bill->s_psid, $p_now+$bill->s_num);  // update จำนวนสินค้ากลับคลัง
        }

        $this->upd_sta_bill($bill->sb_id);  // update สถานะบิลเป็น 0

        SWAL::message('ผลการทำงาน','ยกเลิกรายการขายเรียบร้อยแล้ว','success',['timer'=>3000]);        
        return redirect('/list/salelist');
    }

    // เช็คจำนวนสินค้าตอนนี้
    private function product_now($psid)
    {
        $data = \App\TbProductSn::findOrFail($psid);
        return $data->ps_num;
    }

    // upd จำนวนสินค้ากลับคลัง
    private function upd_num_pro($psid, $num)
    {
        DB::table('tb_product_sn')
            ->where('ps_id',$psid)
            ->update(['ps_num'=>$num]);

        return 1;
    }

    // เปลี่ยนสถานะบิลเป็น 0
    private function upd_sta_bill($sbid)
    {
        DB::table('tb_sale_bill')
            ->where('sb_id',$sbid)
            ->update(['sb_status'=>'0']);

        return 1;
    }

    public function sale_detail($id)
    {
        $bill = TbSaleBill::findOrFail($id);

        $data = DB::table('tb_sale_bill')
        ->join('tb_sale','tb_sale.sb_no','=','tb_sale_bill.sb_no')
        ->where('tb_sale.m_id',session()->get('mid'))
        ->where('tb_sale_bill.m_id',session()->get('mid'))
        ->where('sb_id',$id)
        ->get();
        
        return view('sale.sale_detail',[
            'bill'=>$bill,
            'data'=>$data
        ]);
    }
    
}
