<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlaskController;
use App\Http\Controllers\ExpressController;
use App\Http\Controllers\DjangoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/ingredients", [IngredientController::class, "index"]);
Route::post("/ingredients", [IngredientController::class, "store"]);
Route::put("/ingredients/{id}",[IngredientController::class, "update"]);
Route::delete("/ingredients/{id}", [IngredientController::class, "destroy"]);

Route::get('/prueba', function(){
    return redirect('https://fakestoreapi.com/products');
});

Route::get('/prueba2', function(){
    return
    $response = Http::get("https://fakestoreapi.com/products")->json();
});

Route::post("/register", [UserController::class, 'register']);
Route::post("/login", [UserController::class, 'login']);
Route::post("/restorepassword", [UserController::class, 'restore_password']);
Route::post("/logout", [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::get("/authors", [UserController::class, 'index']);

//Para django
Route::get("/recetasdjango", [DjangoController::class, 'recetas']);

//Para flask
Route::post("/books", [FlaskController::class, 'store'])->middleware("auth:sanctum");
Route::get("/books", [FlaskController::class, 'index'])->middleware("auth:sanctum");
Route::get("/me_books", [FlaskController::class, 'me_books'])->middleware("auth:sanctum");

//Ruta hacia DJANGO para probar el Token de peticones
Route::post("/guardar_recetas", [DjangoController::class, "guardar_recetas"]);

//Ruta hacia Express probar Token de peticiones
Route::post("/users_firebase", [ExpressController::class, "users_firebase"]);


