<?php

namespace App\Http\Controllers\Backend;

use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\Loai;
use App\NhaCungCap;
use Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_sp = SanPham::paginate(10);
        return view('backend.sanpham.index')
            ->with('ds_sp', $ds_sp)
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
        $dsLoai = Loai::all();
        $dsNcc = NhaCungCap::all();
        return view('backend.sanpham.create')
                ->with('dsLoai', $dsLoai)
                ->with('dsNcc', $dsNcc);
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
        $sp = new SanPham();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_moTa_ngan = $request->sp_moTa_ngan;
        $sp->sp_moTa = $request->sp_moTa;
        $sp->sp_giaNhap = $request->sp_giaNhap;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_soLuong = $request->sp_soLuong;
        $sp->sp_noiBat = $request->sp_noiBat;
        $sp->sp_moi = $request->sp_moi;
        $sp->l_ma = $request->l_ma;
        $sp->ncc_ma = $request->ncc_ma;
        $sp->sp_trangThai = $request->sp_trangThai;

        if($request->hasFile('sp_hinhAnh'))
        {
            $file = $request->sp_hinhAnh;

            // Lưu tên hình vào column sp_hinh
            $sp->sp_hinhAnh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos/sanpham', $sp->sp_hinhAnh);
        }

        $sp->save();
        Session::flash('alert-success', "Thêm mới thành công !");
        return redirect()->route('admin.sanpham.index');
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
        //
        $sp = SanPham::find($id);
        $dsLoai = Loai::all();
        $dsNcc = NhaCungCap::all();
        return view('backend.sanpham.edit')
            ->with('sp', $sp)
            ->with('dsLoai', $dsLoai)
            ->with('dsNcc', $dsNcc)
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
        //
        $sp = SanPham::find($id);
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_moTa_ngan = $request->sp_moTa_ngan;
        $sp->sp_moTa = $request->sp_moTa;
        $sp->sp_giaNhap = $request->sp_giaNhap;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_soLuong = $request->sp_soLuong;
        $sp->sp_noiBat = $request->sp_noiBat;
        $sp->sp_moi = $request->sp_moi;
        $sp->l_ma = $request->l_ma;
        $sp->ncc_ma = $request->ncc_ma;
        $sp->sp_trangThai = $request->sp_trangThai;

        if($request->hasFile('sp_hinhAnh'))
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/sanpham' . $sp->sp_hinhAnh);
            
            // Upload hình mới
            // Lưu tên hình vào column sp_hinhAnh
            $file = $request->sp_hinhAnh;

            // Lưu tên hình vào column sp_hinhAnh
            $sp->sp_hinhAnh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos/sanpham"
            $fileSaved = $file->storeAs('public/photos/sanpham', $sp->sp_hinhAnh);
        }

        $sp->save();

        return redirect()->route('admin.sanpham.index');
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
