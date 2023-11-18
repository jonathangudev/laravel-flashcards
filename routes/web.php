<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlashcardController;
use App\Http\Controllers\StudyRecordController;

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
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('flashcard/all', [FlashcardController::class, 'index']);
Route::get('flashcard/create', [FlashcardController::class, 'create']);
Route::post('flashcard/store', [FlashcardController::class, 'store']);

Route::get('study-record/all', [StudyRecordController::class, 'index'])->middleware(['auth']);
Route::post('study-record/store', [StudyRecordController::class, 'store'])->middleware(['auth']);
Route::get('study-record/test', [StudyRecordController::class, 'test'])->middleware(['auth']);
Route::post('study-record/pass', [StudyRecordController::class, 'pass'])->middleware(['auth']);
Route::post('study-record/fail', [StudyRecordController::class, 'fail'])->middleware(['auth']);