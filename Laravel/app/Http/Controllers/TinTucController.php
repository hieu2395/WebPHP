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
  		return View('admin.tintuc.them');
    }

     public function getSua()
    {
  		return View('admin.tintuc.sua');
    }
}
