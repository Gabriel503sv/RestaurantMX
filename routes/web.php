<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Locale\CategoryController;
use App\Http\Controllers\Locale\ComboController;
use App\Http\Controllers\Locale\DashboarController;
use App\Http\Controllers\Locale\RoleController;
use App\Http\Controllers\Locale\UserController;
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

Route::group(['middleware' => 'prevent-back-history'], function () {

    Route::get('/', function () {
        return redirect()->route('login');
    });
    //Iniciar session
    Route::get('Login', [AuthController::class, 'login'])->name('login');
    //Verficar datos de session
    Route::post('Login', [AuthController::class, 'loginVerify'])->name('login.verify');
    //Cerrar session
    Route::post('signOut', [AuthController::class, 'signOut'])->name('signOut');


    Route::middleware('auth')->group(function () {
        // Route::prefix('admin')->group(function(){

        //usuario
        Route::resource('user', UserController::class);
        //roles
        Route::resource('role', RoleController::class);
        //platos
        Route::resource('combos', ComboController::class);
        //category
        Route::resource('category', CategoryController::class);
        //dashboard
        Route::get('dashboard', [DashboarController::class, 'index'])->name('index');

        //});

    });
});
