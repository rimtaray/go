<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbBank extends Model
{
    protected $table = 'tb_bank';
    protected $primaryKey = 'b_id';
    protected $fillable = ['b_id','b_no','b_bank','b_name','b_office','b_status','m_id'];

    public function updateBank($data)
    {
        $upd = $this->find($data['b_id']);
        $upd->b_no = $data['t_no'];
        $upd->b_bank = $data['t_bank'];
        $upd->b_name = $data['t_name'];
        $upd->b_office = $data['t_office'];
        $upd->b_status = $data['s_status'];
        $upd->save();
        return 1;
    }
}
