<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Models\Student;
use App\Models\StudentFile;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;

//use App\Http\Controllers\Website\WebsiteController;
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
Route::get('/group',[WebsiteController::class,'group']);

//Student Crud
Route::get('/student',[WebsiteController::class,'studentlist'])->name('student');
Route::get('/student/create',[WebsiteController::class,'studentcreate']);
Route::post('/student/insert',[WebsiteController::class,'studentinsert']);
Route::get('/student/view/{student:slug}',[WebsiteController::class,'studentview']);
Route::get('/student/more/{student:slug}',[WebsiteController::class,'more']);
Route::get('/student/edit/{student:slug}',[WebsiteController::class,'studentedit']);
Route::post('/student/update/',[WebsiteController::class,'studentupdate']);
Route::get('/student/delete/{student}',[WebsiteController::class,'studentdelete']);
// // Route::get('/admin',[WebsiteController::class,'admin']);
// Route::get('/admin',[AdminController::class,'index']);

// $comtes = Student::find(23);
// return $comtes;
