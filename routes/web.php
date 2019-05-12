<?php

use App\TbWalletCat;
use Illuminate\Support\Facades\Request;


Route::view('/','auth.login');
Route::view('/login','auth.login');
Route::match(['get','post'],'/login',"Auth\LoginController@login")->name('login');
Route::post('/loginme','Auth\LoginController@login');
Route::get('/logout',"Auth\LoginController@logout");

Route::get('/register','Auth\RegisterController@index');
Route::post('/register','Auth\RegisterController@register');

    
Route::group(['middleware' => 'auth'], function () {

    // -----  หน้าแรก


    //Route::get('/store','TbShopController@index');
    Route::resource('store_update','TbShopController');    

    Route::resource('store','TbShopController');

    //Route::get('/employee/list/{id}','TbUsersController@check');  //new
    Route::get('/employee/{work}/{id}','TbUsersController@work');  //new
    Route::resource('employee','TbUsersController');

    Route::get('/payment/bank','PaymentController@bank');  //new
    Route::get('/payment/credit','PaymentController@credit');  //new
    Route::get('/payment/coupon','PaymentController@coupon');  //new
    Route::get('/payment/currency','PaymentController@currency');  //new
    Route::get('/payment/{work}/{type}','PaymentController@work');  //new
    Route::resource('payment','PaymentController');

    
    //Route::get('/invite','UserManageController@invite');  //new
    Route::get('/invite/{work}/{id}','TbInviteController@work');  //new
    Route::resource('invite','TbInviteController');

    // ------- end หน้าแรก

    Route::get('/dashboard','DashboardController@index');

    // ช่องทางการขาย
    
    Route::get('/sale/{ck}','TbSaleController@check');  //new
    Route::get('/sale/{work}/{id}','TbSaleController@work');  //new
    Route::get('/sale/cancel/{sid}/{psid}','TbSaleController@del_one');  //new
    Route::post('/sale/pos','TbSaleController@pos');  //new
    Route::resource('/sale','TbSaleController');  //new

    // autocomplete
    Route::get('autocomplete', 'TbSaleController@autocomp')->name('autocomp');


    Route::get('/salebill/{id}/{pp}','TbSaleBillController@go_to_bill_re');  //new
    Route::resource('/salebill','TbSaleBillController');  //new
    Route::get('salebill_product','TbSaleController@check_product');  //new
    Route::post('salebill_pay','TbSaleBillController@pay');  //new
    Route::get('re_print_receive/{sbno}/{pp}','TbSaleBillController@re_print_receive');


    //  คลังสินค้า
 
    Route::get('cat_product','TbCategoryController@index');
    //Route::get('/cat_product/read-data','TbCategoryController@readData'); // jquery
    //Route::post('productcat/add','TbCategoryController@store'); // jquery
    Route::resource('productcat','TbCategoryController');

    Route::get('/supplier','TbSupplierController@index');
    Route::resource('supplier','TbSupplierController');
    
    // Route::get('/pro_cost/{ck}/{pid}','TbProductAddController@check');  //new
    // Route::get('/pro_cost/del/{psid}/{pdid}','TbProductAddController@destroy');  //new
    // Route::resource('/pro_cost/pro_add','TbProductAddController');   //new


    Route::get('/product/nonsn','TbProductController@index');  //new
    // Route::get('/product/import/{id}','TbProductController@import');  //new
    // Route::get('/product/editimport/{id}','TbProductController@edit_import');  //new
    // Route::get('/product/add_non/{id}','TbProductController@add_non');  //new
    Route::get('/product/{ck}/{id}','TbProductController@check');
    Route::resource('product','TbProductController');

    Route::get('/productsn/sn','TbProductSnController@index');  //new
    Route::get('/productsn/import/{id}','TbProductSnController@import');  //new
    Route::get('/productsn/editimport/{id}','TbProductSnController@edit_import');  //new
    Route::get('/productsn/add_sn/{id}','TbProductSnController@add_sn'); //new
    Route::get('/productsn/add_snplus/{id}','TbProductSnController@add_snplus'); //new
    Route::resource('productsn','TbProductSnController');



// -------------

    
    Route::get('/user_manage','UserManageController@index');  //new
    Route::get('/user_manage/{ck}/{mid}','UserManageController@check');  //new
    Route::resource('/user_manage','UserManageController');  //new

    Route::get('/myshop','UserManageController@myshop');  //new
    Route::get('myaccount','TbUsersController@myaccount');  //new

    //รายการหลัก
    

    //รายการสินค้า
    //Route::view('/balance','product.balance');
    Route::get('/balance','TbProductController@balance');
    //Route::resource('pronew','TbProductNewController');   

    Route::get('/list/salelist','TbSaleBillController@salelist');
    Route::get('/list/cancel_salelist/{id}','TbSaleBillController@cancel_salelist');
    Route::get('/list/sale_detail/{id}','TbSaleBillController@sale_detail');
    // Route::get('/list/income','TbWalletController@incomelist');
    // Route::get('/list/expen','TbWalletController@expenlist');

    Route::get('/buy','TbProductController@buy');
    Route::get('/low','TbProductController@low');
    Route::resource('add_low','TbProductController');
    Route::get('/pro_low/{ck}/{id}','TbProductController@checklow');

    Route::view('/check/barcode','check.barcode');
    Route::view('/check/name','check.name');
    Route::view('/check/date','check.date');

    //จัดการสินค้า

    //Route::view('/product/import','product.import');
    Route::view('/product/price','product.price');

    //Route::get('/product/have','TbProductHaveController@index');
    //Route::get('/product/{ck}/{pid}','TbProductAddController@check');  //new
    Route::resource('pro_add','TbProductAddController');   //new

    //Route::view('/product/new_sn','product.new_sn');
    Route::get('/product/new_sn','TbProductNewsnController@index');
    Route::resource('pronewsn','TbProductNewsnController');

    //Route::view('/product/have_sn','product.have_sn');
    Route::get('/product/have_sn','TbProductHavesnController@index');
    Route::resource('prohavesn','TbProductHavesnController');  
    Route::resource('prohave_barcode','TbProductSnController');  

    //Route::resource('product','TbProductController');

    Route::get('/listpro/{ck}','TbProductController@check');  //new


    //Route::view('/barcode/a7','barcode.a7');

    // Route::get('/barcode/list','TbBarcodeController@index');
    // Route::get('/barcode/{ck}/{id}','TbBarcodeController@check');
    // Route::resource('barcode','TbBarcodeController');

    //ออกเอกสาร
    Route::get('/doc/list','TbOrderController@index');
    Route::get('/doc/order','TbOrderController@order');
    Route::get('/order/{ck}/{id}','TbOrderController@check');
    Route::resource('order','TbOrderController');

    Route::view('/claim/list','claim.list');
    Route::view('/claim/check','claim.check');
    Route::view('/claim/update','claim.update');

    //รายงาน 
    Route::view('/report','report.home');

    //จัดดการร้านค้า

    Route::get('/cat_wallet','TbWalletCatController@index');
    Route::resource('walletcat','TbWalletCatController');

    Route::get('/receive/{ck}','TbReceiveController@check');  //new
    Route::get('/receive/{work}/{id}','TbReceiveController@work');  //new
    Route::resource('/receive/receive','TbReceiveController@check');  //new

    //Route::resource('product','TbProductController');
    Route::get('product/edit','TbProductController@edit');

    Route::view('/stock/off','manage.stock.off');
    Route::view('/stock/list','manage.stock.list');

    //จัดการร้านสาขา
    Route::view('/branch_shop','branch.list');
    Route::view('/branch_sum','branch.sum');
    Route::view('/request_branch','branch.request');
    Route::view('/request/list','request.list');
    Route::view('request/wait','request.wait');
    Route::view('/transfer','request.transfer');
    Route::view('/change_pass','manage.employee.change_pass');

    //etc
    Route::get('api/get-wcat-list','TbWalletCatController@getWcatList');
    


});

