<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LognInController;
use App\Http\Controllers\LognOutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DormController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;

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
Route::resource('accounts', AccountController::class);
Route::resource('dorms', DormController::class);
Route::resource('rooms', RoomController::class);
Route::resource('registers', RegisterController::class);
Route::resource('payments', PaymentController::class);
Route::resource('users', UserController::class);
Route::get('/change-password', [UserController::class, 'changePassword'])->name('users.changePassword');
Route::post('/update-password/{id}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
Route::get('/register', [UserController::class, 'register_room'])->name('users.register_room');
Route::get('/registered/{id_room}', [UserController::class, 'registered'])->name('users.registered');
Route::get('/payment', [UserController::class, 'payment_show'])->name('users.payment_show');