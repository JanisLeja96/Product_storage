<?php

use App\Http\Controllers\ProductController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/products', [ProductController::class, 'index'])
    ->name('index');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/products/create', [ProductController::class, 'create'])
    ->name('create');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/products/create', [ProductController::class, 'store'])
    ->name('store');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/products/{product}', [ProductController::class, 'show'])
    ->name('show');

Route::middleware(['auth:sanctum', 'verified'])
    ->delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('delete');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('edit');

Route::middleware(['auth:sanctum', 'verified'])
    ->put('/products/{product}', [ProductController::class, 'update'])
    ->name('update');

