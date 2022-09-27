<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\BgController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\PowerController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
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

Route::get("/", function () {
    return Inertia::render("Welcome", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
});

Route::get("/dashboard", function () {
    return Inertia::render("Dashboard");
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::middleware(["auth", "verified"])->group(function () {
    // マスタ関連
    Route::resource("/supplier", SupplierController::class);
    Route::resource("/area", AreaController::class);
    Route::resource("/bg", BgController::class);
    Route::resource("/power", PowerController::class);

    // ストック関連
    Route::get("/stock", [StockController::class, "index"])->name("stock.index");
    Route::get("/stock/{bg}", [StockController::class, "show"])->name("stock.show");
    Route::post("/stock/{bg}/store", [StockController::class, "store"])->name("stock.store");
    Route::get("/generate", [GenerateController::class, "index"])->name("generate.index");
    Route::get("/generate/{power}", [GenerateController::class, "show"])->name("generate.show");
    Route::post("/generate/{power}/store", [GenerateController::class, "store"])->name("generate.store");
});

require __DIR__ . "/auth.php";
