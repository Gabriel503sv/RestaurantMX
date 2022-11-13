<?php

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

Route::get('/', function () {
    return view('Principal.Plantilla.index');
});
//Iniciar session
Route::get('Login',[AuthController::class,'login'])->name('login');
//Verficar datos de session
Route::post('Login',[AuthController::class,'loginVerify'])->name('login.verify');
//Cerrar session
Route::post('signOut',[AuthController::class,'signOut'])->name('signOut');  

//Route::middleware('auth')->group(function(){
    // Route::prefix('admin')->group(function(){
         
         //usuario
         Route::resource('user',UserController::class);
         //usuario
         Route::resource('role',RoleController::class);
         //Proveedor
         Route::resource('proveedor',ControllerProveedor::class);
         //Categorias
         Route::resource('category',ControllerCategory::class);
         //Compra
         Route::resource('compra',ComprasController::class);
         //Producto
         Route::resource('producto',ProductoController::class);
         //pedido
         Route::resource('pedido',ControllerPedido::class);
         //dashboard
         //Route::get('dashboard',[DashboardController::class,'index'])->name('index');
         
     //});
     
 //});