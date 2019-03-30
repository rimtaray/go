<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbProduct;
use App\User;
use Auth;
use App\TbSupplier;
use App\TbProductDetail;
use App\TbMember;
use App\TbProductBarcode;

class TbProductHavesnController extends Controller
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

        $sproduct = TbProduct::where('m_id',$mid)
                    ->where('p_status','1')
                    ->where('p_sn','1')
                    ->orderBy('p_name','asc')
                    ->get();

        $ssup = TbSupplier::where('m_id_up','=',$midup)
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        $pid = '';
        $head = 'เพิ่มสินค้าเดิม s/n';

        return view('product.have_sn',[
            'sproduct'=>$sproduct,
            'ssup'=>$ssup,
            'pid'=>$pid,
            'head'=>$head
            ]);
    }

    public function store(Request $request)
    {        
        $data = new TbProductDetail();

        $data->p_id = $request->s_name;
        $data->pd_cost = $request->t_cost;
        $data->pd_expired = $request->t_date;
        $data->pd_alert = $request->t_alert;
        $data->pd_guarantee = $request->t_claim;
        $data->pd_status = '1';
        $data->sup_id = $request->s_sup;
        $data->u_id = session()->get('uid');

        $data->save();

        //$pid = $data->p_id;
        SWAL::message('ผลการทำงาน','บันทึกรายละเอียดสินค้าแล้ว ขั้นต่อไปเพิ่มสินค้า','success',['timer'=>5000]);

        return view('product.sn_barcode',[
            'pid'=>$data->p_id,
            'pname'=>TbProduct::where('p_id',$data->p_id)->pluck('p_name')->first(),
            'data'=>TbProductBarcode::where('p_id',$data->p_id)->get(),
            'bar'=>''
            ]);
        

        // $mid = session()->get('mid');
        // $head = 'รายละเอียด : ' . TbProduct::where('p_id',$pid)->pluck('p_name')->first();
        // $sproduct = TbProduct::where('m_id',$mid)
        //             ->where('p_status','1')
        //             ->orderBy('p_name','asc')
        //             ->get();

        // $ssup = TbSupplier::where('m_id','=',$mid)
        //             ->orderBy('sup_name','asc')
        //             ->pluck('sup_name','sup_id');

        // return view('product.have',[
        //     'sproduct'=>$sproduct,
        //     'ssup'=>$ssup,
        //     'pid'=>$pid,
        //     'head'=>$head
        //     ]);
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
