<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Goutte\Client;
use App\Result;

class Crawler extends Controller
{
    //
    public function index() {
    	return view('index');
    }

    public function getCurrentResult(){
    	return view('currentResult');
        /*$url = "https://xosodaiphat.com/xsmb-xo-so-mien-bac.html";
        $resultData = crawlUrl($url);
        echo "<pre>";
        print_r($resultData);
        exit();*/
    }

    //Get old result from database are per required
    public function getOldResult() {
    	/*$url = "https://xosodaiphat.com/xsmb-xo-so-mien-bac.html";
        $resultData = crawlUrlFirst($url);
        echo "<pre>";
        print_r($resultData);
        exit();*/
        return view('oldResult');
    }

}
