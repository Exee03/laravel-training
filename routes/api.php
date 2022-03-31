<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(["prefix" => "users"], function () {
    Route::get("/take/{limit}", "UserController@take");
    Route::get("/verified", "UserController@verified");
    Route::post("/bulk", "UserController@storeBulk");
    Route::post("/save", "UserController@save");
    Route::put("/bulk", "UserController@updateBulk");
    Route::put("/{id}/save", "UserController@saveUpdate");
    Route::post("/{id}/update-create", "UserController@updateOrCreate");
    Route::delete("/{id}/permanent", "UserController@permanetDelete");
    Route::put("/{id}/restore", "UserController@restore");
    Route::get("/deleted", "UserController@deleted");
    Route::get("/with-deleted", "UserController@getAllWithDeleted");
    Route::post("/{id}/upload", "UserController@upload");
    Route::post("/{id}/verify-remainder", "UserController@sendVerifyReminder");
    Route::post("/bulk-verify-remainder", "UserController@sendBulkVerifyReminder");
});

Route::group(["prefix" => "profiles"], function () {
    Route::post("/bulk", "ProfileController@storeBulk");
    Route::post("/save", "ProfileController@save");
});

Route::apiResources([
    'users' => 'UserController',
    'orders' => 'OrderController',
    'cars' => 'CarController',
    'car-models' => 'CarModelController',
    'drivers' => 'DriverController',
    'profiles' => 'ProfileController',
]);
