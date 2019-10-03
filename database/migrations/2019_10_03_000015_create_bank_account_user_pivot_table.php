<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bank_account_user', function (Blueprint $table) {
            $table->unsignedInteger('bank_account_id');

            $table->foreign('bank_account_id', 'bank_account_id_fk_421663')->references('id')->on('bank_accounts')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_421663')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
