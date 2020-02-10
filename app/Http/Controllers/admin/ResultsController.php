<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Result;
use App\RegionCompany;

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
        return view('admin/results/show')->with($data);
    }

    public function delete(Request $request,$id){
        Result::where('_id',$id)->first()->delete();
        return redirect()->route('results_index');
    }

    public function create(){
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
        $all = Result::where('_id',$id)->first();
        $data['data'] = $all;
        $regions = RegionCompany::orderBy('lottery_region','asc')->groupBy('lottery_region')->get();
        $data['region'] = $regions;
        return view('admin/results/edit')->with($data);
    }


}
