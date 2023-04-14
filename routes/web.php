<?php

use App\Http\Controllers\SubjectController;
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
    return view('admin.dashboard');
})->name('admin');

Route::post('subjects', [SubjectController::class, 'index'])
    ->name('subject.index');

Route::post('subjects/create', [SubjectController::class, 'store'])
    ->name('subject.create');

Route::post('subjects/delete/{id}', [SubjectController::class, 'delete'])
    ->name('subject.delete');
