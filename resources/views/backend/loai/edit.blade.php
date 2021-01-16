{{--Đây là comment--}}

@extends('backend.layouts.master')

@section('title')
    Sửa loại
@endsection

@section('custom-css')
<style>
    form{
        
        width: 80%;
        margin: auto;
    }
    
</style>
@endsection

@section('main-content')

<form method="POST" action="{{ route('admin.loai.update', ['id' => $loai->id]) }}">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col-md-10">
    <label for="exampleInputEmail1">Mã loại</label>
    <input type="text" name="l_ma" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    placeholder="Mã loại" value="{{$loai->l_ma, old('l_ma') }}">
    <small id="cd_tenHelp" class="form-text text-muted">Nhập tên loại. Giới hạn trong 50 ký tự.</small>
  </div>  
  <div class="form-group col-md-10">
    <label for="exampleInputEmail1">Tên Loại</label>
    <input type="text" name="l_ten" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    placeholder="Tên loại" value="{{ $loai->l_ten, old('l_ten') }}">
    <small id="cd_tenHelp" class="form-text text-muted">Nhập tên loại. Giới hạn trong 50 ký tự.</small>
  </div>
  <div class="form-group col-md-10">
    <label for="exampleInputEmail1">Mô tả</label>
    <input type="text" name="l_mota" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    placeholder="Mô tả" value="{{ $loai->l_mota, old('l_mota') }}">
    <small id="cd_tenHelp" class="form-text text-muted">Nhập tên loại. Giới hạn trong 50 ký tự.</small>
  </div>
  <div class="form-group col-md-10">
    <label for="exampleInputEmail1">Hình ảnh</label>
    <input type="text" name="l_hinhanh" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    placeholder="" value="{{ $loai->l_hinhanh, old('l_hinhanh') }}">
    <small id="cd_tenHelp" class="form-text text-muted">Nhập tên loại. Giới hạn trong 50 ký tự.</small>
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">Trạng thái</label>
      <select id="inputState" name="l_trangThai" class="form-control">
        <option value="1"   {{ old('l_trangThai') == 1 ? "selected" : "" }}>Khoá</option>
        <option value="2"   {{ old('l_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
      </select>
  </div>
  <button id="btn_submit" type="submit" class="btn btn-primary" >Lưu</button>
</form>
@endsection
