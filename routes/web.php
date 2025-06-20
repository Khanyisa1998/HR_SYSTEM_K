<?php
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/add-employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/add-employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');

// new 
Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
