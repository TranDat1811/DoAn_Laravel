{{--Đây là comment--}}

@extends('backend.layouts.master')

@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />

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

<form method="post" action="{{ route('admin.loai.store') }}" enctype="multipart/form-data">
    {{csrf_field()}}  
  <div class="form-group col-md-10">
    <label for="exampleInputEmail1">Tên Loại</label>
    <input type="text" name="l_ten" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    placeholder="Tên loại" value="{{ old('l_ten') }}">
    <small id="cd_tenHelp" class="form-text text-muted">Nhập tên loại. Giới hạn trong 50 ký tự.</small>
  </div>
  <div class="form-group col-md-10">
    <label for="exampleInputEmail1">Mô tả</label>
    <input type="text" name="l_moTa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    placeholder="Mô tả" value="{{ old('l_ten') }}">
    <small id="cd_tenHelp" class="form-text text-muted">Nhập mô tả loại sản phẩm. Giới hạn trong 500 ký tự.</small>
  </div>
  <div class="form-group col-md-10">
    <label for="l_hinhAnh">Hình ảnh</label>
    <div class="file-loading">
      <input type="file" id="l_hinhAnh" name="l_hinhAnh" class="form-control"  value="{{ old('l_hinhAnh') }}">
      <small id="cd_tenHelp" class="form-text text-muted">Chọn ảnh đại diện</small>
    </div>  
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">Trạng thái</label>
      <select id="inputState" name="l_trangThai" class="form-control">
        <option value="1"   {{ old('l_trangThai') == 1 ? "selected" : "" }}>Khoá</option>
        <option value="2"   {{ old('l_trangThai') == 2 ? "selected" : "" }} selected>Khả dụng</option>
      </select>
  </div>
  
  <button type="submit" class="btn btn-primary" >Thêm</button>
</form>
@endsection

@section('custom-js')
<!-- Các script dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

<script>
  $(document).ready(function() {
    $("#l_hinhAnh").fileinput({
      theme: 'fas',
      showUpload: false,
      showCaption: false,
      browseClass: "btn btn-primary btn-lg",
      fileType: "any",
      previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
      overwriteInitial: false
    });
  });
</script>
@endsection