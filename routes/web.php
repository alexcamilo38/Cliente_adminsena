<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TeacherController;
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

Route::get('teacher/list', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');

Route::get('course/list', [CourseController::class, 'index'])->name('course.index');
Route::get('course/{id}', [CourseController::class, 'show'])->name('course.show');

Route::get('apprentice/list', [ApprenticeController::class, 'index'])->name('apprentice.index');
Route::get('apprentice/{id}', [ApprenticeController::class, 'show'])->name('apprentice.show');

Route::get('program/list', [ProgramController::class, 'index'])->name('programs.index');
Route::get('program/{id}', [ProgramController::class, 'show'])->name('programs.show');

Route::get('environment/list', [EnvironmentController::class, 'index'])->name('environments.index');
Route::get('environment/{id}', [EnvironmentController::class, 'show'])->name('environments.show');

Route::get('announcements/list', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('announcements/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');

Route::get('offer/list', [OfferController::class, 'index'])->name('offers.index');
Route::get('offer/{id}', [OfferController::class, 'show'])->name('offers.show');

Route::get('cohorts/list', [CohortController::class, 'index'])->name('cohorts.index');
Route::get('cohorts/{id}', [CohortController::class, 'show'])->name('cohorts.show');
