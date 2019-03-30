<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use Auth;
use App\TbProduct;
use App\TbProductSn;
use DB;
use App\TbProductDetail;
use App\TbCategory;
use App\TbSupplier;
use Image;

class TbProductController extends Controller
{
    
    public function index()
    {
        $data = DB::table('tb_product')
        ->select('tb_product.p_id','ps_sn','p_barcode','p_name',
                'cat_id','p_image','p_price')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->groupBy('tb_product_detail.p_id')
        ->selectRaw('sum(ps_num) as psnum')
        ->where('m_id',session()->get('mid'))
        ->where('p_sn','0')
        ->get();

        return view('product.list_cost',[
            'data'=>$data
            ]);
    }

    public function check($ck, $id)
    {
        if($ck == 'import')
        {
            return $this->import($id);
        }
        if($ck == 'editimport')
        {
            return $this->edit_import($id);
        }
        if($ck == 'add_non')
        {
            return $this->add_non($id);
        }
        if($ck == 'barcode')
        {
            return $this->barcode($id);
        }
        if($ck == 'edit')
        {
            return $this->edit($id);
        }
    }

    private function barcode($id)
    {
        $barcode = DB::table('tb_product')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->join('tb_users','tb_users.u_id','=','tb_product_sn.u_id')
        ->groupBy('tb_product_detail.p_id')
        ->where('m_id',session()->get('mid'))
        ->where('tb_product.p_id',$id)
        ->where('ps_num','>','0')
        ->orderBy('tb_product_detail.created_at','asc')
        ->first();

        return view('product.barcode',[
            'barcode'=>$barcode
            ]);
    }

    public function create()
    {
        $scat = TbCategory::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('cat_name','asc')
                    ->select('cat_name','cat_id')
                    ->get();
        
        $ssup = TbSupplier::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        return view('product.create',[
            'scat'=>$scat,
            'ssup'=>$ssup
            ]);
    }

    private function add_non($id)
    {
        $ssup = TbSupplier::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        $data = TbProduct::findOrFail($id);

        return view('product.add_non',[
            'ssup'=>$ssup,
            'data'=>$data
            ]);
    }


    public function store(Request $request)
    {          
        if($request->ck == 'new')
        {
            return $this->store_new($request);
        }

        if($request->ck == 'add_non')
        {
            return $this->store_non($request);
        }

    }

    public function store_new($request)
    {
        $data = new TbProduct();

        $data->m_id = session()->get('mid');
        $data->p_barcode = $request->t_barcode;
        $data->p_name = $request->t_name;
        $data->cat_id = $request->s_cat;
        $data->p_low = $request->t_low;
        $data->p_stock = $request->s_stock;
        $data->p_price = $request->t_price;
        $data->p_unit = $request->t_unit;
        $data->p_detail = $request->t_detail;
        $data->p_status = '1';
        $data->p_sn = '0';
        $data->p_receive = '0';
        if($request->hasFile('image')){
            $filename = str_random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/images_product/' , $filename);
            Image::make(public_path() . '/images_product/' . $filename)->resize(50,50)->save(public_path() . '/images_product/resize/' . $filename);
            $data->p_image = $filename;
        }else{
            $data->p_image = 'nopic.jpg';
        }        

        $data->save();


        // ส่วนของรอบนำเข้า

        $data2 = new TbProductDetail();
        $data2->p_id = $data->p_id;
        $data2->pd_cost = $request->t_cost;
        $data2->pd_expired = $request->t_date;
        $data2->pd_alert = $request->t_alert;
        $data2->pd_guarantee = $request->t_claim;
        $data2->pd_status = '1';
        $data2->sup_id = $request->s_sup;
        $data2->u_id = session()->get('uid');
        $data2->save();

        $ins_sn = new TbProductSn();
        $ins_sn->pd_id = $data2->pd_id;
        $ins_sn->ps_sn = $request->t_barcode;
        $ins_sn->ps_num = $request->t_num;
        $ins_sn->u_id = session()->get('uid');
        $ins_sn->ps_status = '1';
        $ins_sn->save();

        SWAL::message('ผลการทำงาน','บันทึกสินค้าใหม่แล้ว','success',['timer'=>5000]);
        return redirect('/product/nonsn');

    }

