<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function login()
  {
    return view('account.signin');
  }
  public function verificaLogin(Request $request)
  {
    if ($request->isMethod('post')) {
      $credentials = $request->only('email', 'password');
      $usuario = Usuario::verificaUsuario($credentials['email'], $credentials['password']);

      if ($usuario) {
        Auth::login($usuario);
        session(['usuario' => $usuario]);
        return redirect()->route("index");
      } else {
        return redirect()->route("account.signin")->with("error", "usuario não encontrado ou credenciais incorretas");
      }
    }
  }

  public function cadastroUsuario(){
    
    return view("account.signup");
  }

  public function processaCadastro(Request $request){

    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:usuario',
      'password' => 'required|min:6',
      'confiirmPassword' => 'required|same:password',
    ]);
    if ($request->isMethod('post')) {
      $name = $request->input('name');
      $email = $request->input('email');
      $password = $request->input('password');
      $confirmPassword = $request->input('confiirmPassword');
    }

    if ($password == $confirmPassword) {
      try {
        Usuario::cadastrarUsuario($name, $email, $password);
        return redirect()->route('index')->with('success', 'Usuario cadastrado com sucesso');
      } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    } else {
      return redirect()->route("account.signup")->with("erro", 1);
    }
}
    
}
