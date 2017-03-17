@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
         <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-danger">User
                            <small class="text-info">{{$user->name}}</small>
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
                        
                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input class="form-control" name="name" placeholder="Nhập Tên Người Dùng" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập Địa Chỉ Email" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label>Đổi Mật Khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập Mật Khẩu" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Nhập Lại Mật Khẩu</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập Lại Mật Khẩu" disabled="" />
                            </div>
                            
                            <div class="form-group">
                                <label>Quyền</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0"

                                    <?php if ($user->quyen == 0): ?>
                                        {{"checked"}}
                                    <?php endif ?>

                                     type="radio">Thường
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1"

                                    <?php if ($user->quyen == 1): ?>
                                        {{"checked"}}
                                    <?php endif ?>

                                     type="radio">Admin
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
        </div>
        <!-- /#page-wrapper -->
@endsection


<!-- tick kiem tra doi mat khau -->
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if ($(this).is(":checked")) 
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection