<?php

namespace App\Http\Controllers;

use App\Result;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateTime;
use Illuminate\Http\Request;
use MongoDB\BSON\UTCDateTime;
use function MongoDB\BSON\toJSON;
use App\RegionCompany;

class Crawler extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function getCompanyRegions(){

        $allCompany = getRegionsCompany();

            foreach ($allCompany as $company){
                $data = RegionCompany::where('lottery_region', 'XSMN')->where('lottery_company', $company['code'])->get();
                if ($data->count()) {
                    RegionCompany::where('lottery_region', 'XSMN')->where('lottery_company', $company['code'])->first()->update(['lottery_company_slug'=> seoUrl($company['name'])]);
                    continue;
                }else{
                    $regionCompany = new RegionCompany();
                    $regionCompany->lottery_region = 'XSMN';
                    $regionCompany->lottery_company = $company['code'];
                    $regionCompany->lottery_company_names = $company['name'];
                    $regionCompany->lottery_company_slug = seoUrl($company['name']);
                    $regionCompany->lottery_company_url = $company['url'];
                    $regionCompany->save();

                }

            }
        }

    public function getCurrentResult($url1='')
    {

        if($url1){
            $url = "https://xosodaiphat.com/".$url1;
            $resultData = crawlUrlModified($url);
        }else{
            $url = "https://xosodaiphat.com/xsmb-xo-so-mien-bac.html";
            $resultData = crawlUrl($url);
        }

        //$url = "https://xosodaiphat.com/xsmb-xo-so-mien-bac.html";

        foreach ($resultData as $k=>$res) {
            if (isset($res['data']) && count($res['data']) > 1){


                $da = explode('/', $res['result_day_time']);
            $orig_date = Carbon::createFromFormat("!Y-m-d", $da[2] . '-' . $da[1] . '-' . $da[0]);
            $orig_date1 = Carbon::createFromFormat("!Y-m-d", $da[2] . '-' . $da[1] . '-' . $da[0]);
            $orig_date1 = $orig_date1->addDay(1);
            $data = Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time', '>=', $orig_date)->where('result_day_time', '<', $orig_date1)->get();

            if ($data->count()) {
                Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time', '>=', $orig_date)->where('result_day_time', '<', $orig_date1)->first()->delete();
                $result = new Result();
                $result->lottery_region = $res['lottery_region'];
                $result->lottery_company = $res['lottery_company'];
                $da = explode('/', $res['result_day_time']);
                $orig_date = Carbon::createFromDate($da[2], $da[1], $da[0]);
                $result->result_day_time = new UTCDateTime($orig_date);
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

            } else {
                $result = new Result();
                $result->lottery_region = $res['lottery_region'];
                $result->lottery_company = $res['lottery_company'];
                $da = explode('/', $res['result_day_time']);
                $orig_date = Carbon::createFromDate($da[2], $da[1], $da[0]);
                $result->result_day_time = new UTCDateTime($orig_date);
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

    public function xsmnCurrentResult()
    {

        $url = "https://xosodaiphat.com/xshcm-xo-so-tphcm.html";
        $resultData = crawlUrlModified($url);

        $result = new Result();
        foreach ($resultData as $res) {
            if (isset($res['lottery_region'])) {
                $da = explode('/', $res['result_day_time']);
                $orig_date = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
                $orig_date1 = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
                $orig_date1 = $orig_date1->addDay(1);
                $data = Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time' ,'>=', $orig_date)->where('result_day_time' ,'<', $orig_date1)->get();

                if ($data->count()) {
                    continue;
                } else {

                    $result->lottery_region = $res['lottery_region'];
                    $result->lottery_company = $res['lottery_company'];
                    $result->result_day_time = new UTCDateTime(new DateTime(strtotime($res['result_day_time'])));
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
    public function getOldResult()
    {
        $url = "https://xosodaiphat.com/xsmb-xo-so-mien-bac.html";
        $resultData = crawlUrlFirst($url);
        echo "<pre>";
        print_r($resultData);
        exit();
    }


    public function saveDatabase(Request $request, $link)
    {
        $url = "https://xosodaiphat.com/" . $link;
        $resultData = crawlUrlModified($url);
        $result = new Result();

        foreach ($resultData as $res) {
            if (isset($res['lottery_region'])) {
                $da = explode('/', $res['result_day_time']);
                $orig_date = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
                $orig_date1 = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
                $orig_date1 = $orig_date1->addDay(1);
                $data = Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time' ,'>=', $orig_date)->where('result_day_time' ,'<', $orig_date1)->get();

                if ($data->count()) {
                    continue;
                } else {

                    $result->lottery_region = $res['lottery_region'];
                    $result->lottery_company = $res['lottery_company'];
                    $result->result_day_time = new UTCDateTime(new DateTime(strtotime($res['result_day_time'])));
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
                    //$result->save();

                }
            }
        }
        //exit();
    }

    public function xsmtCurrentResult(Request $request, $link)
    {
        $url = "https://xosodaiphat.com/" . $link;
        $resultData = crawlUrlModified($url);
        foreach ($resultData as $res) {
            if (isset($res['lottery_region'])) {
                $result = new Result();
                $da = explode('/', $res['result_day_time']);
                 $orig_date = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
                 $orig_date1 = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
                 $orig_date1 = $orig_date1->addDay(1);
                $data = Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time' ,'>=', $orig_date)->where('result_day_time' ,'<', $orig_date1)->get();

                if ($data->count() > 0) {
                    Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time' ,'>=', $orig_date)->where('result_day_time' ,'<', $orig_date1)->first()->delete();
                    $result->lottery_region = $res['lottery_region'];
                    $result->lottery_company = $res['lottery_company'];
                    $orig_date = Carbon::createFromDate($da[2], $da[1], $da[0]);
                    $result->result_day_time = new UTCDateTime($orig_date);
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
                } else {

                    $result->lottery_region = $res['lottery_region'];
                    $result->lottery_company = $res['lottery_company'];
                    $orig_date = Carbon::createFromDate($da[2], $da[1], $da[0]);
                    $result->result_day_time = new UTCDateTime($orig_date);
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

    }



    public function reloadCurrentResult(Request $request, $link)
    {
        $reg = array('XSMN'=>'ket-qua-xsmn','XSMT'=>'ket-qua-xsmt','XSMB'=>'ket-qua-xsmb');
        $url = "https://xosodaiphat.com/" . $link;
        $resultData = crawlUrlModified($url);
        $url = '';
        foreach ($resultData as $res) {
            if (isset($res['lottery_region'])) {
                $result = new Result();
                $da = explode('/', $res['result_day_time']);
                 $orig_date = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
                 $orig_date1 = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
                 $orig_date1 = $orig_date1->addDay(1);
                $data = Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time' ,'>=', $orig_date)->where('result_day_time' ,'<', $orig_date1)->get();

                if ($data->count() > 0) {
                    continue;
                } else {

                    $result->lottery_region = $res['lottery_region'];
                    $result->lottery_company = $res['lottery_company'];
                    $orig_date = Carbon::createFromDate($da[2], $da[1], $da[0]);
                    $result->result_day_time = new UTCDateTime($orig_date);
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
                if(isset($res['lottery_region'])){

                     $url = strtolower($reg[$res['lottery_region']]).'/'.$res['lottery_company'];
                }
            }


        }
        //echo $url;
       // return redirect($url);
    }

    public function CroneJob(Request $request){

        $all = getTodayResultCompany();

        foreach ($all as $c){
            echo $c->lottery_company_url;
            $this->xsmtCurrentResult($request,$c->lottery_company_url);
        }
    }

    public function listCompanyDaywise(Request $request){
        $date = $request->input('date');
        $date1 = Carbon::createFromFormat('!Y-m-d',$date);
       /* $date2 = Carbon::createFromFormat('!Y-m-d',$date);
        $date2 = $date2->addDay(1);*/
        $day = $date1->toDateTime()->format('l');
        $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
        $bindArray = arrayDayBind();
        $list =  $bindArray[$day];
        $result = RegionCompany::whereIn('lottery_company',$list)->get(); //->where('result_day_time','>=',$date1)->where('result_day_time','=<',$date2)->all();
        //print_r($result);
        return $result;
    }

    public function getSearchBydayandNumber(Request $request){
        $date = $request->input('date');
        $number = $request->input('number');
        $company = $request->input('company');
        $date1 = Carbon::createFromFormat('!Y-m-d',$date);
        $date2 = Carbon::createFromFormat('!Y-m-d',$date);
        $date2 = $date2->addDay(1);
        $day = $date1->toDateTime()->format('l');
        $result = Result::where('lottery_company',$company)->where('result_day_time','>=',$date1)->where('result_day_time','<',$date2)->get();
         $checkViewRegion = collect($result)->first()->lottery_region;

        $data['content'] = $result;

        if ($request->ajax()) {
            if ($checkViewRegion == 'XSMB'){
                $view = view('xsmbPaginate', $data)->render();
        }elseif ($checkViewRegion == 'XSMT'){
                $view = view('xsmtPaginate', $data)->render();
            }elseif ($checkViewRegion == 'XSMN'){
                $view = view('xsmnSinglePaginate', $data)->render();
            }
            return response()->json(['html'=>$view]);
        }
       // return view('xsmtPaginate')->with($result);
        //return $result;
    }
    public function CroneJobFull(Request $request){


        $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=33&pageIndex=1");
        $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=32&pageIndex=1");
       // $period = CarbonPeriod::create('2019-01-01', '2020-01-01');

// Iterate over the period
       // foreach ($period as $date) {
          //  $d = $date->format('d-m-Y');

           // $this->getCurrentResult("xsmb-$d.html");
      //  }

// Convert the period to an array of dates
       // $dates = $period->toArray();
       // print_r($dates);
       // for($j=1;$j<36;$j++){
        //    for($i=1;$i<7;$i++){
             /*  $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=30&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=34&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=35&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=36&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=37&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=38&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=39&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=40&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=41&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=42&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=43&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=44&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=45&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=14&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=13&pageIndex=".$i);
               $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=15&pageIndex=".$i);*/

                /*$this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=31&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=32&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=33&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=10&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=11&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=13&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=16&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=17&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=18&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=19&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=20&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=21&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=22&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=23&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=24&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=25&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=26&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=27&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=28&pageIndex=".$i);
                $this->xsmtCurrentResult($request,"getmore-kqdai-ajax.html?lotteryId=29&pageIndex=".$i);*/
                //echo "loadmore-lottery-mb.html?pageIndex=".$i;
                //$this->getCurrentResult("loadmore-lottery-mb-theo-thu.html?pageIndex=$i&dayofWeek=cn");
                /*$this->getCurrentResult("loadmore-lottery-mb-theo-thu.html?pageIndex=$i&dayofWeek=cn");
                $this->getCurrentResult("loadmore-lottery-mb-theo-thu.html?pageIndex=$i&dayofWeek=7");
                $this->getCurrentResult("loadmore-lottery-mb-theo-thu.html?pageIndex=$i&dayofWeek=6");
                $this->getCurrentResult("loadmore-lottery-mb-theo-thu.html?pageIndex=$i&dayofWeek=5");
                $this->getCurrentResult("loadmore-lottery-mb-theo-thu.html?pageIndex=$i&dayofWeek=4");
                $this->getCurrentResult("loadmore-lottery-mb-theo-thu.html?pageIndex=$i&dayofWeek=3");
                $this->getCurrentResult("loadmore-lottery-mb-theo-thu.html?pageIndex=$i&dayofWeek=2");*/
                //$this->getCurrentResult("loadmore-lottery-mb.html?pageIndex=$i");
          //  }
       // }



    }
}
