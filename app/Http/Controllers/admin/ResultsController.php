<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Result;

class ResultsController extends Controller
{
    public function index(){
        $all = Result::all();
        $data['data'] = $all;
        return view('admin/results/index')->with($data);
    }

    public function view(Request $request,$id){
        $all = Result::where('_id',$id)->first();
        $data['data'] = $all;
        return view('admin/results/show')->with($data);
    }
}
