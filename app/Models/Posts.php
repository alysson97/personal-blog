<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  protected $table = "posts";
  protected $fillable = ['user_id','title', 'message', 'photo'];

  public static function createPost($id, $title, $message, $image){
    try {
      self::create([
        "user_id" => $id,
        "title" => $title,
        "message" => $message,
        "photo" => $image
      ]);
      return true;
    } catch (\Throwable $th) {
      throw $th;
    }
    

  }

}
