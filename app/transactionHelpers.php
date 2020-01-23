<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\TransactionModel;


class transactionHelpers
{
	public function transactionByUser($data){
		$transaction = new TransactionModel();
    	$transaction->user_name = "dev";
    	$transaction->full_name = $data['from_bank_name'];
    	$transaction->member_type = "affeliate";
    	$transaction->mobile_no = "9504194000";
    	$transaction->species = "Loaded";
    	$transaction->transaction_id = $data["bank_trancode"];
    	$transaction->amount = $data["amount"];
    	$transaction->pay_mode = $data["method"];
    	$transaction->bank = $data["to_bank_code"];
    	$transaction->status = $data["status"];
    	$transaction->user_id = "";
    	$transaction->user_ip = $data["userIp"];
    	$transaction->user_device = "";
    	$transaction->user_browser = "";
    	$transaction->accountant_name = "";
    	$transaction->purchased_time = $data["date"];
    	$transaction->approver_time = "";
    	$transaction->save();
	}
}