<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbCurrency extends Model
{
    protected $table = 'tb_currency';
    protected $primaryKey = 'cu_id';
    protected $fillable = ['cu_id','cu_name','cu_status','m_id'];

    public function updateCurrency($data)
    {
        $upd = $this->find($data['cu_id']);
        $upd->cu_name = $data['t_name'];
        $upd->cu_status = $data['s_status'];
        $upd->save();
        return 1;
    }
}
