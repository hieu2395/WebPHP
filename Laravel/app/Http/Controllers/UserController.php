<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhSach()
    {
      $user = User::all();
  		return View('admin.user.danhsach', ['user'=>$user]);
    }

     public function getThem()
    {
  		return View('admin.user.them');
    }

     public function getSua()
    {
  		return View('admin.user.sua');
    }
}
