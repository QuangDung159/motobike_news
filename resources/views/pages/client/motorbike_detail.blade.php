@extends("layouts.client.detail")
@section("main_content")
    <div class="container">
        <div class="row">
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
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$motorbike->title}}</h1>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$motorbike->created_at}}</p>
                <hr>

                <p>{!! $motorbike->description !!}</p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    @if(isset($current_user))
                        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        <form action="motorbike/{{$motorbike->unsigned_title}}/{{$motorbike->id}}/{{$current_user->id}}"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea name="comment" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    @else
                        <h4>Please <a href="login_user" style="font-weight: bold">login</a> to leave comment</h4>
                    @endif
                </div>

                <hr>

                <!-- Posted Comments -->

                @foreach($list_comment as $comment)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->user->name}}
                                <small>{{$comment->created_at}}</small>
                            </h4>
                            {{$comment->content}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3">
                @include("pages.client.ref_news")
                @include("pages.client.highlights_news")
            </div>
        </div>
    </div>
@endsection