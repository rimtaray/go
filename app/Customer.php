<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // test Ajax
    protected $table = 'tb_users';
    protected $primaryKey = 'u_id';
    protected $fillable = ['u_idcard','u_name','u_email','u_pass','u_status'];
    protected $hidden = ['u_pass','remember_token'];
}