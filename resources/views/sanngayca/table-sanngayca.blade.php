
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" id="" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sân</th>
                <th>Từ giờ</th>
                <th>Đến giờ</th>
                <th>Ngày tháng năm</th>
                <th>Đơn giá</th>
                <th>Hình ảnh</th>
                <th>Mô Tả</th>
                <th>Tình trạng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($getSNC as $dv)
            <tr>
                <td>{{$i++;}}</td>
                <td>{{$dv->TenSan}}</td>
                <td>{{$dv->TuGio}}</td>
                <td>{{$dv->DenGio}}</td>
                <td>{{$dv->NgayThangNam}}</td>
                <td>{{$dv->DonGia}}</td>
                <td><img width="50" height="50" src="{{asset('img/'.$dv->HinhAnh)}}"></td>
                <td>{{$dv->MoTa}}</td>
                <td>
                    @if ($dv->TinhTrang == 0)
                        <span class="badge badge-success">Còn trống</span>
                    @endif
                    @if ($dv->TinhTrang == 1)
                        <span class="badge badge-danger">Đã hết</span>
                    @endif
                </td>
                <td>
                    @if ($dv->TinhTrang == 0)
                        <a type="button" data-id="{{$dv->MaSanNgayCa}}" class="btn btn-sm btn-primary btn-add-cart" data-url="" title="Thêm"> <i class="fas fa-plus"></i></a>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('.btn-add-cart').click(function(e) {
            var id = $(this).attr('data-id');
            console.log(id);
            var url = "http://127.0.0.1:8000/add_sanngayca/" + id;
            console.log(url);
            $.ajax({
                type: 'GET',
                dataType: "json",
                url: url,
                success: function(data) {
                    toastr.success("Thêm giỏ hàng thành công!", "Thành công");
                    loadCart();
                },
                error: function(jqXHR, textStatus, errorThrown, response) {
                    toastr.error("Thêm giỏ hàng không thành công!", "Thất bại");
                }
            })
        });
    });
</script>
