<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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
    return redirect('/register');
});

Auth::routes();


Route::resource('projects', ProjectController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('projects/{project}')->group(function () {
    Route::resource('tasks', TaskController::class)->names([
        'index' => 'projects.tasks.index',
        'create' => 'projects.tasks.create',
        'store' => 'projects.tasks.store',
        'edit' => 'projects.tasks.edit',
        'update' => 'projects.tasks.update',
        'destroy' => 'projects.tasks.destroy',
    ]);
});
