<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use \Laravel\Sanctum\Http\Middleware\CheckAbilities;
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

Route::   get('/products',      [ProductController::class, 'GetProducts']);
Route::   get('/products/{id}', [ProductController::class, 'GetProduct']);


Route::   get('/orders',              [OrderController::class, 'GetOrders']);
Route::   get('/orders/{id}',         [OrderController::class, 'GetOrder']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum','abilities:admin']], function () {
    Route::  post('/products',      [ProductController::class, 'AddProduct']);
    Route::   put('/products',      [ProductController::class, 'UpdateProduct']);
    Route::delete('/products/{id}', [ProductController::class, 'DeleteProduct']);

    Route::  post('/orders',              [OrderController::class, 'AddOrder']);
    Route::   put('/orders/updatestatus', [OrderController::class, 'UpdateOrderStatus']);

    Route::  post('/register',            [AuthController::class, 'register']);
});
