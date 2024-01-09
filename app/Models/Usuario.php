<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Usuario extends Model implements AuthenticatableContract{
  // Define the required methods for the Authenticatable contract
  public function getAuthIdentifierName(){
    return 'id';
  }

  public function getAuthIdentifier(){
    return $this->getKey();
  }

  public function getAuthPassword(){
    return $this->password;
  }

  public function getRememberToken(){
    // Implement if needed
  }

  public function setRememberToken($value){
    // Implement if needed
  }

  public function getRememberTokenName(){
    // Implement if needed
  }
  protected $table = "user";
  protected $fillable = ['email', 'name', 'password'];

  public static function verificaUsuario($email, $password){

    $user = self::where("email", $email)->first();
    if ($user && Hash::check($password, $user->password)) {
      return $user;
    }
    return null;
  }
  public static function cadastrarUsuario($name, $email,  $password){
    try {
      $passwordHash = Hash::make($password);

      self::create(["name" => $name, "email" => $email, "password" => $passwordHash]);
      return true;
    }catch (\Exception $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
  }
}
