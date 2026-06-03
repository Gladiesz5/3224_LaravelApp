<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

#routes berfungsi menghubungkan URL dengan controller yang akan dijalankan.
// Rute User Area
//route untuk merampilkan halaman 
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class,'show'])->name('events.show');
Route::get('/checkout', [EventController::class,'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Catatan: Dashboard & Login Auth di kemudian hari akan menempati blok ini juga
    Route::resource('events', EventAdminController::class);

    //route get untuk menampilkan
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/transactions', [DashboardController::class,'indexTransaction'])->name('transactions.index');
    // dan seterusnya...
});

//route resource untuk mengelola kategori dan partner di area admin
Route::resource('admin/categories', CategoryController::class);
Route::resource('admin/partners', PartnerController::class);