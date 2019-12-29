<?php

namespace App\Http\Controllers;
use App\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;

class Results extends Controller
{
    public function index(Request $request){


        $date = Carbon::now()->format('Y-m-d');
         $orig_date = Carbon::createFromFormat("!Y-m-d",$date);
        $orig_date1 = Carbon::createFromFormat("!Y-m-d",$date);
        $orig_date1 = Carbon::createFromFormat("!Y-m-d",$orig_date1->subDay(1)->format("Y-m-d"));
        $count = Result::where('result_day_time' ,'>=', $orig_date)->count();
            if($count > 0){
                $result = Result::where('result_day_time' ,'>=', $orig_date)->get();
            }else{
                $result = Result::where('result_day_time' ,'>=', $orig_date1)->orderBy('result_day_time', 'desc')->get();

            }
        $new = array();
        $t = 0;
        foreach ($result as $res){
            $k = $res->lottery_region;
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

        $data['region'] = "xsmt";
        $data['companyName'] = strtoupper("xsmt");
        $data['content'] = $new;
        $data['enableTab'] = true;

        return view('home')->with($data);
    }

    public function xsmb(Request $request,$company='XSMB'){

        $result = Result::where('lottery_region','XSMB')->where('lottery_company', strtoupper($company))->orderBy('result_day_time', 'desc')->get();
        $data['content'] = $result;
        //$comp = Result::where('lottery_region', 'XSMB')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = ["XSMB"];
        $data['region'] = "xsmb";
        $data['companyName'] = strtoupper($company);
        return view('currentResult')->with($data);
    }

    public function regionLoto(Request $request,$company='XSMB'){

        $checkUrl= explode('/',$request->url());
        $reg = array('XSMN'=>'ket-qua-xo-so-mien-nam','XSMT'=>'ket-qua-xo-so-mien-trung','XSMB'=>'ket-qua-xo-so-mien-bac');
        $codeKey = array_search($checkUrl[count($checkUrl)-2],$reg);
        if($codeKey == 'XSMB'){
            $result = Result::where('lottery_region',$codeKey)->orderBy('result_day_time', 'desc')->get();
            $data['content'] = $result;
            //$comp = Result::where('lottery_region', 'XSMB')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
            $data['comp'] = ["$codeKey"];
            $data['region'] = strtolower($codeKey);
            $data['companyName'] = $codeKey;
            return view('loto-xsmb')->with($data);
        }else{
            $result = Result::where('lottery_region',$codeKey)->orderBy('result_day_time', 'desc')->get();
            $t = 0;
            foreach ($result as $res){
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


            $data['region'] = strtolower($codeKey);
            $data['companyName'] = strtoupper($codeKey);
            $data['content'] = $new;
            $data['enableTab'] = false;
            return view('loto-mix')->with($data);

        }

    }

    public function show(Request $request,$region){

        if(strpos($region,'ngay') > 0){
            $final = str_replace('ngay-', '', $region);
            return $this->allRegionDate($request,$company,$region='XSMB');
        }elseif(strpos($region,'qxsmb-') > 0) {
            $bindArrayDay = array('thu-hai' => 'Monday', 'thu-ba' => 'Tuesday', 'thu-tu' => 'Wednesday', 'thu-nam' => 'Thursday', 'thu-sau' => 'Friday', 'thu-bay' => 'Saturday', 'chu-nhat' => 'Sunday');
            $final = str_replace('kqxsmb-', '', $region);
            if ($bindArrayDay[$final]) {
                return $this->xsmbDay($request, $final);
            }
        }
        $result = Result::where('lottery_region',$region)->orderBy('result_day_time', 'desc')->get();

        return $result;
    }


    public function xsmn(Request $request,$company='XSTG'){

        $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');

        if(strpos($company,'ngay') > 0){
            return $this->allRegionDate($request,$company,$region='XSMN');
        }elseif(strpos($company,'qxsmn-') > 0){
            $final = str_replace('kqxsmn-','',$company);
            if(isset($bindArrayDay[$final])){
                return $this->xsmnDay($request,$final);
            }else{
                $company = str_replace('kqxsmn-','',$company);
                $code = getCompanyCode($company);
                $result = Result::where('lottery_region', 'XSMN')->where('lottery_company', $code)->orderBy('result_day_time', 'desc')->get();
                $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->orderBy('result_day_time', 'desc')->get();
                $data['comp'] = $comp;
                $data['region'] = "xsmn";
                $data['companyName'] = strtoupper($company);
                $data['content'] = $result;
                $data['enableTab'] = false;
                return view('xsmnResult')->with($data);
            }

        }

        $code = getCompanyCode($company);
        $result = Result::where('lottery_region', 'XSMN')->where('lottery_company', $code)->orderBy('result_day_time', 'desc')->get();
        $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->orderBy('result_day_time', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper($company);
        $data['content'] = $result;
        $data['enableTab'] = false;
        return view('xsmnResult')->with($data);
    }


    public function xsmnIndex(Request $request,$company='XSTG'){
        $result = Result::where('lottery_region', 'XSMN')->orderBy('result_day_time', 'desc')->get();

        $t = 0;
        foreach ($result as $res){
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

        $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->orderBy('result_day_time', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper("xsmn");
        $data['content'] = $new;
        $data['enableTab'] = false;
        return view('xsmn')->with($data);
    }

    public function xsmtIndex(){
        $result = Result::where('lottery_region', 'XSMT')->orderBy('result_day_time', 'desc')->get();

        $t = 0;
        foreach ($result as $res){
            $k = $res->result_day_time->toDateTime()->format('d/m/y')   ;
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

        $comp = Result::where('lottery_region', 'XSMT')->distinct('lottery_company')->orderBy('result_day_time', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmt";
        $data['companyName'] = strtoupper("xsmt");
        $data['content'] = $new;
        $data['enableTab'] = false;
        return view('xsmn')->with($data);
    }

    public function xsmnShow(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();
        return $result;
    }

    public function xsmt(Request $request,$company='XSQNA')
    {
        if(strpos($company,'ngay') > 0) {
            return $this->allRegionDate($request, $company, $region = 'XSMT');
        }elseif(strpos($company,'qxsmt-') > 0){
            $bindArrayDay = array('thu-hai' => 'Monday', 'thu-ba' => 'Tuesday', 'thu-tu' => 'Wednesday', 'thu-nam' => 'Thursday', 'thu-sau' => 'Friday', 'thu-bay' => 'Saturday', 'chu-nhat' => 'Sunday');
            $final = str_replace('kqxsmt-', '', $company);
            if (isset($bindArrayDay[$final])) {
                return $this->xsmtDay($request, $final);
            }else{
                $company = str_replace('kqxsmt-', '', $company);
                $code = getCompanyCode($company);
                $resultXsmt = Result::where('lottery_region', 'XSMT')->where('lottery_company', $code)->orderBy('result_day_time', 'desc')->get();

                $data['content'] = $resultXsmt;
                $comp = Result::where('lottery_region', 'XSMT')->distinct('lottery_company')->orderBy('result_day_time', 'desc')->get();
                $data['comp'] = $comp;
                $data['companyName'] = strtoupper($company);
                $data['region'] = "xsmt";
                $data['enableTab'] = false;

                //return view('currentResult',$data)->render();
                return view('xsmtResult')->with($data);
            }
        }
    }

    public function xsmtShow(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();
        return $result;
    }

    public function xsmbDay(Request $request,$day){

        if(strpos($day,'gay-') > 0){
            $final = str_replace('ngay-', '', $day);
            return $this->allRegionDate($request,$final,$region='XSMB');
        }

        $list = dayWiseArray($day);
        $result = Result::where('lottery_region','XSMB')->orderBy('result_day_time', 'desc')->get();
        $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
        $new = array();
        $t = 0;
        foreach ($result as $res){
            $daySelected = $res->result_day_time->toDateTime()->format('l');
            if($bindArrayDay[$day] == $daySelected){
                $k = $res->result_day_time->toDateTime()->getTimestamp();
                $new[$t]['lottery_region'] = $res->lottery_region;
                $new[$t]['lottery_company'] = $res->lottery_company;
                $new[$t]['result_day_time'] = $res->result_day_time->toDateTime()->format('d/m/Y');
                $new[$t]['prize_1'] = $res->prize_1;
                $new[$t]['prize_2'] = $res->prize_2;
                $new[$t]['prize_3'] = $res->prize_3;
                $new[$t]['prize_4'] = $res->prize_4;
                $new[$t]['prize_5'] = $res->prize_5;
                $new[$t]['prize_6'] = $res->prize_6;
                $new[$t]['prize_7'] = $res->prize_7;
                $new[$t]['prize_8'] = $res->prize_8;
                $new[$t]['prize_9'] = $res->prize_9;
                $new[$t]['board'] = $res->board;
                $new[$t]['day'] = $daySelected;
                $t++;
            }

        }

        $comp = Result::where('lottery_region', 'XSMB')->distinct('lottery_company')->orderBy('result_day_time', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmb";
        $data['companyName'] = strtoupper("xsmb");
        $data['content'] = $new;

        return view('xsmbDay')->with($data);
    }
    public function xsmnDay(Request $request,$day){
        $list = dayWiseArray($day);
        $result = Result::where('lottery_region','XSMN')->whereIn('lottery_company',$list)->orderBy('result_day_time', 'desc')->get();
        $t = 0;
        $new = array();
        $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
        foreach ($result as $res){
            $daySelected = $res->result_day_time->toDateTime()->format('l');

            if($bindArrayDay[$day] == $daySelected) {
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
                $new[$k][$t]['day'] = $daySelected;
                $t++;
            }
        }

        $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->orderBy('result_day_time', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper("xsmn");
        $data['content'] = $new;
        $data['enableTab'] = true;

        return view('xsmn')->with($data);
    }
    public function xsmtDay(Request $request,$day){
        $list = dayWiseArray($day);
        $result = Result::where('lottery_region','XSMT')->whereIn('lottery_company',$list)->orderBy('result_day_time', 'desc')->get();
        $t = 0;
        $new = array();
        $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
        foreach ($result as $res){
            $daySelected = $res->result_day_time->toDateTime()->format('l');
            if($bindArrayDay[$day] == $daySelected) {
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
                $new[$k][$t]['day'] = $daySelected;
                $t++;
            }
        }

        $comp = Result::where('lottery_region', 'XSMT')->distinct('lottery_company')->orderBy('result_day_time', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmt";
        $data['companyName'] = strtoupper("xsmt");
        $data['content'] = $new;
        $data['enableTab'] = true;

        return view('xsmn')->with($data);

    }

    public function kqxs(Request $request)
    {
        return view('kqxsResult');
    }

    public function thonds(Request $request)
    {
        return view('thondsResult');
    }


    public function allCompanyDate(Request $request,$date){


        $date = str_replace('da-nang-','',$date);

        $da = explode('-', $date);
        $today = Carbon::today()->format('!Y-m-d');
        $orig_date = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
        if($today == $orig_date){
            $orig_date = $orig_date->subDays(1);
        }
        $orig_date1 = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
        $orig_date1 = $orig_date1->addDay(1);
        $result = Result::where('result_day_time' ,'>=', $orig_date)->where('result_day_time' ,'<', $orig_date1)->orderBy('result_day_time', 'desc')->get();
        $new = array();
        $t = 0;
        foreach ($result as $res){
            $k = $res->lottery_region;
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

        $data['region'] = "xsmt";
        $data['companyName'] = strtoupper("xsmt");
        $data['content'] = $new;
        $data['enableTab'] = true;

        return view('allCompanyDate')->with($data);

    }

    public function allRegionDate(Request $request,$date,$region){

        $date = str_replace('kqxsmn-ngay-','',$date);
        $da = explode('-', $date);
        $orig_date = Carbon::createFromFormat("!Y-m-d",$da[count($da)-1].'-'.$da[count($da)-2].'-'.$da[count($da)-3]);
        $orig_date1 = Carbon::createFromFormat("!Y-m-d",$da[count($da)-1].'-'.$da[count($da)-2].'-'.$da[count($da)-3]);
        $orig_date1 = $orig_date1->addDay(1);
        $result = Result::where('lottery_region',$region)->where('result_day_time' ,'>=', $orig_date)->where('result_day_time' ,'<', $orig_date1)->orderBy('result_day_time', 'desc')->get();
        $t = 0;
        foreach ($result as $res){
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

        $data['region'] = strtolower($region);
        $data['companyName'] = $region;
        $data['content'] = $new;
        $data['enableTab'] = true;
        return view('allCompanyDate')->with($data);

    }

    public function dateLoto(Request $request,$day){

        $ar = explode('-',$day);
        $reg = strtoupper(str_replace('kqlt','xs',current($ar)));
        $day = str_replace('kqltmb-','',$day);
        $day = str_replace('kqltmn-','',$day);
        $day = str_replace('kqltmt-','',$day);
        $list = dayWiseArray($day);
        $result = Result::where('lottery_region',$reg)->whereIn('lottery_company',$list)->orderBy('result_day_time', 'desc')->get();
        $t = 0;
        $new = array();
        $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
        foreach ($result as $res){
            $daySelected = $res->result_day_time->toDateTime()->format('l');
            if($bindArrayDay[$day] == $daySelected) {
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
                $new[$k][$t]['day'] = $daySelected;
                $t++;
            }
        }

        $data['region'] = strtolower($reg);
        $data['companyName'] = $reg;
        $data['content'] = $new;
        $data['enableTab'] = true;

        return view('dayLoto')->with($data);
    }

    public function trucTiep(Request $request,$company='XSMB'){
        $checkUrl = explode('/',$request->url());
        $url = explode('-',end($checkUrl));
        $url = current($url);
        $region  = strtoupper(str_replace('kq','',$url));
        $result = Result::where('lottery_region',$region)->orderBy('result_day_time', 'desc')->get();
        $data['content'] = $result;
        //$comp = Result::where('lottery_region', 'XSMB')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = $region;
        $data['region'] = strtolower($region);
        $data['companyName'] = strtoupper($company);
        if($region == 'XSMB'){
            return view('resultCountDownXsmb')->with($data);
        }elseif($region == 'XSMT'){

            return $this->xsmnIndex($request,$region);
        }elseif($region == 'XSMN'){
            return $this->xsmtIndex($request,$region);
        }

    }
}
