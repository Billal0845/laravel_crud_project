<?php
use App\Models\Post;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['posts' => Post::paginate(3)]);
})->name('home');


Route::get('/create', [PostController::class, 'createPost']);
Route::post('/store', [PostController::class, 'ourFileStore'])->name('store');

Route::get('/edit/{id}', [PostController::class, 'editdata'])->name('edit');

Route::post('/update/{id}', [PostController::class, 'updateData'])->name('update');

Route::get('/delete/{id}', [PostController::class, 'deleteData'])->name('delete');


