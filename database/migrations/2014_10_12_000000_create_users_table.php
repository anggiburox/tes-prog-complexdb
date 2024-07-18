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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id'); //id primary key dan auto increment
            $table->string('name'); //name varchar, not null
            $table->string('email')->unique(); // email varchar, unique, not null
            $table->string('password'); //password varchar, not null
            $table->string('id_user_roles'); //id_user_roles string, not null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
