<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[WebsiteController::class,'index']);

//Student Crud
Route::get('/student',[WebsiteController::class,'studentlist']);
Route::get('/student/create',[WebsiteController::class,'studentcreate']);
Route::post('/student/insert',[WebsiteController::class,'studentinsert']);
Route::get('/student/edit/{student:slug}',[WebsiteController::class,'studentedit']);
Route::post('/student/update/',[WebsiteController::class,'studentupdate']);
Route::get('/student/delete/{student}',[WebsiteController::class,'studentdelete']);
