<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbWalletCat extends Model
{
    protected $table = 'tb_wallet_cat';
    protected $primaryKey = 'wc_id';
    protected $fillable = ['wc_id','wc_name','m_id','wc_type','wc_cat','wc_status'];

    public function updateWalletcat($data)
    {
        $walletcat = $this->find($data['wc_id']);
        $walletcat->wc_name = $data['t_name'];
        $walletcat->wc_type = $data['s_type'];
        $walletcat->wc_cat = $data['s_cat'];
        $walletcat->wc_status = $data['s_status'];
        $walletcat->save();
        return 1;
    }
}
