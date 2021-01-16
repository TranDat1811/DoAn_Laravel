<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\ContactMailer;
use App\Loai;
use App\Sanpham;


class FrontendController extends Controller
{
    public function index()
    {
        $ds_loai = Loai::all();
        $ds_sp = SanPham::all();
        return view('frontend.pages.index')
            ->with('ds_loai', $ds_loai)
            ->with('ds_sp', $ds_sp);
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function about()
    {
        return view('frontend.pages.about');
    }public function service()
    {
        return view('frontend.pages.service');
    }
    public function sendMailContactForm(Request $request)
    {
        $input = $request->all();
        Mail::to('lethanhluong98@gmail.com')->send(new ContactMailer($input));
        return $input;
    }
}
