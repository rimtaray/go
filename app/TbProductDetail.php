<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbProductDetail extends Model
{
    protected $table = 'tb_product_detail';
    protected $primaryKey = 'pd_id';
    protected $fillable = ['p_id','pd_cost','pd_expired','pd_alert','pd_guarantee','pd_status','u_id','re_id'];



    public function updateProductdetail($data, $id)
    {
        $upd = $this->find($id);
        $upd->pd_cost = $data['t_cost'];
        $upd->pd_status = $data['s_status'];
        $upd->save();
        return 1;
    }
}
