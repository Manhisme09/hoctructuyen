<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonUserController;
use App\Http\Controllers\ProgramUserController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
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

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('courses', CourseController::class)->only(['index', 'show']);
Route::resource('lessons', LessonController::class)->only('show');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('reviews', ReviewController::class)->only(['store'])->middleware('canReview');
    Route::resource('reviews', ReviewController::class)->only(['destroy', 'update']);
    Route::resource('replys', ReplyController::class)->only(['store']);
    Route::resource('replys', ReplyController::class)->only(['destroy', 'update']);
    Route::resource('course-user', CourseUserController::class)->only(['store', 'destroy', 'update']);
    Route::resource('program-user', ProgramUserController::class)->only('store')->middleware('canJoinProgram');
    Route::resource('lesson-user', LessonUserController::class)->only('store')->middleware('canJoinLesson');
    Route::resource('profile', ProfileController::class)->except(['show',]);
});
Route::get('language/{locale}', [LanguageController::class, 'index'])->name('language.index');
Route::get('/ajax-search-product', [CourseController::class, 'ajaxSearch'])->name('ajax-search-product');
Route::post('Admin', [AdminController::class, 'adminLogin'])->name('adminLogin');
Route::resource('Admin', AdminController::class)->only(['index']);
