<?php

use PgSql\Result;
use App\Http\Controllers\GenerateQr;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\IdController;
use App\Http\Controllers\TestControllerCrops;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\staff\StaffController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\staff\StaffFormController;
use App\Http\Controllers\staff\StaffUserController;
use App\Http\Controllers\Admin\AuditTrailController;
use App\Http\Controllers\staff\StaffAuditController;
use App\Http\Controllers\Admin\FarmersDataController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\SystemBackupController;
use App\Http\Controllers\staff\StaffProfileController;
use App\Http\Controllers\staff\StaffReportsController;
use App\Http\Controllers\secretary\SecretaryController;
use App\Http\Controllers\staff\StaffSettingsController;
use App\Http\Controllers\staff\StaffFarmersDataController;
use App\Http\Controllers\staff\StaffManageUsersController;
use App\Http\Controllers\secretary\SecretaryFormController;
use App\Http\Controllers\staff\StaffSystemBackupController;
use App\Http\Controllers\secretary\SecretaryProfileController;
use App\Http\Controllers\secretary\SecretaryFarmDataController;
use App\Http\Controllers\Auth\AuthController as AuthAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/table', function () {
    return view('table');
});
Route::get('/login', [AuthAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthAuthController::class, 'login']);
Route::post('/logout', [AuthAuthController::class, 'logout'])->name('logout');
Route::get('forgot-password', [AuthAuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthAuthController::class, 'PostForgotPassword']);
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email',  [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');


Route::middleware(['auth', 'admin_or_staff'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'admin']);
    Route::get('/get-farmer-count/{barangays_id}', [AdminController::class, 'getFarmerCount']);
    Route::get('/get-all-farmers-count', [AdminController::class, 'getAllFarmersCount']);
    Route::get('/get-status-count/{status}', [AdminController::class, 'getStatusCount']);
    Route::get('/audit/filter', [SettingsController::class, 'audit'])->name('audit.filter');


    Route::get('farmreport', [FarmersDataController::class, 'farmdata']);
    Route::get('reports', [ReportsController::class, 'reports']);
    Route::get('audit', [SettingsController::class, 'audit']);
    Route::get('backup', [SettingsController::class, 'backup']);
    Route::get('generate', [FarmersDataController::class, 'generate']);
    Route::get('/get-municipalities/{provinces_id}', [FarmersDataController::class, 'getMunicipalities']);
    Route::get('/get-barangays/{municipalities_id}', [FarmersDataController::class, 'getBarangays']);

    Route::get('create-add', [FarmersDataController::class, 'create']);
    Route::post('create', [FarmersDataController::class, 'store']);
    Route::get('farmers-view/{id}/view', [FarmersDataController::class, 'show'])->name('farmers.show');
    Route::get('farmers-edit/{id}/edit', [FarmersDataController::class, 'edit'])->name('farmers.edit');
    Route::put('farmers-update/{id}', [FarmersDataController::class, 'update']);
    Route::get('farmers-generate/{id}/generate', [FarmersDataController::class, 'generate'])->name('farmers.generate');

    Route::get('qr', [GenerateQr::class, 'qrGen']);
    // Admin Manage users
    Route::get('users-add', [UserController::class, 'create']);
    Route::post('users', [UserController::class, 'store']);
    Route::get('manageusers', [ManageUsersController::class, 'manage']);
    Route::get('user-view/{id}', [ManageUsersController::class, 'show']);
    Route::get('user-edit/{id}', [ManageUsersController::class, 'edit']);
    Route::put('user-update/{id}', [ManageUsersController::class, 'update']);

    Route::get('/export-farmers', [ReportsController::class, 'exportFarmers']);
    Route::get('profile', [SettingsController::class, 'profile']);
    Route::put('profile-update/{id}', [SettingsController::class, 'updateProfile'])->name('profile.update');
    Route::put('password-update/{id}', [SettingsController::class, 'updatePassword'])->name('password.update');
});




//test
Route::get('/test', [TestController::class, 'qrGen']);




Route::get('qr-code/{id}', [QRCodeController::class, 'showProfile'])->name('qr-code.show');


// Secretary

Route::get('farmreport', [SecretaryController::class, 'farmdata']);
Route::get('profile', [SettingsController::class, 'profile']);
    Route::put('profile-update/{id}', [SettingsController::class, 'updateProfile'])->name('profile.update');
    Route::put('password-update/{id}', [SettingsController::class, 'updatePassword'])->name('password.update');
//Table
