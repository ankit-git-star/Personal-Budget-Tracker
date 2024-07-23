<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Management\IncomeExpenseController;

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

Route::get('/', [CustomAuthController::class, 'indexPage']);
Route::post('/dashboard', [CustomAuthController::class, 'customLogin']);
Route::post('/registration', [CustomAuthController::class, 'customRegistration']);

// here dashboard route

Route::get('/dashboard', [CustomAuthController::class, 'UserDashboard']);
// end dashboard route

// Income and Expense route

Route::get('/record', [IncomeExpenseController::class, 'viewIncomeExpenseForm']);
Route::post('/add-record', [IncomeExpenseController::class, 'addIncomeExpense']);
Route::get('/view-records', [IncomeExpenseController::class, 'getIncomeExpenseList']);
Route::get('/edit-record/{id}', [IncomeExpenseController::class, 'editRecordForm']);
Route::put('/update-record/{id}', [IncomeExpenseController::class, 'updateRecordDetails']);
Route::get('/delete-record/{id}', [IncomeExpenseController::class, 'delRecord']);

Route::get('/category', [IncomeExpenseController::class, 'viewCategoryForm']);
Route::post('/add-category', [IncomeExpenseController::class, 'addCategory']);

// End Income and Expense route

Route::get('/logout', [CustomAuthController::class, 'logout']);
