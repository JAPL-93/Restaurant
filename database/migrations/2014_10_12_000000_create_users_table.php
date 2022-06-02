<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nickname')->unique();
            $table->string('RFC')->unique();
            $table->string('birthdate');
            $table->unsignedBigInteger('type_user_id')->default(2);
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
             //foreing key
             $table->foreign('type_user_id')->references('id')->on('type_users')->onDelete('cascade');
             $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
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
};
