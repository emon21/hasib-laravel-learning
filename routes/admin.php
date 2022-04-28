<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
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
// Auth::routes();

// Route::get('/admin/home', [AdminController::class, 'home'])->name('home')->middleware('verified');

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.admin');
// Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
// Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

//Admin Dashboar Route
// =========================  Admin Route ================================ //
Route::get('/admin',[AdminController::class,'index']);
Route::get('/admin/home',[AdminController::class,'home']);

//


Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
Route::get('/demo',[AdminController::class,'demo']);

});


Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
});

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });

    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});
