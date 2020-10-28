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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::get('login', [ 'as' => 'login', 'uses' => 'App\Http\Controllers\AuthController@login']);
    Route::post('register', 'App\Http\Controllers\AuthController@register');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::get('user-profile', 'App\Http\Controllers\AuthController@userProfile');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('job-oportunities/{job_oportunity}', 'App\Http\Controllers\JobOportunityController@show');
    Route::post('job-oportunities', 'App\Http\Controllers\JobOportunityController@store');
    Route::put('job-oportunities/{job_oportunity}', 'App\Http\Controllers\JobOportunityController@update');
    Route::delete('job-oportunities/{job_oportunity}', 'App\Http\Controllers\JobOportunityController@delete');

    Route::get('users', 'App\Http\Controllers\UserController@index');
    Route::get('users/{user}', 'App\Http\Controllers\UserController@show');
    Route::put('users/{user}', 'App\Http\Controllers\UserController@update');
    Route::delete('users/{user}', 'App\Http\Controllers\UserController@delete');
});
Route::get('job-oportunities', 'App\Http\Controllers\JobOportunityController@index');