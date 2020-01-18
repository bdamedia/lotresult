<?php

namespace App\Http\Controllers\admin;

use App\CronManual;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function create()
    {
        return view('admin/cron/create');
    }

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
}
