<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//User 
Route::get('users',[UserController::class, 'index']);
Route::get('users/{id}',[UserController::class, 'show']);
Route::post('users',[UserController::class, 'store']);
Route::put('users/{id}',[UserController::class, 'update']);
Route::delete('users/{id}',[UserController::class, 'destroy']);
// Post 
Route::get('post',[PostController::class, 'index']);
Route::get('post/{id}',[PostController::class, 'show']);
Route::post('post',[PostController::class, 'store']);
Route::put('post/{id}',[PostController::class, 'update']);
Route::delete('post/{id}',[PostController::class, 'destroy']);

// Profile 
Route::get('profile',[ProfileController::class, 'index']);
Route::get('profile/{id}',[ProfileController::class, 'show']);
Route::post('profile',[ProfileController::class, 'store']);
Route::put('profile/{id}',[ProfileController::class, 'update']);
Route::delete('profile/{id}',[ProfileController::class, 'destroy']);

// Comment 
Route::get('comment',[CommentController::class, 'index']);
Route::get('comment/{id}',[CommentController::class, 'show']);
Route::post('comment',[CommentController::class, 'store']);
Route::put('comment/{id}',[CommentController::class, 'update']);
Route::delete('comment/{id}',[CommentController::class, 'destroy']);

// Rule 
Route::get('rule',[RuleController::class, 'index']);
Route::get('rule/{id}',[RuleController::class, 'show']);
Route::post('rule',[RuleController::class, 'store']);
Route::put('rule/{id}',[RuleController::class, 'update']);
Route::delete('rule/{id}',[RuleController::class, 'destroy']);