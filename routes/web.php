<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {return view('home');})->name('/');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logoff', [AuthController::class, 'logoff'])->name('auth.logoff');

Route::get('/admin/home', function () {return  response()->view('admin.home');})->name('admin.home')->middleware('isAuth');

Route::get('/polls', function () {return  response()->view('polls.home');})->name('polls.home')->middleware('isAuth');
