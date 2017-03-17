<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
      $slide = Slide::all();
   		return View('admin.slide.danhsach', ['slide'=>$slide]);
    }

     public function getThem()
    {
   		return View('admin.slide.them');
    }

     public function postThem(Request $request)
    {
      $this->validate($request,
        [
          'Ten' => 'required',
          'NoiDung' => 'required'
        ]
        ,
        [
          'Ten.required' => 'Bạn chưa nhập tên slide',
          'NoiDung.required' => 'Bạn chưa nhập nội dung'
        ]);

      $slide = new Slide;
      $slide->Ten = $request->Ten;
      $slide->NoiDung = $request->NoiDung;
      if($request->has('link'))
      {
        $slide->link = $request->link;
      }

      if ($request->hasFile('Hinh')) 
      {
        $file = $request->file('Hinh');
        $duoi = $file->getClientOriginalExtension();
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
        {
          return redirect('admin/slide/them')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
        }
        $name = $file->getClientOriginalName();
        //khong trung ten file 
        $Hinh = str_random(4)."_".$name;
        //neu file ton tai tra~ ve True => chay vong lap random
        while (file_exists("upload/slide/".$Hinh)) 
        {
          $Hinh = str_random(4)."_".$name;
        }
        $file->move("upload/slide",$Hinh);
        $slide->Hinh = $Hinh;
      }
      else
      {
        $slide->Hinh = "";
      }
      //luu hinh
      $slide->save();

      return redirect('admin/slide/them')->with('thongbao','Thêm Thành Công');

    }

    public function getSua($id)
    {
      $slide = Slide::find($id);
      return View('admin.slide.sua',['slide'=>$slide]);
    }

     public function postSua(Request $request, $id)
    {
      $this->validate($request,
        [
          'Ten' => 'required',
          'NoiDung' => 'required'
        ]
        ,
        [
          'Ten.required' => 'Bạn chưa nhập tên slide',
          'NoiDung.required' => 'Bạn chưa nhập nội dung'
        ]);

      $slide = Slide::find($id);
      $slide->Ten = $request->Ten;
      $slide->NoiDung = $request->NoiDung;
      if($request->has('link'))
      {
        $slide->link = $request->link;
      }

      if ($request->hasFile('Hinh')) 
      {
        $file = $request->file('Hinh');
        $duoi = $file->getClientOriginalExtension();
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
        {
          return redirect('admin/slide/them')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
        }
        $name = $file->getClientOriginalName();
        //khong trung ten file 
        $Hinh = str_random(4)."_".$name;
        //neu file ton tai tra~ ve True => chay vong lap random
        while (file_exists("upload/slide/".$Hinh)) 
        {
          $Hinh = str_random(4)."_".$name;
        }
        unlink("upload/slide/".$slide->Hinh);
        $file->move("upload/slide",$Hinh);
        $slide->Hinh = $Hinh;
      }
      //luu hinh
      $slide->save();

      return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }

     public function getXoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
