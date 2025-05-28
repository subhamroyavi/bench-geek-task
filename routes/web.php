<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('task');
});

Route::get('bench-geek/',[TaskController::class, 'index'])->name('index');
Route::get('bench-geek/create',[TaskController::class, 'create'])->name('create');
Route::post('bench-geek/store',[TaskController::class, 'store'])->name('store');
Route::get('bench-geek/edit/{id}',[TaskController::class, 'edit'])->name('edit');
Route::post('bench-geek/update/{id}',[TaskController::class, 'update'])->name('update');
Route::get('bench-geek/delete/{id}',[TaskController::class, 'delete'])->name('delete');
