<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use Auth;
use App\User;
use App\TbProduct;
use App\TbSupplier;
use App\TbProductDetail;
use App\TbProductSn;
//use App\TbUsers;
use DB;

use App\TbCategory;
use App\TbShop;
use Image;

class TbProductAddController extends Controller
{
    public function check($ck,$pid)
    {
        $mid = session()->get('mid');
        $midup = session()->get('midup');

        if($ck == 'add')
        {
            // if($pid == 'new')
            // {
            //     return $this->addnew($midup);
            // }
            if($pid == 'newsn')
            {
                return $this->addnew_sn($midup);
            }

            //return $this->addhave();
        }

        if($ck == 'addhave')
        {
            return $this->addhave($pid,$mid,$midup);
        }

        if($ck == 'addhavesn')
        {
            return $this->addhave_sn($pid);
        }

        if($ck == 'edit')
        {
            return $this->edit_non($pid);
        }

        if($ck == 'editsn')
        {
            return $this->edit_sn($pid);
        }

        if($ck == 'add_serial')
        {
            return $this->add_serialnumber($pid);
        }

        if($ck == 'add_done')
        {
            return $this->add_done($midup,$pid);
        }
    }

    public function add_done($midup,$pid)
    {
        $ssup = TbSupplier::where('m_id_up','=',$midup)
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        $sproduct = TbProduct::findOrFail($pid);

        $scat = TbCategory::where('m_id_up','=',$midup)
                    ->orderBy('cat_name','asc')
                    ->get();

        $import = DB::table('tb_product_detail')
                    ->select('pd_id','p_id','pd_cost','pd_price','pd_status','tb_product_detail.created_at','u_name')
                    ->join('tb_users','tb_users.u_id','=','tb_product_detail.u_id')
                    ->where('p_id',$pid)
                    ->get();

        return view('product.editcost_sn',[
            'sproduct'=>$sproduct,
            'ssup'=>$ssup,
            'pid'=>$pid,
            'scat'=>$scat,
            'import'=>$import
            ]);
    }

    // public function addnew($midup)
    // {    
    //     $scat = TbCategory::where('m_id_up','=',$midup)
    //                 ->orderBy('cat_name','asc')
    //                 ->pluck('cat_name','cat_id');

    //     return view('product.new',[
    //         'scat'=>$scat
    //         ]);
    // }

    public function addnew_sn($midup)
    {
        $scat = TbCategory::where('m_id_up','=',$midup)
                    ->orderBy('cat_name','asc')
                    ->pluck('cat_name','cat_id');

        return view('product.new_sn',[
            'scat'=>$scat
            ]);
    }

    public function addhave($pid,$mid,$midup)
    {
        $ssup = TbSupplier::where('m_id_up','=',$midup)
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        $sproduct = TbProduct::findOrFail($pid);

        $scat = TbCategory::where('m_id_up','=',$midup)
                    ->orderBy('cat_name','asc')
                    ->get();

        $import = TbProductDetail::where('p_id',$pid)->get();

        return view('product.editcost',[
            'sproduct'=>$sproduct,
            'ssup'=>$ssup,
            'pid'=>$pid,
            'scat'=>$scat,
            'import'=>$import
            ]);
    }



    public function add_serialnumber($pdid)
    {
        $product = DB::table('tb_product')
                ->select('tb_product.p_id','p_name','tb_product_detail.created_at')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->where('pd_id',$pdid)
                ->first();

        $sn = TbProductSn::where('pd_id',$pdid)->get();

        return view('product.add_sn',[
            'pdid'=>$pdid,
            'product'=>$product,
            'sn'=>$sn
            ]);
    }
    
    public function index()
    {
        //
    }

    public function store(Request $request)
    {        
        if($request->ck == 'new')
        {
            return $this->store_new($request);
        }

        if($request->ck == 'newsn')
        {
            return $this->store_newsn($request);
        }

        if($request->ck == 'have')
        {
            return $this->store_have($request);
        }

        if($request->ck == 'have_sn')
        {
            return $this->store_have_sn($request);
        }

        if($request->ck == 'update')
        {
            //
        }

        if($request->ck == 'add_sn')
        {
            return $this->add_sn($request);
        }
    }

