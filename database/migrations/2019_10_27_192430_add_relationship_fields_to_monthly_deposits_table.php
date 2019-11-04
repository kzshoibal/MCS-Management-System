<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMonthlyDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monthly_deposits', function (Blueprint $table) {

//            $table->unsignedInteger('bank_account_id');
//            $table->foreign('bank_account_id')->references('id')->on('bank_accounts');
//            $table->foreign('bank_account_id', 'bank_account_fk_422681')->references('id')->on('bank_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthly_deposits', function (Blueprint $table) {
            //
        });
    }
}
