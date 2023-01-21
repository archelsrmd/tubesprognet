<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
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
    return redirect('/index');
});
Route::get('/crud', [CrudController::class, 'listdata'])->name('crud.list');
Route::get('/crud/create', [CrudController::class, 'create'])->name('crud.create');
Route::get('/crud/{id}/edit', [CrudController::class, 'edit'])->name('crud.edit');
Route::delete('/crud/{id}', [CrudController::class, 'deleteData'])->name('crud.delete');
Route::post('/crud', [CrudController::class, 'store'])->name('crud.store');
Route::put('/crud/{id}', [CrudController::class, 'update'])->name('crud.update');

Route::get('/',[CrudController::class,'index'])->name('crud.index');

Route::get('/crud/listdata', [CrudController::class, 'listdata'])->name('crud.listdata');
Route::get('/crud/search', [CrudController::class, 'search'])->name('crud.search');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'auth']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/crud/{id}/edit', [CrudController::class, 'edit'])->name('crud.edit');
});
