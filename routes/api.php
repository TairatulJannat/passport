<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login',[AuthController::class,'Login']);
Route::post('/register',[AuthController::class, 'Register']);

Route::post('/forgetpassword',[ForgetController::class,'ForgetPassword']);

Route::post('/resetpassword',[ResetController::class,'ResetController']);

Route::get('/user',[UserController::class,'User'])->middleware('auth:api');