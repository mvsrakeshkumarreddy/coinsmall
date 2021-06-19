<?php

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


/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

*/
Route::middleware(['auth:sanctum', 'verified'])->get('/about', function () {
    return view('about');
})->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/vision', function () {
    return view('vision');
})->name('vision');

/*

Route::middleware(['auth:sanctum', 'verified'])->get('/wallet', function () {
    return view('wallet');
})->name('wallet');


Route::middleware(['auth:sanctum', 'verified'])->get('/ref', function () {
    return view('ref');
})->name('ref');

*/
Route::middleware(['auth:sanctum', 'verified'])->get('/wallet','App\Http\Controllers\Controller@walletbalance');

Route::middleware(['auth:sanctum', 'verified'])->get('/ref','App\Http\Controllers\Controller@myrefid');


Route::middleware(['auth:sanctum', 'verified'])->post('/walletadd','App\Http\Controllers\walletcontroller@walletaddition');

Route::middleware(['auth:sanctum', 'verified'])->post('/refadd','App\Http\Controllers\refcontroller@refaddition');


Route::middleware(['auth:sanctum', 'verified'])->post('/homecomment','App\Http\Controllers\refcontroller@addcomment');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard','App\Http\Controllers\refcontroller@viewhome');

