<?php

namespace App\Http\Controllers;
use App\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use App\RegionCompany;

class Results extends Controller
{
    public function index(Request $request){


        $date = Carbon::now()->format('Y-m-d');
         $orig_date = Carbon::createFromFormat("!Y-m-d",$date);
        $orig_date1 = Carbon::createFromFormat("!Y-m-d",$date);
        $orig_date1 = Carbon::createFromFormat("!Y-m-d",$orig_date1->subDay(1)->format("Y-m-d"));
        $count = Result::where('result_day_time' ,'>=', $orig_date)->count();
            if($count > 0){
                $result = Result::where('result_day_time' ,'>=', $orig_date1)->orderBy('result_day_time', 'desc')->orderBy('lottery_region', 'asc')->get();
            }else{
                $result = Result::where('result_day_time' ,'>=', $orig_date1)->orderBy('result_day_time', 'desc')->orderBy('lottery_region', 'asc')->get();

            }
        $new = array();
        $t = 0;
        foreach ($result as $res){
            if($res->prize_1){
                $k = $res->lottery_region.'_'.$res->result_day_time->toDateTime()->format('d/m/Y');
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
        $data['region'] = "xsmt";
        $data['companyName'] = strtoupper("xsmt");
        $data['content'] = $new;
        $data['enableTab'] = true;

        return view('home')->with($data);
    }

    public function xsmb(Request $request,$company='XSMB'){

        $result = Result::where('lottery_region','XSMB')->where('lottery_company', strtoupper($company))->orderBy('result_day_time', 'desc')->paginate(3);
        $data['content'] = $result;
        //$comp = Result::where('lottery_region', 'XSMB')->distinct('lottery_company')->orderBy('created_at', 'desc')->get();
        $data['comp'] = ["XSMB"];
        $data['region'] = "xsmb";
        $data['companyName'] = strtoupper($company);
        if ($request->ajax()) {
            $view = view('xsmbPaginate',$data)->render();
            return response()->json(['html'=>$view]);
        }
        return view('currentResult')->with($data);
    }

    public function regionLoto(Request $request,$company='XSMB'){

        $checkUrl= explode('/',$request->url());
        $reg = array('XSMN'=>'ket-qua-xsmn','XSMT'=>'ket-qua-xsmt','XSMB'=>'ket-qua-xsmb');
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
        if(strpos($company,'qxs-') > 0){
            $final = str_replace('kqxs-','',str_replace('-ngay-','/',$company));
            $data = explode('/',$final);
            return $this->singleDateResult($data);

        }elseif(strpos($company,'ngay') > 0){
            return $this->allRegionDate($request,$company,$region='XSMN');
        }elseif(strpos($company,'qxsmn-') > 0){
            $final = str_replace('kqxsmn-','',$company);
            if(isset($bindArrayDay[$final])){
                return $this->xsmnDay($request,$final);
            }else{


                $company = str_replace('kqxsmn-','',$company);
                $code = getCompanyCode($company);
                $result = Result::where('lottery_region', 'XSMN')->where('lottery_company', $code)->orderBy('result_day_time', 'desc')->paginate(3);
                $data['region'] = "xsmn";
                $data['companyName'] = strtoupper($company);
                $data['content'] = $result;
                $data['enableTab'] = false;
                if ($request->ajax()) {
                    $view = view('xsmnSinglePaginate',$data)->render();
                    return response()->json(['html'=>$view]);
                }
                return view('xsmnResult')->with($data);
            }

        }

        $code = getCompanyCode($company);
        $result = Result::where('lottery_region', 'XSMN')->where('lottery_company', $code)->orderBy('result_day_time', 'desc')->get();
        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper($company);
        $data['content'] = $result;
        $data['enableTab'] = false;
        if ($request->ajax()) {
            $view = view('xsmtPaginate',$data)->render();
            return response()->json(['html'=>$view]);
        }
        return view('xsmnResult')->with($data);
    }

    public function singleDateResult($slug=null){

        $code = getCompanyCode(current($slug));
        $date = end($slug);
        $da = explode('-', $date);
        $orig_date = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
        $orig_dateNew = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
        $orig_dateNew = $orig_dateNew->addDay(1);
        $result = Result::where('lottery_company', $code)->where('result_day_time','>=',$orig_date)->where('result_day_time','<',$orig_dateNew)->orderBy('result_day_time', 'desc')->get();
        $data['region'] = "xsmn";
        $data['companyName'] = $code;
        $data['content'] = $result;
        $data['enableTab'] = false;

        return view('xsmnResult')->with($data);
    }

    public function xsmnIndex(Request $request,$company='XSTG'){



        if($request->input('page')){
            $dates = $request->input('page');
            $dates1 = Carbon::createFromFormat('!Y-m-d',$dates);
            $dates2 = Carbon::createFromFormat('!Y-m-d',$dates);
            $dates2 = $dates2->subDay(4);
            $result = Result::where('lottery_region', 'XSMN')->where('result_day_time','>=',$dates2)->where('result_day_time','<',$dates1)->orderBy('result_day_time', 'desc')->get();
        }else{
            $date = Carbon::today()->format('Y-m-d');
            $dates2 = Carbon::createFromFormat("!Y-m-d",$date);
            $dates2 = $dates2->subDay(4);
            $result = Result::where('lottery_region', 'XSMN')->where('result_day_time','>=',$dates2)->orderBy('result_day_time', 'desc')->get();
        }



       // $result = Result::where('lottery_region', 'XSMN')->where('result_day_time','>=',$dates1)->where('result_day_time','<',$dates2)->orderBy('result_day_time', 'desc')->get();

        $t = 0;
        $new = array();
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

        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper("xsmn");
        $data['content'] = $new;
        $data['enableTab'] = false;
        if ($request->ajax()) {
            $view = view('xsmtPaginate',$data)->render();
            return response()->json(['html'=>$view]);
        }
        return view('xsmn')->with($data);
    }

    public function xsmtIndex(Request $request){


        if($request->input('page')){
            $dates = $request->input('page');
            $dates1 = Carbon::createFromFormat('!Y-m-d',$dates);
            $dates2 = Carbon::createFromFormat('!Y-m-d',$dates);
            $dates2 = $dates2->subDay(4);
            $result = Result::where('lottery_region', 'XSMT')->where('result_day_time','>=',$dates2)->where('result_day_time','<',$dates1)->orderBy('result_day_time', 'desc')->get();
        }else{
            $date = Carbon::today()->format('Y-m-d');
            $dates2 = Carbon::createFromFormat("!Y-m-d",$date);
            $dates2 = $dates2->subDay(4);
            $result = Result::where('lottery_region', 'XSMT')->where('result_day_time','>=',$dates2)->orderBy('result_day_time', 'desc')->get();
        }

        $t = 0;
        $new = array();
        foreach ($result as $res){

            if($res->prize_1){
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


        }

        $data['region'] = "xsmt";
        $data['companyName'] = strtoupper("xsmt");
        $data['content'] = $new;
        $data['enableTab'] = false;
        if ($request->ajax()) {
            $view = view('xsmtPaginate',$data)->render();
            return response()->json(['html'=>$view]);
        }
        return view('xsmn')->with($data);
    }

    public function xsmnShow(Request $request,$region){
        $result = Result::where('lottery_region',$region)->get();
        return $result;
    }

    public function xsmt(Request $request,$company='XSQNA')
    {
        if(strpos($company,'qxs-') > 0){
            $final = str_replace('kqxs-','',str_replace('-ngay-','/',$company));
            $data = explode('/',$final);
            return $this->singleDateResult($data);

        }elseif(strpos($company,'ngay') > 0) {
            return $this->allRegionDate($request, $company, $region = 'XSMT');
        }elseif(strpos($company,'qxsmt-') > 0){
            $bindArrayDay = array('thu-hai' => 'Monday', 'thu-ba' => 'Tuesday', 'thu-tu' => 'Wednesday', 'thu-nam' => 'Thursday', 'thu-sau' => 'Friday', 'thu-bay' => 'Saturday', 'chu-nhat' => 'Sunday');
            $final = str_replace('kqxsmt-', '', $company);
            if (isset($bindArrayDay[$final])) {
                return $this->xsmtDay($request, $final);
            }else{
                $company = str_replace('kqxsmt-', '', $company);
                $code = getCompanyCode($company);
                $resultXsmt = Result::where('lottery_region', 'XSMT')->where('lottery_company', $code)->orderBy('result_day_time', 'desc')->paginate(3);

                $data['content'] = $resultXsmt;
                $data['companyName'] = strtoupper($company);
                $data['region'] = "xsmt";
                $data['enableTab'] = false;
                if ($request->ajax()) {
                    $view = view('xsmnSinglePaginate',$data)->render();
                    return response()->json(['html'=>$view]);
                }
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
        $result = Result::where('lottery_region','XSMB')->orderBy('result_day_time', 'desc')->paginate(21);
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
        if ($request->ajax()) {
            $view = view('xsmbDyaPaginate',$data)->render();
            return response()->json(['html'=>$view]);
        }
        return view('xsmbDay')->with($data);
    }
    public function xsmnDay(Request $request,$day){
        $list = dayWiseArray($day);

        if($request->input('page')){
            $dates = $request->input('page');
            $dates1 = Carbon::createFromFormat('!Y-m-d',$dates);
            $dates2 = Carbon::createFromFormat('!Y-m-d',$dates);
            $dates2 = $dates2->subDay(4);
            $result = Result::where('lottery_region', 'XSMN')->whereIn('lottery_company',$list)->where('result_day_time','>=',$dates2)->where('result_day_time','<',$dates1)->orderBy('result_day_time', 'desc')->get();
        }else{
            $date = Carbon::today()->format('Y-m-d');
            $dates2 = Carbon::createFromFormat("!Y-m-d",$date);
            $dates2 = $dates2->subDay(4);
            $result = Result::where('lottery_region', 'XSMN')->whereIn('lottery_company',$list)->where('result_day_time','>=',$dates2)->orderBy('result_day_time', 'desc')->get();
        }

        //$result = Result::where('lottery_region','XSMN')->whereIn('lottery_company',$list)->orderBy('result_day_time', 'desc')->paginate(6);
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


        $data['region'] = "xsmn";
        $data['companyName'] = strtoupper("xsmn");
        $data['content'] = $new;
        $data['enableTab'] = true;
        if ($request->ajax()) {
            $view = view('xsmtPaginate',$data)->render();
            return response()->json(['html'=>$view]);
        }
        return view('xsmn')->with($data);
    }
    public function xsmtDay(Request $request,$day){
        $list = dayWiseArray($day);

        if($request->input('page')){
            $dates = $request->input('page');
            $dates1 = Carbon::createFromFormat('!Y-m-d',$dates);
            $dates2 = Carbon::createFromFormat('!Y-m-d',$dates);
            $dates2 = $dates2->subDay(4);
            $result = Result::where('lottery_region', 'XSMT')->whereIn('lottery_company',$list)->where('result_day_time','>=',$dates2)->where('result_day_time','<',$dates1)->orderBy('result_day_time', 'desc')->get();
        }else{
            $date = Carbon::today()->format('Y-m-d');
            $dates2 = Carbon::createFromFormat("!Y-m-d",$date);
            $dates2 = $dates2->subDay(4);
            $result = Result::where('lottery_region', 'XSMT')->whereIn('lottery_company',$list)->where('result_day_time','>=',$dates2)->orderBy('result_day_time', 'desc')->get();
        }
        //$result = Result::where('lottery_region','XSMT')->whereIn('lottery_company',$list)->orderBy('result_day_time', 'desc')->paginate(6);
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

        $data['region'] = "xsmt";
        $data['companyName'] = strtoupper("xsmt");
        $data['content'] = $new;
        $data['enableTab'] = true;
        if ($request->ajax()) {
            $view = view('xsmtPaginate',$data)->render();
            return response()->json(['html'=>$view]);
        }
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
        $result = Result::where('result_day_time' ,'>=', $orig_date)->where('result_day_time' ,'<', $orig_date1)->orderBy('lottery_region','asc')->orderBy('result_day_time', 'desc')->limit(10)->get();
        $new = array();
        $t = 0;
        foreach ($result as $res){
            if($res->prize_1){
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
        $new = array();
        foreach ($result as $res){
            $k = $res->result_day_time->toDateTime()->format('d/m/y');
            if($res->prize_1){
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
            return view('resultCountDownXsmb')->with($data);
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
            return view('resultCountDownXsmt')->with($data);
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
            return view('resultCountDownXsmn')->with($data);
        }

    }

    public function thungDay(Request $request){
        $data['region'] = "thong";
        $data['enableTab'] = true;
        return view('thong')->with($data);
    }

    public function getThungDayWeek(Request $request) {
        $day = $request->input('strDayOfWeek');
        $list = dayWiseArray($day);
        $reg = RegionCompany::whereIn('lottery_company',$list)->get();
        return $reg;
    }

    public function getThungKeysAjax(Request $request) {
        $lotteryId = $request->input('lotteryId');
        $rollingNumbers = $request->input('rollingNumbers');
        $ddlDayOfWeeks = $request->input('ddlDayOfWeeks');
        $optionText = $request->input('optionText');
        //$result = Result::where('prize_2', 'like', $lotteryId)->orderBy('result_day_time', 'desc')->limit(4)->get();
        //$result = Result::orderBy('result_day_time', 'desc')->limit(4)->get();
        $date = Carbon::now()->subDays($rollingNumbers)->format('Y-m-d');
        $orig_date = Carbon::createFromFormat("!Y-m-d",$date);
        $result = Result::where('result_day_time' ,'>', $orig_date)
            ->where('lottery_company' , $lotteryId)
            ->orWhere('prize_2', 'like', "%{$rollingNumbers}%")
            ->orWhere('prize_3', 'like', "%{$rollingNumbers}%")
            ->orWhere('prize_4', 'like', "%{$rollingNumbers}%")
            ->orWhere('prize_5', 'like', "%{$rollingNumbers}%")
            ->orWhere('prize_6', 'like', "%{$rollingNumbers}%")
            ->orWhere('prize_7', 'like', "%{$rollingNumbers}%")
            ->orWhere('prize_8', 'like', "%{$rollingNumbers}%")
            ->orWhere('prize_9', 'like', "%{$rollingNumbers}%")
            ->orderBy('result_day_time', 'asc')->get();
       
        $new = array();
        $t = 0;
        $p = 1;
        $newFullValues = array();
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
            $i = 1;
            for ($r=1; $r < 9; $r++) {
                $variable = json_decode($res['prize_'.$r]);
                foreach ($variable as $key => $value) {
                    foreach ($value as $kk => $val) {
                        if(array_key_exists(substr($val, -2), $newFullValues)){
                            $newFullValues[substr($val, -2)]['count'] = $newFullValues[substr($val, -2)]['count'] + 1;     
                            $newFullValues[substr($val, -2)]['last_day'] = $k;     
                        }else{
                            $newFullValues[substr($val, -2)]['count'] = 1;
                            $newFullValues[substr($val, -2)]['last_day'] = $k;
                        } 
                    }
                    $i++;
                }  
            }
            $t++;
        }
        //$data['content'] = $new;
        //echo "<pre>";
        //print_r($new);
        //print_r($newFullValues);
        /*die();*/
        $data['content'] = $new;
        $data['newFullValues'] = $newFullValues;
        $data['ddlDayOfWeeks'] = $ddlDayOfWeeks;
        $data['optionText'] = $optionText;
        $data['orig_date'] = $date;
        return view('thondsResult')->with($data);
    }
}
