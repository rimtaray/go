<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbProduct;
use App\User;
use Auth;
use App\TbCategory;
use App\TbMember;
use Image;
use App\TbSupplier;

class TbProductNewsnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $mid = session()->get('mid');
        $midup = session()->get('midup');
        //$midup = TbMember::where('m_id',$mid)->pluck('m_id_up')->first();

        $scat = TbCategory::where('m_id_up','=',$midup)
                    ->orderBy('cat_name','asc')
                    ->pluck('cat_name','cat_id');

        return view('product.new_sn',[
            'scat'=>$scat
            ]);
    }

    public function store(Request $request)
    {        
        $data = new TbProduct();

        $data->m_id = session()->get('mid');
        $data->p_name = $request->t_name;
        $data->cat_id = $request->s_cat;
        $data->p_low = $request->t_low;
        $data->p_status = '1';
        $data->p_sn = '1';
        if($request->hasFile('image')){
            $filename = str_random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/images_product/' , $filename);
            Image::make(public_path() . '/images_product/' . $filename)->resize(50,50)->save(public_path() . '/images_product/resize/' . $filename);
            $data->p_image = $filename;
        }else{
            $data->p_image = 'nopic.jpg';
        }        

        $data->save();

        //$pid = response()->json(array('success' => true, 'last_insert_id' => $data->p_id), 200);
        $pid = $data->p_id;
        SWAL::message('ผลการทำงาน','บันทึกสินค้าใหม่แล้ว ขั้นต่อไปเพิ่มรายละเอียดสินค้า','success',['timer'=>5000]);

        $mid = session()->get('mid');
        $midup = session()->get('midup');
        //$midup = TbMember::where('m_id',$mid)->pluck('m_id_up')->first();

        $head = 'รายละเอียด : ' . TbProduct::where('p_id',$pid)->pluck('p_name')->first();
        $sproduct = TbProduct::where('m_id',$mid)
                    ->where('p_status','1')
                    ->orderBy('p_name','asc')
                    ->get();

        $ssup = TbSupplier::where('m_id_up','=',$midup)
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        return view('product.have_sn',[
            'sproduct'=>$sproduct,
            'ssup'=>$ssup,
            'pid'=>$pid,
            'head'=>$head
            ]);
        
        //return back();
    }

    // public function edit($id)
    // {
    //     //$mid = session()->get('mid');        
    //     $data = TbMember::findOrFail($id);

    //     return view('manage.store.edit',[
    //         'data'=>$data
    //         ]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $upd = new TbMember();
    //     $data = $this->validate($request, [
    //         't_name'=>'required',
    //         't_address'=>'required',
    //         't_tel'=>'required',
    //         't_mobile'=>'required',
    //         't_taxid'=>'required',
    //         's_receipt'=>'required',
    //         's_format'=>'required',
    //         's_num'=>'required',
    //         't_invno'=>'required',
    //         't_invname'=>'required',
    //         't_invadd'=>'required',
    //         't_invtel'=>'required'
    //     ]);
    //     $data['m_id'] = $id;

    //     $upd->updateStore($data);

    //     SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
    //     return redirect()->action('TbMemberController@index');
    // }
}
