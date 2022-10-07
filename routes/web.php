<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;

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

// トップページ
Route::get('/', function () {return view('index');})->name('index');

// 管理者ページ
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/company', [AdminController::class, 'company'])->name('admin.company');
Route::get('/admin/company/create', [AdminController::class, 'create'])->name('admin.company.create');
Route::post('/admin/company/create', [AdminController::class, 'store'])->name('admin.company.store');
Route::post('/admin/company/delete/{id}', [AdminController::class, 'delete'])->name('admin.company.delete');
Route::get('/admin/company/edit/{id}', [AdminController::class, 'edit'])->name('admin.company.edit');
Route::put('/admin/company/update/{id}', [AdminController::class, 'update'])->name('admin.company.update');
Route::get('/admin/company/detail/{id}', [AdminController::class, 'detail'])->name('admin.company.detail');
Route::get('/admin/job', [AdminController::class, 'job'])->name('admin.job');

// 会社ページログイン
Route::get('/login/companyUser', [App\Http\Controllers\Auth\LoginController::class, 'showCompanyUserLoginForm'])->name('companyUser.index');
Route::get('/register/companyUser', [App\Http\Controllers\Auth\RegisterController::class, 'showCompanyUserRegisterForm']);
Route::post('/login/companyUser', [App\Http\Controllers\Auth\LoginController::class, 'companyUserLogin']);
Route::post('/register/companyUser', [App\Http\Controllers\Auth\RegisterController::class, 'registerCompanyUser'])->name('companyUser-register');
Route::view('/company', 'company.index')->middleware('auth:companyUser')->name('company.index');

// 会社ページ
Route::get('/company/job', [CompanyController::class, 'job'])->name('company.job');
Route::get('/company/job/create', [CompanyController::class, 'jobCreate'])->name('company.job.create');
Route::post('/company/job/create', [CompanyController::class, 'jobStore'])->name('company.job.store');
Route::get('/company/job/detail/{id}', [CompanyController::class, 'detail'])->name('company.job.detail');
Route::post('/company/job/delete/{id}', [CompanyController::class, 'jobDelete'])->name('company.job.delete');
Route::get('/company/job/edit/{id}', [CompanyController::class, 'jobEdit'])->name('company.job.edit');
Route::post('/company/job/update/{id}', [CompanyController::class, 'jobUpdate'])->name('company.job.update');
Route::get('/company/job/category', [CompanyController::class, 'category'])->name('company.category');
Route::get('/company/job/category/create', [CompanyController::class, 'categoryCreate'])->name('company.category.create');
Route::post('/company/job/category/create', [CompanyController::class, 'categoryStore'])->name('company.category.store');
Route::post('/company/job/category/delete/{id}', [CompanyController::class, 'categoryDelete'])->name('company.category.delete');
Route::get('/company/entry', [CompanyController::class, 'entry'])->name('company.entry');
Route::get('/company/entry/message/{id}', [CompanyController::class, 'message'])->name('company.entry.message');
Route::post('/company/entry/message/{id}', [CompanyController::class, 'messageStore'])->name('company.entry.message.store');
Route::get('/company/account', [CompanyController::class, 'account'])->name('company.account');
Route::post('/company/account', [CompanyController::class, 'accountStore'])->name('company.account.store');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {
    //ユーザー画面
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/form/{id}', [UserController::class, 'form'])->name('user.form');
    Route::post('/user/form/{id}', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/message/{id}', [UserController::class, 'message'])->name('user.message');
    Route::post('/user/message/{id}', [UserController::class, 'messageStore'])->name('user.message.store');
});
