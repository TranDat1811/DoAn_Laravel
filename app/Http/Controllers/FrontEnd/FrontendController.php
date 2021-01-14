<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\ContactMailer;

class FrontendController extends Controller
{
    
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
