<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/showPosts', [AdminController::class, 'showPosts'])->name('admin.showPosts');
    Route::get('/deletePost/{id}', [AdminController::class, 'deletePost'])->name('admin.deletePost');
    Route::get('/showUsers', [AdminController::class, 'showUsers'])->name('admin.showUsers');
    Route::get('/editRole/activate/{id}', [AdminController::class, 'activate'])->name('admin.activateRole');
    Route::get('/editRole/deactivate/{id}', [AdminController::class, 'deactivate'])->name('admin.deactivateRole');
    Route::get('/showComments', [AdminController::class, 'showComments'])->name('admin.showComments');
    Route::get('/deleteComment/{id}', [AdminController::class, 'deleteComment'])->name('admin.deleteComment');
});
