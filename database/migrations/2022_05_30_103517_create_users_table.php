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
            $table->srting('name', 64);
            $table->srting('email', 128)->unique();
            $table->string('phone_number', 32)->unique();
            $table->srting('password', 128);
            $table->bigInteger('reward_points')->default(0);
            $table->date('email_varified_at')->nullable();
            $table->string('email_varification_token', 128)->nullable();
            $table->srting('facebook_id', 32)->nullable();
            $table->srting('google_id', 32)->nullable();
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
};
