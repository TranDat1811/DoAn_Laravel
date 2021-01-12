{{--Đây là comment--}}

@extends('backend.layouts.master')

@section('custom-css')
<style>
    form{
        
        width: 80%;
        margin: auto;
    }
    
</style>
@endsection

@section('title')
    Thêm mới loại
@endsection

@section('main-content')

<form method="post" action="{{ route('admin.loai.store') }}">
    {{csrf_field()}}
  <div class="form-group col-md-10">
    <label for="exampleInputEmail1">Tên Loại</label>
    <input type="text" name="l_ten" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    placeholder="Loại" value="{{ old('l_ten') }}">
    <small id="cd_tenHelp" class="form-text text-muted">Nhập tên loại. Giới hạn trong 50 ký tự.</small>
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">Trạng thái</label>
      <select id="inputState" name="l_trangThai" class="form-control">
        <option value="1"   {{ old('l_trangThai') == 1 ? "selected" : "" }}>Khoá</option>
        <option value="2"   {{ old('l_trangThai') == 2 ? "selected" : "" }} selected>Khả dụng</option>
      </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection
