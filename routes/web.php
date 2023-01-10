<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BgController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PowerController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;

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

Route::get('user/create', [RegisteredUserController::class, 'create'])->name('user.create');
Route::post('user', [RegisteredUserController::class, 'store'])->name('user.store');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'can:admin'], function () {
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        // Route::get('user/create', [RegisteredUserController::class, 'create'])->name('user.create');
        // Route::post('user', [RegisteredUserController::class, 'store'])->name('user.store');
        Route::get('user/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('user/{user}/restore', [UserController::class, 'restore'])->name('user.restore');
    });

    Route::group(['middleware' => 'can:master'], function () {
        Route::resource('supplier', SupplierController::class);
        Route::get('supplier/{supplier}/restore', [SupplierController::class, 'restore'])->name('supplier.restore');
        Route::resource('area', AreaController::class);
        Route::resource('bg', BgController::class);
        Route::resource('power', PowerController::class);
    });

    Route::group(['middleware' => 'can:stock'], function () {
        Route::get('stock', [StockController::class, 'index'])->name('stock.index');
        Route::get('stock/{bg}', [StockController::class, 'show'])->name('stock.show');
        Route::post('stock/{bg}/store', [StockController::class, 'store'])->name('stock.store');

        Route::get('generate', [GenerateController::class, 'index'])->name('generate.index');
        Route::get('generate/{power}', [GenerateController::class, 'show'])->name('generate.show');
        Route::post('generate/{power}/store', [GenerateController::class, 'store'])->name('generate.store');
    });

    Route::group(['middleware' => 'can:operator'], function () {
        Route::get('operation', [OperationController::class, 'index'])->name('operation.index');
    });

    Route::group(['middleware' => 'can:user'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('position', [PositionController::class, 'index'])->name('position.index');
    });
});

require __DIR__ . '/auth.php';
