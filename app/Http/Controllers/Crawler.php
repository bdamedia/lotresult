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

        $url = "https://xosodaiphat.com/xsmb-xo-so-mien-bac.html";
        $resultData = crawlUrl($url);
        $result = new Result();
        foreach ($resultData as $res){

            $data = Result::where('lottery_region',$res['lottery_region'])->where('lottery_company',$res['lottery_company'])->where('result_day_time',$res['result_day_time'])->get();
            if($data->count()){
            continue;
            }else{
                $result->lottery_region = $res['lottery_region'];
                $result->lottery_company = $res['lottery_company'];
                $result->result_day_time = $res['result_day_time'];
                $i = 1;
                foreach ($res['data'] as $key=>$detailsData){
                    if($key == 'board'){
                        $name = $key;
                        $result->{$name} = json_encode($res['data'][$key]);
                    }else{
                        $name = "prize_".$i;
                        $result->{$name} = json_encode(array($key=>$res['data'][$key]));
                        $i++;
                    }
                }
                $result->save();
            }

        }
       // exit();
    }

    public function xsmnCurrentResult(){

        $url = "https://xosodaiphat.com/xshcm-xo-so-tphcm.html";
        $resultData = crawlUrlModified($url);

        $result = new Result();
        foreach ($resultData as $res){
            if(isset($res['lottery_region'])) {
                $data = Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time', $res['result_day_time'])->get();
                if ($data->count()) {
                    continue;
                } else {

                        $result->lottery_region = $res['lottery_region'];
                        $result->lottery_company = $res['lottery_company'];
                        $result->result_day_time = $res['result_day_time'];
                        $i = 1;
                        foreach ($res['data'] as $key => $detailsData) {
                            if ($key == 'board') {
                                $name = $key;
                                $result->{$name} = json_encode($res['data'][$key]);
                            } else {
                                $name = "prize_" . $i;
                                $result->{$name} = json_encode(array($key => $res['data'][$key]));
                                $i++;
                            }
                        }
                        $result->save();


                }
            }

        }
       // exit();
    }

    //Get old result from database are per required
    public function getOldResult() {
    	$url = "https://xosodaiphat.com/xsmb-xo-so-mien-bac.html";
        $resultData = crawlUrlFirst($url);
        echo "<pre>";
        print_r($resultData);
        exit();
    }


    public function saveDatabase(Request $request, $link){
        $url = "https://xosodaiphat.com/". $link;
        $resultData = crawlUrlModified($url);
        $result = new Result();
        //echo "<pre>";
        //print_r($resultData);
        //exit();
        foreach ($resultData as $res){
            if(isset($res['lottery_region'])) {
                $data = Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time', $res['result_day_time'])->get();
                if ($data->count()) {
                    continue;
                } else {

                        $result->lottery_region = $res['lottery_region'];
                        $result->lottery_company = $res['lottery_company'];
                        $result->result_day_time = $res['result_day_time'];
                        $i = 1;
                        foreach ($res['data'] as $key => $detailsData) {
                            if ($key == 'board') {
                                $name = $key;
                                $result->{$name} = json_encode($res['data'][$key]);
                            } else {
                                $name = "prize_" . $i;
                                $result->{$name} = json_encode(array($key => $res['data'][$key]));
                                $i++;
                            }
                        }
                        $result->save();

                }
            }
        }
       //exit();
    }

    public function xsmtCurrentResult(Request $request, $link){
        $url = "https://xosodaiphat.com/". $link;
        $resultData = crawlUrlModified($url);
        $result = new Result();
        foreach ($resultData as $res){
            if(isset($res['lottery_region'])) {
                $data = Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time', $res['result_day_time'])->get();
                if ($data->count()) {
                    continue;
                } else {

                        $result->lottery_region = $res['lottery_region'];
                        $result->lottery_company = $res['lottery_company'];
                        $result->result_day_time = $res['result_day_time'];
                        $i = 1;
                        foreach ($res['data'] as $key => $detailsData) {
                            if ($key == 'board') {
                                $name = $key;
                                $result->{$name} = json_encode($res['data'][$key]);
                            } else {
                                $name = "prize_" . $i;
                                $result->{$name} = json_encode(array($key => $res['data'][$key]));
                                $i++;
                            }
                        }
                        $result->save();
                }
            }

        }
       // exit();
    }
}
