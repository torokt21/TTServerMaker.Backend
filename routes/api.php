<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('faq/q/', 'FaqQuestionController@index');
Route::get('faq/q/{slug}', 'FaqQuestionController@show');
Route::get('faq/t/', 'FaqTopicController@index');
Route::get('faq/t/{topic}', 'FaqQuestionController@index');
