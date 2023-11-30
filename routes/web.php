<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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
    return view('dashboard', compact('users'));
    })->name('dashboard');
});
Route::get('/admin/category',[CategoryController::class,'index'])->name('AllCat');
Route::post('/admin/category', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/admin/brand', [BrandController::class, 'brand'])->name('AllBrands');
Route::post('/admin/brand', [BrandController::class, 'store'])->name('brands.store');
Route::get('/admin/brand/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/admin/brand/{id}/update', [BrandController::class, 'update'])->name('brands.update');
Route::delete('/admin/brand/{id}/softdelete', [BrandController::class, 'softDelete'])->name('brands.softDelete');
Route::post('/admin/brand/{id}/restore', [BrandController::class, 'restore'])->name('brands.restore');
Route::delete('/admin/brand/{id}/destroy', [BrandController::class, 'destroy'])->name('brands.destroy');
