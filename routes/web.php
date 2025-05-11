<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminProjectsController;
use App\Http\Controllers\AdminServicesController;
use App\Http\Controllers\AdminTagsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SetupController;

// Global routes
Route::get('/', function () {
    return view(view: 'home');
})->name('home');
Route::get(uri: '/about', action: [AboutController::class, 'index'])->name(name: 'about');
Route::get(uri: '/services', action: [ServiceController::class, 'index'])->name(name: 'services');
Route::get(uri: '/quotes', action: [QuoteController::class, 'index'])->name(name: 'quotes');
Route::get(uri: '/contact', action: [ContactController::class, 'index'])->name(name: 'contact');

// Setup routes
Route::prefix('setup')
    ->name('setup.')
    ->middleware('web')
    ->group(function () {
        Route::get('/', [SetupController::class, 'index'])->name('index');
        Route::post('/store', [SetupController::class, 'store'])->name('store');
    });

Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        // Dashboard route
        Route::get('/', function () {
            return view('dashboard');
        })->name('index');

        // Profile routes
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Services routes
        Route::get('/services', [AdminServicesController::class, 'index'])->name('services.index');
        Route::get('/services/create', [AdminServicesController::class, 'create'])->name('services.create');
        Route::post('/services', [AdminServicesController::class, 'store'])->name('services.store');
        Route::get('/services/{id}/edit', [AdminServicesController::class, 'edit'])->name('services.edit');
        Route::put('/services/{id}', [AdminServicesController::class, 'update'])->name('services.update');
        Route::delete('/services/{id}', [AdminServicesController::class, 'destroy'])->name('services.destroy');

        // Projects routes
        Route::get('/projects', [AdminProjectsController::class, 'index'])->name('projects.index');
        Route::get('/projects/create', [AdminProjectsController::class, 'create'])->name('projects.create');
        Route::post('/projects', [AdminProjectsController::class, 'store'])->name('projects.store');
        Route::get('/projects/{id}/edit', action: [AdminProjectsController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{id}', [AdminProjectsController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{id}', [AdminProjectsController::class, 'destroy'])->name('projects.destroy');

        // Tags routes
        Route::get('/tags/create', [AdminTagsController::class, 'create'])->name('tags.create');
        Route::post('/tags', [AdminTagsController::class, 'store'])->name('tags.store');
    });

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

require __DIR__ . '/auth.php';
