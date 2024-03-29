@extends('app')

@section('content')
    <!-- Begin Page Content -->
    <div class="">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800" style="color: #36b9cc!important">Lịch sử chi tiết đơn đặt của bạn</h1>
        <br>
        <div class="d-flex row">
            <div class="col-md float-left">
                <div class="form-inline">

                </div>
            </div>
        </div>
        <br>

        <a href="{{URL::to('/lich_su/'.Auth::user()->MaTaiKhoan)}}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i> Quay lại</a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-1 font-weight-bold text-primary">Danh sách các sân bóng</h6>
            </div>
            <div class="card-body LoadAllProductAttr" >
                @include('lichsuchitiet.table-lichsuct');
            </div>
        </div>
        <span class="m-1 font-weight-bold text-primary">Sổ lượng: {{ $qty }}</span>
        <span class="m-1 font-weight-bold text-primary">Tổng tiền: {{ $tt }}</span>
        <br>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-ngay').change(function(e) {
                var url = $(this).attr("url-data-ngay");
                console.log(url);
                $.ajax({
                    type: 'get',
                    url: url,
                    dataType: "html",
                    data:{
                        ngay:ngay,
                        thang:thang,
                        nam:nam,
                    },
                    success: function(data) {
                        $('.LoadAllProductAttr').html(data);
                        $('#dataTable').DataTable().draw();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {}
                })
            });
        });
    </script>
@endsection
