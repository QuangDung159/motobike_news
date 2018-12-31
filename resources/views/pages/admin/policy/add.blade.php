@extends("layouts.admin.index")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Policy
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{$URL_ADMIN_POLICY}}/add" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="notification">
                            @if(session("success"))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{session("success")}}
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
                            <label>Role</label>
                            <select class="form-control" name="id_role">
                                <option value="0">Please Choose Role</option>
                                @foreach($list_role as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Activity</label>
                            <select class="form-control" name="id_activity">
                                <option value="0">Please Choose Activity</option>
                                @foreach($list_activity as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Entity</label>
                            <select class="form-control" name="id_entity">
                                <option value="0">Please Choose Entity</option>
                                @foreach($list_entity as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
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