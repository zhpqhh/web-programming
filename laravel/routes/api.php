<?php
namespace App\Http\Controllers;
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

Route::   get('/products',      [ProductController::class, 'GetProducts']);
Route::   get('/products/{id}',  [ProductController::class, 'GetProduct']);
Route::  post('/products',      [ProductController::class, 'AddProduct']);
Route::   put('/products',      [ProductController::class, 'UpdateProduct']);
Route::delete('/products/{id}', [ProductController::class, 'DeleteProduct']);
