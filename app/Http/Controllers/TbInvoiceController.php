<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TbSaleBill;
use DB;
use App\TbSale;
use App\TbShop;

class TbInvoiceController extends Controller
{
    public function check($ck,$ino)
    {
        if($ck == 'paper')
        {
            return $this->paper($ino);
        }
    }

    public function index()
    {
        $bill = TbSaleBill::where('m_id',session()->get('mid'))
                    ->where('sb_status','1')
                    ->orderBy('sb_no','desc')
                    ->pluck('sb_no','sb_no');

        $inv_cc = \App\TbInvoice::where('m_id',session()->get('mid'))
                    ->where('i_status','0')
                    ->orderBy('i_no','desc')
                    ->pluck('i_no','i_no');

        return view('invoice.invoice',[
            'bill'=>$bill,
            'inv_cc'=>$inv_cc
            ]);
    }

    public function list()
    {
        $inv = DB::table('tb_invoice')
                ->select('i_id','tb_invoice.m_id','sb_no','i_date','i_refer','i_no','i_name','i_add','i_tel','i_office','i_idcard','i_type','i_status','u_name')
                ->join('tb_users','tb_users.u_id','=','tb_invoice.u_id')
                ->where('m_id',session()->get('mid'))
                ->orderBy('i_no','desc')
                ->get();

        return view('invoice.list',[
            'inv'=>$inv
        ]);
    }

    public function store(Request $request)
    {       
        if($request->ck == 'invoice')
        {
            return $this->invoice($request);
        }
    }

    public function invoice($req)
    {
        $invno = $this->get_invno();

        $ins = new \App\TbInvoice();
        $ins->u_id = session()->get('uid');
        $ins->m_id = session()->get('mid');
        $ins->sb_no = $req->s_bill;
        $ins->i_date = date('Y-m-d');
        $ins->i_refer = $req->s_invcc;
        $ins->i_no = $invno;
        $ins->i_name = $req->t_name;
        $ins->i_add = $req->t_add;
        $ins->i_tel = $req->t_phone;
        $ins->i_office = $req->t_office;
        $ins->i_idcard = $req->t_idcard;
        $ins->i_type = $req->s_type;
        $ins->i_status = '1';
        $ins->save();

        $inv = DB::table('tb_invoice')
                ->select('i_id','tb_invoice.m_id','sb_no','i_date','i_refer','i_no','i_name','i_add','i_tel','i_office','i_idcard','i_type','i_status','u_name')
                ->join('tb_users','tb_users.u_id','=','tb_invoice.u_id')
                ->where('tb_invoice.m_id',session()->get('mid'))
                ->where('i_no',$ins->i_no)
                ->first();

        $product = DB::table('tb_sale')
                ->select('s_barcode','s_pname','s_pdid','s_psid','s_pcost','s_pprice','s_num','s_status','s_price','tb_sale.sb_no','sb_discount')
                ->join('tb_sale_bill','tb_sale_bill.sb_no','=','tb_sale.sb_no')
                ->where('tb_sale_bill.m_id',session()->get('mid'))
                ->where('tb_sale.sb_no',$inv->sb_no)
                ->orderBy('s_id','asc')
                ->get();

        $shop = TbShop::where('m_id',session()->get('mid'))
                ->first();

        return view('invoice.paper',[
            'inv'=>$inv,
            'product'=>$product,
            'shop'=>$shop
            ]);

    }

    public function get_invno()
    {
        $mid = session()->get('mid');

        $invmax = DB::table('tb_invoice')
                    ->where('m_id',$mid)
                    ->where('i_no', 'like', date("y").'%')
                    ->max('i_no');

        if($invmax)
        {
            $ino = $invmax + 1;
        }
        else
        {
            $ino = date("y") . "00000001";
        }

        return $ino;
    }

    public function paper($ino)
    {
        $inv = DB::table('tb_invoice')
                ->select('i_id','tb_invoice.m_id','sb_no','i_date','i_refer','i_no','i_name','i_add','i_tel','i_office','i_idcard','i_type','i_status','u_name')
                ->join('tb_users','tb_users.u_id','=','tb_invoice.u_id')
                ->where('tb_invoice.m_id',session()->get('mid'))
                ->where('i_no',$ino)
                ->first();

        $product = DB::table('tb_sale')
                ->select('s_barcode','s_pname','s_pdid','s_psid','s_pcost','s_pprice','s_num','s_status','s_price','tb_sale.sb_no','sb_discount')
                ->join('tb_sale_bill','tb_sale_bill.sb_no','=','tb_sale.sb_no')
                ->where('tb_sale_bill.m_id',session()->get('mid'))
                ->where('tb_sale.sb_no',$inv->sb_no)
                ->orderBy('s_id','asc')
                ->get();

        $shop = TbShop::where('m_id',session()->get('mid'))
                ->first();

        return view('invoice.paper',[
            'inv'=>$inv,
            'product'=>$product,
            'shop'=>$shop
            ]);

    }

}
