@extends('backend.layouts.master')

@section('title')
Trang chủ
@endsection

@section('custom-css')
<style>
.my-table{
    text-align:center; width: 80%;margin: auto;
}
</style>
@endsection


@section('main-content')
<table class="table table-bordered my-table">
    <tr class="thead-dark">
        <th>Mã loại</th>
        <th>Tên loại</th>
        <th>Trạng thái</th>
        <th colspan="2">#</th>
    </tr>
    @foreach ($ds_loai as $loai)
        <tr>
            <td>{{$loai->l_ma}}</td>
            <td>{{$loai->l_ten}}</td>
            <td><?php
                $trangThai = '';
                if($loai->l_trangThai==1){
                    $trangThai = 'Khoá';
                }
                else if($loai->l_trangThai ==2){
                    $trangThai = 'Khả dụng';
                }
            ?>
                {{$trangThai}}</td>
            <td><a href="{{ route('admin.loai.edit', ['id' => $loai->l_ma ]) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a></td>
            <td><a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    @endforeach
</table>
@endsection