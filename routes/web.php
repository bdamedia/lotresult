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

Route::redirect('/','/ket-qua-xo-so-mien-bac');
Route::get("/ket-qua-xo-so-mien-bac", "Results@index");
Route::get("/ket-qua-xo-so-mien-bac/{lottery_company_slug}", "Results@show");
Route::get("/ket-qua-xo-so-mien-trung/{lottery_company_slug}", "Results@xsmt");
Route::get("/ket-qua-xo-so-mien-nam", "Results@xsmnIndex");
Route::get("/ket-qua-xo-so-mien-nam/{lottery_company_slug}/", "Results@xsmn");

Route::get("/ket-qua-xo-so-mien-bac/kqxsmb-{day}", "Results@xsmbDay")->name('updateAvatar');
Route::get("/ket-qua-xo-so-mien-nam/kqxsmn-{day}", "Results@xsmnDay");
Route::get("/ket-qua-xo-so-mien-trung/kqxsmt-{day}", "Results@xsmtDay");

Route::get("/ket-qua-xo-so-mien-trung", "Results@xsmtIndex");


Route::get("crawler/old", "Crawler@getOldResult");




Route::get("/crawler/current", "Crawler@getCurrentResult");
Route::get("/crawler/xsmn/current", "Crawler@xsmnCurrentResult");


//update current records
Route::get("/updatedatabase/{link}", "Crawler@saveDatabase");
Route::get("/updatexsmt/{link}", "Crawler@xsmtCurrentResult");
Route::get("/reload/{link}", "Crawler@reloadCurrentResult");
Route::get("/getCompanyRegions", "Crawler@getCompanyRegions");

