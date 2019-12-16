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
Route::get("/xsmb", "Results@index");
Route::get("/xsmb/{region}", "Results@show");

/*Route::get("/xsmn", "Results@xsmn");*/
Route::get("/xsmn/{region}", "Results@xsmn");

Route::get("/xsmt", "Results@xsmt");
Route::get("/xsmt/{region}", "Results@xsmtShow");

Route::get("crawler/old", "Crawler@getOldResult");




Route::get("/crawler/current", "Crawler@getCurrentResult");
Route::get("/crawler/xsmn/current", "Crawler@xsmnCurrentResult");

