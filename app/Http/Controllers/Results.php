<?php

namespace App\Http\Controllers;
use App\Result;
use Illuminate\Http\Request;

class Results extends Controller
{
    public function index(){
        $result = Result::where('lottery_region','XSMB')->orderBy('created_at', 'desc')->get();
        $data['content'] = $result;
        //return view('currentResult',$data)->render();
        return view('currentResult')->with($data);
    }

    public function show(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();

        return $result;
    }


    public function xsmn($company){
        $result = Result::where('lottery_region', 'XSMN')->where('lottery_company', strtoupper($company))->orderBy('created_at', 'desc')->get();
        $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->get();
        $data['comp'] = $comp;
        $data['content'] = $result;

        return view('xsmnResult')->with($data);
    }

    public function xsmnShow(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();
        return $result;
    }

    public function xsmt(){
        $result = Result::where('lottery_region', 'xsmt')->orderBy('created_at', 'desc')->get();
        $data['content'] = $result;
        //return view('currentResult',$data)->render();
        return view('xsmtResult')->with($data);
    }

    public function xsmtShow(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();
        return $result;
    }
}
