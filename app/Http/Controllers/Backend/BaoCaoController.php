<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaoCaoController extends Controller
{
    // Hiển thị view báo cáo đơn hàng
    public function donhang(){
        return view('backend.reports.donhang');
    }
    //Ajax để get data cho báo cáo đơn hàng
    

}
