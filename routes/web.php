<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadPhotoController;
use App\Http\Controllers\CatalogController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// photoUpload
Route::get('photo', [UploadPhotoController::class, 'index']);
Route::get('add-photo', [UploadPhotoController::class, 'create']);
Route::post('add-photo', [UploadPhotoController::class, 'store']);
Route::get('edit-photo/{id}', [UploadPhotoController::class, 'edit']);
Route::put('update-photo/{id}', [UploadPhotoController::class, 'update']);
Route::delete('delete-photo/{id}', [UploadPhotoController::class, 'destroy']);

//catalog
Route::get('catalog', [CatalogController::class, 'index']);
Route::get('add-catalog', [CatalogController::class, 'create']);
Route::post('add-catalog', [CatalogController::class, 'store']);
Route::get('add-catalog-photo/{id}', [CatalogController::class, 'addPhoto']);
Route::post('add-catalog-photo', [CatalogController::class, 'storeAddPhoto']);
Route::get('show-catalog/{id}', [CatalogController::class, 'show']);
Route::get('edit-catalog/{id}', [CatalogController::class, 'edit']);
Route::put('update-catalog/{id}', [CatalogController::class, 'update']);
Route::delete('delete-catalog/{id}', [CatalogController::class, 'destroy']);
Route::put('select-catalog', [CatalogController::class, 'selectChack']);
Route::get('sort-catalog/{id}', [CatalogController::class, 'sort']);
Route::put('sort-catalog', [CatalogController::class, 'sortUpdate']);



