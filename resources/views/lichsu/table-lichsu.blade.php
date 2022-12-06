
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" id="" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>STT</th>
                <th>Người đặt</th>
                <th>Người xử lí</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
                <th>Thanh toán</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($getDD as $dv)
            <tr>
                <td>{{$i++;}}</td>
                <td>{{$dv->Ten}}</td>
                <td>
                    <?php
                        if ($dv->NguoiXuLi == null) {
                            echo "Chưa có";
                        } else {
                            $dv->NguoiXuLi;
                        }
                    ?>
                </td>
                <td>{{$dv->NgayDat}}</td>
                <td>
                    @if ($dv->TrangThai == 0)
                        <span class="badge badge-primary">Chưa xử lí</span>
                    @endif
                    @if ($dv->TrangThai == 1)
                        <span class="badge badge-success">Thành công</span>
                    @endif
                </td>
                <td>{{$dv->TongTien}}</td>
                <td>
                    @if ($dv->ThanhToan == 0)
                        <span class="badge badge-primary">Chưa thanh toán</span>
                    @endif
                    @if ($dv->ThanhToan == 1)
                        <span class="badge badge-success">Đã thanh toán</span>
                    @endif
                </td>
                <td>
                    <a href="{{URL::to('/lich_su_chitiet/'.$dv->MaDonDat)}}" data-id="" class="btn btn-sm btn-primary " data-url="" title="Sửa"> <i class="fas fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
