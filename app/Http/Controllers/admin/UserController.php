<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){

        $result = User::all();
        $data['data'] = $result;
        return view('admin/users')->with($data);
    }

    public function view(Request $request){
        $result = User::where('id',$request->input('id'))->get();
        $data['data'] = collect($result)->first();
        return view('admin/userEdit')->with($data);
    }
}
