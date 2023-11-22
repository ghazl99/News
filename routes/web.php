<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Auth::routes();
//Add
Route::get( '/FormCategory', [ App\Http\Controllers\PostController::class, 'FormCategory' ] )->name( 'FormCategory' );
Route::post( '/StoreCategory', [ App\Http\Controllers\PostController::class, 'storeCategory' ] )->name( 'Store.Category' );
Route::get( '/FormTag', [ App\Http\Controllers\PostController::class, 'FormTag' ] )->name( 'FormTag' );
Route::post( '/StoreTag', [ App\Http\Controllers\PostController::class, 'storeTag' ] )->name( 'Store.Tag' );
Route::get( '/FormPost', [ App\Http\Controllers\PostController::class, 'FormPost' ] )->name( 'FormPost' );
Route::post( '/StorePost', [ App\Http\Controllers\PostController::class, 'StorePost' ] )->name( 'Store.Post' );
//view
Route::get( '/PostPage', [ App\Http\Controllers\PostController::class, 'PostPage' ] );
Route::post( '/search', [ App\Http\Controllers\PostController::class, 'search' ] )->name( 'search' );