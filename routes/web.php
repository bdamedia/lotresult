<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! 
|
*/

Route::get("/crawler", "Crawler@index");
Route::get("/crawler/cJob", "Crawler@CroneJob");
Route::get("/crawler/cJob/all/", "Crawler@CroneJobFull");

Route::get('/','Results@index');

Route::get('/ket-qua-xsmb/kqxsmb-truc-tiep/','Results@trucTiep');
Route::get('/ket-qua-xsmt/kqxsmt-truc-tiep/','Results@trucTiep');
Route::get('/ket-qua-xsmn/kqxsmn-truc-tiep/','Results@trucTiep');


Route::get('/ket-qua-xsmb/ket-qua-lo-to-mien-bac/{date}','Results@dateLoto');
Route::get('/ket-qua-xsmt/ket-qua-lo-to-mien-trung/{date}','Results@dateLoto');
Route::get('/ket-qua-xsmn/ket-qua-lo-to-mien-nam/{date}','Results@dateLoto');

Route::get('/ket-qua-xsmn/ket-qua-lo-to-mien-nam','Results@regionLoto');
Route::get('/ket-qua-xsmt/ket-qua-lo-to-mien-trung','Results@regionLoto');
Route::get('/ket-qua-xsmb/ket-qua-lo-to-mien-bac','Results@regionLoto');

Route::get("/ket-qua-xsmt/{lottery_company_slug}", "Results@xsmt");
Route::get("/ket-qua-xsmn/{lottery_company_slug}/", "Results@xsmn");
Route::get("/ket-qua-xsmb/kqxsmb-{day}", "Results@xsmbDay");
Route::get("/ket-qua-xsmn/kqxsmn-{day}", "Results@xsmnDay");
Route::get("/ket-qua-xsmt/kqxsmt-{day}", "Results@xsmtDay");

Route::get('/kqxs-{date}','Results@allCompanyDate');
Route::get('/kqxs-da-nang-{date}','Results@allCompanyDate');

Route::get("/ket-qua-xsmb", "Results@xsmb");
Route::get("/ket-qua-xsmt", "Results@xsmtIndex");
Route::get("/ket-qua-xsmn", "Results@xsmnIndex");

Route::get("crawler/old", "Crawler@getOldResult");


Route::get("/cau-mien-bac/{kqxs_dien_toan}", "Results@kqxs");
Route::get("/thond-keys/{thond_keys}", "Results@thonds");


Route::get("/crawler/current", "Crawler@getCurrentResult");
Route::get("/crawler/xsmn/current", "Crawler@xsmnCurrentResult");


//update current records
Route::get("/updatedatabase/{link}", "Crawler@saveDatabase");
Route::get("/updatexsmt/{link}", "Crawler@xsmtCurrentResult");
Route::get("/reload/{link}", "Crawler@reloadCurrentResult");
Route::get("/getCompanyRegions", "Crawler@getCompanyRegions");


Route::get("/thung/thong-ke-{day}", "Results@thungDay");
Route::get("/thong-ke-xsdp-tinh-theo-thu", "Results@getThungDayWeek");
Route::get("/XSDPThongKeAjax/XSDPTKGanCucDai", "Results@getThungKeysAjax");



