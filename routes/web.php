<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\CategoryController;

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
    $categories = Category::all();
    return view('welcome', compact('categories'));
});

Auth::routes(['verify' => true]);

/* ----- ----- ----- Vistas generales del proyecto ----- ----- ----- */
Route::get ('/home',                           [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get ('/vacantes/{slug}',                [VacancyController::class, 'show'])->name('vacante.show');
Route::post('/vacantes/files',                 [VacancyController::class, 'files']);
Route::post('/vacantes/getFiles',              [VacancyController::class, 'getFileUser']);
Route::post('/vacantes/deleteFile/{document}', [VacancyController::class, 'deleteFile']);
