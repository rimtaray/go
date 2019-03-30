<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use Auth;
use App\TbShop;
use DB;

class PaymentController extends Controller
{
    
    public function index()
    {
        return $this->bank();
    }

    public function work($work, $type)
    {
        if($work == 'add')
        {
            if($type == 'credit')
            {
                return $this->add_credit();
            }

            if($type == 'coupon')
            {
                return $this->add_coupon();
            }

            if($type == 'check')
            {
                return $this->add_check();
            }

            if($type == 'transfer')
            {
                return $this->add_transfer();
            }

            if($type == 'currency')
            {
                return $this->add_currency();
            }
        }

        if($work == 'create_credit')
        {
            return $this->create_credit($type);
        }

        if($work == 'create_currency')
        {
            return $this->create_currency($type);
        }
    }

    // public function create_credit($id)
    // {
    //     return view('sale.payment.credit_create'); 
    // }

    public function create_currency($id)
    {
        return view('sale.payment.currency_create'); 
    }

    public function add_credit()
    {
        $data = DB::table('tb_credit_card')
        ->where('m_id',session()->get('mid'))
        ->first();
        
        return view('sale.payment.credit_create',[
        'data'=>$data
        ]);
    }

    public function add_coupon()
    {        
        return view('sale.payment.coupon_create');
    }

    public function add_check()
    {        
        return view('sale.payment.check_create');
    }

    public function add_transfer()
    {
        $data = DB::table('tb_bank')
        ->where('m_id',session()->get('mid'))
        ->get();
        
        return view('sale.payment.transfer',[
        'data'=>$data
        ]);
    }

    public function add_currency()
    {
        $data = DB::table('tb_currency')
        ->where('m_id',session()->get('mid'))
        ->get();
        
        return view('sale.payment.currency',[
        'data'=>$data
        ]);
    }

    public function bank()
    {
        $data = DB::table('tb_bank')
        ->where('m_id',session()->get('mid'))
        ->get();

        return view('user_manage.payment.bank',[
        'data'=>$data
        ]);
    }

    public function credit()
    {
        $data = DB::table('tb_credit_card')
        ->where('m_id',session()->get('mid'))
        ->get();

        return view('user_manage.payment.credit',[
        'data'=>$data
        ]);
    }

    public function coupon()
    {
        $data = DB::table('tb_coupon')
        ->where('m_id',session()->get('mid'))
        ->get();

        return view('user_manage.payment.coupon',[
        'data'=>$data
        ]);
    }

    public function currency()
    {
        $data = DB::table('tb_currency')
        ->where('m_id',session()->get('mid'))
        ->get();

        return view('user_manage.payment.currency',[
        'data'=>$data
        ]);
    }

    // public function edit($id)
    // {
    //     //$mid = session()->get('mid');        
    //     $data = TbShop::findOrFail($id);

    //     return view('user_manage.shop_edit',[
    //         'data'=>$data
    //         ]);
    // }

    public function update(Request $request, $id)
    {
        // $upd = new TbShop();

        // $upd->updateStore($request, $id);

        // SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]); 
        // return redirect('/myshop');
    }
}

