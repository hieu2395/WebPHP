 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-danger">Tin Tức
                            <small class="text-info">{{$tintuc->TieuDe}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif    

                        <!-- co enctype="multipart/form-data" moi up dc file -->
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                        <option 

                                        @if($tintuc->loaitin->theloai->id == $tl->id)
                                            {{"selected"}}
                                        @endif

                                        value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>

                             <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                     @foreach($loaitin as $lt)
                                        <option 

                                        @if($tintuc->loaitin->theloai->id == $tl->id)
                                            {{"selected"}}
                                        @endif

                                        value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Nhập Tiêu Đề" value="{{$tintuc->TieuDe}}" />
                            </div>

                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea class="form-control ckeditor" id="demon" rows="3" name="TomTat">
                                    {{$tintuc->TomTat}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control ckeditor" id="demon" rows="5" name="NoiDung">
                                    {{$tintuc->NoiDung}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <p>
                                    <img width="400px" src="upload/tintuc/{{$tintuc->Hinh}}">
                                </p>
                                <input type="file" name="Hinh" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" type="radio"
                                    @if($tintuc->NoiBat == 0)
                                        {{"checked"}}
                                    @endif>Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio" 
                                    @if($tintuc->NoiBat == 1)
                                        {{"checked"}}
                                    @endif>Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success">Sửa</button>
                            <button type="reset" class="btn btn-danger">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-danger">Bình Luận
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
                            <tr>
                                <th id="giua">Mã</th>
                                <th id="giua">Người Dùng</th>
                                <th id="giua">Nội Dung</th>
                                <th id="giua">Ngày Đăng</th>
                                <th id="giua">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($tintuc->comment as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>
                                    {{$cm->user->name}}
                                </td>
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->created_at}}</td>
                                <td class="center"><a href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}" class="btn btn-danger"><i class="fa fa-trash-o  fa-fw"></i>Xóa</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
             <!-- end row -->
        </div>
        <!-- /#page-wrapper -->
 @endsection

 <!--Ajax Loai Tin Theo The Loai-->
 @section('script')
    <script>
        $(document).ready(function(){
            $('#TheLoai').change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
 @endsection

 <style type="text/css">
     #giua{
        text-align: center;
     }
 </style>