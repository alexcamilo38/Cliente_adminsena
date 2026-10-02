<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('areas/list', [AreaController::class, 'index'])->name('areas.index');
Route::get('areas/{id}', [AreaController::class, 'show'])->name('areas.show');

Route::get('trainingcenter/list', [TrainingCenterController::class, 'index'])->name('trainingcenters.index');
Route::get('trainingcenter/{id}', [TrainingCenterController::class, 'show'])->name('trainingcenters.show');

Route::get('computer/list', [ComputerController::class, 'index'])->name('computer.index');
Route::get('computer/{id}', [ComputerController::class, 'show'])->name('computer.show');
