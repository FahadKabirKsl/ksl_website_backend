<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BoothController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\IpoController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.dashboard.master');
    })->middleware(['auth', 'verified'])->name('dashboard');
});
Route::prefix('blog')->group(function () {
    Route::get('/single-blog/{id}', [BlogController::class, 'single_blog_index'])->name('blog.single_blog_index');
    Route::get('/index', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
});
Route::prefix('booth')->group(function () {
    Route::get('/index', [BoothController::class, 'index'])->name('booth.index');
    Route::get('/create', [BoothController::class, 'create'])->name('booth.create');
    Route::post('/store', [BoothController::class, 'store'])->name('booth.store');
    Route::get('/{id}/edit', [BoothController::class, 'edit'])->name('booth.edit');
    Route::put('/{id}', [BoothController::class, 'update'])->name('booth.update');
    Route::delete('/delete/{id}', [BoothController::class, 'destroy'])->name('booth.destroy');
});
Route::prefix('branch')->group(function () {
    Route::get('/index', [BranchController::class, 'index'])->name('branch.index');
    Route::get('/create', [BranchController::class, 'create'])->name('branch.create');
    Route::post('/store', [BranchController::class, 'store'])->name('branch.store');
    Route::get('/{id}/edit', [BranchController::class, 'edit'])->name('branch.edit');
    Route::put('/{id}', [BranchController::class, 'update'])->name('branch.update');
    Route::delete('/delete/{id}', [BranchController::class, 'destroy'])->name('branch.destroy');
});

Route::prefix('employee')->group(function () {
    Route::get('/index', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});
Route::prefix('ipo')->group(function () {
    Route::get('/single-ipo/{id}/{company_name}', [IpoController::class, 'single_ipo_index'])->name('ipo.single_ipo_index');
    Route::get('/index', [IpoController::class, 'index'])->name('ipo.index');
    Route::get('/create', [IpoController::class, 'create'])->name('ipo.create');
    Route::post('/store', [IpoController::class, 'store'])->name('ipo.store');
    Route::get('/{id}/edit', [IpoController::class, 'edit'])->name('ipo.edit');
    Route::put('/{id}', [IpoController::class, 'update'])->name('ipo.update');
    Route::delete('/delete/{id}', [IpoController::class, 'destroy'])->name('ipo.destroy');
});
Route::prefix('media')->group(function () {
    Route::get('/create', [MediaController::class, 'create'])->name('media.create');
    Route::get('/index', [MediaController::class, 'index'])->name('media.index');
    Route::post('/store', [MediaController::class, 'store'])->name('media.store');
    Route::get('/{id}/edit', [MediaController::class, 'edit'])->name('media.edit');
    Route::put('/{id}', [MediaController::class, 'update'])->name('media.update');
    Route::delete('/delete/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
});
Route::prefix('partner')->group(function () {
    Route::get('/create', [PartnerController::class, 'create'])->name('partner.create');
    Route::get('/index', [PartnerController::class, 'index'])->name('partner.index');
    Route::post('/store', [PartnerController::class, 'store'])->name('partner.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
