<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Result;
use App\RegionCompany;
use MongoDB\BSON\UTCDateTime;

class ResultsController extends Controller
{
    public function index(){
        $all = Result::all();
        $data['data'] = $all;
        return view('admin/results/index')->with($data);
    }

    public function view(Request $request,$id){
        $all = Result::where('_id',$id)->first();
        $data['data'] = $all;
        $data['day'] = engToVit($all->result_day_time->toDateTime()->format('l'));
        return view('admin/results/show')->with($data);
    }

    public function delete(Request $request,$id){
        Result::where('_id',$id)->first()->delete();
        return redirect()->route('results_index');
    }

    public function create(Request $request){

        if ($request->isMethod('post')) {
            $post_data = $request->input();
            $final_array = array();
            unset($post_data['_token']);
            foreach($post_data as $fg){
                $da = explode('-', $post_data['date']);
                $orig_date = Carbon::createFromDate($da[0], $da[1], $da[2]);
                $final_array['lottery_region'] = $post_data['region'];
                $final_array['lottery_company'] = $post_data['company'];
                $final_array['result_day_time'] = new UTCDateTime($orig_date);
                if($post_data['region'] == 'XSMT' || $post_data['region'] == 'XSMN'){

                    $final_array['prize_1'] = json_encode(array("G.8" => (array_filter(explode(',',$post_data['prize-1'])))));
                    $final_array['prize_2'] = json_encode(array("G.7" => (array_filter(explode(',',$post_data['prize-2'])))));
                    $final_array['prize_3'] = json_encode(array("G.6" => (array_filter(explode(',',$post_data['prize-3'])))));
                    $final_array['prize_4'] = json_encode(array("G.5" => (array_filter(explode(',',$post_data['prize-4'])))));
                    $final_array['prize_5'] = json_encode(array("G.4" => (array_filter(explode(',',$post_data['prize-5'])))));
                    $final_array['prize_6'] = json_encode(array("G.3" => (array_filter(explode(',',$post_data['prize-6'])))));
                    $final_array['prize_7'] = json_encode(array("G.2" => (array_filter(explode(',',$post_data['prize-7'])))));
                    $final_array['prize_8'] = json_encode(array("G.1" => (array_filter(explode(',',$post_data['prize-8'])))));
                    $final_array['prize_9'] = json_encode(array("ĐB" => (array_filter(explode(',',$post_data['prize-9'])))));
                    $fullValues = [];
                    $newFullValues = [];
                    $finalValues = [];
                    for ($it=1; $it< 10 ; $it++) {
                        $t= "prize_{$it}";
                        $fNewResult = json_decode($final_array[$t]);
                        foreach ($fNewResult as $keyValues => $mainValue) {

                            if(count((array)$mainValue) == 1 && is_array($mainValue)) {
                                $fullValues[] = array_values((array) $mainValue);

                            } else if ($keyValues == 'Mã ĐB') {

                            }else if ($keyValues == 'G.DB') {
                                $fullValues[] = array_values((array) $mainValue);
                            } else {
                                $fullValues[] = array_values((array) $mainValue);
                            }
                        }
                    }

                    foreach ($fullValues as $index=>$values) {
                        foreach ($values as $in=>$val){
                            $newFullValues[]= substr($val, -2);
                        }
                    }

                    for ($i=0; $i<=9; $i++) {
                        $selectlot = array();
                        foreach($newFullValues as $in=>$val) {
                            if (substr($val,-2,1) == $i)
                                $selectlot[] = $val;
                        }
                        $finalValues[] = $selectlot;
                    }
                    // $final_array['board'] =  json_encode($finalValues[0]);
                }elseif($post_data['region'] == 'XSMB'){

                    $final_array['prize_1'] = json_encode(array("Mã ĐB" => (array_filter(explode(',',$post_data['prize-1'])))));
                    $final_array['prize_2'] = json_encode(array("G.ĐB" => (array_filter(explode(',',$post_data['prize-2'])))));
                    $final_array['prize_3'] = json_encode(array("G.1" => (array_filter(explode(',',$post_data['prize-3'])))));
                    $final_array['prize_4'] = json_encode(array("G.2" => (array_filter(explode(',',$post_data['prize-4'])))));
                    $final_array['prize_5'] = json_encode(array("G.3" => (array_filter(explode(',',$post_data['prize-5'])))));
                    $final_array['prize_6'] = json_encode(array("G.4" => (array_filter(explode(',',$post_data['prize-6'])))));
                    $final_array['prize_7'] = json_encode(array("G.5" => (array_filter(explode(',',$post_data['prize-7'])))));
                    $final_array['prize_8'] = json_encode(array("G.6" => (array_filter(explode(',',$post_data['prize-8'])))));
                    $final_array['prize_9'] = json_encode(array("G.7" => (array_filter(explode(',',$post_data['prize-9'])))));
                    $fullValues = [];
                    $newFullValues = [];
                    $finalValues = [];
                    for ($it=1; $it< 10 ; $it++) {
                        $t= "prize_{$it}";
                        $fNewResult = json_decode($final_array[$t]);
                        foreach ($fNewResult as $keyValues => $mainValue) {

                            if(count((array)$mainValue) == 1 && is_array($mainValue)) {
                                $fullValues[] = array_values((array) $mainValue);

                            } else if ($keyValues == 'Mã ĐB') {

                            }else if ($keyValues == 'G.DB') {
                                $fullValues[] = array_values((array) $mainValue);
                            } else {
                                $fullValues[] = array_values((array) $mainValue);
                            }
                        }
                    }

                    foreach ($fullValues as $index=>$values) {
                        foreach ($values as $in=>$val){
                            $newFullValues[]= substr($val, -2);
                        }
                    }

                    for ($i=0; $i<=9; $i++) {
                        $selectlot = array();
                        foreach($newFullValues as $in=>$val) {
                            if (substr($val,-2,1) == $i)
                                $selectlot[] = $val;
                        }
                        $finalValues[] = $selectlot;
                    }
                    // $final_array['board'] =  json_encode($finalValues[0]);
                }


            }

            Result::save($final_array);

        }

        $regions = RegionCompany::orderBy('lottery_region','asc')->groupBy('lottery_region')->get();
        $data['region'] = $regions;
        return view('admin/results/create')->with($data);
    }

