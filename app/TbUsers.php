<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class TbUsers extends Model
{
    protected $table = 'tb_users';
    protected $primaryKey = 'u_id';
    protected $fillable = ['u_idcard','u_name','u_email','u_pass','u_status'];
    protected $hidden = ['u_pass','remember_token'];

    public function userdetail()
    {
        return $this->hasOne(TbUserDetail::class,'u_id');
    }

    public function getStatusAttribute()
    {
        $user = TbUsers::with('userdetail')->find(Auth::TbUsers()->u_id);
        return $user->userdetail->ud_status;
    }

    public function updateUser($data)
    {
        $upd = $this->find($data['u_id']);
        $upd->u_idcard = $data['t_idcard'];
        $upd->u_name = $data['t_name'];
        $upd->u_email = $data['t_email'];
        $upd->save();
        return 1;
    }
}
