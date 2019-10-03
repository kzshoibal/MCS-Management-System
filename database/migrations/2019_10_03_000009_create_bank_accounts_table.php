<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('account_title');

            $table->string('bank_name');

            $table->string('branch_name');

            $table->date('account_opening_date');

            $table->integer('balance')->nullable();

            $table->string('account_number');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
