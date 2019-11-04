<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
//            $table->string('deposit_image')->nullable();
//            $table->decimal('amount', 15, 2);
//            $table->date('date');
            $table->longText('description')->nullable();
            $table->integer('bank_account_id');
//            $table->boolean('is_approved')->default(false);
//            $table->integer('deposited_by'); // user ID
//            $table->integer('bank_account_id');
//            $table->integer('project_id')->nullable();
//            $table->integer('approved_by')->nullable(); // user ID of admin
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
