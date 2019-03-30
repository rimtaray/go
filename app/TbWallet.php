<?php

namespace App;

use Auth;

use Illuminate\Database\Eloquent\Model;

class TbWallet extends Model
{
    protected $table = 'tb_wallet';
    protected $primaryKey = 'w_id';
    protected $fillable = ['wc_id','w_name','w_amount','w_dt','w_type','m_id','u_id','w_status'];

    public function updateWallet($data)
    {
        $upd = $this->find($data['w_id']);
        $upd->wc_id = $data['s_cat'];
        $upd->w_name = $data['t_name'];
        $upd->w_amount = $data['t_amount'];
        $upd->w_dt = $data['t_date'];
        $upd->m_id = session()->get('mid');
        $upd->u_id = Auth::user()->u_id;
        $upd->w_status = $data['s_status'];
        $upd->save();
        return 1;
    }
}
