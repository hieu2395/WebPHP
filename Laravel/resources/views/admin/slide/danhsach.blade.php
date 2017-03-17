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
                                <th id="center">Mã Slide</th>
                                <th id="center">Tên Slide</th>
                                <th id="center">Hình</th>
                                <th id="center">Nội Dung</th>
                                <th id="center">Đường Dẫn</th>
                                <th id="center">Xóa</th>
                                <th id="center">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slide as $sl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$sl->id}}</td>
                                <td>{{$sl->Ten}}</td>
                                <td>
                                    <img width="200px" src="upload/slide/{{$sl->Hinh}}">
                                </td>
                                <td>{{$sl->NoiDung}}</td>
                                <td>{{$sl->link}}</td>
                                <td class="center"><a href="admin/slide/xoa/{{$sl->id}}" class="btn btn-danger"><i class="fa fa-trash-o  fa-fw"></i>Xóa</a></td>
                                <td class="center"><a href="admin/slide/sua/{{$sl->id}}" class="btn btn-success"><i class="fa fa-pencil fa-fw"></i>Sửa</a></td>
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
    #center{
        text-align: center;
    }
</style>