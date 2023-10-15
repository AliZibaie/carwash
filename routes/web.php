<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Service\ManageController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Service\TrackingController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('services', [ServiceController::class, 'fastStore'])->name('services.fast.create');
    Route::get('factor', [ServiceController::class, 'factor'])->name('factor');

    Route::get('tracking', [TrackingController::class, 'index'])->name('tracking.index');
    Route::post('tracking', [TrackingController::class, 'destroy'])->name('tracking.destroy');
    Route::get('tracking/edit{service}', [TrackingController::class, 'edit'])->name('tracking.edit');
    Route::get('tracking/factor', [TrackingController::class, 'factor'])->name('tracking.factor');
    Route::post('tracking/edit{service}', [TrackingController::class, 'update'])->name('tracking.update');
    Route::get('manage', [ManageController::class, 'index'])->name('manage.index');
});
Route::get('services', [ServiceController::class, 'index'])->name('services.index');


require __DIR__.'/auth.php';
