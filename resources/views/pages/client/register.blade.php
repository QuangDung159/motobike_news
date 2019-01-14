@extends("layouts.client.index")
@section("content")
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                <form action="register_user" method="POST">
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
                        <label>Birthday</label>
                        <input class="form-control" name="user_dob" type="date"/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" type="password"
                               placeholder="Please enter Password"/>
                    </div>
                    <div class="form-group">
                        <label>Re-Password</label>
                        <input class="form-control" name="re_password" type="password"
                               placeholder="Please re-enter Password"/>
                    </div>
                    <button type="submit" class="btn btn-default">{{$SUBMIT}}</button>
                    <button type="reset" class="btn btn-default">{{$RESET}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection