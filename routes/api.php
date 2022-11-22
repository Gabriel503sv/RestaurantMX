<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\DetallePedidoController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\TipoPagoController;
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




Route::post('iniciarsesion', [ApiAuthController::class, 'Iniciarsesion']);

Route::middleware('jwt.verify')->group(function () {

});
Route::get('categorias', [CategoriaController::class, 'index']);

Route::controller(ProductoController::class)->group(function () {
    Route::get('/productos', 'index');
    Route::get('/productos/{id}', 'show');
});

Route::controller(PedidoController::class)->group(function () {
    Route::get('/pedidos', 'index');
    Route::get('/pedidos/{id}', 'show');
    Route::post('/pedido', 'store');
});
Route::controller(DetallePedidoController::class)->group(function () {
    Route::get('/detallepedidos', 'index');
    Route::get('/detallepedidos/{id}', 'show');
    Route::post('/detallepedido', 'store');
});
Route::controller(TipoPagoController::class)->group(function () {
    Route::get('/tipopago', 'index');
});