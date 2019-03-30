<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbSupplier extends Model
{
    protected $table = 'tb_supplier';
    protected $primaryKey = 'sup_id';
    protected $fillable = ['sup_name','sup_address','sup_tel','sup_status','m_id_up'];

    public function updateSup($data)
    {
        $upd = $this->find($data['sup_id']);
        $upd->sup_name = $data['t_name'];
        $upd->sup_address = $data['t_add'];
        $upd->sup_tel = $data['t_tel'];
        $upd->sup_status = $data['s_status'];
        $upd->save();
        return 1;
    }
}
