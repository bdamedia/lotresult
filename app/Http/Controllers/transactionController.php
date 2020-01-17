<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use DB;

class transactionController extends Controller
{
    public function deposite(){
    	return view('five88_frontend.pages.home');
    }

    public function recharge(Request $request){
    	$userIp = $request->ip();
    	$userDevice = $_SERVER['HTTP_USER_AGENT'] ;
    	return $userDevice;
    }
}
