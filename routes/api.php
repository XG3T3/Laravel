<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/login',[LoginController::class,'login']);

Route::get('/free',[LoginController::class,'freeAccess']);


Route::middleware('loged')->get('/logout',[LoginController::class,'logout']);


Route::post('/create',[LoginController::class,'crearUser']);

Route::middleware('loged')->get('/me',[LoginController::class,'whoAmI']);



Route::prefix('/students')->middleware('auth:api')->group(function () {

    Route::get('',[StudentController::class,'getAll']);

    Route::middleware('validaId')->get('/{id}',[StudentController::class,'getById']);

    Route::post('',[StudentController::class,'post']);

    Route::middleware('validaId')->delete('/{id}',[StudentController::class,'delete']);

    Route::middleware('validaId')->patch('/{id}',[StudentController::class,'update']);

});


