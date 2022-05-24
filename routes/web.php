<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\BarangController;

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

Route::get('/',[HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('/dashboard', [AdminController::class, 'index'])->name('home');
Route::get('pesan/{id}',[PesanController::class,'index']);
Route::post('pesan/{id}',[PesanController::class,'pesan']);
Route::get('keranjang',[PesanController::class,'check_out']);
Route::delete('keranjang/{id}', [PesanController::class,'delete']);
Route::resource('/dashboard',BarangController::class)->except([
    'index','show'
]);


