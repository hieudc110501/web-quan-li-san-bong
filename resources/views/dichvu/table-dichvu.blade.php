
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" id="" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Mã dịch vụ</th>
                <th>Tên dịch vụ</th>
                <th>Đơn giá</th>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getDV as $dv)
            <tr>
                <td>{{$dv->MaDichVu}}</td>
                <td>{{$dv->TenDichVu}}</td>
                <td>{{$dv->DonGia}}</td>
                <td><img width="50" height="50" src="{{asset('img/'.$dv->HinhAnh)}}"></td>
                <td>{{$dv->MoTa}}</td>
                <td>
                    <a type="button" class="btn btn-sm btn-primary btn-edit" data-url="{{ URL::to('/get_dichvu/' . $dv->MaDichVu) }}" title="Sửa"> <i class="far fa-edit"></i></a>
                    <a delete-attr-url="{{ URL::to('/delete_dichvu/'. $dv->MaDichVu)}}" type="button" class="btn-sm btn-delete-attr btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-edit').click(function(e) {
            var url = $(this).attr('data-url');
            $('#modal-category-edit').modal('show');
            e.preventDefault();
            console.log(url);
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    $("#madichvu-edit").val(response.getDV[0].MaDichVu);
                    $("#tendichvu-edit").val(response.getDV[0].TenDichVu);
                    $("#dongia-edit").val(response.getDV[0].DonGia);
                    $("#mota-edit").val(response.getDV[0].MoTa);
                    console.log(response.getDV[0].HinhAnh);
                    $("#image_preview_container-edit").attr('src','http://127.0.0.1:8000/img/' + response.getDV[0].HinhAnh);
                    $("#fakeimageid-edit").val(response.getDV[0].HinhAnh);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                }
            })
        });
    });
</script>
@include('dichvu.add')
@include('dichvu.update')
