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



// Auth::routes();


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');

Auth::routes();
Route::resource('home', 'App\Http\Controllers\HomeController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('admin.edit');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('admin.create');
Route::post('/update', [App\Http\Controllers\HomeController::class, 'update'])->name('admin.update');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('admin.store');
Route::get('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('admin.delete');

Route::get('/create1', [App\Http\Controllers\HomeController::class, 'create1'])->name('admin1.create');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit1'])->name('admin1.edit');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create1'])->name('admin1.create');
Route::post('/update', [App\Http\Controllers\HomeController::class, 'update1'])->name('admin1.update');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store1'])->name('admin1.store');