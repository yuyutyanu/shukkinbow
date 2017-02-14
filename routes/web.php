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
Route::get('/count',function(){
   return view('/count');
});
Route::get('/start',function(){
    return view('/start');
});
Route::get('/end',function(){
   return view('/end');
});
/*
 *  social login in google
 */
Route::get('auth/google', 'GoogleAuthController@redirectToProvider');
Route::get('auth/google/callback','GoogleAuthController@handleProviderCallback');
