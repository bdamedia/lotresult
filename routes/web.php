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