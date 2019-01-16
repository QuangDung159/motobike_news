<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">Admin Area - Motorbike News</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            @if(isset($current_user))
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> {{$current_user->name}}</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{$URL_ADMIN_LOGOUT}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            @else
                <li>
                    <a href="{{$URL_ADMIN_LOGIN}}"><i class="fa fa-gear fa-fw"></i> Login</a>
                </li>
            @endif
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>