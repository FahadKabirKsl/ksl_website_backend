<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BoothController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\IpoController;
use App\Http\Controllers\PartnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/contact-form', [ContactController::class, 'submitForm']);

//Authentication
Route::post('/registration', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//Partner With Us
Route::get('/partner/{id}', [PartnerController::class, 'single_partner']);
Route::get('/partner', [PartnerController::class, 'index']);
Route::post('/partner', [PartnerController::class, 'store']);

//Blog
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{id}', [BlogController::class, 'single_blog']);
Route::post('/blog', [BlogController::class, 'store']);
Route::post('/blog/{id}', [BlogController::class, 'update']);
Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy']);

//Booth
Route::get('/booth', [BoothController::class, 'index']);
Route::get('/booth/{id}', [BoothController::class, 'single_booth']);
Route::post('/booth', [BoothController::class, 'store']);
Route::post('/booth/{id}', [BoothController::class, 'update']);
Route::delete('/booth/delete/{id}', [BoothController::class, 'destroy']);

//Branch
Route::get('/branch', [BranchController::class, 'index']);
Route::get('/branch/{id}', [BranchController::class, 'single_branch']);
Route::post('/branch', [BranchController::class, 'store']);
Route::post('/branch/{id}', [BranchController::class, 'update']);
Route::delete('/branch/delete/{id}', [BranchController::class, 'destroy']);

//Employee
Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/{id}', [EmployeeController::class, 'single_employee']);
Route::post('/employee', [EmployeeController::class, 'store']);
Route::post('/employee/{id}', [EmployeeController::class, 'update']);
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy']);

//Ipo
Route::get('/ipo', [IpoController::class, 'index']);
Route::get('/ipo/{id}', [IpoController::class, 'single_ipo']);
Route::post('/ipo', [IpoController::class, 'store']);
Route::post('/ipo/{id}', [IpoController::class, 'update']);
Route::delete('/ipo/delete/{id}', [IpoController::class, 'destroy']);

//Media
Route::get('/media', [MediaController::class, 'index']);
Route::get('/media/{id}', [MediaController::class, 'single_media']);
Route::post('/media', [MediaController::class, 'store']);
Route::post('/media/{id}', [MediaController::class, 'update']);
Route::delete('/media/delete/{id}', [MediaController::class, 'destroy']);
