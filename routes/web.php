<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard2', function () {
    return view('dashboard2');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/change', [ProfileController::class, 'change'])->name('profile.change');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users', [ProfileController::class, 'index'])->name('index');
    Route::get('/users/create', [ProfileController::class, 'create'])->name('create');

    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::post('/student/update', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/delete/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
    
});


require __DIR__.'/auth.php';
