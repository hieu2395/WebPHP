<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
  		return View('admin.loaitin.danhsach');
    }

    public function getThem()
    {
    	return View('admin.loaitin.them');
    }

    public function getSua()
    {
    	return View('admin.loaitin.sua');
    }

}
