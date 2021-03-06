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
Route::get('/ket-qua-dien-toan/kqxs-dien-toan-6-36/','Results@dienToanIndex');
Route::get('/ket-qua-dien-toan/kqxs-dien-toan-123/','Results@dienToan123');
Route::get('/ket-qua-dien-toan/kqxs-dien-toan-than-tai-4/','Results@dienToanTai4');
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
Route::get("/ket-qua-dien-toan", "Results@dienToanIndex");
Route::get("crawler/old", "Crawler@getOldResult");
Route::get("/cau-mien-bac/{kqxs_dien_toan}", "Results@kqxs");
Route::get("/thond-keys/{thond_keys}", "Results@thonds");

Route::get("/tin-xo-so", "admin\NewsController@newsList");
Route::get("/tin-xo-so/{slug}", "admin\NewsController@newsFront");


Route::post("/getCompanyByday", "Crawler@listCompanyDaywise");
Route::post("/getSearchBydayandNumber", "Crawler@getSearchBydayandNumber");
Route::get("/crawler/current", "Crawler@getCurrentResult");
Route::get("/crawler/xsmn/current", "Crawler@xsmnCurrentResult");




Route::get("/crawler/vietlottResult", "Crawler@getVietlottResult");

Route::get("/crawler/xosomax4d", "Crawler@getVietlottResult");
Route::get("/crawler/xosomax3d", "Crawler@getVietlottResult");
Route::get("/crawler/xomegaxosomega", "Crawler@getVietlottResult");
Route::get("/crawler/xspowerxosopower", "Crawler@getVietlottResult");

Route::get("/ket-qua-vietlott/kqvietlott-{day}", "Results@vietlottDay");
Route::get("/ket-qua-vietlott/", "Results@vietlottDay");

Route::get("/ket-qua-vietlott/{day}", "Results@vietlottDayVise");
Route::get("/ket-qua-vietlott-new/vietlott-{day}", "Results@vietlottDayViseRecord");

//update current records
/*Route::get("/updatedatabase/{link}", "Crawler@saveDatabase");*/
Route::get("/updatexsmt/{link}", "Crawler@xsmtCurrentResult");
Route::get("/reload/{link}", "Crawler@reloadCurrentResult");
Route::get("/getCompanyRegions", "Crawler@getCompanyRegions");
Route::get("/getCompanyRegionsVit", "Crawler@getCompanyRegionsVit");
Route::get('/','Results@index');
Route::get('/thong-ke-kqxs/3-cang','Results@lot3StatisticsView');
Route::get('/lot3-statistics-details','Results@lot3Statistics');

Route::get("/thong-ke-kqxs/thong-ke-lo-gan", "Results@thungDay");
Route::get("/thong-ke-xsdp-tinh-theo-thu", "Results@getThungDayWeek");
Route::get("/XSDPThongKeAjax/XSDPTKGanCucDai", "Results@getThungKeysAjax");


Route::redirect('admin','admin/login');

Auth::routes();
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('admin/users', 'admin\UserController@index')->name('users')->middleware('auth');
Route::get('admin/user/{id}', 'admin\UserController@view')->name('view')->middleware('auth');

//Route::get("/thong-ke-kqxs/thong-ke-lo", "Results@loto2");
//Route::post("/thong-ke-kqxs/thong-ke-lo", "Results@loto2");

Route::get("/thong-ke-kqxs/thong-ke-lo", "Results@loto2view");
//Route::post("/thong-ke-kqxs/thong-ke-lo", "Results@loto2view");
Route::post("/thong-ke-kqxs-ajax", "Results@loto2ajax");


Route::get('admin/news', 'admin\NewsController@index')->name('news')->middleware('auth');
Route::get('admin/news/create', 'admin\NewsController@create')->name('create')->middleware('auth');
Route::post('admin/news/store', 'admin\NewsController@store')->name('store')->middleware('auth');
Route::get('admin/news/{id}', 'admin\NewsController@show')->name('show')->middleware('auth');
Route::get('admin/news/{id}/edit', 'admin\NewsController@edit')->name('edit')->middleware('auth');
Route::post('admin/news/update', 'admin\NewsController@update')->name('update')->middleware('auth');

Route::get('admin/cron', 'admin\CronManualController@index')->name('cron_index')->middleware('auth');
Route::get('admin/cron/tt-xsmn', 'admin\CronManualController@create')->name('cron_xsmn')->middleware('auth');
Route::get('admin/cron/tt-xsmt', 'admin\CronManualController@create')->name('cron_xsmt')->middleware('auth');
Route::get('admin/cron/tt-xsmb', 'admin\CronManualController@create')->name('cron_xsmb')->middleware('auth');

Route::post('admin/cron/tt/{region}', 'admin\CronManualController@cronButtonStart')->name('cron_xsmb')->middleware('auth');
Route::post('admin/cron/tt/{region}', 'admin\CronManualController@cronButtonStart')->name('cron_xsmb')->middleware('auth');
Route::post('admin/cron/tt/{region}', 'admin\CronManualController@cronButtonStart')->name('cron_xsmb')->middleware('auth');


Route::get('admin/results/', 'admin\ResultsController@index')->name('results_index')->middleware('auth');
Route::get('admin/results/create', 'admin\ResultsController@create')->name('results_create')->middleware('auth');
Route::post('admin/results/create', 'admin\ResultsController@create')->name('results_add')->middleware('auth');
Route::get('admin/results/{id}', 'admin\ResultsController@view')->name('results_view')->middleware('auth');
Route::post('admin/results/{id}/delete', 'admin\ResultsController@delete')->name('results_delete')->middleware('auth');
Route::get('admin/results/{id}/edit', 'admin\ResultsController@edit')->name('results_edit')->middleware('auth');
Route::post('admin/results/{id}/edit', 'admin\ResultsController@edit')->name('results_edit')->middleware('auth');
Route::post('admin/results/ajaxCompany', 'admin\ResultsController@ajaxCompany')->name('results_ajax')->middleware('auth');
Route::get('admin/cron/dien-toan', 'admin\CronManualController@get_dien_toan')->name('dien_toan')->middleware('auth');
Route::post('admin/cron/dien-toan', 'admin\CronManualController@get_dien_toan')->name('dien_toan')->middleware('auth');
//Route::post('admin/cron/tt/{region}', 'admin\CronManualController@cronButtonStart')->name('cron_xsmb')->middleware('auth');


Route::get('/admin/home', function() {
    return view('admin/home');
})->name('home')->middleware('auth');



//Transaction Management
Route::get("/ký-gửi", "transactionController@deposite");


// Route::get('home', function () {
//     return view('five88_frontend.pages.home');
// });
Route::get('/deposit', function () {
    return view('five88_frontend.pages.deposit');
});
Route::get('/history/{id}', function () {
    return view('five88_frontend.pages.transactionHistory');
});
Route::get('/account', function () {
    return view('five88_frontend.pages.account');
});
Route::post("/test", "transactionController@recharge");
Auth::routes();
