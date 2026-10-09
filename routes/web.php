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
    return view('home');
});

Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::get('areas/list', [AreaController::class, 'index'])->name('areas.index');
Route::post('areas/store', [AreaController::class, 'salida'])->name('areas.store');
Route::get('areas/{id}', [AreaController::class, 'show'])->name('areas.show');
Route::put('areas/{areas}', [AreaController::class, 'update'])->name('areas.update');
Route::get('areas/{areas}/editar', [AreaController::class, 'edit'])->name('areas.edit');
Route::delete('areas/{areas}', [AreaController::class, 'destroy'])->name('areas.destroy');


Route::get('trainingcenter/registrar', [TrainingCenterController::class, 'registro'])->name('trainingcenters.registrar');
Route::get('trainingcenter/list', [TrainingCenterController::class, 'index'])->name('trainingcenters.index');
Route::post('trainingcenter/dato', [TrainingCenterController::class, 'dato'])->name('trainingcenters.datos');
Route::get('trainingcenter/{id}', [TrainingCenterController::class, 'show'])->name('trainingcenters.show');
Route::put('trainingcenter/{Training_centers}', [TrainingCenterController::class, 'update'])->name('trainingcenters.update');
Route::get('trainingcenter/{Training_centers}/editar', [TrainingCenterController::class, 'edit'])->name('trainingcenters.edit');
Route::delete('trainingcenter/{Training_centers}', [TrainingCenterController::class, 'destroy'])->name('trainingcenters.destroy');

Route::get('computer/computador', [ComputerController::class, 'create'])->name('computer.computador');
Route::get('computer/list', [ComputerController::class, 'index'])->name('computer.index');
Route::post('computer/model', [ComputerController::class, 'model'])->name('computer.model');
Route::get('computer/{id}', [ComputerController::class, 'show'])->name('computer.show');
Route::put('computer/{computer}', [ComputerController::class, 'update'])->name('computer.update');
Route::get('computer/{computer}/editar', [ComputerController::class, 'edit'])->name('computer.edit');
Route::delete('computer/{computer}', [ComputerController::class, 'destroy'])->name('computer.destroy');

Route::get('teacher/registro', [TeacherController::class, 'create'])->name('teacher.registro');
Route::get('teacher/list', [TeacherController::class, 'index'])->name('teacher.index');
Route::post('teacher/admin', [TeacherController::class, 'dato'])->name('teacher.admin');
Route::get('teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');
Route::put('teacher/{teachers}', [TeacherController::class, 'update'])->name('teacher.update');
Route::get('teacher/{teachers}/editar', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::delete('teacher/{teachers}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

Route::get('course/registro', [CourseController::class, 'create'])->name('course.registro');
Route::get('course/list', [CourseController::class, 'index'])->name('course.index');
Route::post('course/admin', [CourseController::class, 'dato'])->name('course.admin');
Route::get('course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::put('course/{courses}', [CourseController::class, 'update'])->name('course.update');
Route::get('course/{courses}/editar', [CourseController::class, 'edit'])->name('course.edit');
Route::delete('course/{courses}', [CourseController::class, 'destroy'])->name('course.destroy');

Route::get('apprentice/registro', [ApprenticeController::class, 'create'])->name('apprentice.registro');
Route::get('apprentice/list', [ApprenticeController::class, 'index'])->name('apprentice.index');
Route::post('apprentice/admin', [ApprenticeController::class, 'dato'])->name('apprentice.admin');
Route::get('apprentice/{id}', [ApprenticeController::class, 'show'])->name('apprentice.show');
Route::put('apprentice/{apprentices}', [ApprenticeController::class, 'update'])->name('apprentice.update');
Route::get('apprentice/{apprentices}/editar', [ApprenticeController::class, 'edit'])->name('apprentice.edit');
Route::delete('apprentice/{apprentices}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');

Route::get('program/registro', [ProgramController::class, 'create'])->name('programs.create');
Route::get('program/list', [ProgramController::class, 'index'])->name('programs.index');
Route::post('program/admin', [ProgramController::class, 'dato'])->name('programs.store');
Route::get('program/{id}', [ProgramController::class, 'show'])->name('programs.show');
Route::put('program/{program}', [ProgramController::class, 'update'])->name('programs.update');
Route::get('program/{program}/editar', [ProgramController::class, 'edit'])->name('programs.edit');
Route::delete('program/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');

Route::get('environment/registro', [EnvironmentController::class, 'create'])->name('environments.create');
Route::get('environment/list', [EnvironmentController::class, 'index'])->name('environments.index');
Route::post('environment/admin', [EnvironmentController::class, 'dato'])->name('environments.store');
Route::get('environment/{id}', [EnvironmentController::class, 'show'])->name('environments.show');
Route::put('environment/{environments}', [EnvironmentController::class, 'update'])->name('environments.update');
Route::get('environment/{environments}/editar', [EnvironmentController::class, 'edit'])->name('environments.edit');
Route::delete('environment/{environment}', [EnvironmentController::class, 'destroy'])->name('environments.destroy');

Route::get('announcements/registro', [AnnouncementController::class, 'create'])->name('announcements.create');
Route::get('announcements/list', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::post('announcements/admin', [AnnouncementController::class, 'dato'])->name('announcements.store');
Route::get('announcements/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');
Route::put('announcements/{announcements}', [AnnouncementController::class, 'update'])->name('announcements.update');
Route::get('announcements/{announcements}/editar', [AnnouncementController::class, 'edit'])->name('announcements.edit');
Route::delete('announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');

Route::get('offer/registro', [OfferController::class, 'create'])->name('offers.create');
Route::get('offer/list', [OfferController::class, 'index'])->name('offers.index');
Route::post('offer/admin', [OfferController::class, 'dato'])->name('offers.admin');
Route::get('offer/{id}', [OfferController::class, 'show'])->name('offers.show');
Route::put('offer/{offers}', [OfferController::class, 'update'])->name('offers.update');
Route::get('offer/{offers}/editar', [OfferController::class, 'edit'])->name('offers.edit');
Route::delete('offer/{offers}', [OfferController::class, 'destroy'])->name('offers.destroy');

Route::get('cohorts/registro', [CohortController::class, 'create'])->name('cohorts.create');
Route::get('cohorts/list', [CohortController::class, 'index'])->name('cohorts.index');
Route::post('cohorts/admin', [CohortController::class, 'dato'])->name('cohorts.admin');
Route::get('cohorts/{id}', [CohortController::class, 'show'])->name('cohorts.show');
Route::put('cohorts/{cohorts}', [CohortController::class, 'update'])->name('cohorts.update');
Route::get('cohorts/{cohorts}/editar', [CohortController::class, 'edit'])->name('cohorts.edit');
Route::delete('cohorts/{cohorts}', [CohortController::class, 'destroy'])->name('cohorts.destroy');
