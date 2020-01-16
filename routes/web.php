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


Route::post("/getCompanyByday", "Crawler@listCompanyDaywise");
Route::post("/getSearchBydayandNumber", "Crawler@getSearchBydayandNumber");
Route::get("/crawler/current", "Crawler@getCurrentResult");
Route::get("/crawler/xsmn/current", "Crawler@xsmnCurrentResult");


//update current records
Route::get("/updatedatabase/{link}", "Crawler@saveDatabase");
Route::get("/updatexsmt/{link}", "Crawler@xsmtCurrentResult");
Route::get("/reload/{link}", "Crawler@reloadCurrentResult");
Route::get("/getCompanyRegions", "Crawler@getCompanyRegions");

Route::get('/','Results@index');
Route::redirect('admin','admin/login');

Auth::routes();
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('admin/users', 'admin\UserController@index')->name('users')->middleware('auth');
Route::get('admin/user/{id}', 'admin\UserController@view')->name('view')->middleware('auth');

Route::get('admin/news', 'admin\NewsController@index')->name('news')->middleware('auth');
Route::get('admin/news/create', 'admin\NewsController@create')->name('create')->middleware('auth');
Route::post('admin/news/store', 'admin\NewsController@store')->name('store')->middleware('auth');
Route::get('admin/news/{id}', 'admin\NewsController@show')->name('show')->middleware('auth');
Route::get('admin/news/{id}/edit', 'admin\NewsController@edit')->name('edit')->middleware('auth');
Route::post('admin/news/update', 'admin\NewsController@update')->name('update')->middleware('auth');


Route::get('/admin/home', function() {
    return view('admin/home');
})->name('home')->middleware('auth');
