<?php
//一時的なエラーデバック
Route::get('/health', fn() => 'ok');


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminMenuController;
use Illuminate\Support\Facades\Route;

use App\Models\Reservation;

Route::middleware(['auth'])->group(function () {
    // 顧客用ダッシュボード
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'can:is-admin'])->group(function () {
    // 管理者用ダッシュボード
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ユーザー用メニュー（認証済ユーザー）
Route::middleware(['auth'])->group(function () {
    Route::resource('menus', MenuController::class);
});
// 管理者用メニュー
Route::prefix('admin')->name('admin.')->middleware(['auth', 'can:is-admin'])->group(function () {
    Route::resource('menus', AdminMenuController::class);
});



//予約作成機能ルート
Route::middleware(['auth'])->group(function() {
    Route::resource('reservations', ReservationController::class)->only([
        'index', 'create', 'store'
    ]);
});

//予約キャンセルルート
// Route::patch('reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])
//     ->name('reservations.cancel')
//     ->middleware('auth');

Route::patch('reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');


Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::resource('admin/staff', StaffController::class);
});


//管理者用ルート
Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('admin/reservations', [\App\Http\Controllers\AdminReservationController::class, 'index'])->name('admin.reservations.index');
});


require __DIR__.'/auth.php';



