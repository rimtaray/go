<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbShop extends Model
{
    protected $table = 'tb_shop';
    protected $primaryKey = 'm_id';
    protected $fillable = ['m_id_up','m_name','m_address','m_tel','m_mobile','m_level','m_status','m_register_date','m_expired','m_taxid','m_receipt','m_rec_format','m_rec_num','m_type','m_inv_no','m_inv_name','m_inv_add','m_inv_tel','m_idcard','m_package','m_buy'];

    public function updateStore($data, $id)
    {
        $upd = $this->find($id);
        $upd->m_name = $data['t_name'];
        $upd->m_address = $data['t_address'];
        $upd->m_tel = $data['t_tel'];
        $upd->m_mobile = $data['t_mobile'];
        
        $upd->m_taxid = $data['t_taxid'];
        $upd->m_receipt = $data['s_receipt'];
        $upd->m_rec_format = $data['s_format'];
        $upd->m_rec_num = $data['s_num'];
        
        $upd->m_inv_no = $data['t_invno'];
        $upd->m_inv_name = $data['t_invname'];
        $upd->m_inv_add = $data['t_invadd'];
        $upd->m_inv_tel = $data['t_invtel'];
        $upd->save();

        return 1;
    }
}
