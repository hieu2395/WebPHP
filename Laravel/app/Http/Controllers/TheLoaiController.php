<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getDanhSach()
    {
    	$theloai = TheLoai::all();
    	return view('admin.theloai.danhsach', ['theloai'=>$theloai]);
    }

    public function getThem()
    {
    	return view('admin.theloai.them');
    }

    public function postThem(Request $request)
    {
        //kiem tra mang dau tien la loi mang t2 la hien thi ra mang hinh
        $this->validate($request,
            [
                'Ten' => 'required|min:3|max:100|unique:TheLoai,Ten'
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên thể loại',
                'Ten.min'=>'Tên thể loại ít nhất 3 ký tự',
                'Ten.max'=>'Tên thể loại tối đa 100 ký tự',
                'Ten.unique' => 'Tên thể loại đã tồn tại',
            ]);
        //lay du lieu luu vao model the loai
        $theloai = new TheLoai;
        $theloai->Ten = $request->Ten;
        //dung fuction cua dumautoload
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm Thành Công');
    }

    public function getSua($id)
    {
        //tim id
        $theloai = TheLoai::find($id);
    	return view('admin.theloai.sua', ['theloai'=>$theloai]);
    }

    public function postSua(request $request, $id)
    {
        $theloai = TheLoai::find($id);
        $this->validate($request,
            [
                'Ten' => 'required|min:3|max:100'
            ]
            ,
            [
                'Ten.required' => 'Bạn chưa nhập tên thể loại',
                'Ten.min' => 'Tên thể loại ít nhất 3 ký tự',
                'Ten.max'=>'Tên thể loại tối đa 100 ký tự',
            ]
            );
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();    
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }

    public function getXoa($id)
    {
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
