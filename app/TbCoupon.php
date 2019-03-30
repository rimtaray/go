<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbCoupon extends Model
{
    protected $table = 'tb_coupon';
    protected $primaryKey = 'co_id';
    protected $fillable = ['co_id','co_number','co_value','co_start','co_end','co_status','m_id'];

    public function updateCoupon($data)
    {
        $upd = $this->find($data['co_id']);
        $upd->co_number = $data['t_number'];
        $upd->co_value = $data['t_value'];
        $upd->co_start = $data['t_stare'];
        $upd->co_end = $data['t_end'];
        $upd->co_status = $data['s_status'];
        $upd->save();
        return 1;
    }
}