    public function add_sn($request)
    {            
        $data = new TbProductSn();

        $data->pd_id = $request->h_pdid;
        $data->ps_sn = $request->t_sn;
        $data->ps_num = '1';
        $data->ps_status = '1';
        $data->u_id = session()->get('uid');

        $data->save();

        $pdid = $data->pd_id;
        //SWAL::message('ผลการทำงาน','บันทึกรอบนำเข้าสินค้าแล้ว','success',['timer'=>5000]);

        $product = DB::table('tb_product')
                ->select('tb_product.p_id','p_name','tb_product_detail.created_at')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->where('pd_id',$pdid)
                ->first();

        $sn = TbProductSn::where('pd_id',$pdid)->get();

        return view('product.add_sn',[
            'pdid'=>$pdid,
            'product'=>$product,
            'sn'=>$sn
            ]);
    }

    // public function store_have($request)
    // {            
    //     $data = new TbProductDetail();
    //     $data->p_id = $request->h_pid;
    //     //$data->pd_num = $request->t_num;
    //     $data->pd_cost = $request->t_cost;
    //     $data->pd_price = $request->t_price;
    //     $data->pd_expired = $request->t_date;
    //     $data->pd_alert = $request->t_alert;
    //     $data->pd_guarantee = $request->t_claim;
    //     $data->pd_status = '2';
    //     $data->sup_id = $request->s_sup;
    //     $data->u_id = session()->get('uid');
    //     $data->save();

    //     $ins_sn = new TbProductSn();
    //     $ins_sn->pd_id = $data->pd_id;
    //     $ins_sn->ps_sn = $request->h_barcode;
    //     $ins_sn->ps_num = $request->t_num;
    //     $ins_sn->u_id = session()->get('uid');
    //     $ins_sn->ps_status = '1';
    //     $ins_sn->save();

    //     $pid = $data->p_id;
    //     SWAL::message('ผลการทำงาน','บันทึกรอบนำเข้าสินค้าแล้ว','success',['timer'=>5000]);

    //     $mid = session()->get('mid');
    //     $midup = session()->get('midup');

    //     $ssup = TbSupplier::where('m_id_up','=',$midup)
    //                 ->orderBy('sup_name','asc')
    //                 ->pluck('sup_name','sup_id');

    //     $sproduct = TbProduct::findOrFail($pid);

    //     $scat = TbCategory::where('m_id_up','=',$midup)
    //                 ->orderBy('cat_name','asc')
    //                 ->get();

    //     //$import = TbProductDetail::where('p_id',$pid)->get();
    //     $import = DB::table('tb_product_detail')
    //                 ->select('tb_product_detail.pd_id','p_id','pd_cost','pd_price','pd_status','ps_num','tb_product_detail.created_at','u_name')
    //                 ->join('tb_product_sn','tb_product_sn.pd_id','=','tb_product_detail.pd_id')
    //                 ->join('tb_users','tb_users.u_id','=','tb_product_detail.u_id')
    //                 ->where('p_id',$pid)
    //                 ->get();

    //     return view('product.editcost',[
    //         'sproduct'=>$sproduct,
    //         'ssup'=>$ssup,
    //         'pid'=>$pid,
    //         'scat'=>$scat,
    //         'import'=>$import
    //         ]);
    // }

    public function store_have_sn($request)
    {            
        $data = new TbProductDetail();

        $data->p_id = $request->h_pid;
        $data->pd_cost = $request->t_cost;
        $data->pd_price = $request->t_price;
        $data->pd_expired = $request->t_date;
        $data->pd_alert = $request->t_alert;
        $data->pd_guarantee = $request->t_claim;
        $data->pd_status = '2';
        $data->sup_id = $request->s_sup;
        $data->u_id = session()->get('uid');

        $data->save();

        $pid = $data->p_id;
        SWAL::message('ผลการทำงาน','บันทึกรอบนำเข้าสินค้าแล้ว','success',['timer'=>5000]);

        $mid = session()->get('mid');
        $midup = session()->get('midup');

        $ssup = TbSupplier::where('m_id_up','=',$midup)
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        $sproduct = TbProduct::findOrFail($pid);

        $scat = TbCategory::where('m_id_up','=',$midup)
                    ->orderBy('cat_name','asc')
                    ->get();

        //$import = TbProductDetail::where('p_id',$pid)->get();
        $import = DB::table('tb_product_detail')
                    ->select('pd_id','p_id','pd_cost','pd_price','pd_status','tb_product_detail.created_at','u_name')
                    ->join('tb_users','tb_users.u_id','=','tb_product_detail.u_id')
                    ->where('p_id',$pid)
                    ->get();

        return view('product.editcost_sn',[
            'sproduct'=>$sproduct,
            'ssup'=>$ssup,
            'pid'=>$pid,
            'scat'=>$scat,
            'import'=>$import
            ]);
    }

