<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UnlikeController;


//ผู้อ่าน
Route::get('/detail/{id}', [CommentController::class, 'detail'])->name('blog.detail');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/like', [LikeController::class, 'like'])->name('like'); // เส้นทางสำหรับการกดไลค์
Route::post('/unlike', [UnlikeController::class, 'unlike'])->name('unlike');
Route::get('/',[BlogController::class,'index']);

//นักเขียน
//blogs ทั่วไป
Route::get('/create', [AdminController::class, 'create']);
Route::post('/insert', [AdminController::class, 'insert']);
Route::get('/blog', [AdminController::class, 'index'])->name('blog');
Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
Route::get('/change/{id}', [AdminController::class, 'change'])->name('change');
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
Route::get('/blog/{id}', [BlogController::class, 'show']);




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
