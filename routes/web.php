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
//End Route Backend 

// Route Frontend
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.pages.index');
Route::get('/about', 'Frontend\FrontendController@about')->name('frontend.pages.about');
Route::get('/service', 'Frontend\FrontendController@service')->name('frontend.pages.service');
Route::get('/contact', 'Frontend\FrontendController@contact')->name('frontend.pages.contact');
Route::post('/contact/sendmail', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMail');
// End Route Frontend