<?php

namespace App\Http\Controllers;
use App\Result;
use Illuminate\Http\Request;

class Results extends Controller
{
    public function index(){
        $result = new Result();
        $result = Result::all();
        echo "<pre>";
        print_r($result);
        return $result;
       /* $result->lottery_region = 'North';
        $result->lottery_company = 'VT';
        $result->prize_1 = '[ { "numbers": 18 } , { "prize_amount": 9 } ]';
        $result->prize_2 = '[ { "numbers": 82 } , { "prize_amount": 9 } ]';
        $result->prize_3 = '[ { "numbers": 81 } , { "prize_amount": 9 } ]';
        $result->prize_4 = '[ { "numbers": 58 } , { "prize_amount": 9 } ]';
        $result->prize_5 = '[ { "numbers": 68 } , { "prize_amount": 9 } ]';
        $result->prize_6 = '[ { "numbers": 8 } , { "prize_amount": 9 } ]';
        $result->prize_7 = '[ { "numbers": 8 } , { "prize_amount": 9 } ]';
        $result->prize_8 = '[ { "numbers": 8 } , { "prize_amount": 9 } ]';
        $result->prize_9 = '[ { "numbers": 8 } , { "prize_amount": 9 } ]';
        $result->result_day_time = time();
        $result->save();*/
    }

    public function show(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();

        return $result;
    }
}
