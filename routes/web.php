<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BlogController::class, "index"])->name("index");

Route::get('/signin', [BlogController::class, "login"])->name("account.signin");

Route::get('/signup', [BlogController::class, "cadastroUsuario"])->name("account.signup");

Route::get("/services/cadastroUsuario", [BlogController::class, "cadastroUsuario"])->name("cadastroUsuario");

Route::post("/verificaLogin", [BlogController::class, "verificaLogin"])->name("verificaLogin");

Route::post("/processaCadastro", [BlogController::class,"processaCadastro"])->name("processaCadastro");

Route::post("/create-post/{id}", [BlogController::class, "createPost"])->name("createPost");