<?php

namespace App\Http\Controllers\Backend;

use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
use App\Http\Requests\LoaiCreateRequest;
use Storage;

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
        $loai->l_ten = $request->l_ten;
        $loai->l_moTa = $request->l_moTa;
        $loai->l_trangThai = $request->l_trangThai;

        if($request->hasFile('l_hinhAnh'))
        {
            $file = $request->l_hinhAnh;

            // Lưu tên hình vào column sp_hinh
            $loai->l_hinhAnh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos/loai', $loai->l_hinhAnh);
        }

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
        $loai->l_ten = $request->l_ten;
        $loai->l_moTa = $request->l_moTa;
        $loai->l_trangThai = $request->l_trangThai;

        if($request->hasFile('l_hinhAnh'))
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/loai' . $loai->l_hinhAnh);

            // Upload hình mới
            // Lưu tên hình vào column l_hinhAnh
            $file = $request->l_hinhAnh;
            $loai->l_hinhAnh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos/loai"
            $fileSaved = $file->storeAs('public/photos/loai', $loai->l_hinhAnh);
        }
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
