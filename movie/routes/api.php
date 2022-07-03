<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserReviewController;
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

Route::resource('reviews',ReviewController::class);
Route::resource('users.reviews', UserReviewController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::resource('reviews', ReviewController::class)->only(['update','store','destroy']);
    Route::put('/reviews/{id}', 'ReviewController@update');
    Route::delete('/reviews/{id}', 'BookController@destroy');
    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
