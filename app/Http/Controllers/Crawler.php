<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Goutte\Client;
use App\Result;

class Crawler extends Controller
{
    //
    public function index() {
    	return "Not found";
    }

    public function getCurrentResult(){

        $url = "https://xosodaiphat.com/xsmb-xo-so-mien-bac.html";
        $resultData = crawlUrl($url);
        echo "<pre>";
        print_r($resultData);
        exit();
    }

    public function getOldResult(){


    }

}
