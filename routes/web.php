<?php

use App\Http\Controllers\ShortUrlController;
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

Route::get('/', [ShortUrlController::class, 'index']);
Route::post('/', [ShortUrlController::class, 'store']);
Route::get('/{id}', [ShortUrlController::class, 'show']);
