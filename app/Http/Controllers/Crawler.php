<?php

namespace App\Http\Controllers;

use App\Result;
use Carbon\Carbon;
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

    public function getCurrentResult()
    {

        $url = "https://xosodaiphat.com/xsmb-xo-so-mien-bac.html";
        $resultData = crawlUrl($url);

        foreach ($resultData as $res) {
            $da = explode('/', $res['result_day_time']);
            $orig_date = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
            $orig_date1 = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
            $orig_date1 = $orig_date1->addDay(1);
            $data = Result::where('lottery_region', $res['lottery_region'])->where('lottery_company', $res['lottery_company'])->where('result_day_time' ,'>=', $orig_date)->where('result_day_time' ,'<', $orig_date1)->get();

            if ($data->count()) {
                continue;
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
        $reg = array('XSMN'=>'ket-qua-xo-so-mien-nam','XSMT'=>'ket-qua-xo-so-mien-trung','XSMB'=>'ket-qua-xo-so-mien-bac');
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
        $all = RegionCompany::all();

        foreach ($all as $c){
            echo $c->lottery_company_url;
            $this->xsmtCurrentResult($request,$c->lottery_company_url);
        }
    }
}
