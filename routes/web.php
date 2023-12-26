<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('app');
});






// Define routes for the FeedbackController
Route::get('/home', [App\Http\Controllers\FeedbackController::class, 'index'])->name('home');
Route::get('/feedback/create', [App\Http\Controllers\FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback/store', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');
Route::post('/feedback/{feedbackSubmission}/upvote', [App\Http\Controllers\FeedbackController::class, 'upvote'])->name('feedback.upvote');

// routes/web.php
Route::get('/show-modal/{id}', [App\Http\Controllers\CommentsController::class, 'showComments'])->name('show.modal');
Route::post('/comments/store', [App\Http\Controllers\CommentsController::class, 'store'])->name('comments.store');





