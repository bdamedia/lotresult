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

Route::redirect('/','/xsmb');
Route::get("/xsmb", "Results@index");
Route::get("/xsmb/{region}", "Results@show");

Route::get("/xsmn", "Results@xsmnIndex");
Route::get("/xsmn/{region}", "Results@xsmn");

Route::get("/xsmt", "Results@xsmtIndex");
Route::get("/xsmt/{region}", "Results@xsmt");

Route::get("crawler/old", "Crawler@getOldResult");




Route::get("/crawler/current", "Crawler@getCurrentResult");
Route::get("/crawler/xsmn/current", "Crawler@xsmnCurrentResult");


//update current records
Route::get("/updatedatabase/{link}", "Crawler@saveDatabase");
Route::get("/updatexsmt/{link}", "Crawler@xsmtCurrentResult");
Route::get("/reload/{link}", "Crawler@reloadCurrentResult");
Route::get("/getCompanyRegions", "Crawler@getCompanyRegions");

