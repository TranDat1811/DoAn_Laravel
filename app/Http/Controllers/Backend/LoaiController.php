<?php

namespace App\Http\Controllers\Backend;

use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;


class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_loai = Loai::all();
        return view('backend.loai.index')
            ->with('ds_loai', $ds_loai)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loai = Loai::find($id);
        return view('backend.loai.edit')
                ->with('loai', $loai)
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loai = Loai::find($id);
        $loai->l_ten = $request->l_ten;
        $loai->l_trangThai = $request->l_trangThai;
        $loai->l_capNhat = $request->l_capNhat;

        $loai->save();

        Session::flash('alert-success', "Sửa thành công !");
        return redirect()->route('admin.loai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
