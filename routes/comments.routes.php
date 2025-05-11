<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'comments'], function () {
    Route::post('/add/{postId}', [CommentController::class, 'add'])->name('comment.add');
    Route::get('/edit/{commentId}', [CommentController::class, 'edit'])->name('comment.edit');
    Route::post('/update/{commentId}', [CommentController::class, 'update'])->name('comment.update');
    Route::get('/delete/{commentId}', [CommentController::class, 'delete'])->name('comment.delete');
});
