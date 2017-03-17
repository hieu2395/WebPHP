<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

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
        $theloai = TheLoai::all();
    	return View('admin.loaitin.them',['theloai'=>$theloai]);
    }

    public function postThem(Request $request)
    {
        //kiem tra mang dau tien la loi mang t2 la hien thi ra mang hinh
        $this->validate($request,
            [
                'TheLoai' => 'required',
                'Ten' => 'required|min:3|max:100|unique:LoaiTin,Ten',
            ],
            [
                'TheLoai.required' => "Bạn chưa chọn thể loại",
                'Ten.required' => 'Bạn chưa nhập tên loại tin',
                'Ten.min'=>'Tên loại tin ít nhất 3 ký tự',
                'Ten.max'=>'Tên loại tin tối đa 100 ký tự',
                'Ten.unique' => 'Tên loại tin đã tồn tại',
            ]);
        //lay du lieu luu vao model the loai
        $loaitin = new LoaiTin;
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->Ten = $request->Ten;
        //dung fuction cua dumautoload
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao','Thêm Thành Công');
    }

    public function getSua($id)
    {
        //tim id
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.sua', ['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    public function postSua(request $request, $id)
    {
        $loaitin = LoaiTin::find($id);
        $this->validate($request,
            [
                'Ten' => 'required|min:3|max:100',
                'TheLoai' => 'required',
            ]
            ,
            [
                'Ten.required' => 'Bạn chưa nhập tên loại tin',
                'Ten.min' => 'Tên loại tin ít nhất 3 ký tự',
                'Ten.max'=>'Tên loại tin tối đa 100 ký tự',
                'TheLoai.required' => "Bạn chưa chọn thể loại",
            ]
            );
        $loaitin = LoaiTin::find($id);
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();    
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }

    public function getXoa($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa Thành Công');
    }

}
