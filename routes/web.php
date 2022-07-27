<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('gallery.GalleryDashboard');
// })->middleware('auth');
// Route::get('home', function () {
//     return view('gallery.GalleryAdd');
// });

Auth::routes();



//image
Route::get('dashboardImage', [App\Http\Controllers\ImageController::class, 'index'])->name('dashboardImage')->middleware('auth');
Route::get('createImage', [App\Http\Controllers\ImageController::class, 'create'])->name('createImage')->middleware('auth');
Route::get('SearchImage', [App\Http\Controllers\ImageController::class, 'search'])->name('SearchImage')->middleware('auth');
Route::post('storeImage', [App\Http\Controllers\ImageController::class, 'store'])->name('storeImage')->middleware('auth');
Route::get('editImage/{id}', [App\Http\Controllers\ImageController::class, 'edit'])->name('editImage')->middleware('auth');
Route::post('updateImage/{id}', [App\Http\Controllers\ImageController::class, 'update'])->name('updateImage')->middleware('auth');
Route::get('deleteImage/{id}', [App\Http\Controllers\ImageController::class, 'destroy'])->name('deleteImage')->middleware('auth');

//gallery
Route::get('/', [App\Http\Controllers\GalleryController::class, 'index'])->name('dashboardGallery')->middleware('auth');
// Route::get('dashboardGallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('dashboardGallery')->middleware('auth');
Route::get('createGallery', [App\Http\Controllers\GalleryController::class, 'create'])->name('createGallery')->middleware('auth');
Route::post('storeGallery', [App\Http\Controllers\GalleryController::class, 'store'])->name('storeGallery')->middleware('auth');
Route::get('editGallery/{id}', [App\Http\Controllers\GalleryController::class, 'edit'])->name('editGallery')->middleware('auth');
Route::post('updateGallery/{id}', [App\Http\Controllers\GalleryController::class, 'update'])->name('updateGallery')->middleware('auth');
Route::get('deleteGallery/{id}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('deleteGallery')->middleware('auth');

Route::get('showGallery/{id}', [App\Http\Controllers\GalleryController::class, 'show'])->name('showGallery')->middleware('auth');
