<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('email');

            $table->datetime('email_verified_at')->nullable();

            $table->string('password');

            $table->string('remember_token')->nullable();

            $table->boolean('status')->default(true);

            $table->timestamps();

            $table->softDeletes();
        });
//        Schema::create('users', function (Blueprint $table) {
//
//            $table->increments('id');
//
//            $table->string('name')->nullable();
//
//            $table->string('email')->nullable();
//
//            $table->datetime('email_verified_at')->nullable();
//
//            $table->string('password')->nullable();
//
//            $table->string('remember_token')->nullable();
//
////            $table->string('gender')->nullable();
////
////            $table->longText('about')->nullable();
////
////            $table->longText('address')->nullable();
//
//            $table->timestamps();
//
//            $table->softDeletes();
//        });
    }
}
