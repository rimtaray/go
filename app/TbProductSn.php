<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbProductSn extends Model
{
    protected $table = 'tb_product_sn';
    protected $primaryKey = 'ps_id';
    protected $fillable = ['pd_id','ps_sn','ps_num','u_id','ps_status'];


    public function updateProductsn($data, $id)
    {
        $upd = $this->find($id);
        $upd->ps_num = $data['t_num'];
        $upd->save();
        return 1;
    }
}