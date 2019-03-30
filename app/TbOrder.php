<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TbOrder extends Model
{
    protected $table = 'tb_order';
    protected $primaryKey = 'o_id';
    protected $fillable = ['o_id','o_no','o_date','o_status','sup_id','m_id','u_id','o_etc','o_vat'];


    public function addOrder($req)
    {
        $ins = new TbOrderDetail();
        $ins->od_no = $req->t_barcode;
        $ins->od_name = $req->t_name;
        $ins->od_model = $req->t_model;
        $ins->od_num = $req->t_num;
        $ins->od_price = $req->t_price;
        $ins->u_id = session()->get('uid');
        $ins->m_id = session()->get('mid');
        $ins->save();

        return 1;
    }

    public function saveOrder($req,$ono)
    {
        $ins = new TbOrder();
        $ins->o_no = $ono;
        $ins->o_date = date('Y-m-d');
        $ins->o_status = '1';
        $ins->sup_id = $req->s_sup;
        $ins->m_id = session()->get('mid');
        $ins->u_id = session()->get('uid');
        $ins->o_etc = $req->t_etc;
        $ins->o_vat = $req->s_vat;
        $ins->save();

        return $ins->o_id;
    }

    public function updOrder($oid)
    {
        DB::table('tb_order_detail')
        ->where('u_id',session()->get('uid'))
        ->where('m_id',session()->get('mid'))
        ->where('o_id',Null)
        ->update(['o_id'=>$oid]);

        return 1;
    }
}
