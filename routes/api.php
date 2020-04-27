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

Route::post('/add-mydare', 'dareController@add_mydare'); //->middleware('auth.apikey');

Route::get('/dropdown-dare-list', 'dareController@dropdown_dare_list'); //->middleware('auth.apikey');

Route::get('/dropdown-dare-name', 'dareController@dropdown_dare_name'); //->middleware('auth.apikey');

Route::get('/username-dropdown', 'dareController@username_dropdown'); //->middleware('auth.apikey');

Route::get('/pending-dares/{userid}', 'dareController@pending_dares'); //->middleware('auth.apikey');

Route::get('/count-dares', 'dareController@count_dares'); //->middleware('auth.apikey');

Route::get('/count-dare-vids', 'dareController@count_dare_vids'); //->middleware('auth.apikey');

Route::get('/count-my-pending-dares/{userid}', 'dareController@count_mydares'); //->middleware('auth.apikey');

Route::get('/upload-dare-list/{userid}', 'dareController@upload_dare_list'); //->middleware('auth.apikey');

Route::POST('/upload-dare', 'dareController@upload_dare'); //->middleware('auth.apikey');

Route::GET('/single-dare-video/{slug}/{id}', 'dareController@single_dare_video'); //->middleware('auth.apikey');




//For Admin Via API
Route::post('/create-darelist', 'dareController@create_darelist'); //->middleware('auth.apikey');
//params: dare_name and points
Route::get('/view-suggestions', 'dareController@suggestions'); //->middleware('auth.apikey');