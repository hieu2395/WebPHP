@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã Tin</th>
                                <th>Tiêu Đề</th>
                                <th>Tên Không Dấu</th>
                                <th>Tóm Tắt</th>
                                <th>Nội Dung</th>
                                <th>Hình</th>
                                <th>Tin Nổi Bật</th>
                                <th>Số Lượt Xem</th>
                                <th>Mã Loại Tin</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($tintuc as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{{$tt->TieuDe}}</td>
                                <td>{{$tt->TieuDeKhongDau}}</td>
                                <td>{{$tt->TomTat}}</td>
                                <td>{{$tt->NoiDung}}</td>
                                <td>{{$tt->Hinh}}</td>
                                <td>{{$tt->NoiBat}}</td>
                                <td>{{$tt->SoLuotXem}}</td>
                                <td>{{$tt->idLoaiTin}}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tt->id}}">Sửa</a></td>
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