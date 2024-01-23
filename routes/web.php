<?php

use App\Http\Controllers\BalitaController;
use App\Http\Controllers\IbuhamilController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\kesehatanibuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TimbanganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewUserController;
use Database\Seeders\BalitaSeeder;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::get('/',[UserController::class, 'index'])->middleware('auth');
Route::get('/home',[UserController::class, 'index'])->middleware('auth');
Route::group(['middleware' =>['auth']], function(){
    Route::group(['middleware' => ['CekUserLogin:1']], function(){
        Route::resource('balita', BalitaController::class);
        Route::resource('ibuhamil', IbuhamilController::class);
        Route::resource('user', ViewUserController::class);
    });
    Route::group(['middleware' => ['CekUserLogin:2']], function(){
        Route::resource('timbangan', TimbanganController::class);
        Route::resource('imunisasi', ImunisasiController::class);
        Route::resource('kesehatanibu', kesehatanibuController::class);
    });
});

Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login/proses','proses');
    Route::get('logout','logout');
});