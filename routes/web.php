<?php

use App\Http\Controllers\ShortUrlController;
use App\Models\ShortUrl;
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
    return view('welcome');
});
Route::post('/short', [ShortUrlController::class , 'short'])->name('short.url');
Route::get('/{code}', [ShortUrlController::class , 'show'])->name('short.show');
