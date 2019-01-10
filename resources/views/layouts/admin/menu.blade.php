<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{$URL_ADMIN_DASHBOARD}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            @foreach($list_entity as $entity)
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> {{$entity->name}}<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if($entity->name != "Comment")
                            <li>
                                {{-- admin/motorbike_type/add --}}
                                <a href="{{$ADMIN}}/{{$entity->alias}}/{{$ADD}}">Add {{$entity->name}}</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{$ADMIN}}/{{$entity->alias}}/{{$LIST}}">List {{$entity->name}}</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            @endforeach
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Policy<span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{$ADMIN}}/policy/{{$LIST}}">List Policy</a>
                    </li>
                    <li>
                        {{-- admin/motorbike_type/add --}}
                        <a href="{{$ADMIN}}/policy/{{$ADD}}">Add Policy</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>