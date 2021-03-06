@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-danger">Thể Loại
                            <small class="text-info">Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr class="text-primary">
                                <th id="center">Mã</th>
                                <th id="center">Tên</th>
                                <th id="center">Tên Không Dấu</th>
                                <th id="center">Xóa</th>
                                <th id="center">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($theloai as $tl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tl->id}}</td>
                                <td>{{$tl->Ten}}</td>
                                <td>{{$tl->TenKhongDau}}</td>
                                <td class="center"><a href="admin/theloai/xoa/{{$tl->id}}" class="btn btn-danger"><i class="fa fa-trash-o  fa-fw"></i>Xóa</a></td>
                                <td class="center"><a href="admin/theloai/sua/{{$tl->id}}" class="btn btn-success"><i class="fa fa-pencil fa-fw"></i>Sửa</a></td>
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