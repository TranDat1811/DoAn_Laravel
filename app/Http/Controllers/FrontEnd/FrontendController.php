<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function contact(Request $request)
    {
        $input = $request->all();
        Mail::to('hotro.hoclaravel@gmail.com')->send(new ContactMailer($input));
        return $input;
    }
}
