<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbUserDetail extends Model
{
    protected $table = 'tb_user_detail';
    protected $primaryKey = 'ud_id';
    protected $fillable = ['u_id','m_id','ud_level','ud_position','ud_phone','ud_right','ud_login','ud_cstock','ud_status'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function updateDetail($data,$id)
    {
        $upd = $this->where('ud_id',$id)->first();
        $upd->ud_position = $data['t_position'];
        $upd->ud_phone = $data['t_tel'];
        $upd->ud_status = $data['s_status'];
        $upd->save();
        return 1;
    }
}
