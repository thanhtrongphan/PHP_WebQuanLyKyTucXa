<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/getdata', [DataController::class, 'GetData']);
// call view login.blade.php
Route::get('/login', [DataController::class, 'login_form'])->name('login.form');
Route::post('/login', [DataController::class, 'login'])->name('login');

