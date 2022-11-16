<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Auth\ApiAuthController;
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



Route::post('register', [ApiAuthController::class, 'register']);
Route::post('iniciarsesion', [ApiAuthController::class, 'Iniciarsesion']);
   
Route::middleware('jwt.verify')->group(function(){
    Route::get('categorias',[CategoriaController::class,'index']);
});