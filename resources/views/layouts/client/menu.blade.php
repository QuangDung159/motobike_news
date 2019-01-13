<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Menu
        </li>
        @foreach($list_manufacturer as $manufacturer)
            <li href="#" class="list-group-item menu1">
                {{$manufacturer->name}}
            </li>
            <ul>
                @foreach($list_motorbike_type as $motorbike_type)
                    <li class="list-group-item">
                        <a href="">{{$motorbike_type->name}}</a>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </ul>
</div>