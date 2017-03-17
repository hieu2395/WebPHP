@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
                <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-danger">Slide
                            <small class="text-info">{{$slide->Ten}}</small>
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
                        <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="Ten" placeholder="Nhập Tên Slide" value="{{$slide->Ten}}" />
                            </div>

                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control ckeditor" id="demon" rows="3" name="NoiDung">
                                    {{$slide->NoiDung}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label>Đường Dẫn</label>
                                <input class="form-control" name="link" placeholder="Nhập Đường Dẫn" value="{{$slide->link}}" />
                            </div>

                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <p>
                                    <img width="500px" src="upload/slide/{{$slide->Hinh}}">
                                </p>
                                <input type="file" name="Hinh" class="form-control" />
                            </div>
                            
                            <button type="submit" class="btn btn-success">Sửa</button>
                            <button type="reset" class="btn btn-danger">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection