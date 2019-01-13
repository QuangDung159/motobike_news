@extends("layouts.client.index")
@section("content")
    <div class="col-md-9 ">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#337AB7; color:white;">
                <h4><b>{{$manufacturer_name}} - {{$motorbike_type_name}}</b></h4>
            </div>
            @foreach($list_motorbike as $motorbike)
                <div class="row-item row">
                    <div class="col-md-3">
                        <a href="motorbike/{{$motorbike->unsigned_title}}/{{$motorbike->id}}">
                            <br>
                            <img width="200px" height="200px" class="img-responsive"
                                 src="{{$IMAGES_PATH}}/motorbike/{{$motorbike->thumbnail}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <h3>{{$motorbike->title}}</h3>
                        <p>{{$motorbike->short_description}}</p>
                        <a class="btn btn-primary" href="motorbike/{{$motorbike->unsigned_title}}/{{$motorbike->id}}">
                            See Detail
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                    <div class="break"></div>
                </div>
            @endforeach
            <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li>
                            <a href="#">&laquo;</a>
                        </li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                        <li>
                            <a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
@endsection