    // public function store_new($request)
    // {
          
    //     $data = new TbProduct();

    //     $data->m_id = session()->get('mid');
    //     $data->p_barcode = $request->t_barcode;
    //     $data->p_name = $request->t_name;
    //     $data->cat_id = $request->s_cat;
    //     $data->p_low = $request->t_low;
    //     $data->p_status = '1';
    //     $data->p_sn = '0';
    //     if($request->hasFile('image')){
    //         $filename = str_random(10) . '.' . $request->file('image')->getClientOriginalExtension();
    //         $request->file('image')->move(public_path() . '/images_product/' , $filename);
    //         Image::make(public_path() . '/images_product/' . $filename)->resize(50,50)->save(public_path() . '/images_product/resize/' . $filename);
    //         $data->p_image = $filename;
    //     }else{
    //         $data->p_image = 'nopic.jpg';
    //     }        

    //     $data->save();

    //     //$pid = response()->json(array('success' => true, 'last_insert_id' => $data->p_id), 200);
    //     $pid = $data->p_id;
    //     SWAL::message('ผลการทำงาน','บันทึกสินค้าใหม่แล้ว ต่อไปเพิ่มรอบนำเข้าสินค้า','success',['timer'=>5000]);

    //     $mid = session()->get('mid');
    //     $midup = session()->get('midup');
        
    //     // $sproduct = TbProduct::where('m_id',$mid)
    //     //             ->where('p_id',$pid)
    //     //             ->where('p_status','1')
    //     //             ->orderBy('p_name','asc')
    //     //             ->get();

    //     $sproduct = TbProduct::findOrFail($pid);
        
    //     $ssup = TbSupplier::where('m_id_up','=',$midup)
    //                 ->orderBy('sup_name','asc')
    //                 ->pluck('sup_name','sup_id');

    //     $scat = TbCategory::where('m_id_up','=',$midup)
    //                 ->orderBy('cat_name','asc')
    //                 ->pluck('cat_name','cat_id');

    //     $import = TbProductDetail::where('p_id',$pid)->get();

    //     return view('product.editcost',[
    //         'sproduct'=>$sproduct,
    //         'ssup'=>$ssup,
    //         'pid'=>$pid,
    //         'scat'=>$scat,
    //         'import'=>$import
    //         ]);
    // }

    public function store_newsn($request)
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
        SWAL::message('ผลการทำงาน','บันทึกสินค้าใหม่แล้ว ต่อไปเพิ่มรอบนำเข้าสินค้า','success',['timer'=>5000]);

        $mid = session()->get('mid');
        $midup = session()->get('midup');
        
        // $sproduct = TbProduct::where('m_id',$mid)
        //             ->where('p_status','1')
        //             ->orderBy('p_name','asc')
        //             ->get();

        $sproduct = TbProduct::findOrFail($pid);

        $ssup = TbSupplier::where('m_id_up','=',$midup)
                    ->orderBy('sup_name','asc')
                    ->pluck('sup_name','sup_id');

        $scat = TbCategory::where('m_id_up','=',$midup)
                    ->orderBy('cat_name','asc')
                    ->pluck('cat_name','cat_id');

        $import = TbProductDetail::where('p_id',$pid)->get();

        return view('product.editcost_sn',[
            'sproduct'=>$sproduct,
            'ssup'=>$ssup,
            'pid'=>$pid,
            'scat'=>$scat,
            'import'=>$import
            ]);
    }

    public function destroy($psid, $pdid){
        $sn = TbProductSn::find($psid);
        $sn->delete();

        $product = DB::table('tb_product')
                ->select('tb_product.p_id','p_name','tb_product_detail.created_at')
                ->join('tb_product_detail','tb_product_detail.p_id','=','tb_product.p_id')
                ->where('pd_id',$pdid)
                ->first();

        $sn = TbProductSn::where('pd_id',$pdid)->get();

        return view('product.add_sn',[
            'pdid'=>$pdid,
            'product'=>$product,
            'sn'=>$sn
            ]);
    }
}
