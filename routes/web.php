<?php

use App\Http\Controllers\DatSanController;
use App\Http\Controllers\DichVuApiController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SanNgayCaController;
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
//index
Route::get('/index', [PagesController::class, 'show_index']);

//login
Route::get('/login', [LoginController::class, 'show_login']);
Route::post('/post_login', [LoginController::class, 'post_login']);

//logout
Route::get('/logout', [LoginController::class, 'logout']);

//dichvu
Route::get('/show_dichvu', [DichVuController::class, 'show_dichvu']);
Route::post('/add_dichvu', [DichVuController::class, 'add_dichvu']);
Route::get('/delete_dichvu/{id}', [DichVuController::class, 'delete_dichvu']);
Route::get('/get_dichvu/{id}', [DichVuController::class, 'get_dichvu']);
Route::post('/edit_dichvu/{id}', [DichVuController::class, 'edit_dichvu']);

//dichvuapi
Route::resource('/add_dichvu_api', DichVuApiController::class);

//register
Route::get('/register', [RegisterController::class, 'show_register']);
Route::post('/post_register', [RegisterController::class, 'post_register']);

//sanngayca
Route::get('/show_sanngayca', [SanNgayCaController::class, 'show_sanngayca']);

Route::get('/show_sanngay', [SanNgayCaController::class, 'show_sanngay']);

//them gio hang
Route::get('/add_sanngayca/{id}', [DatSanController::class, 'add']);
Route::get('/show_sanngayca_cart', [DatSanController::class, 'show']);
Route::get('/delete_sanngayca/{id}', [DatSanController::class, 'delete']);

//dat san
Route::post('/dat_san', [DatSanController::class, 'datsan']);

//show lich su
Route::get('/lich_su/{id}', [DatSanController::class, 'lichsudat']);

//show chi tiet lich su
Route::get('/lich_su_chitiet/{id}', [DatSanController::class, 'lichsudatchitiet']);
