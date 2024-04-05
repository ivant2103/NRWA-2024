<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// Authentication routes
Auth::routes(['register' => false]);

    // Department routes
Route::resource('departments', DepartmentController::class)->except(['create', 'show']);
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');

    // Faculty routes
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/faculty/create', [FacultyController::class, 'create'])->name('faculty.create');
Route::post('/faculty', [FacultyController::class, 'store'])->name('faculty.store');
Route::get('/faculty/{faculty}', [FacultyController::class, 'show'])->name('faculty.show');
Route::get('/faculty/{faculty}/edit', [FacultyController::class, 'edit'])->name('faculty.edit');
Route::put('/faculty/{faculty}', [FacultyController::class, 'update'])->name('faculty.update');
Route::delete('/faculty/{faculty}', [FacultyController::class, 'destroy'])->name('faculty.destroy');