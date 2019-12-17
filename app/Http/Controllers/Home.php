<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class Home extends Controller
{
    //
    public function index() {
	   $f = nods("https://xosodaiphat.com/xsmn-xo-so-mien-nam.html");
	   echo "<pre>";
		print_r($f);
		 die();
     return view('home');
    }
   public function create() {
      echo 'create';
   }
   public function store(Request $request) {
      echo 'store';
   }
   public function show($id) {
      echo 'show';
   }
   public function edit($id) {
      echo 'edit';
   }
   public function update(Request $request, $id) {
      echo 'update';
   }
   public function destroy($id) {
      echo 'destroy';
   }
}
