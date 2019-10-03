<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('project_statuses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
