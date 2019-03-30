<?php

use App\TbWalletCat;
use Illuminate\Support\Facades\Request;


Route::view('/','auth.login2');
Route::view('/login','auth.login2');
Route::match(['get','post'],'/login2',"Auth\LoginController@login")->name('login');
Route::post('/loginme','Auth\LoginController@login');
Route::get('/logout',"Auth\LoginController@logout");

Route::get('/register','Auth\RegisterController@index');
Route::post('/register','Auth\RegisterController@register');

    
Route::group(['middleware' => 'auth'], function () {


    //Route::get('/barcode', 'TbWalletCatController@index');
    Route::view('/dashboard','dashboard');
    Route::get('/user_manage','UserManageController@index');  //new
    Route::get('/user_manage/{ck}/{mid}','UserManageController@check');  //new
    Route::resource('/user_manage','UserManageController');  //new

    //รายการหลัก
    //Route::view('/sale','sale.sale');
    Route::get('/sale/{ck}','TbSaleController@check');  //new
    Route::get('/sale/{work}/{id}','TbSaleController@work');  //new
    Route::get('/sale/cancel/{sid}/{psid}','TbSaleController@del_one');  //new
    Route::resource('/sale','TbSaleController');  //new

    Route::resource('/salebill','TbSaleBillController');  //new

    //Route::view('/wallet/income','wallet.income');  
    Route::get('/wallet/income','TbWalletController@index');
    Route::resource('wallet_income','TbWalletController');

    //Route::view('/wallet/expen','wallet.expen');
    Route::get('/wallet/expen','TbWalletexpController@index');
    Route::resource('wallet_expen','TbWalletexpController');

    
    Route::view('/cut/expired','expired.list');
    Route::view('/cut/break','break.list');
    Route::view('/cut/share','share.list');
    Route::resource('cut','CutProductController');

    //Route::view('/invoice/list','invoice.list');
    //Route::view('/invoice/invoice','invoice.invoice');
    Route::get('/invoice/invoice','TbInvoiceController@index');
    Route::get('/invoice/list','TbInvoiceController@list');
    Route::get('/invoice/{ck}/{id}','TbInvoiceController@check');
    Route::resource('invoice','TbInvoiceController');

    //รายการสินค้า
    //Route::view('/balance','product.balance');
    Route::get('/balance','TbProductController@balance');
    //Route::resource('pronew','TbProductNewController');   

    Route::get('/list/salelist','TbSaleBillController@salelist');
    Route::get('/list/income','TbWalletController@incomelist');
    Route::get('/list/expen','TbWalletController@expenlist');

    Route::get('/buy','TbProductController@buy');
    Route::get('/low','TbProductController@low');
    Route::resource('add_low','TbProductController');
    Route::get('/pro_low/{ck}/{id}','TbProductController@checklow');

    Route::view('/check/barcode','check.barcode');
    Route::view('/check/name','check.name');
    Route::view('/check/date','check.date');

    //จัดการสินค้า
    
    //Route::view('/product/new','product.new');
    //Route::get('/product/new','TbProductNewController@index');   // new
    //Route::resource('pronew','TbProductNewController');    

    //Route::view('/product/import','product.import');
    Route::view('/product/price','product.price');

    //Route::get('/product/have','TbProductHaveController@index');
    Route::get('/product/{ck}/{pid}','TbProductAddController@check');  //new
    Route::resource('pro_add','TbProductAddController');   //new

    //Route::view('/product/new_sn','product.new_sn');
    Route::get('/product/new_sn','TbProductNewsnController@index');
    Route::resource('pronewsn','TbProductNewsnController');

    //Route::view('/product/have_sn','product.have_sn');
    Route::get('/product/have_sn','TbProductHavesnController@index');
    Route::resource('prohavesn','TbProductHavesnController');  
    Route::resource('prohave_barcode','TbProductSnController');  

    //Route::view('/listpro/list','product.list');
    //Route::get('/listpro/list','TbProductController@index');
    //Route::view('/listpro/list_sn','product.list_sn');
    //Route::get('/listpro/list_sn','TbProductController@indexsn');
    Route::resource('product','TbProductController');

    Route::get('/listpro/{ck}','TbProductController@check');  //new


    Route::view('/barcode/a7','barcode.a7');

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
    //Route::view('/employee','manage.employee.list'); 
    //Route::get('/employee','TbUsersController@index');
    //Route::get('/user/create','TbUsersController@create');

    Route::get('/employee/{ck}','TbUsersController@check');  //new
    Route::resource('employee','TbUsersController');


    //Route::view('/cat_product','category.product');    
    Route::get('/cat_product','TbCategoryController@index');
    Route::resource('productcat','TbCategoryController');

    Route::get('/cat_wallet','TbWalletCatController@index');
    Route::resource('walletcat','TbWalletCatController');

    Route::get('/supplier','TbSupplierController@index');
    Route::resource('supplier','TbSupplierController');

    //Route::view('/pro_cost/list','product.list_cost');
    //Route::get('/pro_cost/list','TbProductController@list_cost');

    //Route::view('/pro_cost/list_sn','product.list_cost_sn');
    //Route::get('/pro_cost/list_sn','TbProductController@listsn_cost');

    Route::get('/pro_cost/{ck}','TbProductController@check');  //new
    Route::get('/pro_cost/{ck}/{pid}','TbProductAddController@check');  //new
    Route::get('/pro_cost/del/{psid}/{pdid}','TbProductAddController@destroy');  //new
    Route::resource('/pro_cost/pro_add','TbProductAddController');   //new

    Route::get('/receive/{ck}','TbReceiveController@check');  //new
    Route::get('/receive/{work}/{id}','TbReceiveController@work');  //new
    Route::resource('/receive/receive','TbReceiveController@check');  //new

    Route::resource('product','TbProductController');
    Route::get('product/edit','TbProductController@edit');

    Route::view('/stock/off','manage.stock.off');
    Route::view('/stock/list','manage.stock.list');

    //Route::view('/store','manage.store.store');
    Route::get('/store','TbShopController@index');
    Route::resource('store_update','TbShopController');    

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

