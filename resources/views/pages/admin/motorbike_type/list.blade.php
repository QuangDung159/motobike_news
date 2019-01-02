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
                                {{session("success")}}
                            </div>
                        @endif
                        @if(session("error"))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session("error")}}
                            </div>
                        @endif
                    </div>
                    <h1 class="page-header">Motorbike Type
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_motorbike_type as $motorbike_type_item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$motorbike_type_item->id}}</td>
                            <td>{{$motorbike_type_item->name}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <a href="{{$URL_ADMIN_MOTORBIKE_TYPE."/delete/".$motorbike_type_item->id}}">
                                    Delete
                                </a>
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                <a href="{{$URL_ADMIN_MOTORBIKE_TYPE.'/update/'.$motorbike_type_item->id}}">
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