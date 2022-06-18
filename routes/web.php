<?php

use App\Http\Controllers\Core\{
    DashboardController
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

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
        Route::prefix('profile')->group(function () {
            Route::get('/', [DashboardController::class, 'profile'])->name('user.profile');
            Route::post('/', [DashboardController::class, 'changeProfile'])->name('user.changeProfile');
        });

        Route::get('change-password', [DashboardController::class, 'changePassword'])->name('user.changePassword');
    });
});
