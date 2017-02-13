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
    return view('/social_login');
});
Route::get('/count_work_time',function(){
   return view('/count_work_time');
});
Route::get('/work_start',function(){
    return view('/work_start');
});
Route::get('/work_end',function(){
   return view('/work_end');
});
/*
 *  social login in google
 */
Route::get('auth/google', 'GoogleAuthController@redirectToProvider');
Route::get('auth/google/callback','GoogleAuthController@handleProviderCallback');
