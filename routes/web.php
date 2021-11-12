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
Route::get('/vacantes',                        [VacancyController::class, 'index'])->name('vacante.index');
Route::get('/vacantes/crear',                  [VacancyController::class, 'create'])->name('vacante.create');
Route::get('/vacantes/editar',                 [VacancyController::class, 'edit'])->name('vacante.edit');
Route::get ('/vacantes/{slug}',                [VacancyController::class, 'show'])->name('vacante.show');
Route::post('/vacantes',                       [VacancyController::class, 'store'])->name('vacante.store');
Route::post('/vacantes/files',                 [VacancyController::class, 'files']);
Route::post('/vacantes/getFiles',              [VacancyController::class, 'getFileUser']);
Route::post('/vacantes/deleteFile/{document}', [VacancyController::class, 'deleteFile']);

Route::get ('/categorias/{slug}',              [CategoryController::class, 'show'])->name('category.show');
