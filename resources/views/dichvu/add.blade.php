
  <!-- Profile Modal -->
    <div class="modal fade" id="modal-category-add">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <div class="modal-content" form-url="">

                {{--  --}}
                {{-- <form method="POST" enctype="multipart/form-data" id="form-profile" action="{{route('Account.update')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT"> --}}
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-info">Dịch vụ mới</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>



                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <label class = "control-label col-md">Tên dịch vụ</label>
                                        <div class="col-md">
                                            <input type="text" id="tendichvu" name="tendichvu" type="text" required class="form-control form-control-user" >
                                        </div>
                                    </div>

                                    <div class="form-group col-md-10">
                                        <label class = "control-label col-md">Đơn giá</label>
                                        <div class="col-md">
                                            <input type="text" id="dongia" name="dongia" type="text" required class="form-control form-control-user" >
                                        </div>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label class = "control-label col-md">Mô tả</label>
                                        <div class="col-md">
                                            <input type="text" id="mota" name="mota" type="text" required class="form-control form-control-user" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="button" id="btn-them-dichvu" class="btn-them-dichvu btn btn-outline-success"><i class="far fa-edit"></i>Thêm</button>
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal"><i class="fas fa-times"></i>Đóng</button>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class = "control-label col-md">Hình Ảnh</label>
                                    <div class="card border-info shadow-sm">
                                        <div class="card-header"></div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img height="80" width="150" src="{{asset('img/dichvu.jpg')}}" id="image_preview_container" class="img-profile" alt="avatar"/>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="custom-file">
                                            <input hidden type="text" id="fakeimageid" name="fakeimage" value="dichvu.jpg">
                                            <input type="file" id="imageid" name="image" value="cc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>

 {{-- Update profile js --}}
 <script>
    $(document).ready(function(){
        // image preview
        $("#imageid").change(function(){
            let reader = new FileReader();

            reader.onload = (e) => {
                $("#image_preview_container").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        })


        $(".btn-them-dichvu").click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formdata = new FormData();
            var input = document.getElementById('imageid');
            formdata.append("tendichvu", $("#tendichvu").val());
            formdata.append("dongia", $("#dongia").val());
            formdata.append("mota", $("#mota").val());


            // fake image
            if ($("#imageid").get(0).files[0])
                formdata.append("image", $("#imageid").get(0).files[0]);
            else
                formdata.append("image", $("#fakeimageid").val());
            formdata.append("fakeimage", $("#fakeimageid").val());
            for (const value of formdata.values()) {
                console.log(value);
            }
            var url = "{{URL::to('/add_dichvu')}}";
            console.log(url);
            $.ajax({
                url: url,
                dataType: "json",
                contentType: false,
                processData: false,
                cache :false,
                type: 'POST',
                data: formdata,
                success: function (data) {
                    toastr.success("Thêm mới dịch vụ thành công", "Thành công");
                    setTimeout(function () {
                        location.reload(true);
                    }, 1000);
                },
                error: function (response) {
                    toastr.error('Thêm mới dịch vụ thất bại', "Thất bại");
                }
            });
        });

        $(".btn-delete-attr").click(function() {
            var url = $(this).attr("delete-attr-url");
            console.log(url);
            if (confirm("Bạn có chắc muốn xóa không?")) {
                $.ajax({
                    type: "get",
                    dataType: "html",
                    url: url,
                    success: function(data) {
                        toastr.success("Xóa dịch vụ thành công!");
                        window.location.href = "{{ URL::to('/show_dichvu') }}";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error("Xóa dịch vụ không thành công!");
                    },
                });
            }
        });

    })
</script>
