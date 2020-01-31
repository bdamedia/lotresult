<?php
namespace App\Http\Controllers;
use App\Result;
use App\RegionCompany;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DateTime;

class Results extends Controller
{
    public function lot3StatisticsView(){

        //Fetch company name and code
        $resultsForCompany= RegionCompany::all();
        $companyName = [];
        $companyRegion = [];
        foreach ($resultsForCompany as $name) {
            array_push($companyRegion,$name->lottery_company);
            array_push($companyName,$name->lottery_company_names);
        }
        $companyDetail = [];
        $companyDetail=array_combine($companyName,$companyRegion);

        return view('lot3Statistics',['companyName' => $companyDetail]);

    }
    public function lot3Statistics (Request $request){
        //Time duration for lot3 statistic
        $duration = $request->duration;
        $company = $request->companyName;
        $limit = $request->limit;
        $limits = 5*$limit;
        // dd($request);
        //Current time and date in UNIX standard
        $date = Carbon::now()->format('Y-m-d');
        //conver UNIX standard date time in to standard date
        $currentDate = Carbon::createFromFormat("!Y-m-d",$date);
        //Prepare date on the basis of time duration
        $exactDate = Carbon::createFromFormat("!Y-m-d",$currentDate->subDay($duration)->format("Y-m-d"));
        //Check company name is not null
        if($company){
            $results= Result::where('result_day_time' ,'>=', $exactDate )->where('lottery_company', '=', $company)->orderBy('result_day_time', 'desc')->get();
        }else{
            $results= Result::where('result_day_time' ,'>=', $exactDate)->orderBy('result_day_time', 'desc')->simplePaginate($limits);
        }
        $lot3Val = [];
        $finalLot3Val = [];
        $specialLot3Val = [];
        $finaSpeciallLot3Val = [];
        $digitNotApearInLot3 = [];
        $digitNotApearInSpecialLot3 = [];
        //Prepare lot3 result and special_lot3 result array
        foreach ($results as $printresult) {

            $finalValues = [];
            //get value of each prize and save in lot3 and special_lot3 array
            for ($it=1; $it< 10 ; $it++) {
                $t= "prize_{$it}";
                //Decode json into array of each prize
                $fNewResult = json_decode($printresult->{$t});
                foreach ($fNewResult as $keyValues => $mainValue) {

                    if(is_array($mainValue)) {
                        $lot3Val[] = array_values((array) $mainValue);

                    } else if ($keyValues == 'Mã ĐB') {
                        $specialLot3Val[] = array_values((array) $mainValue);
                    }else if ($keyValues == 'G.DB') {
                        $specialLot3Val[] = array_values((array) $mainValue);
                    } else {
                        $lot3Val[] = array_values((array) $mainValue);
                    }
                }
            }
        }

        //Prepare 3 digit final_lot3_val array
        foreach ($lot3Val as $fullValue) {
            foreach ($fullValue as $mergeValue) {
                //Check if string length is greater than 2
                if(strlen($mergeValue)>2)
                {
                    array_push($finalLot3Val, substr($mergeValue, -3));
                }
            }
        }
        //Prepare 3 digit final_special_lot3_val array
        foreach ($specialLot3Val as $newSpecialFullValue) {
            foreach ($newSpecialFullValue as $mergeSpecialFullValue) {
                //Check if string length is greater than 2
                if(strlen($mergeSpecialFullValue)>2)
                {
                    array_push($finaSpeciallLot3Val, substr($mergeSpecialFullValue, -3));
                }
            }
        }
        //Find all 3 digit value that is not in final_lot3_val
        for($i=0; $i<($limit*100); $i++){
            $i = (string)$i;
            if(in_array($i,$finalLot3Val)) {
            }else{
                if(strlen($i)<2){
                    $i = '00'.$i;
                    array_push($digitNotApearInLot3,$i);
                }elseif (strlen($i)<3) {
                    $i = '0'.$i;
                    array_push($digitNotApearInLot3,$i);
                }else{
                    array_push($digitNotApearInLot3,$i);
                }
            }

            $j=$i;
            $j = (string)$j;
            if(in_array($j,$finaSpeciallLot3Val)) {
            }else{
                if(strlen($j)<2){
                    $j = '00'.$j;
                    array_push($digitNotApearInSpecialLot3,$j);
                }elseif (strlen($j)<3) {
                    // dd(strlen($i));
                    $j = '0'.$j;
                    array_push($digitNotApearInSpecialLot3,$j);
                }else{
                    array_push($digitNotApearInSpecialLot3,$j);
                }
            }
        }
        //Find all 3 digit value that is not final_special_lot3_val
        for($i=0; $i<1000;$i++){

        }

        return Response()->json([
            'lot3'                          => array_count_values($finalLot3Val),
            'special'                       => array_count_values($finaSpeciallLot3Val),
            'digitNotApearInLot3'           => $digitNotApearInLot3,
            'digitNotApearInSpecialLot3'    => $digitNotApearInSpecialLot3
        ]);

    }

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

