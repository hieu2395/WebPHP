<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
      $tintuc = TinTuc::orderby('id','DESC')->get();
  		return View('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);
    }

     public function getThem()
    {
      $theloai = TheLoai::all();
      $loaitin = LoaiTin::all();
  		return View('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

     public function postThem(Request $request)
    {
      $this->validate($request,
        [
          'LoaiTin'=>'required',
          'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
          'TomTat'=>'required',
          'NoiDung'=>'required'
        ]
        ,
        [
          'LoaiTin.required'=>'Bạn chưa chọn loại tin',
          'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
          'TieuDe.min'=>'Tiêu đề phải ít nhất 3 ký tự',
          'TieuDe.unique'=>'Tiêu đề đã tồn tại',
          'TomTat.required'=>'Bạn chưa nhập tóm tắt',
          'NoiDung.required'=>'Bạn chưa nhập nội dung'
        ]);

      $tintuc = new TinTuc();
      $tintuc->TieuDe = $request->TieuDe;
      $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
      $tintuc->idLoaiTin = $request->LoaiTin;
      $tintuc->TomTat = $request->TomTat;
      $tintuc->NoiDung = $request->NoiDung;
      $tintuc->SoLuotXem = 0;

      if ($request->hasFile('Hinh')) 
      {
        $file = $request->file('Hinh');
        $duoi = $file->getClientOriginalExtension();
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
        {
          return redirect('admin/tintuc/them')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
        }
        $name = $file->getClientOriginalName();
        //khong trung ten file 
        $Hinh = str_random(4)."_".$name;
        //neu file ton tai tra~ ve True => chay vong lap random
        while (file_exists("upload/tintuc/".$Hinh)) 
        {
          $Hinh = str_random(4)."_".$name;
        }
        $file->move("upload/tintuc",$Hinh);
        $tintuc->Hinh = $Hinh;
      }
      else
      {
        $tintuc->Hinh = "";
      }
      //luu hinh
      $tintuc->save();
      return redirect('admin/tintuc/them')->with('thongbao','Thêm Thành Công');
    }


     public function getSua()
    {
  		return View('admin.tintuc.sua');
    }
}
