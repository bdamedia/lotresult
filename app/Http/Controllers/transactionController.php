<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use DB;
use Illuminate\Support\Facades\Input;
use App\TransactionModel;
use App\transactionHelpers;
use MongoDB\BSON\UTCDateTime;

class transactionController extends Controller
{
    public function deposite(){
    	return view('five88_frontend.pages.home');
    }

    public function recharge(Request $request){
        $recharge_data = [];
    	$recharge_data["userIp"] = $request->ip();
    	$recharge_data["userDevice"] = $_SERVER['HTTP_USER_AGENT'] ;
    	$recharge_data["status"] = "Waiting for progressing";
        $recharge_data["date"] = new UTCDateTime(Carbon::now());
        $recharge_data["from_bank_name"] = $request->from_bank_name;
        $recharge_data["bank_trancode"] = $request->bank_trancode;
        $recharge_data["amount"] = $request->amount;
        $recharge_data["to_bank_code"] = $request->to_bank_code;
    	$recharge_data["method"] = $request->method;
    	// $data = (new transactionHelpers())->transactionByUser($recharge_data);
        
        // return 'success';
    }       
}
