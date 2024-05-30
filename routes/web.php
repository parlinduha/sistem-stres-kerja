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
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DiagnosaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/blog', [WelcomeController::class, 'blog'])->name('blog');
Route::get('/assessment', [WelcomeController::class, 'assessment'])->name('assessment');

Route::get('/diagnosis', [DiagnosaController::class, 'index'])->name('diagnosis.index');
Route::post('/diagnosis', [DiagnosaController::class, 'store'])->name('diagnosis.store');
Route::get('/diagnosis/result/{diagnosis_id}', [DiagnosaController::class, 'diagnosisResult'])->name('diagnosis.result');



Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/admin/certainty', [CertaintyController::class, 'index'])->name('admin.certainty.index');
Route::get('/admin/certainty/{id}', [CertaintyController::class, 'getCertaintyById'])->name('admin.certainty.getCertaintyById');
Route::post('/admin/certainty/store', [CertaintyController::class, 'store'])->name('admin.certainty.store');
Route::post('/admin/certainty/update/{id}', [CertaintyController::class, 'update'])->name('admin.certainty.update');
Route::delete('/admin/certainty/delete/{id}', [CertaintyController::class, 'delete'])->name('admin.certainty.delete');

Route::get('/admin/education', [EducationController::class, 'index'])->name('admin.education.index');
Route::get('/admin/education/{id}', [EducationController::class, 'getEducationById'])->name('admin.education.getEducationById');
Route::post('/admin/education/store', [EducationController::class, 'store'])->name('admin.education.store');
Route::post('/admin/education/update/{id}', [EducationController::class, 'update'])->name('admin.education.update');
Route::delete('/admin/education/delete/{id}', [EducationController::class, 'delete'])->name('admin.education.delete');

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

Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/admin/user/{id}', [UserController::class, 'getUserById'])->name('admin.user.getUserById');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
Route::delete('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');

Route::get('/admin/riwayat', [RiwayatController::class, 'index'])->name('admin.riwayat.index');
Route::get('/admin/riwayat/{id}', [RiwayatController::class, 'getUserById'])->name('admin.riwayat.getUserById');


Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
Route::post('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::post('/admin/profile/image', [AdminProfileController::class, 'updateImage'])->name('admin.profile.updateImage');
Route::post('/admin/profile/update/password', [AdminProfileController::class, 'updatePassword'])->name('admin.profile.update.password');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
