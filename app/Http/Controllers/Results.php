<?php

namespace App\Http\Controllers;
use App\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;

class Results extends Controller
{
    public function index(Request $request,$company='XSMB'){

        $result = Result::where('lottery_region','XSMB')->where('lottery_company', strtoupper($company))->orderBy('created_at', 'desc')->get();
        $data['content'] = $result;
        //$comp = Result::where('lottery_region', 'XSMB')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = ["XSMB"];
        $data['region'] = "xsmb";
        $data['companyName'] = strtoupper($company);
        //return view('currentResult',$data)->render();
        return view('currentResult')->with($data);
    }

    public function show(Request $request,$region){
        if(strpos($region,'qxsmb-') > 0) {
            $bindArrayDay = array('thu-hai' => 'Monday', 'thu-ba' => 'Tuesday', 'thu-tu' => 'Wednesday', 'thu-nam' => 'Thursday', 'thu-sau' => 'Friday', 'thu-bay' => 'Saturday', 'chu-nhat' => 'Sunday');
            $final = str_replace('kqxsmb-', '', $region);
            if ($bindArrayDay[$final]) {
                return $this->xsmbDay($request, $final);
            }
        }
        $result = Result::where('lottery_region',$region)->get();

        return $result;
    }


    public function xsmn(Request $request,$company='XSTG'){

        $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
        if(strpos($company,'qxsmn-') > 0){
            $final = str_replace('kqxsmn-','',$company);
            if($bindArrayDay[$final]){
                return $this->xsmnDay($request,$final);
            }
        }


        $result = Result::where('lottery_region', 'XSMN')->where('lottery_company', strtoupper($company))->orderBy('created_at', 'desc')->get();
        $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper($company);
        $data['content'] = $result;

        return view('xsmnResult')->with($data);
    }


    public function xsmnIndex(){
        $result = Result::where('lottery_region', 'XSMN')->orderBy('result_day_time', 'asc')->get();

        $t = 0;
        foreach ($result as $res){
            $k = $res->result_day_time->toDateTime()->getTimestamp();
            $new[$k][$t]['lottery_region'] = $res->lottery_region;
            $new[$k][$t]['lottery_company'] = $res->lottery_company;
            $new[$k][$t]['result_day_time'] = $res->result_day_time->toDateTime()->format('d/m/y');
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
            $t++;

        }

        $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper("xsmn");
        $data['content'] = $new;

        return view('xsmn')->with($data);
    }

    public function xsmtIndex(){
        $result = Result::where('lottery_region', 'XSMT')->orderBy('result_day_time', 'asc')->get();

        $t = 0;
        foreach ($result as $res){
            $k = $res->result_day_time->toDateTime()->getTimestamp();
            $new[$k][$t]['lottery_region'] = $res->lottery_region;
            $new[$k][$t]['lottery_company'] = $res->lottery_company;
            $new[$k][$t]['result_day_time'] = $res->result_day_time->toDateTime()->format('d/m/y');
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
            $t++;

        }

        $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper("xsmn");
        $data['content'] = $new;

        return view('xsmn')->with($data);
    }

    public function xsmnShow(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();
        return $result;
    }

    public function xsmt(Request $request,$company='XSQNA')
    {
        if(strpos($company,'qxsmt-') > 0){
            $bindArrayDay = array('thu-hai' => 'Monday', 'thu-ba' => 'Tuesday', 'thu-tu' => 'Wednesday', 'thu-nam' => 'Thursday', 'thu-sau' => 'Friday', 'thu-bay' => 'Saturday', 'chu-nhat' => 'Sunday');
            $final = str_replace('kqxsmt-', '', $company);
            if ($bindArrayDay[$final]) {
                return $this->xsmtDay($request, $final);
            }
        }
        $resultXsmt = Result::where('lottery_region', 'XSMT')->where('lottery_company', strtoupper($company))->orderBy('created_at', 'desc')->get();

        $data['content'] = $resultXsmt;
        $comp = Result::where('lottery_region', 'XSMT')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = $comp;
        $data['companyName'] = strtoupper($company);
        $data['region'] = "xsmt";
        //return view('currentResult',$data)->render();
        return view('xsmtResult')->with($data);
    }

    public function xsmtShow(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();
        return $result;
    }

    public function xsmbDay(Request $request,$day){

        $list = dayWiseArray($day);
        $result = Result::where('lottery_region','XSMB')->get();
        $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');

        $t = 0;
        foreach ($result as $res){
            $daySelected = $res->result_day_time->toDateTime()->format('l');
            if($bindArrayDay[$day] == $daySelected){
                $k = $res->result_day_time->toDateTime()->getTimestamp();
                $new[$t]['lottery_region'] = $res->lottery_region;
                $new[$t]['lottery_company'] = $res->lottery_company;
                $new[$t]['result_day_time'] = $res->result_day_time->toDateTime()->format('d/m/y');
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

        $comp = Result::where('lottery_region', 'XSMB')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper("xsmb");
        $data['content'] = $new;

        return view('xsmbDay')->with($data);
    }
    public function xsmnDay(Request $request,$day){
        $list = dayWiseArray($day);
        $result = Result::where('lottery_region','XSMN')->whereIn('lottery_company',$list)->get();
        $t = 0;
        foreach ($result as $res){
            $k = $res->result_day_time->toDateTime()->getTimestamp();
            $new[$k][$t]['lottery_region'] = $res->lottery_region;
            $new[$k][$t]['lottery_company'] = $res->lottery_company;
            $new[$k][$t]['result_day_time'] = $res->result_day_time->toDateTime()->format('d/m/y');
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
            $t++;

        }

        $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper("xsmn");
        $data['content'] = $new;

        return view('xsmn')->with($data);
    }
    public function xsmtDay(Request $request,$day){
        $list = dayWiseArray($day);
        $result = Result::where('lottery_region','XSMT')->whereIn('lottery_company',$list)->get();
        $t = 0;
        foreach ($result as $res){
            $k = $res->result_day_time->toDateTime()->getTimestamp();
            $new[$k][$t]['lottery_region'] = $res->lottery_region;
            $new[$k][$t]['lottery_company'] = $res->lottery_company;
            $new[$k][$t]['result_day_time'] = $res->result_day_time->toDateTime()->format('d/m/y');
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
            $t++;

        }

        $comp = Result::where('lottery_region', 'XSMN')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper("xsmn");
        $data['content'] = $new;

        return view('xsmn')->with($data);
        //return view('xsmtResult')->with($result);

    }
}