    public function store_non($request)
    {            
        $data = new TbProductDetail();
        $data->p_id = $request->h_pid;
        $data->pd_cost = $request->t_cost;
        $data->pd_expired = $request->t_date;
        $data->pd_alert = $request->t_alert;
        $data->pd_guarantee = $request->t_claim;
        $data->pd_status = '1';
        $data->sup_id = $request->s_sup;
        $data->u_id = session()->get('uid');
        $data->save();

        $ins_sn = new TbProductSn();
        $ins_sn->pd_id = $data->pd_id;
        $ins_sn->ps_sn = $request->h_barcode;
        $ins_sn->ps_num = $request->t_num;
        $ins_sn->u_id = session()->get('uid');
        $ins_sn->ps_status = '1';
        $ins_sn->save();

        $pid = $data->p_id;
        SWAL::message('ผลการทำงาน','บันทึกการเพิ่มสินค้าแล้ว','success',['timer'=>5000]);

        return redirect('/product/nonsn');
    }
    
    
    public function balance()
    {
        $mid = session()->get('mid');

        $data = DB::table('tb_product')
        ->select('tb_product.p_id','ps_sn','p_barcode','p_name','p_buy',
                'cat_name')
        ->join('tb_category','tb_category.cat_id','=','tb_product.cat_id')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->groupBy('tb_product_detail.p_id')
        ->selectRaw('sum(ps_num) as psnum')
        ->where('m_id',$mid)
        ->where('p_sn','0')
        ->get();

        $data_sn = DB::table('tb_product')
        ->select('tb_product.p_id','ps_sn','p_barcode','p_name','p_buy',
                'cat_name')
        ->join('tb_category','tb_category.cat_id','=','tb_product.cat_id')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->groupBy('tb_product_detail.p_id')
        ->selectRaw('sum(ps_num) as psnum')
        ->where('m_id',$mid)
        ->where('p_sn','1')
        ->where('ps_status','1')
        ->get();

        return view('product.balance',[
            'data'=>$data,
            'data_sn'=>$data_sn
            ]);
    }

    // public function editsn($id)
    // {  
    //     $midup = session()->get('midup'); 

    //     $data = TbProduct::findOrFail($id);

    //     $scat = \App\TbCategory::where('m_id_up','=',$midup)
    //                 ->orderBy('cat_name','asc')
    //                 ->get();

    //     return view('product.editsncost',[
    //         'data'=>$data,
    //         'scat'=>$scat
    //         ]);
    // }

    public function edit($id)
    {  
        $ssup = TbSupplier::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        $sproduct = TbProduct::findOrFail($id);

        $scat = TbCategory::where('m_id_up','=',session()->get('midup'))
                    ->orderBy('cat_name','asc')
                    ->get();


        return view('product.edit_non',[
            'sproduct'=>$sproduct,
            'ssup'=>$ssup,
            'scat'=>$scat
            ]);
    }

    private function import($pid)
    {
         $sproduct = TbProduct::findOrFail($pid);
        // $import = TbProductDetail::where('p_id',$pid)->get();

        $import = DB::table('tb_product')
        ->select('tb_product.p_id','p_name','tb_product_detail.created_at','tb_product_sn.pd_id','pd_cost','pd_status','ps_num','ps_id','u_name','tb_product_detail.pd_id')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->join('tb_users','tb_users.u_id','=','tb_product_sn.u_id')
        ->where('m_id',session()->get('mid'))
        ->where('tb_product.p_id',$pid)
        ->where('p_sn','0')
        ->get();

        return view('product.import',[
            'sproduct'=>$sproduct,
            'import'=>$import
            ]);
    }

    private function edit_import($pdid)
    {
        $import = DB::table('tb_product_detail')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->where('tb_product_detail.pd_id',$pdid)
        ->first();

        return view('product.edit_import',[
            'import'=>$import
            ]);
    }

    private function update_import($request, $id)
    {
        $upd = new TbProductDetail();        
        $upd->updateProductdetail($request, $id);

        $updsn = new TbProductSn();
        $updsn->updateProductsn($request, $request->h_psid);

        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect('/product/import/'.$request->h_pid);
    }

