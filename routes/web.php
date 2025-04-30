<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SetupController;

// Global routes
Route::get("/", function () {
    return view(view: "home");
})->name("home");
Route::get(uri: "/about", action: [AboutController::class, "index"])->name(name: "about");
Route::get(uri: "/services", action: [ServiceController::class, "index"])->name(name: "services");
Route::get(uri: "/quotes", action: [QuoteController::class, "index"])->name(name: "quotes");
Route::get(uri: "/contact", action: [ContactController::class, "index"])->name(name: "contact");

// Setup routes
Route::prefix("setup")
    ->name("setup.")
    ->middleware("web")
    ->group(function () {
        Route::get("/", [SetupController::class, "index"])->name("index");
        Route::post("/store", [SetupController::class, "store"])->name("store");
    });

// Dashboard routes
Route::get("/dashboard", function () {
    return view("dashboard");
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name("profile.edit");
    Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
    Route::delete("/profile", [ProfileController::class, "destroy"])->name("profile.destroy");
});

Route::get("/login", [AuthenticatedSessionController::class, "create"])->name("login");

require __DIR__ . "/auth.php";
