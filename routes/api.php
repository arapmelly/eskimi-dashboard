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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens/create', 'App\Http\Controllers\CampaignAPIController@getToken');

Route::get('campaigns', 'App\Http\Controllers\CampaignAPIController@getCampaigns');
Route::post('campaigns/create', 'App\Http\Controllers\CampaignAPIController@createCampaign')->middleware('auth:sanctum');