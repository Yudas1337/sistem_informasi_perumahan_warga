<?php

use App\Http\Controllers\Core\{
    DashboardController,
    CivilianController,
    ManageAdminController,
    ResidenceController
};
use Illuminate\Support\Facades\{
    Auth,
    Route
};

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

Route::fallback(function () {
    abort(404);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register'  => false,
    'verify'    => false,
    'reset'     => false
]);

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
    Route::name('user.')->group(function () {
        Route::prefix('profile')->group(function () {
            Route::get('/', [DashboardController::class, 'profile'])->name('profile');
            Route::post('/', [DashboardController::class, 'changeProfile'])->name('changeProfile');
        });
        Route::prefix('change-password')->group(function () {
            Route::get('/', [DashboardController::class, 'changePassword'])->name('changePassword');
            Route::post('/', [DashboardController::class, 'updatePassword'])->name('updatePassword');
        });
    });
    Route::middleware('can:manage-for-villagehead')->group(function () {
        Route::resource('manage-admins', ManageAdminController::class)->only('index', 'create', 'store', 'destroy');
        Route::post('modify-admin-status{id}', [ManageAdminController::class, 'modifyAdmin'])->name('modify.admin');
        Route::resource('manage-residences', ResidenceController::class);
        Route::prefix('manage-residences')->group(function () {
            Route::post('search', [ResidenceController::class, 'searchResidence'])->name('manage-residences.search');
        });
    });
});
