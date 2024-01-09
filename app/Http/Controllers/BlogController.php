<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Throw_;

class BlogController extends Controller
{
    //
  public function index(){
    if(!Auth::check()){
      $user = (object) ['id' => 0];

      return view('index', ['user'=> $user]);
    }
    $id = Auth::id();
    $user = Usuario::find($id);
    return view('index', ['user' => $user]); 
  }
  public function login(){
    return view('account.signin');
  }
  public function verificaLogin(Request $request){
    if ($request->isMethod('post')) {
      $credentials = $request->only('email', 'password');
      $usuario = Usuario::verificaUsuario($credentials['email'], $credentials['password']);

      if ($usuario){
        Auth::login($usuario);
        session(['usuario' => $usuario]);
        return redirect()->route("index");
      }else{
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
      'passwordConfirm' => 'required|same:password',
    ]);
    if ($request->isMethod('post')) {
      $name = $request->input('name');
      $email = $request->input('email');
      $password = $request->input('password');
      $passwordConfirm = $request->input('passwordConfirm');
    }

    if ($password == $passwordConfirm) {
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

  public function createPost(Request $request, $id){
    // === doesnt work
    if($id == 0 || $id == null){ return redirect()->route("account.signin");}
    /* echo $id;
    dd($id); */
    if ($request->isMethod('post')) {
      $title = $request->input('postTitle');
      $message = $request->input('message');
      $image = $request->input('image');
    }
    try{
      Posts::createPost($title, $message, $image);
      return redirect()->route("index");
    }catch(\Throwable $th){
      //return redirect()->route("index")->with("erro", 1);
      throw $th;
    }
  }
}

