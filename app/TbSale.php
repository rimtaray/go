<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbSale extends Model
{
    protected $table = 'tb_sale';
    protected $primaryKey = 's_id';
    protected $fillable = ['s_barcode','s_pname','s_pdid','s_psid','s_pcost','s_pprice','u_id','m_id','s_num','s_status','s_price','sb_no'];

    public function updateBasket($id,$num)
    {
        $upd = $this->find($id);
        $upd->s_num = $num;
        $upd->save();
        return 1;
    }
}
