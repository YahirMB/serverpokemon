<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

// Route::middleware(['jwt.verify'])->group(function () {
// });

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
  // Rutas de autenticación: login, me, logout
  Route::post('login', [AuthController::class, 'login']);
  Route::get('me', [AuthController::class, 'me']);
  Route::post('logout', [AuthController::class, 'logout']);
});

// Ruta de registro (signup) fuera del grupo de autenticación
Route::post('/signup', [UserController::class, 'signup']);

// Otras rutas de la API
Route::get('/users', [UserController::class, 'index']);

Route::get('/articulos', [ArticuloController::class, 'index']); //muestra todos los registros
Route::post('/articulos', [ArticuloController::class, 'store']); // crea un registro
Route::put('/articulos/{id}', [ArticuloController::class, 'update']); // actualiza un registro
Route::delete('/articulos/{id}', [ArticuloController::class, 'destroy']); //elimina un registro
