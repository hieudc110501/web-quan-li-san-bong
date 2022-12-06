
  <!-- Profile Modal -->
  <div class="modal fade" id="modal-category-edit">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content" form-url="">

            {{--  --}}
            {{-- <form method="POST" enctype="multipart/form-data" id="form-profile" action="{{route('Account.update')}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT"> --}}
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-info">Sửa dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>



                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-8">
                            <input hidden type="text" id="madichvu-edit" name="madichvu-edit" type="text" >
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label class = "control-label col-md">Tên dịch vụ</label>
                                    <div class="col-md">
                                        <input type="text" id="tendichvu-edit" name="tendichvu-edit" type="text" required class="form-control form-control-user" >
                                    </div>
                                </div>

                                <div class="form-group col-md-10">
                                    <label class = "control-label col-md">Đơn giá</label>
                                    <div class="col-md">
                                        <input type="text" id="dongia-edit" name="dongia-edit" type="text" required class="form-control form-control-user" >
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <label class = "control-label col-md">Mô tả</label>
                                    <div class="col-md">
                                        <input type="text" id="mota-edit" name="mota-edit" type="text" required class="form-control form-control-user" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <button type="button" id="btn-sua-dichvu" class="btn-sua-dichvu btn btn-outline-success"><i class="far fa-edit"></i>Sửa</button>
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
                                            <img height="80" width="150" src="" id="image_preview_container-edit" class="img-profile" alt="avatar"/>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-file">
                                        <input hidden type="text" id="fakeimageid-edit" name="fakeimage" value="">
                                        <input type="file" id="imageid-edit" name="image" value="cc">
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
        $("#imageid-edit").change(function(){
            let reader = new FileReader();

            reader.onload = (e) => {
                $("#image_preview_container-edit").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        })


        $(".btn-sua-dichvu").click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formdata = new FormData();
            var input = document.getElementById('imageid');
            formdata.append("tendichvu", $("#tendichvu-edit").val());
            formdata.append("dongia", $("#dongia-edit").val());
            formdata.append("mota", $("#mota-edit").val());


            // fake image
            if ($("#imageid-edit").get(0).files[0])
                formdata.append("image", $("#imageid-edit").get(0).files[0]);
            else
                formdata.append("image", $("#fakeimageid-edit").val());
            formdata.append("fakeimage", $("#fakeimageid-edit").val());
            for (const value of formdata.values()) {
                console.log(value);
            }
            var url = "{{URL::to('/edit_dichvu')}}" + "/" + $("#madichvu-edit").val();
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
                    toastr.success("Sửa dịch vụ thành công", "Thành công");
                    setTimeout(function () {
                        location.reload(true);
                    }, 1000);
                },
                error: function (response) {
                    toastr.error('Sửa dịch vụ thất bại', "Thất bại");
                }
            });
        });

    })
</script>
