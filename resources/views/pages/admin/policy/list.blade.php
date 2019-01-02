@extends("layouts.admin.index")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
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
                    <h1 class="page-header">Policy
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>Role Name</th>
                        <th>Activity Name</th>
                        <th>Entity name</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_policy as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item->role->name}}</td>
                            <td>{{$item->activity->name}}</td>
                            <td>{{$item->entity->name}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <a href="{{$URL_ADMIN_POLICY}}/{{$DELETE}}/{{$item->id}}">
                                    Delete
                                </a>
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                <a href="{{$URL_ADMIN_POLICY}}/{{$UPDATE}}/{{$item->id}}">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection