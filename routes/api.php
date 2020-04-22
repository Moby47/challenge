<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::apiResource('/leaderboard', 'leaderController');

Route::Post('/login-user', 'customauthcontroller@login');
Route::Post('/register-user', 'customauthcontroller@reg');


Route::get('/leaderboard', 'dareController@scores'); //->middleware('auth.apikey');

Route::get('/dares', 'dareController@dares'); //->middleware('auth.apikey');

Route::get('/search', 'dareController@search'); //->middleware('auth.apikey');

Route::get('/filter-dare', 'dareController@filter_dare'); //->middleware('auth.apikey');

Route::get('/dare-list', 'dareController@dare_list'); //->middleware('auth.apikey');

Route::post('/suggest-dare', 'dareController@suggestion'); //->middleware('auth.apikey');