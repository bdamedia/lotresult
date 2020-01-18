<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BlogController extends Controller {

  public function index()
  {
    //echo "admin/blog/index";
    return view('admin/home');
  }
}