@extends("layouts.admin.index")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Slide Name</label>
                            <input class="form-control" name="slide_name" placeholder="Please Enter Slide Name"/>
                        </div>
                        <div class="form-group">
                            <label>Slide Link</label>
                            <input class="form-control" name="slide_link" placeholder="Please Enter Slide Link"/>
                        </div>
                        @if(session("invalid_type"))
                            <div class="alert alert-danger">
                                {{session("invalid_type")}}
                            </div>
                        @endif
                        <img id="preview_upload_img" class="preview-img">
                        <div class="form-group" name="thumbnail">
                            {{-- thêm thuộc tính enctype="multipart/form-data" ở <form> --}}
                            <label>Preview</label>
                            <input
                                    name="thumbnail"
                                    type="file" class="form-control"
                                    id="thumbnail"
                            >
                        </div>
                        <button type="submit" class="btn btn-default">{{$SUBMIT}}</button>
                        <button type="reset" class="btn btn-default">{{$RESET}}</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section("script")
    <script>
        {{-- get path of file that you want to upload --}}
        function readPath(input) {
            // get file path
            var filePath = input.value;
            // define allow ext
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert("Please upload the file have format : jpg, png, jpeg");
                input.value = '';
                return false;
            }
            // check you input have file
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                // get file fullpath
                reader.onload = function (e) {
                    // <img> id
                    $('#preview_upload_img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        };

        // trigger readPath function by onchange event
        $('#thumbnail').change(function () {
                readPath(this)
            }
        );
    </script>
@endsection