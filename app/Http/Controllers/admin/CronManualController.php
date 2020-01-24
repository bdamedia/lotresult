<?php

namespace App\Http\Controllers\admin;

use App\CronManual;
use App\Http\Controllers\Controller;
use App\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Crawler;

class CronManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = CronManual::all();
        $data['data'] = $all;
        return view('admin/cron/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        return view('admin/cron/create');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CronManual  $cronManual
     * @return \Illuminate\Http\Response
     */
    public function show(CronManual $cronManual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CronManual  $cronManual
     * @return \Illuminate\Http\Response
     */
    public function edit(CronManual $cronManual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CronManual  $cronManual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CronManual $cronManual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CronManual  $cronManual
     * @return \Illuminate\Http\Response
     */
    public function destroy(CronManual $cronManual)
    {
        //
    }


    public function create(Request $request,$company='XSMB'){

        $checkUrl = explode('/',$request->url());
        $url = explode('-',end($checkUrl));
        $url = end($url);
        $region  = strtoupper(str_replace('kq','',$url));

        $date = Carbon::now()->format('Y-m-d');
        $orig_date = Carbon::createFromFormat("!Y-m-d",$date);
        /*$c = getTodayResultCompanyRegion($region);
        print_r($c);*/
        $result = Result::where('lottery_region',$region)->where('result_day_time' ,'>=', $orig_date)->orderBy('result_day_time', 'desc')->limit(4)->get();

        $new = array();

        $data['region'] = strtolower($region);
        $data['companyName'] = strtoupper($company);
        if($region == 'XSMB'){
            $data['content'] = $result;
            $data['region'] = $region;
            return view('admin/cron/create-xsmb')->with($data);
        }elseif($region == 'XSMT'){
            $data['companies'] = getTodayResultCompanyRegion($region);
            $t = 0;
            foreach ($result as $res){
                if($res->prize_1){
                    $k = $res->result_day_time->toDateTime()->format('d/m/y');
                    $new[$k][$t]['lottery_region'] = $res->lottery_region;
                    $new[$k][$t]['lottery_company'] = $res->lottery_company;
                    $new[$k][$t]['result_day_time'] = $res->result_day_time->toDateTime()->format('d/m/Y');
                    $new[$k][$t]['prize_1'] = $res->prize_1;
                    $new[$k][$t]['prize_2'] = $res->prize_2;
                    $new[$k][$t]['prize_3'] = $res->prize_3;
                    $new[$k][$t]['prize_4'] = $res->prize_4;
                    $new[$k][$t]['prize_5'] = $res->prize_5;
                    $new[$k][$t]['prize_6'] = $res->prize_6;
                    $new[$k][$t]['prize_7'] = $res->prize_7;
                    $new[$k][$t]['prize_8'] = $res->prize_8;
                    $new[$k][$t]['prize_9'] = $res->prize_9;
                    $new[$k][$t]['board'] = $res->board;
                    $new[$k][$t]['day'] = $res->result_day_time->toDateTime()->format('l');
                    $t++;
                }


            }
            $data['content'] = $new;
            $data['region'] = $region;
            return view('admin/cron/create')->with($data);
        }elseif($region == 'XSMN'){
            $data['companies'] = getTodayResultCompanyRegion($region);
            $t = 0;
            foreach ($result as $res){
                if($res->prize_1){
                    $k = $res->result_day_time->toDateTime()->format('d/m/y');
                    $new[$k][$t]['lottery_region'] = $res->lottery_region;
                    $new[$k][$t]['lottery_company'] = $res->lottery_company;
                    $new[$k][$t]['result_day_time'] = $res->result_day_time->toDateTime()->format('d/m/Y');
                    $new[$k][$t]['prize_1'] = $res->prize_1;
                    $new[$k][$t]['prize_2'] = $res->prize_2;
                    $new[$k][$t]['prize_3'] = $res->prize_3;
                    $new[$k][$t]['prize_4'] = $res->prize_4;
                    $new[$k][$t]['prize_5'] = $res->prize_5;
                    $new[$k][$t]['prize_6'] = $res->prize_6;
                    $new[$k][$t]['prize_7'] = $res->prize_7;
                    $new[$k][$t]['prize_8'] = $res->prize_8;
                    $new[$k][$t]['prize_9'] = $res->prize_9;
                    $new[$k][$t]['board'] = $res->board;
                    $new[$k][$t]['day'] = $res->result_day_time->toDateTime()->format('l');
                    $t++;
                }


            }
            $data['content'] = $new;
            $data['region'] = $region;
            return view('admin/cron/create')->with($data);
        }

    }

    public function cronButtonStart(Request $request)
    {
        $url = '';
        $autoSave = $request->input('autosave');
        $region = $request->input('region');
        $all = getTodayResultCompany();
        $new = array();
        $t = 0;
        foreach ($all as $c) {
            if ($c->lottery_region == $region) {
                 $url = "https://xosodaiphat.com" . $c->lottery_company_url;
                $data = crawlUrlModified($url);
                if($autoSave == 1){
                    Crawler::xsmtCurrentResult($request,$url);
                }
                $mytime = Carbon::now();

                foreach ($data as $key => $res) {
                    if ($res['result_day_time'] == $mytime->toDateTime()->format('d/m/Y')) {
                        $da = explode('/', $res['result_day_time']);
                        $date = Carbon::createFromFormat("!Y-m-d", $da[2] . '-' . $da[1] . '-' . $da[0]);
                        $k = $date->toDateTime()->format('d/m/y');
                        $new[$k][$t]['lottery_region'] = $res['lottery_region'];
                        $new[$k][$t]['lottery_company'] = $res['lottery_company'];
                        $new[$k][$t]['result_day_time'] = $date->toDateTime()->format('d/m/Y');
                        $new[$k][$t]['prize_1']['G.8'] = json_encode($res['data']['G.8']);
                        $new[$k][$t]['prize_2']['G.7'] = json_encode($res['data']['G.7']);
                        $new[$k][$t]['prize_3']['G.6'] = json_encode($res['data']['G.6']);
                        $new[$k][$t]['prize_4']['G.5'] = json_encode($res['data']['G.5']);
                        $new[$k][$t]['prize_5']['G.4'] = json_encode($res['data']['G.4']);
                        $new[$k][$t]['prize_6']['G.3'] = json_encode($res['data']['G.3']);
                        $new[$k][$t]['prize_7']['G.2'] = json_encode($res['data']['G.2']);
                        $new[$k][$t]['prize_8']['G.1'] = json_encode($res['data']['G.1']);
                        $new[$k][$t]['prize_9']['ĐB'] = json_encode($res['data']['ĐB']);
                        $new[$k][$t]['board'] = json_encode($res['data']['board']);
                        $new[$k][$t]['day'] = $date->toDateTime()->format('l');

                    }
                }
                $t++;
            }
        }

            $data['content'] = $new;
            $data['region'] = $region;
            $data['companies'] = getTodayResultCompanyRegion($region);

            return view('admin/cron/create')->with($data);



    }
}
