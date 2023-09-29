<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\RegisterController;
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

Route::prefix('v1')->middleware('jwt.auth')->group(function () {
    // Define routes for the 'auth' apiResource
    Route::post('me', [AuthController::class, 'me']);

    // Refresh the authentication token
    Route::post('refresh', [AuthController::class, 'refresh']);

    // Logout
    Route::post('logout', [AuthController::class, 'logout']);

    // Define routes for the 'author' apiResource
    Route::apiResource('/author', AuthorController::class);

    // Define routes for the 'book' apiResource
    Route::apiResource('/book', BookController::class);

    // Define routes for the 'customer' apiResource
    Route::apiResource('/customer', CustomerController::class);

    // Define routes for the 'employee' apiResource
    Route::apiResource('/employee', EmployeeController::class);

    // Define routes for the 'publisher' apiResource
    Route::apiResource('/publisher', PublisherController::class);

    // Define routes for the 'rental' apiResource
    Route::apiResource('/rental', RentalController::class);

});

Route::post('login', [AuthController::class, 'login']);

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index']);

Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'create']);