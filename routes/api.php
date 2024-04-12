<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;

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

Route::namespace('App\Http\Controllers\Api')->group(function() {
    
    // Auth Routes
    Route::controller(AuthController::class)->group(function () {
        Route::post('register','register');
        Route::post('login','login');
        Route::post('verify','verify');
        Route::post('resend','resend');
        Route::post('setup','setup');
        Route::post('countries','countries');
        Route::post('languages','languages');
        Route::post('timezones','timezones');
    });

    // Home Routes 
    Route::controller(HomeController::class)->group(function(){

        //retrieve all categories 
        Route::post('categories' , 'categories');

        //get image url 
        Route::get('image' , 'image');

        //get selected gigs
        Route::post('selected_gigs' , 'selected_gigs');

        //get top sellers
        Route::post('top_sellers' , 'top_sellers');
        
    });


});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
