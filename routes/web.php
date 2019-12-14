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
Route::get("/", "Home@index");
Route::get("/result", "Results@index");
Route::get("/result/{region}", "Results@show");

Route::get("crawler/old", "Crawler@getOldResult");

Route::get("crawler/xsmb-xo-so-mien-bac", "Crawler@getOldResult");
Route::get("crawler/xsmb-truc-tiep", "Crawler@getOldResult");
Route::get("crawler/xsmb-thu-2", "Crawler@getOldResult");
Route::get("crawler/xsmb-thu-3", "Crawler@getOldResult");
Route::get("crawler/xsmb-thu-4", "Crawler@getOldResult");
Route::get("crawler/xsmb-thu-5", "Crawler@getOldResult");
Route::get("crawler/xsmb-thu-6", "Crawler@getOldResult");
Route::get("crawler/xsmb-thu-7", "Crawler@getOldResult");
Route::get("crawler/xsmb-chu-nhat-cn", "Crawler@getOldResult");
Route::get("crawler/thong-ke-xsmb-c2579-article", "Crawler@getOldResult");
Route::get("crawler/xsmb-13-12-2019", "Crawler@getOldResult");




Route::get("/crawler/current", "Crawler@getCurrentResult");

