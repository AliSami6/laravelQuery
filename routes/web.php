<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use Illuminate\support\Facades\DB;
use App\Models\User;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        // query builder
        //$users = DB::table('users')->get();
        return view('dashboard',compact('users'));
    })->name('dashboard');
});
// Category route
Route::get('/category/all/',[CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add/',[CategoryController::class,'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'Edit'])->name('edit.category');
Route::post('/category/update/{id}',[CategoryController::class,'Update'])->name('update.category');
Route::get('/category/softdelete/{id}',[CategoryController::class,'SoftDelete'])->name('sdelete.category');
Route::get('/category/restore/{id}',[CategoryController::class,'Restore'])->name('restore.category');
Route::get('/category/pdelete/{id}',[CategoryController::class,'Pdelete'])->name('pdelete.category');


//Route::get('/about-us-home', [AboutController::class,'index'])->name('about');
//
//Route::get('/home', function () {
//    return view('home');
//});
//
//Route::get('/contact', function () {
//    return view('contact');
//})->middleware('check');
