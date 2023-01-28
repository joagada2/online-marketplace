<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/home', function () {
    return view('home');
});



Route::get('/dashboard','App\Http\Controllers\DashboardController@index');

//admin
Route::group(['prefix'=>'auth','middleware'=>'admin'],function(){
    Route::get('/', function () {
        return view('backend.admin.index');
    });
    Route::resource('/category','App\Http\Controllers\CategoryController');
    Route::resource('/subcategory','App\Http\Controllers\SubcategoryController');
    Route::resource('/childcategory','App\Http\Controllers\ChildcategoryController');

    //admin listing
    Route::get('/allads','App\Http\Controllers\AdminListingController@index')->name('all.ads');

    //listing reported ads
    Route::get('/reported-ads','App\Http\Controllers\FraudController@index')->name('all.reported.ads');
});

//Route::get('/','App\Http\Controllers\MenuController@menu');
Route::get('/','App\Http\Controllers\FrontAdsController@index');

//ads

Route::get('/ads/create','App\Http\Controllers\AdvertisementController@create')->name('ads.create')->middleware('auth');
Route::post('/ads/store','App\Http\Controllers\AdvertisementController@store')->middleware('auth')->name('ads.store');
Route::get('/ads','App\Http\Controllers\AdvertisementController@index')->name('ads.index')->middleware('auth');
Route::get('/ads/{id}/edit', 'App\Http\Controllers\AdvertisementController@edit')->name('ads.edit')->middleware('auth');
Route::put('/ads/{id}/update', 'App\Http\Controllers\AdvertisementController@update')->name('ads.update')->middleware('auth');
Route::delete('/ads/{id}/delete', 'App\Http\Controllers\AdvertisementController@destroy')->name('ads.destroy')->middleware('auth');
Route::get('/ad-pending', 'App\Http\Controllers\AdvertisementController@pendingAds')->name('pending.ad');
Route::get('/search','App\Http\Controllers\AdvertisementController@searchAds')->name('search.ads');


//user ads

Route::get('/ads/{userId}/view', 'App\Http\Controllers\FrontendController@viewUserAds')->name('show.user.ads');

//profile
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile');
Route::post('/profile', 'App\Http\Controllers\ProfileController@updateProfile')->name('update.profile')->middleware('auth');


//frontend
Route::get(
    '/product/{categorySlug}',
     'App\Http\Controllers\FrontendController@findBasedOnCategory'
 )
     ->name('category.show');
 
 Route::get('/product/{categorySlug}/{subcategorySlug}', 'App\Http\Controllers\FrontendController@findBasedOnSubcategory')
     ->name('subcategory.show');
 
 
 Route::get(
     '/product/{categorySlug}/{subcategorySlug}/{childcategorySlug}',
     'App\Http\Controllers\FrontendController@findBasedOnChildcategory'
 )
    ->name('childcategory.show');
 
 Route::get('/products/{id}/{slug}', 'App\Http\Controllers\FrontendController@show')
     ->name('product.view');

//message
Route::post('/send/message', 'App\Http\Controllers\SendMessageController@store')->middleware('auth');
Route::get('/messages', 'App\Http\Controllers\SendMessageController@index')->name('messages')->middleware('auth');
Route::get('/users', 'App\Http\Controllers\SendMessageController@chatWithThisUser');
Route::get('/message/user/{id}', 'App\Http\Controllers\SendMessageController@showMessages');
Route::post('/start-conversation', 'App\Http\Controllers\SendMessageController@startConversation');

//login with facebook
Route::get('/auth/facebook', 'App\Http\Controllers\SocialLoginController@facebookRedirect');
Route::get('/auth/facebook/callback', 'App\Http\Controllers\SocialLoginController@loginWithFacebook');

//save ad
Route::post('/ad/save','App\Http\Controllers\SaveAdController@saveAd');
Route::post('/ad/remove','App\Http\Controllers\SaveAdController@removeAd')->name('ad.remove');
Route::get('/saved-ad','App\Http\Controllers\SaveAdController@getMyAds')->name('saved.ads');


//report this ad
Route::post('/report-this-ad','App\Http\Controllers\FraudController@store')->name('report.ad');

//algolia search









 
 
