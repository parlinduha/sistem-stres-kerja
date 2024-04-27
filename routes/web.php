<?php

use App\Http\Controllers\admin\CertaintyController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\IndicationController;
use App\Http\Controllers\admin\ProfileController as AdminProfileController;
use App\Http\Controllers\admin\RiwayatController;
use App\Http\Controllers\admin\SicknessController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
Route::get('/admin/certainty', [CertaintyController::class, 'index'])->name('admin.certainty.index');
Route::get('/admin/education', [EducationController::class, 'index'])->name('admin.education.index');

Route::get('/admin/indication', [IndicationController::class, 'index'])->name('admin.indication.index');
Route::get('/admin/indication/{id}', [IndicationController::class, 'getIndicationById'])->name('admin.indication.getIndicationById');
Route::post('/admin/indication/store', [IndicationController::class, 'store'])->name('admin.indication.store');
Route::post('/admin/indication/update/{id}', [IndicationController::class, 'update'])->name('admin.indication.update');
Route::delete('/admin/indication/delete/{id}', [IndicationController::class, 'delete'])->name('admin.indication.delete');


Route::get('/admin/sickness', [SicknessController::class, 'index'])->name('admin.sickness.index');
Route::get('/admin/sickness/{id}', [SicknessController::class, 'getSicknessById'])->name('admin.sickness.getSicknessById');
Route::post('/admin/sickness/store', [SicknessController::class, 'store'])->name('admin.sickness.store');
Route::post('/admin/sickness/update/{id}', [SicknessController::class, 'update'])->name('admin.sickness.update');
Route::delete('/admin/sickness/delete/{id}', [SicknessController::class, 'delete'])->name('admin.sickness.delete');




Route::get('/admin/riwayat', [RiwayatController::class, 'index'])->name('admin.riwayat.index');
Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/admin/user/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
