<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('year')->default('2020'); 
            $table->integer('moviegenre');
            $table->integer('musicgenre');
            $table->integer('hobby');
            $table->integer('sport');
            $table->integer('course');
            $table->string('bio')->default('Example bio'); 
            $table->string('email')->unique();
            $table->string('avatar')->default('default.jpg'); 
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }  

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
