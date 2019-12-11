<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class Home extends Controller
{
    //
   public function index() {


	   $url = "https://xosodaiphat.com/xsmb-xo-so-mien-bac.html";
       $client = new Client();
       $crawler = $client->request('GET', $url);
	
		echo "<pre>";


		$links_count = $crawler->filter('table')->count();
		$all_links = [];
		if($links_count > 0){
			$links = $crawler->filter('table');
			foreach ($links as $link) {
				$all_links[] = $link;
			}
			//$all_links = array_unique($all_links);
			echo "All Avialble Links From this page $url Page<pre>";
			//print_r($all_links); echo "</pre>";
			print_r($all_links[0]->nodeValue); echo "</pre>";
		}else{
			echo "No Links Found";
	}
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
