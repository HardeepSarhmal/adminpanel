<?php
namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Controllers\homeController;
use App\Http\Controllers\postController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//user login api
Route::post('/Ulogin', [PostController::class, 'Ulogin']);

Route::group(['middleware' => 'auth:sanctum'], function () {

//Post

    Route::post('/Post', [PostController::class, 'newPost']);
    Route::post('/delete/{id}', [PostController::class, 'deletePost']);
    Route::post('/update', [PostController::class, 'updatePost']);

    Route::post('/UserPosts', [PostController::class, 'Aposts']);

    Route::post('/status', [PostController::class, 'status']);
    Route::post('/comment', [PostController::class, 'comment']);
    Route::post('/replycomment', [PostController::class, 'replycomment']);

    //admin

});
Route::post('/Adelete/{id}', [homeController::class, 'AdeletePost']);
