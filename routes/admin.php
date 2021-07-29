<?php

use App\Http\Controllers\Admin\DeptController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\admin\LevelController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\PostController;
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

Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');
Route::get('/data', [HomeController::class, 'data'])->name('admin.data');

//admin Post Blog
route::get('/post', [PostController::class, 'index']);
route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::group(['prefix' => 'laravel-filemanager',], function () {
  Lfm::routes();
});

// admin Dept
Route::get('/dept', App\Http\Livewire\Admin\Dept\Index::class)->name('admin.dept');
Route::get('/dept/create', [DeptController::class, 'create'])->name('dept.create');
Route::post('/dept', [DeptController::class, 'store'])->name('dept.store');

// admin Store
Route::get('/store', App\Http\Livewire\Admin\Store\Index::class)->name('admin.store');
Route::get('/store/create', [StoreController::class, 'create'])->name('store.create');
Route::post('/store', [StoreController::class, 'store'])->name('store.store');


// admin Employee
Route::get('/employee', App\Http\Livewire\Admin\Employee\Index::class)->name('admin.employee');


// admin Level
route::get('/level', App\Http\Livewire\Admin\Level\Index::class)->name('admin.level');
Route::get('/level/create', [LevelController::class, 'create'])->name('level.create');
Route::post('/level', [LevelController::class, 'store'])->name('level.store');

// admin Index
route::get('/team', App\Http\Livewire\Admin\Team\Index::class)->name('admin.team');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
