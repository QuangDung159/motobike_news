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
                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                @foreach($errors->all() as $item)
                                    {{$item}}<br>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <h1 class="page-header">Motorbike
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Capacity (cc)</th>
                        <th>Motorbike Type</th>
                        <th>Manufacturer</th>
                        <th>Thumbnail</th>
                        <th>Unsigned Title</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_motorbike as $motorbike_item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$motorbike_item->id}}</td>
                            <td>{{$motorbike_item->name}}</td>
                            <td>{{$motorbike_item->capacity}}</td>
                            <td>{{$motorbike_item->motorbike_type->name}}</td>
                            <td>{{$motorbike_item->manufacturer->name}}</td>
                            <td>
                                <img width="150px" src="{{$IMAGES_PATH}}/motorbike/{{$motorbike_item->thumbnail}}"/>
                            </td>
                            <td>{{$motorbike_item->unsigned_title}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <a href="{{$URL_ADMIN_MOTORBIKE}}/{{$DELETE}}/{{$motorbike_item->id}}"> Delete</a>
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                <a href="{{$URL_ADMIN_MOTORBIKE}}/{{$UPDATE}}/{{$motorbike_item->id}}">Edit</a>
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