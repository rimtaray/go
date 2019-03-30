<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbShop;
use App\User;
use Auth;

class TbShopController extends Controller
{
    
    public function index()
    {
        $txt_receipt = collect([''=>'ยังไม่ได้เลือก','0'=>'ไม่พิมพ์ใบเสร็จ','1' => 'พิมพ์ใบเสร็จทุกครั้ง','2'=>'พิมพ์ใบเสร็จบางครั้ง']);
        $txt_format = collect([''=>'ยังไม่ได้เลือก','1' => 'ขนาด 3 นิ้ว อย่างย่อ', '2' => 'ขนาด 3 นิ้ว อย่างย่อแสดง VAT', '3'=>'ขนาด A5 อย่างย่อ', '4'=>'ขนาด A5 อย่างย่อแสดง VAT']);
        $txt_num = collect([''=>'ยังไม่ได้เลือก','1' => '1 ใบ', '2' => '2 ใบ', '3'=>'3 ใบ']);

        $mid = session()->get('mid');

        $data = TbShop::find($mid);
        $data['m_receipt'] = $txt_receipt->get($data->m_receipt);
        $data['m_rec_format'] = $txt_format->get($data->m_rec_format);
        $data['m_rec_num'] = $txt_num->get($data->m_rec_num);

        return view('manage.store.store',['data'=>$data]);
    }

    public function edit($id)
    {
        //$mid = session()->get('mid');        
        $data = TbShop::findOrFail($id);

        return view('user_manage.shop_edit',[
            'data'=>$data
            ]);
    }

    public function update(Request $request, $id)
    {
        $upd = new TbShop();
        // $data = $this->validate($request, [
        //     't_name'=>'required',
        //     't_address'=>'required',
        //     't_tel'=>'required',
        //     't_mobile'=>'required',
        //     't_taxid'=>'required',
        //     's_receipt'=>'required',
        //     's_format'=>'required',
        //     's_num'=>'required',
        //     't_invno'=>'required',
        //     't_invname'=>'required',
        //     't_invadd'=>'required',
        //     't_invtel'=>'required'
        // ]);
        // $data['m_id'] = $id;

        $upd->updateStore($request, $id);

        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        //return redirect()->action('TbShopController@index');
        //return redirect('store');
        return redirect('/myshop');
    }
}