    public function vietlottDay(Request $request,$day='All'){
        if($day == 'All') {
            $list = dayWiseVietlottArray();
            if($request->input('page')){
                $dates = $request->input('page');
                $dates1 = Carbon::createFromFormat('!Y-m-d',$dates);
                $dates2 = Carbon::createFromFormat('!Y-m-d',$dates);
                $dates2 = $dates2->subDay(4);
                $result = Result::where('lottery_region', 'Vietlott')->whereIn('lottery_company', $list)->orderBy('result_day_time', 'desc')->get();

            }else{
                $date = Carbon::today()->format('Y-m-d');
                $dates2 = Carbon::createFromFormat("!Y-m-d",$date);
                $dates2 = $dates2->subDay(4);
                $result = Result::where('lottery_region', 'Vietlott')->whereIn('lottery_company', $list)->orderBy('result_day_time', 'desc')->limit(4)->get()->toArray();
            }

            $new = array();
            $t = 0;
            foreach ($result as $res){
                if($res['prize_1']){
                    $k = $t;
                    $new[$k][$t]['lottery_region'] = $res['lottery_region'];
                    $new[$k][$t]['lottery_company'] = $res['lottery_company'];
                    $new[$k][$t]['result_day_time'] = $res['result_day_time']->toDateTime()->format('d/m/Y');
                    $new[$k][$t]['prize_1'] = $res['prize_1'] ? $res['prize_1'] : '';
                    $new[$k][$t]['prize_2'] = $res['prize_2'] ? $res['prize_2'] : '';

                    if(isset($res['prize_3'])){
                        $new[$k][$t]['prize_3'] = $res['prize_3'] ? $res['prize_3'] : '';
                    } else {
                        $new[$k][$t]['prize_3'] = '';
                    }
                    if(isset($res['prize_4'])){
                        $new[$k][$t]['prize_4'] = $res['prize_4'] ? $res['prize_4'] : '';
                    }
                    else {
                        $new[$k][$t]['prize_4'] = '';
                    }
                    if(isset($res['prize_5'])){
                        $new[$k][$t]['prize_5'] = $res['prize_5'] ? $res['prize_5'] : '';
                    }
                    else {
                        $new[$k][$t]['prize_5'] = '';
                    }
                    if(isset($res['prize_6'])){
                        $new[$k][$t]['prize_6'] = $res['prize_6'] ? $res['prize_6'] : '';
                    }
                    else {
                         $new[$k][$t]['prize_6'] = '';
                    }
                    if(isset($res['prize_7'])){
                        $new[$k][$t]['prize_7'] = $res['prize_7'] ? $res['prize_7'] : '';
                    }
                    else {
                        $new[$k][$t]['prize_7'] = '';
                    }
                    if(isset($res['prize_8'])){
                        $new[$k][$t]['prize_8'] = $res['prize_8'] ? $res['prize_8'] : '';
                    }
                    else {
                         $new[$k][$t]['prize_8'] = '';
                    }
                    if(isset($res['prize_9'] )){
                        $new[$k][$t]['prize_9'] = $res['prize_9'] ? $res['prize_9'] : '';
                    }
                    else {
                        $new[$k][$t]['prize_9'] = '';
                    }
                    if(isset($res['board'])){
                        $new[$k][$t]['board'] = $res['board'];
                    }
                    else {
                        $new[$k][$t]['board'] = '';
                    }
                    $new[$k][$t]['day'] = $res['result_day_time']->toDateTime()->format('l');
                    $t++;
                }
            }
            $data['region'] = "Vietlott";
            $data['companyName'] = strtoupper("Vietlott");
            $data['content'] = $new;
            $data['enableTab'] = true;
            $data['char']= array('0'=>'A','1'=>'D','2'=>'B','3'=>'E','4'=>'C', '5'=>'G');
            return view('home')->with($data);
           
        } else {
            $list = dayWiseVietlottValue($day);
            /*echo "<pre>";
            print_r($list);
            $count = count($list);
            printf($count);
            die($count);*/
            if($request->input('page')){
                $dates = $request->input('page');
                $dates1 = Carbon::createFromFormat('!Y-m-d',$dates);
                $dates2 = Carbon::createFromFormat('!Y-m-d',$dates);
                $dates2 = $dates2->subDay(4);
                //$result = Result::where('lottery_region', 'Vietlott')->whereIn('lottery_company', $list)->where('result_day_time','>=',$dates2)->where('result_day_time','<',$dates1)->orderBy('result_day_time', 'desc')->get();
                $result = Result::where('lottery_region', 'Vietlott')->whereIn('lottery_company', $list)->orderBy('result_day_time', 'desc')->get();

            }else{
                $date = Carbon::today()->format('Y-m-d');
                $dates2 = Carbon::createFromFormat("!Y-m-d",$date);
                $dates2 = $dates2->subDay(4);
                //$result = Result::where('lottery_region', 'Vietlott')->whereIn('lottery_company', $list)->where('result_day_time','>=',$dates2)->orderBy('result_day_time', 'desc')->get();
                $result = Result::where('lottery_region', 'Vietlott')->whereIn('lottery_company', $list)->orderBy('result_day_time', 'desc')->get();
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
            $data['region'] = "Vietlott";
            $data['companyName'] = strtoupper("Vietlott");
            $data['content'] = $new;
            $data['enableTab'] = true;
            $data['char']= array('0'=>'A','1'=>'D','2'=>'B','3'=>'E','4'=>'C', '5'=>'G');
            return view('home')->with($data);
        }
    }

    public function vietlottDayVise(Request $request,$day='mega-645'){
        //print_r($day);
        $splittedstring= explode("-", $day);
        //$list = dayWiseVietlottArray($day);
        /*echo "<pre>";
        print_r($list);*/
        //print_r($splittedstring);
                //$day = $splittedstring[3].'-'.$splittedstring[4];
                //$dayParams = $splittedstring[0].'-'.$splittedstring[1].'-'.$splittedstring[2];
        //print_r($day);
        //print_r($dayParams);

        if(count($splittedstring)==5){
            $day = $splittedstring[3].'-'.$splittedstring[4];
            $dayParams = $splittedstring[0].'-'.$splittedstring[1].'-'.$splittedstring[2];
        }elseif(count($splittedstring)==4){
            $day = $splittedstring[2].'-'.$splittedstring[3];
            $dayParams = $splittedstring[0].'-'.$splittedstring[1];
        } else {
            $day = $splittedstring[3].'-'.$splittedstring[4];
            $dayParams = $splittedstring[0].'-'.$splittedstring[1].'-'.$splittedstring[2];
        }

        $valuesViet = getVietlottValue($dayParams);

        $list = dayWiseArray($day);
        $result = Result::where('lottery_region','Vietlott')->where('lottery_company', $valuesViet[0])->orderBy('result_day_time', 'desc')->paginate(21);
        $bindArrayDay = array('thu-hai'=>'Monday','thu-ba'=>'Tuesday','thu-tu'=>'Wednesday','thu-nam'=>'Thursday','thu-sau'=>'Friday','thu-bay'=>'Saturday','chu-nhat'=>'Sunday');
        $new = array();
        $t = 0;
        foreach ($result as $res){
            $daySelected = $res->result_day_time->toDateTime()->format('l');
            if($bindArrayDay[$day] == $daySelected){
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
                $new[$k][$t]['day'] = $daySelected;
                $t++;
            }
        }
        $comp = Result::where('lottery_region', 'Vietlott')->distinct('lottery_company')->orderBy('result_day_time', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "Vietlott";
        $data['companyName'] = strtoupper("Vietlott");
        $data['content'] = $new;
        $data['enableTab'] = true;
        $data['char']= array('0'=>'A','1'=>'D','2'=>'B','3'=>'E','4'=>'C', '5'=>'G');
        return view('home')->with($data);
    }

    public function vietlottDayViseRecord(Request $request, $day){
        if(strpos($day,'gay-') > 0){
            $final = str_replace('ngay-', '', $day);
            return $this->allRegionDate($request,$final,$region='Vietlott');
        }
        $list = dayWiseArray($day);
        $result = Result::where('lottery_region','Vietlott')->orderBy('result_day_time', 'desc')->paginate(21);
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
        $comp = Result::where('lottery_region', 'Vietlott')->distinct('lottery_company')->orderBy('result_day_time', 'desc')->get();
        $data['comp'] = $comp;
        $data['region'] = "Vietlott";
        $data['companyName'] = strtoupper("Vietlott");
        $data['content'] = $new;
        $data['enableTab'] = true;
        $data['char']= array('0'=>'A','1'=>'D','2'=>'B','3'=>'E','4'=>'C', '5'=>'G');
        if ($request->ajax()) {
            $view = view('xsmbDyaPaginate',$data)->render();
            return response()->json(['html'=>$view]);
        }
        return view('home')->with($data);
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
        echo $orig_date = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
        if($today == $orig_date){
            $orig_date = $orig_date->subDays(1);
        }
        $orig_date1 = Carbon::createFromFormat("!Y-m-d",$da[2].'-'.$da[1].'-'.$da[0]);
        echo $orig_date1 = $orig_date1->addDay(1);
        $result = Result::where('result_day_time' ,'>=', $orig_date)->where('result_day_time' ,'<', $orig_date1)->orderBy('lottery_region','asc')->limit(10)->get();
        $new = array();
        $t = 0;
        foreach ($result as $res){
            if($res->prize_1){
                $k = $res->result_day_time->toDateTime()->format('d/m/Y').'-'.$res->lottery_region;
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
        $data['char']= array('0'=>'A','1'=>'D','2'=>'B','3'=>'E','4'=>'C', '5'=>'G');
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

    public function loto2(Request $request){

    //dd($request);
        //Dynamic date selection
        $duration = 10;
        //Check get method
        if($request->method() == "POST"){
           $duration = ($request->time_duration)-1;
            $company = $request->companyName;

        }
        //Current time and date
        $date = Carbon::now()->format('Y-m-d');
        $currentDate = Carbon::createFromFormat("!Y-m-d",$date);
        $exactDate = Carbon::createFromFormat("!Y-m-d",$currentDate->subDay($duration)->format("Y-m-d"));
        if($request->method() == "POST"){
            $results= Result::where('result_day_time' ,'>=', $exactDate )->where('lottery_company', '=', $company)->orderBy('result_day_time', 'desc')->get();
        }else{
            $results= Result::where('result_day_time' ,'>=', $exactDate)->orderBy('result_day_time', 'desc')->get();
        }
        $lotto2 = [];
        $finallotto2 = [];
        $spclLott2Val = [];
        $finalSpcllott2 = [];
        $NotAppearlotto2 = [];
        $NotApearInSpclLotto2 = [];

        //Array for lotto2 special and not appearing arrays
        foreach ($results as $printresult) {

            $finalValues = [];
            //get value of each prize and save in lot3 and special_lot3 array
            for ($it=1; $it< 10 ; $it++) {
                $t= "prize_{$it}";
                //Decode json into array of each prize
                $fNewResult = json_decode($printresult->{$t});
                foreach ($fNewResult as $keyValues => $mainValue) {

                    if(is_array($mainValue)) {
                        $lotto2[] = array_values((array) $mainValue);

                    } else if ($keyValues == 'Mã ĐB') {
                        $spclLott2Val[] = array_values((array) $mainValue);
                    }else if ($keyValues == 'G.DB') {
                        $spclLott2Val[] = array_values((array) $mainValue);
                    } else {
                        $lotto2[] = array_values((array) $mainValue);
                    }
                }
            }
        }

        //Final lotto 2 array
        foreach ($lotto2 as $fullValue) {
            foreach ($fullValue as $mergeValue) {
                if(strlen($mergeValue)>1)
                {
                    array_push($finallotto2, substr($mergeValue, -2));
                }
            }
        }
        //Final special lotto 2 array
        foreach ($spclLott2Val as $newSpecialFullValue) {
            foreach ($newSpecialFullValue as $mergeSpecialFullValue) {
                if(strlen($mergeSpecialFullValue)>1)
                {
                   //Removed string in array values
                   if (is_numeric($mergeSpecialFullValue)) {   array_push($finalSpcllott2, substr($mergeSpecialFullValue, -2)); }
                }
            }
        }

        //Final special not appearing lotto 2
        for($i=0; $i<100; $i++){
            $i = (string)$i;
            if(in_array($i,$finalSpcllott2)) {
            }else{
                if(strlen($i)<2){
                    $i = '0'.$i;
                    array_push($NotApearInSpclLotto2,$i);
                }else{
                    array_push($NotApearInSpclLotto2,$i);
                }
            }
        }

        //Final array of not appearing lotto 2
        for($i=0; $i<100; $i++){
            $i = (string)$i;
            if(in_array($i,$finallotto2)) {
            }else{
                if(strlen($i)<2){
                    $i = '0'.$i;
                    array_push($NotAppearlotto2,$i);
                }else{
                    array_push($NotAppearlotto2,$i);
                }
            }
        }

        //Company result
        $resultsForCompany= RegionCompany::all();
        $companyName = [];
        $companyRegion = [];
        foreach ($resultsForCompany as $name) {
            array_push($companyRegion,$name->lottery_company);
            array_push($companyName,$name->lottery_company_names);
        }
        $companyDetail = [];
        $companyDetail=array_combine($companyName,$companyRegion);
        //Return view with data


        return view('loto2',['lotto2' => array_count_values($finallotto2), 'special' => array_count_values($finalSpcllott2), 'companyName' => $companyDetail, 'digitNotApearInLot2' => $NotAppearlotto2, 'NotappearspecialLotto2digits' => $NotApearInSpclLotto2]);
    }

    public function loto2view(Request $request){
         //Dynamic date selection
        $duration = 10;
        //Check get method
        if($request->method() == "POST"){
            $duration = ($request->time_duration)-1;
            $company = $request->companyName;
        }
        //Current time and date
        $date = Carbon::now()->format('Y-m-d');
        $currentDate = Carbon::createFromFormat("!Y-m-d",$date);
        $exactDate = Carbon::createFromFormat("!Y-m-d",$currentDate->subDay($duration)->format("Y-m-d"));
        if($request->method() == "POST"){
            $results= Result::where('result_day_time' ,'>=', $exactDate )->where('lottery_company', '=', $company)->orderBy('result_day_time', 'desc')->get();
        }else{
            $results= Result::where('result_day_time' ,'>=', $exactDate)->orderBy('result_day_time', 'desc')->get();
        }
        $lotto2 = [];
        $finallotto2 = [];
        $spclLott2Val = [];
        $finalSpcllott2 = [];
        $NotAppearlotto2 = [];
        $NotApearInSpclLotto2 = [];

        //Array for lotto2 special and not appearing arrays
        foreach ($results as $printresult) {

            $finalValues = [];
            //get value of each prize and save in lot3 and special_lot3 array
            for ($it=1; $it< 10 ; $it++) {
                $t= "prize_{$it}";
                //Decode json into array of each prize
                $fNewResult = json_decode($printresult->{$t});
                foreach ($fNewResult as $keyValues => $mainValue) {

                    if(is_array($mainValue)) {
                        $lotto2[] = array_values((array) $mainValue);

                    } else if ($keyValues == 'Mã ĐB') {
                        $spclLott2Val[] = array_values((array) $mainValue);
                    }else if ($keyValues == 'G.DB') {
                        $spclLott2Val[] = array_values((array) $mainValue);
                    } else {
                        $lotto2[] = array_values((array) $mainValue);
                    }
                }
            }
        }

        //Final lotto 2 array
        foreach ($lotto2 as $fullValue) {
            foreach ($fullValue as $mergeValue) {
                if(strlen($mergeValue)>1)
                {
                    array_push($finallotto2, substr($mergeValue, -2));
                }
            }
        }
        //Final special lotto 2 array
        foreach ($spclLott2Val as $newSpecialFullValue) {
            foreach ($newSpecialFullValue as $mergeSpecialFullValue) {
                if(strlen($mergeSpecialFullValue)>1)
                {
                   //Removed string in array values
                   if (is_numeric($mergeSpecialFullValue)) {   array_push($finalSpcllott2, substr($mergeSpecialFullValue, -2)); }
                }
            }
        }

        //Final special not appearing lotto 2
        for($i=0; $i<100; $i++){
            $i = (string)$i;
            if(in_array($i,$finalSpcllott2)) {
            }else{
                if(strlen($i)<2){
                    $i = '0'.$i;
                    array_push($NotApearInSpclLotto2,$i);
                }else{
                    array_push($NotApearInSpclLotto2,$i);
                }
            }
        }

        //Final array of not appearing lotto 2
        for($i=0; $i<100; $i++){
            $i = (string)$i;
            if(in_array($i,$finallotto2)) {
            }else{
                if(strlen($i)<2){
                    $i = '0'.$i;
                    array_push($NotAppearlotto2,$i);
                }else{
                    array_push($NotAppearlotto2,$i);
                }
            }
        }

        //Company result
        $resultsForCompany= RegionCompany::all();
        $companyName = [];
        $companyRegion = [];
        foreach ($resultsForCompany as $name) {
            array_push($companyRegion,$name->lottery_company);
            array_push($companyName,$name->lottery_company_names);
        }
        $companyDetail = [];
        $companyDetail=array_combine($companyName,$companyRegion);
        //Return view with data


        //return view('loto2',['companyName' => $companyDetail]);
        return view('loto2',['lotto2' => array_count_values($finallotto2), 'special' => array_count_values($finalSpcllott2), 'companyName' => $companyDetail, 'digitNotApearInLot2' => $NotAppearlotto2, 'NotappearspecialLotto2digits' => $NotApearInSpclLotto2]);
    }
    //Ajax result of lotto statistics
    public function loto2ajax(Request $request){
        //dd($request);

        //Dynamic date selection
        $duration = 10;
        //Check get method
        if($request->method() == "POST"){
            $duration = ($request->time_duration)-1;
            $company = $request->companyName;
            //dd($company."".$duration);
        }
        //Current time and date
        $date = Carbon::now()->format('Y-m-d');
        $currentDate = Carbon::createFromFormat("!Y-m-d",$date);
        $exactDate = Carbon::createFromFormat("!Y-m-d",$currentDate->subDay($duration)->format("Y-m-d"));
        if($request->method() == "POST"){
            $results= Result::where('result_day_time' ,'>=', $exactDate )->where('lottery_company', '=', $company)->orderBy('result_day_time', 'desc')->get();
        }else{
            $results= Result::where('result_day_time' ,'>=', $exactDate)->orderBy('result_day_time', 'desc')->get();
        }
        $lotto2 = [];
        $finallotto2 = [];
        $spclLott2Val = [];
        $finalSpcllott2 = [];
        $NotAppearlotto2 = [];
        $NotApearInSpclLotto2 = [];

        //Array for lotto2 special and not appearing arrays
        foreach ($results as $printresult) {

            $finalValues = [];
            //get value of each prize and save in lot3 and special_lot3 array
            for ($it=1; $it< 10 ; $it++) {
                $t= "prize_{$it}";
                //Decode json into array of each prize
                $fNewResult = json_decode($printresult->{$t});
                foreach ($fNewResult as $keyValues => $mainValue) {

                    if(is_array($mainValue)) {
                        $lotto2[] = array_values((array) $mainValue);

                    } else if ($keyValues == 'Mã ĐB') {
                        $spclLott2Val[] = array_values((array) $mainValue);
                    }else if ($keyValues == 'G.DB') {
                        $spclLott2Val[] = array_values((array) $mainValue);
                    } else {
                        $lotto2[] = array_values((array) $mainValue);
                    }
                }
            }
        }

        //Final lotto 2 array
        foreach ($lotto2 as $fullValue) {
            foreach ($fullValue as $mergeValue) {
                if(strlen($mergeValue)>1)
                {
                    array_push($finallotto2, substr($mergeValue, -2));
                }
            }
        }
        //Final special lotto 2 array
        foreach ($spclLott2Val as $newSpecialFullValue) {
            foreach ($newSpecialFullValue as $mergeSpecialFullValue) {
                if(strlen($mergeSpecialFullValue)>1)
                {
                   //Removed string in array values
                   if (is_numeric($mergeSpecialFullValue)) {   array_push($finalSpcllott2, substr($mergeSpecialFullValue, -2)); }
                }
            }
        }

        //Final special not appearing lotto 2
        for($i=0; $i<100; $i++){
            $i = (string)$i;
            if(in_array($i,$finalSpcllott2)) {
            }else{
                if(strlen($i)<2){
                    $i = '0'.$i;
                    array_push($NotApearInSpclLotto2,$i);
                }else{
                    array_push($NotApearInSpclLotto2,$i);
                }
            }
        }

        //Final array of not appearing lotto 2
        for($i=0; $i<100; $i++){
            $i = (string)$i;
            if(in_array($i,$finallotto2)) {
            }else{
                if(strlen($i)<2){
                    $i = '0'.$i;
                    array_push($NotAppearlotto2,$i);
                }else{
                    array_push($NotAppearlotto2,$i);
                }
            }
        }

        //Company result
        $resultsForCompany= RegionCompany::all();
        $companyName = [];
        $companyRegion = [];
        foreach ($resultsForCompany as $name) {
            array_push($companyRegion,$name->lottery_company);
            array_push($companyName,$name->lottery_company_names);
        }
        $companyDetail = [];
        $companyDetail=array_combine($companyName,$companyRegion);
        //Return view with data
        //$fullaraayresult = array('lotto2' => array_count_values($finallotto2), 'special' => array_count_values($finalSpcllott2), 'digitNotApearInLot2' => $NotAppearlotto2, 'NotappearspecialLotto2digits' => $NotApearInSpclLotto2);

        /*array_push($fullaraayresult, $finallotto2);
        array_push($fullaraayresult, array_count_values($finalSpcllott2));
        array_push($fullaraayresult, $NotAppearlotto2);
        array_push($fullaraayresult, $NotApearInSpclLotto2);*/
        $data['lotto2'] = array_count_values($finallotto2);
        $data['special'] = array_count_values($finalSpcllott2);
        $data['digitNotApearInLot2'] = $NotAppearlotto2;
        $data['NotappearspecialLotto2digits'] = $NotApearInSpclLotto2;
        //dd($data);
        return view('loto2ajax')->with($data);
        //return view('loto2',['lotto2' => array_count_values($finallotto2), 'special' => array_count_values($finalSpcllott2), 'companyName' => $companyDetail, 'digitNotApearInLot2' => $NotAppearlotto2, 'NotappearspecialLotto2digits' => $NotApearInSpclLotto2]);
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
