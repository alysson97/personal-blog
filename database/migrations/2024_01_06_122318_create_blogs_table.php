<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /* Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        }); */

        /* Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
          });

        Schema::create('postagens', function( Blueprint $table){
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->string('titulo');
            $table->string('foto');
            $table->integer('curtidas')->default(0);
            $table->integer('dislikes')->default(0);
            $table->timestamps();
        });

        Schema::create('comentarios', function( Blueprint $table){
            $table->foreignId('postagem_id')->constrained('postagens');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->text('comentario');
            $table->timestamps();
        }); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /* Schema::dropIfExists('blogs');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('postagens');
        Schema::dropIfExists('comentarios'); */
    }
};
