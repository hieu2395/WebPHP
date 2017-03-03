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

     public function getSua()
    {
   		return View('admin.slide.sua');
    }
}
