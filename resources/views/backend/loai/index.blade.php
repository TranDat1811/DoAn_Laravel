@extends('backend.layouts.master')

@section('title')
Trang chủ
@endsection

@section('main-content')
<table class="table table-bordered" style="text-align:center; width: 80%;margin: auto;">
    <tr class="thead-dark">
        <th>Mã loại</th>
        <th>Tên loại</th>
        <th colspan="2">#</th>
    </tr>
    @foreach ($ds_loai as $loai)
        <tr>
            <td>{{$loai->l_ma}}</td>
            <td>{{$loai->l_ten}}</td>
            <td><a href="" class="btn btn-warning"><i class="fas fa-pen"></i></a></td>
            <td><a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    @endforeach
</table>
@endsection