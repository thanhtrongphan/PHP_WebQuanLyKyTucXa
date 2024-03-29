<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LognInController;
use App\Http\Controllers\LognOutController;
use App\Http\Controllers\StudentController;
Route::get('/', function () {
    return redirect()->route('login.form');
});
Route::get('/getdata', [DataController::class, 'GetData']);
// group route login
Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LognInController::class, 'login_form'])->name('login.form');
    Route::post('/', [LognInController::class, 'login'])->name('login');
});
Route::get('/logout', [LognOutController::class, 'logout'])->name('LogOut');
Route::resource('students', StudentController::class);