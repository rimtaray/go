<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'tb_users';
    protected $primaryKey = 'u_id';
    protected $fillable = ['u_id','u_idcard','u_name','u_email','password','u_status'];
    protected $hidden = ['password','remember_token'];

    public function profile()
    {
        return $this->hasOne(TbUserDetail::class,'u_id');
    }

    public function getMemberidAttribute()
    {
        $uid = \Auth::user()->u_id;
        $mid = User::with('profile')->find($uid);
        //$mid = User::with('profile')->find($uid);
        return $mid->profile->m_id;
    }
}
