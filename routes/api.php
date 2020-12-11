<?php

use App\Http\Controllers\UserController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/users/{user}', [UserController::class, 'showUser'])
    ->name('users.show');
Route::post('/users', [UserController::class, 'createUser'])
    ->name('users.create');
Route::delete('/users/{user}', [UserController::class, 'deleteUser'])
    ->name('users.delete');
Route::put('/users/{user}', [UserController::class, 'updateUser'])
    ->name('users.update');
Route::get('/users/list/transaction', [UserController::class, 'listLastCreatedUsersWithTransactions'])
    ->name('users.list.transaction');
Route::post('/users/transaction', [UserController::class, 'createUserTransaction'])
    ->name('users.create.transaction');
