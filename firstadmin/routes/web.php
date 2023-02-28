<?php
namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
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
    return view('Login');
});

Route::post('/login', [ApiController::class, 'login']);

Route::get('/logout', [homeController::class, 'logout']);

Route::group(['middleware' => 'admin'], function () {

    Route::get('/home', [homeController::class, 'home']);

    Route::get('/register', [ApiController::class, 'create']);
    Route::post('/register', [ApiController::class, 'store']);

    Route::post('/updateProfile', [HomeController::class, 'updateProfile']);
    Route::post('/updateUser', [HomeController::class, 'updateUser']);

    Route::get('/users', [HomeController::class, 'users']);
    Route::get('/Block', [HomeController::class, 'blockuser']);

    Route::get('/Block/{id}', [HomeController::class, 'block']);
    Route::get('/unblock/{id}', [HomeController::class, 'unblock']);

    Route::get('/delete/{id}', [HomeController::class, 'delete']);

    Route::get('/profile', [homeController::class, 'adminprofile']);
    Route::get('/Details/{id}', [homeController::class, 'userprofile']);

    Route::get('/daam', [homeController::class, 'daam']);

    Route::post('/changePassword', [homeController::class, 'changePassword']);

    Route::get('/Vposts/{user_id}', [PostController::class, 'Post']);

});
