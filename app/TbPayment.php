<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbPayment extends Model
{
    protected $table = 'tb_payment';
    protected $primaryKey = 'pay_id';
    protected $fillable = ['pay_id','pay_type','pay_type_id','pay_rate','pay_amount','pay_transfer','pay_free','pay_credit_no','pay_credit_expired','pay_installment_no','pay_isim','pay_status','m_id'];

    // public function updateCurrency($data)
    // {
    //     $upd = $this->find($data['cu_id']);
    //     $upd->cu_name = $data['t_name'];
    //     $upd->cu_status = $data['s_status'];
    //     $upd->save();
    //     return 1;
    // }
}
