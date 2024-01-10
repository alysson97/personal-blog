<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /* protected $fillable = [
        'name',
        'email',
        'password',
    ]; */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


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
