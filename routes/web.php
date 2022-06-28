<?php

use App\Http\Controllers\Client\{
    ActivityController as ClientActivityController,
    DueController as ClientDueController,
    FinanceController as ClientFinanceController,
    HomeController
};
use App\Http\Controllers\Core\{
    ActivityController,
    DashboardController,
    DenizenController,
    DueController,
    FinanceController,
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

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('about-us', [HomeController::class, 'about'])->name('about-us');

Route::prefix('denizens')->group(function () {
    Route::name('denizens.dues.')->group(function () {
        Route::get('dues', [ClientDueController::class, 'index'])->name('homepage');
        Route::post('dues', [ClientDueController::class, 'search'])->name('search');
        Route::prefix('dues')->group(function () {
            Route::get('print-pdf/{nik}', [ClientDueController::class, 'printPdf'])->name('pdf');
        });
    });
    Route::get('finances', [ClientFinanceController::class, 'index'])->name('denizens.finances');
    Route::name('denizens.activities.')->prefix('activities')->group(function () {
        Route::get('/', [ClientActivityController::class, 'index'])->name('showActivities');
        Route::get('{slug}', [ClientActivityController::class, 'detail'])->name('detail');
    });
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
    Route::middleware('can:manage-for-administrator')->group(function () {
        Route::resources([
            'manage-denizens'   => DenizenController::class,
            'manage-activities' => ActivityController::class
        ]);
        Route::resources([
            'manage-finances'   => FinanceController::class,
            'manage-dues'       => DueController::class
        ], ['only' => ['store', 'index', 'destroy']]);
        Route::prefix('manage-dues')->group(function () {
            Route::get('monthly-report', [DueController::class, 'printPdf'])->name('print.dues');
        });
        Route::prefix('manage-finances')->group(function () {
            Route::get('monthly-report', [FinanceController::class, 'printPdf'])->name('print.finances');
        });
    });
});
