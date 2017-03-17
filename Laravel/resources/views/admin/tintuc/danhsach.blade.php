@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-danger">Tin Tức
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
                                <th id="center">Tiêu Đề</th>
                                <th id="center">Tóm Tắt</th>
                                <th id="center">Thể Loại</th>
                                <th id="center">Loại Tin</th>
                                <th id="center">Số Lượt Xem</th>
                                <th id="center">Tin Nổi Bật</th>
                                <th id="center">Xóa</th>
                                <th id="center">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>
                                    <p style="width: 100px">{{$tt->TieuDe}}</p>
                                    <img width="150px" src="upload/tintuc/{{$tt->Hinh}}" />
                                </td>
                                <td width="200">{{$tt->TomTat}}</td>
                                <td>{{$tt->loaitin->theloai->Ten}}</td>
                                <td>{{$tt->loaitin->Ten}}</td>
                                <td>{{$tt->SoLuotXem}}</td>
                                <td>
                                    @if($tt->NoiBat == 0)
                                        {{'Không'}}
                                    @else
                                        {{'Có'}}
                                    @endif
                                </td>

                                <td class="center"><a href="admin/tintuc/xoa/{{$tt->id}}" class="btn btn-danger"><i class="fa fa-trash-o  fa-fw"></i>Xóa</a></td>
                                <td class="center"><a href="admin/tintuc/sua/{{$tt->id}}" class="btn btn-success"><i class="fa fa-pencil fa-fw"></i>Sửa</a></td>
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