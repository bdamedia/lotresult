<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Result;
use Carbon\Carbon;
use App\Http\Controllers\Crawler;

class ResultsController extends Controller
{
    public function index(){
        $all = Result::all();
        $data['data'] = $all;
        return view('admin/results/index')->with($data);
    }

    public function view($id){
        $all = Result::where('_id',$id);
        $data['data'] = $all;
        print_r($data);
        return view('admin/results/show')->with($data);
    }
}
