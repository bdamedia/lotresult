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


    }

    //Get old result from database are per required
    public function getOldResult() {
    	return "Old result";
    }

}
