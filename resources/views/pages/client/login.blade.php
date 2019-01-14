@extends("layouts.client.index")
@section("content")
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <form action="login_user" method="post">
                    {{csrf_field()}}
                    <div class="notification">
                        @if(session("error"))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session("error")}}
                            </div>
                        @endif
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
                    <div>
                        <label>Email</label>
                        <input type="email" class="form-control"
                               placeholder="Please enter your email" name="email">
                    </div>
                    <br>
                    <div>
                        <label>Password</label>
                        <input type="password" class="form-control"
                               name="password" placeholder="Please enter your password">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-default">{{$SUBMIT}}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection