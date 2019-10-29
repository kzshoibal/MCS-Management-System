<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBankAccountsTable extends Migration
{
    public function up()
    {
        Schema::table('bank_accounts', function (Blueprint $table) {
            $table->unsignedInteger('account_type_id');

            $table->foreign('account_type_id')->references('id')->on('account_types');
//            $table->foreign('account_type_id', 'account_type_fk_422681')->references('id')->on('account_types');
        });
    }
}
