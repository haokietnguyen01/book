<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', [App\Http\Controllers\HomeController::class, 'home']);
route::get('/book/list', [App\Http\Controllers\HomeController::class, 'listBook']);
route::get('/book/upload', [App\Http\Controllers\HomeController::class, 'bookCreateForm']);
route::post('/book/upload', [App\Http\Controllers\HomeController::class, 'bookCreate']);
route::get('/book/update/{id}',[App\Http\Controllers\HomeController::class, 'bookUpdateForm']);
route::post('/book/update/{id}',[App\Http\Controllers\HomeController::class, 'bookUpdate']);
route::get('/book/delete/{id}',[App\Http\Controllers\HomeController::class, 'bookDelete']);