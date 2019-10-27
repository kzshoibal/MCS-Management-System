<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('education')->nullable();
            $table->string('designation')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('office_address')->nullable();
            $table->string('current_location')->nullable();
            $table->string('nid_number')->unique()->nullable();
            $table->longText('profile_summary')->nullable();
            $table->longText('notes')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('profiles');
    }
}
