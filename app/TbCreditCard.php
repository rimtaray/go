<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbCreditCard extends Model
{
    protected $table = 'tb_credit_card';
    protected $primaryKey = 'cc_id';
    protected $fillable = ['cc_id','cc_name','cc_free','cc_status','m_id'];

    public function updateCreditCard($data)
    {
        $upd = $this->find($data['cc_id']);
        $upd->cc_name = $data['t_name'];
        $upd->cc_free = $data['t_free'];
        $upd->cc_status = $data['s_status'];
        $upd->save();
        return 1;
    }
}
