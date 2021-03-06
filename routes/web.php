<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route Backend 
Route::get("/admin", function(){
    return view('backend.index'); 
}) -> name('admin.index');

Route::resource('/admin/loai', 'Backend\LoaiController', ['as' => 'admin']);
Route::resource('/admin/sanpham', 'Backend\SanPhamController', ['as' => 'admin']);

//Các báo cáo
Route::get('/admin/baocao/donhang', 'Backend\BaoCaoController@donhang')->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', 'Backend\BaoCaoController@donhangData')->name('backend.baocao.donhang.data');



//End Route Backend 

//---------------------------------------------- Route Frontend------------------------------------------------
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.pages.index');
Route::get('/about', 'Frontend\FrontendController@about')->name('frontend.pages.about');
Route::get('/service', 'Frontend\FrontendController@service')->name('frontend.pages.service');
Route::get('/contact', 'Frontend\FrontendController@contact')->name('frontend.pages.contact');
Route::post('/contact/sendmail', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMail');


Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');



// End Route Frontend