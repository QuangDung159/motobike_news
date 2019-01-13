<div class="panel panel-default">
    <div class="panel-heading"><b>Reference News</b></div>
    <div class="panel-body">
        @foreach($list_ref as $motorbike)
            <div class="row" style="margin-top: 10px;">
                <div class="col-md-5">
                    <a href="detail.html">
                        <img class="img-responsive" src="{{$IMAGES_PATH}}/motorbike/{{$motorbike->thumbnail}}" alt="">
                    </a>
                </div>
                <div class="col-md-7">
                    <a href="#"><b>{{$motorbike->title}}</b></a>
                </div>
                <div class="module line-clamp">
                    <p>{{$motorbike->short_description}}</p>
                </div>
                <div class="break"></div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .module {
        width: 90%;
        height: 40px;
        overflow: hidden;
        margin-left: auto;
        margin-right: auto;
    }

    .line-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>