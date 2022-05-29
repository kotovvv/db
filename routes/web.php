<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GeneralController;
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
    return view('home');
});
Route::get(
    '/getcatalog',
    [GeneralController::class, 'getcatalog']
);
Route::get(
    '/s/{s}',
    [GeneralController::class, 'search']
);
Route::get(
    '/p/{id}',
    [GeneralController::class, 'getProduct']
);
Route::get(
    '/c/{name}',
    [GeneralController::class, 'getCategory']
);
