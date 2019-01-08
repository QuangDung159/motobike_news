@include("layouts.admin.header")

<body>
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="margin-top: 20vh">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form action="admin/login" method="POST">
                            {{csrf_field()}}
                            <div class="notification">
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
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email"
                                           autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password"
                                           value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("layouts.admin.footer")