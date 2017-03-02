<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
  		return View('admin.tintuc.danhsach');
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
