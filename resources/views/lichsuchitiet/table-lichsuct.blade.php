
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
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($getCTDD as $dv)
            <tr>
                <td>{{$i++;}}</td>
                <td>{{$dv->TenSan}}</td>
                <td>{{$dv->TuGio}}</td>
                <td>{{$dv->DenGio}}</td>
                <td>{{$dv->NgayThangNam}}</td>
                <td>{{$dv->DonGia}}</td>
                <td><img width="50" height="50" src="{{asset('img/'.$dv->HinhAnh)}}"></td>
                <td>{{$dv->MoTa}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
