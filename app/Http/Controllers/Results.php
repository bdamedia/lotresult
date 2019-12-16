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


    public function xsmn($company='XSTG'){
        $result = Result::where('lottery_region', 'XSMN')->where('lottery_company', strtoupper($company))->orderBy('created_at', 'desc')->get();
        $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = $comp;
        $data['companyName'] = strtoupper($company);
        $data['content'] = $result;

        return view('xsmnResult')->with($data);
    }

    public function xsmnShow(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();
        return $result;
    }

    public function xsmt($company='XSMT'){
        $result = Result::where('lottery_region', 'XSMT')->orderBy('created_at', 'desc')->get();
        $data['content'] = $result;
        $comp = Result::where('lottery_region', 'XSMT')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = $comp;
        $data['companyName'] = strtoupper($company);
        //return view('currentResult',$data)->render();
        return view('xsmtResult')->with($data);
    }

    public function xsmtShow(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();
        return $result;
    }
}
