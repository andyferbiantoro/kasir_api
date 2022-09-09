<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});


Route::group(['middleware' => 'auth:sanctum'],function(){
	Route::get('/form', [AdminController::class, 'form'])->name('form');
	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

Route::post('/add_kasir', [AdminController::class, 'add_kasir'])->name('add_kasir');
Route::get('/get_kasir', [AdminController::class, 'get_kasir'])->name('get_kasir');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

