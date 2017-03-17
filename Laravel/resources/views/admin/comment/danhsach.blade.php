@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-danger">Slide
                            <small class="text-info">Danh Sách</small>
                        </h1>
                    </div>

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr class="text-primary">
                                <th id="giua">Mã</th>
                                <th id="giua">Người Dùng</th>
                                <th id="giua">Nội Dung</th>
                                <th id="giua">Ngày Đăng</th>
                                <th id="giua">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comment as $cm)
                            <tr class="odd gradeX" id="giua">
                                <td>{{$cm->id}}</td>
                                <td>
                                    {{$cm->user->name}}
                                </td>
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->created_at}}</td>
                                <td id="giua"><a href="admin/comment/xoa/{{$cm->id}}" class="btn btn-danger"><i class="fa fa-trash-o  fa-fw"></i>Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection

<style type="text/css">
    #giua{
        text-align: center;
    }
</style>