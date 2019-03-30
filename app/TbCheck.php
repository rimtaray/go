<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbCheck extends Model
{
    protected $table = 'tb_check';
    protected $primaryKey = 'ch_id';
    protected $fillable = ['ch_id','ch_name','ch_branch','ch_number','ch_date','ch_no','ch_amount','ch_status','m_id'];

    public function updateCheck($data)
    {
        $upd = $this->find($data['ch_id']);
        $upd->ch_name = $data['t_name'];
        $upd->ch_branch = $data['t_branch'];
        $upd->ch_number = $data['t_number'];
        $upd->ch_date = $data['t_date'];
        $upd->ch_no = $data['t_no'];
        $upd->ch_amount = $data['t_amount'];
        $upd->ch_status = $data['s_status'];
        $upd->save();
        return 1;
    }
}