    public function update(Request $request, $id)
    {

        if($request->ck == 'edit_import')
        {
                return $this->update_import($request, $id);
        }
        if($request->ck == 'edit_non')
        {
                return $this->update_non($request, $id);
        }
        if($request->ck == 'barcode')
        {
                return $this->barcode_a7($request, $id);
        }

    }

    private function barcode_a7($request, $id)
    {
        return view('product.barcode_a7',[
            'barcode'=>$request
            ]);
    }

    private function update_non($request, $id)
    {
        $upd = new TbProduct();        
        $upd->updateProduct($request, $id);

        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect('/product/nonsn');
    }

    public function low()
    {
        $mid = session()->get('mid');

        $data = DB::table('tb_product')
        ->select('tb_product.p_id','p_name','p_low','p_buy')
        ->join('tb_category','tb_category.cat_id','=','tb_product.cat_id')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->groupBy('tb_product_detail.p_id')
        ->selectRaw('sum(ps_num) as psnum')
        ->where('m_id',$mid)
        ->where('p_sn','0')
        ->where('p_status','1')
        ->where('ps_status','1')
        ->get();

        $data_sn = DB::table('tb_product')
        ->select('tb_product.p_id','p_name','p_low','p_buy')
        ->join('tb_category','tb_category.cat_id','=','tb_product.cat_id')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->groupBy('tb_product_detail.p_id')
        ->selectRaw('sum(ps_num) as psnum')
        ->where('m_id',$mid)
        ->where('p_sn','1')
        ->where('p_status','1')
        ->where('ps_status','1')
        ->get();

        return view('product.low',[
            'data'=>$data,
            'data_sn'=>$data_sn
            ]);
    }

    // public function store(Request $req)
    // {
    //     if($req->ck == 'add_buy')
    //     {
    //         return $this->add_buy($req,'/low');
    //     }

    //     if($req->ck == 'add_balance')
    //     {
    //         return $this->add_buy($req,'/balance');
    //     }
    // }

    public function add_buy($req,$page)
    {
        $product = new TbProduct();
        $data = $this->validate($req, [
            't_buy'=>'required'
        ],[
            't_buy.required'=>'โปรดระบุจำนวนที่ต้องการซื้อ'
        ]);
        $data['pid'] = $req->h_pid;

        $product->updateBuy($data);

        SWAL::message('ผลการทำงาน','เพิ่มจำนวนซื้อแล้ว','success',['timer'=>5000]);     
        return redirect($page);
    }

    public function buy()
    {
        $mid = session()->get('mid');

        $data = DB::table('tb_product')
        ->select('tb_product.p_id','p_name','p_low','p_buy')
        ->join('tb_category','tb_category.cat_id','=','tb_product.cat_id')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->groupBy('tb_product_detail.p_id')
        ->selectRaw('sum(ps_num) as psnum')
        ->where('m_id',$mid)
        ->where('p_sn','0')
        ->where('p_buy','>','0')
        ->where('p_status','1')
        ->where('ps_status','1')
        ->get();

        $data_sn = DB::table('tb_product')
        ->select('tb_product.p_id','p_name','p_low','p_buy')
        ->join('tb_category','tb_category.cat_id','=','tb_product.cat_id')
        ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
        ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
        ->groupBy('tb_product_detail.p_id')
        ->selectRaw('sum(ps_num) as psnum')
        ->where('m_id',$mid)
        ->where('p_sn','1')
        ->where('p_buy','>','0')
        ->where('p_status','1')
        ->where('ps_status','1')
        ->get();

        return view('product.buy',[
            'data'=>$data,
            'data_sn'=>$data_sn
            ]);
    }

    public function checklow($ck,$id)
    {
        if($ck == 'buy_cancel')
        {
                return $this->buy_cancel($id);
        }

        if($ck == 'buy_import')
        {
                return $this->buy_import($id);
        }
    }

    private function buy_cancel($id)
    {
        $product = new TbProduct();
        $data['t_buy'] = '0';
        $data['pid'] = $id;

        $product->updateBuy($data);

        SWAL::message('ผลการทำงาน','ยกเลิกรายการรอซื้อแล้ว','success',['timer'=>5000]);     
        return redirect('/buy');
    }

    public function buy_import($id)
    {


        // SWAL::message('ผลการทำงาน','เพิ่มจำนวนซื้อแล้ว','success',['timer'=>5000]);     
        // return redirect('/buy');
    }

}
