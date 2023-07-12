<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProductItemController;
use App\Http\Controllers\ProductPackageController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\LoginController;

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

  

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

  

/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:user'])->group(function () {

  

    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::resource('admin/staff', StaffController::class);
    Route::resource('admin/product_items', ProductItemController::class);
    Route::resource('product_packages', ProductPackageController::class);
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/reports', [ReportController::class, 'report'])->name('admin.report');
});

/*------------------------------------------

--------------------------------------------

All Manager Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

/*------------------------------------------

--------------------------------------------

All Deliver Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:deliver'])->group(function () {
    Route::put('/note/{id}',[InvoiceController::class, 'note'])->name('deliver.note');
    Route::get('/deliver/home', [HomeController::class, 'deliverHome'])->name('deliver.home');
    
});


Route::middleware(['auth', 'user-access:admin,deliver'])->group(function () {
    Route::put('deliver/{id}', [InvoiceController::class, 'delive_update'])->name('deliver.update');
    Route::get('/deliver/print/{id}', [InvoiceController::class, 'print_show'])->name('print_show');
});

Route::middleware(['auth', 'user-access:admin,manager,user,deliver'])->group(function () {
    Route::get('invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('all', [InvoiceController::class, 'all'])->name('invoice.all');
    Route::get('invoice/show/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
});

Route::middleware(['auth', 'user-access:admin,user'])->group(function () {
    Route::get('invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('invoice', [InvoiceController::class, 'store'])->name('invoice.store');
});

Route::middleware(['auth', 'user-access:admin,manager,deliver'])->group(function () {
    Route::get('invoice/edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::put('invoice/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::put('tracking/{invoice}', [InvoiceController::class, 'tracking'])->name('invoice.tracking');


});

Route::middleware(['auth', 'user-access:admin,manager'])->group(function () { 

    Route::delete('invoice/delete/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
});

Route::get('/temp/{filename}', function ($filename) {
    $path = storage_path('app/temp/' . $filename);
    return response()->file($path);
})->name('temp.pdf');

