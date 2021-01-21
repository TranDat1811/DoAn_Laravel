<?php

namespace App\Http\Controllers\Backend;

use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
use App\Http\Requests\LoaiCreateRequest;

class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_loai = Loai::paginate(5);
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
        return view('backend.loai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaiCreateRequest $request)
    {
        //
        $loai = new Loai();
        $loai->l_ma = $request->l_ma;
        $loai->l_ten = $request->l_ten;
        $loai->l_mota = $request->l_mota;
        $loai->l_hinhanh = $request->l_hinhanh;
        $loai->l_trangThai = $request->l_trangThai;

        $loai->save();

        Session::flash('alert-success', "Thêm mới thành công !");
        return redirect()->route('admin.loai.index');
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
        $loai->l_ma = $request->l_ma;
        $loai->l_ten = $request->l_ten;
        $loai->l_mota = $request->l_mota;
        $loai->l_hinhanh = $request->l_hinhanh;
        $loai->l_trangThai = $request->l_trangThai;

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
        $loai = Loai::find($id);
        $loai->delete();

        Session::flash('alert-success', "Xoá thành công !");
        return redirect(route('admin.loai.index'));
    }
}
