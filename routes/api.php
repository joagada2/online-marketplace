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

Route::get('/category','App\Http\Controllers\Api\ApiCategoryController@getCategory');
Route::get('/subcategory','App\Http\Controllers\Api\ApiCategoryController@getSubCategory');
Route::get('/childcategory','App\Http\Controllers\Api\ApiCategoryController@getChildCategory');


Route::get('/country','App\Http\Controllers\Api\AddressController@getCountry');
Route::get('/state','App\Http\Controllers\Api\AddressController@getState');
Route::get('/city','App\Http\Controllers\Api\AddressController@getCity');
