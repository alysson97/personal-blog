<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  protected $table = "posts";
  protected $fillable = ['title', 'message', 'photo'];

  public static function createPost($title, $message, $image){
    try {
      self::create([
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
