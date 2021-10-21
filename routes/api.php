<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\NightclubController;
use App\Http\Controllers\Api\RegisterController;

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

Route::post('login', [RegisterController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::middleware('auth:api')->group( function () {

    Route::get('user', [RegisterController::class, 'user']);
    Route::post('logout', [RegisterController::class, 'logout']);

    /*
    |-----------------------------------------------------
    | NIGHTCLUBS Routes
    |-----------------------------------------------------
    |
    | index()           get         /api/nightclubs
    | store()           post        /api/nightclubs
    | create()          get         /api/nightclubs/create
    | destroy()         delete      /api/nightclubs
    | update()          put         /api/nightclubs
    | show()            get         /api/nightclubs
    | edit()            get         /api/nightclubs
    |
    */
    Route::resource('nightclubs', NightclubController::class);
});
