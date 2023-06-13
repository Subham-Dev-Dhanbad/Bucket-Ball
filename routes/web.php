<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BucketController;
use App\Http\Controllers\BallController;
use App\Http\Controllers\TrackController;
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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('ball/list', [BallController::class, 'index'])->name('ball.list');
Route::get('ball/add', [BallController::class, 'add'])->name('ball.add');
Route::post('ball/store', [BallController::class, 'store'])->name('ball.store');

Route::get('bucket/list', [BucketController::class, 'index'])->name('bucket.list');
Route::get('bucket/add', [BucketController::class, 'addNew'])->name('bucket.add');
Route::post('bucket/store', [BucketController::class, 'store'])->name('bucket.store');

Route::get('assgin-balls/list/{id?}', [TrackController::class, 'index'])->name('balls.assgin.list');
Route::get('assgin-balls/add', [TrackController::class, 'add'])->name('balls.assgin.add');
Route::post('assgin-balls/store', [TrackController::class, 'store'])->name('balls.assgin.store');


