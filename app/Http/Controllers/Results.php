<?php

namespace App\Http\Controllers;
use App\Result;
use Illuminate\Http\Request;

class Results extends Controller
{
    public function index(){
        $result = Result::orderBy('created_at', 'desc')->get();
        $data['content'] = $result;
        //return view('currentResult',$data)->render();
        return view('currentResult')->with($data);
    }

    public function show(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();

        return $result;
    }
}
