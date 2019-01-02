@extends("layouts.admin.index")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Motorbike Type : {{$motorbike_type->name}}
                        <small>{{$UPDATE}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/motorbike_type/update/{{$motorbike_type->id}}" method="POST">
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
                            <label>Motorbike Type Name</label>
                            <input class="form-control" name="motorbike_type_name"
                                   placeholder="Please enter Motorbike Type name"
                                   value="{{$motorbike_type->name}}"/>
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