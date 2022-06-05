<?php

use App\Http\Controllers\apiController\ConditionController;
use App\Http\Controllers\apiController\LoginController;
use App\Http\Controllers\apiController\OrdersController;
use App\Http\Controllers\apiController\RecipientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WeightController;
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

// Register - Login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Socialite Login
Route::get('socialite/login', [LoginController::class, 'socialite']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    // User Information
    Route::get('/user/show/{id}', [AuthController::class, 'show']);
    Route::post('/user/edit/{id}', [AuthController::class, 'edit']);



    // Order & OrderItem
    Route::post('/order/insert', [OrdersController::class, 'insert']);
    Route::get('/order/show/{id}', [OrdersController::class, 'show']);
    Route::post('/order/delete/{id}', [OrdersController::class, 'delete']);
    Route::get('/orderItem/show/{id}', [OrdersController::class, 'showItem']);

    // Recipient
    Route::post('/recipient/insert', [RecipientController::class, 'insert']);
    Route::get('/recipient/show/{id}', [RecipientController::class, 'show']);
    Route::post('recipient/edit/{id}', [RecipientController::class, 'edit']);
    Route::post('/recipient/delete/{id}', [RecipientController::class, 'delete']);

    // Condition
    Route::get('/condition', [ConditionController::class, 'show']);

    // Branch
    Route::get('/branch', [BranchController::class, 'show']);

    // Category
    Route::get('/category', [CategoryController::class, 'show']);

    // price_Weight
    Route::get('/price/weight', [WeightController::class, 'showWeight']);

    // price_Cm
    Route::get('/price/cm', [WeightController::class, 'showCm']);

    Route::post('/logout', [AuthController::class, 'logout']);

});
