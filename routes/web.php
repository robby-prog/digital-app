<?php

use App\Http\Controllers\Admin\DeptController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Admin\Dept;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// route::get('/', [PostController::class, 'index']);

// route::post('/', [PostController::class, 'store'])->name('post.store');

Route::group(['prefix' => 'laravel-filemanager',], function () {
  Lfm::routes();
});

// Route::get('/dept', Dept::class)->name('admin.dept');

// Route::get('/dept/create', [DeptController::class, 'create'])->name('dept.create');
// Route::post('/dept', [DeptController::class, 'store'])->name('dept.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
