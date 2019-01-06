<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Admin Area - Khoa Phạm</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

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
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
    <!-- /.navbar-static-side -->
</nav>