<?php 
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'post'], function () {
    Route::get('/details/{id}', [PostController::class,'post_details']);
    Route::get('/create', [PostController::class,'createPost'])->middleware(['auth']);
    Route::post('/create-data', [PostController::class,'createData'])->middleware(['auth']);
    Route::get('/fetch_posts', [PostController::class,'fetch_posts'])->middleware(['auth']);
    Route::get('/delete/{id}', [PostController::class,'my_post_del'])->middleware(['auth'])->name('post.delete');
    Route::get('/edit/{id}', [PostController::class,'my_post_edit'])->middleware(['auth'])->name('post.edit');
    Route::post('/update/{id}', [PostController::class,'my_post_update'])->middleware(['auth'])->name('post.update');
    Route::post('/like/{postId}', [PostController::class, 'like_post'])->name('post.like');
    Route::get('/search',[PostController::class, 'search'] )->name('posts.search');
    Route::get('/sort', [PostController::class, 'sort'])->name('posts.sort');
});