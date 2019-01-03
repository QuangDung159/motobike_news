@extends("layouts.admin.index")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{$URL_ADMIN_USER}}/add" method="POST">
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
                            <label>Name</label>
                            <input class="form-control" name="user_name"
                                   placeholder="Please enter User name"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="user_email"
                                   placeholder="Please enter User email"/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password"
                                   placeholder="Please enter Password"/>
                        </div>
                        <div class="form-group">
                            <label>Birthday</label>
                            <input class="form-control" name="user_dob" type="date"/>
                        </div>
                        <div class="form-group">
                            <label>Activity</label>
                            <select class="form-control" name="id_role">
                                <option value="0">Please Choose Role</option>
                                @foreach($list_role as $item)
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