<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbCouponSn extends Model
{
    protected $table = 'tb_coupon_sn';
    protected $primaryKey = 'cosn_id';
    protected $fillable = ['cosn_id','co_id','cosn_serial','cosn_status'];

    public function updateCoupon($data)
    {
        $upd = $this->find($data['cosn_id']);
        $upd->co_id = $data['co_id'];
        $upd->cosn_serial = $data['t_serial'];
        $upd->cosn_status = $data['t_status'];
        $upd->save();
        return 1;
    }
}
