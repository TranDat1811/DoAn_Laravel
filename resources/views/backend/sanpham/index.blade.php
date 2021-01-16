@extends('backend.layouts.master')

@section('title')
    Sản phẩm
@endsection

@section('custom-css')
 <style>
    .my-table{
        width: 95%;
        margin :auto;
        text-align:center;
    }
    .sp_hinhanh{
        width: 200px;
        height: 200px;
    }
 </style>
@endsection

@section('main-content')
<table class="table table-bordered my-table">
    <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Giá tiêu chuẩn</th>
        <th>Giá niêm yết</th>
        <th>Hình</th>
        <th colspan="2">#</th>
    </tr>
    @foreach($ds_sp as $sp)
    <tr>
        <td>{{$sp->sp_ma}}</td>
        <td>{{$sp->sp_ten}}</td>
        <td>${{$sp->sp_gia_tieuchuan}}</td>
        <td>${{$sp->sp_gia_niemyet}}</td>
        <td >
            <img src="{{asset('storage/photos/'.$sp->sp_hinhanh)}}" alt="{{$sp->sp_hinhanh}}" class="sp_hinhanh">
        </td>
        <td><a class="btn btn-warning" href="{{route('admin.sanpham.edit')}}"><i class="fas fa-pen"></i</a></td>
        <td>
            <form name="frmDelete" method="post" action="{{ route('admin.sanpham.destroy', ['id' => $sp->id ]) }}" class="frmDelete" data-id = "{{ $sp->id }}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection

@section('custom-js')
 
@endsection