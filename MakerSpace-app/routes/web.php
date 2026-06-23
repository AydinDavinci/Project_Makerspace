<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Order_handeling;
use App\Http\Controllers\ModelController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/catalog', [ItemController::class, 'index'])->name('catalog.view');
Route::get('/item/{id}', [ItemController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/product-view', function () {
    return view('Product_view');
})->name('product.view');

Route::post('/order-handeling', [Order_handeling::class, 'order'])->name('order-handeling');

Route::get('/Order_submitted_screen', function () {
    return view('Order_page');
})->middleware(['auth', 'verified'])->name('order_submitted_screen');   


Route::get('/Order-page', function () {
    return view('Order_page');
})->middleware(['auth', 'verified'])->name('order-page');


Route::get('/custom_upload', [ModelController::class, 'custom_upload'])
    ->name('model.custom_upload');

Route::post('/custom_upload', [ModelController::class, 'upload_model'])
    ->name('model.custom_upload.post');

Route::get('/custom_upload_info', [ModelController::class, 'custom_upload_info'])
    ->name('custom_upload_info');

Route::post('/custom_upload_info', [Order_handeling::class, 'custom_order'])
    ->name('model.custom_order.post');




Route::get('/home', function () {
    return view('home');
})->name('Home');

Route::get('/dashboard-student', function () {
    return view('dashboard-student');
})->name('Dashboard Student');

Route::get('/dashboard-admin', function () {
    return view('dashboard-admin');
})->name('Dashboard Admin');

Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings')->middleware('auth');
Route::post('/settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update')->middleware('auth');

Route::get('/faq', function () {
    return view('faq');
})->name('faq')->middleware('auth');

require __DIR__.'/auth.php';