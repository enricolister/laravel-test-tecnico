<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home'])
    ->name('home')
    ->middleware('token.auth')
;

Route::post('/', [HomeController::class, 'home'])
    ->middleware('token.auth')
;

Route::get('callInternalBeers/{token}/{page?}', [HomeController::class, 'callInternalBeers'])
    ->name('callInternalBeers')
    ->middleware('token.auth')
;

Route::get('login', [HomeController::class, 'login'])
    ->name('login')
;

Route::get('logout', [HomeController::class, 'logout'])
;