    public function ajaxCompany($day=null,$region=null){
        $day = $_POST['day'];
        $region = $_POST['region'];
        return $res = getResultRegionByDayCompany($day,$region);
    }

    public function edit(Request $request,$id){

        if ($request->isMethod('post')) {
           $post_data = $request->input();
           $final_array = array();
           unset($post_data['_token']);
           foreach($post_data as $fg){
               $da = explode('-', $post_data['date']);
               $orig_date = Carbon::createFromDate($da[0], $da[1], $da[2]);
               $final_array['lottery_region'] = $post_data['region'];
               $final_array['lottery_company'] = $post_data['company'];
               $final_array['result_day_time'] = new UTCDateTime($orig_date);
               if($post_data['region'] == 'XSMT' || $post_data['region'] == 'XSMN'){

               $final_array['prize_1'] = json_encode(array("G.8" => (array_filter(explode(',',$post_data['prize-1'])))));
               $final_array['prize_2'] = json_encode(array("G.7" => (array_filter(explode(',',$post_data['prize-2'])))));
               $final_array['prize_3'] = json_encode(array("G.6" => (array_filter(explode(',',$post_data['prize-3'])))));
               $final_array['prize_4'] = json_encode(array("G.5" => (array_filter(explode(',',$post_data['prize-4'])))));
               $final_array['prize_5'] = json_encode(array("G.4" => (array_filter(explode(',',$post_data['prize-5'])))));
               $final_array['prize_6'] = json_encode(array("G.3" => (array_filter(explode(',',$post_data['prize-6'])))));
               $final_array['prize_7'] = json_encode(array("G.2" => (array_filter(explode(',',$post_data['prize-7'])))));
               $final_array['prize_8'] = json_encode(array("G.1" => (array_filter(explode(',',$post_data['prize-8'])))));
               $final_array['prize_9'] = json_encode(array("ĐB" => (array_filter(explode(',',$post_data['prize-9'])))));
                       $fullValues = [];
                       $newFullValues = [];
                       $finalValues = [];
                       for ($it=1; $it< 10 ; $it++) {
                           $t= "prize_{$it}";
                           $fNewResult = json_decode($final_array[$t]);
                           foreach ($fNewResult as $keyValues => $mainValue) {

                               if(count((array)$mainValue) == 1 && is_array($mainValue)) {
                                   $fullValues[] = array_values((array) $mainValue);

                               } else if ($keyValues == 'Mã ĐB') {

                               }else if ($keyValues == 'G.DB') {
                                   $fullValues[] = array_values((array) $mainValue);
                               } else {
                                   $fullValues[] = array_values((array) $mainValue);
                               }
                           }
                       }

                       foreach ($fullValues as $index=>$values) {
                           foreach ($values as $in=>$val){
                               $newFullValues[]= substr($val, -2);
                           }
                       }

                       for ($i=0; $i<=9; $i++) {
                           $selectlot = array();
                           foreach($newFullValues as $in=>$val) {
                               if (substr($val,-2,1) == $i)
                                   $selectlot[] = $val;
                           }
                           $finalValues[] = $selectlot;
                       }
                  // $final_array['board'] =  json_encode($finalValues[0]);
               }elseif($post_data['region'] == 'XSMB'){

                   $final_array['prize_1'] = json_encode(array("Mã ĐB" => (array_filter(explode(',',$post_data['prize-1'])))));
                   $final_array['prize_2'] = json_encode(array("G.ĐB" => (array_filter(explode(',',$post_data['prize-2'])))));
                   $final_array['prize_3'] = json_encode(array("G.1" => (array_filter(explode(',',$post_data['prize-3'])))));
                   $final_array['prize_4'] = json_encode(array("G.2" => (array_filter(explode(',',$post_data['prize-4'])))));
                   $final_array['prize_5'] = json_encode(array("G.3" => (array_filter(explode(',',$post_data['prize-5'])))));
                   $final_array['prize_6'] = json_encode(array("G.4" => (array_filter(explode(',',$post_data['prize-6'])))));
                   $final_array['prize_7'] = json_encode(array("G.5" => (array_filter(explode(',',$post_data['prize-7'])))));
                   $final_array['prize_8'] = json_encode(array("G.6" => (array_filter(explode(',',$post_data['prize-8'])))));
                   $final_array['prize_9'] = json_encode(array("G.7" => (array_filter(explode(',',$post_data['prize-9'])))));
                   $fullValues = [];
                   $newFullValues = [];
                   $finalValues = [];
                   for ($it=1; $it< 10 ; $it++) {
                       $t= "prize_{$it}";
                       $fNewResult = json_decode($final_array[$t]);
                       foreach ($fNewResult as $keyValues => $mainValue) {

                           if(count((array)$mainValue) == 1 && is_array($mainValue)) {
                               $fullValues[] = array_values((array) $mainValue);

                           } else if ($keyValues == 'Mã ĐB') {

                           }else if ($keyValues == 'G.DB') {
                               $fullValues[] = array_values((array) $mainValue);
                           } else {
                               $fullValues[] = array_values((array) $mainValue);
                           }
                       }
                   }

                   foreach ($fullValues as $index=>$values) {
                       foreach ($values as $in=>$val){
                           $newFullValues[]= substr($val, -2);
                       }
                   }

                   for ($i=0; $i<=9; $i++) {
                       $selectlot = array();
                       foreach($newFullValues as $in=>$val) {
                           if (substr($val,-2,1) == $i)
                               $selectlot[] = $val;
                       }
                       $finalValues[] = $selectlot;
                   }
                  // $final_array['board'] =  json_encode($finalValues[0]);
               }


           }

            Result::where('_id',$id)->first()->update($final_array);

        }

        $all = Result::where('_id',$id)->first();
        $data['data'] = $all;
        $regions = RegionCompany::orderBy('lottery_region','asc')->groupBy('lottery_region')->get();
        $data['region'] = $regions;
        return view('admin/results/edit')->with($data);
    }


}
