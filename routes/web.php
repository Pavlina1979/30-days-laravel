<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
})->name('home');

Route::get('/jobs', [JobController::class, 'index'])->name('job.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('job.show');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth')->name('job.store');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit', 'job')->name('job.edit');
Route::put('/jobs/{job}', [JobController::class, 'update'])->middleware('auth')->can('edit', 'job')->name('job.update');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth')->can('edit', 'job')->name('job.delete');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('auth.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('auth.store');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('session.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('session.destroy');

Route::get('/contact', function () {
  return view('contact');
});
