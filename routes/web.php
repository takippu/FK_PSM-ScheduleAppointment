<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/schedule-requests', [App\Http\Controllers\ScheduleController::class, 'indexReq'])->name('scheduleReq');
Route::put('/schedule-accept', [App\Http\Controllers\ScheduleController::class, 'acceptSchedule'])->name('acceptReq');
Route::put('/schedule-reject', [App\Http\Controllers\ScheduleController::class, 'rejectSchedule'])->name('rejectReq');

Route::resource('/schedule', ScheduleController::class);

