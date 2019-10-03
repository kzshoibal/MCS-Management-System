<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTypesTable extends Migration
{
    public function up()
    {
        Schema::create('account_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
