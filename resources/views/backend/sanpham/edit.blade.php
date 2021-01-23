@extends('backend.layouts.master')

@section('title')
    Thêm sản phẩm
@endsection

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

@section('main-content')

<form action="{{ route('admin.sanpham.update', ['id'=> $sp->sp_ma]) }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT"> 
    <div class="form-group col-md-10">
        <label for="sp_ten">Tên sản phẩm</label>
        <input type="text" name="sp_ten" class="form-control" id="sp_ten"
        placeholder="Tên sản phẩm" value="{{ $sp->sp_ten, old('sp_ten') }}">
        <small id="cd_tenHelp" class="form-text text-muted">Nhập tên sản phẩm. Giới hạn trong 50 ký tự.</small>
    </div>
    <div class="form-group col-md-10">
        <label for="sp_hinhAnh">Ảnh đại diện</label>
        <input type="file" name="sp_hinhAnh" class="form-control" id="sp_hinhAnh"
        placeholder="Tên sản phẩm" value="{{ $sp->sp_hinhAnh, old('sp_hinhAnh') }}">
        <small id="cd_tenHelp" class="form-text text-muted">Chọn ảnh sản phẩm</small>
    </div>
    <div class="form-group col-md-10">
        <label for="sp_moTa_ngan">Mô tả ngắn</label>
        <input type="text" name="sp_moTa_ngan" class="form-control" id="sp_moTa_ngan"
        placeholder="Mô tả ngắn" value="{{ $sp->sp_moTa_ngan, old('sp_moTa_ngan') }}">
        <small id="cd_tenHelp" class="form-text text-muted">Nhập mô tả ngắn khi hiển thị sản phẩm</small>
    </div>
    <div class="form-group col-md-10">
        <label for="sp_moTa">Mô tả</label>
        <!-- <input type="text" name="sp_moTa" class="form-control" id="sp_moTa" -->
        <!-- placeholder="Mô tả" value=""> -->
        <textarea name="sp_moTa" id="sp_moTa" cols="30" rows="10" class="form-control">
            {{ $sp->sp_moTa, old('sp_moTa') }}
        </textarea>
        <small id="cd_tenHelp" class="form-text text-muted">Nhập mô tả khi hiển thị chi tiết sản phẩm</small>
    </div>
    <div class="form-group col-md-10">
        <label for="sp_giaNhap">Giá nhập</label>
        <input type="text" name="sp_giaNhap" class="form-control" id="sp_giaNhap"
        placeholder="Giá nhập sản phẩm" value="{{ $sp->sp_giaNhap, old('sp_giaNhap') }}">
        <small id="cd_tenHelp" class="form-text text-muted">Nhập giá nhập vào sản phẩm</small>
    </div>
    <div class="form-group col-md-10">
        <label for="sp_giaBan">Giá bán</label>
        <input type="text" name="sp_giaBan" class="form-control" id="sp_giaBan"
        placeholder="Giá bán sản phẩm" value="{{ $sp->sp_giaBan, old('sp_giaBan') }}">
        <small id="cd_tenHelp" class="form-text text-muted">Nhập giá bán ra sản phẩm</small>
    </div>
    <div class="form-group col-md-10">
        <label for="sp_giaBan">Số lượng</label>
        <input type="text" name="sp_soLuong" class="form-control" id="sp_soLuong"
        placeholder="Số lượng" value="{{ $sp->sp_soLuong, old('sp_soLuong') }}">
        <small id="cd_tenHelp" class="form-text text-muted">Nhập số lượng sản phẩm đang có</small>
    </div>
    <div class="form-group col-md-4">
        <label for="sp_noiBat">Nổi bật</label>
        <select id="sp_noiBat" name="sp_noiBat" class="form-control">
            <option value="1"  {{ old('sp_noiBat' , $sp-> sp_noiBat ) == 1 ? "selected" : "" }}>Có</option>
            <option value="2"  {{ old('sp_noiBat' , $sp-> sp_noiBat) == 2 ? "selected" : "" }}>Không</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="sp_moi">Sản phẩm mới</label>
        <select id="sp_moi" name="sp_moi" class="form-control">
            <option value="1"  {{ old('sp_moi' , $sp-> sp_moi) == 1 ? "selected" : "" }}>Có</option>
            <option value="2"  {{ old('sp_moi' , $sp-> sp_moi) == 2 ? "selected" : "" }}>Không</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Loại</label>
        <select name="l_ma" id="l_ma" class="form-control">Loại
            @foreach($dsLoai as $loai)
                <option value="{{$loai->l_ma}}" {{ old('$loai->l_ma', $sp->l_ma) == $loai->l_ma ? "selected" : "" }}>{{$loai->l_ten}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Loại</label>
        <select name="ncc_ma" id="ncc_ma" class="form-control">Loại
            @foreach($dsNcc as $ncc)
                <option value="{{$ncc->ncc_ma}}" {{ old('$ncc->ncc_ma', $sp->ncc_ma) == $ncc->ncc_ma ? "selected" : "" }}>{{$ncc->ncc_ten}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
    <label for="inputState">Trạng thái</label>
      <select id="inputState" name="sp_trangThai" class="form-control">
        <option value="1"   {{ old('sp_trangThai' , $sp->sp_trangThai) == 1 ? "selected" : "" }}>Khoá</option>
        <option value="2"   {{ old('sp_trangThai' , $sp->sp_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
      </select>
  </div>                   
    <button type="submit" class="btn btn-primary">Lưu</button>
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
    $("#sp_hinhAnh").fileinput({
      theme: 'fas',
      showUpload: false,
      showCaption: false,
      browseClass: "btn btn-primary btn-lg",
      fileType: "any",
      previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
      overwriteInitial: false,
      initialPreviewShowDelete: false,
      initialPreviewAsData: true,
      initialPreview: [
          "{{ asset('storage/photos/sanpham/' . $sp->sp_hinhAnh) }}"
      ],
      initialPreviewConfig: [
          {
              caption: "{{ $sp->sp_hinhAnh }}", 
              size: {{ Storage::exists('public/photos/sanpham/' . $sp->sp_hinhAnh) ? Storage::size('public/photos/sanpham/' . $sp->sp_hinhAnh) : 0 }}, 
              width: "120px",
              url: "{$url}",
              key: 1
          },
      ]
    });
  });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>

<script>
$(document).ready(function() {
    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá nhập
    $('#sp_giaNhap').inputmask({
      alias: 'currency',
      positionCaretOnClick: "radixFocus",
      radixPoint: ".",
      _radixDance: true,
      numericInput: true,
      groupSeparator: ",",
      suffix: ' vnđ',
      min: 0,         // 0 ngàn
      max: 100000000, // 1 trăm triệu
      autoUnmask: true,
      removeMaskOnSubmit: true,
      unmaskAsNumber: true,
      inputtype: 'text',
      placeholder: "0",
      definitions: {
        "0": {
          validator: "[0-9\uFF11-\uFF19]"
        }
      }
    });

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá bán
    $('#sp_giaBan').inputmask({
      alias: 'currency',
      positionCaretOnClick: "radixFocus",
      radixPoint: ".",
      _radixDance: true,
      numericInput: true,
      groupSeparator: ",",
      suffix: ' vnđ',
      min: 0,         // 0 ngàn
      max: 100000000, // 1 trăm triệu
      autoUnmask: true,
      removeMaskOnSubmit: true,
      unmaskAsNumber: true,
      inputtype: 'text',
      placeholder: "0",
      definitions: {
        "0": {
          validator: "[0-9\uFF11-\uFF19]"
        }
      }
    });
}); 
</script>
@endsection