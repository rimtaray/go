<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\TbOrder;
use App\TbOrderDetail;
use App\TbShop;

class TbOrderController extends Controller
{
    public function index()
    {
        $data = DB::table('tb_order')
                ->select('o_id','o_no','o_date','o_status','sup_id','o_etc','o_vat','u_name')
                ->join('tb_users','tb_users.u_id','=','tb_order.u_id')
                ->where('m_id',session()->get('mid'))
                ->orderBy('o_no','desc')
                ->get();

        return view('order.list',[
            'data'=>$data
            ]);
    }

    public function order()
    {
        $data = \App\TbOrderDetail::where('u_id',session()->get('uid'))
            ->where('m_id',session()->get('mid'))
            ->where('o_id',Null)
            ->orderBy('od_id','asc')
            ->get();

        $supp = \App\TbSupplier::where('m_id_up','=',session()->get('midup'))
            ->where('sup_status','1')
            ->orderBy('sup_name','asc')
            ->pluck('sup_name','sup_id');

        return view('order.order',[
            'data'=>$data,
            'supp'=>$supp
            ]);

    }

    public function check($ck,$id)
    {
        if($ck == 'del')
        {
            return $this->del_one($id);
        }

        if($ck == 'del_all')
        {
            return $this->del_all();
        }

        if($ck == 'print')
        {
            return $this->order_print($id);
        }

        if($ck == 'cancel_order')
        {
            //
        }
    }

    private function order_print($id)
    {
        $order = TbOrder::find($id);
        $supp = \App\TbSupplier::find($order->sup_id);
        $shop = TbShop::find(session()->get('mid'));

        $data = DB::table('tb_order')
                ->join('tb_order_detail','tb_order_detail.o_id','=','tb_order.o_id')
                ->join('tb_users','tb_users.u_id','=','tb_order.u_id')
                ->where('tb_order.o_id',$id)
                ->orderBy('od_name','asc')
                ->get();

        return view('order.order_print',[
            'data'=>$data,
            'order'=>$order,
            'supp'=>$supp,
            'shop'=>$shop
            ]);
    }

    private function del_one($odid)
    {
        $del = TbOrderDetail::find($odid);
        $del->delete();

        return redirect('/doc/order');
    }

    private function del_all()
    {
        $del = TbOrderDetail::where('u_id',session()->get('uid'))
        ->where('m_id',session()->get('mid'))
        ->where('o_id',Null)
        ->delete();

        return redirect('/doc/order');
    }

    public function store(Request $req)
    {       
        if($req->ck == 'add_order')
        {
            return $this->add_order($req);
        }

        if($req->ck == 'save_order')
        {
            return $this->save_order($req);
        }
    }

    private function add_order($req)
    {
        $data = $this->validate($req, [
            't_name'=>'required',
            't_num'=>'required'
        ],[
            't_name.required'=>'โปรดระบุชื่อสินค้า',
            't_num.required'=>'โปรดระบุจำนวนสินค้า'
        ]);

        $order = new TbOrder();
        $order->addOrder($req);
    
        return redirect('/doc/order');
    }

    private function save_order($req)
    {
        $data = $this->validate($req, [
            's_vat'=>'required'
        ],[
            's_vat.required'=>'โปรดเลือกรูปแบบภาษี'
        ]);

        $ono = $this->get_orderno();

        $order = new TbOrder();
        $oid = $order->saveOrder($req,$ono);

        $order->updOrder($oid);

        return redirect('/order/print/'.$oid);
    }

    public function get_orderno()
    {
        $mid = session()->get('mid');

        $ordermax = DB::table('tb_order')
                    ->where('m_id',$mid)
                    ->where('o_no', 'like', date("ym").'%')
                    ->max('o_no');

        if($ordermax)
        {
            $orderno = $ordermax + 1;
        }
        else
        {
            $orderno = date("ym") . "0001";
        }

        return $orderno;
    }
}
