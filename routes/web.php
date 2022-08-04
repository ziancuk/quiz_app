<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
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

// Route::middleware('auth')->group(function () {
//         Route::group(['middleware' => ['admin']], function () {
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
                Route::get('/result', [DashboardController::class, 'result'])->name('result');
                Route::get('/category', [CategoryController::class, 'index'])->name('category');
                Route::post('/add/category', [CategoryController::class, 'addCategory'])->name('addCategory');
                Route::get('/edit/{category:id}/category', [CategoryController::class, 'editCategory'])->name('editCategory');
                Route::patch('/category/{category:id}/update', [CategoryController::class, 'updateCategory'])->name('updateCategory');
                Route::delete('/delete/{category:id}/category', [CategoryController::class, 'destroyCategory'])->name('destroyCategory');

                Route::get('/question', [QuestionController::class, 'index'])->name('question');
                Route::post('/add/question', [QuestionController::class, 'addQuestion'])->name('addQuestion');
                Route::get('/edit/{question:id}/question', [QuestionController::class, 'editQuestion'])->name('editQuestion');
                Route::patch('/question/{question:id}/update', [QuestionController::class, 'updateQuestion'])->name('updateQuestion');
                Route::delete('/delete/{question:id}/question', [QuestionController::class, 'destroyQuestion'])->name('destroyQuestion');

                Route::get('/option', [OptionController::class, 'index'])->name('option');
                Route::post('/add/option', [OptionController::class, 'addOption'])->name('addOption');
                Route::get('/edit/{option:id}/option', [OptionController::class, 'editOption'])->name('editOption');
                Route::patch('/option/{option:id}/update', [OptionController::class, 'updateOption'])->name('updateOption');
                Route::delete('/delete/{option:id}/option', [OptionController::class, 'destroyOption'])->name('destroyOption');
            // });
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/welcome', [QuizController::class, 'welcome'])->name('welcome');
        Route::get('/kuis/{category:id}', [QuizController::class, 'quiz'])->name('quiz');
        Route::post('/submit/quiz', [QuizController::class, 'storeQuiz'])->name('store');
    // });

// Route::group(['middleware' => ['guest']], function () {
        Route::get('/', [AuthController::class, 'getLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
        Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
        Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');
    // });
