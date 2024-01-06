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

Route::get('/', function () {
    return view('index');
});

Route::get('/signin', function(){
    return view('account.signin');
});

Route::get('/signup', function(){
    return view('account.signup');
});

Route::get("/services/cadastroUsuario", [BlogController::class, "cadastroUsuario"])->name("cadastroUsuario");

Route::post("/processaCadastro", [BlogController::class,"processaCadastro"])->name("processaCadastro");