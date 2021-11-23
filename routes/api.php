<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

Route::namespace('Api')->group(function(){

    Route::prefix('auth')->group(function(){

        Route::post('/login', [AuthController::class,'login']);
        Route::post('/signup', [AuthController::class,'signup']);

        Route::post('/quotesignup', [AuthController::class,'quotesSignUp']);
        Route::post('/quotefetch', [AuthController::class,'quotesFetch']);
        Route::get('/search/{name}', [AuthController::class,'search']);
    });

    Route::group([
        'middleware' => 'auth:api'
    ], function(){

        Route::get('/helloworld', [AuthController::class,'index']);
        Route::post('/logout', [AuthController::class,'logout']);

    });

});
