<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Order_handeling;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\userController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);

Route::get('/catalog', [ItemController::class, 'index'])->middleware(['auth', 'verified'])->name('catalog.view');

Route::get('/item/{id}', [ItemController::class, 'show'])->middleware(['auth', 'verified'])->name('item.view');

Route::get('/dashboard', function () {
    $userRole = auth()->user()->role ?? 'guest';
    if ($userRole === 'admin') {
        return view('dashboard_admin_test');
    }
    $orders = \App\Models\order::where('user_email', auth()->user()->email)->get();
    return view('dashboard', ['order' => $orders]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->only(['index', 'create', 'store']);
});


Route::get('/product-view/{id}', [ItemController::class, 'show'])->name('product.view');

Route::get('/dashboard', [Order_handeling::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/order-handeling', [Order_handeling::class, 'order'])->name('order-handeling');

Route::get('/Order_submitted_screen', function () {
    return view('Order_page');
})->middleware(['auth', 'verified'])->name('order_submitted_screen');   


Route::get('/Order-page', function () {
    return view('Order_page');

})->middleware(['auth', 'verified'])->name('order-page');


Route::get('/custom_upload', [ModelController::class, 'custom_upload'])
    ->middleware(['auth', 'verified'])
    ->name('model.custom_upload');

Route::post('/custom_upload', [ModelController::class, 'upload_model'])
    ->middleware(['auth', 'verified'])
    ->name('model.custom_upload.post');

Route::get('/custom_upload_info', [ModelController::class, 'custom_upload_info'])
    ->middleware(['auth', 'verified'])
    ->name('custom_upload_info');

Route::post('/custom_upload_info', [Order_handeling::class, 'custom_order'])
    ->middleware(['auth', 'verified'])
    ->name('model.custom_order.post');


Route::get('/settings', function () {
    $user = auth()->user();
    $orders = app(Order_handeling::class)->show()->getData()['order'] ?? collect();

    return view('settings_page', compact('user', 'orders'));
})->middleware(['auth', 'verified'])->name('settings');

Route::post('/settings/update-user', [App\Http\Controllers\Admin\UserController::class, 'updateUser'])->middleware(['auth', 'verified'])->name('settings.updateUser');
Route::post('/settings/update-password', [App\Http\Controllers\Admin\UserController::class, 'updatePassword'])->middleware(['auth', 'verified'])->name('settings.updatePassword');
Route::post('/settings/update-updateRolesBulk', [App\Http\Controllers\Admin\UserController::class, 'updateRolesBulk'])->middleware(['auth', 'verified'])->name('settings.updateRolesBulk');
Route::get('/home', function () {
    return view('home');
})->name('Home');   

Route::get('/faq', [PageController::class, 'faq'])->name('faq');



require __DIR__.'/auth.php';
