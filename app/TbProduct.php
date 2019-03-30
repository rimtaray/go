<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbProduct extends Model
{
    protected $table = 'tb_product';
    protected $primaryKey = 'p_id';
    protected $fillable = ['m_id','p_barcode','p_name','cat_id','p_low','p_buy','p_sn','p_status','p_image','p_receive','p_stock','p_price','p_unit','p_detail'];

    public function updateBuy($data)
    {
        $upd = $this->find($data['pid']);
        $upd->p_buy = $data['t_buy'];
        $upd->save();
        return 1;
    }

    public function updateProduct($data, $id)
    {
        $upd = $this->find($id);
        $upd->p_barcode = $data['t_barcode'];
        $upd->p_name = $data['t_name'];
        $upd->cat_id = $data['s_cat'];
        $upd->p_low = $data['t_low'];
        $upd->p_status = $data['s_status'];
        $upd->p_stock = $data['s_stock'];
        $upd->p_price = $data['t_price'];
        $upd->p_unit = $data['t_unit'];
        $upd->p_detail = $data['t_detail'];
        $upd->save();
        return 1;
    }

    public function updateProductsn($data, $id)
    {
        $upd = $this->find($id);
        $upd->p_name = $data['t_name'];
        $upd->cat_id = $data['s_cat'];
        $upd->p_low = $data['t_low'];
        $upd->p_status = $data['s_status'];
        $upd->p_stock = $data['s_stock'];
        $upd->p_price = $data['t_price'];
        $upd->p_unit = $data['t_unit'];
        $upd->p_detail = $data['t_detail'];
        $upd->save();
        return 1;
    }

}
