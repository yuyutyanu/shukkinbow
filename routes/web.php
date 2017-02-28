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

Route::get('/', function () {
    return view('/signin');
});

Route::group(['middleware' => ['google']], function () {
    Route::get('/start',AttendanceController::class.'@start');
    Route::get('/count',AttendanceController::class.'@count');
    Route::get('/end',AttendanceController::class.'@end');
});

//開始時刻と終了時刻のdb保存
Route::get('/starttime',AttendanceController::class.'@addStartTime');
Route::post('/endtime',AttendanceController::class."@addEndTime");

//socialite (google)
Route::get('auth/google', GoogleAuthController::class.'@redirectToProvider');
Route::get('auth/google/callback',GoogleAuthController::class.'@handleProviderCallback');
