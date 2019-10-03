<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->longText('description')->nullable();

            $table->date('start_date');

            $table->date('end_date')->nullable();

            $table->decimal('buget', 15, 2);

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
