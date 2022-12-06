
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
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @if (session('cart'))
                @foreach (session('cart') as $dv)
                <tr>
                    <td>{{$i++;}}</td>
                    <td>{{$dv['TenSan']}}</td>
                    <td>{{$dv['TuGio']}}</td>
                    <td>{{$dv['DenGio']}}</td>
                    <td>{{$dv['NgayThangNam']}}</td>
                    <td>{{$dv['DonGia']}}</td>
                    <td><img width="50" height="50" src="{{asset('img/'.$dv['HinhAnh'])}}"></td>
                    <td>{{$dv['MoTa']}}</td>
                    <td>
                        <a href="{{URL::to('/delete_sanngayca/'. $dv['MaSanNgayCa'])}}" data-id="" class="btn btn-sm btn-danger " data-url="" title="Sửa"> <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
