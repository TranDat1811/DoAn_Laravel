{{--Đây là comment--}}

@extends('backend.layouts.master')

@section('title')
    Sửa thông tin loại
@endsection

@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />

<style>
    form{
        width: 60%;
        margin: auto;
    }
</style>
@endsection

@section('main-content')

<form method="POST" action="{{ route('admin.loai.update', ['id' => $loai->l_ma]) }}" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT"> 
  <div class="form-group col-md-10">
    <label for="exampleInputEmail1">Tên Loại</label>
    <input type="text" name="l_ten" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    placeholder="Tên loại" value="{{ $loai->l_ten, old('l_ten') }}">
    <small id="cd_tenHelp" class="form-text text-muted">Nhập tên loại. Giới hạn trong 50 ký tự.</small>
  </div>
  <div class="form-group col-md-10">
    <label for="exampleInputEmail1">Mô tả</label>
    <input type="text" name="l_moTa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    placeholder="Mô tả" value="{{ $loai->l_moTa, old('l_moTa') }}">
    <small id="cd_tenHelp" class="form-text text-muted">Nhập tên loại. Giới hạn trong 50 ký tự.</small>
  </div>
  <div class="form-group col-md-10">
    <label for="l_hinhAnh">Hình ảnh</label>
    <input type="file" id="l_hinhAnh" name="l_hinhAnh" class="form-control" aria-describedby="emailHelp" 
    placeholder="" value="{{ $loai->l_hinhAnh, old('l_hinhAnh') }}">
    <small id="cd_tenHelp" class="form-text text-muted">Nhập tên loại. Giới hạn trong 50 ký tự.</small>
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">Trạng thái</label>
      <select id="inputState" name="l_trangThai" class="form-control">
        <option value="1"   {{ old('l_trangThai', $loai->l_trangThai) == 1 ? "selected" : "" }}>Khoá</option>
        <option value="2"   {{ old('l_trangThai', $loai->l_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
      </select>
  </div>
  <button id="btn_submit" type="submit" class="btn btn-primary" >Lưu</button>
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
      append: false,
      showRemove: false,
      autoReplace: true,
      previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
      overwriteInitial: false,
      initialPreviewShowDelete: false,
      initialPreviewAsData: true,
      initialPreview: [
          "{{ asset('storage/photos/loai/' . $loai->l_hinhAnh) }}"
      ],
      initialPreviewConfig: [
          {
              caption: "{{ $loai->l_hinhAnh }}", 
              size: {{ Storage::exists('public/photos/loai/' . $loai->l_hinhAnh) ? Storage::size('public/photos/loai/' . $loai->l_hinhAnh) : 0 }}, 
              width: "120px", 
              url: "{$url}", 
              key: 1
          },
      ]
    });
  });
</script>
@endsection