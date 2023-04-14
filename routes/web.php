<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AuthenticatedSessionController;
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

Route::any('/', function () {
    return view('web.pages.subjects.index');
})->name('dashboard');

Route::get('subjects/{category}', [SubjectController::class, 'index'])
    ->name('subject.index');

Route::get('subject/{id}', [SubjectController::class, 'show'])
    ->name('subject.show');

Route::post('subjects/create', [SubjectController::class, 'store'])
    ->name('subject.create');

Route::post('subjects/comment/{subject}', [SubjectController::class, 'comment'])
    ->name('subject.comment');

Route::post('subjects/delete/{id}', [SubjectController::class, 'delete'])
    ->name('subject.delete');


Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.post');


Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);

