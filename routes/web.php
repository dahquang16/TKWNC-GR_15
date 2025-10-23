<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\EventController as StudentEventController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('student.events.index');
});

// Student routes
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/events', [StudentEventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [StudentEventController::class, 'show'])->name('events.show');
    Route::get('/my-events', [StudentEventController::class, 'myEvents'])->name('events.my-events')
        ->middleware('auth');
    
    Route::middleware('auth')->group(function () {
        Route::post('/events/{event}/register', [StudentEventController::class, 'register'])->name('events.register');
        Route::delete('/events/{event}/unregister', [StudentEventController::class, 'unregister'])->name('events.unregister');
    });
});

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    

    Route::resource('events', AdminEventController::class);

    Route::get('/registrations', [AdminRegistrationController::class, 'index'])->name('registrations.index');
    Route::get('/events/{event}/registrations', [AdminRegistrationController::class, 'show'])->name('registrations.show');
    Route::delete('/registrations/{registration}', [AdminRegistrationController::class, 'destroy'])->name('registrations.destroy');
});

Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('student.events.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
