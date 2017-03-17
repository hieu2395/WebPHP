<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;

class CommentController extends Controller
{
    //

	public function getDanhSach()
	{
		$comment = Comment::all();
  		return View('admin.comment.danhsach', ['comment'=>$comment]);
	}

    public function getXoaUser($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/comment/danhsach')->with('thongbao', 'Xóa Comment Thành Công');
    }

    public function getXoa($id, $idTinTuc)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Xóa Comment Thành Công');
    }

}
