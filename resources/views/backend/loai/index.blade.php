@extends('backend.layouts.master')

@section('title')
Trang chủ
@endsection

@section('custom-css')
<style>
.my-table{
    text-align:center; width: 80%;margin: auto;
}
#btn_add{
    
}
</style>
@endsection


@section('main-content')

<a id="btn_add" href="{{ route('admin.loai.create') }}" class="btn btn-primary">Thêm mới</a>
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
            <td><a href="{{ route('admin.loai.edit', ['id' => $loai->id ]) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a></td>
            <td>
                <form name="frmDelete" method="post" action="{{ route('admin.loai.destroy', ['id' => $loai->id ]) }}" class="frmDelete" data-id = "{{ $loai->id }}">
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
    <script>
        //document ready
        $(function () {
            //Tìm đối tượng nào -> yêu cầu nó là gì đó
            
            $('.frmDelete').submit(function(e){

                //tạm dừng các sự kiện mặc định
                e.preventDefault();

                var id = $(this).data('id'); //trong form hiện tại tìm data-id

                Swal.fire({
                    title: 'Bạn có chắc muốn xoá chứ ?',
                    text: "Bạn không thể phục hổi sau khi xoá !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Vâng, xoá đi!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:$(this).attr('method'),
                            url: $(this).attr('action'),
                            data : {
                                id : id,
                                _token: $(this).find('[name=_token]').val(),
                                _method:$(this).find('[name=_method]').val()
                            },
                            success: function(data, textStatus, jqXHR){
                                //quay lại trang
                                location.href='{{ route("admin.loai.index")}}';
                            },
                            error: function(jqXHR, textStatus, errorThrown){

                            }
                        });
                    }
                    })
            });
        });
    </script>
@endsection