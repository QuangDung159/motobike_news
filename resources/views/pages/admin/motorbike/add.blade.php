@extends("layouts.admin.index")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Motorbike
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    <form action="{{$URL_ADMIN_MOTORBIKE}}/add" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="notification">
                            @if(session("success"))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{session("success")}}
                                </div>
                            @endif
                            @if(session("error"))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{session("error")}}
                                </div>
                            @endif
                            @if(count($errors) > 0)
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    @foreach($errors->all() as $item)
                                        {{$item}}<br>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Motorbike Name</label>
                            <input class="form-control" name="motorbike_name"
                                   placeholder="Please Enter Motorbike Name"/>
                        </div>
                        <div class="form-group">
                            <label>Capacity (cc)</label>
                            <input class="form-control" name="capacity"
                                   type="number"
                                   placeholder="Please Enter Capacity"/>
                        </div>
                        <div class="form-group">
                            <label>Motorbike Type</label>
                            <select class="form-control" name="id_motorbike_type">
                                <option value="0">Please Choose Category</option>
                                @foreach($list_motorbike_type as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Manufacturer</label>
                            <select class="form-control" name="id_manufacturer">
                                <option value="0">Please Choose Manufacturer</option>
                                @foreach($list_manufacturer as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description"
                                      id="demo"
                                      class="form-control ckeditor">
                            </textarea>
                        </div>
                        @if(session("invalid_type"))
                            <div class="alert alert-danger">
                                {{session("invalid_type")}}
                            </div>
                        @endif
                        <img id="preview_upload_img" class="preview-img">
                        <div class="form-group" name="thumbnail">
                            {{-- thêm thuộc tính enctype="multipart/form-data" ở <form> --}}
                            <label>Thumbnail</label>
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

@section("style")
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

    <script>
        CKEDITOR.replace('demo', {
            height: ['700px']
        });

    </script>
@endsection