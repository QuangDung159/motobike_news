@extends("layouts.client.index")
@section("content")
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#337AB7; color:white;">
                <h2 style="margin-top:0px; margin-bottom:0px;">Motorbike News</h2>
            </div>
            <div class="panel-body">
                @foreach($list_manufacturer as $manufacturer)
                    @if(count($manufacturer->motorbikes->sortByDesc("updated_at")) > 0)
                        <?php $motorbike = $manufacturer->motorbikes->sortByDesc("updated_at")->first()?>
                        <div class="row-item row">
                            <h3>
                                <a href="manufacturer/{{$manufacturer->id}}">{{$manufacturer->name}}</a> |
                                @foreach($list_motorbike_type as $motorbike_type)
                                    <small><a href="manufacturer/motorbike/{{$manufacturer->id}}/{{$motorbike_type->id}}"><i>{{$motorbike_type->name}}</i></a>/</small>
                                @endforeach
                            </h3>
                            <div class="col-md-8 border-right">
                                <div class="col-md-5">
                                    <a href="detail.html">
                                        <img class="img-responsive"
                                             src="{{$IMAGES_PATH}}/motorbike/{{$motorbike["thumbnail"]}}"
                                             alt="">
                                    </a>
                                </div>

                                <div class="col-md-7">
                                    <h3>
                                        {{$motorbike["title"]}}</h3>
                                    <p>
                                        {{$motorbike["short_description"]}}
                                    </p>
                                    <a class="btn btn-primary"
                                       href="motorbike/{{$motorbike->unsigned_title}}/{{$motorbike->id}}">See
                                        Detail
                                        <span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <?php $list_motorbike = $manufacturer->motorbikes->sortByDesc("views")->take(2)?>
                                @foreach($list_motorbike as $motorbike)
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-5">
                                            <a href="{{$motorbike->unsigned_title}}/{{$motorbike->id}}">
                                                <img class="img-responsive"
                                                     src="{{$IMAGES_PATH}}/motorbike/{{$motorbike->thumbnail}}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-7">
                                            <a href="motorbike/{{$motorbike->unsigned_title}}/{{$motorbike->id}}"><b>{{$motorbike->title}}</b></a>
                                        </div>
                                        <div class="break"></div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="break"></div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection