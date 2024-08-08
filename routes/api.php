<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CmiController;
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
        Route::post('logout','logout')->middleware('auth:sanctum');
        Route::post('update_profile','update_profile')->middleware('auth:sanctum');
    });

    // Home Routes 
    Route::controller(HomeController::class)->group(function(){

        //retrieve user data 
        Route::post('user_data' , 'user_data')->middleware('auth:sanctum');

        //retrieve all categories 
        Route::post('categories' , 'categories');

        //get selected gigs
        Route::post('selected_gigs' , 'selected_gigs');

        //get top sellers
        Route::post('top_sellers' , 'top_sellers');

        //get favourite gigs
        Route::post('favourite_gigs' , 'favourite_gigs')->middleware('auth:sanctum');
        
        //add favourite gigs
        Route::post('add_favourite' , 'addToFavorite')->middleware('auth:sanctum');
        
        //remove favourite gigs
        Route::post('remove_favourite' , 'removeFromFavorite')->middleware('auth:sanctum');

        //become a seller 
        Route::post('become_seller' , 'become_seller')->middleware('auth:sanctum');
                
        //retrieve user notifications 
        Route::post('user_notifications' , 'user_notifications')->middleware('auth:sanctum');

        //get dashboard details
        Route::post('dashboard_details' , 'dashboard_details')->middleware('auth:sanctum');

        //retrieve all categories and subcategories
        Route::post('all_categories' , 'all_categories');

        //search for gigs
        Route::post('search_gigs' , 'search_gigs');

        //gig_details 
        Route::post('gig_details' , 'gig_details');

        //get seller orders
        Route::post('seller_orders' , 'seller_orders')->middleware('auth:sanctum');

        //get buyer orders
        Route::post('buyer_orders' , 'buyer_orders')->middleware('auth:sanctum');

        //get seller gigs
        Route::post('seller_gigs' , 'seller_gigs')->middleware('auth:sanctum');
        
        //Create Gig
        Route::post('create_gig' , 'create_gig')->middleware('auth:sanctum');
    
        //Delete Gig
        Route::post('delete_gig' , 'delete_gig')->middleware('auth:sanctum');

        // add deposit
        Route::post('deposit' , 'deposit')->middleware('auth:sanctum');
        
        // Deposit History
        Route::post('deposit_history' , 'deposit_history')->middleware('auth:sanctum');

        // add to cart
        Route::post('place_order' , 'placeOrder')->middleware('auth:sanctum');

        // get taxes value 
        Route::post('taxes' , 'taxes')->middleware('auth:sanctum');

        // buy gig by credit card
        Route::post('buy_gig_card' , 'buy_gig_card')->middleware('auth:sanctum');

        // buy gig by wallet balance
        Route::post('buy_gig_wallet' , 'buy_gig_wallet')->middleware('auth:sanctum');
        
        // get Gig Requirements
        Route::post('gig_requirements' , 'gig_requirements')->middleware('auth:sanctum');
        
        // submit Gig Requirements
        Route::post('submit_requirements' , 'submit_requirements')->middleware('auth:sanctum');
        
        // view item submitted requirements
        Route::post('view_requirements' , 'view_requirements')->middleware('auth:sanctum');
        
        // Cancel Order By Buyer
        Route::post('buyer_cancel_order' , 'buyer_cancel_order')->middleware('auth:sanctum');

        // Cancel Order By Seller
        Route::post('seller_cancel_order' , 'seller_cancel_order')->middleware('auth:sanctum');
        
        // Start Order By Seller
        Route::post('start_order' , 'start_order')->middleware('auth:sanctum');

        // view submitted Requirements
        Route::post('view_submitted_requirements' , 'view_submitted_requirements')->middleware('auth:sanctum');
        
        // Buyer Refunds List
        Route::post('buyer_refunds' , 'buyer_refunds')->middleware('auth:sanctum');
        
        // Seller Refunds List
        Route::post('seller_refunds' , 'seller_refunds')->middleware('auth:sanctum');
        
        // Request refund by buyer
        Route::post('request_refund' , 'request_refund')->middleware('auth:sanctum');
        
        // Close refund request by buyer
        Route::post('close_refund' , 'close_refund')->middleware('auth:sanctum');
        
        // raise refund request to admin
        Route::post('raise_refund' , 'raise_refund')->middleware('auth:sanctum');

        // accept refund from seller
        Route::post('accept_refund' , 'accept_refund')->middleware('auth:sanctum');

        // decline refund from seller
        Route::post('decline_refund' , 'decline_refund')->middleware('auth:sanctum');

        // Submit work
        Route::post('submit_work' , 'submit_work')->middleware('auth:sanctum');

        // Resubmit work
        Route::post('resubmit_work' , 'resubmit_work')->middleware('auth:sanctum');

        // Finish Order
        Route::post('finish_order' , 'finish_order')->middleware('auth:sanctum');

        // Add review
        Route::post('add_review' , 'add_review')->middleware('auth:sanctum');

    });


    // CMI Payment Routes 
    Route::controller(CmiController::class)->group(function(){
     Route::post('cmi/payment/success', 'success');    
     Route::post('cmi/payment/failed', 'failed'); 
     Route::post('cmi/callback', 'callback')->name('api.cmi.callback');
     Route::get('cmi/redirect','redirect');
     
     Route::get('payment/success' , [CmiController::class , 'paymentSuccess'])->name('api.payment.success');
     Route::get('payment/failed' , [CmiController::class , 'paymentFailed'])->name('api.payment.failed');
  
     Route::post('cmi/send-data', function(){
            return view('api.sendData');
            })->name('api.payment_request');
    });

});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
