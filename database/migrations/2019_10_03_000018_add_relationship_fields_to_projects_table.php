<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('status_id');

            $table->foreign('status_id', 'status_fk_421622')->references('id')->on('project_statuses');

            $table->unsignedInteger('bank_account_id')->nullable();

            $table->foreign('bank_account_id', 'bank_account_fk_422661')->references('id')->on('bank_accounts');
        });
    }
}
