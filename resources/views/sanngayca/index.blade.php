@extends('app')

@section('content')
    <!-- Begin Page Content -->
    <div class="">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800" style="color: #36b9cc!important">Tìm kiếm sân bóng</h1>
        <br>
        <div class="row">
            <div class="form-group col-md-4">
                <label class = "control-label col-md">Ngày</label>
                <div class="col-md">
                    <select class="form-control btn-ngay" id="dropdownNgay" url-data-ngay="{{URL::to('/show_sanngay')}}">
                        <option value="">--Chọn ngày--</option>
                        @for ($i=1; $i<=31; $i ++)
                            <option  value="{{$i}}">{{$i}}</option>
                        @endfor

                    </select>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label class = "control-label col-md">Tháng</label>
                <div class="col-md">
                    <select class="form-control btn-ngay" id="dropdownThang" url-data-ngay="{{URL::to('/show_sanngay')}}">
                        <option value="">--Chọn tháng--</option>
                        @for ($i=1; $i<=12; $i ++)
                            <option  value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label class = "control-label col-md">Năm</label>
                <div class="col-md">
                    <select class="form-control btn-ngay" id="dropdownNam" url-data-ngay="{{URL::to('/show_sanngay')}}">
                        <option value="">--Chọn năm--</option>
                        @for ($i=2022; $i<=2025; $i ++)
                            <option  value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>

        <div class="d-flex row">
            <div class="col-md float-left">
                <div class="form-inline">

                </div>
            </div>
        </div>
        <br>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-1 font-weight-bold text-primary">Danh sách các sân bóng</h6>
                <a href="{{URL::to('/lich_su/'.Auth::user()->MaTaiKhoan)}}" data-url="" class="btn btn-light btn-outline-primary btn-add">
                    <i class="fas fa-list"></i>&nbsp;Lịch sử đặt</a>
                <a href="{{URL::to('/show_sanngayca_cart')}}" data-url="" class="btn btn-light btn-outline-primary btn-add">
                    <i class="fas fa-cart-plus"></i>&nbsp;Xem giỏ hàng</a>
            </div>
            <div class="card-body LoadAllProductAttr" >
                @include('sanngayca.table-sanngayca');
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-ngay').change(function(e) {
                var ngay = $('#dropdownNgay').val();
                var thang = $('#dropdownThang').val();
                var nam = $('#dropdownNam').val();

                if (!ngay) {
                    ngay = 0;
                }
                if (!thang) {
                    thang = 0;
                }
                if (!nam) {
                    nam = 0;
                }
                console.log(ngay);
                console.log(thang);
                console.log(nam);
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
