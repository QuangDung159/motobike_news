@extends("layouts.admin.index")

@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="notification">
                @if(session("notification"))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session("notification")}}
                    </div>
                @endif
            </div>
            <div class="row" style="margin-top: 5vh">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 text-center">
                    <h1 style="font-size: 70px; font-weight: bold">WELCOME {{$current_user->name}}</h1>
                </div>
                <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2"></div>
                <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Information</div>
                        <div class="panel-body">
                            <p>ID : {{$current_user->id}}</p>
                            <p>Full Name : {{$current_user->name}}</p>
                            <p>Email : {{$current_user->email}}</p>
                            <p>Date Of Birth : {{date('d-m-Y', strtotime($current_user->dob))}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2"></div>
            </div>
        </div>
    </div>
@endsection
@section("style")
    <style>
        p {
            font-size: 40px;
            font-weight: bold;
        }

        .notification {
            margin-top: 1vh;
        }
    </style>
@endsection