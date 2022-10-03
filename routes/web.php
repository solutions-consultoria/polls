<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PollController;


Route::get('/', function () {return view('home');})->name('/');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logoff', [AuthController::class, 'logoff'])->name('auth.logoff');

Route::get('/admin/home', function () {return  response()->view('admin.home');})->name('admin.home')->middleware('isAuth');

Route::get('/polls', [PollController::class, 'index'])->name('polls.index')->middleware('isAuth');
Route::get('/polls/create', [PollController::class, 'create'])->name('polls.create')->middleware('isAuth');
Route::post('/polls/create', [PollController::class, 'createPost'])->name('polls.createPost')->middleware('isAuth');
Route::get('/polls/{id}/sendWpp', [PollController::class, 'sendWpp'])->name('polls.sendWpp')->middleware('isAuth');
