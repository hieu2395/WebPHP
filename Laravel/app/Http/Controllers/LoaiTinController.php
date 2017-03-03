<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach', ['loaitin'=>$loaitin]);
    }

    public function getThem()
    {
    	return View('admin.loaitin.them');
    }

    public function postThem(Request $request)
    {
        //kiem tra mang dau tien la loi mang t2 la hien thi ra mang hinh
        $this->validate($request,
            [
                'idTheLoai' => 'required',
                'Ten' => 'required|min:3|max:100',
            ],
            [
                'idTheLoai.required' => "Bạn Chưa Nhập Mã Thể Loại",
                'Ten.required' => 'Bạn chưa nhập tên thể loại',
                'Ten.min'=>'Tên thể loại ít nhất 3 ký tự',
                'Ten.max'=>'Tên thể loại tối đa 100 ký tự',
            ]);
        //lay du lieu luu vao model the loai
        $loaitin = new LoaiTin;
        $loaitin->idTheLoai = $request->idTheLoai;
        $loaitin->Ten = $request->Ten;
        //dung fuction cua dumautoload
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao','Thêm Thành Công');
    }

    public function getSua()
    {
    	return View('admin.loaitin.sua');
    }

}
