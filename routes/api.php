<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

// Khai báo API:
// http://127.0.0.1:8000/api/test
// Route::get('test', function(){
//     return response()->json([
//         'msg'=>"Call Api thành công"
//     ], 200);
// });
// CRUD restfull api

// Route::prefix('product')->group(function(){
//     Route::get('/', [ProductController::class, 'index']);
//     Route::get('/{id}', [ProductController::class ,'show']);
//     Route::post('/add', [ProductController::class ,'store']);
//     Route::put('/update/{id}', [ProductController::class ,'update']);
//     Route::delete('delete/{id}', [ProductController::class ,'delete']);
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class ,'show']);
        Route::post('/add', [ProductController::class ,'store']);
        Route::put('/update/{id}', [ProductController::class ,'update']);
        Route::delete('delete/{id}', [ProductController::class ,'delete']);
    });
});
Route::post('/login', [AuthController::class, 'login']);

?>