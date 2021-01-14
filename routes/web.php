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

Route::get('/', function () {
    return view('frontend.pages.index');
});


Route::get('/xuatxu', 'FrontEnd\XuatXuController@index') -> name('xuatxu.index');

Route::get("/admin", function(){
    return view('backend.index'); 
}) -> name('admin.index');

Route::resource('/admin/loai', 'Backend\LoaiController', ['as' => 'admin']);

Route::get('/contact', 'Frontend\FrontendController@contact')->name('frontend.pages.contact');
Route::get('/about', 'Frontend\FrontendController@about')->name('frontend.pages.about');
Route::get('/service', 'Frontend\FrontendController@service')->name('frontend.pages.service');


Route::post('/contact/sendmail', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMail');